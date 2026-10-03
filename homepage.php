<?php

/*
 Template Name: Homepage
*/

get_header();

$news_items = array();
$latest_news_query = new WP_Query( array(
    'post_type'           => 'news',
    'post_status'         => 'publish',
    'post__in'            => array( 4210, 3268 ),
    'posts_per_page'      => 2,
    'orderby'             => 'post__in',
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
) );

while ( $latest_news_query->have_posts() ) :
    $latest_news_query->the_post();

    $news_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
    if ( empty( $news_image ) ) {
        $news_image = 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/Place-holder-1.jpg';
    }

    $news_excerpt = trim( wp_strip_all_tags( get_the_excerpt() ) );
    if ( empty( $news_excerpt ) ) {
        $news_excerpt = wp_trim_words( wp_strip_all_tags( get_the_content() ), 28, '&hellip;' );
    } else {
        $news_excerpt = wp_trim_words( $news_excerpt, 28, '&hellip;' );
    }

    $news_items[] = array(
        'title'   => get_the_title(),
        'date'    => get_the_date( 'Y/m/d' ),
        'image'   => $news_image,
        'excerpt' => $news_excerpt,
        'url'     => get_permalink(),
    );
endwhile;
wp_reset_postdata();

?>
<h1 class="sr-only">Sanctuary Holdings premium bathware, plumbing, hot water, pump, and fire protection solutions in Sri Lanka</h1>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<style id="sh2-slider-video-lower-override">
.home .main-slider .carousel-inner,
.home .main-slider .carousel-item,
.home .main-slider .carousel-item img,
.home .main-slider .carousel-item video.sh2-slider-video.d-block.w-100 {
  height: 760px !important;
}
.home .main-slider .carousel-item img,
.home .main-slider .carousel-item video.sh2-slider-video.d-block.w-100 {
  width: 100% !important;
  object-fit: cover !important;
  object-position: center 78% !important;
  transform: none !important;
}
@media (max-width: 991px) {
  .home .main-slider .carousel-inner,
  .home .main-slider .carousel-item,
  .home .main-slider .carousel-item img,
  .home .main-slider .carousel-item video.sh2-slider-video.d-block.w-100 {
    height: clamp(540px, 100vw, 760px) !important;
  }
  .home .main-slider .carousel-item img,
  .home .main-slider .carousel-item video.sh2-slider-video.d-block.w-100 {
    object-position: center 74% !important;
    transform: none !important;
  }
}
</style>


            <style id="sh2-mobile-hero-type-scale">
@media (max-width: 767px) {
    .home .main-slider .carousel-item .overlay {
        pointer-events: none !important;
    }
    .home .main-slider .carousel-item .carousel-caption {
        z-index: 6 !important;
        pointer-events: auto !important;
    }
    .home .main-slider .carousel-caption {
        width: calc(100% - 40px) !important;
        max-width: 335px !important;
        left: 50% !important;
        right: auto !important;
        transform: translateX(-50%) !important;
    }
    .home #carouselExampleIndicators .carousel-item .carousel-caption h5 {
        max-width: 310px !important;
        margin-left: auto !important;
        margin-right: auto !important;
        font-size: clamp(30px, 8.7vw, 34px) !important;
        line-height: 1.04 !important;
        letter-spacing: -0.015em !important;
    }
    .home .main-slider .carousel-caption .btn {
        width: auto !important;
        max-width: calc(100vw - 56px) !important;
        min-height: 40px !important;
        padding: 11px 18px !important;
        font-size: 9px !important;
        line-height: 1.35 !important;
        letter-spacing: 0.13em !important;
        white-space: nowrap !important;
    }
}
</style>


<style id="sh2-hero-title-contrast">
.home .main-slider .carousel-caption {
  isolation: isolate;
}
.home .main-slider .carousel-caption::before {
  content: "";
  position: absolute;
  z-index: -1;
  top: -48px;
  right: -100px;
  bottom: -42px;
  left: -100px;
  pointer-events: none;
  background: radial-gradient(ellipse at center, rgba(14, 27, 20, .42) 0%, rgba(14, 27, 20, .25) 38%, rgba(14, 27, 20, .08) 62%, rgba(14, 27, 20, 0) 78%);
}
.home #carouselExampleIndicators .carousel-item .carousel-caption h5 {
  color: #fff !important;
  font-weight: 500 !important;
  text-shadow: 0 2px 4px rgba(8, 15, 11, .72), 0 7px 24px rgba(8, 15, 11, .54);
}
@media (max-width: 767px) {
  .home .main-slider .carousel-caption::before {
    top: -38px;
    right: -44px;
    bottom: -34px;
    left: -44px;
    background: radial-gradient(ellipse at center, rgba(12, 24, 17, .55) 0%, rgba(12, 24, 17, .34) 42%, rgba(12, 24, 17, .11) 66%, rgba(12, 24, 17, 0) 82%);
  }
  .home #carouselExampleIndicators .carousel-item .carousel-caption h5 {
    text-shadow: 0 2px 4px rgba(5, 12, 8, .82), 0 6px 18px rgba(5, 12, 8, .68);
  }
}
</style>


<style id="sh2-home-minor-refinements">
.home #design-without-limits .sh2-range-card {
  border-radius: 24px !important;
  overflow: hidden !important;
}
.home .sh2-offering-media-link {
  display: block;
  overflow: hidden;
}
.home .sh2-offering-media-link img {
  transition: transform .35s ease;
}
.home .sh2-offering-media-link:hover img,
.home .sh2-offering-media-link:focus-visible img {
  transform: scale(1.025);
}
.home .sh2-offering-media-link:focus-visible {
  outline: 2px solid #bb8964;
  outline-offset: 4px;
}
.home .sh2-home-shell a.btn.btn-green {
  background: #3e5949 !important;
  border-color: #3e5949 !important;
  color: #fffaf1 !important;
}
.home .sh2-home-shell a.btn.btn-green:hover,
.home .sh2-home-shell a.btn.btn-green:focus-visible {
  background: #fffaf1 !important;
  border-color: #3e5949 !important;
  color: #3e5949 !important;
}
.home .sh2-home-shell a.btn.btn-green .btn-arrow::before,
.home .sh2-home-shell a.btn.btn-green .btn-arrow::after {
  border-color: currentColor !important;
}
@media (max-width: 767px) {
  .home #design-without-limits .sh2-range-card {
    border-radius: 18px !important;
  }
}
</style>

