<?php
get_header();

$catalogue_url = '';
if ( function_exists( 'get_field' ) ) {
    $catalogue_url = trim( (string) get_field( 'catalogue_url' ) );
}
if ( '' === $catalogue_url ) {
    $catalogue_url = trim( (string) get_post_meta( get_the_ID(), 'catalogue_url', true ) );
}

$catalogue_cover = '';
if ( function_exists( 'get_field' ) ) {
    $catalogue_cover_field = get_field( 'catalogue_cover' );
    if ( is_array( $catalogue_cover_field ) && ! empty( $catalogue_cover_field['url'] ) ) {
        $catalogue_cover = $catalogue_cover_field['url'];
    } elseif ( is_numeric( $catalogue_cover_field ) ) {
        $catalogue_cover = wp_get_attachment_url( (int) $catalogue_cover_field );
    } elseif ( is_string( $catalogue_cover_field ) ) {
        $catalogue_cover = $catalogue_cover_field;
    }
}
if ( '' === $catalogue_cover ) {
    $catalogue_cover = trim( (string) get_post_meta( get_the_ID(), 'catalogue_cover', true ) );
}
if ( '' === $catalogue_cover ) {
    $catalogue_cover = 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/Download-Catalogue-scaled.jpg';
}

$partner_video_url = function_exists( 'get_field' ) ? trim( (string) get_field( 'video_url' ) ) : '';
$partner_video_image = function_exists( 'get_field' ) ? get_field( 'video_image' ) : '';
if ( is_array( $partner_video_image ) && ! empty( $partner_video_image['url'] ) ) {
    $partner_video_image = $partner_video_image['url'];
}

if ( ! function_exists( 'sh_partner_embed_url' ) ) {
    function sh_partner_embed_url( $url ) {
        $url = trim( (string) $url );
        if ( '' === $url ) {
            return '';
        }

        $parts = wp_parse_url( $url );
        $host = isset( $parts['host'] ) ? strtolower( preg_replace( '/^www\./', '', $parts['host'] ) ) : '';
        $path = isset( $parts['path'] ) ? trim( $parts['path'], '/' ) : '';
        $video_id = '';

        if ( 'youtu.be' === $host ) {
            $video_id = strtok( $path, '/' );
        } elseif ( in_array( $host, array( 'youtube.com', 'm.youtube.com', 'youtube-nocookie.com' ), true ) ) {
            if ( 'watch' === $path && ! empty( $parts['query'] ) ) {
                parse_str( $parts['query'], $query );
                $video_id = isset( $query['v'] ) ? $query['v'] : '';
            } elseif ( preg_match( '#^(?:embed|shorts|live)/([^/?]+)#', $path, $matches ) ) {
                $video_id = $matches[1];
            }
        }

        if ( preg_match( '/^[A-Za-z0-9_-]{6,20}$/', $video_id ) ) {
            // This legacy upload is private; suppress its broken player until a public URL is supplied.
            if ( in_array( $video_id, array( 'W72xnJEmrBc' ), true ) ) {
                return '';
            }
            return 'https://www.youtube.com/embed/' . rawurlencode( $video_id ) . '?autoplay=1&rel=0';
        }

        if ( in_array( $host, array( 'vimeo.com', 'player.vimeo.com' ), true ) && preg_match( '/(?:video\/)?(\d+)/', $path, $matches ) ) {
            return 'https://player.vimeo.com/video/' . rawurlencode( $matches[1] ) . '?autoplay=1';
        }

        if ( preg_match( '/\.(?:mp4|webm|ogg)$/i', $path ) ) {
            // The former Zenit MP4 endpoint now returns a 404 HTML page.
            if ( false !== stripos( $path, 'ZENIT_better-together_HD_EN.mp4' ) ) {
                return '';
            }
            return $url;
        }

        // Do not render ordinary website links as video players.
        return '';
    }
}

$partner_video_embed_url = sh_partner_embed_url( $partner_video_url );
?>

