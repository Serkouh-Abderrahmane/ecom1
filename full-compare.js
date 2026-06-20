const { chromium } = require('playwright');
const fs = require('fs');

const REF = 'https://luonvuituoi.co';
const OURS = 'https://ecom1-production-5a8d.up.railway.app';

function format(px) { return parseFloat(px) || 0; }

(async () => {
  const browser = await chromium.launch({ headless: true });

  for (const { site, label, url } of [
    { site: REF, label: 'ref', url: REF },
    { site: OURS, label: 'our', url: OURS },
  ]) {
    const ctx = await browser.newContext({ viewport: { width: 1920, height: 1080 }, deviceScaleFactor: 1 });
    const page = await ctx.newPage();
    await page.goto(url, { waitUntil: 'networkidle', timeout: 30000 });
    await page.waitForTimeout(3000);

    // Take full-page screenshot
    await page.screenshot({ path: `screenshots/fp_${label}_desktop.png`, fullPage: true });

    // Dump ALL computed CSS for every major structural element
    const dump = await page.evaluate(() => {
      const results = {};
      const f = (px) => parseFloat(px) || 0;

      // Helper to get computed for first match
      function get(el, name) {
        if (!el) return 'N/A';
        const cs = getComputedStyle(el);
        return {
          tag: el.tagName,
          id: el.id,
          cls: el.className.substring(0, 60),
          w: el.offsetWidth,
          h: el.offsetHeight,
          display: cs.display,
          position: cs.position,
          flexDirection: cs.flexDirection,
          alignItems: cs.alignItems,
          justifyContent: cs.justifyContent,
          flexWrap: cs.flexWrap,
          mt: f(cs.marginTop),
          mr: f(cs.marginRight),
          mb: f(cs.marginBottom),
          ml: f(cs.marginLeft),
          pt: f(cs.paddingTop),
          pr: f(cs.paddingRight),
          pb: f(cs.paddingBottom),
          pl: f(cs.paddingLeft),
          gap: cs.gap,
          gridTemplateColumns: cs.gridTemplateColumns,
          bg: cs.backgroundColor,
          minH: f(cs.minHeight),
          maxH: cs.maxHeight,
          overflow: cs.overflow,
          zIndex: cs.zIndex,
        };
      }

      // Wrapper structure
      results.wrapper = get(document.getElementById('wrapper'));
      results.content = get(document.getElementById('content'));

      // Body direct children
      results.bodyChildren = Array.from(document.body.children).slice(0, 15).map(c => ({
        tag: c.tagName,
        id: c.id,
        cls: c.className.substring(0, 60),
        w: c.offsetWidth,
        h: c.offsetHeight,
        ...(() => { const cs = getComputedStyle(c); return {           display: cs.display, mt: f(cs.marginTop), mb: f(cs.marginBottom), pt: f(cs.paddingTop), pb: f(cs.paddingBottom), minH: f(cs.minHeight) }; })(),
      }));

      // Header
      const headerEl = document.querySelector('.m-header, .m-header__desktop, header.header, [class*="header"]');
      results.header = get(headerEl);
      if (headerEl) {
        results.headerChildren = Array.from(headerEl.children).slice(0, 5).map(c => get(c));
      }

      // Hero / Slideshow
      const heroEl = document.querySelector('.m-hero, .slideshow, .m-slideshow, [class*="slideshow"]');
      results.hero = get(heroEl);
      if (heroEl) {
        results.heroChildren = Array.from(heroEl.children).slice(0, 5).map(c => get(c));
        // Get slide content
        const slide = heroEl.querySelector('.m-hero__slide, .swiper-slide, .m-slide');
        if (slide) {
          results.heroSlide = get(slide);
          const slideChildren = Array.from(slide.children).slice(0, 5).map(c => get(c));
          results.heroSlide = { ...results.heroSlide, children: slideChildren };
        }
      }

      // Sections between hero and footer
      const allSections = document.querySelectorAll('.m-section, section[class*="section"], .shopify-section');
      results.sections = Array.from(allSections).slice(0, 10).map(s => {
        const cs = getComputedStyle(s);
        const firstGrid = s.querySelector('.m-product-grid, .product-grid, .collection-grid, .m-cat-grid');
        return {
          cls: s.className.substring(0, 50),
          w: s.offsetWidth,
          h: s.offsetHeight,
          display: cs.display,
          mt: f(cs.marginTop),
          mb: f(cs.marginBottom),
          pt: f(cs.paddingTop),
          pb: f(cs.paddingBottom),
          bg: cs.backgroundColor,
          minH: f(cs.minHeight),
          grid: firstGrid ? (() => { const gcs = getComputedStyle(firstGrid); return { w: firstGrid.offsetWidth, cols: gcs.gridTemplateColumns, gap: gcs.gap, childCount: firstGrid.children.length, firstChildW: firstGrid.children[0] ? firstGrid.children[0].offsetWidth : 0 }; })() : null,
        };
      });

      // Product cards (first few)
      const cards = document.querySelectorAll('.m-product-card, .product-card, [class*="product-card"]');
      if (cards.length > 0) {
        const card = cards[0];
        const ccs = getComputedStyle(card);
        results.productCard = {
          w: card.offsetWidth,
          h: card.offsetHeight,
          mb: f(ccs.marginBottom),
        };
        const media = card.querySelector('[class*="media"], [class*="image"]');
        if (media) {
          const mcs = getComputedStyle(media);
          results.productCardMedia = { w: media.offsetWidth, h: media.offsetHeight, ratio: (media.offsetWidth / media.offsetHeight).toFixed(2), aspectRatio: mcs.aspectRatio, objectFit: mcs.objectFit };
          const img = media.querySelector('img');
          if (img) {
            results.productCardImg = { w: img.offsetWidth, h: img.offsetHeight, natW: img.naturalWidth, natH: img.naturalHeight };
          }
        }
        const info = card.querySelector('[class*="info"], [class*="content"]');
        if (info) {
          const ics = getComputedStyle(info);
          results.productCardInfo = { pt: f(ics.paddingTop), pb: f(ics.paddingBottom) };
        }
      }

      // Newsletter
      const newsletter = document.querySelector('.m-newsletter-section, .newsletter-section, .m-footer-newsletter');
      results.newsletter = get(newsletter);

      // Footer
      const footerEl = document.querySelector('.m-footer, footer.footer, [class*="footer"]');
      results.footer = get(footerEl);
      if (footerEl) {
        results.footerChildren = Array.from(footerEl.children).slice(0, 4).map(c => get(c));
      }

      // Page width containers
      const pws = document.querySelectorAll('.page-width, .container, .m-page');
      results.pageWidths = Array.from(pws).slice(0, 5).map(p => {
        const cs = getComputedStyle(p);
        return { cls: p.className.substring(0, 50), w: p.offsetWidth, h: p.offsetHeight, pt: f(cs.paddingTop), pb: f(cs.paddingBottom), mt: f(cs.marginTop), mb: f(cs.marginBottom) };
      });

      return results;
    });

    fs.writeFileSync(`screenshots/css_${label}_desktop.json`, JSON.stringify(dump, null, 2));
    console.log(`\n=== ${label.toUpperCase()} DESKTOP DUMP ===`);
    console.log(`Screenshot: screenshots/fp_${label}_desktop.png`);
    console.log(`CSS dump: screenshots/css_${label}_desktop.json`);

    // Print key comparisons
    if (dump.hero) console.log(`Hero: ${dump.hero.w}x${dump.hero.h}, mt=${dump.hero.mt} mb=${dump.hero.mb} pt=${dump.hero.pt} pb=${dump.hero.pb} minH=${dump.hero.minH}`);
    if (dump.header) console.log(`Header: ${dump.header.w}x${dump.header.h}, pos=${dump.header.position}, bg=${dump.header.bg}`);
    if (dump.productCard) console.log(`ProductCard: ${dump.productCard.w}x${dump.productCard.h}, mb=${dump.productCard.mb}`);
    if (dump.productCardMedia) console.log(`  Media: ${dump.productCardMedia.w}x${dump.productCardMedia.h}, ratio=${dump.productCardMedia.ratio}, objFit=${dump.productCardMedia.objectFit}`);
    if (dump.footer) console.log(`Footer: ${dump.footer.w}x${dump.footer.h}, pt=${dump.footer.pt} pb=${dump.footer.pb} bg=${dump.footer.bg}`);
    console.log(`Sections:`);
    dump.sections.forEach((s, i) => console.log(`  [${i}] ${s.cls}: ${s.w}x${s.h}, mt=${s.mt} mb=${s.mb} pt=${s.pt} pb=${s.pb} bg=${s.bg} minH=${s.minH}`));
    if (dump.productCard && dump.productCardMedia) {
      console.log(`Card ratio: ${dump.productCardMedia.ratio} (ref is ~1.9:1 portrait)`);
    }

    await ctx.close();
  }

  await browser.close();
  console.log('\n=== DONE ===');
})();
