<?php

/*
 Template Name: Contact Page
*/

get_header();

$contact_map_embed = 'https://www.google.com/maps?q=Sanctuary%20Holdings%2C%20831%20Kotte%20Road%2C%20Ethul%20Kotte%2C%20Sri%20Lanka&output=embed';
$contact_map_url   = 'https://www.google.com/maps/search/?api=1&query=Sanctuary%20Holdings%20(Pvt)%20Ltd%2C%20831%20Kotte%20Road%2C%20Ethul%20Kotte%2C%20Sri%20Lanka';
$contact_map_video = 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/Untitled.mp4';
?>

<main class="sh-contact-page">
  <section class="sh-contact-hero" id="contact-start">
    <div class="sh-contact-hero__copy">
      <span>Get in Touch</span>
      <h1>Let&rsquo;s Begin Your Sanctuary Experience</h1>
      <p>Whether you are planning a private residence, boutique hotel, commercial project or a technical building solution, our team is ready to guide you from the first conversation to the final detail.</p>
      <div class="sh-contact-actions">
        <a href="/book-a-showroom-visit/">Book a Showroom Visit</a>
        <a href="tel:+94114331191">Speak to Our Team</a>
      </div>
    </div>
    <figure class="sh-contact-hero__media">
      <img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/2c00ee61ab7f3cc809cdf3edd120a6efc6914dff0555ac490857ce88d7b40e6e.png" alt="Sanctuary Holdings consultation with architectural plans and material samples" loading="eager" decoding="async" fetchpriority="high">
    </figure>
  </section>

  <section class="sh-contact-visit" id="visit-us">
    <div class="sh-contact-section-head">
      <span>Visit Us</span>
      <h2>Experience Sanctuary in Person</h2>
      <p>Our showroom is located in Ethul Kotte, where clients, designers and project teams can explore premium products, finishes and tailored solutions.</p>
    </div>

    <div class="sh-contact-visit__grid">
      <div class="sh-contact-details-card">
        <div>
          <span>Showroom</span>
          <p class="sh-contact-street">No. 831, Kotte Road</p>
          <p>Ethul Kotte, 10100, Sri Lanka</p>
        </div>
        <a href="tel:+94114331191">+94 114 331191</a>
        <a href="mailto:contact@sanctuaryholdings.lk">contact@sanctuaryholdings.lk</a>
        <div class="sh-contact-hours">
          <span>Opening Hours</span>
          <p><strong>Monday&ndash;Friday</strong><br>9.00am&ndash;5.00pm</p>
          <p><strong>Saturday</strong><br>9.00am&ndash;1.30pm</p>
        </div>
      </div>

      <div class="sh-contact-map-card" data-map-embed="<?php echo esc_url( $contact_map_embed ); ?>" data-map-video="<?php echo esc_url( $contact_map_video ); ?>">
        <div class="sh-map-zoom sh-map-video-intro" aria-hidden="true">
          <video class="sh-map-video" muted playsinline preload="none"></video>
          <div class="sh-map-video-vignette"></div>
        </div>
        <div class="sh-contact-map-frame" data-loaded="false"></div>
        <div class="sh-contact-map-footer">
          <span>Sanctuary Holdings (Pvt) Ltd</span>
          <a href="<?php echo esc_url( $contact_map_url ); ?>" target="_blank" rel="noopener">Open in Google Maps</a>
        </div>
      </div>
    </div>
  </section>

  <section class="sh-contact-enquiry" id="send-enquiry">
    <div class="sh-contact-section-head">
      <span>Send an Enquiry</span>
      <h2>Tell Us What You&rsquo;re Working On</h2>
      <p>Share a few details about your project and our team will connect you with the right division.</p>
    </div>

    <div class="sh-contact-form-shell">
      <?php echo do_shortcode( '[contact-form-7 id="82" title="Contact form"]' ); ?>
    </div>
  </section>

  <section class="sh-contact-final-cta">
    <span>Start with a Conversation</span>
    <h2>Your Project Deserves the Right Guidance</h2>
    <p>From elegant bathrooms to dependable building systems, Sanctuary brings together premium brands, technical knowledge and hands-on project support.</p>
    <a href="/book-a-showroom-visit/">Plan Your Visit</a>
  </section>
