# REFERENCE_WEBSITE_ANALYSIS.md

## Luon Vuituoi - Complete Website Reference

> **Purpose**: This document is a comprehensive reference of the existing Shopify-based website for rebuilding as a static HTML/CSS/JS project. It captures every section, component, design decision, and behavior from the original site.

---

## 1. PROJECT OVERVIEW
a
| Aspect | Detail |
|--------|--------|
| **Brand** | Luon Vuituoi ("Be Fun. Be You. Be Vui Tuoi") |
| **Domain** | luonvuituoi.co |
| **Platform** | Shopify |
| **Theme** | Minimog - OS 2.0 (v5.5.0) |
| **Product Type** | Apparel / Fashion e-commerce (T-shirts, hoodies, sweaters, joggers, bags, etc.) |
| **Language** | Vietnamese (vi) |
| **Currency** | Vietnamese Dong (VND) |
| **Locale** | VN |
| **Timezone Offset** | +7:00 (ICT) |
| **Shop ID** | 91855978816 |
| **Page Type** | Homepage (`pageType: "index"`) |
| **Color Scheme** | Light theme with dark sections (Soft Routine collection section is dark) |
| **Design Style** | Clean, modern, minimal, utility-first (Tailwind-like approach via Minimog theme) |

---

## 2. THEME & FRAMEWORK

### Theme Details
- **Name**: Minimog - OS 2.0
- **Version**: 5.5.0
- **Theme ID**: 174935048512
- **Role**: Main (not from Shopify Theme Store -- custom)
- **Base Font**: Jost (Google Font, loaded via Shopify CDN)

### CSS Architecture
The site uses a **utility-first CSS approach** (similar to Tailwind) with a custom naming convention:

| Prefix | Meaning | Example |
|--------|---------|---------|
| `m\:` | Utility classes (escaped colon in CSS) | `m\:flex`, `m\:grid-2-cols`, `m\:w-1/4` |
| `m-` | Component classes | `m-section`, `m-product-card`, `m-footer` |
| `.sf__` | Legacy theme prefix | `sf__text-stroke`, `sf__tab-item` |

### Responsive Breakpoints
| Breakpoint | Min Width | Usage |
|------------|-----------|-------|
| `sm:` | 640px | Small tablets |
| `md:` | 768px | Tablets |
| `lg:` | 1024px | Desktop |
| `xl:` | 1280px | Large desktop |

### CSS Cascade Order
1. Inline `<style>` blocks in `<head>` (base reset, fonts, typography)
2. `main0718.css` (142KB - primary framework)
3. `vendor8d82.css` (6KB - Swiper + vendor styles)
4. `cart9e89.css` (10KB - cart-specific)
5. `custom-styled8d7.css` (7KB - custom overrides)
6. Various component CSS loaded on-demand

---

## 3. COLOR SYSTEM

### CSS Custom Properties (Design Tokens)

#### Default Theme (`:root, .m-color-default`)
| Property | RGB Value | Hex Equivalent | Usage |
|----------|-----------|----------------|-------|
| `--color-background` | 255,255,255 | #ffffff | Page background |
| `--color-background-secondary` | 245,245,245 | #f5f5f5 | Secondary bg |
| `--gradient-background` | - | #ffffff | Bg gradient |
| `--color-foreground` | 38,38,38 | #262626 | Body text |
| `--color-foreground-secondary` | 43,43,43 | #2b2b2b | Secondary text |
| `--color-heading` | 34,34,34 | #222222 | Heading text |
| `--color-button` | 0,0,0 | #000000 | Button bg |
| `--color-button-text` | 255,255,255 | #ffffff | Button text |
| `--color-outline-button` | 0,0,0 | #000000 | Outline button border |
| `--color-button-hover` | 34,34,34 | #222222 | Button hover bg |
| `--color-button-text-hover` | 255,255,255 | #ffffff | Button hover text |
| `--color-border` | 238,238,238 | #eeeeee | Borders |
| `--color-price-sale` | 232,78,78 | #e84e4e | Sale price |
| `--color-price-regular` | 0,0,0 | #000000 | Regular price |
| `--color-form-field` | 255,255,255 | #ffffff | Form bg |
| `--color-form-field-text` | 0,0,0 | #000000 | Form text |
| `--color-tooltip` | 34,34,34 | #222222 | Tooltip bg |
| `--color-tooltip-text` | 255,255,255 | #ffffff | Tooltip text |

#### Dark Theme (`.m-color-dark` - used for "Soft Routine" section)
| Property | RGB Value | Hex |
|----------|-----------|-----|
| `--color-background` | 0,0,0 | #000000 |
| `--color-foreground` | 255,255,255 | #ffffff |
| `--color-heading` | 255,255,255 | #ffffff |
| `--color-button` | 255,255,255 | #ffffff |
| `--color-button-text` | 34,34,34 | #222222 |
| `--color-price-regular` | 255,255,255 | #ffffff |
| `--color-border` | 75,75,75 | #4b4b4b |

#### Footer Theme (`.m-color-footer`)
| Property | RGB Value | Hex |
|----------|-----------|-----|
| `--color-background` | 245,245,245 | #f5f5f5 |
| `--color-foreground` | 0,0,0 | #000000 |
| `--color-foreground-secondary` | 102,102,102 | #666666 |
| `--color-heading` | 34,34,34 | #222222 |
| `--color-button` | 34,34,34 | #222222 |
| `--color-border` | 222,222,222 | #dedede |

