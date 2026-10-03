            <div class="footer-wrapper sh3-footer-wrapper">
                <style id="sh3-footer-style">
                    .sh3-footer-wrapper {
                        --sh3-green: #101713;
                        --sh3-cream: #f4f0e8;
                        --sh3-muted: rgba(244, 240, 232, .74);
                        background: var(--sh3-green);
                        color: var(--sh3-cream);
                        font-family: "Montserrat", sans-serif;
                        padding: 0;
                    }

                    .sh3-footer-wrapper * { box-sizing: border-box; }

                    /* A restrained white/off-white rhythm across editorial content. */
                    .sh2-latest-offerings,
                    .sh2-divisions-grid,
                    .sh2-brand-carousel,
                    .sh2-projects-section,
                    .sh2-inspiration-section,
                    .sh-bandwidth-feature-strip,
                    .sh-bandwidth-cta,
                    .sh-about-process,
                    .sh-about-expertise,
                    .sh-about-team,
                    .sh-about-final-cta,
                    .sh-atelier-worlds,
                    .sh-atelier-deco,
                    .sh-atelier-closing,
                    .sh-finish-brands,
                    .sh-finishes-showcase,
                    .sh-insp-hub-editorial {
                        background-color: #ffffff !important;
                    }

                    .sh2-company-intro,
                    .sh2-brand-direction,
                    .sh2-materials-section,
                    .sh2-client-carousel,
                    .sh2-home-faq-news,
                    .sh-bandwidth-intro,
                    .sh-bandwidth-collections,
                    .sh-about-story,
                    .sh-about-numbers,
                    .sh-about-project-thinking,
                    .sh-about-why,
                    .sh-materia-intro,
                    .sh-atelier-intro,
                    .sh-atelier-feature,
                    .sh-atelier-colour,
                    .sh-finishes-intro,
                    .sh-lp-solutions,
                    .sh-lp-safety,
                    .sh-insp-hub-categories {
                        background-color: #f7f2ea !important;
                    }

                    .sh-classic-wrap:nth-of-type(odd),
                    .sh-finish-group:nth-of-type(odd) {
                        background-color: #f7f2ea !important;
                    }
                    .sh-classic-wrap:nth-of-type(even),
                    .sh-finish-group:nth-of-type(even) {
                        background-color: #ffffff !important;
                    }

                    /* Keep Range imagery natural; use only a neutral text-readability fade. */
                    .sh2-range-card::after {
                        background: linear-gradient(
                            180deg,
                            rgba(0, 0, 0, .01) 0%,
                            rgba(0, 0, 0, .12) 46%,
                            rgba(0, 0, 0, .68) 100%
                        ) !important;
                    }
                    .sh2-range-card .sh2-range-overlay span,
                    .sh2-range-card .sh2-range-overlay h3,
                    .sh2-range-card .sh2-range-overlay p,
                    .sh2-range-card .sh2-range-overlay a {
                        color: #ffffff !important;
                    }
                    .sh2-range-card .sh2-range-overlay a:hover {
                        color: #3f5949 !important;
                    }

                    /* Product Bandwidth hero mirrors the Materia editorial text treatment. */
                    body.page .sh-bandwidth-hero {
                        align-items: center !important;
                        justify-content: center !important;
                        padding: 190px 48px 52px !important;
                    }
                    body.page .sh-bandwidth-hero__overlay {
                        background: linear-gradient(180deg, rgba(12, 22, 16, .18), rgba(12, 22, 16, .34)) !important;
                    }
                    body.page .sh-bandwidth-hero__copy {
                        width: min(100%, 920px) !important;
                        max-width: 920px !important;
                        margin: 0 auto !important;
                        text-align: center !important;
                    }
                    body.page .sh-bandwidth-hero__copy span {
                        margin-bottom: 18px !important;
                        color: #fff !important;
                        font-family: "montserratregular", sans-serif !important;
                        font-size: 13px !important;
                        font-weight: 700 !important;
                        letter-spacing: .24em !important;
                        text-align: center !important;
                    }
                    body.page .sh-bandwidth-hero__copy h1 {
                        max-width: 860px !important;
                        margin: 0 auto 22px !important;
                        color: #fff !important;
                        font-family: "Cormorant Garamond", "Times New Roman", serif !important;
                        font-size: clamp(64px, 6.2vw, 90px) !important;
                        font-weight: 400 !important;
                        line-height: .98 !important;
                        letter-spacing: -.045em !important;
                        text-align: center !important;
                    }
                    body.page .sh-bandwidth-hero__copy p {
                        max-width: 780px !important;
                        margin: 0 auto 28px !important;
                        color: #fff !important;
                        font-size: 15px !important;
                        font-weight: 600 !important;
                        line-height: 1.8 !important;
                        letter-spacing: .05em !important;
                        text-align: center !important;
                    }
                    body.page .sh-bandwidth-hero .sh-bandwidth-button {
                        min-height: auto !important;
                        padding: 0 0 8px !important;
                        border: 0 !important;
                        border-bottom: 1px solid rgba(255, 255, 255, .72) !important;
                        border-radius: 0 !important;
                        background: transparent !important;
                        color: #fff !important;
                        box-shadow: none !important;
                        backdrop-filter: none !important;
                        font-size: 12px !important;
                        font-weight: 700 !important;
                        letter-spacing: .2em !important;
                    }

                    @media (max-width: 767px) {
                        body.page .sh-bandwidth-hero {
                            align-items: center !important;
                            padding: 128px 22px 42px !important;
                        }
                        body.page .sh-bandwidth-hero__copy h1 {
                            font-size: clamp(52px, 15vw, 72px) !important;
                        }
                        body.page .sh-bandwidth-hero__copy p {
                            font-size: 13px !important;
                            line-height: 1.65 !important;
                        }
                    }

                    .sh3-footer-inner {
                        width: min(100% - 96px, 1440px);
                        margin: 0 auto;
                    }

                    .sh3-footer-top {
                        display: grid;
                        grid-template-columns: minmax(0, 1.25fr) minmax(290px, .55fr);
                        gap: clamp(64px, 10vw, 160px);
                        align-items: start;
                        padding: 76px 0 44px;
                    }

                    .sh3-newsletter { max-width: 620px; }
                    .sh3-newsletter h2 {
                        color: var(--sh3-cream);
                        font-family: "Montserrat", sans-serif;
                        font-size: clamp(24px, 2.1vw, 34px);
                        font-weight: 400;
                        letter-spacing: -.02em;
                        line-height: 1.2;
                        margin: 0 0 14px;
                        text-transform: none;
                    }
                    .sh3-newsletter p {
                        color: var(--sh3-cream) !important;
                        font-size: 14px;
                        font-weight: 400;
                        line-height: 1.65;
                        margin: 0;
                        max-width: 540px;
                    }

                    .sh3-subscribe {
                        display: flex;
                        margin-top: 30px;
                        max-width: 540px;
                        border-bottom: 1px solid rgba(244, 240, 232, .68);
                    }
                    .sh3-subscribe input {
                        flex: 1 1 auto;
                        min-width: 0;
                        height: 48px;
                        padding: 0 10px 0 0;
                        border: 0;
                        background: transparent;
                        color: var(--sh3-cream);
                        font: 400 13px/1.2 "Montserrat", sans-serif;
                        outline: 0;
                    }
                    .sh3-subscribe input::placeholder { color: rgba(244, 240, 232, .58); }
                    .sh3-subscribe button {
                        border: 0;
                        background: transparent;
                        color: var(--sh3-cream);
                        cursor: pointer;
                        font: 600 11px/1 "Montserrat", sans-serif;
                        letter-spacing: .14em;
                        padding: 0 0 0 20px;
                        text-transform: uppercase;
                    }

                    .sh3-brand {
                        width: min(100%, 620px);
                        margin: 0;
                    }
                    .sh3-brand-logo {
                        display: block;
                        width: min(100%, 314px);
                        height: auto;
                        margin: 0 0 32px;
                    }
                    .sh3-contact {
                        display: grid;
                        gap: 12px;
                        color: var(--sh3-cream);
                        font-size: 13px;
                        line-height: 1.55;
                        max-width: 570px;
                    }
                    .sh3-contact-row {
                        display: grid;
                        grid-template-columns: 92px minmax(0, 1fr);
                        gap: 20px;
                        align-items: baseline;
                        text-align: left;
                    }
                    .sh3-contact-label {
                        color: var(--sh3-cream);
                        font-size: 10px;
                        font-weight: 600;
                        letter-spacing: .14em;
                        text-transform: uppercase;
                    }
                    .sh3-contact address { font-style: normal; margin: 0; }
                    .sh3-contact a { color: var(--sh3-cream) !important; text-decoration: none; }
                    .sh3-contact a:hover { color: var(--sh3-cream); }

                    .sh3-utility {
                        align-self: start;
                        padding-top: 6px;
                    }
                    .sh3-utility ul { list-style: none; margin: 0; padding: 0; }
                    .sh3-utility li { margin: 0 0 14px; }
                    .sh3-utility a {
                        color: var(--sh3-muted);
                        font-size: 13px;
                        text-decoration: none;
                    }
                    .sh3-utility a:hover { color: var(--sh3-cream); }

                    .sh3-footer-body {
                        display: grid;
                        grid-template-columns: minmax(410px, .82fr) minmax(0, 1.18fr);
                        gap: clamp(64px, 8vw, 130px);
                        align-items: start;
                        padding: 34px 0 64px;
                        border-bottom: 1px solid rgba(244, 240, 232, .25);
                    }

                    .sh3-footer-nav {
                        display: grid;
                        grid-template-columns: repeat(3, minmax(0, 1fr));
                        gap: clamp(30px, 4vw, 64px);
                        padding: 22px 0 0;
                    }
                    .sh3-footer-group h3,
                    .sh3-footer-group .sh3-heading-spacer {
                        color: var(--sh3-cream);
                        display: block;
                        font-family: "Montserrat", sans-serif;
                        font-size: 11px;
                        font-weight: 600;
                        letter-spacing: .16em;
                        line-height: 1.2;
                        margin: 0 0 23px;
                        min-height: 14px;
                        text-transform: uppercase;
                    }
                    .sh3-footer-group ul { list-style: none; margin: 0; padding: 0; }
                    .sh3-footer-group li { margin: 0 0 12px; }
                    .sh3-footer-group a {
                        color: var(--sh3-muted);
                        font-size: 13px;
                        font-weight: 400;
                        line-height: 1.5;
                        text-decoration: none;
                        transition: color .2s ease, opacity .2s ease;
                    }
                    .sh3-footer-group a:hover { color: var(--sh3-cream); }

                    .sh3-footer-grid {
                        display: grid;
                        grid-template-columns: minmax(410px, .82fr) minmax(0, 1.18fr);
                        grid-template-areas:
                            "newsletter nav"
                            "brand utility";
                        column-gap: clamp(64px, 8vw, 130px);
                        row-gap: 58px;
                        align-items: start;
                        padding: 76px 0 64px;
                        border-bottom: 1px solid rgba(244, 240, 232, .25);
                    }
                    .sh3-footer-top,
                    .sh3-footer-body { display: contents; }
                    .sh3-newsletter { grid-area: newsletter; }
                    .sh3-brand { grid-area: brand; }
                    .sh3-footer-nav { grid-area: nav; padding-top: 8px; }
                    .sh3-utility { grid-area: utility; padding-top: 8px; }

                    .sh3-search {
                        display: flex;
                        margin-top: 30px;
                        border-bottom: 1px solid rgba(244, 240, 232, .48);
                    }
                    .sh3-search input {
                        flex: 1 1 auto;
                        min-width: 0;
                        height: 42px;
                        padding: 0 8px 0 0;
                        border: 0;
                        background: transparent;
                        color: var(--sh3-cream);
                        font: 400 12px/1.2 "Montserrat", sans-serif;
                        outline: 0;
                    }
                    .sh3-search input::placeholder { color: rgba(244, 240, 232, .58); }
                    .sh3-search button {
                        width: 36px;
                        border: 0;
                        background: transparent;
                        color: var(--sh3-cream);
                        cursor: pointer;
                        font-size: 20px;
                        line-height: 1;
                        padding: 0;
                    }

                    .sh3-footer-bottom {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        gap: 24px;
                        padding: 20px 0 24px;
                    }
                    .sh3-footer-bottom p {
                        color: var(--sh3-cream) !important;
                        font-size: 11px;
                        line-height: 1.5;
                        margin: 0;
                    }

                    @media (max-width: 991px) {
                        .sh3-footer-inner { width: min(100% - 48px, 760px); }
                        .sh3-footer-top {
                            grid-template-columns: 1fr;
                            gap: 58px;
                            padding: 62px 0 56px;
                        }
                        .sh3-footer-body {
                            grid-template-columns: 1fr;
                            gap: 54px;
                            padding: 0 0 58px;
                        }
                        .sh3-utility { padding-top: 0; }
                        .sh3-footer-nav { grid-template-columns: repeat(2, minmax(0, 1fr)); row-gap: 48px; }
                        .sh3-footer-grid {
                            grid-template-columns: 1fr;
                            grid-template-areas:
                                "newsletter"
                                "brand"
                                "nav"
                                "utility";
                            gap: 52px;
                            padding: 62px 0 58px;
                        }
                    }

                    @media (max-width: 575px) {
                        .sh3-footer-inner { width: calc(100% - 40px); }
                        .sh3-footer-top { padding: 50px 0 44px; gap: 48px; }
                        .sh3-brand-logo { width: min(100%, 286px); }
                        .sh3-contact-row { grid-template-columns: 78px minmax(0, 1fr); gap: 14px; }
                        .sh3-footer-body { gap: 42px; padding-bottom: 48px; }
                        .sh3-footer-nav { grid-template-columns: 1fr 1fr; gap: 42px 24px; padding: 0; }
                        .sh3-subscribe { margin-top: 24px; }
                        .sh3-footer-bottom { align-items: flex-start; flex-direction: column; gap: 6px; }
                        .sh3-footer-grid { gap: 44px; padding: 50px 0 48px; }
                    }
                    /* Keep content calls-to-action consistent across the site. */
                    main a.btn,
                    main a.sh-global-capsule,
                    .sh2-home-shell a.btn,
                    .sh2-home-shell a.sh-global-capsule,
                    body.single-partners .partner-detail-wrapper a.btn,
                    body.single-partners .partner-detail-wrapper a.sh-global-capsule {
                        display: inline-flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        gap: 10px !important;
                        min-height: 46px !important;
                        padding: 0 24px !important;
                        border: 1px solid currentColor !important;
                        border-radius: 999px !important;
                        line-height: 1.2 !important;
                        text-decoration: none !important;
                    }

                    @media (max-width: 767px) {
                        main a.btn,
                        main a.sh-global-capsule,
                        .sh2-home-shell a.btn,
                        .sh2-home-shell a.sh-global-capsule,
                        body.single-partners .partner-detail-wrapper a.btn,
                        body.single-partners .partner-detail-wrapper a.sh-global-capsule {
                            min-height: 44px !important;
                            padding-inline: 20px !important;
                        }
                    }
                </style>

                <div class="sh3-footer-inner">
                    <div class="sh3-footer-grid">
                    <div class="sh3-footer-top">
                        <section class="sh3-newsletter" aria-labelledby="sh3-newsletter-title">
                            <h2 id="sh3-newsletter-title">Sign up to our newsletter.</h2>
                            <p>Updates on new collections, project inspiration, and the latest from Sanctuary.</p>
                            <div class="sh3-subscribe sh3-subscribe--brevo">
                                <?php echo do_shortcode('[sibwp_form id=1]'); ?>
                            </div>
                        </section>

                        <div class="sh3-utility">
                            <ul>
                                <li><a href="https://sanctuaryholdings.lk/faq/">FAQs</a></li>
                                <li><a href="https://sanctuaryholdings.lk/privacy-policy/">Privacy Policy</a></li>
                            </ul>
                            <form class="sh3-search" role="search" method="get" action="https://sanctuaryholdings.lk/">
                                <input type="search" name="s" placeholder="Search the website" aria-label="Search the website">
                                <button type="submit" aria-label="Submit search">&#8594;</button>
                            </form>
                        </div>
                    </div>

                    <div class="sh3-footer-body">
                        <div class="sh3-brand">
                                <a href="https://sanctuaryholdings.lk/" aria-label="Sanctuary Holdings home">
                                    <img class="sh3-brand-logo" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/logo-white2.png" alt="Sanctuary Holdings">
                                </a>
                                <div class="sh3-contact">
                                    <div class="sh3-contact-row">
                                        <span class="sh3-contact-label">Showroom</span>
                                        <address>No. 831, Kotte Road, Ethul Kotte, 10100, Sri Lanka</address>
                                    </div>
                                    <div class="sh3-contact-row">
                                        <span class="sh3-contact-label">Email</span>
                                        <a href="mailto:contact@sanctuaryholdings.lk">contact@sanctuaryholdings.lk</a>
                                    </div>
                                    <div class="sh3-contact-row">
                                        <span class="sh3-contact-label">Telephone</span>
                                        <a href="tel:+94114331191">+94 11 433 1191</a>
                                    </div>
                                </div>
                        </div>

                        <nav class="sh3-footer-nav" aria-label="Footer navigation">
                        <div class="sh3-footer-group">
                            <h3>Sanctuary</h3>
                            <ul>
                                <li><a href="https://sanctuaryholdings.lk/about/">About Us</a></li>
                                <li><a href="https://sanctuaryholdings.lk/partners/">Our Partners</a></li>
                                <li><a href="https://sanctuaryholdings.lk/contact/">Contact Us</a></li>
                                <li><a href="https://sanctuaryholdings.lk/newspage/">News</a></li>
                            </ul>
                        </div>

                        <div class="sh3-footer-group">
                            <h3>Explore</h3>
                            <ul>
                                <li><a href="https://sanctuaryholdings.lk/project/">Projects</a></li>
                                <li><a href="https://sanctuaryholdings.lk/product-bandwidth/">Product Bandwidth</a></li>
                                <li><a href="https://sanctuaryholdings.lk/inspiration/">Inspiration</a></li>
                                <li><a href="https://sanctuaryholdings.lk/catalogues-technical-resources/">Downloads</a></li>
                            </ul>
                        </div>

                        <div class="sh3-footer-group">
                            <h3>Follow Us</h3>
                            <ul>
                                <li><a target="_blank" rel="noopener" href="https://www.instagram.com/sanctuaryholdingslk/">Instagram</a></li>
                                <li><a target="_blank" rel="noopener" href="https://www.facebook.com/sanctuaryholdings">Facebook</a></li>
                                <li><a target="_blank" rel="noopener" href="https://www.youtube.com/channel/UCz4dKjskq9UbgJiSrFXjLIA">YouTube</a></li>
                                <li><a target="_blank" rel="noopener" href="https://www.linkedin.com/company/sanctuaryholdings/">LinkedIn</a></li>
                            </ul>
                        </div>

                        </nav>
                    </div>
                    </div>

                    <div class="sh3-footer-bottom">
                        <p>&copy; Copyright 2026 Sanctuary Holdings (Pvt) Ltd</p>
                        <p>Colombo, Sri Lanka</p>
                    </div>
                </div>

                <script>
                document.addEventListener('submit', function (event) {
                    var form = event.target;
                    if (!form || !form.classList || !form.classList.contains('sh3-subscribe')) return;
                    event.preventDefault();
                    var input = form.querySelector('input[name="email"]');
                    var email = input ? input.value.trim() : '';
                    var recipient = form.getAttribute('data-newsletter-email') || 'contact@sanctuaryholdings.lk';
                    var subject = encodeURIComponent('Newsletter Subscription');
                    var body = encodeURIComponent('Please add this email to the Sanctuary Holdings newsletter: ' + email);
                    window.location.href = 'mailto:' + recipient + '?subject=' + subject + '&body=' + body;
                });

                document.addEventListener('DOMContentLoaded', function () {
                    var actionPattern = /^(visit|explore|learn more|read more|discover|view|plan your visit|get in touch|let(?:'|\u2019)s talk|talk to|let us help|see|download catalogue)/i;
                    var excludedAreas = '.sh2-site-header, .sh2-mobile-menu, .sh3-footer-wrapper, nav, .sh2-project-card, .sh2-inspiration-card, .sh2-offering-card, .sh2-logo-card';

                    document.querySelectorAll('main a, .sh2-home-shell a, body.single-partners .partner-detail-wrapper a').forEach(function (link) {
                        var label = (link.textContent || '').replace(/\s+/g, ' ').trim();
                        if (!label || label.length > 60 || !actionPattern.test(label) || link.closest(excludedAreas)) return;
                        link.classList.add('sh-global-capsule');
                    });
                });
                </script>
            </div>

        </div>
        <script defer src="<?php print THEMEROOT; ?>/js/scripts.js?v=20260806a"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script defer src="<?php print THEMEROOT; ?>/js/owl.carousel.min.js"></script>
        
<style id="sh-back-to-top-style">
#sh-back-to-top{position:fixed;right:24px;bottom:94px;width:46px;height:46px;border:1px solid rgba(255,255,255,.42);border-radius:999px;background:#3f5949;color:#fff;display:flex;align-items:center;justify-content:center;gap:0;padding:0 12px;box-shadow:0 10px 28px rgba(22,39,29,.24);cursor:pointer;overflow:hidden;opacity:0;visibility:hidden;pointer-events:none;transform:translateY(10px);transition:width .28s ease,gap .28s ease,opacity .25s ease,transform .25s ease,visibility .25s ease,background .25s ease;z-index:1002}
#sh-back-to-top.is-visible{opacity:1;visibility:visible;pointer-events:auto;transform:translateY(0)}
#sh-back-to-top:hover,#sh-back-to-top:focus-visible{width:136px;gap:8px;background:#263c31;transform:translateY(-3px)}
#sh-back-to-top:focus-visible{outline:2px solid #fff;outline-offset:3px}
#sh-back-to-top .sh-btt-arrow{flex:0 0 auto;font:400 24px/1 Arial,sans-serif;transform:translateY(-1px)}
#sh-back-to-top .sh-btt-label{max-width:0;opacity:0;overflow:hidden;white-space:nowrap;font:600 11px/1 Montserrat,sans-serif;letter-spacing:.04em;transition:max-width .28s ease,opacity .2s ease}
#sh-back-to-top:hover .sh-btt-label,#sh-back-to-top:focus-visible .sh-btt-label{max-width:76px;opacity:1}
@media(max-width:575px){#sh-back-to-top,#sh-back-to-top:hover,#sh-back-to-top:focus-visible{right:18px;bottom:84px;width:42px;height:42px;gap:0}#sh-back-to-top .sh-btt-label{display:none}}
</style>
<button id="sh-back-to-top" type="button" aria-label="Back to top"><span class="sh-btt-arrow" aria-hidden="true">&#8593;</span><span class="sh-btt-label" aria-hidden="true">Back to Top</span></button>
<script>
(function(){var b=document.getElementById('sh-back-to-top');if(!b)return;var tick=false;function update(){b.classList.toggle('is-visible',window.scrollY>500);tick=false}window.addEventListener('scroll',function(){if(!tick){requestAnimationFrame(update);tick=true}},{passive:true});b.addEventListener('click',function(){window.scrollTo({top:0,behavior:window.matchMedia('(prefers-reduced-motion: reduce)').matches?'auto':'smooth'})});update()})();
</script>
<style id="sh-footer-refinement-20260908">
/* Balanced two-column footer: content pairs vertically and remains compact. */
.sh3-contact,
.sh3-contact * { font-family: "diavlolight", Arial, sans-serif !important; }
.sh3-footer-grid {
  grid-template-columns: minmax(390px, .85fr) minmax(0, 1.15fr);
  grid-template-areas: "newsletter nav" "brand utility";
  column-gap: clamp(56px, 7vw, 112px);
  row-gap: 44px;
  padding: 68px 0 48px;
}
.sh3-footer-nav { padding-top: 0; }
.sh3-utility {
  align-self: end;
  display: grid;
  grid-template-columns: auto minmax(260px, 420px);
  align-items: end;
  justify-content: space-between;
  gap: 32px;
  width: 100%;
  padding-top: 0;
}
.sh3-utility ul { display:flex; align-items:center; flex-wrap:nowrap; gap:18px; }
.sh3-utility li { margin:0; }
.sh3-utility ul a,
.sh3-utility ul .shc-footer-preferences {
  color:var(--sh3-muted) !important;
  font-family:"Montserrat",sans-serif !important;
  font-size:11px !important;
  font-weight:400 !important;
  line-height:1.4 !important;
  letter-spacing:0 !important;
  text-transform:none !important;
  white-space:nowrap;
}
body .sh3-footer-wrapper .sh3-utility ul button#shc-preferences.shc-footer-preferences {
  display:inline !important;
  min-height:0 !important;
  height:auto !important;
  padding:0 !important;
  border:0 !important;
  background:transparent !important;
  vertical-align:baseline !important;
}
.sh3-search { justify-self:end; width:min(100%,420px); margin-top:0; }
@media (min-width:992px) and (max-width:1199px) {
  .sh3-footer-grid { grid-template-columns:minmax(340px,.8fr) minmax(0,1.2fr); column-gap:48px; }
  .sh3-utility { grid-template-columns:1fr; gap:18px; }
  .sh3-search { justify-self:stretch; width:100%; }
}
@media (max-width:991px) {
  .sh3-footer-grid {
    grid-template-columns:1fr;
    grid-template-areas:"newsletter" "brand" "nav" "utility";
    row-gap:44px;
    padding:58px 0 42px;
  }
  .sh3-utility { grid-template-columns:1fr; gap:22px; }
  .sh3-search { justify-self:stretch; width:100%; }
}
@media (max-width:575px) {
  .sh3-utility ul { gap:14px; }
  .sh3-utility ul a,
  .sh3-utility ul .shc-footer-preferences { font-size:10px !important; }
}
</style>
<?php wp_footer(); ?>
    </body>
</html>