</main>
<style id="sh-contact-hours-style">
.sh-contact-hours { margin-top: 24px; padding-top: 22px; border-top: 1px solid rgba(63,89,73,.18); }
.sh-contact-hours > span { display:block; margin-bottom:12px; color:#3f5949; font-family:"montserratbold",sans-serif; font-size:10px; letter-spacing:.16em; text-transform:uppercase; }
.sh-contact-hours p { margin:0 0 10px; color:#52645a; font-size:14px; line-height:1.5; }
.sh-contact-hours p:last-child { margin-bottom:0; }
.sh-contact-hours strong { color:#3f5949; font-weight:600; }
</style>
<script type="application/ld+json">
<?php echo wp_json_encode( array(
  '@context' => 'https://schema.org',
  '@type' => 'HomeAndConstructionBusiness',
  '@id' => home_url( '/#showroom' ),
  'name' => 'Sanctuary Holdings (Pvt) Ltd',
  'url' => home_url( '/' ),
  'telephone' => '+94 11 433 1191',
  'email' => 'contact@sanctuaryholdings.lk',
  'hasMap' => $contact_map_url,
  'address' => array(
    '@type' => 'PostalAddress',
    'streetAddress' => '831 Kotte Road',
    'addressLocality' => 'Ethul Kotte',
    'postalCode' => '10100',
    'addressCountry' => 'LK',
  ),
  'openingHoursSpecification' => array(
    array(
      '@type' => 'OpeningHoursSpecification',
      'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
      'opens' => '09:00',
      'closes' => '17:00',
    ),
    array(
      '@type' => 'OpeningHoursSpecification',
      'dayOfWeek' => 'Saturday',
      'opens' => '09:00',
      'closes' => '13:30',
    ),
  ),
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var mapCard = document.querySelector('.sh-contact-map-card');
  if (!mapCard) return;
  var introVideo = mapCard.querySelector('.sh-map-video');
  var hasStarted = false;
  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function revealMap() {
    mapCard.classList.add('is-video-complete', 'is-map-live');
  }

  function loadMap() {
    var frame = mapCard.querySelector('.sh-contact-map-frame');
    if (!frame || frame.dataset.loaded === 'true') return;

    var iframe = document.createElement('iframe');
    iframe.title = 'Sanctuary Holdings Google Maps location';
    iframe.src = mapCard.dataset.mapEmbed;
    iframe.loading = 'lazy';
    iframe.referrerPolicy = 'no-referrer-when-downgrade';
    iframe.allowFullscreen = true;
    iframe.setAttribute('style', 'border:0;');
    frame.innerHTML = '';
    frame.appendChild(iframe);
    frame.dataset.loaded = 'true';
  }

  function finishExperience() {
    loadMap();
    revealMap();
  }

  function startMapExperience() {
    if (hasStarted) return;
    hasStarted = true;
    mapCard.classList.add('is-map-started');

    if (prefersReducedMotion || !introVideo) {
      finishExperience();
      return;
    }

    if (!introVideo.querySelector('source')) {
      var source = document.createElement('source');
      source.src = mapCard.dataset.mapVideo;
      source.type = 'video/mp4';
      introVideo.appendChild(source);
      introVideo.load();
    }

    introVideo.addEventListener('ended', finishExperience, { once: true });
    introVideo.addEventListener('error', finishExperience, { once: true });
    introVideo.play().catch(function () {
      window.setTimeout(finishExperience, 1400);
    });

    window.setTimeout(finishExperience, window.matchMedia('(max-width: 767px)').matches ? 5200 : 7200);
  }

  if ('IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          startMapExperience();
          observer.disconnect();
        }
      });
    }, {
      threshold: 0.24,
      rootMargin: '0px 0px -12% 0px'
    });
    observer.observe(mapCard);
  } else {
    window.addEventListener('scroll', function onScroll() {
      var rect = mapCard.getBoundingClientRect();
      if (rect.top < window.innerHeight * 0.72 && rect.bottom > 0) {
        startMapExperience();
        window.removeEventListener('scroll', onScroll);
      }
    }, { passive: true });
  }
});
</script>

<?php get_footer(); ?>