#### Badge Themes
| Theme | Background | Text | Usage |
|-------|-----------|------|-------|
| `m-color-badge-hot` | #9a84c2 (purple) | #ffffff | Hot badge |
| `m-color-badge-new` | #49a594 (teal) | #ffffff | New badge |
| `m-color-badge-sale` | #da3f3f (red) | #ffffff | Sale badge |

#### Ancillary Colors
| Property | Value | Usage |
|----------|-------|-------|
| `--color-cart-wishlist-count` | #ffffff | Count bubble text |
| `--bg-cart-wishlist-count` | #da3f3f | Count bubble bg |
| `--color-image-overlay` | #000000 | Image overlay color |
| `--opacity-image-overlay` | 0.2 | Overlay opacity |
| `--color-success` | 58,135,53 | Success notifications |
| `--color-warning` | 210,134,26 | Warning notifications |
| `--color-error` | 218,63,63 | Error notifications |
| `--color-error-bg` | #fbeaea | Error bg |
| `--color-warning-bg` | #faecd7 | Warning bg |
| `--color-success-bg` | #d1eccf | Success bg |
| `--text-black` | 0,0,0 | Black text |
| `--text-white` | 255,255,255 | White text |
| `--bg-black` | 0,0,0 | Black bg |
| `--bg-white` | 255,255,255 | White bg |

---

## 4. TYPOGRAPHY

### Font Family
- **Primary (Body)**: Jost, sans-serif (`--font-stack-body`)
- **Primary (Header)**: Jost, sans-serif (`--font-stack-header`)

### Font Weights
| Weight | Usage |
|--------|-------|
| 400 (normal) | Body text |
| 500 (medium) | Button text |
| 600 (semibold) | Header lighter |
| 700 (bold) | Headings default |
| 900 (black) | Header bolder |

### Font Size Scale
| Size | Desktop | Tablet | Mobile |
|------|---------|--------|--------|
| h1 | 48px | 42px | 36px |
| h2 | 36px | 34px | 28px |
| h3 | 28px | 26px | 22px |
| h4 | 24px | 22px | 20px |
| h5 | 20px | 18px | 18px |
| h6 | 18px | 16px | 16px |
| Body | 16px | 16px | 16px |
| Button | 16px | 16px | 16px |

### Line Heights
| Element | Line Height |
|---------|-------------|
| Body base | 28px |
| h1 | 1.167-1.278 |
| h2 | 1.238-1.267 |
| h3 | 1.278-1.36 |
| h4 | 1.333-1.4 |
| h5/h6 | 1.5 |
| Button | 23px |

### Letter Spacing
- Headings: 0px (normal)
- Buttons: 0px

### Custom Typography CSS Classes
```css
.sf__text-stroke {
  /* Large outlined text for decorative headings */
  font-size: 110px; font-style: italic; text-transform: uppercase;
  -webkit-text-stroke: 0.5px #dfdfdf;
}
.text-stroke-1 {
  /* Smaller outlined text variant */
  font-size: 48px; font-style: normal; -webkit-text-stroke: 1px dimgray;
}
.sf__text-scroll {
  /* Scrolling ticker text */
  font-size: 48px;
}
```

---

## 5. HEADER / NAVIGATION

### Layout
- **Design**: `logo-center__2l` (logo centered, 2-line layout)
- **Sticky**: Always sticky (`data-sticky="always"`)
- **Container**: Full-width (container-fluid)

### Logo
- **Image**: `cdn/shop/files/Luon_Vuituoi_Bold_Den_Newa7e9.png` (400x44px)
- **Display Width**: 180px (desktop + mobile + sticky)
- **Aspect Ratio**: 9.09

### Desktop Navigation (10 top-level items)

| # | Label | URL | Has Submenu? | Sub-items |
|---|-------|-----|--------------|-----------|
| 1 | TRANG CHU | `/` | No | - |
| 2 | AO THUN RELAXED FIT | `/collections/ao-thun` | Yes | 24 sub-items (The Thao with 3rd level, Chuyen Phong Gym, Love Bites, Duy Meo, etc.) |
| 3 | AO THUN RINGER | `/collections/ao-thun-ringer` | Yes | 10 sub-items |
| 4 | TUI CANVAS | `/collections/tui-tote` | No | - |
| 5 | AO BA LO | `/collections/ao-ba-lo` | Yes | 13 sub-items |
| 6 | AO THUN DAI TAY | `/collections/ao-thun-dai-tay` | Yes | 11 sub-items |
| 7 | AO SWEATER | `/collections/ao-sweater` | Yes | 12 sub-items |
| 8 | AO HOODIE | `/collections/ao-hoodie` | Yes | 12 sub-items |
| 9 | QUAN JOOGER & QUAN ONG SUONG | `/collections/quan-jogger-quan-ong-suong` | No | - |
| 10 | SOFT ROUTINE | `/collections/soft-routine` | No | - |

### Navigation Icons (Desktop Header)
- **Search**: Magnifying glass icon (opens search drawer)
- **Account**: Person silhouette icon (links to `/account/login`)
- **Cart**: Shopping bag icon with count bubble (links to `/cart`)