<style>
    body.single-partners .main-slider .carousel-inner,
    body.single-partners .main-slider .carousel-item,
    body.single-partners .main-slider .carousel-item img {
        height: clamp(300px, 32vw, 516px) !important;
    }

    body.single-partners .main-slider .carousel-item img {
        object-fit: cover;
        object-position: center;
    }

    body.single-partners .main-slider [data-partner-carousel] .carousel-inner {
        position: relative;
        overflow: hidden;
    }

    body.single-partners .main-slider [data-partner-carousel] .carousel-item {
        position: absolute;
        inset: 0;
        display: block !important;
        opacity: 0;
        z-index: 0;
        transition: opacity 0.9s ease-in-out !important;
        transform: none !important;
    }

    body.single-partners .main-slider [data-partner-carousel] .carousel-item.active {
        opacity: 1;
        z-index: 1;
    }

    body.single-partners .main-slider [data-partner-carousel] .carousel-control-prev,
    body.single-partners .main-slider [data-partner-carousel] .carousel-control-next {
        z-index: 3;
    }

    body.single-partners .partner-video-box {
        position: relative;
        display: grid;
        place-items: center;
        width: 100%;
        height: auto !important;
        aspect-ratio: 16 / 9;
        overflow: hidden;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        cursor: pointer;
    }

    body.single-partners .partner-video-box::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 1;
        background: linear-gradient(180deg, rgba(10, 18, 13, .08), rgba(10, 18, 13, .36));
        transition: background .25s ease;
    }

    body.single-partners .partner-video-box:hover::before {
        background: linear-gradient(180deg, rgba(10, 18, 13, .02), rgba(10, 18, 13, .24));
    }

    body.single-partners .partner-video-box .play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 13px;
        width: auto;
        height: auto;
        margin: 0;
        padding: 0;
        border: 0;
        background: transparent;
        color: #fff !important;
        cursor: pointer;
        transform: translate(-50%, -50%);
    }

    body.single-partners .partner-video-box .play-icon:focus-visible {
        outline: 2px solid #fff;
        outline-offset: 8px;
        border-radius: 2px;
    }

    body.single-partners .partner-video-box .video-icon {
        position: relative;
        display: block;
        width: 92px;
        height: 92px;
        border: 2px solid rgba(255, 255, 255, .92);
        border-radius: 50%;
        background: rgba(16, 23, 19, .82) !important;
        box-shadow: 0 12px 32px rgba(0, 0, 0, .3);
        transition: transform .25s ease, background .25s ease;
    }

    body.single-partners .partner-video-box .video-icon::before {
        content: "";
        position: absolute;
        inset: -11px;
        border: 1px solid rgba(255, 255, 255, .68);
        border-radius: 50%;
        opacity: 0;
        transform: scale(.82);
        animation: shPartnerPlayPulse 2.6s cubic-bezier(.22,.61,.36,1) infinite;
        pointer-events: none;
    }

    body.single-partners .partner-video-box .video-icon::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 53%;
        transform: translate(-50%, -50%);
        width: 0;
        height: 0;
        border-top: 12px solid transparent;
        border-bottom: 12px solid transparent;
        border-left: 19px solid #fff;
    }

    body.single-partners .partner-video-box .play-icon span {
        display: inline-block;
        padding: 8px 13px;
        border-radius: 2px;
        background: rgba(16, 23, 19, .78);
        color: #fff !important;
        font-family: "Montserrat", sans-serif;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .15em;
        line-height: 1;
        text-transform: uppercase;
    }

    body.single-partners .partner-video-box:hover .video-icon,
    body.single-partners .partner-video-box .play-icon:focus-visible .video-icon {
        transform: scale(1.06);
        background: rgba(63, 89, 73, .96) !important;
        box-shadow: 0 15px 38px rgba(0, 0, 0, .34);
    }

    @keyframes shPartnerPlayPulse {
        0% { opacity: 0; transform: scale(.82); }
        28% { opacity: .68; }
        72%, 100% { opacity: 0; transform: scale(1.2); }
    }

    @media (prefers-reduced-motion: reduce) {
        body.single-partners .partner-video-box .video-icon::before { animation: none; }
        body.single-partners .partner-video-box .video-icon { transition: none; }
    }

    body.single-partners .partner-video-box.is-playing::before {
        display: none;
    }

    body.single-partners .partner-video-box iframe,
    body.single-partners .partner-video-box video {
        position: absolute;
        inset: 0;
        z-index: 3;
        width: 100%;
        height: 100%;
        border: 0;
    }

    @media (max-width: 767px) {
        body.single-partners .main-slider .carousel-inner,
        body.single-partners .main-slider .carousel-item,
        body.single-partners .main-slider .carousel-item img {
            height: 280px !important;
        }
    }
