<?php
get_header();

$partner_divisions = array(
    array(
        'eyebrow' => 'Designer Bathware',
        'title' => 'Designer Bathware Partners',
        'description' => 'A curated selection of international bathware brands offering refined design, premium finishes and exceptional flexibility for luxury bathrooms.',
        'url' => home_url('/partners/designer-bathware/'),
        'image' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/seros-victoria-albert.jpg',
        'image_alt' => 'Luxury designer bathroom products represented by Sanctuary Holdings',
        'brands' => array('Paffoni', 'Bathco', 'Creavit', 'Fima | Carlo Frattini', 'THG Paris', 'Kreiner', 'Perrin & Rowe', 'Sanibano', 'Victoria + Albert', 'Cosmic', 'Alice Ceramica', 'Daniel'),
    ),
    array(
        'eyebrow' => 'Commercial Washrooms',
        'title' => 'Commercial Washroom Partners',
        'description' => 'Commercial washroom accessories, water-efficient systems and specialist solutions built for intensive-use public and project environments.',
        'url' => home_url('/partners/asi/'),
        'image' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/asi-piatto-commercial-washroom-hero.jpg',
        'image_alt' => 'Commercial washroom systems represented by Sanctuary Holdings',
        'brands' => array('ASI', 'Sloan', 'Delabie'),
    ),
    array(
        'eyebrow' => 'Hot Water Solutions',
        'title' => 'Hot Water Solution Partners',
        'description' => 'From simple water heaters to advanced heat pump, solar and hybrid systems, our partner brands support reliable solutions across every scale.',
        'url' => home_url('/partners/hot-water-solutions/'),
        'image' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-hot-water.png',
        'image_alt' => 'Hot water system solutions represented by Sanctuary Holdings',
        'brands' => array('Gemake', 'Nulite', 'Rheem'),
    ),
    array(
        'eyebrow' => 'Pumps & Fire Curtains',
        'title' => 'Pumps & Fire Safety Partners',
        'description' => 'Specialist partner brands supporting water movement, fire protection and smoke control systems for residential, commercial and project environments.',
        'url' => home_url('/partners/pumps-fire-curtains/'),
        'image' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-pumps-fire.png',
        'image_alt' => 'Pumps and fire safety systems represented by Sanctuary Holdings',
        'brands' => array('DP Pumps', 'Valvex', 'Tsurumi', 'Matra', 'Kent', 'Elbi of America', 'BLE', 'B METERS', 'ZENIT', 'Zirantec', 'Standart'),
    ),
);
?>