### Mobile Navigation
- **Hamburger button**: 3-line hamburger icon
- **Drawer**: Full-screen drawer (`#m-menu-drawer`) with:
  - Same 10-item menu tree
  - Back buttons for submenus
  - Customer section: Login (`/account/login`) / Register (`/account/register`)
  - Empty language/currency placeholder

### Search Drawer
- **Trigger**: Click on search icon
- **Type**: Predictive search (`<predictive-search>`)
- **Form**: GET to `/search` with fields: `q`, `options[unavailable_products]=last`, `options[prefix]=last`, `options[fields]=title,vendor,product_type,variants.title`
- **Popular searches**: "He he he", "Tre nguoi non stop", "Nguoi giau ..."
- **Includes**: Logo (left), Account icon, Cart icon

---

## 6. HERO SLIDESHOW

### Section Configuration
| Attribute | Value |
|-----------|-------|
| **Section ID** | `template--23956493893952__1621243260e1af0c20` |
| **Type** | Slider (Swiper-based) |
| **Autoplay** | 4 seconds |
| **Arrows** | Disabled |
| **Pagination** | Enabled (vertical dots, right side, dark circle style) |
| **Slide Height** | `adapt` (aspect ratio based) |
| **Content Alignment** | Middle-left |
| **Text Size** | `text-large` |
| **Aspect Ratio** | 2.133 (4000x1875 = ~32:15) |
| **Controls Color** | #222222 |
| **Full Height?** | No (adapts to image) |

### Slides (6 total, all are full-image banners with NO text overlays)

| Slide | Collection Link | Image File | Image Dimensions |
|-------|----------------|------------|------------------|
| 0 | `/collections/fruitland` | `Banner_Ngang_5.png` | 4000x1875 |
| 1 | `/collections/pickleball` | `Banner_Ngang_4.png` | 4000x1875 |
| 2 | `/collections/duy-meo` | `Banner_Ngang_3.png` | 4000x1875 |
| 3 | `/collections/love-bites` | `Banner_Ngang_3.png` (different hash) | 4000x1875 |
| 4 | `/collections/cau-long` (badminton) | `Banner_Ngang_2.png` | 4000x1875 |
| 5 | `/collections/billiard` | `Banner_Ngang_1.png` | 4000x1875 |

### Slide HTML Structure
```html
<div data-slide="N" class="swiper-slide" data-slide-type="slider_item">
  <div class="m-slide m-slide--middle-left m-slide--text-large m-slide--has-link">
    <div class="m-slide__media" style="--aspect-ratio: 2.133; --aspect-ratio-mobile: 2.133">
      <a href="collections/xxx.html" class="m-hidden-link"></a>
      <div class="m-slide__bg">
        <picture>
          <img src="cdn/shop/files/xxx.png?v=...&w=3840"
               alt="slider image xxx"
               srcset="..."
               width="4000" height="1875"
               loading="lazy" fetchpriority="low"
               sizes="100vw">
        </picture>
      </div>
    </div>
    <div class="m-slider__footer m-slider__footer--end container-fluid
         m:flex m:items-center m:justify-end m:text-black"
         style="--btn-color: #000;">
      <span></span>  <!-- empty - no text content -->
    </div>
  </div>
</div>
```

### Navigation Controls (below slides)
```html
<div class="m-slider-controls m-slider-controls--absolute
     m-slider-controls--show-pagination
     m-slider-controls--pagination-right
     m-slider-controls--middle-right"
     style="--swiper-controls-color: #222222;">
  <div class="m-slider-controls__wrapper">
    <div class="swiper-pagination m:w-full m-dot-circle
         m-dot-circle--dark swiper-pagination--vertical">
    </div>
  </div>
</div>
```

---

## 7. COLLECTION LIST GRID ("Kham pha cac bo suu tap")

### Section Configuration
| Attribute | Value |
|-----------|-------|
| **Section ID** | `template--23956493893952__16225316461d1cff80` |
| **Type** | Collection List (Swiper slider with grid) |
| **Container** | `container-fluid` |
| **Hover Effect** | `scaling-up` |
| **Padding Top** | 100px |
| **Padding Bottom** | 0px |
| **Column Gap** | 40px (16px mobile) |
| **Row Gap** | 40px (16px mobile) |
| **Items per View** | 3 (desktop) |
| **Autoplay** | Disabled |
| **Pagination** | Fraction (1/17, 2/17...) |
| **Controls** | Prev/Next arrows + fraction pagination |

### Heading
```html
<h2 class="m-section__heading h3">Khám phá các bộ sưu tập</h2>
```
With a "Xem them" button linking to `/collections/ao-thun`.

### 17 Collection Cards

