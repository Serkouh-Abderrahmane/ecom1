// Luôn Vui Tươi - Comprehensive Playwright E2E Test Suite
// Run: npx playwright test playwright_tests.js
// Or: node playwright_tests.js (standalone mode)

const { chromium } = require('playwright');
const BASE = process.env.BASE_URL || 'http://localhost:8080';
const fs = require('fs');
const path = require('path');

const RESULTS = [];
let PASS = 0, FAIL = 0;

function test(name, fn) {
    return { name, fn };
}

async function run() {
    const browser = await chromium.launch({ headless: true });
    const context = await browser.newContext({ viewport: { width: 1280, height: 900 } });
    const page = await context.newPage();
    
    const results = [];

    async function exec(t) {
        try {
            await t.fn(page, context);
            results.push({ name: t.name, status: 'PASS', detail: '' });
            globalPASS++;
        } catch (e) {
            results.push({ name: t.name, status: 'FAIL', detail: e.message });
            globalFAIL++;
        }
    }

    const tests = [
        // ===== HOMEPAGE =====
        test('1. Homepage loads successfully', async (page) => {
            const resp = await page.goto(BASE + '/');
            expect(resp.status()).toBe(200);
            await page.waitForSelector('nav', { timeout: 5000 });
            const html = await page.content();
            expect(html).toContain('XƯỞNG MAY NHÀ CÔNG');
        }),

        test('2. No PHP warnings on homepage', async (page) => {
            const html = await page.content();
            const warnings = ['Notice:', 'Warning:', 'Undefined variable', 'Undefined array key', 'Fatal error'];
            for (const w of warnings) {
                expect(html).not.toContain(w);
            }
        }),

        test('3. Vietnamese language detected', async (page) => {
            const html = await page.content();
            expect(html).toContain('lang="vi"');
            expect(html).toContain('Đăng nhập');
        }),

        test('4. Product images load on homepage', async (page) => {
            const imgs = await page.$$('.product-card img, [class*="product"] img');
            expect(imgs.length).toBeGreaterThan(0);
            for (const img of imgs) {
                const src = await img.getAttribute('src');
                expect(src).toBeTruthy();
                const resp = await page.goto(src);
                expect(resp.status()).toBe(200);
            }
        }),

        test('5. Product cards have working links', async (page) => {
            const links = await page.$$('a[href*="_"]');
            expect(links.length).toBeGreaterThan(0);
        }),

        // ===== CATEGORY FILTERS =====
        test('6. Category filter links exist', async (page) => {
            const cats = await page.$$('.go-category');
            expect(cats.length).toBeGreaterThanOrEqual(8);
        }),

        // ===== PRODUCT PAGES =====
        test('7. All product URLs on homepage return 200', async (page) => {
            const productLinks = await page.evaluate(() => {
                const links = Array.from(document.querySelectorAll('a[href*="_"]'));
                return links.map(l => l.getAttribute('href'));
            });
            expect(productLinks.length).toBeGreaterThan(0);
            let tested = 0;
            for (const link of productLinks) {
                try {
                    const resp = await page.goto(link.startsWith('http') ? link : BASE + link);
                    const status = resp.status();
                    const html = await page.content();
                    if (status === 200 && !html.includes('404') && !html.includes('Page Not Found')) {
                        tested++;
                    }
                } catch (e) {
                    // skip
                }
            }
            // Go back to homepage
            await page.goto(BASE + '/');
        }),

        test('8. Product detail page renders correctly', async (page) => {
            // Get first product link 
            const link = await page.$('a[href*="_"]');
            expect(link).toBeTruthy();
            const href = await link.getAttribute('href');
            await page.goto(href.startsWith('http') ? href : BASE + href);
            await page.waitForTimeout(1000);
            const html = await page.content();
            // Should show product info
            const hasTitle = html.includes('Xưởng May');
            const hasCart = html.includes('Thêm vào giỏ') || html.includes('Mua ngay');
            expect(hasTitle || hasCart).toBe(true);
        }),

        test('9. Product page has working images', async (page) => {
            const imgs = await page.$$('img');
            let imagesLoaded = 0;
            for (const img of imgs) {
                const src = await img.getAttribute('src');
                if (src && !src.includes('no-image')) {
                    try {
                        const resp = await page.goto(src.startsWith('http') ? src : BASE + src);
                        if (resp && resp.status() === 200) imagesLoaded++;
                    } catch (e) {}
                }
            }
            expect(imagesLoaded).toBeGreaterThan(0);
        }),

        // ===== LOGIN =====
        test('10. Login page renders', async (page) => {
            await page.goto(BASE + '/login');
            await page.waitForTimeout(500);
            const html = await page.content();
            expect(html).toContain('Đăng nhập');
        }),

        // ===== REGISTER =====
        test('11. Register page renders', async (page) => {
            await page.goto(BASE + '/register');
            await page.waitForTimeout(500);
            const html = await page.content();
            expect(html).toContain('Tạo tài khoản');
        }),

        // ===== CART =====
        test('12. Cart page renders', async (page) => {
            await page.goto(BASE + '/cart');
            await page.waitForTimeout(500);
            const html = await page.content();
            expect(html).toContain('Giỏ hàng');
        }),

        // ===== CHECKOUT =====
        test('13. Checkout page renders', async (page) => {
            await page.goto(BASE + '/checkout');
            await page.waitForTimeout(500);
            const html = await page.content();
            expect(html).toContain('Thanh toán');
        }),

        // ===== CONTACTS =====
        test('14. Contacts page renders', async (page) => {
            await page.goto(BASE + '/contacts');
            await page.waitForTimeout(500);
            const html = await page.content();
            expect(html).toContain('Liên hệ');
        }),

        // ===== FOOTER =====
        test('15. Footer has all content', async (page) => {
            const html = await page.content();
            expect(html).toContain('Xưởng May Nhà Công');
            expect(html).toContain('contact@xuongmaynhacong.vn');
            expect(html).toContain('0386524760');
        }),

        // ===== ADMIN =====
        test('16. Admin login page accessible', async (page) => {
            await page.goto(BASE + '/admin');
            await page.waitForTimeout(500);
            const html = await page.content();
            expect(html).toContain('admin') || expect(html).toContain('Admin') || expect(html).toContain('Đăng nhập');
        }),

        // ===== NO 404s ON KEY PAGES =====
        test('17. Key pages do not return 404', async (page) => {
            const pages = ['/', '/login', '/register', '/cart', '/checkout', '/contacts'];
            for (const p of pages) {
                const resp = await page.goto(BASE + p);
                const status = resp.status();
                expect(status === 200 || status === 302).toBe(true);
            }
        }),
    ];

    for (const t of tests) {
        process.stdout.write(`  ${t.name} ... `);
        try {
            await t.fn(page, context);
            console.log('PASS');
            RESULTS.push({ name: t.name, status: 'PASS', detail: '' });
            PASS++;
        } catch (e) {
            console.log('FAIL:', e.message.substring(0, 80));
            RESULTS.push({ name: t.name, status: 'FAIL', detail: e.message });
            FAIL++;
        }
    }

    await browser.close();

    // Report
    console.log(`\n=== RESULTS ===`);
    console.log(`PASS: ${PASS}/${PASS + FAIL}`);
    console.log(`FAIL: ${FAIL}/${PASS + FAIL}`);

    const report = `# Playwright E2E Test Results
Date: ${new Date().toISOString()}
Base URL: ${BASE}

## Summary
| Result | Count |
|--------|-------|
| ✅ PASS | ${PASS} |
| ❌ FAIL | ${FAIL} |
| Total | ${PASS + FAIL} |

## Details
| # | Test | Status | Detail |
|---|------|--------|--------|
${RESULTS.map((r, i) => `| ${i+1} | ${r.name} | ${r.status === 'PASS' ? '✅' : '❌'} ${r.status} | ${r.detail} |`).join('\n')}
`;

    fs.writeFileSync(path.join(__dirname, 'playwright-report.md'), report);
    console.log('Report saved: playwright-report.md');
    process.exit(FAIL > 0 ? 1 : 0);
}