<main class="sh-partners-overview" id="main-content">
    <section class="sh-partners-overview-hero" aria-labelledby="sh-partners-overview-title">
        <div class="sh-partners-overview-hero__copy">
            <span class="sh-partners-overview-eyebrow">Our Partners</span>
            <h1 id="sh-partners-overview-title">A curated world of specialist brands.</h1>
            <p>Explore the international partner network behind Sanctuary Holdings, from expressive designer bathware to engineered hot water, pumps, and fire protection systems.</p>
            <a class="sh-partners-overview-button" href="#partner-divisions">View Divisions</a>
        </div>
        <div class="sh-partners-overview-hero__visual" aria-label="Sanctuary partner brand visual collage">
            <figure class="sh-partners-overview-hero__image sh-partners-overview-hero__image-main">
                <img class="skip-lazy no-lazyload" data-no-lazy="1" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/08/image-1.jpg-1.webp" alt="Designer bathware basin and tap setting represented by Sanctuary Holdings">
            </figure>
            <figure class="sh-partners-overview-hero__image sh-partners-overview-hero__image-tall">
                <img class="skip-lazy no-lazyload" data-no-lazy="1" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/08/image-2.jpg.webp" alt="Nulite hot water solution represented by Sanctuary Holdings">
            </figure>
            <figure class="sh-partners-overview-hero__image sh-partners-overview-hero__image-small">
                <img class="skip-lazy no-lazyload" data-no-lazy="1" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/08/image-3.jpg" alt="Sanctuary engineered pump system represented by Sanctuary Holdings">
            </figure>
            <div class="sh-partners-overview-hero__panel" aria-label="Partner division summary">
                <div>
                    <strong>3</strong>
                    <span>Specialist divisions</span>
                </div>
                <div>
                    <strong>24+</strong>
                    <span>International brands</span>
                </div>
                <div>
                    <strong>1</strong>
                    <span>Curated partner network</span>
                </div>
            </div>
        </div>
    </section>

    <section class="sh-partners-overview-intro">
        <span class="sh-partners-overview-eyebrow">Partner Network</span>
        <h2>Choose the division that matches your design intent and technical need.</h2>
        <p>Each division brings together relevant partner brands so clients, designers, architects, and project teams can move from inspiration to the right specialist solution with less searching.</p>
    </section>

    <section class="sh-partners-overview-grid" id="partner-divisions" aria-label="Partner divisions">
        <?php foreach ($partner_divisions as $division) : ?>
            <article class="sh-partners-overview-card">
                <a href="<?php echo esc_url($division['url']); ?>" aria-label="Explore <?php echo esc_attr($division['title']); ?>">
                    <figure class="sh-partners-overview-card__media">
                        <img class="skip-lazy no-lazyload" data-no-lazy="1" src="<?php echo esc_url($division['image']); ?>" alt="<?php echo esc_attr($division['image_alt']); ?>" loading="lazy" decoding="async">
                    </figure>
                    <div class="sh-partners-overview-card__body">
                        <span class="sh-partners-overview-eyebrow"><?php echo esc_html($division['eyebrow']); ?></span>
                        <h2><?php echo esc_html($division['title']); ?></h2>
                        <p><?php echo esc_html($division['description']); ?></p>
                        <div class="sh-partners-overview-brand-list" aria-label="<?php echo esc_attr($division['eyebrow']); ?> brands">
                            <?php foreach ($division['brands'] as $brand) : ?>
                                <span><?php echo esc_html($brand); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <span class="sh-partners-overview-card__cta">Explore Division</span>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </section>

    <section class="sh-partners-overview-showcase" aria-label="Sanctuary partner strengths">
        <div>
            <span class="sh-partners-overview-eyebrow">What This Network Gives You</span>
            <h2>More choice, clearer specification, stronger project confidence.</h2>
        </div>
        <div class="sh-partners-overview-showcase__grid">
            <article>
                <span>01</span>
                <h3>Design Range</h3>
                <p>Refined finishes, sculptural forms, contemporary sanitaryware, classic collections, and statement bathware.</p>
            </article>
            <article>
                <span>02</span>
                <h3>Technical Depth</h3>
                <p>Hot water systems, pumps, fire curtains, valves, and project-ready building service solutions.</p>
            </article>
            <article>
                <span>03</span>
                <h3>Project Support</h3>
                <p>Brand selection, product comparison, specification guidance, and coordination for residential and commercial work.</p>
            </article>
        </div>
    </section>

    <section class="sh-partners-overview-cta">
        <span class="sh-partners-overview-eyebrow">Need Guidance?</span>
        <h2>Not sure which partner brand fits your project?</h2>
        <p>Our team can help you compare design intent, technical requirements, catalogues, availability, and project suitability before you decide.</p>
        <div class="sh-partners-overview-actions">
<a class="sh-partners-overview-button" href="<?php echo esc_url(home_url('/request-a-quotation/')); ?>">Request a Quotation</a>
<a class="sh-partners-overview-button sh-partners-overview-button--secondary" href="<?php echo esc_url(home_url('/book-a-showroom-visit/')); ?>">Book a Showroom Visit</a>
</div>
    </section>
</main>

<style id="sh6-partners-cta-visibility">
.sh-partners-overview-cta .sh-partners-overview-button{
  background:#ffffff!important;
  color:#3f5949!important;
  border:1px solid #ffffff!important;
}
.sh-partners-overview-cta .sh-partners-overview-button--secondary{
  background:transparent!important;
  color:#ffffff!important;
  border-color:#ffffff!important;
}
.sh-partners-overview-cta .sh-partners-overview-button:hover,
.sh-partners-overview-cta .sh-partners-overview-button:focus-visible{
  background:#55715b!important;
  color:#ffffff!important;
}
.sh-partners-overview-cta .sh-partners-overview-button--secondary:hover,
.sh-partners-overview-cta .sh-partners-overview-button--secondary:focus-visible{
  background:#3f5949!important;
  color:#ffffff!important;
}
</style>