| # | Collection Name | Item Count | URL |
|---|-----------------|------------|-----|
| 1 | Chuyen Phong Gym | 45 muc | `/collections/chuyen-phong-gym` |
| 2 | PickleBall | 32 muc | `/collections/pickleball` |
| 3 | Nha Khoi | 30 muc | `/collections/nha-khoi` |
| 4 | Viet Nam Du Hi | 33 muc | `/collections/viet-nam-du-hi` |
| 5 | Nham Nhi | 54 muc | `/collections/nham-nhi` |
| 6 | Tuyet Doi Dien Anh | 58 muc | `/collections/tuyet-doi-dien-anh` |
| 7 | Doi Game Thu | 41 muc | `/collections/doi-game-thu` |
| 8 | Nghi Le Het Co | 78 muc | `/collections/nghi-le-het-co` |
| 9 | Duy Meo | 119 muc | `/collections/duy-meo` |
| 10 | Troi Boi | 109 muc | `/collections/troi-boi` |
| 11 | Fruitland | 67 muc | `/collections/fruitland` |
| 12 | Luon Yeu Nuoc | 31 muc | `/collections/luon-yeu-nuoc` |
| 13 | Love Bites | 134 muc | `/collections/love-bites` |
| 14 | May Chuyen Linh Tinh | 254 muc | `/collections/may-chuyen-linh-tinh` |
| 15 | Nghe Nghiep | 144 muc | `/collections/ao-thun-nghe-nghiep` |
| 16 | Rap Xiec Dong Vat | 84 muc | `/collections/rap-xiec-dong-vat` |
| 17 | Van Hoa Viet Nam | 53 muc | `/collections/van-hoa-viet-nam` |

### Collection Card HTML Structure

```html
<div class="m:column swiper-slide">
  <div class="m-collection-card m-collection-card--inside
              m-scroll-trigger animate--fade-in"
       data-cascade style="--animation-order: N;">
    <div class="m-collection-card__inner m-hover-box m-hover-box--scale-up">
      <a href="collections/xxx.html"
         class="m-collection-card__image m:block m:w-full m:blocks-radius"
         aria-label="Collection Name">
        <div class="m-hover-box__wrapper">
          <responsive-image class="m-image"
                            style="--aspect-ratio: 1.0;">
            <img srcset="..." src="..." sizes="..."
                 alt="" loading="lazy"
                 class="m:w-full" width="1024" height="1024">
          </responsive-image>
        </div>
      </a>
      <div class="m-collection-card__info m:text-left">
        <h3 class="m-collection-card__title">
          <a class="m-collection-card__link m:block"
             href="collections/xxx.html">Collection Name</a>
        </h3>
        <p class="m-collection-card__product-count">N mục</p>
        <a class="m-button m-button--white m:justify-center m:items-center"
           href="collections/xxx.html" aria-label="...">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13"
               fill="none" viewBox="0 0 14 13">
            <path fill="currentColor" d="M6.78594.789062c.16406-.145833
              .31901-.145833.46484 0L12.9656 6.53125c.1641.14583.1641.29167
              0 .4375L7.25078 12.7109c-.14583.1459-.30078.1459-.46484
              0l-.54688-.5468c-.05469-.0547-.08203-.1276-.08203-.2188
              0-.0911.02734-.1732.08203-.2461l4.23824-4.23826H1.15312c-.218745
              0-.32812-.10938-.32812-.32813v-.76562c0-.21875.109375-.32813
              .32812-.32813h9.32418L6.23906 1.80078c-.14583-.16406
              -.14583-.31901 0-.46484l.54688-.546878z"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>
```

---

## 8. CUSTOM COLLECTION SLIDERS ("Tron Bo Hoodie Doc La!" / "Cac BST Sweater Moi Nhat!")

### Overview
Two nearly identical sections using a custom `ss_collection_13` template (not standard Shopify). These are **Swiper-based carousels** showing sub-collection categories with images, titles, and "Mua Ngay!" buttons.

### Section 1: Hoodie Slider
| Attribute | Value |
|-----------|-------|
| **Section ID** | `template--23956493893952__ss_collection_13_iejNDD` |
| **Heading** | "Trọn Bộ Hoodie Độc Lạ!" |
| **Background** | #ffffff |
| **Slides** | 14 |
| **Gap** | 20px (desktop + mobile) |
| **View** | 6 (desktop), 1.5 (mobile) |
| **Loop** | true |
| **Speed** | 300ms |

### Section 2: Sweater Slider
| Attribute | Value |
|-----------|-------|
| **Section ID** | `template--23956493893952__ss_collection_13_r7XyTT` |
| **Heading** | "Các BST Sweater Mới Nhất!" |
| **Background** | #ffffff |
| **Slides** | 12 |

### Slide HTML Structure
```html
<div class="collection-slide-{sectionId} swiper-slide">
  <a href="collections/xxx.html"
     class="collection-media-{sectionId}">
    <img src="cdn/shop/files/xxx.png?v=..."
         alt="" loading="lazy">
  </a>
  <div class="collection-slide-content-{sectionId}">
    <div class="collection-slide-content-top-{sectionId}">
      <p class="collection-title-{sectionId}">Collection Name</p>
    </div>
    <a href="collections/xxx.html"
       class="collection-button-{sectionId}">
      <p class="collection-button-inner-{sectionId}">Mua Ngay !</p>
    </a>
  </div>
</div>
```

