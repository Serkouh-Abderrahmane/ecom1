const { chromium } = require("playwright");
(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage({ viewport: { width: 1440, height: 900 } });
  const base = "https://ecom1-production-5a8d.up.railway.app";
  
  // 1. Homepage
  await page.goto(base, { waitUntil: "networkidle" });
  await page.waitForTimeout(1500);
  await page.screenshot({ path: "screenshot-homepage.png", fullPage: true });
  console.log("? Homepage screenshot saved");
  
  // 2. Shop page
  await page.goto(base + "/shop", { waitUntil: "networkidle" });
  await page.waitForTimeout(1000);
  await page.screenshot({ path: "screenshot-shop.png", fullPage: true });
  console.log("? Shop screenshot saved");
  
  // 3. Admin login + dashboard
  await page.goto(base + "/admin", { waitUntil: "networkidle" });
  await page.fill("#username", "admin");
  await page.fill("#password", "admin");
  await page.click('button[type="submit"]');
  await page.waitForTimeout(2000);
  await page.screenshot({ path: "screenshot-admin.png", fullPage: true });
  console.log("? Admin dashboard screenshot saved");
  
  // 4. Cart page
  await page.goto(base + "/shopping-cart", { waitUntil: "networkidle" });
  await page.waitForTimeout(500);
  await page.screenshot({ path: "screenshot-cart.png", fullPage: true });
  console.log("? Cart page screenshot saved");
  
  await browser.close();
})().catch(e => { console.error(e); process.exit(1); });