</style>


            <!-- Slider -->
            <div class="main-slider">
                
                <div class="carousel carousel-fade" data-partner-carousel data-interval="3000" id="carouselExampleIndicators">
                    <div class="carousel-inner">
                   <?php 
                    $images = get_field('slider');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $images ): ?>
   
                    <?php 
                     $i = 1;
                    foreach( $images as $image_id ): ?>
                    <?php
                          if($i == 1){
                          $class="active";
                          }else{
                          $class = "";
                          }

                        ?>

                         <div class="carousel-item <?php echo $class;?>">
                            <?php echo wp_get_attachment_image( $image_id, $size ); ?>

                        </div>
                        <?php $i++ ; endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button">
                        <span aria-hidden="true" class="carousel-control-prev-icon">
                        </span>
                        <span class="sr-only">
                            Previous
                        </span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button">
                        <span aria-hidden="true" class="carousel-control-next-icon">
                        </span>
                        <span class="sr-only">
                            Next
                        </span>
                    </a>
                </div>
            </div>

<!-- Partner intro -->
<div class="partner-intro-wrapper">
    <div class="row container text-left">
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-2">
            <div class="partner-logo">
                <img class="img-fluid intro-image" src="<?php the_field( 'partner_logo' ); ?>">
                <div class="partner-country-box">
                    <p class="partner-country"> <?php the_field( 'country' ); ?></p>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-8">
            <div class="partner-intro">
                <div class="title-header left-align center-align-mobile green-header">
                    <!--<h3><?php the_title(); ?></h3>-->
                    <h3><?php the_field( 'title' ); ?></h3>
                    <!--<p>Scince <?php the_field( 'year' ); ?></p>-->
                    <span class="long-line"></span>
                    <span class="short-line"></span>
                </div>
                <p><?php the_field( 'top_content' ); ?></p>
                
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<?php if ( '' !== $partner_video_embed_url ) : ?>
<!-- Partner Video -->
<div class="partner-video-wrapper">
    <div class="row container">
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-10">
            <div class="ytvideo partner-video-box partner-1-video" data-video-url="<?php echo esc_url( $partner_video_embed_url ); ?>" style="background-image:url('<?php echo esc_url( $partner_video_image ); ?>')">
                <div class="seo">
                    
                </div>
                <button type="button" class="play-icon" aria-label="Play partner video">
                    <i class="video-icon"></i>
                    <span>Play Now</span>
                </button>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<?php endif; ?>





<!-- Partner Detail -->
<div class="partner-detail-wrapper">
    <div class="row container">
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-10">
            <div class="partner-detail-layout<?php echo $catalogue_url ? ' has-catalogue' : ''; ?>">
                <div class="partner-detail">
                <p><?php the_field( 'bottom_content' ); ?></p>
                </div>
                <?php if ( $catalogue_url ) : ?>
                <div class="partner-catalogue-column">
                    <a class="partner-catalogue-link" href="<?php echo esc_url( $catalogue_url ); ?>" rel="noopener" target="_blank">
                        <img class="partner-catalogue-image" src="<?php echo esc_url( $catalogue_cover ); ?>" alt="<?php echo esc_attr( get_the_title() . ' catalogue cover' ); ?>">
                        <span class="partner-catalogue-label">Download Catalogue</span>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<div class="visit-partners-button">