### Section Outer HTML Structure
```html
<div class="section-{sectionId} collection-template-{sectionId}"
     style="background-color:#ffffff; background-image: ;">
  <div class="section-{sectionId}-settings">
    <div class="collection-heading-{sectionId}">
      <h2>Trọn Bộ Hoodie Độc Lạ!</h2>
    </div>
    <div class="collection-slider-{sectionId} swiper preview"
         data-gap="20" data-gap-mobile="20"
         data-view="6" data-view-mobile="1.5">
      <div class="collection-slider-wrapper-{sectionId} swiper-wrapper">
        <!-- slides -->
      </div>
    </div>
    <div class="collection-buttons-{sectionId}">
      <button class="collection-btn-prev-{sectionId}">
        <span class="animate-icon"></span>
      </button>
      <button class="collection-btn-next-{sectionId}">
        <span class="animate-icon"></span>
      </button>
    </div>
  </div>
</div>
```

### Navigation Button Structure
```html
<div class="collection-buttons-{sectionId}">
  <button class="collection-btn-prev-{sectionId}">
    <span class="animate-icon"></span>
  </button>
  <button class="collection-btn-next-{sectionId}">
    <span class="animate-icon"></span>
  </button>
</div>
```
- Buttons: 38x38px (48x48px desktop), border-radius 100px, border 1px solid #c7c7c7
- Arrows: CSS-drawn using border pseudo-elements (no SVG)
- Hidden on desktop via `display: none` but functional for Swiper

---

## 9. FEATURED COLLECTION ("Soft Routine")

### Section Configuration
| Attribute | Value |
|-----------|-------|
| **Section ID** | `template--23956493893952__featured_collection_edXVtC` |
| **Type** | `featured-collection` |
| **Theme** | Dark (`m-color-dark`) |
| **Container** | `container-fluid` |
| **Slider Enabled** | false (static grid) |
| **Column Gap** | 30px (16px mobile) |
| **Row Gap** | 40px (30px mobile) |
| **Items** | 4 columns |
| **Hover** | Show second image + scaling |

### Heading
```html
<h2 class="m-section__heading h2">Soft Routine</h2>
```

### 6 Products Displayed

| # | Product Name | Price | Compare At | Discount | URL |
|---|-------------|-------|------------|----------|-----|
| 1 | Quan Jogger Ni Bong Luon Vui Tuoi Basic | 390.000d | 490.000d | -20% | `/products/quan-jogger-ni-bong-luon-vui-tuoi-basic` |
| 2 | Quan Ong Suong Ni Bong Luon Vui Tuoi Basic | 391.000d | 491.000d | -20% | `/products/quan-ong-suong-ni-bong-luon-vui-tuoi-basic` |
| 3 | Ao Thun Relaxed Fit Luon Vui Tuoi Basic | 165.000d | 318.000d | -48% | `/products/ao-thun-relaxed-fit-luon-vui-tuoi-basic` |
| 4 | Ao Thun Dai Tay Luon Vui Tuoi Basic | 189.000d | 375.000d | -49% | `/products/ao-thun-dai-tay-luon-vui-tuoi-basic` |
| 5 | Ao Hoodie Ni Bong Luon Vui Tuoi Basic | 399.000d | 598.000d | -33% | `/products/ao-hoodie-ni-bong-luon-vui-tuoi-basic` |
| 6 | Ao Sweater Ni Bong Luon Vui Tuoi Basic | 399.000d | 399.000d | 0% | `/products/ao-sweater-ni-bong-luon-vui-tuoi-basic-1` |

### Product Card HTML Structure

