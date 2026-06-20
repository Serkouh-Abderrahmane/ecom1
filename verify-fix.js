const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ headless: true });
  const page = await browser.newPage({ viewport: { width: 1920, height: 1080 } });
  
  await page.goto('https://ecom1-production-5a8d.up.railway.app/', { waitUntil: 'networkidle', timeout: 30000 });
  await page.waitForTimeout(3000);
  
  // 1. Check hero slideshow
  const heroCheck = await page.evaluate(() => {
    const hero = document.querySelector('.m-hero');
    if (!hero) return { error: 'No .m-hero element' };
    const hCS = getComputedStyle(hero);
    const wrapper = document.querySelector('.m-slideshow-wrapper');
    if (!wrapper) return { error: 'No slideshow wrapper' };
    const wCS = getComputedStyle(wrapper);
    const activeSlide = document.querySelector('.m-hero__slide.active');
    if (!activeSlide) return { error: 'No active slide' };
    const sCS = getComputedStyle(activeSlide);
    const slideImg = activeSlide.querySelector('.m-hero__image');
    return {
      hero: { h: hero.offsetHeight, display: hCS.display, overflow: hCS.overflow },
      wrapper: { h: wrapper.offsetHeight, display: wCS.display },
      slide: { h: activeSlide.offsetHeight, display: sCS.display, position: sCS.position, opacity: sCS.opacity },
      image: slideImg ? { w: slideImg.offsetWidth, h: slideImg.offsetHeight, bgImage: getComputedStyle(slideImg).backgroundImage ? 'yes' : 'no' } : 'no .m-hero__image',
      slides: document.querySelectorAll('.m-hero__slide').length,
      nav: document.querySelector('.m-slideshow-nav') ? true : false,
      dots: document.querySelectorAll('.m-slideshow-dot').length,
    };
  });
  console.log('=== HERO CHECK ===');
  console.log(JSON.stringify(heroCheck, null, 2));
  
  // 2. Take screenshot
  await page.screenshot({ path: 'screenshots/homepage-hero-fixed.png', fullPage: true });
  console.log('Screenshot saved');
  
  // 3. Check product cards
  const productCheck = await page.evaluate(() => {
    const cards = document.querySelectorAll('.m-product-card');
    if (cards.length === 0) return { error: 'No product cards' };
    const firstCard = cards[0];
    const media = firstCard.querySelector('.m-product-card__media');
    const info = firstCard.querySelector('.m-product-card__info');
    return {
      totalCards: cards.length,
      card: { w: firstCard.offsetWidth, h: firstCard.offsetHeight },
      media: media ? { w: media.offsetWidth, h: media.offsetHeight, aspectRatio: (media.offsetWidth / media.offsetHeight).toFixed(2) } : 'no media',
      img: media ? (() => { const img = media.querySelector('img'); return img ? { w: img.offsetWidth, h: img.offsetHeight, naturalW: img.naturalWidth, naturalH: img.naturalHeight } : 'no img'; })() : 'n/a',
      info: info ? { pt: getComputedStyle(info).paddingTop } : 'no info',
    };
  });
  console.log('\n=== PRODUCT CHECK ===');
  console.log(JSON.stringify(productCheck, null, 2));
  
  // 4. Check header
  const headerCheck = await page.evaluate(() => {
    const header = document.querySelector('.m-header__desktop');
    if (!header) return { error: 'No header' };
    const hCS = getComputedStyle(header);
    const logo = document.querySelector('.m-logo img');
    return {
      header: { h: header.offsetHeight, bg: hCS.backgroundColor, position: hCS.position, top: hCS.top },
      logo: logo ? { w: logo.offsetWidth, h: logo.offsetHeight } : 'no logo',
      menuLinks: document.querySelectorAll('.m-menu > li > a').length,
    };
  });
  console.log('\n=== HEADER CHECK ===');
  console.log(JSON.stringify(headerCheck, null, 2));

  await browser.close();
})();
