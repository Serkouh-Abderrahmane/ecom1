const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ headless: true });
  const page = await browser.newPage({ viewport: { width: 1920, height: 1080 } });
  
  await page.goto('https://ecom1-production-5a8d.up.railway.app/', { waitUntil: 'networkidle', timeout: 30000 });
  await page.waitForTimeout(2000);
  
  // 1. Page structure - first 20 children of wrapper
  const structure = await page.evaluate(() => {
    const wrapper = document.getElementById('wrapper');
    if (!wrapper) return { error: 'No #wrapper', bodyChildren: Array.from(document.body.children).map(c => ({ tag: c.tagName, id: c.id, cls: c.className.substring(0, 60), w: c.offsetWidth, h: c.offsetHeight })) };
    return {
      wrapper: { w: wrapper.offsetWidth, h: wrapper.offsetHeight, display: getComputedStyle(wrapper).display },
      children: Array.from(wrapper.children).map(c => ({ tag: c.tagName, cls: c.className.substring(0, 80), w: c.offsetWidth, h: c.offsetHeight, display: getComputedStyle(c).display }))
    };
  });
  console.log('=== WRAPPER STRUCTURE ===');
  console.log(JSON.stringify(structure, null, 2));
  
  // 2. Hero slideshow investigation
  const hero = await page.evaluate(() => {
    // Try multiple selectors
    const selectors = ['.m-hero__slideshow', '.hero', '.slideshow', '[class*=hero]', '[class*=slideshow]'];
    for (const sel of selectors) {
      const el = document.querySelector(sel);
      if (el) {
        const cs = getComputedStyle(el);
        return {
          selector: sel,
          tag: el.tagName,
          classes: el.className,
          w: el.offsetWidth,
          h: el.offsetHeight,
          display: cs.display,
          visibility: cs.visibility,
          overflow: cs.overflow,
          opacity: cs.opacity,
          position: cs.position,
          maxHeight: cs.maxHeight,
          minHeight: cs.minHeight,
          paddingTop: cs.paddingTop,
          paddingBottom: cs.paddingBottom,
          marginTop: cs.marginTop,
          marginBottom: cs.marginBottom,
          bg: cs.background,
          children: Array.from(el.children).slice(0,3).map(c => ({
            tag: c.tagName,
            cls: c.className.substring(0,50),
            w: c.offsetWidth,
            h: c.offsetHeight,
            display: getComputedStyle(c).display
          }))
        };
      }
    }
    return { error: 'No hero found with any selector' };
  });
  console.log('\n=== HERO INFO ===');
  console.log(JSON.stringify(hero, null, 2));
  
  // 3. Header investigation
  const header = await page.evaluate(() => {
    const selectors = ['.m-header__desktop', '.m-header', 'header', '.header'];
    for (const sel of selectors) {
      const el = document.querySelector(sel);
      if (el) {
        const cs = getComputedStyle(el);
        return {
          selector: sel,
          tag: el.tagName,
          classes: el.className,
          w: el.offsetWidth,
          h: el.offsetHeight,
          display: cs.display,
          position: cs.position,
          bg: cs.backgroundColor,
          zIndex: cs.zIndex,
          top: cs.top,
          children: Array.from(el.children).slice(0,5).map(c => ({
            tag: c.tagName,
            cls: c.className.substring(0,50),
            w: c.offsetWidth,
            h: c.offsetHeight,
            display: getComputedStyle(c).display
          }))
        };
      }
    }
    return { error: 'No header found' };
  });
  console.log('\n=== HEADER INFO ===');
  console.log(JSON.stringify(header, null, 2));
  
  // 4. Logo
  const logo = await page.evaluate(() => {
    const imgs = document.querySelectorAll('img');
    return Array.from(imgs).filter(i => i.src && i.src.includes('logo')).map(l => ({
      src: l.src.split('?')[0],
      w: l.offsetWidth,
      h: l.offsetHeight,
      naturalW: l.naturalWidth,
      naturalH: l.naturalHeight,
      display: getComputedStyle(l).display,
      parentDisplay: getComputedStyle(l.parentElement).display,
      parentTag: l.parentElement.tagName,
      parentClass: l.parentElement.className.substring(0,50),
    }));
  });
  console.log('\n=== LOGO INFO ===');
  console.log(JSON.stringify(logo, null, 2));

  // 5. Footer
  const footer = await page.evaluate(() => {
    const selectors = ['.m-footer', 'footer', '.footer'];
    for (const sel of selectors) {
      const el = document.querySelector(sel);
      if (el) {
        const cs = getComputedStyle(el);
        return {
          selector: sel,
          w: el.offsetWidth,
          h: el.offsetHeight,
          bg: cs.backgroundColor,
          padding: cs.paddingTop + ' ' + cs.paddingRight + ' ' + cs.paddingBottom + ' ' + cs.paddingLeft,
          children: Array.from(el.children).slice(0,4).map(c => ({
            tag: c.tagName,
            cls: c.className.substring(0,50),
            w: c.offsetWidth,
            h: c.offsetHeight,
            display: getComputedStyle(c).display
          }))
        };
      }
    }
    return { error: 'No footer found' };
  });
  console.log('\n=== FOOTER INFO ===');
  console.log(JSON.stringify(footer, null, 2));

  // 6. Product grid columns
  const productGrid = await page.evaluate(() => {
    const grids = document.querySelectorAll('.m-product-grid');
    return Array.from(grids).slice(0,2).map(g => ({
      parent: g.parentElement ? g.parentElement.className.substring(0,40) : 'none',
      w: g.offsetWidth,
      childCount: g.children.length,
      firstChildW: g.children[0] ? g.children[0].offsetWidth : 0,
      firstChildH: g.children[0] ? g.children[0].offsetHeight : 0,
      display: getComputedStyle(g).display,
      gap: getComputedStyle(g).gap,
      gridTemplate: getComputedStyle(g).gridTemplateColumns,
    }));
  });
  console.log('\n=== PRODUCT GRID INFO ===');
  console.log(JSON.stringify(productGrid, null, 2));

  // 7. Section spacing
  const sections = await page.evaluate(() => {
    const secs = document.querySelectorAll('.m-section');
    return Array.from(secs).map(s => ({
      cls: s.className.substring(0,50),
      w: s.offsetWidth,
      h: s.offsetHeight,
      mt: getComputedStyle(s).marginTop,
      mb: getComputedStyle(s).marginBottom,
      pt: getComputedStyle(s).paddingTop,
      pb: getComputedStyle(s).paddingBottom,
    }));
  });
  console.log('\n=== SECTIONS INFO ===');
  console.log(JSON.stringify(sections, null, 2));

  await browser.close();
})();