```html
<div class="swiper-slide m:column">
  <div class="m-product-card m-product-card--style-1
              m-product-card--onsale
              m-product-card--show-second-img
              m-scroll-trigger animate--fade-in"
       data-view="card"
       data-product-id="..."
       data-cascade
       style="--animation-order: N;">
    <!-- MEDIA -->
    <div class="m-product-card__media">
      <a class="m-product-card__link m:block m:w-full"
         href="products/xxx.html" aria-label="Product Name">
        <!-- Primary Image -->
        <div class="m-product-card__main-image">
          <responsive-image class="m-image"
                            style="--aspect-ratio: 0.75">
            <img src="xxx.png?v=...&width=1100"
                 srcset="..." width="1100" height="1467"
                 loading="lazy" fetchpriority="low"
                 class="m:w-full m:h-full"
                 sizes="...">
          </responsive-image>
        </div>
        <!-- Hover Image (2nd image on hover) -->
        <div class="m-product-card__hover-image">
          <responsive-image class="m-image"
                            style="--aspect-ratio: 0.75">
            <img src="xxx_hover.png?v=..." ...>
          </responsive-image>
        </div>
      </a>
      <!-- Tags -->
      <div class="m-product-card__tags">
        <foxkit-preorder-badge class="foxkit-preorder-badge
              !foxkit-hidden m-product-card__tag-name
              m-product-tag m-product-tag--preorder
              m-gradient m-color-dark"
              data-product-id="..."
              data-product-available="true"
              data-collection-ids="..."
              hidden>
          <script type="application/json">...</script>
        </foxkit-preorder-badge>
        <span class="m-product-card__tag-name m-product-tag
             m-product-tag--sale m-gradient m-color-badge-sale">
          -XX%
        </span>
      </div>
      <!-- Sold Out badge (hidden if in stock) -->
      <span class="m-product-tag m-product-tag--soldout
           m-gradient m-color-footer"
           style="display: none;">Ban het</span>
      <!-- Action area (empty) -->
      <div class="m-product-card__action m:hidden lg:m:block"></div>
    </div>
    <!-- CONTENT -->
    <div class="m-product-card__content m:text-left">
      <div class="m-product-card__info">
        <h3 class="m-product-card__title">
          <a href="products/xxx.html"
             class="m-product-card__name">Product Name</a>
        </h3>
        <!-- Price -->
        <div class="m-product-card__price">
          <div class="m-price m:inline-flex m:items-center
                      m:flex-wrap m-price--on-sale"
               data-sale-badge-type="percentage">
            <div class="m-price__regular">
              <span class="m:visually-hidden m:visually-hidden--inline">
                Gia ca phai chang</span>
              <span class="m-price-item m-price-item--regular">
                390.000d</span>
            </div>
            <div class="m-price__sale">
              <span class="m:visually-hidden m:visually-hidden--inline">
                Gia ban</span>
              <span class="m-price-item m-price-item--sale
                    m-price-item--last">390.000d</span>
              <span class="m:visually-hidden m:visually-hidden--inline">
                Gia ca phai chang</span>
              <s class="m-price-item m-price-item--regular">490.000d</s>
            </div>
          </div>
        </div>
        <!-- Klip Coupon Box -->
        <div class="elsklip-coupon-box"
             data-product-id="..."
             data-short
             data-klip-product='{...}'></div>
        <!-- Color Swatches -->
        <div data-limit=""
             data-pcard-variant-picker
             data-product-handle="...">
          <pcard-swatch data-keep-featured-image="true"
                        class="m-product-option
                        m-product-option--image
                        m:flex-wrap m:items-center m:justify-start">
            <swatch-image class="m-product-option--content
                          m:inline-flex m:flex-wrap">
              <label class="m-product-option--node__label"
                     data-option-position="1"
                     data-option-type="image"
                     data-value="Kem"
                     style="--option-aspect-ratio: 0.75">Kem</label>
              <label class="m-product-option--node__label"
                     data-option-position="1"
                     data-option-type="image"
                     data-value="Trang"
                     style="--option-aspect-ratio: 0.75">Trang</label>
              <!-- "+X more" quickview button -->
              <div class="m-product-option--node__label
                   m-product-option--more-option
                   m-product-quickview-button m-spinner-button"
                   data-product-handle="...">
                <span class="m-tooltip m-tooltip--style-2 m-tooltip--top">
                  <span class="text-base">+N</span>
                  <span class="m-tooltip__content">
                    Xem them N tuy chon</span>
                </span>
              </div>
            </swatch-image>
          </pcard-swatch>
        </div>
      </div>
      <!-- Description Footer -->
      <div class="m-product-card__content-footer">
        <div class="m-product-card__description">
          Chat lieu: Ni bong...
        </div>
      </div>
    </div>
    <input hidden name="id" required value="..."
           data-selected-variant="">
  </div>
</div>
```

### Grid Layout
```html
<div class="m-product-list m-slider-control-hover-inside
            m-mixed-layout
            m-mixed-layout--mobile-grid
            m-mixed-layout--mobile-scroll">
  <div class="m-mixed-layout__wrapper">
    <div class="m-mixed-layout__inner m:grid m-cols-4
                m:grid-2-cols md:m:grid-2-cols
                lg:m:grid-3-cols xl:m:grid-4-cols"
         data-products-container>
```

### Bottom Button
```html
<div class="m-featured-collection__button m:display-flex
            m-scroll-trigger animate--fade-in">
  <a class="m-button m-button--primary"
     href="collections/soft-routine.html">Xem Ngay!</a>
</div>
```

---

## 10. FOOTER

### Structure
5 columns inside `m-footer--accordion`:

| Column | Type | Title | Width | Collapsible? |
|--------|------|-------|-------|--------------|
| 1 | Newsletter | "SIGN UP AND SAVE" | `lg:m:w-1/4` | Yes (open by default) |
| 2 | Custom Text | "CONG TY TNHH ZANET" | `lg:m:w-1/4` | Yes (open) |
| 3 | Menu | "THONG TIN & HO TRO KHACH HANG" | `lg:m:w-1/3` | Yes (open) |
| 4 | Custom Text | (no heading) | `lg:m:w-1/4` | No |
| 5 | Custom HTML | BCT badge | `lg:m:w-2/12` | No |

### Footer Links (Column 3)
| Label | URL |
|-------|-----|
| Chinh sach bao mat thong tin | `/pages/chinh-sach-bao-mat-thong-tin` |
| Chinh sach giao, nhan hang va kiem hang | `/pages/chinh-sach-giao-nhan-hang-va-kiem-hang` |
| Chinh sach doi tra | `/pages/chinh-sach-doi-tra` |
| Chinh sach thanh toan | `/pages/chinh-sach-thanh-toan` |
| Dieu khoan dich vu | `/pages/dieu-khoan-dich-vu` |
| Gioi thieu | `/pages/gioi-thieu` |
| Lien He | `/pages/contact` |

