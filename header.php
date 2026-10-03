<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php echo esc_html( wp_get_document_title() ); ?></title>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
        <meta content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" name="copyright"/>
        <?php
        /* sh2_seo_description_repair */
        $sh2_title = function_exists( 'sanctuary_normalize_seo_title' ) ? sanctuary_normalize_seo_title( get_the_title() ) : wp_strip_all_tags( get_the_title() );
        $sh2_slug = get_post_field( 'post_name', get_queried_object_id() );
        if ( empty( $sh2_slug ) ) {
            $sh2_request_path = trim( (string) wp_parse_url( home_url( add_query_arg( array() ) ), PHP_URL_PATH ), '/' );
            $sh2_slug = basename( $sh2_request_path );
        }
            $sh2_page_descriptions = array(
                'home' => 'Sanctuary Holdings supplies premium bathroom fittings, sanitaryware, bathtubs, hot water systems, pumps and fire-safety solutions in Sri Lanka.',
                'washbasins' => 'Explore designer washbasins in Sri Lanka, including countertop, wall-hung, pedestal, stone, bamboo and solid-surface options at Sanctuary Holdings.',
                'taps-shower-systems' => 'Explore luxury taps and shower systems in Sri Lanka, with coordinated finishes and specialist specification support from Sanctuary Holdings.',
                'cinnamon-bentota-beach' => 'See how Sanctuary Holdings supplied bathware for 145 deluxe rooms, 20 suites and public areas at Cinnamon Bentota Beach in Sri Lanka.',
                'about' => 'Learn about Sanctuary Holdings, our story, partner brands, project approach, leadership team and premium bathware and building solutions in Sri Lanka.',
                'atelier-colours' => 'Discover expressive Bathco Atelier and Creavit coloured ceramics, from hand-painted and printed basins to bold coloured bathroom pieces.',
                'classic-bathrooms' => 'Explore classic bathroom inspiration with Victoria + Albert bathtubs, Creavit Antique, Alice Boheme, Fima series and Paffoni brassware.',
                'contact' => 'Visit Sanctuary Holdings at No. 831, Kotte Road, Ethul Kotte, or contact our team for premium bathware and specialist building solutions.',
                'faq' => 'Find answers about Sanctuary Holdings bathware, hot water, plumbing, pumps, fire curtains, showroom visits, quotations and project support.',
                'finishes-in-taps' => 'Compare premium tap and shower finishes including chrome, brushed nickel, matte black, brushed brass, rose gold, gunmetal and antique brass.',
                'hot-water-solutions' => 'Discover domestic, commercial and hybrid hot water solutions including water heaters, heat pumps, solar systems, gas boilers and project support.',
                'inspiration' => 'Explore bathroom trends, practical design guidance and sustainable ideas curated by Sanctuary Holdings for better, more thoughtful spaces.',
                'bathroom-trends-2025' => 'Explore bathroom design trends for 2025, from natural materials and minimal forms to sculptural washbasins and spa-inspired bathroom living.',
                'choosing-the-right-washbasin' => 'Learn how to choose the right washbasin by balancing size, material, installation type, water flow, ergonomics and everyday bathroom use.',
                'green-bathrooms' => 'Discover sustainable bathroom design ideas using green tones, natural materials, water-smart fittings, ventilation and refined nature-led details.',
                'materia' => 'Explore material-led bathroom inspiration including solid surface, composite, stone, metallic, wood, cement, texture and bamboo finishes.',
                'newspage' => 'Read Sanctuary Holdings news, product updates, project highlights and design insights across bathware, hot water, plumbing, pumps and fire safety.',
                'partners' => 'Explore Sanctuary Holdings partner brands across designer bathware, hot water solutions, pumps, fire curtains, plumbing and technical systems.',
                'privacy-policy' => 'Review the Sanctuary Holdings privacy policy and learn how we handle website enquiries, contact information and customer data responsibly.',
                'project' => 'Explore Sanctuary Holdings projects across luxury residences, hotels, apartments, resorts and commercial developments in Sri Lanka and the Maldives.',
                'pumps-fire-curtains' => 'Explore premium pump solutions and fire or smoke curtain systems designed for reliable building performance, protection and project safety.',
                'book-a-showroom-visit' => 'Book a private visit to the Sanctuary Holdings showroom in Ethul Kotte and explore premium bathware, finishes, hot water and project solutions.',
                'catalogues-technical-resources' => 'Browse Sanctuary Holdings catalogues, technical documents and product resources for premium bathware, hot water, pumps and building-system specifications.',
                'product-bandwidth' => 'Explore the Sanctuary Holdings product portfolio across designer bathware, finishes, hot water systems, pumps, fire curtains and technical solutions.',
                'request-a-quotation' => 'Request a tailored quotation from Sanctuary Holdings for premium bathware, hot water, plumbing, pump, fire-safety or project requirements in Sri Lanka.',
                'bathroom-transformations-without-major-renovation' => 'Discover practical ways to transform a bathroom without major renovation through considered fittings, finishes, furniture, lighting and accessories.',
                'bedroom-with-integrated-bathroom-ideas' => 'Explore design ideas for bedrooms with integrated bathrooms, balancing privacy, zoning, ventilation, materials and a seamless sense of space.',
                'news' => 'Read Sanctuary Holdings news, company updates, project milestones and product stories from the world of premium bathware and building solutions.',
            );

        $sh2_post_type = get_post_type();
        $sh2_path_meta = function_exists( 'sanctuary_get_path_seo_meta' ) ? sanctuary_get_path_seo_meta() : array();
        $sh2_saved_meta_description = (string) get_post_meta( get_queried_object_id(), '_yoast_wpseo_metadesc', true );
        if ( ! empty( $sh2_path_meta['description'] ) ) {
            $sh2_meta_description = $sh2_path_meta['description'];
        } elseif ( '' !== trim( $sh2_saved_meta_description ) ) {
            $sh2_meta_description = $sh2_saved_meta_description;
        } elseif ( isset( $sh2_page_descriptions[ $sh2_slug ] ) ) {
            $sh2_meta_description = $sh2_page_descriptions[ $sh2_slug ];
        } elseif ( in_array( $sh2_post_type, array( 'partner', 'partners' ), true ) ) {
            $sh2_meta_description = sprintf( 'Discover %s at Sanctuary Holdings in Sri Lanka, with expert product selection, specification guidance, showroom support and project assistance.', $sh2_title );
        } elseif ( in_array( $sh2_post_type, array( 'project', 'projects' ), true ) ) {
            $sh2_meta_description = sprintf( 'Explore the %s project by Sanctuary Holdings, featuring premium bathroom fittings and tailored solutions for hospitality, residential or commercial spaces.', $sh2_title );
        } elseif ( in_array( $sh2_post_type, array( 'news', 'post' ), true ) ) {
            $sh2_meta_description = sprintf( 'Read %s from Sanctuary Holdings, covering company news, projects and product developments.', $sh2_title );
        } else {
            $sh2_meta_description = sprintf( 'Explore %s from Sanctuary Holdings, with premium bathware, hot water, plumbing, pumps, fire-safety and project solutions in Sri Lanka.', $sh2_title );
        }

        if ( function_exists( 'sanctuary_normalize_meta_description' ) ) {
            $sh2_meta_description = sanctuary_normalize_meta_description( $sh2_meta_description );
        }
        echo '<meta name="description" content="' . esc_attr( $sh2_meta_description ) . '" />' . "\n";
        add_filter( 'wpseo_metadesc', '__return_false', 999 );
        add_filter( 'wpseo_opengraph_desc', function () use ( $sh2_meta_description ) { return $sh2_meta_description; }, 999 );
        add_filter( 'wpseo_twitter_description', function () use ( $sh2_meta_description ) { return $sh2_meta_description; }, 999 );
        ?>        <link href="<?php print THEMEROOT; ?>/css/bootstrap.min.css?v=20260630d" rel="stylesheet" type="text/css"/>
        <link href="<?php print THEMEROOT; ?>/css/owl.carousel.min.css?v=20260630d" rel="stylesheet" type="text/css"/>
        <link href="<?php print THEMEROOT; ?>/css/styles.css?v=20260714u" rel="stylesheet" type="text/css"/>
        <link href="<?php print THEMEROOT; ?>/style.css?v=20260930a" rel="stylesheet" type="text/css"/>
        <link rel="preload" as="image" href="<?php echo esc_url(home_url('/wp-content/uploads/2026/08/v-a-scaled.webp')); ?>" media="(min-width: 992px)">
        <?php wp_head(); ?>
        <style id="sh2-header-top-band-live-fix">
            .sh2-site-header .sh2-utility-bar { width: calc(100% + 44px) !important; min-height: 40px !important; height: 40px !important; margin: 0 -22px !important; padding: 0 22px !important; display: flex !important; align-items: center !important; justify-content: space-between !important; background: #55715b !important; color: #fff !important; box-sizing: border-box !important; }
            .sh2-site-header .sh2-utility-bar a { min-height: 40px !important; color: #fff !important; }
            .sh2-partners-trigger-row { display: inline-flex; align-items: center; gap: 4px; }
            .sh2-partners-toggle { width: 28px; height: 32px; padding: 0; border: 0; background: transparent; position: relative; cursor: pointer; }
            .sh2-partners-toggle::before { content: ""; width: 7px; height: 7px; border-right: 1.5px solid #3f5949; border-bottom: 1.5px solid #3f5949; position: absolute; left: 9px; top: 10px; transform: rotate(45deg); transition: transform .24s ease, top .24s ease; }
            .sh2-nav-item-has-flyout:hover .sh2-partners-toggle::before, .sh2-nav-item-has-flyout.is-open .sh2-partners-toggle::before, .sh2-nav-item-has-flyout:focus-within .sh2-partners-toggle::before { top: 13px; transform: rotate(225deg); }
            @media (min-width: 992px) {
                .sh2-site-header .sh2-nav-item-has-flyout { position: static !important; }
                .sh2-site-header .sh2-partners-flyout.sh2-partners-mega { width: min(1420px, calc(100vw - 32px)) !important; min-width: 0 !important; max-height: calc(100vh - 168px); margin: 0 !important; padding: 30px !important; display: grid !important; grid-template-columns: minmax(0, 2.35fr) minmax(250px, .8fr) !important; gap: 30px !important; position: absolute !important; top: calc(100% - 1px) !important; left: 50% !important; right: auto !important; overflow: auto; border: 1px solid rgba(63, 89, 73, .14) !important; border-radius: 0 !important; background: #f7f2ea !important; box-shadow: 0 30px 70px rgba(25, 38, 29, .16) !important; opacity: 0 !important; visibility: hidden !important; pointer-events: none !important; transform: translate(-50%, 0) !important; transition: opacity .22s ease, visibility .22s ease, transform .22s ease !important; }
                .sh2-site-header .sh2-nav-item-has-flyout:hover .sh2-partners-mega, .sh2-site-header .sh2-nav-item-has-flyout:focus-within .sh2-partners-mega, .sh2-site-header .sh2-nav-item-has-flyout.is-open .sh2-partners-mega { opacity: 1 !important; visibility: visible !important; pointer-events: auto !important; transform: translate(-50%, 0) !important; }
                .sh2-partners-mega a { text-transform: none !important; letter-spacing: normal !important; }
                .sh2-partners-mega__main { min-width: 0; }
                .sh2-partners-mega__intro { display: flex; align-items: end; justify-content: space-between; gap: 22px; margin-bottom: 20px; }
                .sh2-partners-mega__intro div > span, .sh2-partners-mega__popular > span, .sh2-partners-mega__feature > span { display: block; margin-bottom: 8px; color: #3f5949; font-family: "montserratbold", sans-serif; font-size: 10px; letter-spacing: .18em; text-transform: uppercase; }
                .sh2-partners-mega__intro strong { display: block; color: #3f5949; font-family: Baskerville, "Times New Roman", serif; font-size: clamp(28px, 2.5vw, 42px); font-weight: 400; line-height: 1; }
                .sh2-partners-mega__intro > a, .sh2-partners-mega__feature > a { padding: 0 0 5px !important; border-bottom: 1px solid #3f5949; color: #3f5949 !important; font-family: "montserratbold", sans-serif; font-size: 10px !important; letter-spacing: .12em !important; text-transform: uppercase !important; white-space: nowrap; }
                .sh2-partners-mega__divisions { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
                .sh2-partners-mega__card { display: block !important; padding: 0 !important; background: #fffdf8; color: #26362d !important; overflow: hidden; text-decoration: none !important; }
                .sh2-partners-mega__card figure { height: 172px; margin: 0; overflow: hidden; background: #e6e1d8; }
                .sh2-partners-mega__card figure img { width: 100%; height: 100%; display: block; object-fit: cover; transition: transform .5s ease; }
                .sh2-partners-mega__card:hover figure img, .sh2-partners-mega__card:focus figure img { transform: scale(1.045); }
                .sh2-partners-mega__card > div { padding: 17px 18px 19px; }
                .sh2-partners-mega__card span { display: block; margin-bottom: 7px; color: rgba(63, 89, 73, .56); font-size: 9px; font-weight: 700; letter-spacing: .16em; }
                .sh2-partners-mega__card strong { display: block; color: #3f5949; font-family: Baskerville, "Times New Roman", serif; font-size: clamp(21px, 1.65vw, 28px); font-weight: 400; line-height: 1.05; }
                .sh2-partners-mega__card p { min-height: 38px; margin: 9px 0 14px; color: #68736b; font-size: 11px; line-height: 1.55; }
                .sh2-partners-mega__card em { color: #3f5949; font-family: "montserratbold", sans-serif; font-size: 9px; font-style: normal; letter-spacing: .12em; text-transform: uppercase; }
                .sh2-partners-mega__popular { margin-top: 20px; padding-top: 16px; border-top: 1px solid rgba(63, 89, 73, .16); }
                .sh2-partners-mega__popular > div { display: flex; flex-wrap: wrap; gap: 8px 22px; }
                .sh2-partners-mega__popular a { padding: 0 !important; color: #34483b !important; font-size: 11px !important; }
                .sh2-partners-mega__feature { min-width: 0; padding-left: 28px; border-left: 1px solid rgba(63, 89, 73, .16); }
                .sh2-partners-mega__feature > strong { display: block; color: #3f5949; font-family: Baskerville, "Times New Roman", serif; font-size: clamp(24px, 2vw, 34px); font-weight: 400; line-height: 1.05; }
                .sh2-partners-mega__feature figure { height: 268px; margin: 18px 0 15px; overflow: hidden; background: #e6e1d8; }
                .sh2-partners-mega__feature img { width: 100%; height: 100%; display: block; object-fit: cover; transition: transform .5s ease; }
                .sh2-partners-mega__feature:hover img { transform: scale(1.04); }
                .sh2-partners-mega__feature p { margin: 0 0 17px; color: #68736b; font-size: 11px; line-height: 1.55; }
            }
            @media (max-width: 1180px) and (min-width: 992px) {
                .sh2-site-header .sh2-partners-flyout.sh2-partners-mega { padding: 22px !important; gap: 22px !important; }
                .sh2-partners-mega__card figure { height: 142px; }
                .sh2-partners-mega__feature { padding-left: 20px; }
                .sh2-partners-mega__feature figure { height: 230px; }
            }
            @media (max-width: 991px) {
                .sh2-mobile-partner-groups > details { border-bottom: 1px solid rgba(255,255,255,.14); }
                .sh2-mobile-partner-groups > details > summary { min-height: 54px; display: flex; align-items: center; padding: 0 4px; font-family: Baskerville, "Times New Roman", serif; font-size: 21px; }
                .sh2-mobile-submenu--curated { display: grid !important; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0 !important; padding: 5px 0 18px !important; }
                .sh2-mobile-submenu--curated a { min-height: 44px; display: flex !important; align-items: center; padding: 8px 7px !important; }
                .sh2-mobile-submenu--curated .sh2-mobile-submenu__all { grid-column: 1 / -1; margin-top: 7px; border-bottom: 1px solid rgba(63,89,73,.52); color: #3f5949 !important; font-family: "montserratbold", sans-serif; font-size: 10px; letter-spacing: .1em; text-transform: uppercase; }
                .sh2-mobile-partners__all { min-height: 50px; margin-top: 16px; display: flex !important; align-items: center; justify-content: center; border: 1px solid rgba(63,89,73,.58); color: #3f5949 !important; font-size: 11px !important; letter-spacing: .12em; text-transform: uppercase; }
            }

            /* Partners menu refinement: themed label, line-art divisions and brand accordions. */
            .sh2-site-header .sh2-partners-trigger-row > a { color: #3f5949 !important; font-family: "diavlobold", sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 22.5px !important; letter-spacing: 1.8px !important; text-transform: uppercase !important; }
            @media (min-width: 992px) {
                .sh2-partners-mega__division-accordions { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; align-items: start; }
                .sh2-partners-mega__division { min-width: 0; border: 1px solid rgba(63, 89, 73, .16); background: #fffdf8; }
                .sh2-partners-mega__division > summary { min-height: 286px; padding: 20px 18px 18px; display: flex; flex-direction: column; position: relative; list-style: none; cursor: pointer; }
                .sh2-partners-mega__division > summary::-webkit-details-marker { display: none; }
                .sh2-partners-mega__division > summary::after { content: "+"; width: 25px; height: 25px; display: grid; place-items: center; position: absolute; right: 15px; top: 15px; border: 1px solid rgba(63, 89, 73, .28); border-radius: 50%; color: #3f5949; font-family: Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 1; }
                .sh2-partners-mega__division[open] > summary::after { content: "−"; }
                .sh2-partners-mega__line-art { height: 144px; display: grid; place-items: center; margin: -4px 0 11px; color: #3f5949; background: linear-gradient(145deg, rgba(63,89,73,.055), rgba(247,242,234,.38)); }
                .sh2-partners-mega__line-art svg { width: 78%; height: 78%; overflow: visible; }
                .sh2-partners-mega__line-art svg * { fill: none; stroke: currentColor; stroke-width: 2.2; stroke-linecap: round; stroke-linejoin: round; vector-effect: non-scaling-stroke; }
                .sh2-partners-mega__division-copy { display: block; }
                .sh2-partners-mega__division-copy small { display: block; margin-bottom: 7px; color: rgba(63, 89, 73, .56); font-size: 9px; font-weight: 700; letter-spacing: .16em; }
                .sh2-partners-mega__division-copy strong { display: block; color: #3f5949; font-family: Baskerville, "Times New Roman", serif; font-size: clamp(21px, 1.65vw, 28px); font-weight: 400; line-height: 1.05; }
                .sh2-partners-mega__division-copy em { display: block; min-height: 34px; margin-top: 8px; color: #68736b; font-size: 11px; font-style: normal; line-height: 1.5; }
                .sh2-partners-mega__brands-panel { padding: 17px 18px 19px; border-top: 1px solid rgba(63, 89, 73, .14); background: rgba(247, 242, 234, .62); }
                .sh2-partners-mega__brands-panel > span { display: block; margin-bottom: 11px; color: #3f5949; font-family: "montserratbold", sans-serif; font-size: 9px; letter-spacing: .15em; text-transform: uppercase; }
                .sh2-partners-mega__brand-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 4px 12px; }
                .sh2-partners-mega__brand-grid--wide { grid-template-columns: repeat(2, minmax(0, 1fr)); }
                .sh2-partners-mega__brand-grid a { min-width: 0; padding: 5px 0 !important; color: #34483b !important; font-size: 10px !important; line-height: 1.35; }
                .sh2-partners-mega__division-link { display: inline-block !important; margin-top: 12px; padding: 0 0 5px !important; border-bottom: 1px solid #3f5949; color: #3f5949 !important; font-family: "montserratbold", sans-serif; font-size: 9px !important; letter-spacing: .1em !important; text-transform: uppercase !important; }
                .sh2-partners-mega__division[open] .sh2-partners-mega__brands-panel { animation: sh2-brand-panel-reveal .32s cubic-bezier(.22,.75,.28,1) both; transform-origin: top center; }
                @keyframes sh2-brand-panel-reveal { from { opacity: 0; transform: translateY(-10px) scaleY(.97); } to { opacity: 1; transform: translateY(0) scaleY(1); } }
                @media (prefers-reduced-motion: reduce) { .sh2-partners-mega__division[open] .sh2-partners-mega__brands-panel { animation: none; } }
                .sh2-partners-mega__division[open] { border-color: rgba(63, 89, 73, .34); box-shadow: 0 14px 30px rgba(25, 38, 29, .07); }
                .sh2-partners-mega__division[open] .sh2-partners-mega__line-art { background: rgba(63,89,73,.075); }
            }
            @media (max-width: 1180px) and (min-width: 992px) {
                .sh2-partners-mega__division > summary { min-height: 250px; padding: 16px; }
                .sh2-partners-mega__line-art { height: 116px; }
                .sh2-partners-mega__brands-panel { padding: 14px 15px 16px; }
            }
        </style>
        <script id="sh2-partners-mega-interactions">
            (function () {
                function initPartnersMega() {
                    var item = document.querySelector('.sh2-nav-item-has-flyout');
                    var toggle = document.querySelector('.sh2-partners-toggle');
                    var trigger = item && item.querySelector('.sh2-partners-trigger-row');
                    if (!item || !toggle || !trigger || item.dataset.megaReady) return;
                    item.dataset.megaReady = 'true';
                    var closeTimer;

                    function setMegaOpen(open) {
                        window.clearTimeout(closeTimer);
                        item.classList.toggle('is-open', open);
                        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
                        toggle.setAttribute('aria-label', open ? 'Close Partners menu' : 'Open Partners menu');
                    }

                    function openOnDesktopHover() {
                        if (window.innerWidth >= 992) setMegaOpen(true);
                    }

                    function closeAfterPointerLeaves() {
                        if (window.innerWidth < 992) return;
                        window.clearTimeout(closeTimer);
                        closeTimer = window.setTimeout(function () {
                            if (!item.matches(':hover') && !item.contains(document.activeElement)) {
                                setMegaOpen(false);
                            }
                        }, 350);
                    }

                    trigger.addEventListener('mouseenter', openOnDesktopHover);
                    item.addEventListener('mouseleave', closeAfterPointerLeaves);
                    item.addEventListener('focusin', openOnDesktopHover);
                    item.addEventListener('focusout', closeAfterPointerLeaves);

                    toggle.addEventListener('click', function (event) {
                        event.preventDefault();
                        event.stopPropagation();
                        setMegaOpen(!item.classList.contains('is-open'));
                    });
                    item.addEventListener('keydown', function (event) {
                        if (event.key === 'Escape') {
                            item.classList.remove('is-open');
                            toggle.setAttribute('aria-expanded', 'false');
                            toggle.setAttribute('aria-label', 'Open Partners menu');
                            toggle.focus();
                        }
                    });
                    document.addEventListener('click', function (event) {
                        if (!item.contains(event.target)) {
                            item.classList.remove('is-open');
                            toggle.setAttribute('aria-expanded', 'false');
                            toggle.setAttribute('aria-label', 'Open Partners menu');
                        }
                    });
                    document.querySelectorAll('.sh2-partners-mega__division').forEach(function (detail) {
                        detail.addEventListener('toggle', function () {
                            if (!detail.open) return;
                            document.querySelectorAll('.sh2-partners-mega__division').forEach(function (other) {
                                if (other !== detail) other.open = false;
                            });
                        });
                    });
                    document.querySelectorAll('.sh2-mobile-partner-groups > details').forEach(function (detail) {
                        detail.addEventListener('toggle', function () {
                            if (!detail.open) return;
                            document.querySelectorAll('.sh2-mobile-partner-groups > details').forEach(function (other) {
                                if (other !== detail) other.open = false;
                            });
                        });
                    });
                }
                if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initPartnersMega);
                else initPartnersMega();
            }());
        </script>
    <style id="sh4-partners-mega-style">
@media (min-width:992px){
  .sh2-site-header .sh2-nav-item-has-flyout{position:static!important}
  .sh2-site-header #sh2-partners-mega.sh4-partners-mega{width:min(1480px,calc(100vw - 24px))!important;max-width:1480px!important;max-height:calc(100vh - 132px)!important;top:calc(100% - 1px)!important;left:50%!important;right:auto!important;margin:0!important;padding:0!important;border:1px solid rgba(63,89,73,.16)!important;border-radius:0!important;background:#f7f2ea!important;box-shadow:0 24px 54px rgba(26,39,30,.12)!important;overflow:auto!important;display:block!important;grid-template-columns:none!important;gap:0!important;transform:translate(-50%,0)!important;z-index:1100!important}
  .sh2-nav-item-has-flyout::after{content:"";height:1px;position:absolute;left:0;right:0;bottom:0;background:#3f5949;opacity:0;transform:scaleX(.45);transition:opacity .22s ease,transform .22s ease}
  .sh2-nav-item-has-flyout:hover::after,.sh2-nav-item-has-flyout:focus-within::after,.sh2-nav-item-has-flyout.is-open::after{opacity:1;transform:scaleX(1)}
  .sh4-mega__shell{display:grid;grid-template-columns:minmax(0,62fr) minmax(400px,38fr);align-items:start;min-height:650px;background:#f7f2ea}
  .sh4-mega__directory{min-width:0;display:grid;grid-template-columns:minmax(0,59fr) minmax(0,41fr);background:#f7f2ea}
  .sh4-mega__column{min-width:0;padding:28px 16px 30px}
  .sh4-mega__column--left{padding-left:22px;padding-right:14px}
  .sh4-mega__column--middle{padding-left:14px;padding-right:18px;border-left:1px solid rgba(63,89,73,.13)}
  .sh4-brand-group+.sh4-brand-group{margin-top:24px;padding-top:22px;border-top:1px solid rgba(63,89,73,.13)}
  .sh4-brand-group__heading{display:flex;align-items:center;gap:12px;margin:0 0 14px}
  .sh4-brand-group__heading span{flex:0 0 auto;color:#3f5949;font-family:"montserratbold","Montserrat",sans-serif;font-size:9px;font-weight:600;letter-spacing:.2em;text-transform:uppercase}
  .sh4-brand-group__heading i{height:1px;flex:1;background:rgba(63,89,73,.17)}
  .sh4-brand-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}
  .sh4-mega__column--left .sh4-brand-grid{grid-template-columns:repeat(3,minmax(0,1fr))}
  .sh4-brand-row{position:relative;min-width:0;min-height:120px;display:flex!important;flex-direction:column;align-items:center;justify-content:center;gap:9px;padding:14px 10px 12px!important;border:1px solid #e4ded4;border-radius:11px;background:#fff;color:#26382e!important;box-shadow:0 5px 14px rgba(32,45,36,.045);text-align:center;text-decoration:none!important;transition:transform .25s ease,border-color .25s ease,box-shadow .25s ease,background .25s ease}
  .sh4-brand-row:hover,.sh4-brand-row:focus-visible{transform:translateY(-2px);border-color:#3f5949;background:#fff;box-shadow:0 10px 22px rgba(32,45,36,.09);outline:0}
  .sh4-brand-row:focus-visible{box-shadow:0 0 0 2px #f7f2ea,0 0 0 4px #3f5949,0 10px 22px rgba(32,45,36,.09)}
  .sh4-brand-row__logo{width:100%;height:68px;display:grid;place-items:center;background:transparent}
  .sh4-brand-row__logo img{width:70%;max-width:116px;height:58px;display:block;object-fit:contain}
  .sh4-brand-row__copy{display:block;line-height:1}
  .sh4-brand-row__copy strong{position:absolute!important;width:1px!important;height:1px!important;padding:0!important;margin:-1px!important;overflow:hidden!important;clip:rect(0,0,0,0)!important;white-space:nowrap!important;border:0!important}
  .sh4-brand-row__origin{display:block;margin:4px 0 0;color:rgba(47,67,54,.82);font-family:"montserratregular","Montserrat",sans-serif;font-size:9px;font-weight:600;letter-spacing:.045em;line-height:1.15;text-align:center;text-transform:uppercase}
  .sh4-brand-row__arrow{display:none!important}
  .sh4-feature{position:sticky;top:0;min-width:0;display:grid;grid-template-rows:auto auto;border-left:1px solid rgba(63,89,73,.14);background:#f1eadf}
  .sh4-feature__image{position:relative;overflow:hidden;background:#ded8ce;aspect-ratio:16/10}
  .sh4-feature__image::after{display:none}
  .sh4-feature__image img{width:100%;height:100%;display:block;object-fit:cover;opacity:1;transition:opacity .25s ease}
  .sh4-feature.is-changing .sh4-feature__image img{opacity:.12}
  .sh4-feature__body{padding:24px 30px 30px}
  .sh4-feature__eyebrow{display:block;margin-bottom:12px;color:#3f5949;font-family:"montserratbold","Montserrat",sans-serif;font-size:9px;letter-spacing:.21em;text-transform:uppercase}
  .sh4-feature__identity{display:flex;flex-direction:column;align-items:flex-start;justify-content:center;gap:9px;width:100%;margin-top:3px;text-align:left}
  .sh4-feature__logo{width:min(100%,240px);height:84px;display:flex;align-items:center;justify-content:flex-start;background:transparent}
  .sh4-feature__logo img{width:160px;height:70px;object-fit:contain;object-position:left center}
  .sh4-feature__origin{display:flex;align-items:center;justify-content:flex-start;margin-top:0}.sh4-feature__origin img{width:23px;height:15px;object-fit:cover;border:1px solid rgba(33,45,37,.12)}
  .sh4-feature__category{display:block;margin-top:18px;color:#384d40;font-family:"montserratbold","Montserrat",sans-serif;font-size:10px;letter-spacing:.12em;text-transform:uppercase}
  .sh4-feature p{max-width:540px;margin:10px 0 19px;color:#606c64;font-size:12px;line-height:1.68;text-align:left}
  .sh4-feature__cta{display:inline-flex!important;align-items:center;gap:12px;min-height:42px;padding:0 18px!important;border:1px solid #3f5949;background:#3f5949;color:#fff!important;font-family:"montserratbold","Montserrat",sans-serif;font-size:9px!important;letter-spacing:.14em!important;text-decoration:none!important;text-transform:uppercase!important;transition:background .22s ease,color .22s ease,border-color .22s ease}
  .sh4-feature__cta:hover,.sh4-feature__cta:focus-visible{background:#2d4336;border-color:#2d4336;color:#fff!important;outline:2px solid #3f5949;outline-offset:2px}
  .sh2-site-header .sh2-nav-item-has-flyout.is-escape-closed #sh2-partners-mega.sh4-partners-mega{opacity:0!important;visibility:hidden!important;pointer-events:none!important}
}
@media (min-width:992px) and (max-width:1180px){
  .sh4-mega__shell{grid-template-columns:minmax(0,62fr) minmax(350px,38fr)}
  .sh4-mega__directory{grid-template-columns:minmax(0,59fr) minmax(0,41fr)}
  .sh4-mega__column{padding-top:22px;padding-bottom:24px}.sh4-mega__column--left{padding-left:14px;padding-right:10px}.sh4-mega__column--middle{padding-left:10px;padding-right:12px}
  .sh4-brand-grid{gap:7px}.sh4-brand-row{min-height:110px;padding:11px 6px 10px!important}.sh4-brand-row__logo{height:61px}.sh4-brand-row__logo img{max-width:92px;height:51px}.sh4-feature__body{padding:22px 24px 26px}
}
@media (max-width:991px){
  #sh2-partners-mega{display:none!important}
  .sh4-mobile-partner-groups{padding:4px 0 18px}
  .sh4-mobile-partner-groups>details{margin:8px 0!important;border:1px solid rgba(63,89,73,.16)!important;background:rgba(255,255,255,.52)!important}
  .sh4-mobile-partner-groups>details>summary{min-height:52px!important;display:flex!important;align-items:center!important;justify-content:space-between!important;padding:0 14px!important;color:#3f5949!important;font-family:"montserratbold","Montserrat",sans-serif!important;font-size:11px!important;letter-spacing:.08em!important;text-transform:uppercase!important}
  .sh4-mobile-partner-groups>details>summary::after{content:"+";font-size:18px;font-weight:300}.sh4-mobile-partner-groups>details[open]>summary::after{content:"-"}
  .sh4-mobile-brand-list{padding:0 10px 12px}
  .sh4-mobile-brand{min-height:58px;display:grid!important;grid-template-columns:52px minmax(0,1fr);align-items:center;gap:12px;padding:7px 5px!important;border-top:1px solid rgba(63,89,73,.1);color:#34483b!important;text-decoration:none!important}
  .sh4-mobile-brand:focus-visible{outline:2px solid #3f5949;outline-offset:1px}
  .sh4-mobile-brand__logo{width:52px;height:44px;display:grid;place-items:center;background:transparent}.sh4-mobile-brand__logo img{width:46px;height:36px;object-fit:contain}
  .sh4-mobile-brand__copy strong{display:block;color:#2f4336;font-family:"montserratregular","Montserrat",sans-serif;font-size:11px;font-weight:600;line-height:1.25}
  .sh4-mobile-brand__country{display:block;margin-top:4px;color:rgba(47,67,54,.80);font-family:"montserratregular","Montserrat",sans-serif;font-size:10px;font-weight:500;letter-spacing:.025em;line-height:1.25}
  .sh4-mobile-brand__arrow{display:none!important}
}
</style>
<style id="sh5-partner-logo-scale-tuning">
@media (min-width:992px){
  .sh4-brand-row__logo img{transform:scale(var(--sh4-logo-scale,1));transform-origin:center;transition:transform .25s ease}
  .sh4-brand-row[data-sh4-name="Cosmic"]{--sh4-logo-scale:1.90}
  .sh4-brand-row[data-sh4-name="Victoria + Albert"]{--sh4-logo-scale:1.35}
  .sh4-brand-row[data-sh4-name="Paffoni"]{--sh4-logo-scale:1.20}
  .sh4-brand-row[data-sh4-name="Fima | Carlo Frattini"]{--sh4-logo-scale:2.25}
  .sh4-brand-row[data-sh4-name="Perrin & Rowe"]{--sh4-logo-scale:1.25}
  .sh4-brand-row[data-sh4-name="Daniel"]{--sh4-logo-scale:1.55}
  .sh4-brand-row[data-sh4-name="Sanibano"]{--sh4-logo-scale:1.35}
  .sh4-brand-row[data-sh4-name="ASI"]{--sh4-logo-scale:1.30}
  .sh4-brand-row[data-sh4-name="Creavit"]{--sh4-logo-scale:1.42}
  .sh4-brand-row[data-sh4-name="Valvex"]{--sh4-logo-scale:1.65}
  .sh4-brand-row[data-sh4-name="Delabie"]{--sh4-logo-scale:1.38}
  .sh4-brand-row[data-sh4-name="Sloan"]{--sh4-logo-scale:1.42}
  .sh4-feature__logo img{transform:scale(var(--sh4-feature-logo-scale,1));transform-origin:left center}
  .sh4-feature__logo img[alt^="Cosmic"]{--sh4-feature-logo-scale:1.30}
  .sh4-feature__logo img[alt^="Victoria + Albert"]{--sh4-feature-logo-scale:1.22}
  .sh4-feature__logo img[alt^="Paffoni"]{--sh4-feature-logo-scale:1.15}
  .sh4-feature__logo img[alt^="Fima | Carlo Frattini"]{--sh4-feature-logo-scale:1.60}
  .sh4-feature__logo img[alt^="Perrin & Rowe"]{--sh4-feature-logo-scale:1.18}
  .sh4-feature__logo img[alt^="Daniel"]{--sh4-feature-logo-scale:1.25}
  .sh4-feature__logo img[alt^="Sanibano"]{--sh4-feature-logo-scale:1.25}
  .sh4-feature__logo img[alt^="ASI"]{--sh4-feature-logo-scale:1.20}
  .sh4-feature__logo img[alt^="Creavit"]{--sh4-feature-logo-scale:1.30}
  .sh4-feature__logo img[alt^="Valvex"]{--sh4-feature-logo-scale:1.32}
  .sh4-feature__logo img[alt^="Delabie"]{--sh4-feature-logo-scale:1.28}
  .sh4-feature__logo img[alt^="Sloan"]{--sh4-feature-logo-scale:1.30}
}
@media (max-width:991px){
  .sh4-mobile-brand__logo img{transform:scale(var(--sh4-mobile-logo-scale,1));transform-origin:center}
  .sh4-mobile-brand[aria-label^="Cosmic —"]{--sh4-mobile-logo-scale:1.75}
  .sh4-mobile-brand[aria-label^="Victoria + Albert —"]{--sh4-mobile-logo-scale:1.25}
  .sh4-mobile-brand[aria-label^="Paffoni —"]{--sh4-mobile-logo-scale:1.16}
  .sh4-mobile-brand[aria-label^="Fima | Carlo Frattini —"]{--sh4-mobile-logo-scale:1.95}
  .sh4-mobile-brand[aria-label^="Perrin & Rowe —"]{--sh4-mobile-logo-scale:1.20}
  .sh4-mobile-brand[aria-label^="Daniel —"]{--sh4-mobile-logo-scale:1.40}
  .sh4-mobile-brand[aria-label^="Sanibano —"]{--sh4-mobile-logo-scale:1.25}
  .sh4-mobile-brand[aria-label^="ASI —"]{--sh4-mobile-logo-scale:1.22}
  .sh4-mobile-brand[aria-label^="Creavit —"]{--sh4-mobile-logo-scale:1.30}
  .sh4-mobile-brand[aria-label^="Valvex —"]{--sh4-mobile-logo-scale:1.48}
  .sh4-mobile-brand[aria-label^="Delabie —"]{--sh4-mobile-logo-scale:1.28}
  .sh4-mobile-brand[aria-label^="Sloan —"]{--sh4-mobile-logo-scale:1.30}
}
</style>
<style id="sh6-partner-directory-monochrome">
/* Exact live utility-bar green: rgb(85,113,91) / #55715b. Directory logos only; flags and Featured Brand remain full colour. */
.sh4-brand-row__logo img,
.sh4-mobile-brand__logo img{
  -webkit-filter:url(#sh6-directory-green-filter);
  filter:url(#sh6-directory-green-filter);
}
</style>
<svg aria-hidden="true" focusable="false" width="0" height="0" style="position:absolute;width:0;height:0;overflow:hidden" xmlns="http://www.w3.org/2000/svg">
  <filter id="sh6-directory-green-filter" color-interpolation-filters="sRGB">
    <feColorMatrix type="matrix" values="
      .141733 .476800 .048133 0 .333333
      .118400 .398300 .040163 0 .443137
      .136750 .459950 .046437 0 .356863
      0 0 0 1 0"/>
  </filter>
</svg>

<script id="sh4-partners-mega-controller" data-no-delay-js>
(function(){
  function init(){
    var navItem=document.querySelector('.sh2-nav-item-has-flyout');
    var mega=document.querySelector('[data-sh4-partners-mega]');
    var toggle=document.querySelector('.sh2-partners-toggle');
    var trigger=navItem&&navItem.querySelector('.sh2-partners-trigger-row');
    if(!navItem||!mega||!trigger||navItem.dataset.sh4Ready)return;
    navItem.dataset.sh4Ready='true';
    var closeTimer,suppressFocusOpen=false;
    function openMenu(){if(suppressFocusOpen)return;clearTimeout(closeTimer);navItem.classList.remove('is-escape-closed');navItem.classList.add('is-open');if(toggle){toggle.setAttribute('aria-expanded','true');toggle.setAttribute('aria-label','Close Partners menu')}}
    function closeMenu(returnFocus){clearTimeout(closeTimer);if(returnFocus){suppressFocusOpen=true;navItem.classList.add('is-escape-closed')}else{navItem.classList.remove('is-escape-closed')}navItem.classList.remove('is-open');if(toggle){toggle.setAttribute('aria-expanded','false');toggle.setAttribute('aria-label','Open Partners menu');if(returnFocus){toggle.focus();requestAnimationFrame(function(){suppressFocusOpen=false})}}}
    trigger.addEventListener('mouseenter',openMenu);
    navItem.addEventListener('mouseleave',function(){clearTimeout(closeTimer);closeTimer=setTimeout(function(){if(!navItem.matches(':hover')&&!navItem.contains(document.activeElement))closeMenu(false)},180)});
    
    mega.addEventListener('mouseleave',function(){clearTimeout(closeTimer);closeTimer=setTimeout(function(){if(!navItem.matches(':hover')&&!navItem.contains(document.activeElement))closeMenu(false)},180)});
    navItem.addEventListener('focusin',openMenu);
    navItem.addEventListener('focusout',function(event){if(!navItem.contains(event.relatedTarget)){clearTimeout(closeTimer);closeTimer=setTimeout(function(){closeMenu(false)},120)}});
    navItem.addEventListener('keydown',function(event){if(event.key==='Escape'){event.preventDefault();closeMenu(true)}});
    document.addEventListener('click',function(event){if(!navItem.contains(event.target))closeMenu(false)});
    if(toggle)toggle.addEventListener('click',function(event){
      event.preventDefault();event.stopPropagation();event.stopImmediatePropagation();
      if(navItem.classList.contains('is-open'))closeMenu(false);else openMenu()
    },true);
    document.querySelectorAll('.sh4-mobile-partner-groups>details').forEach(function(detail){
      detail.addEventListener('toggle',function(){
        if(!detail.open)return;
        document.querySelectorAll('.sh4-mobile-partner-groups>details').forEach(function(other){if(other!==detail)other.open=false})
      })
    });
    var panel=mega.querySelector('.sh4-feature');
    var image=mega.querySelector('[data-sh4-feature-image]');
    var logo=mega.querySelector('[data-sh4-feature-logo]');
    var flag=mega.querySelector('[data-sh4-feature-flag]');
    var country=mega.querySelector('[data-sh4-feature-country]');
    var name=mega.querySelector('[data-sh4-feature-name]');
    var category=mega.querySelector('[data-sh4-feature-category]');
    var description=mega.querySelector('[data-sh4-feature-description]');
    var link=mega.querySelector('[data-sh4-feature-link]');
    if(image&&window.matchMedia('(min-width:992px)').matches&&!image.getAttribute('src'))image.src=image.dataset.sh4DefaultImage;
    var intentTimer,swapTimer,changeToken=0,prefetched={};
    function loadFeatured(url,done){
      if(prefetched[url]){done();return}
      var next=new Image();next.decoding='async';
      next.onload=function(){prefetched[url]=true;done()};next.onerror=done;next.src=url
    }
    function update(row){
      if(!row||!panel||row.dataset.sh4Name===name.textContent)return;
      clearTimeout(intentTimer);clearTimeout(swapTimer);var token=++changeToken;
      intentTimer=setTimeout(function(){
        loadFeatured(row.dataset.sh4Image,function(){
          if(token!==changeToken)return;panel.classList.add('is-changing');
          swapTimer=setTimeout(function(){
            if(token!==changeToken)return;
            image.src=row.dataset.sh4Image;image.alt=row.dataset.sh4Name+' product and application image';
            logo.src=row.dataset.sh4Logo;logo.alt=row.dataset.sh4Name+' logo';
            flag.src=row.dataset.sh4Flag;flag.alt=row.dataset.sh4Country+' flag';
            country.textContent=row.dataset.sh4Country;name.textContent=row.dataset.sh4Name;
            category.textContent=row.dataset.sh4Category;description.textContent=row.dataset.sh4Description;link.href=row.href;
            requestAnimationFrame(function(){panel.classList.remove('is-changing')});
          },110)
        })
      },80)
    }
    mega.querySelectorAll('.sh4-brand-row').forEach(function(row){
      row.addEventListener('mouseenter',function(){update(row)});
      row.addEventListener('focus',function(){update(row)})
    })
  }
  if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',init);else init()
}());
</script>
<style id="sh4-utility-dropdowns">
.sh2-site-header .sh2-utility-bar{position:relative!important;z-index:1300!important;overflow:visible!important}
.sh4-utility-menu-wrap{position:relative;height:40px;display:flex;align-items:center;gap:9px;color:#fff;font-family:"Montserrat",Arial,sans-serif}
.sh4-utility-menu{position:static;height:40px;color:#fff;font-family:"Montserrat",Arial,sans-serif}
.sh4-utility-menu summary{display:flex;align-items:center;justify-content:center;width:18px;height:40px;min-width:0;padding:0;border:0;list-style:none;color:#fff;cursor:pointer;font-size:14px;font-weight:500;line-height:1;letter-spacing:.01em}
.sh2-site-header .sh2-utility-bar .sh4-utility-menu__label{display:flex!important;align-items:center!important;min-height:40px!important;padding:0!important;color:#fff!important;text-decoration:none!important;font:inherit!important;letter-spacing:inherit!important;text-transform:none!important}
.sh2-site-header .sh2-utility-bar .sh4-utility-menu__label:hover,.sh2-site-header .sh2-utility-bar .sh4-utility-menu__label:focus-visible{text-decoration:underline!important;text-underline-offset:4px;outline:2px solid rgba(255,255,255,.78);outline-offset:2px}
.sh4-utility-menu summary::-webkit-details-marker{display:none}
.sh4-utility-menu__chevron{width:6px;height:6px;border-right:1px solid currentColor;border-bottom:1px solid currentColor;transform:translateY(-2px) rotate(45deg);transition:transform .22s ease}
.sh4-utility-menu[open] .sh4-utility-menu__chevron{transform:translateY(2px) rotate(225deg)}
.sh4-utility-menu__panel{position:absolute;top:40px;width:292px;padding:9px 0;border:1px solid rgba(63,89,73,.16);background:#f7f2ea;box-shadow:0 18px 42px rgba(30,43,35,.13);z-index:1400}
.sh4-utility-menu--left .sh4-utility-menu__panel{left:-10px}
.sh4-utility-menu--right .sh4-utility-menu__panel{right:-10px}
.sh4-utility-menu:not([open]) .sh4-utility-menu__panel{display:none}
.sh2-site-header .sh2-utility-bar .sh4-utility-menu__panel a{display:flex!important;align-items:center!important;justify-content:space-between!important;min-height:44px!important;padding:10px 16px!important;border-bottom:1px solid rgba(63,89,73,.11);color:#26392e!important;text-decoration:none!important;font-size:11px!important;font-weight:600!important;line-height:1.35!important;letter-spacing:.055em!important;text-transform:uppercase!important;transition:background .22s ease,color .22s ease}
.sh2-site-header .sh2-utility-bar .sh4-utility-menu__panel a:last-child{border-bottom:0}
.sh2-site-header .sh2-utility-bar .sh4-utility-menu__panel a span:last-child{font-size:15px;transition:transform .22s ease}
.sh2-site-header .sh2-utility-bar .sh4-utility-menu__panel a:hover,.sh2-site-header .sh2-utility-bar .sh4-utility-menu__panel a:focus-visible{background:#eee7dc!important;color:#3f5949!important;outline:2px solid #3f5949;outline-offset:-3px}
.sh2-site-header .sh2-utility-bar .sh4-utility-menu__panel a:hover span:last-child,.sh2-site-header .sh2-utility-bar .sh4-utility-menu__panel a:focus-visible span:last-child{transform:translateX(3px)}
.sh2-site-header .sh2-utility-bar .sh4-utility-menu__panel .sh4-utility-menu__explore{margin-top:4px;color:#3f5949!important;font-weight:700!important}
@media(max-width:575px){.sh4-utility-menu summary{font-size:13px}.sh4-utility-menu__panel{position:fixed;top:40px;width:min(292px,calc(100vw - 24px))}.sh4-utility-menu--left .sh4-utility-menu__panel{left:12px}.sh4-utility-menu--right .sh4-utility-menu__panel{right:12px}}
</style>
<script id="sh4-utility-dropdown-controller">
(function(){
 function init(){
  var menus=[].slice.call(document.querySelectorAll('.sh4-utility-menu'));
  if(!menus.length)return;
  var timers=new WeakMap();
  function setMenu(menu,open){
   clearTimeout(timers.get(menu));
   menu.open=open;
   var summary=menu.querySelector('summary');
   if(summary)summary.setAttribute('aria-expanded',open?'true':'false');
   if(open)menus.forEach(function(other){if(other!==menu){other.open=false;var os=other.querySelector('summary');if(os)os.setAttribute('aria-expanded','false');}});
  }
  menus.forEach(function(menu){
   var summary=menu.querySelector('summary');
   summary.addEventListener('click',function(event){if(event.target.closest('.sh4-utility-menu__label'))return;event.preventDefault();setMenu(menu,!menu.open);});
   menu.addEventListener('mouseenter',function(){if(window.matchMedia('(hover:hover) and (min-width:768px)').matches)setMenu(menu,true);});
   menu.addEventListener('mouseleave',function(){if(window.matchMedia('(hover:hover) and (min-width:768px)').matches)timers.set(menu,setTimeout(function(){setMenu(menu,false);},180));});
   menu.addEventListener('focusout',function(){timers.set(menu,setTimeout(function(){if(!menu.contains(document.activeElement))setMenu(menu,false);},120));});
  });
  document.addEventListener('click',function(event){menus.forEach(function(menu){if(!menu.contains(event.target))setMenu(menu,false);});});
  document.addEventListener('keydown',function(event){if(event.key==='Escape'){menus.forEach(function(menu){if(menu.open){setMenu(menu,false);menu.querySelector('summary').focus();}});}});
 }
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',init);else init();
}());
</script>

<!-- Sanctuary sitewide typography system — 2026-09-05 -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
<style id="sh-sitewide-typography-20260905">
/* sh-font-faces-20260930: single canonical @font-face source for the Sanctuary aliases.
   Theme-relative absolute URLs survive CSS combination; style.css and css/styles.css no longer redeclare these. */

@font-face {
  font-family: "diavlolight";
  src: url("<?php echo esc_url( THEMEROOT . '/fonts/diavlo_light_ii.woff2' ); ?>") format("woff2"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/diavlo_light_ii.woff' ); ?>") format("woff"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/diavlo_light_ii.ttf' ); ?>") format("truetype");
  font-weight: 400;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: "diavlobold";
  src: url("<?php echo esc_url( THEMEROOT . '/fonts/diavlo_bold_ii.woff2' ); ?>") format("woff2"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/diavlo_bold_ii.woff' ); ?>") format("woff"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/diavlo_bold_ii.ttf' ); ?>") format("truetype");
  font-weight: 400;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: "montserratregular";
  src: url("<?php echo esc_url( THEMEROOT . '/fonts/montserrat-regular.woff2' ); ?>") format("woff2"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/montserrat-regular.woff' ); ?>") format("woff"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/montserrat-regular.ttf' ); ?>") format("truetype");
  font-weight: 400;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: "montserratbold";
  src: url("<?php echo esc_url( THEMEROOT . '/fonts/montserrat-bold.woff2' ); ?>") format("woff2"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/montserrat-bold.woff' ); ?>") format("woff"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/montserrat-bold.ttf' ); ?>") format("truetype");
  font-weight: 400;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: "montserratbold";
  src: url("<?php echo esc_url( THEMEROOT . '/fonts/montserrat-bold.woff2' ); ?>") format("woff2"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/montserrat-bold.woff' ); ?>") format("woff"),
       url("<?php echo esc_url( THEMEROOT . '/fonts/montserrat-bold.ttf' ); ?>") format("truetype");
  font-weight: 700;
  font-style: normal;
  font-display: swap;
}

:root {
  --sh-type-green: #3f5949;
  --sh-type-body: #607067;
  --sh-type-copper: #bb8964;
}

/* Hero titles */
body:not(.wp-admin):not(#sh-typography-specificity) .main-slider .carousel-caption h5,
body:not(.wp-admin):not(#sh-typography-specificity) main [class*="hero"] h1,
body:not(.wp-admin):not(#sh-typography-specificity) main [class*="banner"] h1 {
  font-family: "Poiret One", sans-serif !important;
  font-size: 84px !important;
  font-weight: 400 !important;
  line-height: 1.04 !important;
}
body:not(.wp-admin):not(#sh-typography-specificity) .main-slider .carousel-caption h5 *,
body:not(.wp-admin):not(#sh-typography-specificity) main [class*="hero"] h1 *,
body:not(.wp-admin):not(#sh-typography-specificity) main [class*="banner"] h1 * {
  font-family: inherit !important;
  font-size: inherit !important;
  font-weight: inherit !important;
  line-height: inherit !important;
  color: inherit !important;
}
body:not(.wp-admin):not(#sh-typography-specificity) .main-slider .carousel-caption h5 { color: #fff !important; }
body:not(.wp-admin):not(#sh-typography-specificity) .sh-partners-overview-hero__copy h1,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-hero__copy h1,
body:not(.wp-admin):not(#sh-typography-specificity) .shpm-hero__message h1,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-insp-hero__copy h1 { color: var(--sh-type-green) !important; }

/* Hero body copy */
body:not(.wp-admin):not(#sh-typography-specificity) .main-slider .carousel-caption p,
body:not(.wp-admin):not(#sh-typography-specificity) main [class*="hero"] p,
body:not(.wp-admin):not(#sh-typography-specificity) main [class*="banner"] p {
  font-family: "diavlolight", sans-serif !important;
  font-size: 15px !important;
  font-weight: 400 !important;
}
body:not(.wp-admin):not(#sh-typography-specificity) .sh-partners-overview-hero__copy p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-hero__copy p,
body:not(.wp-admin):not(#sh-typography-specificity) .shpm-hero__message p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-insp-hero__copy p { color: var(--sh-type-green) !important; }

/* Main page and section titles — intentionally excludes card, tile and overlay titles */
body:not(.wp-admin):not(#sh-typography-specificity) .sh2-section-heading h2,
body:not(.wp-admin):not(#sh-typography-specificity) .sh2-direction-copy h2,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-partners-overview-intro h2,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-section__head h2,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-prose h2,
body:not(.wp-admin):not(#sh-typography-specificity) .shpm-intro h2,
body:not(.wp-admin):not(#sh-typography-specificity) .shpm-section-head h2,
body:not(.wp-admin):not(#sh-typography-specificity) .shpm-story__copy > h3,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-design-section-head h2,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-design-subsection-head h2,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-infographic-head h3,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-feature-copy > h3,
body:not(.wp-admin):not(#sh-typography-specificity) main .section-heading h2,
body:not(.wp-admin):not(#sh-typography-specificity) main .section-title {
  font-family: "Poiret One", sans-serif !important;
  font-size: 72px !important;
  font-weight: 400 !important;
  line-height: 1.06 !important;
  color: var(--sh-type-green) !important;
}

/* Page-content body copy */
body:not(.wp-admin):not(#sh-typography-specificity) .sh2-home-shell p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-partners-overview p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-v2 p,
body:not(.wp-admin):not(#sh-typography-specificity) .shpm p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-insp p,
body:not(.wp-admin):not(#sh-typography-specificity) main p {
  font-family: "diavlolight", sans-serif !important;
  font-size: 15px !important;
  color: var(--sh-type-body) !important;
}
/* Preserve legibility where copy sits on dark imagery or colour fields. */
body:not(.wp-admin):not(#sh-typography-specificity) .main-slider p,
body:not(.wp-admin):not(#sh-typography-specificity) [class*="overlay"] p,
body:not(.wp-admin):not(#sh-typography-specificity) [class*="dark"] p,
body:not(.wp-admin):not(#sh-typography-specificity) [class*="cta"] p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-numbers p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-partners p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-partners-overview-strengths p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-partners-overview-showcase p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-project-thinking__grid article p,
body:not(.wp-admin):not(#sh-typography-specificity) .shpm-film p { color: #fff !important; }
body:not(.wp-admin):not(#sh-typography-specificity) .sh-partners-overview-hero__copy p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-hero__copy p,
body:not(.wp-admin):not(#sh-typography-specificity) .shpm-hero__message p,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-insp-hero__copy p { color: var(--sh-type-green) !important; }

/* Eyebrows and kickers */
body:not(.wp-admin):not(#sh-typography-specificity) [class*="eyebrow"]:not(#sh-typography-eyebrow-specificity),
body:not(.wp-admin):not(#sh-typography-specificity) .eyebrow:not(#sh-typography-eyebrow-specificity),
body:not(.wp-admin):not(#sh-typography-specificity) [class*="kicker"]:not(#sh-typography-eyebrow-specificity),
body:not(.wp-admin):not(#sh-typography-specificity) .kicker:not(#sh-typography-eyebrow-specificity),
body:not(.wp-admin):not(#sh-typography-specificity) .sh-insp-hero__copy > span:first-child:not(#sh-typography-eyebrow-specificity),
body:not(.wp-admin):not(#sh-typography-specificity) .sh2-section-heading > span:first-child,
body:not(.wp-admin):not(#sh-typography-specificity) .sh2-direction-copy > span:first-child,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-design-section-head > span:first-child,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-design-subsection-head > span:first-child,
body:not(.wp-admin):not(#sh-typography-specificity) .sh-infographic-head > span:first-child {
  font-family: "montserratbold", "Montserrat", sans-serif !important;
  font-size: 13px !important;
  font-weight: 700 !important;
  color: var(--sh-type-copper) !important;
}

/* sh-home-contrast-fix-20260908: shared hero CTA face and dark-card copy. */
body.home:not(.wp-admin) .main-slider .carousel-caption .btn {
  font-family: "montserratbold", sans-serif !important;
  font-weight: 700 !important;
}
body.home:not(.wp-admin):not(#sh-home-direction-copy-fix) .sh2-direction-grid .sh2-direction-card p {
  color: #ffffff !important;
}

/* Responsive scaling keeps the desktop specification intact without mobile overflow. */
@media (max-width: 1199px) {
  body:not(.wp-admin):not(#sh-typography-specificity) .main-slider .carousel-caption h5,
  body:not(.wp-admin):not(#sh-typography-specificity) main [class*="hero"] h1,
  body:not(.wp-admin):not(#sh-typography-specificity) main [class*="banner"] h1 { font-size: 64px !important; }
  body:not(.wp-admin):not(#sh-typography-specificity) .sh2-section-heading h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh2-direction-copy h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-partners-overview-intro h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-section__head h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-prose h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .shpm-intro h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .shpm-section-head h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .shpm-story__copy > h3,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-design-section-head h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-design-subsection-head h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-infographic-head h3,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-feature-copy > h3,
  body:not(.wp-admin):not(#sh-typography-specificity) main .section-heading h2,
  body:not(.wp-admin):not(#sh-typography-specificity) main .section-title { font-size: 56px !important; }
}
@media (max-width: 767px) {
  body:not(.wp-admin):not(#sh-typography-specificity) .main-slider .carousel-caption h5,
  body:not(.wp-admin):not(#sh-typography-specificity) main [class*="hero"] h1,
  body:not(.wp-admin):not(#sh-typography-specificity) main [class*="banner"] h1 { font-size: 46px !important; }
  body:not(.wp-admin):not(#sh-typography-specificity) .sh2-section-heading h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh2-direction-copy h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-partners-overview-intro h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-section__head h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-about-prose h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .shpm-intro h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .shpm-section-head h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .shpm-story__copy > h3,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-design-section-head h2,
  body:not(.wp-admin):not(#sh-typogr	
aphy-specificity) .sh-design-subsection-head h2,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-infographic-head h3,
  body:not(.wp-admin):not(#sh-typography-specificity) .sh-feature-copy > h3,
  body:not(.wp-admin):not(#sh-typography-specificity) main .section-heading h2,
  body:not(.wp-admin):not(#sh-typography-specificity) main .section-title { font-size: 40px !important; }
}


		

/* All visible page titles, including heroes, use a bold weight. */
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override) :is(h1, h2, h3, h4, h5, h6),
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override) :is(h1, h2, h3, h4, h5, h6) *,
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override) .section-title,
body:not(.wp-admin):not(#sh-sitewide-title-weight-20260905):not(#sh-sitewide-title-weight-override) .section-title * {
  font-weight: 700 !important;
}

/* Card, tile and image-overlay titles retain their intended regular weight. */
body:not(.wp-admin):not(#sh-card-title-weight-20260908):not(#sh-card-title-weight-override) :is([class*="card"], [class*="tile"], [class*="overlay"]) :is(h1, h2, h3, h4, h5, h6),
body:not(.wp-admin):not(#sh-card-title-weight-20260908):not(#sh-card-title-weight-override) :is(.sh2-offering-content, .sh-project-featured-content) :is(h1, h2, h3, h4, h5, h6) {
  font-weight: 400 !important;
}

/* sh-sitewide-semantic-title-coverage: page-level H2 titles across custom templates. */
body:not(.wp-admin):not(#sh-semantic-title-coverage):not(#sh-semantic-title-override) main h2:not([class*="card"] h2):not([class*="tile"] h2):not([class*="overlay"] h2) {
  font-family: "Poiret One", sans-serif !important;
  font-size: 72px !important;
  font-weight: 700 !important;
  line-height: 1.06 !important;
  letter-spacing: normal !important;
  color: var(--sh-type-green) !important;
}
/* Titles on dark colour fields / imagery stay white. The trailing :not() chain mirrors the
   green title rule above so this selector always outranks it on specificity. */
body:not(.wp-admin):not(#sh-semantic-title-coverage):not(#sh-semantic-title-override) main :is([class*="dark"], [class*="cta"], .sh-about-numbers, .sh-about-partners, .sh-partners-overview-strengths, .sh-partners-overview-showcase) h2:not([class*="card"] h2):not([class*="tile"] h2):not([class*="overlay"] h2):not(#sh-dark-title-override) {
  color: #fff !important;
}
@media (max-width: 1199px) {
  body:not(.wp-admin):not(#sh-semantic-title-coverage):not(#sh-semantic-title-override) main h2:not([class*="card"] h2):not([class*="tile"] h2):not([class*="overlay"] h2) { font-size: 56px !important; }
}
@media (max-width: 767px) {
  body:not(.wp-admin):not(#sh-semantic-title-coverage):not(#sh-semantic-title-override) main h2:not([class*="card"] h2):not([class*="tile"] h2):not([class*="overlay"] h2) { font-size: 40px !important; }
}
</style>
<style id="sh-homepage-system-corrections-20260930">
/* sh-homepage-system-corrections-20260930
   Approved first-pass system corrections. CSS-only, appended after all existing head styles.
   Every rule is either scoped to body.home, to a single named component, or (plugin widget) mirrors the plugin's own >=992px rules. */

/* 1. Homepage section H2 family: genuine Poiret One 400 (was faux-bold 700 via the sitewide title-weight rule).
   Three :not(#id) terms out-rank the sitewide :not(#id):not(#id) + !important title rules. Sizes, colour, line-height, spacing untouched. */
body.home:not(#sh-home-h2-face-a):not(#sh-home-h2-face-b):not(#sh-home-h2-face-c) :is(.sh2-section-heading, .sh2-direction-copy) h2,
body.home:not(#sh-home-h2-face-a):not(#sh-home-h2-face-b):not(#sh-home-h2-face-c) :is(.sh2-section-heading, .sh2-direction-copy) h2 * {
  font-weight: 400 !important;
}

/* 2. Utility bar labels (Inspiration / Product Bandwidth): the labels are "font: inherit !important" (sh4-utility-dropdowns),
   so they inherit the wrapper's stack, which was "Montserrat", Arial (Arial fallback). Correct the wrapper to the loaded regular face.
   Size, weight, colour, spacing, position, links and hover are untouched. */
.sh2-site-header .sh2-utility-bar .sh4-utility-menu-wrap {
  font-family: "montserratregular", "Montserrat", Arial, sans-serif;
}

/* 3. Other places where "Montserrat" fell back to system sans: regular UI -> montserratregular, bold/label UI -> montserratbold. Weights and sizes untouched. */
/* 3a. Footer + newsletter */
body .sh3-footer-wrapper { font-family: "montserratregular", "Montserrat", sans-serif; }
body .sh3-footer-wrapper .sh3-newsletter h2,
body .sh3-footer-wrapper .sh3-footer-group h3,
body .sh3-footer-wrapper .sh3-footer-group .sh3-heading-spacer { font-family: "montserratbold", "Montserrat", sans-serif; }
body .sh3-footer-wrapper .sh3-subscribe input,
body .sh3-footer-wrapper .sh3-subscribe button,
body .sh3-footer-wrapper .sh3-search input { font-family: "montserratregular", "Montserrat", sans-serif; }
body .sh3-utility ul a,
body .sh3-utility ul .shc-footer-preferences { font-family: "montserratregular", "Montserrat", sans-serif !important; }
/* 3b. Back-to-top hover label (600 weight label) */
body #sh-back-to-top .sh-btt-label { font-family: "montserratbold", "Montserrat", sans-serif; }
/* 3c. Mobile / tablet menu panel (<=991px) */
body .sh2-mobile-menu__head span,
body .sh2-mobile-partner-groups > details > summary,
body .sh2-mobile-quick-links a,
body .sh2-mobile-search label,
body .sh2-mobile-search button { font-family: "montserratbold", "Montserrat", sans-serif; }
body .sh2-mobile-links > li > a,
body .sh2-mobile-links > li > details > summary { font-family: "montserratbold", "Montserrat", sans-serif !important; }
body .sh2-mobile-submenu a { font-family: "montserratregular", "Montserrat", sans-serif !important; }
body .sh2-mobile-menu__contact a { font-family: "montserratregular", "Montserrat", sans-serif; }

/* 4. Tablet menu toggle (768-992px): use the established homepage mobile treatment (light capsule, Sanctuary green lines)
   instead of the legacy bright-green (#1a6a0c) square from the ".header .navbar-toggler" rule. */
@media (min-width: 768px) and (max-width: 992px) {
  body.home .sh2-navbar-toggler {
    width: 54px !important;
    height: 48px !important;
    display: inline-flex !important;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 999px !important;
    background: rgba(255, 255, 255, 0.78) !important;
  }
  body.home .sh2-navbar-toggler__line {
    width: 24px !important;
    height: 2px !important;
    margin: 3px 0 !important;
    background: #3f5949 !important;
  }
}

/* 5. OneTap accessibility toggle vs WhatsApp (576-991px): the plugin puts both bottom-right. Mirror the plugin's own >=992px
   left-side placement (toggle + panel) so the two controls no longer overlap. Desktop (>=992) and <=576 are already left. */
@media only screen and (min-width: 576px) and (max-width: 991.98px) {
  html body .onetap-container-toggle .onetap-toggle {
    left: 0 !important;
    right: unset !important;
    margin: 0 0 15px 15px !important;
  }
  html body nav.onetap-accessibility.onetap-plugin-onetap {
    left: -580px !important;
    right: unset !important;
  }
  html body nav.onetap-accessibility.onetap-plugin-onetap.onetap-toggle-open {
    left: 0 !important;
    right: unset !important;
  }
}

/* 6. Equivalent secondary section CTAs (About Us, View All FAQs, Read More): adopt the Projects "Learn More" capsule
   (12px / 700 / .16em, 14px 26px, 48px, cream on Sanctuary green, same hover + focus-visible). */
body.home :is(.sh2-company-intro, .sh2-home-faq-news) a.btn.btn-green {
  min-height: 48px !important;
  padding: 14px 26px !important;
  border: 1px solid #3e5949 !important;
  border-radius: 999px !important;
  background-color: #3e5949 !important;
  color: #fffaf1 !important;
  font-family: "montserratbold", "Montserrat", Arial, sans-serif !important;
  font-size: 12px !important;
  font-weight: 700 !important;
  line-height: 1.2 !important;
  letter-spacing: 0.16em !important;
  text-transform: uppercase !important;
  transition: transform 280ms cubic-bezier(.2, .8, .2, 1), box-shadow 280ms cubic-bezier(.2, .8, .2, 1), background-color 280ms cubic-bezier(.2, .8, .2, 1), color 280ms cubic-bezier(.2, .8, .2, 1) !important;
}
body.home :is(.sh2-company-intro, .sh2-home-faq-news) a.btn.btn-green:is(:hover, :focus-visible) {
  background-color: #fffaf1 !important;
  color: #3e5949 !important;
  transform: translateY(-3px) scale(1.015) !important;
  box-shadow: 0 12px 26px rgba(187, 137, 100, .28) !important;
}
body.home :is(.sh2-company-intro, .sh2-home-faq-news) a.btn.btn-green:active {
  transform: translateY(-1px) scale(.99) !important;
  transition-duration: 120ms !important;
}

/* 7. Keyboard focus ring (same copper ring the Projects CTA already uses). Normal + hover appearance unchanged. */
body.home :is(.main-slider .carousel-item .btn, .sh2-company-intro a.btn.btn-green, .sh2-home-faq-news a.btn.btn-green):focus-visible {
  outline: 2px solid #bb8964 !important;
  outline-offset: 4px !important;
}

/* 8. News card titles: Sanctuary heading green instead of #17341d. */
body.home .sh2-home-faq-news .sh2-news-copy h3 { color: #3f5949; }

/* 10. Card / tile typography review (Elevating Every Essential, Projects, Inspiration, Our Range):
   Baskerville titles -> Poiret One 400 (real weight, no faux bold); eyebrows -> Sanctuary eyebrow language
   (montserratbold 700, uppercase, 0.22em tracking; cream #fffaf1 because these sit on photography, 11px so they stay subordinate to the title).
   Sizes/line-height are set for Poiret's smaller x-height. Copy (Diavlo), CTAs, layout, images, radii untouched. */
body.home :is(.sh2-divisions-grid .sh2-division-overlay, .sh2-projects-section .sh2-project-copy, .sh2-inspiration-section .sh2-inspiration-copy) h3 {
  font-family: "Poiret One", sans-serif;
  font-size: 28px;
  font-weight: 400 !important;
  line-height: 1.1;
}
/* Poiret One runs wider than Baskerville: 25px on mobile keeps the same one/two-line wraps as far as possible */
@media (max-width: 767px) {
  body.home :is(.sh2-divisions-grid .sh2-division-overlay, .sh2-projects-section .sh2-project-copy, .sh2-inspiration-section .sh2-inspiration-copy) h3 { font-size: 25px; }
}
body.home :is(.sh2-divisions-grid .sh2-division-overlay, .sh2-projects-section .sh2-project-copy, .sh2-inspiration-section .sh2-inspiration-copy) > span:first-child {
  color: #fffaf1;
  font-family: "montserratbold", "Montserrat", sans-serif;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  text-shadow: 0 0 6px rgba(16, 23, 19, 0.5), 0 1px 2px rgba(16, 23, 19, 0.35);
}
/* Our Range (Design Without Limits) tiles: separate block so it can be dropped on its own */
body.home .sh2-materials-section .sh2-range-overlay h3 {
  font-family: "Poiret One", sans-serif;
  font-weight: 400 !important;
}
body.home .sh2-materials-section .sh2-range-overlay > span:first-child {
  color: #fffaf1 !important;
  font-family: "montserratbold", "Montserrat", sans-serif;
  font-weight: 700;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  text-shadow: 0 0 6px rgba(16, 23, 19, 0.5), 0 1px 2px rgba(16, 23, 19, 0.35);
}
</style>
</head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div class="content-wrapper container">
            <div class="row header">
                <nav class="navbar fixed-top navbar-expand-lg sh2-site-header">
                    <div class="sh2-utility-bar" aria-label="Quick links">
                        <div class="sh4-utility-menu-wrap sh4-utility-menu-wrap--left">
                            <a class="sh4-utility-menu__label" href="<?php echo esc_url( home_url( '/inspiration/' ) ); ?>">Inspiration</a>
                            <details class="sh4-utility-menu sh4-utility-menu--left">
                                <summary aria-label="Open Inspiration menu" aria-controls="sh4-inspiration-menu" aria-expanded="false"><span class="sh4-utility-menu__chevron" aria-hidden="true"></span></summary>
                                <nav class="sh4-utility-menu__panel" id="sh4-inspiration-menu" aria-label="Inspiration">
                                    <a href="<?php echo esc_url( home_url( '/inspiration/trends/' ) ); ?>"><span>Trends</span><span aria-hidden="true">&rarr;</span></a>
                                    <a href="<?php echo esc_url( home_url( '/inspiration/guidance/' ) ); ?>"><span>Guidance</span><span aria-hidden="true">&rarr;</span></a>
                                    <a href="<?php echo esc_url( home_url( '/inspiration/sustainability/' ) ); ?>"><span>Sustainability</span><span aria-hidden="true">&rarr;</span></a>
                                    <a class="sh4-utility-menu__explore" href="<?php echo esc_url( home_url( '/inspiration/' ) ); ?>"><span>Explore Inspiration</span><span aria-hidden="true">&rarr;</span></a>
                                </nav>
                            </details>
                        </div>
                        <div class="sh4-utility-menu-wrap sh4-utility-menu-wrap--right">
                            <a class="sh4-utility-menu__label" href="<?php echo esc_url( home_url( '/product-bandwidth/' ) ); ?>">Product Bandwidth</a>
                            <details class="sh4-utility-menu sh4-utility-menu--right">
                                <summary aria-label="Open Product Bandwidth menu" aria-controls="sh4-bandwidth-menu" aria-expanded="false"><span class="sh4-utility-menu__chevron" aria-hidden="true"></span></summary>
                                <nav class="sh4-utility-menu__panel" id="sh4-bandwidth-menu" aria-label="Product Bandwidth">
                                    <a href="<?php echo esc_url( home_url( '/materia/' ) ); ?>"><span>Materia</span><span aria-hidden="true">&rarr;</span></a>
                                    <a href="<?php echo esc_url( home_url( '/finishes-in-taps/' ) ); ?>"><span>Finishes in Taps</span><span aria-hidden="true">&rarr;</span></a>
                                    <a href="<?php echo esc_url( home_url( '/classic-bathrooms/' ) ); ?>"><span>Classic Bathrooms</span><span aria-hidden="true">&rarr;</span></a>
                                    <a href="<?php echo esc_url( home_url( '/atelier-colours/' ) ); ?>"><span>Atelier: Colours &amp; Patterns</span><span aria-hidden="true">&rarr;</span></a>
                                    <a class="sh4-utility-menu__explore" href="<?php echo esc_url( home_url( '/product-bandwidth/' ) ); ?>"><span>Explore Product Bandwidth</span><span aria-hidden="true">&rarr;</span></a>
                                </nav>
                            </details>
                        </div>
                    </div>
                    <div class="sh2-site-header__inner">
                        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Open navigation" class="navbar-toggler sh2-navbar-toggler" data-sh2-menu-toggle type="button">
                            <span class="sh2-navbar-toggler__line"></span>
                            <span class="sh2-navbar-toggler__line"></span>
                            <span class="sh2-navbar-toggler__line"></span>
                        </button>

                        <a class="navbar-brand sh2-brand-mobile" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/07/Square-animated-logo-500-x-400-px-no-loop.gif" alt="Sanctuary Holdings logo">
                        </a>

                        <div class="sh2-header-desktop">
                            <div class="sh2-header-nav sh2-header-nav-left">
                                <div class="sh2-nav-item sh2-nav-item-has-flyout">
                                    <div class="sh2-partners-trigger-row">
                                        <a href="<?php echo esc_url( home_url( '/partners/' ) ); ?>">Partners</a>
                                        <button class="sh2-partners-toggle" type="button" aria-expanded="false" aria-controls="sh2-partners-mega" aria-label="Open Partners menu"></button>
                                    </div>
                                    <div class="sh2-partners-flyout sh2-partners-mega sh4-partners-mega" id="sh2-partners-mega" data-sh4-partners-mega>
<?php
$sh4_partner_groups = array(
    'Designer Bathware' => array(
        array('name'=>'Bathco','slug'=>'bathco','country'=>'Spain','flag'=>'es','logo'=>'/wp-content/uploads/2026/07/bathvco.png','image'=>'/wp-content/uploads/2026/08/bathco.webp','category'=>'Designer Basins & Bathware','description'=>'Expressive bathroom collections and designer washbasins for residential and hospitality interiors.'),
        array('name'=>'Paffoni','slug'=>'paffoni','country'=>'Italy','flag'=>'it','logo'=>'/wp-content/uploads/2026/07/paffoni-1.png','image'=>'/wp-content/uploads/2026/08/codex-clipboard-f28e5089-2f21-4330-a18b-3cf1ba3e468b.jpg','category'=>'Tapware & Shower Systems','description'=>'Italian tapware and shower systems shaped for considered contemporary bathroom schemes.'),
        array('name'=>'Fima | Carlo Frattini','slug'=>'fima-carlo-frattini','country'=>'Italy','flag'=>'it','logo'=>'/wp-content/uploads/2026/07/fima-1.png','image'=>'/wp-content/uploads/2026/08/Fima-Carlo-Frattini.webp','category'=>'Tapware & Shower Systems','description'=>'Italian bathroom fittings combining precise engineering with a refined design language.'),
        array('name'=>'Victoria + Albert','slug'=>'victoria-albert','country'=>'United Kingdom','flag'=>'gb','logo'=>'/wp-content/uploads/2026/07/victoria-albert.png','image'=>'/wp-content/uploads/2026/08/v-a-scaled.webp','category'=>'Luxury Baths','description'=>'Timeless freestanding baths and basins created for premium residential and hospitality interiors.'),
        array('name'=>'Creavit','slug'=>'creavit','country'=>'Turkey','flag'=>'tr','logo'=>'/wp-content/uploads/2026/07/creavit-1.png','image'=>'/wp-content/uploads/2026/07/creavit-featured.webp','category'=>'Sanitaryware & Furniture','description'=>'Contemporary sanitaryware and bathroom furniture for complete, coordinated spaces.'),
        array('name'=>'Cosmic','slug'=>'cosmic','country'=>'Spain','flag'=>'es','logo'=>'/wp-content/uploads/2026/07/cosmic-1.png','image'=>'/wp-content/uploads/2026/08/COSMIC.jpg','category'=>'Furniture & Accessories','description'=>'Architectural bathroom furniture and accessories with a clean, contemporary character.'),
        array('name'=>'Alice Ceramica','slug'=>'alice','country'=>'Italy','flag'=>'it','logo'=>'/wp-content/uploads/2026/07/alice-1.png','image'=>'/wp-content/uploads/2026/07/alice-ceramica-featured.webp','category'=>'Designer Ceramics','description'=>'Italian ceramic collections balancing expressive form with everyday bathroom function.'),
        array('name'=>'Kreiner','slug'=>'kreiner','country'=>'Germany','flag'=>'de','logo'=>'/wp-content/uploads/2026/07/kreiner-1.png','image'=>'/wp-content/uploads/2026/07/kreiner-featured.webp','category'=>'Shower Enclosures','description'=>'German shower-enclosure solutions designed for precise, elegant bathroom planning.'),
        array('name'=>'Perrin & Rowe','slug'=>'perrin-rowe','country'=>'United Kingdom','flag'=>'gb','logo'=>'/wp-content/uploads/2026/07/perrin-and-rowe-1.png','image'=>'/wp-content/uploads/2026/07/perrin-rowe-featured.webp','category'=>'Luxury Brassware','description'=>'Distinctive British brassware for classic and contemporary bathroom interiors.'),
        array('name'=>'THG Paris','slug'=>'thg-paris','country'=>'France','flag'=>'fr','logo'=>'/wp-content/uploads/2026/07/thg-1.png','image'=>'/wp-content/uploads/2026/08/thg.webp','category'=>'Luxury Brassware','description'=>'French decorative brassware created for highly considered luxury interiors.'),
        array('name'=>'Daniel','slug'=>'daniel','country'=>'Italy','flag'=>'it','logo'=>'/wp-content/uploads/2026/07/daniel-1.png','image'=>'/wp-content/uploads/2026/08/daniel.webp','category'=>'Tapware & Shower Systems','description'=>'Italian tapware and shower collections offering a broad palette of forms and finishes.'),
        array('name'=>'Sanibano','slug'=>'sanibano','country'=>'Spain','flag'=>'es','logo'=>'/wp-content/uploads/2026/07/sanibano-borderless.png?v=20260729b','image'=>'/wp-content/uploads/2026/08/sanibano.webp','category'=>'Bathroom Furniture','description'=>'Spanish bathroom furniture designed to bring storage, material and form together.'),
    ),
    'Commercial Washrooms' => array(
        array('name'=>'ASI','slug'=>'asi','country'=>'United States','flag'=>'us','logo'=>'/wp-content/uploads/2026/07/asi-1.png','image'=>'/wp-content/uploads/2026/07/asi-featured.webp','category'=>'Washroom Accessories','description'=>'Commercial washroom accessories and coordinated solutions for project environments.'),
        array('name'=>'Sloan','slug'=>'sloan','country'=>'United States','flag'=>'us','logo'=>'/wp-content/uploads/2026/07/sloan-1.png','image'=>'/wp-content/uploads/2026/07/sloan-featured.webp','category'=>'Commercial Washroom Systems','description'=>'Water-efficient commercial washroom systems for demanding public and project settings.'),
        array('name'=>'Delabie','slug'=>'delabie','country'=>'France','flag'=>'fr','logo'=>'/wp-content/uploads/2026/07/delabie-1.png','image'=>'/wp-content/uploads/2026/07/delabie-featured.webp','category'=>'Commercial Washroom Systems','description'=>'Specialist commercial washroom solutions developed for intensive-use environments.')
    ),
    'Hot Water' => array(
        array('name'=>'Rheem','slug'=>'rheem','country'=>'United States','flag'=>'us','logo'=>'/wp-content/uploads/2026/07/Rheem-1.png','image'=>'/wp-content/uploads/2026/07/rheem-featured.webp','category'=>'Water Heating','description'=>'Water-heating solutions for residential, commercial and project applications.'),
        array('name'=>'Nulite','slug'=>'nulite','country'=>'China','flag'=>'cn','logo'=>'/wp-content/uploads/2026/07/nulite-transparent.png','image'=>'/wp-content/uploads/2026/07/nulite-featured.webp','category'=>'Heat Pump Systems','description'=>'Heat-pump water-heating systems developed around efficiency and project requirements.'),
        array('name'=>'Gemake','slug'=>'gemake','country'=>'China','flag'=>'cn','logo'=>'/wp-content/uploads/2026/07/gemake-transparent.png','image'=>'/wp-content/uploads/2026/08/gemake.webp','category'=>'Water Heating','description'=>'Domestic and project water-heating options across a range of installation requirements.')
    ),
    'Water Management' => array(
        array('name'=>'DP Pumps','slug'=>'dp-pumps','country'=>'Netherlands','flag'=>'nl','logo'=>'/wp-content/uploads/2026/07/dp_pumps.png','image'=>'/wp-content/uploads/2026/07/dp-pumps-featured.webp','category'=>'Water Management','description'=>'Pumping systems for building services, water supply and project infrastructure.'),
        array('name'=>'Valvex','slug'=>'valvex','country'=>'Poland','flag'=>'pl','logo'=>'/wp-content/uploads/2026/07/valvex-1.png','image'=>'/wp-content/uploads/2026/08/valvex.webp','category'=>'Valves & Water Control','description'=>'Valve and water-control solutions supporting reliable building installations.'),
        array('name'=>'Matra','slug'=>'matra','country'=>'Italy','flag'=>'it','logo'=>'/wp-content/uploads/2026/07/MATRA-1.png','image'=>'/wp-content/uploads/2026/07/matra-featured.webp','category'=>'Pumping Systems','description'=>'Italian pumping solutions for domestic, commercial and technical applications.'),
        array('name'=>'Zirantec','slug'=>'zirantec','country'=>'Italy','flag'=>'it','logo'=>'/wp-content/uploads/2026/07/zirantec-logo-2025-transparent.png','image'=>'/wp-content/uploads/2026/07/zirantec-featured.webp','category'=>'Pumping Systems','description'=>'Pumping systems for drainage, wastewater and wider water-management requirements.'),
        array('name'=>'Tsurumi','slug'=>'tsurumi','country'=>'Japan','flag'=>'jp','logo'=>'/wp-content/uploads/2026/07/tsurumi-pump-transparent.png','image'=>'/wp-content/uploads/2026/07/tsurumi-featured.webp','category'=>'Submersible Pumps','description'=>'Japanese submersible-pump solutions for construction, drainage and water management.'),
        array('name'=>'Elbi of America','slug'=>'elbi','country'=>'United States','flag'=>'us','logo'=>'/wp-content/uploads/2026/07/elbi-transparent.png','image'=>'/wp-content/uploads/2026/07/elbi-of-america-featured.webp','category'=>'Water Storage & Pressure','description'=>'Water-storage and pressure solutions for residential and commercial systems.'),
        array('name'=>'B METERS','slug'=>'b-meters','country'=>'Italy','flag'=>'it','logo'=>'/wp-content/uploads/2026/07/B_METERS.png','image'=>'/wp-content/uploads/2026/08/B-METERS.webp','category'=>'Water Metering','description'=>'Water-metering solutions for accurate monitoring across building applications.'),
        array('name'=>'ZENIT','slug'=>'zenit','country'=>'Italy','flag'=>'it','logo'=>'/wp-content/uploads/2026/07/ZENIT-1.png','image'=>'/wp-content/uploads/2026/08/zenit.webp','category'=>'Wastewater Pumps','description'=>'Wastewater and drainage pumping systems for civil and industrial applications.'),
        array('name'=>'Standart Pumps','slug'=>'standart','country'=>'Turkey','flag'=>'tr','logo'=>'/wp-content/uploads/2026/07/standart-transparent.png','image'=>'/wp-content/uploads/2026/07/standart-pumps-featured.webp','category'=>'Pumping Systems','description'=>'Pumping systems supporting water supply and technical building applications.')
    ),
    'Fire & Safety' => array(
        array('name'=>'Kent','slug'=>'smoke-and-fire-curtains','country'=>'United Arab Emirates','flag'=>'ae','logo'=>'/wp-content/uploads/2026/07/Kent-1.png','image'=>'/wp-content/uploads/2026/08/kent.webp','category'=>'Smoke & Fire Curtains','description'=>'Automatic smoke and fire curtain systems for integrated building-safety strategies.'),
        array('name'=>'BLE','slug'=>'ble','country'=>'United Kingdom','flag'=>'gb','logo'=>'/wp-content/uploads/2026/07/BLE-3.png','image'=>'/wp-content/uploads/2026/08/ble.webp','category'=>'Smoke & Fire Curtains','description'=>'Smoke and fire curtain systems developed for passive fire-protection applications.')
    )
);
$sh4_left_groups = array('Designer Bathware','Commercial Washrooms');
$sh4_middle_groups = array('Hot Water','Fire & Safety','Water Management');
$sh4_mobile_groups = array_merge($sh4_left_groups, $sh4_middle_groups);
$sh4_default = $sh4_partner_groups['Designer Bathware'][3];
?>
    <div class="sh4-mega__shell" aria-label="Sanctuary partner brands">
        <div class="sh4-mega__directory">
        <div class="sh4-mega__column sh4-mega__column--left">
            <?php foreach ($sh4_left_groups as $sh4_group_name) : ?>
                <section class="sh4-brand-group" aria-labelledby="sh4-<?php echo esc_attr(sanitize_title($sh4_group_name)); ?>">
                    <div class="sh4-brand-group__heading">
                        <span id="sh4-<?php echo esc_attr(sanitize_title($sh4_group_name)); ?>"><?php echo esc_html($sh4_group_name); ?></span>
                        <i aria-hidden="true"></i>
                    </div>
                    <div class="sh4-brand-grid">
                        <?php foreach ($sh4_partner_groups[$sh4_group_name] as $sh4_brand) : ?>
                            <a class="sh4-brand-row" href="<?php echo esc_url(home_url('/partners/' . $sh4_brand['slug'] . '/')); ?>"
                               aria-label="<?php echo esc_attr($sh4_brand['name'] . ' — ' . $sh4_brand['country']); ?>"
                               data-sh4-name="<?php echo esc_attr($sh4_brand['name']); ?>"
                               data-sh4-image="<?php echo esc_url(home_url($sh4_brand['image'])); ?>"
                               data-sh4-logo="<?php echo esc_url(home_url($sh4_brand['logo'])); ?>"
                               data-sh4-country="<?php echo esc_attr($sh4_brand['country']); ?>"
                               data-sh4-flag="<?php echo esc_url('https://flagcdn.com/w40/' . $sh4_brand['flag'] . '.png'); ?>"
                               data-sh4-category="<?php echo esc_attr($sh4_brand['category']); ?>"
                               data-sh4-description="<?php echo esc_attr($sh4_brand['description']); ?>">
                                <span class="sh4-brand-row__logo"><img src="<?php echo esc_url(home_url($sh4_brand['logo'])); ?>" alt="<?php echo esc_attr($sh4_brand['name'] . ' logo'); ?>" loading="lazy" decoding="async"></span>
                                <span class="sh4-brand-row__copy">
                                    <strong><?php echo esc_html($sh4_brand['name']); ?></strong>
                                    <span class="sh4-brand-row__origin"><?php echo esc_html($sh4_brand['country']); ?></span>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>

        <div class="sh4-mega__column sh4-mega__column--middle">
            <?php foreach ($sh4_middle_groups as $sh4_group_name) : ?>
                <section class="sh4-brand-group" aria-labelledby="sh4-<?php echo esc_attr(sanitize_title($sh4_group_name)); ?>">
                    <div class="sh4-brand-group__heading">
                        <span id="sh4-<?php echo esc_attr(sanitize_title($sh4_group_name)); ?>"><?php echo esc_html($sh4_group_name); ?></span>
                        <i aria-hidden="true"></i>
                    </div>
                    <div class="sh4-brand-grid">
                        <?php foreach ($sh4_partner_groups[$sh4_group_name] as $sh4_brand) : ?>
                            <a class="sh4-brand-row" href="<?php echo esc_url(home_url('/partners/' . $sh4_brand['slug'] . '/')); ?>"
                               aria-label="<?php echo esc_attr($sh4_brand['name'] . ' — ' . $sh4_brand['country']); ?>"
                               data-sh4-name="<?php echo esc_attr($sh4_brand['name']); ?>"
                               data-sh4-image="<?php echo esc_url(home_url($sh4_brand['image'])); ?>"
                               data-sh4-logo="<?php echo esc_url(home_url($sh4_brand['logo'])); ?>"
                               data-sh4-country="<?php echo esc_attr($sh4_brand['country']); ?>"
                               data-sh4-flag="<?php echo esc_url('https://flagcdn.com/w40/' . $sh4_brand['flag'] . '.png'); ?>"
                               data-sh4-category="<?php echo esc_attr($sh4_brand['category']); ?>"
                               data-sh4-description="<?php echo esc_attr($sh4_brand['description']); ?>">
                                <span class="sh4-brand-row__logo"><img src="<?php echo esc_url(home_url($sh4_brand['logo'])); ?>" alt="<?php echo esc_attr($sh4_brand['name'] . ' logo'); ?>" loading="lazy" decoding="async"></span>
                                <span class="sh4-brand-row__copy">
                                    <strong><?php echo esc_html($sh4_brand['name']); ?></strong>
                                    <span class="sh4-brand-row__origin"><?php echo esc_html($sh4_brand['country']); ?></span>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>

        </div>

        <aside class="sh4-feature" aria-live="polite">
            <div class="sh4-feature__image">
                <img data-sh4-feature-image data-sh4-default-image="<?php echo esc_url(home_url($sh4_default['image'])); ?>" alt="<?php echo esc_attr($sh4_default['name'] . ' product and application image'); ?>" loading="eager" fetchpriority="high" decoding="async">
            </div>
            <div class="sh4-feature__body">
                <span class="sh4-feature__eyebrow">Featured Brand</span>
                <div class="sh4-feature__identity">
                    <span class="sh4-feature__logo"><img data-sh4-feature-logo src="<?php echo esc_url(home_url($sh4_default['logo'])); ?>" alt="<?php echo esc_attr($sh4_default['name'] . ' logo'); ?>"></span>
                    <span class="sh4-feature__origin"><img data-sh4-feature-flag src="<?php echo esc_url('https://flagcdn.com/w40/' . $sh4_default['flag'] . '.png'); ?>" alt="<?php echo esc_attr($sh4_default['country'] . ' flag'); ?>"><span data-sh4-feature-country class="screen-reader-text"><?php echo esc_html($sh4_default['country']); ?></span></span>
                    <span data-sh4-feature-name class="screen-reader-text"><?php echo esc_html($sh4_default['name']); ?></span>
                </div>
                <span class="sh4-feature__category" data-sh4-feature-category><?php echo esc_html($sh4_default['category']); ?></span>
                <p data-sh4-feature-description><?php echo esc_html($sh4_default['description']); ?></p>
                <a class="sh4-feature__cta" data-sh4-feature-link href="<?php echo esc_url(home_url('/partners/' . $sh4_default['slug'] . '/')); ?>">Explore Collection <span aria-hidden="true">&rarr;</span></a>
            </div>
        </aside>
    </div>
</div>
</div>
                                <div class="sh2-nav-item">
                                    <a href="<?php echo esc_url( home_url( '/project/' ) ); ?>">Projects</a>
                                </div>
                                <div class="sh2-nav-item">
                                    <a href="<?php echo esc_url( home_url( '/newspage/' ) ); ?>">News</a>
                                </div>
                            </div>

                            <a class="sh2-header-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/07/Square-animated-logo-500-x-400-px-no-loop.gif" alt="Sanctuary Holdings logo">
                            </a>

                            <div class="sh2-header-nav sh2-header-nav-right">
                                <div class="sh2-nav-item">
                                    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a>
                                </div>
                                <div class="sh2-nav-item">
                                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
                                </div>
                                <details class="sh2-search-toggle">
                                    <summary>Search</summary>
                                    <div class="sh2-search-panel">
                                        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" autocomplete="on" method="get">
                                            <input name="s" type="text" placeholder="Search Sanctuary">
                                            <button type="submit">Go</button>
                                        </form>
                                    </div>
                                </details>
                            </div>
                        </div>

                        <div class="sh2-mobile-menu" id="navbarSupportedContent" aria-hidden="true">
                            <div class="sh2-mobile-menu__panel">
                                <div class="sh2-mobile-menu__head">
                                    <div>
                                        <span>Sanctuary Holdings</span>
                                        <strong>Explore</strong>
                                    </div>
                                    <button type="button" class="sh2-mobile-menu__close" data-sh2-menu-close aria-label="Close navigation"></button>
                                </div>

                                <nav class="sh2-mobile-menu__nav" aria-label="Mobile navigation">
                                    <ul class="sh2-mobile-links">
                                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                                        <li class="sh2-mobile-partners">
                                            <details>
                                                <summary>Partners</summary>
                                                <div class="sh2-mobile-partner-groups sh4-mobile-partner-groups">
    <?php foreach ($sh4_mobile_groups as $sh4_group_name) : $sh4_group_brands = $sh4_partner_groups[$sh4_group_name]; ?>
        <details>
            <summary><?php echo esc_html($sh4_group_name); ?></summary>
            <div class="sh4-mobile-brand-list">
                <?php foreach ($sh4_group_brands as $sh4_brand) : ?>
                    <a class="sh4-mobile-brand" href="<?php echo esc_url(home_url('/partners/' . $sh4_brand['slug'] . '/')); ?>" aria-label="<?php echo esc_attr($sh4_brand['name'] . ' — ' . $sh4_brand['country']); ?>">
                        <span class="sh4-mobile-brand__logo"><img src="<?php echo esc_url(home_url($sh4_brand['logo'])); ?>" alt="<?php echo esc_attr($sh4_brand['name'] . ' logo'); ?>" loading="lazy" decoding="async"></span>
                        <span class="sh4-mobile-brand__copy"><strong><?php echo esc_html($sh4_brand['name']); ?></strong><span class="sh4-mobile-brand__country"><?php echo esc_html($sh4_brand['country']); ?></span></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </details>
    <?php endforeach; ?>
</div>
                                            </details>
                                        </li>
                                        <li><a href="<?php echo esc_url( home_url( '/project/' ) ); ?>">Projects</a></li>
                                        <li><a href="<?php echo esc_url( home_url( '/newspage/' ) ); ?>">News</a></li>
                                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a></li>
                                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a></li>
                                    </ul>
                                </nav>

                                <div class="sh2-mobile-quick-links">
                                    <a href="<?php echo esc_url( home_url( '/inspiration/' ) ); ?>">Inspiration</a>
                                    <a href="<?php echo esc_url( home_url( '/product-bandwidth/' ) ); ?>">Product Bandwidth</a>
                                </div>

                                <form class="sh2-mobile-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                                    <label for="sh2-mobile-search-input">Search the website</label>
                                    <div>
                                        <input id="sh2-mobile-search-input" name="s" type="search" placeholder="What are you looking for?">
                                        <button type="submit">Search</button>
                                    </div>
                                </form>

                                <div class="sh2-mobile-menu__contact">
                                    <a href="tel:+94114331191">+94 11 433 1191</a>
                                    <a href="mailto:contact@sanctuaryholdings.lk">contact@sanctuaryholdings.lk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <style id="sh2-mobile-menu-refresh">
                    @media (min-width: 992px) {
                        .sh2-mobile-menu { display: none !important; }
                    }

                    @media (max-width: 991px) {
                        body.sh2-menu-open { overflow: hidden !important; }

                        .sh2-navbar-toggler {
                            position: relative;
                            z-index: 1302;
                            transition: opacity .2s ease;
                        }
                        .sh2-navbar-toggler.is-active {
                            opacity: 0;
                            pointer-events: none;
                        }
                        .sh2-navbar-toggler.is-active .sh2-navbar-toggler__line:nth-child(1) {
                            transform: translateY(7px) rotate(45deg);
                        }
                        .sh2-navbar-toggler.is-active .sh2-navbar-toggler__line:nth-child(2) { opacity: 0; }
                        .sh2-navbar-toggler.is-active .sh2-navbar-toggler__line:nth-child(3) {
                            transform: translateY(-7px) rotate(-45deg);
                        }
                        .sh2-navbar-toggler__line { transition: transform .25s ease, opacity .2s ease; }

                        body .sh2-mobile-menu {
                            position: fixed !important;
                            inset: 0 !important;
                            z-index: 1300 !important;
                            display: block !important;
                            width: 100% !important;
                            height: 100dvh !important;
                            margin: 0 !important;
                            padding: 0 !important;
                            overflow: hidden !important;
                            background: rgba(16, 23, 19, .32) !important;
                            opacity: 0;
                            visibility: hidden;
                            transform: none !important;
                            transition: opacity .25s ease, visibility .25s ease;
                        }
                        body .sh2-mobile-menu.is-open {
                            opacity: 1;
                            visibility: visible;
                        }

                        .sh2-mobile-menu__panel {
                            width: min(100%, 480px) !important;
                            height: 100dvh !important;
                            margin: 0 !important;
                            padding: 28px 22px 48px !important;
                            overflow-x: hidden !important;
                            overflow-y: auto !important;
                            overscroll-behavior: contain;
                            background: #f7f2ea !important;
                            box-shadow: 24px 0 60px rgba(16, 23, 19, .2);
                            transform: translateX(-102%);
                            transition: transform .34s cubic-bezier(.22, 1, .36, 1);
                        }
                        .sh2-mobile-menu.is-open .sh2-mobile-menu__panel { transform: translateX(0); }

                        .sh2-mobile-menu__head {
                            display: flex;
                            align-items: flex-start;
                            justify-content: space-between;
                            gap: 24px;
                            margin-bottom: 28px;
                            padding-bottom: 22px;
                            border-bottom: 1px solid rgba(63, 89, 73, .2);
                        }
                        .sh2-mobile-menu__head span {
                            display: block;
                            margin-bottom: 5px;
                            color: #738078;
                            font-family: "Montserrat", sans-serif;
                            font-size: 10px;
                            font-weight: 600;
                            letter-spacing: .16em;
                            text-transform: uppercase;
                        }
                        .sh2-mobile-menu__head strong {
                            display: block;
                            color: #3f5949;
                            font-family: "Cormorant Garamond", Georgia, serif;
                            font-size: 34px;
                            font-weight: 400;
                            line-height: 1;
                        }
                        .sh2-mobile-menu__close {
                            position: relative;
                            flex: 0 0 44px;
                            width: 44px;
                            height: 44px;
                            border: 1px solid rgba(63, 89, 73, .25);
                            border-radius: 50%;
                            background: transparent;
                        }
                        .sh2-mobile-menu__close::before,
                        .sh2-mobile-menu__close::after {
                            content: "";
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            width: 18px;
                            height: 1px;
                            background: #3f5949;
                        }
                        .sh2-mobile-menu__close::before { transform: translate(-50%, -50%) rotate(45deg); }
                        .sh2-mobile-menu__close::after { transform: translate(-50%, -50%) rotate(-45deg); }

                        .sh2-mobile-menu__nav,
                        .sh2-mobile-links,
                        .sh2-mobile-links li {
                            width: 100%;
                            margin: 0 !important;
                            padding: 0 !important;
                            list-style: none !important;
                        }
                        .sh2-mobile-links > li { border-bottom: 1px solid rgba(63, 89, 73, .16); }
                        .sh2-mobile-links > li > a,
                        .sh2-mobile-links > li > details > summary {
                            display: flex !important;
                            align-items: center;
                            justify-content: space-between;
                            min-height: 58px;
                            padding: 0 2px !important;
                            color: #3f5949 !important;
                            font-family: "Montserrat", sans-serif !important;
                            font-size: 14px !important;
                            font-weight: 600 !important;
                            letter-spacing: .07em !important;
                            line-height: 1.2 !important;
                            text-decoration: none !important;
                            text-transform: uppercase;
                        }
                        .sh2-mobile-links summary {
                            cursor: pointer;
                            list-style: none;
                        }
                        .sh2-mobile-links summary::-webkit-details-marker { display: none; }
                        .sh2-mobile-links > li > details > summary::after {
                            content: "+";
                            font-size: 22px;
                            font-weight: 300;
                        }
                        .sh2-mobile-links > li > details[open] > summary::after { content: "−"; }

                        .sh2-mobile-partner-groups {
                            padding: 2px 0 18px;
                        }
                        .sh2-mobile-partner-groups > details {
                            margin: 8px 0;
                            border: 1px solid rgba(63, 89, 73, .17);
                            background: rgba(255, 255, 255, .52);
                        }
                        .sh2-mobile-partner-groups > details > summary {
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            min-height: 50px;
                            padding: 0 14px;
                            color: #3f5949;
                            font-family: "Montserrat", sans-serif;
                            font-size: 12px;
                            font-weight: 600;
                            letter-spacing: .05em;
                            text-transform: uppercase;
                        }
                        .sh2-mobile-partner-groups > details > summary::after {
                            content: "+";
                            font-size: 18px;
                            font-weight: 300;
                        }
                        .sh2-mobile-partner-groups > details[open] > summary::after { content: "−"; }

                        .sh2-mobile-submenu {
                            display: grid !important;
                            grid-template-columns: repeat(2, minmax(0, 1fr));
                            gap: 0 12px;
                            padding: 2px 14px 14px !important;
                        }
                        .sh2-mobile-submenu a {
                            display: flex !important;
                            align-items: center;
                            min-height: 42px;
                            padding: 8px 0 !important;
                            border-bottom: 1px solid rgba(63, 89, 73, .1);
                            color: #596b5f !important;
                            font-family: "Montserrat", sans-serif !important;
                            font-size: 12px !important;
                            line-height: 1.3 !important;
                            text-decoration: none !important;
                        }
                        .sh2-mobile-submenu a:first-child {
                            grid-column: 1 / -1;
                            color: #3f5949 !important;
                            font-weight: 700;
                        }

                        .sh2-mobile-quick-links {
                            display: grid;
                            grid-template-columns: 1fr 1fr;
                            gap: 10px;
                            margin: 28px 0;
                        }
                        .sh2-mobile-quick-links a {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            min-height: 48px;
                            padding: 10px;
                            border: 1px solid rgba(63, 89, 73, .22);
                            color: #3f5949 !important;
                            font-family: "Montserrat", sans-serif;
                            font-size: 11px;
                            font-weight: 600;
                            line-height: 1.3;
                            text-align: center;
                            text-decoration: none !important;
                            text-transform: uppercase;
                        }

                        .sh2-mobile-search {
                            margin: 0 0 28px !important;
                            padding: 22px 0 !important;
                            border-top: 1px solid rgba(63, 89, 73, .18);
                            border-bottom: 1px solid rgba(63, 89, 73, .18);
                        }
                        .sh2-mobile-search label {
                            display: block;
                            margin-bottom: 10px;
                            color: #3f5949;
                            font-family: "Montserrat", sans-serif;
                            font-size: 10px;
                            font-weight: 700;
                            letter-spacing: .14em;
                            text-transform: uppercase;
                        }
                        .sh2-mobile-search > div { display: flex; }
                        .sh2-mobile-search input {
                            flex: 1 1 auto;
                            min-width: 0;
                            height: 48px;
                            padding: 0 14px;
                            border: 1px solid rgba(63, 89, 73, .25) !important;
                            border-right: 0 !important;
                            border-radius: 0 !important;
                            background: #fff !important;
                            color: #24352b !important;
                            font-size: 13px !important;
                        }
                        .sh2-mobile-search button {
                            flex: 0 0 auto;
                            min-width: 82px;
                            height: 48px;
                            border: 1px solid #3f5949 !important;
                            border-radius: 0 !important;
                            background: #3f5949 !important;
                            color: #fff !important;
                            font-family: "Montserrat", sans-serif;
                            font-size: 10px;
                            font-weight: 700;
                            letter-spacing: .08em;
                            text-transform: uppercase;
                        }

                        .sh2-mobile-menu__contact {
                            display: flex;
                            flex-direction: column;
                            gap: 8px;
                            padding-bottom: 24px;
                        }
                        .sh2-mobile-menu__contact a {
                            color: #647269 !important;
                            font-family: "Montserrat", sans-serif;
                            font-size: 12px !important;
                            text-decoration: none !important;
                        }
                    }
                </style>
                <script id="sh2-mobile-menu-controller">
                (function () {
                    function initMobileMenu() {
                        var toggle = document.querySelector('[data-sh2-menu-toggle]');
                        var menu = document.getElementById('navbarSupportedContent');
                        var close = document.querySelector('[data-sh2-menu-close]');
                        if (!toggle || !menu || !close || menu.dataset.controllerReady) return;
                        menu.dataset.controllerReady = 'true';

                        function setOpen(open) {
                            menu.classList.toggle('is-open', open);
                            toggle.classList.toggle('is-active', open);
                            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
                            toggle.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
                            menu.setAttribute('aria-hidden', open ? 'false' : 'true');
                            document.body.classList.toggle('sh2-menu-open', open);
                            if (open) close.focus();
                        }

                        toggle.addEventListener('click', function (event) {
                            event.preventDefault();
                            event.stopPropagation();
                            setOpen(!menu.classList.contains('is-open'));
                        });
                        close.addEventListener('click', function () {
                            setOpen(false);
                            toggle.focus();
                        });
                        menu.querySelectorAll('a').forEach(function (link) {
                            link.addEventListener('click', function () { setOpen(false); });
                        });
                        menu.querySelectorAll('.sh2-mobile-partner-groups > details').forEach(function (group) {
                            group.addEventListener('toggle', function () {
                                if (!group.open) return;
                                menu.querySelectorAll('.sh2-mobile-partner-groups > details').forEach(function (other) {
                                    if (other !== group) other.open = false;
                                });
                            });
                        });
                        document.addEventListener('keydown', function (event) {
                            if (event.key === 'Escape' && menu.classList.contains('is-open')) {
                                setOpen(false);
                                toggle.focus();
                            }
                        });
                        window.addEventListener('resize', function () {
                            if (window.innerWidth >= 992) setOpen(false);
                        });
                    }

                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initMobileMenu);
                    } else {
                        initMobileMenu();
                    }
                }());
                </script>
            </div>

<!-- sh2_inspiration_article_breadcrumbs -->
<?php
$sh2_inspiration_breadcrumb_map = array(
    'texture-in-tapware' => array( 'Trends', '/inspiration/trends/' ),
    'bathroom-trends-2025' => array( 'Trends', '/inspiration/trends/' ),
    'bedroom-with-integrated-bathroom-ideas' => array( 'Trends', '/inspiration/trends/' ),
    'small-narrow-bathroom-ideas' => array( 'Guidance', '/inspiration/guidance/' ),
    'bathroom-transformations-without-major-renovation' => array( 'Guidance', '/inspiration/guidance/' ),
    'choosing-the-right-washbasin' => array( 'Guidance', '/inspiration/guidance/' ),
    'cleaning-maintenance' => array( 'Guidance', '/inspiration/guidance/' ),
    'green-bathrooms' => array( 'Sustainability', '/inspiration/sustainability/' ),
);
$sh2_inspiration_breadcrumb_slug = is_page() ? (string) get_post_field( 'post_name', get_queried_object_id() ) : '';
if ( isset( $sh2_inspiration_breadcrumb_map[ $sh2_inspiration_breadcrumb_slug ] ) ) :
    $sh2_inspiration_breadcrumb_category = $sh2_inspiration_breadcrumb_map[ $sh2_inspiration_breadcrumb_slug ];
?>
<style id="sh2-inspiration-breadcrumb-styles">
.sh2-inspiration-breadcrumb{
    position:relative;
    z-index:2;
    width:100%;
    margin:0;
    padding:188px clamp(20px,4vw,64px) 15px;
    border-bottom:1px solid rgba(63,89,73,.16);
    background:#fff;
    box-sizing:border-box;
}
.sh2-inspiration-breadcrumb ol{
    display:flex;
    flex-wrap:wrap;
    align-items:center;
    gap:7px;
    max-width:1400px;
    margin:0 auto;
    padding:0;
    list-style:none;
}
.sh2-inspiration-breadcrumb li{
    display:flex;
    align-items:center;
    gap:7px;
    color:#68746c;
    font-family:"Montserrat",sans-serif;
    font-size:11.5px;
    font-weight:500;
    line-height:1.4;
}
.sh2-inspiration-breadcrumb li+li::before{
    content:"/";
    color:#b3aaa0;
}
.sh2-inspiration-breadcrumb a{
    color:#50645a;
    text-decoration:none;
}
.sh2-inspiration-breadcrumb a:hover,
.sh2-inspiration-breadcrumb a:focus-visible{
    color:#3f5949;
    text-decoration:underline;
    text-underline-offset:3px;
}
.sh2-inspiration-breadcrumb [aria-current="page"]{
    color:#26372e;
    font-weight:600;
}
@media(max-width:991px){
    .sh2-inspiration-breadcrumb{
        padding:169px 20px 14px;
    }
    .sh2-inspiration-breadcrumb li{
        font-size:11px;
    }
}
</style>
<nav class="sh2-inspiration-breadcrumb" aria-label="Breadcrumb">
    <ol>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li><a href="<?php echo esc_url( home_url( '/inspiration/' ) ); ?>">Inspiration</a></li>
        <li><a href="<?php echo esc_url( home_url( $sh2_inspiration_breadcrumb_category[1] ) ); ?>"><?php echo esc_html( $sh2_inspiration_breadcrumb_category[0] ); ?></a></li>
        <li aria-current="page"><?php echo esc_html( get_the_title() ); ?></li>
    </ol>
</nav>
<?php endif; ?>