<a class="btn btn-green" href="<?php the_field( 'website' ); ?>" target="_blank">Visit Website<i class="btn-arrow"></i></a>
</div>

<section class="partner-conversion-cta" aria-labelledby="partner-next-step-title" style="background:#3f5949;color:#fff;padding:52px 20px;margin-top:48px;text-align:center;">
  <div class="container">
    <h2 id="partner-next-step-title" style="color:#fff;margin-bottom:14px;">Need help selecting the right solution?</h2>
    <p style="max-width:720px;margin:0 auto 26px;text-align:center;color:#fff;">Speak with our specialists about specifications, availability and project suitability, or experience the range in person at our showroom.</p>
    <a href="<?php echo esc_url( home_url( '/request-a-quotation/' ) ); ?>" style="display:inline-block;background:#fff;color:#3f5949;padding:13px 24px;margin:6px;text-decoration:none;font-weight:600;border-radius:999px;text-align:center;" aria-label="Request a quotation for this product range">Request a Quotation</a>
    <a href="<?php echo esc_url( home_url( '/book-a-showroom-visit/' ) ); ?>" style="display:inline-block;border:2px solid #fff;color:#fff;padding:11px 24px;margin:6px;text-decoration:none;font-weight:600;border-radius:999px;text-align:center;" aria-label="Book a showroom visit to explore this range">Book a Showroom Visit</a>
  </div>
</section>
<?php get_footer(); ?>
<script type="text/javascript">

    (function () {
        var carousel = document.querySelector('[data-partner-carousel]');
        if (!carousel) return;

        var items = Array.prototype.slice.call(carousel.querySelectorAll('.carousel-item'));
        var previous = carousel.querySelector('.carousel-control-prev');
        var next = carousel.querySelector('.carousel-control-next');
        var interval = parseInt(carousel.getAttribute('data-interval'), 10) || 3000;
        var current = Math.max(0, items.findIndex(function (item) { return item.classList.contains('active'); }));
        var timer;

        function show(index) {
            current = (index + items.length) % items.length;
            items.forEach(function (item, itemIndex) {
                var active = itemIndex === current;
                item.classList.toggle('active', active);
                item.setAttribute('aria-hidden', active ? 'false' : 'true');
            });
        }

        function start() {
            window.clearInterval(timer);
            if (items.length > 1) {
                timer = window.setInterval(function () { show(current + 1); }, interval);
            }
        }

        if (previous) {
            previous.addEventListener('click', function (event) {
                event.preventDefault();
                show(current - 1);
                start();
            });
        }

        if (next) {
            next.addEventListener('click', function (event) {
                event.preventDefault();
                show(current + 1);
                start();
            });
        }

        if (items.length < 2) {
            if (previous) previous.hidden = true;
            if (next) next.hidden = true;
        }

        show(current);
        start();
    }());

// Partner video player: URL formats are normalized server-side before insertion.
    document.querySelectorAll('.ytvideo[data-video-url]').forEach(function (video) {
        video.addEventListener('click', function () {
            var source = video.getAttribute('data-video-url');
            if (!source || video.querySelector('iframe')) return;

            var player;
            if (/\.(mp4|webm|ogg)(?:\?|$)/i.test(source)) {
                player = document.createElement('video');
                player.src = source;
                player.controls = true;
                player.autoplay = true;
                player.playsInline = true;
                player.preload = 'metadata';
            } else {
                player = document.createElement('iframe');
                player.src = source;
                player.title = 'Partner video';
                player.allow = 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture';
                player.allowFullscreen = true;
            }
            video.classList.add('is-playing');
            video.replaceChildren(player);
        }, { once: true });
    });
</script>
