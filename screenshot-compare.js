const { chromium } = require('playwright');
const fs = require('fs');
const path = require('path');

const REF = 'https://luonvuituoi.co';
const OURS = 'https://ecom1-production-5a8d.up.railway.app';

const VIEWPORTS = [
  { name: 'desktop', width: 1920, height: 1080 },
  { name: 'tablet', width: 768, height: 1024 },
  { name: 'mobile', width: 390, height: 844 },
];

const PAGES = [
  { path: '/', label: 'home' },
  { path: '/collections/all', label: 'shop', ref: true },
  { path: '/shop', label: 'shop', our: true },
  { path: '/products/ao-thun-relaxed-fit-trang-1', label: 'product', ref: true },
  { path: '/ao-thun-relaxed-fit-trang_1', label: 'product', our: true },
  { path: '/cart', label: 'cart', ref: true },
  { path: '/shopping-cart', label: 'cart', our: true },
];

// Ensure output directory
const outDir = path.join(__dirname, 'screenshots');
if (!fs.existsSync(outDir)) fs.mkdirSync(outDir, { recursive: true });

// Collect results for final summary
let results = [];

(async () => {
  const browser = await chromium.launch({ headless: true });

  for (const vp of VIEWPORTS) {
    const context = await browser.newContext({
      viewport: { width: vp.width, height: vp.height },
      deviceScaleFactor: 1,
    });

    for (const pageDef of PAGES) {
      const url = pageDef.ref ? REF + pageDef.path : (pageDef.our ? OURS + pageDef.path : REF + pageDef.path);
      const label = `screenshot_${vp.name}_${pageDef.label}`;
      const refFile = path.join(outDir, `${label}_ref.png`);
      const ourFile = path.join(outDir, `${label}_our.png`);

      const page = await context.newPage();

      // Capture console errors
      const consoleErrors = [];
      page.on('console', msg => {
        if (msg.type() === 'error') consoleErrors.push(msg.text());
      });

      // Capture failed requests
      const failedRequests = [];
      page.on('requestfailed', req => {
        failedRequests.push({ url: req.url(), error: req.failure().errorText });
      });

      console.log(`\n=== ${url} @ ${vp.name} (${vp.width}x${vp.height}) ===`);

      try {
        await page.goto(url, { waitUntil: 'networkidle', timeout: 30000 });
        await page.waitForTimeout(2000); // Wait for images/animations to settle

        await page.screenshot({ path: pageDef.ref ? refFile : ourFile, fullPage: true });
        console.log(`✓ Screenshot saved: ${pageDef.ref ? refFile : ourFile}`);

        // Dump console errors
        if (consoleErrors.length > 0) {
          console.log(`  Console errors (${consoleErrors.length}):`);
          consoleErrors.forEach(e => console.log(`    ${e}`));
        }

        // Dump failed requests
        if (failedRequests.length > 0) {
          console.log(`  Failed requests (${failedRequests.length}):`);
          failedRequests.forEach(f => console.log(`    ${f.url}: ${f.error}`));
        }

        // Check image status
        const images = await page.evaluate(() => {
          const imgs = document.querySelectorAll('img');
          return Array.from(imgs).map(img => ({
            src: img.src,
            loaded: img.complete && img.naturalWidth > 0,
            width: img.naturalWidth,
            height: img.naturalHeight,
            visible: img.offsetWidth > 0 && img.offsetHeight > 0,
            offsetWidth: img.offsetWidth,
            offsetHeight: img.offsetHeight,
          }));
        });
        const brokenImages = images.filter(i => !i.loaded || !i.visible);
        if (brokenImages.length > 0) {
          console.log(`  Broken/invisible images (${brokenImages.length}):`);
          brokenImages.forEach(i => console.log(`    ${i.src} loaded=${i.loaded} visible=${i.visible} ${i.offsetWidth}x${i.offsetHeight}`));
        } else {
          console.log(`  All ${images.length} images OK`);
        }

        // Extract computed styles for comparison
        // Header
        const headerStyles = await page.evaluate(() => {
          const header = document.querySelector('.m-header, .m-header__desktop, header, [class*="header"]');
          if (!header) return { error: 'No header found' };

          const cs = getComputedStyle(header);
          return {
            height: cs.height,
            background: cs.backgroundColor || cs.background,
          };
        });
        console.log(`  Header:`, JSON.stringify(headerStyles));

        // Product cards
        const productCardStyles = await page.evaluate(() => {
          const cards = document.querySelectorAll('.m-product-card, .product-card, [class*="product-card"], [class*="ProductCard"]');
          if (cards.length === 0) return { error: 'No product cards found' };
          const card = cards[0];
          const cs = getComputedStyle(card);
          return {
            count: cards.length,
            width: cs.width,
            height: cs.height,
            marginBottom: cs.marginBottom,
          };
        });
        console.log(`  Product cards:`, JSON.stringify(productCardStyles));

        // Hero/Slideshow
        const heroStyles = await page.evaluate(() => {
          const hero = document.querySelector('.m-hero__slideshow, .hero, .slideshow, [class*="hero"], [class*="slideshow"]');
          if (!hero) return { error: 'No hero found' };
          const cs = getComputedStyle(hero);
          return {
            height: cs.height,
            minHeight: cs.minHeight,
            background: cs.background,
          };
        });
        console.log(`  Hero:`, JSON.stringify(heroStyles));

        // Footer
        const footerStyles = await page.evaluate(() => {
          const footer = document.querySelector('.m-footer, .footer, [class*="footer"]');
          if (!footer) return { error: 'No footer found' };
          const cs = getComputedStyle(footer);
          return {
            background: cs.backgroundColor,
            paddingTop: cs.paddingTop,
            paddingBottom: cs.paddingBottom,
          };
        });
        console.log(`  Footer:`, JSON.stringify(footerStyles));

      } catch (err) {
        console.log(`✗ Error: ${err.message}`);
        try {
          await page.screenshot({ path: pageDef.ref ? refFile.replace('.png', '_error.png') : ourFile.replace('.png', '_error.png') });
        } catch (_) {}
      }

      await page.close();
    }
    await context.close();
  }

  await browser.close();
  console.log('\n=== All screenshots complete ===');
})();