### Newsletter Form (Column 1)
```html
<form id="ContactSubscribe-..." method="post"
      action="https://luonvuituoi.co/contact#ContactSubscribe-...">
  <input type="hidden" name="form_type" value="customer">
  <input type="hidden" name="contact[tags]" value="newsletter">
  <input type="email" name="contact[email]"
         class="form-field form-field--input"
         value="" placeholder="Email cua ban"
         autocorrect="off" autocapitalize="off"
         autocomplete="off" spellcheck="false">
  <button type="submit" name="commit"
          class="m-newsletter-form__button--text
                 m-button m-button--primary">Dang ki</button>
</form>
```

### Company Info (Column 2)
- **CONG TY TNHH ZANET** (ZANET Company Limited)
- Tax ID (MST): 0202291489
- Date issued: 12/06/2025, by Financial Department of Hai Phong City
- Address: So 122 duong Khuc Hao, Phuong An Bien, TP Hai Phong

### Social Media
- Links: Facebook, Instagram (configured in Shopify settings but markup empty/placeholders)
- Social icon style: 48x48px circles, #E9E9E9 bg, #222 text, hover: #222 bg, #fff text

### Copyright
```
Copyright (c) 2026, Luon Vuituoi.
```

### Payment Icons
- Container exists but list is empty (no payment icons rendered)

### BCT Badge (Column 5)
- Link to: `http://online.gov.vn/Home/WebDetails/142331`
- Opens in new tab

### Footer Bottom
```html
<div class="m-footer--bottom m-footer--bottom-footer_1">
  <div class="container-fluid">
    <div class="m-footer--bottom-inner m:flex-col xl:m:flex-row">
      <!-- Copyright -->
      <div class="m-footer--copyright">
        <p class="m-footer--copyright-text">
          Copyright (c) 2026, Luon Vuituoi.
        </p>
      </div>
      <!-- Payment Icons -->
      <div class="m-payment-icons">
        <span class="m:hidden">Cac lua chon thanh toan: </span>
        <ul class="m-payment-icons--list m:flex m:flex-wrap"></ul>
      </div>
    </div>
  </div>
</div>
```

---

## 11. PAGE STRUCTURE (Section Order)

The page has exactly **6 sections** in `<main>` between header and footer:

```
HEADER (sticky, logo-centered)
├── SECTION 1: Hero Slideshow (6 banner slides)
├── SECTION 2: Collection List Grid ("Kham pha cac bo suu tap" - 17 cards)
├── SECTION 3: Custom Collection Slider ("Tron Bo Hoodie Doc La!" - 14 slides)
├── SECTION 4: Custom Collection Slider ("Cac BST Sweater Moi Nhat!" - 12 slides)
├── SECTION 5: Featured Collection ("Soft Routine" - 6 products, dark theme)
└── SECTION 6: Footer (5 columns, accordion mobile)
```

**Not present on this page:**
- Announcement bar / Top bar
- Icon boxes / Feature bars
- Testimonials
- Rich text sections
- Image-with-text
- Countdown timer
- Video section
- Instagram feed
- Brand logo marquee
- Standalone newsletter (newsletter is only in footer)

---

## 12. INTERACTIVE / DYNAMIC ELEMENTS

### A. Swiper.js Sliders
Three Swiper instances on the page:

1. **Hero Slideshow**: 6 slides, autoplay 4s, vertical dot pagination, no arrows
2. **Collection List**: 17 collection cards, fraction pagination, prev/next arrows
3. **Custom Collection Slider x2**: 14/12 slides, CSS-drawn arrows, loop enabled

### B. Color Swatches (Product Options)
- Image-based swatches (`pcard-swatch`)
- Shows colors as text labels with `--option-aspect-ratio` styling
- "+N more options" quick view link when >2 options
- Swatches trigger variant selection with a JSON script

### C. Predictive Search
- Opens as a full-screen overlay drawer
- Popular search suggestions
- Fetches results from Shopify search API

### D. Mobile Navigation Drawer
- Hamburger triggers full-screen menu
- Accordion submenus with back buttons
- Customer login/register section

### E. Product Image Hover
- Cards with `m-product-card--show-second-img` show a second image on hover
- Uses both `.m-product-card__main-image` and `.m-product-card__hover-image`

### F. Animations
- **Fade-in-up**: Default section entrance animation (600ms, cubic-bezier)
- **Fade-in-left/right**: Directional variants
- **Cascade**: Staggered animation via `--animation-order` counter
- **Scroll trigger**: `m-scroll-trigger animate--fade-in` on elements
- **Scaling-up**: Hover effect on collection cards
- **Product card hover**: Scale 1.06/1.15/1.08 variants

### G. Accordion (Footer - Mobile)
- 3 collapsible blocks with chevron toggle
- `m-accordion--item` structure with button + content
- Chevron icon hidden on desktop

### H. Cart Drawer
- `m-cart-drawer` component
- Includes FoxKit cart countdown and cart goal elements

---

## 13. APPS & THIRD-PARTY INTEGRATIONS

| App | Details |
|-----|---------|
| **Klip Coupons** | Coupon system (`klip-app.js`). `elsklip-coupon-box` on each product card. Has "Flash Sale Hoodie" coupon (100,000d fixed amount, line item type) |
| **FoxKit** | Pre-order badges (`foxkit-preorder-badge`), cart countdown, cart goal |
| **Omega Facebook Pixel** | Facebook tracking pixel (loaded after footer) |
| **Google reCAPTCHA** | hCaptcha for form protection (Vietnamese locale) |
| **Swiper.js** | Carousel library (bundled in vendor.js) |

