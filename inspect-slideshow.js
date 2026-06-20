const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ headless: true });
  const page = await browser.newPage({ viewport: { width: 1920, height: 1080 } });
  
  await page.goto('https://ecom1-production-5a8d.up.railway.app/', { waitUntil: 'networkidle', timeout: 30000 });
  await page.waitForTimeout(2000);
  
  const slideshow = await page.evaluate(() => {
    const wrapper = document.querySelector('.m-slideshow-wrapper');
    if (!wrapper) return { error: 'No wrapper' };
    
    const cs = getComputedStyle(wrapper);
    const result = {
      tag: wrapper.tagName,
      classes: wrapper.className,
      w: wrapper.offsetWidth,
      h: wrapper.offsetHeight,
      display: cs.display,
      position: cs.position,
      overflow: cs.overflow,
      opacity: cs.opacity,
      visibility: cs.visibility,
      transform: cs.transform,
      children: Array.from(wrapper.children).map(c => {
        const ccs = getComputedStyle(c);
        return {
          tag: c.tagName,
          cls: c.className.substring(0, 60),
          w: c.offsetWidth,
          h: c.offsetHeight,
          display: ccs.display,
          position: ccs.position,
          opacity: ccs.opacity,
          visibility: ccs.visibility,
          overflow: ccs.overflow,
          // Check for images within
          imgs: Array.from(c.querySelectorAll('img')).map(img => ({
            src: img.src.substring(0, 100),
            w: img.offsetWidth,
            h: img.offsetHeight,
            naturalW: img.naturalWidth,
            naturalH: img.naturalHeight,
            display: getComputedStyle(img).display,
            objectFit: getComputedStyle(img).objectFit,
          })),
          // Check for background images
          bgImage: ccs.backgroundImage,
          bgSize: ccs.backgroundSize,
        };
      }),
    };
    return result;
  });
  console.log('=== SLIDESHOW WRAPPER ===');
  console.log(JSON.stringify(slideshow, null, 2));
  
  // Also check what the m-hero looks like when screenshot
  // Let's dump the CSS for .m-hero related styles
  const heroStyles = await page.evaluate(() => {
    const hero = document.querySelector('.m-hero');
    if (!hero) return null;
    const cs = getComputedStyle(hero);
    return {
      display: cs.display,
      position: cs.position,
      width: cs.width,
      height: cs.height,
      maxHeight: cs.maxHeight,
      minHeight: cs.minHeight,
      overflow: cs.overflow,
      alignItems: cs.alignItems,
      justifyContent: cs.justifyContent,
      flexDirection: cs.flexDirection,
    };
  });
  console.log('\n=== HERO CSS ===');
  console.log(JSON.stringify(heroStyles, null, 2));
  
  // And the hero's CSS - let's extract computed values for all hero slides
  const slideDetails = await page.evaluate(() => {
    const slides = document.querySelectorAll('.m-hero__slide');
    return Array.from(slides).map(s => {
      const cs = getComputedStyle(s);
      return {
        cls: s.className,
        w: s.offsetWidth,
        h: s.offsetHeight,
        position: cs.position,
        flex: cs.flex,
        flexShrink: cs.flexShrink,
        opacity: cs.opacity,
        // Check inline style
        inlineTransform: s.style.transform || 'none',
        inlineOpacity: s.style.opacity || 'auto',
        // Image inside
        img: Array.from(s.querySelectorAll('img')).map(img => ({
          src: img.src.substring(0, 80),
          w: img.offsetWidth,
          h: img.offsetHeight,
          display: getComputedStyle(img).display,
        })),
        bgImage: cs.backgroundImage,
      };
    });
  });
  console.log('\n=== SLIDES ===');
  console.log(JSON.stringify(slideDetails, null, 2));

  await browser.close();
})();