<style id="sh-home-visual-corrections-20260908">
body.home:not(#sh-home-hero-type-20260908):not(#sh-home-hero-type-override) #carouselExampleIndicators .carousel-item .carousel-caption h5 {
  color: #fff !important;
  font-family: "diavlolight", sans-serif !important;
  font-size: clamp(52px, 6vw, 96px) !important;
  font-weight: 400 !important;
  line-height: .94 !important;
  letter-spacing: -.02em !important;
  text-shadow: 0 2px 10px rgba(8, 15, 11, .28) !important;
}
body.home:not(#sh-home-hero-effect-20260908) .main-slider .carousel-caption::before {
  display: none !important;
}
body.home:not(#sh-home-dark-heading-20260908):not(#sh-home-dark-heading-override) .sh2-carousel-panel-dark .sh2-section-heading h2 {
  color: #fff !important;
}
@media (max-width: 767px) {
  body.home:not(#sh-home-hero-type-20260908):not(#sh-home-hero-type-override) #carouselExampleIndicators .carousel-item .carousel-caption h5 {
    font-size: clamp(30px, 8.7vw, 34px) !important;
    line-height: 1.04 !important;
    letter-spacing: -.015em !important;
    text-shadow: 0 2px 8px rgba(8, 15, 11, .30) !important;
  }
}
</style>