### Type Scale (for reference in JSON-LD structured data)
- h1: 48/42/36px (desktop/tablet/mobile)
- h2: 36/34/28px
- h3: 28/26/22px
- h4: 24/22/20px
- h5: 20/18/18px
- h6: 18/16/16px
- Body: 16px
- Button: 16px, weight 500, border-radius 5px

---

## 14. ASSETS & DEPENDENCIES

### CSS Files (`cdn/shop/t/4/assets/`)

| File | Size | Purpose |
|------|------|---------|
| `main0718.css` | 142KB | Primary theme framework (grid, utilities, components) |
| `vendor8d82.css` | 6KB | Swiper + vendor library styles |
| `cart9e89.css` | 10KB | Cart-specific styles |
| `custom-styled8d7.css` | 7KB | Custom overrides, utilities, badges, scroll text |
| `custom72f8.css` | 1B | Empty placeholder |
| `header524a.css` | 20KB | Header styles |
| `footera5cc.css` | 5KB | Footer styles |
| `slideshowd3f3.css` | 10KB | Slideshow styles |
| `featured-collectiondc7f.css` | 2KB | Featured collection styles |
| `collection-list004d.css` | 4KB | Collection list styles |
| `collection682c.css` | 14KB | Collection page styles |
| `productb922.css` | 18KB | Product page styles |
| `mobile-sticky-bar7263.css` | 1KB | Mobile sticky bar |
| `component-collection-card9229.css` | 3KB | Collection card styles |
| `component-newsletter3245.css` | 4KB | Newsletter form styles |
| `component-photoswipe61d4.css` | 2KB | PhotoSwipe lightbox |
| `component-product-inventory33f4.css` | 2KB | Product inventory display |

### JS Files (`cdn/shop/t/4/assets/`)
| File | Purpose |
|------|---------|
| `theme-globalc2d1.js` | Main theme JS |
| `product-list98d8.js` | Product list functionality |
| `vendor36d2.js` | Vendor libs (Swiper, etc.) |
| `animationsb005.js` | Scroll/animation triggers |
| `product-quick-view.js` | Quick view modal |
| `wishlistde4c.js` | Wishlist functionality |

### Font Files
- Jost (normal 400, italic 400, bold 700, semibold 600, black 900)
- Loaded as WOFF2 + WOFF from Shopify CDN

### Logo
- `cdn/shop/files/Luon_Vuituoi_Bold_Den_Newa7e9.png` (400x44px)
- Also has an icon favicon: `cdn/shop/files/Luon_Vuituoi_icon_den_khong_n_ne346.png` (32x32px)

### Default Social OG Image
- `cdn/shop/files/5a8f76ea9efa29a470eb5c06.jpg` (1201x629px)

---

## 15. KEY CSS CLASSES REFERENCE

### Button Classes
| Class | Description |
|-------|-------------|
| `m-button` | Base button |
| `m-button--primary` | Solid black bg, white text |
| `m-button--secondary` | Outlined/secondary style |
| `m-button--white` | White bg for collection cards |
| `m-button--small` | Small size |
| `m-button--large` | Large size |
| `m-button--link` | Link-style button |

### Section Classes
| Class | Description |
|-------|-------------|
| `m-section` | Base section wrapper |
| `m-gradient` | Gradient background support |
| `m-color-default` | Light theme |
| `m-color-dark` | Dark theme |
| `m-color-footer` | Footer theme |
| `m-scroll-trigger` | Animation trigger |
| `animate--fade-in` | Fade in animation |

### Grid Classes
| Class | Description |
|-------|-------------|
| `m:grid` | CSS grid container |
| `m-cols-4` | Default column count (for consistent naming) |
| `m:grid-2-cols` | 2 columns |
| `md:m:grid-2-cols` | 2 columns at md breakpoint |
| `lg:m:grid-3-cols` | 3 columns at lg breakpoint |
| `xl:m:grid-4-cols` | 4 columns at xl breakpoint |
| `m:column` | Grid column item |
| `m:w-1/2`, `m:w-1/3`, `m:w-1/4` | Width fractions |

### Spacing
| Property | Default Value |
|----------|---------------|
| `--section-padding-top` | 100px (hero), varies |
| `--column-gap` | 30-40px |
| `--row-gap` | 40px |

---

## 16. STRUCTURED DATA (JSON-LD)

The page includes schema.org markup for:
- **Organization**: Luon Vuituoi (sameAs: Facebook, Instagram)
- **WebSite**: URL, name, description
- **BreadcrumbList**: Single item (Trang chu)

---

## 17. LOCALE STRINGS (MinimogTheme)

Key Vietnamese translations:
| English | Vietnamese |
|---------|------------|
| Add to cart | Them vao gio hang |
| Sold out | Ban het |
| Unavailable | Khong co san |
| In stock | Trong kho |
| Checkout | Thanh toan |
| View cart | Xem gio hang |
| Remove | Xoa |
| Quantity | So luong |
| Unit price | Don gia |
| Subtotal | Tam tinh |
| Sold | Da ban |
| Available | Co san |
| Pre-order | Dat hang truoc |
