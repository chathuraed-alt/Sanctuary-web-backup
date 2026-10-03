<?php /* Template Name: News Page */ get_header(); ?>

<h1 class="sr-only"><?php the_title(); ?></h1>

<style id="sh-bento-news-styles">
  .sh-bento-section {
    --sh-bento-forest: #1f362c;
    --sh-bento-green: #2d4538;
    --sh-bento-paper: #f8f5ee;
    --sh-bento-gold: #c5a880;
    --sh-bento-card: #fff;
    --sh-bento-border: rgba(45, 69, 56, .12);
    --sh-bento-text: #141816;
    --sh-bento-muted: #5c6c64;
    background: var(--sh-bento-paper);
    color: var(--sh-bento-text);
    margin-top: 173px;
    padding: 32px 0 clamp(34px, 5vw, 76px);
    overflow: hidden;
  }
  .sh-bento-section *, .sh-bento-section *::before, .sh-bento-section *::after { box-sizing: border-box; }
  .sh-bento-container { width: min(1320px, calc(100% - 48px)); margin: 0 auto; }
  .sh-bento-grid { display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(360px, .9fr); grid-template-rows: auto auto; gap: 22px; align-items: stretch; }
  .sh-bento-card { border: 1px solid var(--sh-bento-border); border-radius: 22px; background: var(--sh-bento-card); box-shadow: 0 5px 18px rgba(20,36,28,.035); transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease; }
  .sh-bento-featured:hover, .sh-bento-featured:focus-within, .sh-bento-subcard:hover, .sh-bento-subcard:focus-within { transform: translateY(-4px); box-shadow: 0 14px 32px rgba(20,36,28,.08); border-color: rgba(45,69,56,.22); }
  a.sh-bento-card { color: inherit; text-decoration: none; }
  a.sh-bento-card:hover, a.sh-bento-card:focus-visible { color: inherit; text-decoration: none; transform: translateY(-4px); box-shadow: 0 14px 32px rgba(20,36,28,.08); border-color: rgba(45,69,56,.22); }
  a.sh-bento-card:focus-visible, .sh-bento-btn:focus-visible { outline: 3px solid var(--sh-bento-gold); outline-offset: 4px; }
  .sh-bento-intro { grid-column: 1; grid-row: 1; padding: clamp(34px, 4.2vw, 70px); background: linear-gradient(145deg, #fff 0%, #faf7f0 100%); position: relative; overflow: hidden; }
  .sh-bento-intro::after { content: ""; position: absolute; width: 180px; height: 180px; right: -80px; bottom: -92px; border: 1px solid rgba(197,168,128,.34); border-radius: 50%; }
  .sh-bento-badge { display: inline-flex; align-items: center; gap: 9px; margin-bottom: 24px; color: #80694a; font: 600 11px/1.2 "Montserrat", "DM Sans", Arial, sans-serif; letter-spacing: .16em; text-transform: uppercase; }
  .sh-bento-badge::before { content: ""; width: 7px; height: 7px; border-radius: 50%; background: var(--sh-bento-gold); box-shadow: 0 0 0 5px rgba(197,168,128,.15); }
  .sh-bento-title { max-width: 740px; margin: 0; color: var(--sh-bento-forest); font-family: "Italiana", "Cormorant Garamond", Georgia, serif; font-size: clamp(42px, 4.35vw, 70px); font-weight: 400; line-height: .98; letter-spacing: -.025em; }
  .sh-bento-title em { color: #755f43; font-style: italic; }
  .sh-bento-desc { max-width: 620px; margin: 26px 0 0; color: var(--sh-bento-muted); font: 400 clamp(15px, 1.15vw, 18px)/1.75 "Montserrat", "DM Sans", Arial, sans-serif; }
  .sh-bento-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 32px; }
  .sh-bento-btn { display: inline-flex; min-height: 46px; align-items: center; justify-content: center; padding: 12px 23px; border: 1px solid var(--sh-bento-green); border-radius: 999px; font: 600 11px/1.2 "Montserrat", "DM Sans", Arial, sans-serif; letter-spacing: .11em; text-transform: uppercase; transition: background .24s ease, color .24s ease, transform .24s ease; }
  .sh-bento-section .sh-bento-btn-primary { background: var(--sh-bento-green) !important; color: #fff !important; }
  .sh-bento-section .sh-bento-btn-primary:hover { background: var(--sh-bento-forest) !important; color: #fff !important; transform: translateY(-2px); }
  .sh-bento-section .sh-bento-btn-outline { background: transparent !important; color: var(--sh-bento-green) !important; }
  .sh-bento-section .sh-bento-btn-outline:hover { background: rgba(45,69,56,.06) !important; color: var(--sh-bento-forest) !important; transform: translateY(-2px); }
  .sh-bento-featured { grid-column: 2; grid-row: 1 / span 2; min-height: 690px; display: flex; flex-direction: column; overflow: hidden; background: var(--sh-bento-forest); color: #fff !important; }
  .sh-featured-img-wrap { position: relative; min-height: 360px; flex: 1 1 54%; overflow: hidden; background: #d9d4ca; }
  .sh-featured-img-wrap::after { content: ""; position: absolute; inset: 0; background: linear-gradient(180deg, rgba(19,35,28,.02) 35%, rgba(19,35,28,.42) 100%); pointer-events: none; }
  .sh-featured-img-wrap img, .sh-subcard-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .7s cubic-bezier(.2,.65,.3,1); }
  .sh-bento-featured:hover img, .sh-bento-featured:focus-visible img, .sh-bento-subcard:hover img, .sh-bento-subcard:focus-visible img { transform: scale(1.04); }
  .sh-featured-chip { position: absolute; z-index: 2; top: 20px; left: 20px; display: inline-flex; align-items: center; gap: 8px; padding: 9px 12px; border: 1px solid rgba(255,255,255,.38); background: rgba(20,36,28,.48); color: #fff; -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px); font: 600 10px/1 "Montserrat", "DM Sans", Arial, sans-serif; letter-spacing: .13em; text-transform: uppercase; }
  .sh-featured-chip::before { content: ""; width: 6px; height: 6px; border-radius: 50%; background: var(--sh-bento-gold); box-shadow: 0 0 0 4px rgba(197,168,128,.18); }
  .sh-featured-content { flex: 0 0 auto; display: flex; flex-direction: column; justify-content: space-between; gap: 24px; padding: clamp(28px, 3vw, 44px); background: #3f5949; }
  .sh-featured-meta { color: #d7c6ad; font: 600 10px/1.4 "Montserrat", "DM Sans", Arial, sans-serif; letter-spacing: .13em; text-transform: uppercase; }
  .sh-featured-title { margin: 14px 0 14px; color: #fff; font-family: "Italiana", "Cormorant Garamond", Georgia, serif; font-size: clamp(31px, 2.5vw, 45px); font-weight: 400; line-height: 1.08; letter-spacing: -.02em; }
  .sh-bento-section .sh-featured-excerpt { margin: 0; color: rgba(255,255,255,.82) !important; font: 400 14px/1.7 "Montserrat", "DM Sans", Arial, sans-serif; }
  .sh-featured-link { display: inline-flex; align-items: center; gap: 10px; color: #fff; font: 600 11px/1.2 "Montserrat", "DM Sans", Arial, sans-serif; letter-spacing: .12em; text-transform: uppercase; }
  .sh-featured-link svg { transition: transform .24s ease; }
  .sh-bento-featured:hover .sh-featured-link svg, .sh-bento-featured:focus-visible .sh-featured-link svg { transform: translateX(5px); }
  .sh-bento-subcard { grid-column: 1; grid-row: 2; display: grid; grid-template-columns: 150px minmax(0,1fr); gap: 24px; align-items: center; padding: 24px; overflow: hidden; }
  .sh-subcard-thumb { width: 150px; aspect-ratio: 1 / 1; overflow: hidden; background: #ddd5c8; }
  .sh-subcard-tag { color: #80694a; font: 600 10px/1.2 "Montserrat", "DM Sans", Arial, sans-serif; letter-spacing: .14em; text-transform: uppercase; }
  .sh-subcard-title { margin: 9px 0 8px; color: var(--sh-bento-forest); font-family: "Italiana", "Cormorant Garamond", Georgia, serif; font-size: clamp(26px, 2.15vw, 36px); font-weight: 400; line-height: 1.1; }
  .sh-subcard-desc { margin: 0; color: var(--sh-bento-muted); font: 400 13px/1.65 "Montserrat", "DM Sans", Arial, sans-serif; }
  @media (prefers-reduced-motion: reduce) { .sh-bento-section *, .sh-bento-section *::before, .sh-bento-section *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; animation-duration: .01ms !important; } }
  @media (max-width: 991px) {
    .sh-bento-section { margin-top: 155px; }
    .sh-bento-container { width: min(760px, calc(100% - 36px)); }
    .sh-bento-grid { grid-template-columns: 1fr; grid-template-rows: auto; }
    .sh-bento-intro, .sh-bento-featured, .sh-bento-subcard { grid-column: 1; grid-row: auto; }
    .sh-bento-featured { min-height: 0; }
    .sh-featured-img-wrap { min-height: 430px; }
  }
  @media (max-width: 600px) {
    .sh-bento-section { margin-top: 155px; padding: 24px 0 36px; }
    .sh-bento-container { width: calc(100% - 24px); }
    .sh-bento-grid { gap: 14px; }
    .sh-bento-intro { padding: 30px 22px; }
    .sh-bento-title { font-size: clamp(38px, 12vw, 52px); }
    .sh-bento-desc { margin-top: 20px; line-height: 1.65; }
    .sh-bento-actions { display: grid; grid-template-columns: 1fr; margin-top: 25px; }
    .sh-bento-btn { width: 100%; min-height: 48px; }
    .sh-featured-img-wrap { min-height: 300px; }
    .sh-featured-content { padding: 27px 22px 30px; }
    .sh-bento-subcard { grid-template-columns: 104px minmax(0,1fr); gap: 16px; padding: 18px; }
    .sh-subcard-thumb { width: 104px; }
    .sh-subcard-desc { display: none; }
  }
</style>

<section class="sh-bento-section" aria-labelledby="sh-bento-heading">
  <div class="sh-bento-container">
    <div class="sh-bento-grid">
      <header class="sh-bento-card sh-bento-intro">
        <div class="sh-bento-badge">The Sanctuary Pressroom</div>
        <h2 class="sh-bento-title" id="sh-bento-heading">Elevating Architecture Through <em>Design &amp; Craft</em></h2>
        <p class="sh-bento-desc">Curated dispatches on global brand partnerships, landmark project completions across Sri Lanka and the Maldives, and architectural solution milestones.</p>
        <div class="sh-bento-actions" aria-label="News actions">
          <a href="#sh-news-archive" class="sh-bento-btn sh-bento-btn-primary">Browse All Dispatches</a>
          <a href="#newsletter" class="sh-bento-btn sh-bento-btn-outline">Subscribe to Journal</a>
        </div>
      </header>

      <article class="sh-bento-card sh-bento-featured">
        <a href="https://sanctuaryholdings.lk/news/sanctuary-holdings-introduces-asi-sri-lanka-maldives/" aria-label="Read Sanctuary Holdings Introduces ASI to Sri Lanka and Maldives" style="display:flex;flex-direction:column;min-height:100%;color:inherit;text-decoration:none;">
          <div class="sh-featured-img-wrap">
            <img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/07/asi-piatto-commercial-washroom-hero.jpg" alt="ASI Piatto commercial washroom interior" width="1920" height="840" fetchpriority="high" decoding="async">
            <span class="sh-featured-chip">Featured Milestone</span>
          </div>
          <div class="sh-featured-content">
            <div>
              <div class="sh-featured-meta"><time datetime="2026-07-14">July 14, 2026</time> &bull; Commercial Solutions</div>
              <h3 class="sh-featured-title">Sanctuary Holdings Introduces ASI to Sri Lanka and Maldives</h3>
              <p class="sh-featured-excerpt">Introducing American Specialties, Inc. to Sri Lanka and the Maldives, with commercial washroom accessories, partitions, lockers and integrated building products for hospitality, commercial and public environments.</p>
            </div>
            <span class="sh-featured-link">Read Press Release <svg aria-hidden="true" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
          </div>
        </a>
      </article>

      <article class="sh-bento-card sh-bento-subcard">
        <a href="https://sanctuaryholdings.lk/news/sanctuary-holdings-uga-ghiri-ella-bathroom-fittings/" aria-label="Read Sanctuary Holdings Supplies Bathroom Fittings for Uga Ghiri – Ella" style="display:contents;color:inherit;text-decoration:none;">
          <div class="sh-subcard-thumb"><img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/07/sanctuary-uga-hero_exterior-1.jpg" alt="Uga Ghiri – Ella luxury resort exterior" width="1920" height="750" loading="lazy" decoding="async"></div>
          <div>
            <span class="sh-subcard-tag">Hospitality Project &bull; <time datetime="2026-07-06">July 6, 2026</time></span>
            <h3 class="sh-subcard-title">Supplying Bathroom Fittings for Uga Ghiri – Ella</h3>
            <p class="sh-subcard-desc">Bathroom fittings for Uga Resorts’ luxury boutique hotel in Sri Lanka’s hill country, continuing Sanctuary’s work across the Uga portfolio.</p>
          </div>
        </a>
      </article>
    </div>
  </div>
</section>

<div class="news-intro-wrapper" id="sh-news-archive">
  <div class="row container text-center">
    <div class="col-md-1"></div><div class="col-xs-12 col-md-10"><div class="news-intro"><div class="title-header center-align center-align-mobile green-header"><h3>Latest News</h3><span class="long-line"></span><span class="short-line"></span></div></div></div><div class="col-md-1"></div>
  </div>
</div>

<div class="news-list-wrapper">
<?php
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array( 'post_type' => 'news', 'post_status' => 'publish', 'orderby' => 'date', 'posts_per_page' => 4, 'order' => 'DESC', 'paged' => $paged );
  $query = new WP_Query( $args );
  $i = 1; $count = 0;
  while ( $query->have_posts() ) : $query->the_post();
    $class = ( $i % 2 === 0 ) ? 'even' : 'odd';
?>
  <div class="<?php echo esc_attr( $class ); ?>">
    <div class="row container text-left"><div class="col-xs-12 col-md-1"></div><div class="col-xs-12 col-md-10"><div class="news-outer-wrapper">
      <div class="news-img-wrapper <?php echo ( ++$count % 2 ? 'left-side' : 'right-side' ); ?>"><div class="news-image"><?php $featured_img_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?><img alt="<?php echo esc_attr( get_the_title() . ' - Sanctuary Holdings news' ); ?>" class="img-fluid intro-image" src="<?php echo esc_url( $featured_img_url ); ?>" loading="lazy" decoding="async"></div></div>
      <div class="news-c-wrapper"><div class="news-detail-intro"><div class="title-header left-align green-header"><h4><?php the_title(); ?></h4></div><span class="news-card-meta"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span><?php $news_excerpt = get_the_excerpt(); if ( empty( $news_excerpt ) ) { $news_excerpt = wp_strip_all_tags( strip_shortcodes( get_the_content() ) ); } ?><p><?php echo esc_html( wp_trim_words( $news_excerpt, 46, '...' ) ); ?></p><a class="btn btn-green" href="<?php echo esc_url( get_post_permalink() ); ?>">Read More<i class="btn-arrow"></i></a></div></div>
    </div></div><div class="col-xs-12 col-md-1"></div></div>
  </div>
<?php $i++; endwhile; wp_reset_postdata(); ?>
  <div class="pagination-wrapper"><?php if ( function_exists( 'pagination' ) ) { pagination( $query->max_num_pages ); } ?></div>
  <div class="subscreption-wrapper" id="newsletter"><div class="news-letter"><form><div class="form-group"><label class="sr-only" for="email-input">Email address</label><input type="email" class="form-control" id="email-input" aria-describedby="emailHelp" placeholder="Enter your email address to get latest news"><button type="submit" class="btn btn-green">SUBSCRIBE<i class="btn-arrow"></i></button></div></form></div></div>
</div>

<?php get_footer(); ?>
