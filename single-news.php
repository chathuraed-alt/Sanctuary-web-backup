<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php if ( 'sanctuary-introduces-delabie-sri-lanka-maldives' === get_post_field( 'post_name', get_the_ID() ) ) : ?>
  <?php the_field( 'news_content' ); ?>
<?php else : ?>
  <h1 class="sr-only"><?php the_title(); ?></h1>
  <div class="news-detail-page">
    <div class="main-banner">
      <img class="img-fluid intro-image" src="<?php the_field( 'top_banner' ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
    </div>
    <div class="news-content-wrapper">
      <div class="container text-left">
        <div class="col-xs-12">
          <div class="title-header center-align center-align-mobile green-header">
            <h3><?php the_title(); ?></h3>
            <span class="long-line"></span><span class="short-line"></span>
          </div>
          <div class="news-content"><?php the_field( 'news_content' ); ?></div>
        </div>
      </div>
    </div>
    <div class="news-slider-wrapper">
      <div class="row container">
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-10">
          <div class="project-slider">
            <div class="carousel slide carousel-fade" data-ride="carousel" id="carouselExampleIndicators">
              <?php $images = get_field( 'gallery' ); if ( $images ) : ?>
                <div class="carousel-inner">
                  <?php $i = 1; foreach ( $images as $image ) : ?>
                    <div class="carousel-item <?php echo ( 1 === $i ) ? 'active' : ''; ?>">
                      <img alt="<?php echo esc_attr( $image['alt'] ?: get_the_title() ); ?>" class="d-block w-100" src="<?php echo esc_url( $image['url'] ); ?>">
                    </div>
                  <?php $i++; endforeach; ?>
                </div>
              <?php endif; ?>
              <a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a>
              <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