<!-- Slider -->
            <div class="main-slider">
                <div class="carousel slide carousel-fade" data-interval="6500" data-ride="carousel" id="carouselExampleIndicators">
                    <div class="carousel-inner">
                        <?php
                        $args  = array(
                            'post_type'      => 'slider',
                            'post_status'    => 'publish',
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                            'posts_per_page' => -1,
                        );
                        $query = new WP_Query( $args );

                        $i = 1;
                        while ( $query->have_posts() ) :
                            $query->the_post();
                            $class                = ( 1 === $i ) ? 'active' : '';
                            $slide_title          = wp_strip_all_tags( get_the_title() );
                            $featured_img_url     = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                            $slider_video_by_title = array(
                                'When Luxury Meets Art' => array(
                                    'mp4'    => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/When-Luxury-Meets-Art-Slider.mp4',
                                    'mobile_mp4' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/When-Luxury-Meets-Art-Mobile-Slider.mp4',
                                    'poster' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/frame-0.00.jpg',
                                ),
                                'Minimalistic Designs For The Modern Home' => array(
                                    'mp4'    => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/Minimalistic-Designs-For-The-Modern-Home-Slider.mp4',
                                    'mobile_mp4' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/Minimalistic-Designs-For-The-Modern-Home-Mobile-Slider.mp4',
                                    'poster' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/slide2-minimalistic-designs-poster.jpg',
                                ),
                                'Colours, Shapes, Patterns and More' => array(
                                    'mp4'    => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/Colours-Shapes-Patterns-and-More-Slider.mp4',
                                    'mobile_mp4' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/Colours-Shapes-Patterns-and-More-Mobile-Slider.mp4',
                                    'poster' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/slide3-colours-shapes-patterns-poster.jpg',
                                ),
                                'Making Hygiene Accessible Everywhere' => array(
                                    'mp4'    => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/Making-Hygiene-Accessible-Everywhere-Slider.mp4',
                                    'mobile_mp4' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/Making-Hygiene-Accessible-Everywhere-Mobile-Slider.mp4',
                                    'poster' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/slide4-making-hygiene-accessible-poster.jpg',
                                ),
                                'The strength of water with the power of light' => array(
                                    'mp4'    => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/The-strength-of-water-with-the-power-of-light-Slider.mp4',
                                    'mobile_mp4' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/The-Art-of-Savouring-Life-Mobile-Slider.mp4',
                                    'poster' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/slide5-strength-of-water-power-of-light-poster.jpg',
                                ),
                                'The Art of Savouring Life' => array(
                                    'mp4'    => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/The-Art-of-Savouring-Life-Slider.mp4',
                                    'mobile_mp4' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/The-strength-of-water-with-the-power-of-light-Mobile-Slider.mp4',
                                    'poster' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/slide6-art-of-savouring-life-poster.jpg',
                                ),
                            );
                            $slider_video_sources = array(
                                'vanda-slider.gif'  => array(
                                    'webm'  => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/vanda-slider.webm',
                                    'mp4'   => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/vanda-slider.mp4',
                                    'poster'=> 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/vanda-slider-poster.jpg',
                                ),
                                'unnamed-file.gif'  => array(
                                    'webm'  => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/unnamed-file.webm',
                                    'mp4'   => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/unnamed-file.mp4',
                                    'poster'=> 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/unnamed-file-poster.jpg',
                                ),
                                'bathco-slider.gif' => array(
                                    'webm'  => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/bathco-slider.webm',
                                    'mp4'   => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/bathco-slider.mp4',
                                    'poster'=> 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/bathco-slider-poster.jpg',
                                ),
                                'slider-4.gif'      => array(
                                    'webm'  => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/slider-4.webm',
                                    'mp4'   => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/slider-4.mp4',
                                    'poster'=> 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/slider-4-poster.jpg',
                                ),
                                'fima-slider.gif'   => array(
                                    'webm'  => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/fima-slider.webm',
                                    'mp4'   => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/fima-slider.mp4',
                                    'poster'=> 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/fima-slider-poster.jpg',
                                ),
                                'dolcevita.gif'     => array(
                                    'webm'  => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/dolcevita.webm',
                                    'mp4'   => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/dolcevita.mp4',
                                    'poster'=> 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/dolcevita-poster.jpg',
                                ),
                            );
                            $slider_video_source = isset( $slider_video_by_title[ $slide_title ] ) ? $slider_video_by_title[ $slide_title ] : null;
                            if ( ! $slider_video_source && isset( $slider_video_sources[ basename( $featured_img_url ) ] ) ) {
                                $slider_video_source = $slider_video_sources[ basename( $featured_img_url ) ];
                            }
                        ?>
                        <div class="carousel-item <?php echo esc_attr( $class ); ?>">
                            <?php if ( $slider_video_source ) : ?>
                                <video aria-label="<?php echo esc_attr( get_the_title() . ' - Sanctuary Holdings' ); ?>" class="d-block w-100 sh2-slider-video" autoplay muted loop playsinline preload="<?php echo ( 1 === $i ) ? 'auto' : 'metadata'; ?>" poster="<?php echo esc_url( isset( $slider_video_source['poster'] ) ? $slider_video_source['poster'] : $featured_img_url ); ?>">
                                    <?php if ( ! empty( $slider_video_source['mobile_mp4'] ) ) : ?>
                            <source media="(max-width: 767px)" src="<?php echo esc_url( $slider_video_source['mobile_mp4'] ); ?>" type="video/mp4">
                        <?php endif; ?>
                        <?php if ( ! empty( $slider_video_source['webm'] ) ) : ?>
                                    <source src="<?php echo esc_url( $slider_video_source['webm'] ); ?>" type="video/webm">
                                    <?php endif; ?>
                                    <source src="<?php echo esc_url( $slider_video_source['mp4'] ); ?>" type="video/mp4">
                                </video>
                            <?php else : ?>
                                <img alt="<?php echo esc_attr( get_the_title() . ' - Sanctuary Holdings' ); ?>" class="d-block w-100" src="<?php echo esc_url( $featured_img_url ); ?>" decoding="async" <?php echo ( 1 === $i ) ? 'loading="eager" fetchpriority="high"' : 'loading="lazy" fetchpriority="low"'; ?>>
                            <?php endif; ?>
                            <div class="carousel-caption">
                                <h5><?php the_title(); ?> ...</h5>
                                <?php
                                $cta_url = get_field( 'read_more_url' );
                                if ( empty( $cta_url ) ) {
                                    $cta_url = home_url( '/request-a-quotation/' );
                                }
                                $cta_is_external = ( 0 === strpos( $cta_url, 'https://wa.me' ) );
                                ?>
                                <a href="<?php echo esc_url( $cta_url ); ?>" class="btn btn-white" aria-label="<?php echo esc_attr( get_field( 'read_more_text' ) ); ?>"<?php echo $cta_is_external ? ' target="_blank" rel="noopener"' : ''; ?>><?php the_field( 'read_more_text' ); ?><i class="btn-arrow"></i></a>
                            </div>
                            <div class="sh2-slider-kicker">Innovation . Design . Sustainability</div>
                            <div class="overlay d-none d-md-block"></div>
                        </div>
                        <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <ol class="carousel-indicators sh2-slider-indicators">
                        <?php for ( $indicator = 0; $indicator < $query->post_count; $indicator++ ) : ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo esc_attr( $indicator ); ?>" class="<?php echo 0 === $indicator ? 'active' : ''; ?>">
                                <span class="sr-only">Go to slide <?php echo esc_html( $indicator + 1 ); ?></span>
                            </li>
                        <?php endfor; ?>
                    </ol>
                </div>
            </div>

            <div class="sh2-home-shell">
                <section class="sh2-latest-offerings">
                    <div class="container sh2-shell-container">
                    <div class="row sh2-shell-row">
                        <div class="col-xs-12" style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                            <div class="sh2-section-heading center" style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; max-width:none; margin:0 auto 44px; text-align:center;">
                                <span style="display:block; width:100%; text-align:center;">Discover What's New</span>
                                <h2 style="display:block; width:100%; text-align:center; margin-left:auto; margin-right:auto;">Latest Offerings</h2>
                                <p style="display:block; width:100%; text-align:center; margin-left:auto; margin-right:auto;">Take a peek at what&rsquo;s new, our latest picks from brands you&rsquo;ll love, ready to make your space feel just right.</p>
                            </div>
                        </div>
                        <div class="col-xs-12" style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                            <div class="sh2-offering-grid">
                                <article class="sh2-offering-card">
                                    <a class="sh2-offering-media-link" href="https://fimacf.com/en/fima-diary/cataloghi/waterdot-magazine/?auto_viewer=true#page=&amp;zoom=auto&amp;pagemode=none" target="_blank" rel="noopener noreferrer" aria-label="Explore the Fima Carlo Frattini Waterdot magazine"><img alt="Waterdot by Fima Carlo Frattini" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/Place-holder-1.jpg" loading="lazy" decoding="async"></a>
                                    <div class="sh2-offering-content">
                                        <span>Fima | Carlo Frattini</span>
                                        <h3>Waterdot</h3>
                                        <p>The new Fima shower system WATERDOT consists of a series of small-diameter shower heads that can be mounted on plasterboard, designed to be aligned in order to ensure the correct water flow for an enjoyable and satisfying shower experience.</p>
                                    </div>
                                </article>
                                <article class="sh2-offering-card">
                                    <a class="sh2-offering-media-link" href="https://houseofrohl.design/en-gb/victoria-albert-baths/seros/" target="_blank" rel="noopener noreferrer" aria-label="Explore the Victoria + Albert Seros bath"><img alt="Seros by Victoria + Albert" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/Placeholder-2.jpg" loading="lazy" decoding="async"></a>
                                    <div class="sh2-offering-content">
                                        <span>Victoria + Albert</span>
                                        <h3>Seros</h3>
                                        <p>The Seros bath is a beautiful centrepiece for the bathroom, with sculptured line work flowing around the tub. Ergonomically designed, the sweeping chamfered rim of the bath creates a cradle for the bather, gently supporting the neck. The internal shape is moulded for comfort, encouraging a longer soak.</p>
                                    </div>
                                </article>
                                <article class="sh2-offering-card">
                                    <a class="sh2-offering-media-link" href="https://www.thebathcollection.com/en/category/washbasins/?product_cats%5B%5D=bamboo" target="_blank" rel="noopener noreferrer" aria-label="Explore the Bathco Bamboo Collection"><img alt="Bamboo Collection by Bathco" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/placeholder-3.webp" loading="lazy" decoding="async"></a>
                                    <div class="sh2-offering-content">
                                        <span>Bathco</span>
                                        <h3>Bamboo Collection</h3>
                                        <p>In a world increasingly conscious of sustainability, bamboo has become one of the most valued materials by architects, designers and interior designers. Its strength, natural beauty and low environmental impact make it ideal for multiple applications, and the bathroom is no exception.</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <section class="sh2-company-intro">
                    <div class="container sh2-shell-container">
                    <div class="row sh2-shell-row align-items-center">
                        <div class="col-xs-12 col-lg-6">
                            <div class="sh2-section-heading left">
                                <span>Who We Are</span>
                                <h2>Our Story in Brief</h2>
                                <p>At Sanctuary Holdings, we believe great spaces are built on thoughtful choices. Across designer bathware, hot water solutions, plumbing, and fire safety, we bring together globally renowned brands&mdash;exclusively available through us in the region. From your first idea to the moment your space comes to life, we&rsquo;re right there with you, helping you create something that feels considered, comfortable, and uniquely yours.</p>
                                <a class="btn btn-green" href="/about/">About Us<i class="btn-arrow"></i></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="sh2-company-image">
                                <img alt="Sanctuary company introduction image" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/FDB1E784-502B-4984-AA3D-2757B43A3F43.png" loading="lazy" decoding="async">
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <section class="sh2-divisions-grid">
                    <div class="sh2-wide-viewport">
                    <div class="container sh2-shell-container sh2-shell-container-fluid">
                    <div class="row sh2-shell-row">
                        <div class="col-xs-12" style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                            <div class="sh2-section-heading center" style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; max-width:none; margin:0 auto 44px; text-align:center;">
                                <span style="display:block; width:100%; text-align:center;">What We Offer</span>
                                <h2 style="display:block; width:100%; text-align:center; margin-left:auto; margin-right:auto;">Elevating Every Essential</h2>
                                <p style="display:block; width:100%; text-align:center; margin-left:auto; margin-right:auto;">We offer more than products; we offer complete solutions&mdash;spanning elegant bathware, reliable hot water, professional plumbing, and fire safety. Each division is crafted to elevate your space and ensure peace of mind.</p>
                            </div>
                        </div>
                        <div class="col-xs-12" style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                            <div class="sh2-division-grid" style="display:grid; grid-template-columns:repeat(2, minmax(0, 1fr)); width:100%; margin:0;">
                                <article class="sh2-division-panel">
                                    <img alt="Designer bathware solutions by Sanctuary Holdings in Sri Lanka" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-plumbing.jpeg" loading="lazy" decoding="async">
                                    <div class="sh2-division-overlay">
                                        <span>Elevating Your Space</span>
                                        <h3>Designer Bathware</h3>
                                        <p>As the exclusive regional partner, we bring you Europe's top luxury brands, available only through Sanctuary&mdash;ensuring your bathware is as unique as it is elegant.</p>
                                    </div>
                                </article>
                                <article class="sh2-division-panel">
                                    <img alt="Hot water systems and comfort solutions by Sanctuary Holdings" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-hot-water.png" loading="lazy" decoding="async">
                                    <div class="sh2-division-overlay">
                                        <span>Comfort on Demand</span>
                                        <h3>Hot Water Solutions</h3>
                                        <p>From a simple home water heater to advanced systems like heat pumps, solar, or gas boilers&mdash;whether for residential comfort or large-scale commercial projects, we deliver tailored, exclusive solutions.</p>
                                    </div>
                                </article>
                                <article class="sh2-division-panel">
                                    <img alt="Professional plumbing solutions for residential and commercial projects" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-pumps-fire.png" loading="lazy" decoding="async">
                                    <div class="sh2-division-overlay">
                                        <span>Flow Perfected</span>
                                        <h3>Plumbing Solutions</h3>
                                        <p>Whether it&rsquo;s a home renovation or a commercial project, our expert plumbing ensures smooth, reliable water systems, crafted exclusively for your needs.</p>
                                    </div>
                                </article>
                                <article class="sh2-division-panel">
                                    <img alt="Pumps, fire curtains and safety systems by Sanctuary Holdings" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-bathware.png" loading="lazy" decoding="async">
                                    <div class="sh2-division-overlay">
                                        <span>Safety Meets Innovation</span>
                                        <h3>Pumps &amp; Fire Curtains</h3>
                                        <p>We offer dependable pump solutions tailored for water systems and industrial needs. Our advanced fire and smoke curtains provide cutting-edge safety, ensuring protection with innovative design.</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </section>

                <section class="sh2-brand-direction">
                    <div class="container sh2-shell-container">
                    <div class="row sh2-shell-row">
                        <div class="col-xs-12">
                            <div class="sh2-direction-shell">
                                <div class="sh2-direction-copy">
                                    <span>Why Sanctuary?</span>
                                    <h2>A Partnership You Can Rely On</h2>
                                    <p>Discover what makes us your partner in elevating spaces.</p>
                                </div>
                                <div class="sh2-direction-grid">
                                    <article class="sh2-direction-card">
                                        <span>Exclusive Brands</span>
                                        <p>Access top-tier international brands available solely through us.</p>
                                    </article>
                                    <article class="sh2-direction-card">
                                        <span>Tailored Solutions</span>
                                        <p>From concept to installation, we customize for your unique needs.</p>
                                    </article>
                                    <article class="sh2-direction-card">
                                        <span>Trusted Expertise</span>
                                        <p>Decades of experience mean you can trust every step.</p>
                                    </article>
                                    <article class="sh2-direction-card">
                                        <span>Design Sanctuary</span>
                                        <p>We transform spaces into havens of style and innovation.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <section class="sh2-brand-carousel">
                    <div class="sh2-carousel-viewport">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="sh2-carousel-panel sh2-carousel-panel-dark">
                                    <div class="sh2-section-heading center sh2-light-heading">
                                        <span>Partner Brands</span>
                                        <h2>Brands we represent</h2>
                                        <p>A curated portfolio of international brands, selected for design, performance and lasting value.</p>
                                    </div>
                                    <div class="sh2-carousel-shell">
                                        <?php
                                        $brand_logos = array(
                                                array( 'name' => 'Paffoni', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/paffoni-clean-white.png', 'url' => '/partners/paffoni/' ),
                                                array( 'name' => 'Bathco', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/bathco-white.png', 'url' => '/partners/bathco/' ),
                                                array( 'name' => 'Creavit', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/creavit-white.png', 'url' => '/partners/creavit/' ),
                                                array( 'name' => 'Fima Carlo Frattini', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/fima-white.png', 'url' => '/partners/fima-carlo-frattini/' ),
                                                array( 'name' => 'Gemake', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/gemake-white.png', 'url' => '/partners/gemake/' ),
                                                array( 'name' => 'Kreiner', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/kreiner-white.png', 'url' => '/partners/kreiner/' ),
                                                array( 'name' => 'Sanibano', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanibano-white.png', 'url' => '/partners/sanibano/' ),
                                                array( 'name' => 'Sloan', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sloan-white.png', 'url' => '/partners/sloan/' ),
                                                array( 'name' => 'Alice', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/alice-white.png', 'url' => '/partners/alice/' ),
                                                array( 'name' => 'Cosmic', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/cosmic-white.png', 'url' => '/partners/cosmic/' ),
                                                array( 'name' => 'Daniel', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/daniel-white.png', 'url' => '/partners/daniel/' ),
                                                array( 'name' => 'Perrin and Rowe', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/perrin-and-rowe-white.png', 'url' => '/partners/perrin-rowe/' ),
                                                array( 'name' => 'Victoria and Albert', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/vanda-white.png', 'url' => '/partners/victoria-albert/' ),
                                                array( 'name' => 'Valvex', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/valvex-white.png', 'url' => '/partners/valvex/' ),
                                                array( 'name' => 'THG', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/thg-white.png', 'url' => '/partners/thg-paris/' ),
                                                array( 'name' => 'Delabie', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/delabie-white.png', 'url' => '/partners/delabie/' ),
                                                array( 'name' => 'ASI', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/asi-white.png', 'url' => '/partners/asi/' ),
                                                array( 'name' => 'Nulite', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/nulite-white.png', 'url' => '/partners/nulite/' ),
                                                array( 'name' => 'Rheem', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/rheem-clean-white-wordmark.png', 'url' => '/partners/rheem/' ),
                                                array( 'name' => 'Kent', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/kent-white.png', 'url' => '/partners/smoke-and-fire-curtains/' ),
                                                array( 'name' => 'B Meters', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/bmeters-white.png', 'url' => '/partners/b-meters/' ),
                                                array( 'name' => 'Matra', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/matra-white.png', 'url' => '/partners/matra/' ),
                                                array( 'name' => 'Tsurami', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/tsurami-white.png', 'url' => '/partners/tsurumi/' ),
                                                array( 'name' => 'BLE', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/ble-white.png', 'url' => '/partners/ble/' ),
                                                array( 'name' => 'Zenit', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/zenit-white.png', 'url' => '/partners/zenit/' ),
                                                array( 'name' => 'Standart', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/standart-white.png', 'url' => '/partners/standart/' ),
                                                array( 'name' => 'Zirantec', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/zirantec-white.png', 'url' => '/partners/zirantec/' ),
                                        );
                                        ?>
                                        <div class="sh2-brand-marquee" aria-label="Sanctuary partner brand logos">
                                            <div class="sh2-brand-marquee-track">
                                                <?php for ( $brand_logo_pass = 0; $brand_logo_pass < 2; $brand_logo_pass++ ) : ?>
                                                    <?php foreach ( $brand_logos as $brand_logo ) : ?>
                                                        <div class="item sh2-brand-marquee-item"<?php echo 1 === $brand_logo_pass ? ' aria-hidden="true"' : ''; ?>>
                                                            <a class="sh2-logo-card sh2-logo-card-dark" href="<?php echo esc_url( home_url( $brand_logo['url'] ) ); ?>" aria-label="<?php echo esc_attr( 'View ' . $brand_logo['name'] ); ?>">
                                                                <img src="<?php echo esc_url( $brand_logo['src'] ); ?>" alt="<?php echo 0 === $brand_logo_pass ? esc_attr( $brand_logo['name'] . ' logo' ) : ''; ?>" loading="lazy" decoding="async" fetchpriority="low">
                                                            </a>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="sh2-materials-section" id="design-without-limits">
                    <div class="sh2-wide-viewport">
                    <div class="container sh2-shell-container sh2-shell-container-fluid">
                    <div class="row sh2-shell-row">
                        <div class="col-xs-12" style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; text-align:center;">
                            <div class="sh2-section-heading center sh2-portfolio-heading" style="display:grid; place-items:center; width:min(100%, 980px); max-width:980px; margin:0 auto 44px; padding-left:24px; padding-right:24px; box-sizing:border-box; text-align:center;">
                                <span style="display:block; width:100%; max-width:980px; margin-left:auto; margin-right:auto; text-align:center;">Our Range</span>
                                <h2 style="display:block; width:100%; max-width:980px; text-align:center; margin-left:auto; margin-right:auto;">Design Without Limits</h2>
                                <p style="display:block; width:100%; max-width:780px; text-align:center; margin-left:auto; margin-right:auto;">A wide spectrum of materials, finishes and solutions, offering unmatched flexibility in design.</p>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <?php
                            $range_images = array(
                                'materia' => array(
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-materia-1.jpg',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-materia-2.webp',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-materia-3.webp',
                                ),
                                'atelier-colours' => array(
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-atelierColours-1.webp',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-atelierColours-2.jpg',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-atelierColours-3.jpg',
                                ),
                                'finishes-in-taps' => array(
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-finishesInTaps-1.jpg',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-finishesInTaps-2.webp',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-finishesInTaps-3.avif',
                                ),
                                'classic-bathrooms' => array(
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-classicBathrooms-1.jpg',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-classicBathrooms-2-scaled.jpg',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/06/FIMA_Carlo_Frattini_OLIVIA_Lavabo_Washbasin_2.webp',
                                ),
                                'hot-water-solutions' => array(
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-hotWaterSolutions-1.png',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-hotWaterSolutions-2.png',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-hotWaterSolutions-3.png',
                                ),
                                'pumps-fire-curtains' => array(
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-pumpsFireCurtains-1.png',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-pumpsFireCurtains-2.png',
                                    'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-pumpsFireCurtains-3.png',
                                ),
                            );

                            $range_rows = array(
                                array(
                                    array(
                                        'size' => 'full',
                                        'small' => 'Material Stories',
                                        'title' => 'Materia',
                                        'description' => 'Basins shaped by texture, weight and natural character.',
                                        'cta' => 'Explore Materials',
                                        'url' => '/materia/',
                                        'images' => $range_images['materia'],
                                    ),
                                ),
                                array(
                                    array(
                                        'size' => 'half',
                                        'small' => 'Artistic Expression',
                                        'title' => 'Atelier / Colours',
                                        'description' => 'Hand-painted, printed and coloured ceramics with personality.',
                                        'cta' => 'Explore Colours',
                                        'url' => '/atelier-colours/',
                                        'images' => $range_images['atelier-colours'],
                                    ),
                                    array(
                                        'size' => 'half',
                                        'small' => 'Details That Define',
                                        'title' => 'Finishes in Taps',
                                        'description' => 'A refined palette of finishes across taps and showers.',
                                        'cta' => 'View Finishes',
                                        'url' => '/finishes-in-taps/',
                                        'images' => $range_images['finishes-in-taps'],
                                    ),
                                ),
                                array(
                                    array(
                                        'size' => 'full',
                                        'small' => 'Timeless Spaces',
                                        'title' => 'Classic Bathrooms',
                                        'description' => 'Ceramics, brassware and bathtubs for complete classical interiors.',
                                        'cta' => 'Explore Classic',
                                        'url' => '/classic-bathrooms/',
                                        'images' => $range_images['classic-bathrooms'],
                                    ),
                                ),
                                array(
                                    array(
                                        'size' => 'half',
                                        'small' => 'Everyday Comfort',
                                        'title' => 'Hot Water Solutions',
                                        'description' => 'From simple systems to advanced hybrid solutions.',
                                        'cta' => 'Discover Solutions',
                                        'url' => '/hot-water-solutions/',
                                        'images' => $range_images['hot-water-solutions'],
                                    ),
                                    array(
                                        'size' => 'half',
                                        'small' => 'Performance & Safety',
                                        'title' => 'Pumps & Fire Curtains',
                                        'description' => 'Essential systems designed for reliability and protection.',
                                        'cta' => 'Learn More',
                                        'url' => '/pumps-fire-curtains/',
                                        'images' => $range_images['pumps-fire-curtains'],
                                    ),
                                ),
                            );
                            ?>
                            <div class="sh2-range-layout" aria-label="Sanctuary range highlights">
                                <?php foreach ( $range_rows as $range_row ) : ?>
                                    <div class="sh2-range-row">
                                        <?php foreach ( $range_row as $range_block ) : ?>
                                            <article class="sh2-range-card sh2-range-card-<?php echo esc_attr( $range_block['size'] ); ?>">
                                                <div class="sh2-range-slideshow">
                                                    <?php foreach ( $range_block['images'] as $range_image_index => $range_image ) : ?>
                                                        <img src="<?php echo esc_url( $range_image ); ?>" alt="<?php echo esc_attr( $range_block['title'] . ' design inspiration and product solution ' . ( $range_image_index + 1 ) ); ?>" loading="lazy" decoding="async">
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="sh2-range-overlay">
                                                    <span><?php echo esc_html( $range_block['small'] ); ?></span>
                                                    <h3><?php echo esc_html( $range_block['title'] ); ?></h3>
                                                    <p><?php echo esc_html( $range_block['description'] ); ?></p>
                                                    <a href="<?php echo esc_url( $range_block['url'] ); ?>"><?php echo esc_html( $range_block['cta'] ); ?></a>
                                                </div>
                                            </article>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </section>

                <section class="sh2-projects-section">
                    <div class="container sh2-shell-container">
                    <div class="row sh2-shell-row">
                        <div class="col-xs-12">
                            <div class="sh2-section-heading center" style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; max-width:none; margin:0 auto 44px; text-align:center;">
                                <span style="display:block; width:100%; text-align:center;">Projects</span>
                                <h2 style="display:block; width:100%; text-align:center; margin-left:auto; margin-right:auto;">Projects we have been part of</h2>
                                <p style="display:block; width:100%; text-align:center; margin-left:auto; margin-right:auto;">A glimpse into the landmark spaces and projects we have been privileged to help shape.</p>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="sh2-project-grid" style="margin-left:auto; margin-right:auto;">
                                <a class="sh2-project-card" href="/projects/cinnamon-bentota-beach/">
                                    <img alt="Cinnamon Bentota Beach hotel project" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/06/Cinnamon-Bentota-Beach.jpeg" loading="eager" decoding="async">
                                    <div class="sh2-project-copy">
                                        <span>Bentota, Sri Lanka | Hotel</span>
                                        <h3>Cinnamon Bentota Beach</h3>
                                        <p>Official bathware supplier for the hotel renovation, covering 145 Deluxe Rooms, 20 Suites, and public-area toilets.</p>
                                    </div>
                                </a>
                                <a class="sh2-project-card" href="/projects/jetwing-wahawa-walauwa/">
                                    <img alt="Jetwing Wahawa Walauwa heritage hotel project" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/06/Jetwing-Wahawa-Walauwa.jpeg" loading="eager" decoding="async">
                                    <div class="sh2-project-copy">
                                        <span>Rambukkana, Sri Lanka | Hotel</span>
                                        <h3>Jetwing Wahawa Walauwa</h3>
                                        <p>A heritage-led project featuring Fima | Carlo Frattini, Alice, and Kreiner across master and junior suites.</p>
                                    </div>
                                </a>
                                <a class="sh2-project-card" href="/projects/iconic-galaxy/">
                                    <img alt="Iconic Galaxy residential tower project" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/06/Iconic-Galaxy.jpeg" loading="eager" decoding="async">
                                    <div class="sh2-project-copy">
                                        <span>Rajagiriya, Sri Lanka | Apartments</span>
                                        <h3>Iconic Galaxy</h3>
                                        <p>Bathroom solutions for a 33-storey residential tower with 285 super-luxury apartments.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="sh2-section-cta">
                                <a class="btn btn-green" href="/project/">Learn More<i class="btn-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <section class="sh2-client-carousel">
                    <div class="sh2-carousel-viewport">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="sh2-carousel-panel sh2-carousel-panel-light">
                                    <div class="sh2-section-heading center">
                                        <span>Our Clients</span>
                                        <h2>Trusted by those shaping Sri Lanka</h2>
                                        <p>We are proud to have served and earned the trust of an extensive portfolio of prestigious clients across Sri Lanka.</p>
                                    </div>
                                    <div class="sh2-carousel-shell">
                                        <div class="sh2-client-marquee" aria-label="Sanctuary client logos">
                                            <div class="sh2-client-marquee-track">
                                                <?php for ( $client_logo_pass = 0; $client_logo_pass < 2; $client_logo_pass++ ) : ?>
                                                    <?php for ( $logo = 1; $logo <= 33; $logo++ ) : ?>
                                                        <div class="item sh2-client-marquee-item"<?php echo 1 === $client_logo_pass ? ' aria-hidden="true"' : ''; ?>>
                                                            <div class="sh2-logo-card">
                                                                <img src="<?php echo esc_url( THEMEROOT . '/images/client_logos_home/client-logo-' . $logo . '.jpg' ); ?>" alt="<?php echo 0 === $client_logo_pass ? esc_attr( 'Prestigious Sanctuary Holdings client partner ' . $logo ) : ''; ?>" loading="lazy" decoding="async" fetchpriority="low">
                                                            </div>
                                                        </div>
                                                    <?php endfor; ?>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="sh2-inspiration-section">
                    <div class="container sh2-shell-container">
                    <div class="row sh2-shell-row">
                        <div class="col-xs-12">
                            <div class="sh2-section-heading center" style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; max-width:none; margin:0 auto 44px; text-align:center;">
                                <span style="display:block; width:100%; text-align:center;">Inspiration</span>
                                <h2 style="display:block; width:100%; text-align:center; margin-left:auto; margin-right:auto;">Design Smarter. Live Better.</h2>
                                <p style="display:block; width:100%; text-align:center; margin-left:auto; margin-right:auto;">Explore bathroom trends, practical guidance, and thoughtful design ideas&mdash;curated to help you make confident, design-led decisions.</p>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="sh2-inspiration-grid" style="margin-left:auto; margin-right:auto;">
                                <a class="sh2-inspiration-card" href="/inspiration/bedroom-with-integrated-bathroom-ideas/">
                                    <img alt="Bedroom with integrated bathroom and soft pink bed styling" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/07/1D_Rosa-Colet-Interior-Design_Starpestudi-2-scaled.jpg.webp" loading="lazy" decoding="async">
                                    <div class="sh2-inspiration-copy">
                                        <span>Trends</span>
                                        <h3>Bedrooms with Integrated Bathrooms</h3>
                                        <p>Planning ideas for creating a smoother connection between sleeping, vanity, and bathing zones.</p>
                                    </div>
                                </a>
                                <a class="sh2-inspiration-card" href="/inspiration/design-in-detail/">
                                    <img alt="A curated bathroom material and product moodboard for Design in Detail" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/08/design-detail-hero-hires.jpg" loading="lazy" decoding="async">
                                    <div class="sh2-inspiration-copy">
                                        <span>Guidance</span>
                                        <h3>Design in Detail</h3>
                                        <p>Discover how carefully considered materials, fittings and finishes come together to create a cohesive bathroom experience.</p>
                                    </div>
                                </a>
                                <a class="sh2-inspiration-card" href="/inspiration/sustainability/saving-water-in-the-bathroom/">
                                    <img alt="A person washing their hands at an efficient bathroom basin" src="https://sanctuaryholdings.lk/wp-content/uploads/2026/08/image.jpg" loading="lazy" decoding="async">
                                    <div class="sh2-inspiration-copy">
                                        <span>Sustainability</span>
                                        <h3>Saving Water in the Bathroom</h3>
                                        <p>Explore thoughtful habits and efficient fittings that reduce everyday water use without compromising comfort, performance or design.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="sh2-inspiration-hub-link">
                                <a href="/inspiration/">Explore Inspiration</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <section class="sh2-home-faq-news">
                    <div class="container sh2-shell-container">
                    <div class="row sh2-shell-row">
                        <div class="col-xs-12 col-lg-5">
                            <div class="sh2-faq-preview">
                                <div class="sh2-section-heading left">
                                    <span>FAQs</span>
                                    <h2>Frequently asked questions</h2>
                                    <p>Practical guidance to help you plan with clarity and choose with confidence.</p>
                                </div>
                                <div class="sh2-faq-item">
                                    <strong>What does Sanctuary Holdings supply in Sri Lanka?</strong>
                                    <p>Designer bathware, hot water systems, plumbing solutions, and fire curtains and pumps for residential and commercial projects.</p>
                                </div>
                                <div class="sh2-faq-item">
                                    <strong>Which types of projects does Sanctuary Holdings support?</strong>
                                    <p>Luxury homes, apartments, hotels, resorts, mixed-use developments, and commercial spaces that need dependable product and project support.</p>
                                </div>
                                <div class="sh2-faq-item">
                                    <strong>Where is the Sanctuary Holdings showroom located?</strong>
                                    <p>No. 831, Kotte Road, Ethul Kotte, 10100, Sri Lanka.</p>
                                </div>
                                <a class="btn btn-green" href="/faq/">View All FAQs<i class="btn-arrow"></i></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-7">
                            <div class="sh2-news-shell">
                                <div class="sh2-section-heading left">
                                    <span>News</span>
                                    <h2>Latest News</h2>
                                    <p>Discover new collections, project milestones and the latest from Sanctuary.</p>
                                </div>
                                <div class="sh2-news-grid">
                                    <?php foreach ( $news_items as $news_item ) : ?>
                                        <article class="sh2-news-card">
                                            <div class="sh2-news-image" style="background-image:url('<?php echo esc_url( $news_item['image'] ); ?>');"></div>
                                            <div class="sh2-news-copy">
                                                <span><?php echo esc_html( $news_item['date'] ); ?></span>
                                                <h3><?php echo esc_html( $news_item['title'] ); ?></h3>
                                                <p><?php echo esc_html( $news_item['excerpt'] ); ?></p>
                                                <a class="btn btn-green" href="<?php echo esc_url( $news_item['url'] ); ?>">Read More<i class="btn-arrow"></i></a>
                                            </div>
                                        </article>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
            </div>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  if (window.jQuery && window.jQuery.fn && window.jQuery.fn.owlCarousel) {
    var $ = window.jQuery;

    function rebuildOwl($carousel, options) {
      if (!$carousel.length) return;

      if ($carousel.data('owl.carousel')) {
        $carousel.trigger('destroy.owl.carousel');
        $carousel.removeClass('owl-loaded owl-hidden');
        $carousel.find('.owl-stage-outer').children().unwrap();
        $carousel.find('.owl-stage').children().unwrap();
        $carousel.find('.owl-item').children().unwrap();
        $carousel.find('.cloned').remove();
      }

      $carousel.owlCarousel(options);
    }

    function initHomepageCarousels() {
      rebuildOwl($('.owl-two'), {
        loop: true,
        margin: 28,
        autoplay: true,
        autoplayTimeout: 2400,
        autoplayHoverPause: true,
        responsiveClass: true,
        autoWidth: false,
        center: false,
        nav: false,
        dots: false,
        smartSpeed: 700,
        responsive: {
          0: { items: 2, margin: 16 },
          600: { items: 3, margin: 20 },
          1000: { items: 4, margin: 24 },
          1400: { items: 5, margin: 28 }
        }
      });

    }

    initHomepageCarousels();
    window.setTimeout(initHomepageCarousels, 500);
  }

  var sections = document.querySelectorAll('.sh2-home-shell > section, .sh2-footer-wrapper');
  if (!sections.length) return;

  sections.forEach(function (section) {
    section.classList.add('sh2-scroll-reveal');
  });

  if (!('IntersectionObserver' in window)) {
    sections.forEach(function (section) {
      section.classList.add('is-visible');
    });
    return;
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.14,
    rootMargin: '0px 0px -8% 0px'
  });

  sections.forEach(function (section) {
    observer.observe(section);
  });
});
</script>
<style id="sh-home-slider-no-tint">
body.home .main-slider .carousel-item::after {
  background: none !important;
}
</style>

<style id="sh-home-projects-cta-repair-20260829">
body.home .sh2-projects-section .sh2-section-cta {
  position: static !important;
  display: block !important;
  width: auto !important;
  min-height: 0 !important;
  height: auto !important;
  margin: 32px 0 0 !important;
  padding: 0 !important;
  border: 0 !important;
  border-radius: 0 !important;
  background: transparent !important;
  background-image: none !important;
  box-shadow: none !important;
  overflow: visible !important;
  isolation: auto !important;
}
body.home .sh2-projects-section .sh2-section-cta::before,
body.home .sh2-projects-section .sh2-section-cta::after {
  content: none !important;
  display: none !important;
  background: none !important;
}
body.home .sh2-direction-copy > span {
  color: #bb8964 !important;
}
</style>

<?php get_footer(); ?>