<style id="sh-partners-overview-refinements-20260829">
body.post-type-archive-partners .sh-partners-overview {
  background: #fff;
  padding-bottom: 76px;
}
body.post-type-archive-partners .sh-partners-overview-hero {
  width: min(1220px, calc(100% - 40px));
  min-height: 830px;
  margin: 28px auto 82px;
  padding: 238px 60px 86px;
  border: 1px solid rgba(62, 89, 73, .13);
  border-radius: 32px;
  background: linear-gradient(135deg, #f7f2ea 0%, #f7f2ea 100%);
  box-shadow: 0 22px 54px rgba(31, 54, 44, .08);
  overflow: hidden;
}
body.post-type-archive-partners .sh-partners-overview-hero::after {
  content: "";
  position: absolute;
  inset: auto auto -110px -70px;
  width: 320px;
  height: 320px;
  border: 1px solid rgba(187, 137, 100, .18);
  border-radius: 50%;
  pointer-events: none;
}
body.post-type-archive-partners .sh-partners-overview-eyebrow {
  color: #bb8964 !important;
}
body.post-type-archive-partners .sh-partners-overview-hero__image,
body.post-type-archive-partners .sh-partners-overview-card,
body.post-type-archive-partners .sh-partners-overview-card > a,
body.post-type-archive-partners .sh-partners-overview-card__media {
  border-radius: 24px;
  overflow: hidden;
}
body.post-type-archive-partners .sh-partners-overview-hero__image {
  box-shadow: 0 16px 36px rgba(31, 54, 44, .12);
}
body.post-type-archive-partners .sh-partners-overview-hero__image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
body.post-type-archive-partners .sh-partners-overview-hero__image-main img {
  object-position: 52% 55%;
}
body.post-type-archive-partners .sh-partners-overview-hero__image-tall img {
  object-position: 50% 50%;
}
body.post-type-archive-partners .sh-partners-overview-hero__image-small img {
  object-position: 50% 58%;
}
body.post-type-archive-partners .sh-partners-overview-hero__panel {
  bottom: 0;
  transform: translateY(48%);
  gap: 12px;
  z-index: 4;
}
body.post-type-archive-partners .sh-partners-overview-hero__panel > div {
  min-height: 118px;
  padding: 16px 18px;
  border: 1px solid rgba(62, 89, 73, .13);
  border-radius: 22px;
  background: rgba(255, 250, 241, .94);
  box-shadow: 0 12px 28px rgba(31, 54, 44, .09);
}
body.post-type-archive-partners .sh-partners-overview-hero__panel strong {
  font-size: clamp(32px, 3.2vw, 48px);
  line-height: .9;
}
body.post-type-archive-partners .sh-partners-overview-hero__panel span {
  font-size: 12px;
  line-height: 1.45;
}
body.post-type-archive-partners .sh-partners-overview-intro {
  width: min(1204px, calc(100% - 48px));
  max-width: none;
  margin: 0 auto;
  padding: 56px 24px 46px;
  text-align: center;
}
body.post-type-archive-partners .sh-partners-overview-intro h2 {
  width: 100%;
  max-width: none;
  margin-inline: auto;
  text-align: center;
}
body.post-type-archive-partners .sh-partners-overview-intro p {
  width: 100%;
  max-width: 1040px;
  margin: 22px auto 0;
  text-align: center;
}
body.post-type-archive-partners .sh-partners-overview-card {
  border: 1px solid rgba(62, 89, 73, .14);
  background: #fff;
  box-shadow: 0 14px 34px rgba(31, 54, 44, .07);
}
body.post-type-archive-partners .sh-partners-overview-card__body {
  display: flex;
  min-height: 470px;
  flex-direction: column;
}
body.post-type-archive-partners .sh-partners-overview-card__cta {
  margin-top: auto;
  padding-top: 30px;
}
body.post-type-archive-partners .sh-partners-overview-showcase {
  border-radius: 28px;
  overflow: hidden;
}
body.post-type-archive-partners .sh-partners-overview-showcase__grid {
  gap: 18px;
}
body.post-type-archive-partners .sh-partners-overview-showcase__grid > article {
  border: 1px solid rgba(255, 250, 241, .16);
  border-radius: 22px;
  background: #3e5949;
  color: #fffaf1;
  box-shadow: 0 14px 30px rgba(8, 30, 21, .14);
}
body.post-type-archive-partners .sh-partners-overview-showcase__grid > article h3,
body.post-type-archive-partners .sh-partners-overview-showcase__grid > article p,
body.post-type-archive-partners .sh-partners-overview-showcase__grid > article > span {
  color: #fffaf1;
}
body.post-type-archive-partners .sh-partners-overview-cta {
  width: min(1220px, calc(100% - 40px));
  margin: 78px auto 0;
  border-radius: 28px;
  overflow: hidden;
}
body.post-type-archive-partners .sh-partners-overview-cta::before {
  opacity: .58 !important;
  filter: none !important;
}
body.post-type-archive-partners .sh-partners-overview-button {
  border-radius: 999px;
}
@media (max-width: 991px) {
  body.post-type-archive-partners .sh-partners-overview-hero {
    width: min(94%, 760px);
    min-height: 0;
    margin-top: 18px;
    padding: 220px 34px 92px;
    border-radius: 26px;
  }
  body.post-type-archive-partners .sh-partners-overview-hero__panel {
    transform: translateY(44%);
  }
  body.post-type-archive-partners .sh-partners-overview-card__body {
    min-height: 0;
  }
}
@media (max-width: 640px) {
  body.post-type-archive-partners .sh-partners-overview {
    padding-bottom: 44px;
  }
  body.post-type-archive-partners .sh-partners-overview-hero {
    width: calc(100% - 24px);
    margin: 12px auto 58px;
    padding: 190px 20px 64px;
    border-radius: 22px;
  }
  body.post-type-archive-partners .sh-partners-overview-hero__visual {
    padding-bottom: 54px;
  }
  body.post-type-archive-partners .sh-partners-overview-hero__image,
  body.post-type-archive-partners .sh-partners-overview-card,
  body.post-type-archive-partners .sh-partners-overview-card > a,
  body.post-type-archive-partners .sh-partners-overview-card__media {
    border-radius: 18px;
  }
  body.post-type-archive-partners .sh-partners-overview-hero__panel {
    position: absolute;
    bottom: 20px;
    transform: translateY(38%);
    gap: 7px;
  }
  body.post-type-archive-partners .sh-partners-overview-hero__panel > div {
    min-height: 86px;
    padding: 11px 9px;
    border-radius: 16px;
  }
  body.post-type-archive-partners .sh-partners-overview-hero__panel strong {
    font-size: 28px;
  }
  body.post-type-archive-partners .sh-partners-overview-hero__panel span {
    font-size: 9px;
    line-height: 1.3;
  }
  body.post-type-archive-partners .sh-partners-overview-intro {
    width: calc(100% - 24px);
    padding: 46px 6px 32px;
  }
  body.post-type-archive-partners .sh-partners-overview-intro h2 {
    font-size: clamp(36px, 11vw, 50px);
  }
  body.post-type-archive-partners .sh-partners-overview-showcase,
  body.post-type-archive-partners .sh-partners-overview-cta {
    width: calc(100% - 24px);
    margin-inline: auto;
    border-radius: 20px;
  }
  body.post-type-archive-partners .sh-partners-overview-showcase__grid > article {
    border-radius: 18px;
  }
  body.post-type-archive-partners .sh-partners-overview-cta {
    margin-top: 56px;
  }
}
</style>

<style id="sh-partners-system-qa-20261003">
/* Partners page: system alignment + visual refinement, 2026-10-03. Page-scoped only. */
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content :is(h1, h2, h3) {
  font-family: "Poiret One", sans-serif !important;
  font-weight: 400 !important;
  font-synthesis: none;
}
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-cta .sh-partners-overview-eyebrow {
  color: #bb8964 !important;
}
@media (min-width: 768px) and (max-width: 1199px) {
  body.post-type-archive-partners #shpm-fsi {
    display: none !important;
  }
}
@media (min-width: 1101px) {
  body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
  }
}
/* Hero: full-bleed background, content kept on the site grid */
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-hero {
  width: 100% !important;
  max-width: none !important;
  margin: 0 !important;
  border: 0 !important;
  border-radius: 0 !important;
  box-shadow: none !important;
  padding-left: max(24px, calc((100% - 1100px) / 2)) !important;
  padding-right: max(24px, calc((100% - 1100px) / 2)) !important;
}
/* Capsule buttons: View Divisions, Explore Division, closing CTAs */
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-button,
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-card__cta {
  display: inline-flex !important;
  align-items: center;
  justify-content: center;
  align-self: flex-start !important;
  width: auto !important;
  max-width: max-content !important;
  height: 44px;
  padding: 0 26px !important;
  border-radius: 999px !important;
  font-family: "montserratbold", sans-serif !important;
  font-size: 12px !important;
  letter-spacing: .16em;
  line-height: 1;
  white-space: nowrap;
}
/* Closing CTA: full-bleed band, #3e5949, cream type, copper line drawing */
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-cta {
  width: 100% !important;
  max-width: none !important;
  margin: 78px 0 0 !important;
  border-radius: 0 !important;
  overflow: hidden;
  background-color: #3e5949 !important;
  background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNjAwIDcwMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjYmI4OTY0IiBzdHJva2Utd2lkdGg9IjEuMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBvcGFjaXR5PSIwLjc1Ij4KICA8IS0tIEFyY2hpdGVjdHVyYWwgRGF0dW0gTGluZSAtLT4KICA8bGluZSB4MT0iMTAwIiB5MT0iMzUwIiB4Mj0iMTUwMCIgeTI9IjM1MCIgc3Ryb2tlLXdpZHRoPSIwLjgiIHN0cm9rZS1kYXNoYXJyYXk9IjggOCIgb3BhY2l0eT0iMC4zIiAvPgoKICA8IS0tIENvbnRpbnVvdXMgTGluZSBCb3RhbmljYWwgRnJvbmQgKExlZnQpIC0tPgogIDxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE4MCwgMTIwKSI+CiAgICA8cGF0aCBkPSJNIDUwLDQ1MCBDIDcwLDMwMCAxMjAsMTgwIDIwMCw2MCIgLz4KICAgIDxwYXRoIGQ9Ik0gOTAsMzYwIEMgNTAsMzQwIDQwLDMwMCA3MCwyOTAgQyAxMDAsMjgwIDExMCwzMjAgOTUsMzUwIiAvPgogICAgPHBhdGggZD0iTSAxMTUsMjk1IEMgMTU1LDI3NSAxODAsMjg1IDE3NSwzMTAgQyAxNzAsMzM1IDEzMCwzMzAgMTIwLDMwNSIgLz4KICAgIDxwYXRoIGQ9Ik0gMTQwLDIyNSBDIDEwMCwyMDUgOTUsMTcwIDEyNSwxNjAgQyAxNTUsMTUwIDE2MCwxOTAgMTQ1LDIxNSIgLz4KICAgIDxwYXRoIGQ9Ik0gMTY4LDE2MCBDIDIwOCwxNDAgMjMwLDE1MCAyMjUsMTc1IEMgMjIwLDIwMCAxODAsMTk1IDE3MiwxNzAiIC8+CiAgICA8cGF0aCBkPSJNIDE5MCw5NSBDIDE2MCw3NSAxNjAsNDAgMTg1LDM1IEMgMjEwLDMwIDIxNSw2NSAxOTUsOTAiIC8+CiAgPC9nPgoKICA8IS0tIENvbmNlYWxlZCBDZWlsaW5nIFJhaW4gU2hvd2VyICYgQ29udHJvbHMgKFJpZ2h0KSAtLT4KICA8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxMDUwLCAxMDApIj4KICAgIDwhLS0gQ2VpbGluZyBBcm0gLS0+CiAgICA8bGluZSB4MT0iMTgwIiB5MT0iNTAiIHgyPSIxODAiIHkyPSIxMTAiIHN0cm9rZS13aWR0aD0iMS40IiAvPgogICAgPCEtLSBTaG93ZXIgSGVhZCAtLT4KICAgIDxlbGxpcHNlIGN4PSIxODAiIGN5PSIxMTIiIHJ4PSI2NSIgcnk9IjEwIiBzdHJva2Utd2lkdGg9IjEuMyIgLz4KICAgIDwhLS0gU3ByYXkgTGluZXMgLS0+CiAgICA8ZyBzdHJva2UtZGFzaGFycmF5PSIyIDgiIG9wYWNpdHk9IjAuNCIgc3Ryb2tlLXdpZHRoPSIwLjgiPgogICAgICA8bGluZSB4MT0iMTMwIiB5MT0iMTI1IiB4Mj0iMTIwIiB5Mj0iMjgwIiAvPgogICAgICA8bGluZSB4MT0iMTUwIiB5MT0iMTI1IiB4Mj0iMTQ1IiB5Mj0iMjgwIiAvPgogICAgICA8bGluZSB4MT0iMTgwIiB5MT0iMTI1IiB4Mj0iMTgwIiB5Mj0iMjgwIiAvPgogICAgICA8bGluZSB4MT0iMjEwIiB5MT0iMTI1IiB4Mj0iMjE1IiB5Mj0iMjgwIiAvPgogICAgICA8bGluZSB4MT0iMjMwIiB5MT0iMTI1IiB4Mj0iMjQwIiB5Mj0iMjgwIiAvPgogICAgPC9nPgoKICAgIDwhLS0gV2FsbCBQbGF0ZSAmIEhhbmRzZXQgLS0+CiAgICA8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxODAsIDMxMCkiPgogICAgICA8cmVjdCB4PSItMzUiIHk9IjAiIHdpZHRoPSI3MCIgaGVpZ2h0PSIxMzAiIHJ4PSIzNSIgc3Ryb2tlLXdpZHRoPSIxIiAvPgogICAgICA8Y2lyY2xlIGN4PSIwIiBjeT0iMzUiIHI9IjE2IiBzdHJva2Utd2lkdGg9IjEiIC8+CiAgICAgIDxjaXJjbGUgY3g9IjAiIGN5PSI5NSIgcj0iMTYiIHN0cm9rZS13aWR0aD0iMSIgLz4KICAgICAgPGxpbmUgeDE9IjYwIiB5MT0iMjAiIHgyPSI2MCIgeTI9IjkwIiBzdHJva2Utd2lkdGg9IjIiIC8+CiAgICAgIDxwYXRoIGQ9Ik0gNjAsOTAgQyA2MCwxMzAgMTAsMTMwIDAsOTUiIHN0cm9rZS13aWR0aD0iMC45IiBvcGFjaXR5PSIwLjYiIC8+CiAgICA8L2c+CiAgPC9nPgo8L3N2Zz4K") !important;
  background-repeat: no-repeat !important;
  background-position: center 58% !important;
  background-size: min(1100px, 92%) auto !important;
}
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-cta .sh-partners-overview-cta__inner,
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-cta h2,
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-cta p {
  color: #fffaf1 !important;
}
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-cta .sh-partners-overview-button:not(.sh-partners-overview-button--secondary) {
  background: #fffaf1 !important;
  border-color: #fffaf1 !important;
}
/* Mobile: one column, fixed image height, natural card height */
@media (max-width: 640px) {
  body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-cta {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNjAwIDcwMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjYmI4OTY0IiBzdHJva2Utd2lkdGg9IjEuMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBvcGFjaXR5PSIwLjM1Ij4KICA8IS0tIEFyY2hpdGVjdHVyYWwgRGF0dW0gTGluZSAtLT4KICA8bGluZSB4MT0iMTAwIiB5MT0iMzUwIiB4Mj0iMTUwMCIgeTI9IjM1MCIgc3Ryb2tlLXdpZHRoPSIwLjgiIHN0cm9rZS1kYXNoYXJyYXk9IjggOCIgb3BhY2l0eT0iMC4zIiAvPgoKICA8IS0tIENvbnRpbnVvdXMgTGluZSBCb3RhbmljYWwgRnJvbmQgKExlZnQpIC0tPgogIDxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE4MCwgMTIwKSI+CiAgICA8cGF0aCBkPSJNIDUwLDQ1MCBDIDcwLDMwMCAxMjAsMTgwIDIwMCw2MCIgLz4KICAgIDxwYXRoIGQ9Ik0gOTAsMzYwIEMgNTAsMzQwIDQwLDMwMCA3MCwyOTAgQyAxMDAsMjgwIDExMCwzMjAgOTUsMzUwIiAvPgogICAgPHBhdGggZD0iTSAxMTUsMjk1IEMgMTU1LDI3NSAxODAsMjg1IDE3NSwzMTAgQyAxNzAsMzM1IDEzMCwzMzAgMTIwLDMwNSIgLz4KICAgIDxwYXRoIGQ9Ik0gMTQwLDIyNSBDIDEwMCwyMDUgOTUsMTcwIDEyNSwxNjAgQyAxNTUsMTUwIDE2MCwxOTAgMTQ1LDIxNSIgLz4KICAgIDxwYXRoIGQ9Ik0gMTY4LDE2MCBDIDIwOCwxNDAgMjMwLDE1MCAyMjUsMTc1IEMgMjIwLDIwMCAxODAsMTk1IDE3MiwxNzAiIC8+CiAgICA8cGF0aCBkPSJNIDE5MCw5NSBDIDE2MCw3NSAxNjAsNDAgMTg1LDM1IEMgMjEwLDMwIDIxNSw2NSAxOTUsOTAiIC8+CiAgPC9nPgoKICA8IS0tIENvbmNlYWxlZCBDZWlsaW5nIFJhaW4gU2hvd2VyICYgQ29udHJvbHMgKFJpZ2h0KSAtLT4KICA8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxMDUwLCAxMDApIj4KICAgIDwhLS0gQ2VpbGluZyBBcm0gLS0+CiAgICA8bGluZSB4MT0iMTgwIiB5MT0iNTAiIHgyPSIxODAiIHkyPSIxMTAiIHN0cm9rZS13aWR0aD0iMS40IiAvPgogICAgPCEtLSBTaG93ZXIgSGVhZCAtLT4KICAgIDxlbGxpcHNlIGN4PSIxODAiIGN5PSIxMTIiIHJ4PSI2NSIgcnk9IjEwIiBzdHJva2Utd2lkdGg9IjEuMyIgLz4KICAgIDwhLS0gU3ByYXkgTGluZXMgLS0+CiAgICA8ZyBzdHJva2UtZGFzaGFycmF5PSIyIDgiIG9wYWNpdHk9IjAuNCIgc3Ryb2tlLXdpZHRoPSIwLjgiPgogICAgICA8bGluZSB4MT0iMTMwIiB5MT0iMTI1IiB4Mj0iMTIwIiB5Mj0iMjgwIiAvPgogICAgICA8bGluZSB4MT0iMTUwIiB5MT0iMTI1IiB4Mj0iMTQ1IiB5Mj0iMjgwIiAvPgogICAgICA8bGluZSB4MT0iMTgwIiB5MT0iMTI1IiB4Mj0iMTgwIiB5Mj0iMjgwIiAvPgogICAgICA8bGluZSB4MT0iMjEwIiB5MT0iMTI1IiB4Mj0iMjE1IiB5Mj0iMjgwIiAvPgogICAgICA8bGluZSB4MT0iMjMwIiB5MT0iMTI1IiB4Mj0iMjQwIiB5Mj0iMjgwIiAvPgogICAgPC9nPgoKICAgIDwhLS0gV2FsbCBQbGF0ZSAmIEhhbmRzZXQgLS0+CiAgICA8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxODAsIDMxMCkiPgogICAgICA8cmVjdCB4PSItMzUiIHk9IjAiIHdpZHRoPSI3MCIgaGVpZ2h0PSIxMzAiIHJ4PSIzNSIgc3Ryb2tlLXdpZHRoPSIxIiAvPgogICAgICA8Y2lyY2xlIGN4PSIwIiBjeT0iMzUiIHI9IjE2IiBzdHJva2Utd2lkdGg9IjEiIC8+CiAgICAgIDxjaXJjbGUgY3g9IjAiIGN5PSI5NSIgcj0iMTYiIHN0cm9rZS13aWR0aD0iMSIgLz4KICAgICAgPGxpbmUgeDE9IjYwIiB5MT0iMjAiIHgyPSI2MCIgeTI9IjkwIiBzdHJva2Utd2lkdGg9IjIiIC8+CiAgICAgIDxwYXRoIGQ9Ik0gNjAsOTAgQyA2MCwxMzAgMTAsMTMwIDAsOTUiIHN0cm9rZS13aWR0aD0iMC45IiBvcGFjaXR5PSIwLjYiIC8+CiAgICA8L2c+CiAgPC9nPgo8L3N2Zz4K") !important;
  }
  body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-card > a {
    display: flex !important;
    flex-direction: column !important;
    grid-template-columns: none !important;
  }
  body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-card__media {
    height: 290px !important;
    min-height: 0 !important;
  }
  body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-card__body {
    min-height: 0 !important;
  }
  body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override).post-type-archive-partners #main-content .sh-partners-overview-card {
    min-height: 0 !important;
  }
}
</style>

<?php get_footer(); ?>