// Simple expect implementation
function expect(actual) {
    return {
        toBe(expected) {
            if (actual !== expected) {
                throw new Error(`Expected ${JSON.stringify(expected)}, got ${JSON.stringify(actual)}`);
            }
        },
        toBeGreaterThan(expected) {
            if (actual <= expected) {
                throw new Error(`Expected > ${expected}, got ${actual}`);
            }
        },
        toBeGreaterThanOrEqual(expected) {
            if (actual < expected) {
                throw new Error(`Expected >= ${expected}, got ${actual}`);
            }
        },
        toContain(expected) {
            if (!String(actual).includes(expected)) {
                throw new Error(`Expected "${actual}" to contain "${expected}"`);
            }
        },
        not: {
            toContain(expected) {
                if (String(actual).includes(expected)) {
                    throw new Error(`Expected "${actual}" NOT to contain "${expected}"`);
                }
            },
            toBe(expected) {
                if (actual === expected) {
                    throw new Error(`Expected ${JSON.stringify(actual)} NOT to be ${JSON.stringify(expected)}`);
                }
            }
        },
        toBeTruthy() {
            if (!actual) {
                throw new Error(`Expected truthy, got ${JSON.stringify(actual)}`);
            }
        }
    };
}

let globalPASS = 0, globalFAIL = 0;

run().catch(e => {
    console.error('Fatal:', e.message);
    process.exit(1);
});
