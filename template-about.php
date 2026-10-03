<?php
/*
 Template Name: About Us
*/

get_header();

$theme_root = THEMEROOT;

$brand_logos = array(
    array( 'name' => 'Paffoni', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/paffoni-clean-white.png' ),
    array( 'name' => 'Bathco', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/bathco-white.png' ),
    array( 'name' => 'Creavit', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/creavit-white.png' ),
    array( 'name' => 'Fima | Carlo Frattini', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/fima-white.png' ),
    array( 'name' => 'Victoria + Albert', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/vanda-white.png' ),
    array( 'name' => 'Kreiner', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/kreiner-white.png' ),
    array( 'name' => 'Sloan', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sloan-white.png' ),
    array( 'name' => 'Gemake', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/gemake-white.png' ),
    array( 'name' => 'Rheem', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/05/rheem-clean-white-wordmark.png' ),
    array( 'name' => 'BLE', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/ble-white.png' ),
    array( 'name' => 'Tsurami', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/tsurami-white.png' ),
    array( 'name' => 'Zenit', 'src' => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/zenit-white.png' ),
);

$numbers = array(
    array( 'value' => 80, 'label' => 'Residential', 'note' => 'Private homes and villas' ),
    array( 'value' => 12, 'label' => 'Apartments', 'note' => 'Multi-unit developments' ),
    array( 'value' => 7, 'label' => 'Government', 'note' => 'Public sector requirements' ),
    array( 'value' => 35, 'label' => 'Hotels', 'note' => 'Hospitality and boutique stays' ),
    array( 'value' => 5, 'label' => 'Other', 'note' => 'Commercial and specialist work' ),
);

$team = array(
    array(
        'name' => 'Susantha Nanayakkara',
        'role' => 'Joint Managing Director',
        'image' => '/wp-content/uploads/2022/11/Susantha.jpg',
        'copy' => 'Industry leadership shaped by experience, guidance, and long-term client trust.',
    ),
    array(
        'name' => 'Chatura Dharmaratne',
        'role' => 'Joint Managing Director',
        'image' => '/wp-content/uploads/2022/11/Director-Chathura.png',
        'copy' => 'Operational direction focused on growth, consistency, and dependable delivery.',
    ),
    array(
        'name' => 'Sanjeewa Gamage',
        'role' => 'Head of Engineering',
        'image' => '/wp-content/uploads/2022/11/Sanjeewa.jpg',
        'copy' => 'Technical oversight across engineering, maintenance, and after-sales support.',
    ),
    array(
        'name' => 'Ajith Senaratne',
        'role' => 'Division Head - Fire & Pumps',
        'image' => '/wp-content/uploads/2022/11/Ajith.jpg',
        'copy' => 'Specialist guidance for pumps, fire doors, and fire curtain solutions.',
    ),
);
?>

<main class="sh-about-v2" id="main-content">
    <section class="sh-about-hero" aria-labelledby="about-hero-title">
        <div class="sh-about-hero__copy">
            <span class="sh-about-eyebrow">About Sanctuary</span>
            <h1 id="about-hero-title">Built Around Better Spaces</h1>
            <p>Sanctuary Holdings was created with a clear purpose &mdash; to bring thoughtfully selected global solutions into Sri Lankan homes, hotels, developments, and commercial spaces. From refined bathware to dependable technical systems, we help clients shape spaces that feel considered from the very beginning.</p>
        </div>
        <figure class="sh-about-hero__image">
            <img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/FDB1E784-502B-4984-AA3D-2757B43A3F43.png" alt="Sanctuary Holdings team discussing a premium bathroom project" loading="eager" decoding="async" fetchpriority="high">
        </figure>
    </section>

    <section class="sh-about-section sh-about-story" aria-labelledby="about-story-title">
        <div class="sh-about-story__grid">
            <div class="sh-about-prose">
                <span class="sh-about-eyebrow">Our Story</span>
                <h2 id="about-story-title">A Company Shaped by Design, Detail, and Trust</h2>
                <p>Since commencing operations in 2017, Sanctuary Holdings has grown with a focus on supplying and supporting high-end designer bathware, fittings, hot water solutions, plumbing services, pumps, and fire safety systems. What began as a response to a gap in the market has evolved into a multi-disciplinary offering built around quality, reliability, and long-term project support.</p>
                <p>We work with globally respected brands, many of which were previously not easily accessible in the region, and bring them together with local expertise, technical understanding, and a practical approach to project delivery.</p>
            </div>
            <figure class="sh-about-image-card">
                <img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/2c00ee61ab7f3cc809cdf3edd120a6efc6914dff0555ac490857ce88d7b40e6e.png" alt="Architectural planning table with material samples for a Sanctuary project" loading="lazy" decoding="async">
            </figure>
        </div>
    </section>

    <section class="sh-about-section sh-about-process" aria-labelledby="about-work-title">
        <div class="sh-about-section__head sh-about-section__head--center">
            <span class="sh-about-eyebrow">How We Work</span>
            <h2 id="about-work-title">Involved From First Thought to Final Detail</h2>
            <p>Our work often begins long before products are selected. We support clients, designers, architects, contractors, and developers from the early planning stages, helping shape the right solutions for the space, the scale, and the intended experience.</p>
        </div>
        <div class="sh-about-process__grid">
            <article>
                <span>01</span>
                <h3>Early Design Input</h3>
                <p>We get involved at the concept and planning stage, helping clients and professionals understand what is possible before decisions become fixed.</p>
            </article>
            <article>
                <span>02</span>
                <h3>Solution Selection</h3>
                <p>We guide product and system selection based on design intent, site conditions, usage, performance requirements, and budget expectations.</p>
            </article>
            <article>
                <span>03</span>
                <h3>Project Coordination</h3>
                <p>We work alongside project teams to support specifications, supply timelines, technical requirements, and installation coordination.</p>
            </article>
            <article>
                <span>04</span>
                <h3>Completion Support</h3>
                <p>Our involvement continues through handover and end use, ensuring the final result performs as beautifully as it looks.</p>
            </article>
        </div>
    </section>

    <section class="sh-about-numbers" aria-labelledby="about-numbers-title">
        <div class="sh-about-numbers__intro">
            <span class="sh-about-eyebrow">Our Numbers</span>
            <h2 id="about-numbers-title">A Track Record Across Real Projects</h2>
            <p>A more refined view of the original project counters, showing the spaces Sanctuary has supported across residential, hospitality, government, and specialist environments.</p>
        </div>
        <div class="sh-about-numbers__grid">
            <?php foreach ( $numbers as $number ) : ?>
                <article>
                    <strong class="sh-about-count" data-count="<?php echo esc_attr( $number['value'] ); ?>"><?php echo esc_html( $number['value'] ); ?>+</strong>
                    <span><?php echo esc_html( $number['label'] ); ?></span>
                    <p><?php echo esc_html( $number['note'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="sh-about-section sh-about-expertise" aria-labelledby="about-expertise-title">
        <div class="sh-about-section__head">
            <span class="sh-about-eyebrow">Our Expertise</span>
            <h2 id="about-expertise-title">More Than Products. Complete Project Support.</h2>
            <p>Sanctuary brings together multiple areas of expertise under one considered approach. Each division serves a different purpose, but together they allow us to support projects with a broader understanding of design, comfort, safety, and performance.</p>
        </div>
        <div class="sh-about-expertise__list">
            <article>
                <span>Designer Bathware</span>
                <p>Curated sanitaryware, bathtubs, brassware, basins, accessories, and bathroom solutions from premium international brands, selected for projects where design and quality matter.</p>
            </article>
            <article>
                <span>Hot Water Solutions</span>
                <p>From simple domestic water heaters to advanced systems using heat pumps, solar, gas boilers, and hybrid configurations, we support both residential and larger-scale project requirements.</p>
            </article>
            <article>
                <span>Plumbing Services</span>
                <p>Professional service support for water systems, installations, repairs, renovations, and project-based requirements where dependable execution is essential.</p>
            </article>
            <article>
                <span>Pumps, Fire &amp; Smoke Curtains</span>
                <p>Reliable pump solutions and advanced fire and smoke curtain systems designed to support building performance, safety, and technical protection.</p>
            </article>
        </div>
    </section>

    <section class="sh-about-partners" aria-labelledby="about-partners-title">
        <div class="sh-about-section__head sh-about-section__head--center sh-about-light">
            <span class="sh-about-eyebrow">Our Partners</span>
            <h2 id="about-partners-title">Global Brands, Carefully Represented</h2>
            <p>The brands we represent are selected for their design value, engineering quality, and international reputation. As the exclusive regional agent for many of our partner brands, Sanctuary gives clients access to premium solutions supported by local knowledge and project experience.</p>
        </div>
        <div class="sh-about-logo-grid">
            <?php foreach ( $brand_logos as $brand_logo ) : ?>
                <div class="sh-about-logo-card">
                    <img src="<?php echo esc_url( $brand_logo['src'] ); ?>" alt="<?php echo esc_attr( $brand_logo['name'] . ' logo' ); ?>" loading="lazy" decoding="async">
                </div>
            <?php endforeach; ?>
        </div>
        <a class="sh-about-text-link" href="/partners/">Explore all partner brands</a>
    </section>

    <section class="sh-about-section sh-about-project-thinking" aria-labelledby="about-project-title">
        <div class="sh-about-section__head sh-about-section__head--center">
            <span class="sh-about-eyebrow">Project Approach</span>
            <h2 id="about-project-title">Designed for Real Spaces, Not Just Showrooms</h2>
            <p>Every project comes with its own context &mdash; the people using it, the environment it sits within, the technical demands behind the walls, and the feeling the finished space should create.</p>
        </div>
        <div class="sh-about-project-thinking__grid">
            <article>
                <img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/07/sanctuary-uga-villa_interior-1.jpg" alt="Residential villa interior featuring Sanctuary Holdings design and fittings" loading="lazy" decoding="async">
                <h3>Residential Spaces</h3>
                <p>For homes and apartments, we focus on comfort, durability, and design choices that feel personal and lasting.</p>
            </article>
            <article>
                <img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/07/sanctuary-uga-bathroom-1.jpg" alt="Hospitality bathroom project supported by Sanctuary Holdings" loading="lazy" decoding="async">
                <h3>Hospitality Projects</h3>
                <p>For hotels, resorts, and boutique developments, we support solutions that elevate guest experience while meeting project standards.</p>
            </article>
            <article>
                <img src="https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-range-pumpsFireCurtains-1.png" alt="Pumps and fire curtain systems supplied by Sanctuary Holdings" loading="lazy" decoding="async">
                <h3>Commercial &amp; Technical Spaces</h3>
                <p>For larger projects, we bring together product knowledge, coordination, and technical systems that support dependable long-term use.</p>
            </article>
        </div>
    </section>

    <section class="sh-about-section sh-about-team" aria-labelledby="about-team-title">
        <div class="sh-about-section__head">
            <span class="sh-about-eyebrow">The People Behind Sanctuary</span>
            <h2 id="about-team-title">A Team Built on Experience and Involvement</h2>
            <p>Behind Sanctuary is a team that stays closely connected to the work &mdash; from client conversations and design discussions to site coordination and final delivery. This hands-on approach allows us to understand each project more clearly and support it with greater care.</p>
        </div>
        <div class="sh-about-team__grid">
            <?php foreach ( $team as $member ) : ?>
                <article>
                    <img src="<?php echo esc_url( $member['image'] ); ?>" alt="<?php echo esc_attr( $member['name'] ); ?>" loading="lazy" decoding="async">
                    <div>
                        <span><?php echo esc_html( $member['role'] ); ?></span>
                        <h3><?php echo esc_html( $member['name'] ); ?></h3>
                        <p><?php echo esc_html( $member['copy'] ); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="sh-about-section sh-about-why" aria-labelledby="about-why-title">
        <div class="sh-about-section__head sh-about-section__head--center">
            <span class="sh-about-eyebrow">Why Sanctuary</span>
            <h2 id="about-why-title">Considered Support at Every Stage</h2>
            <p>Choosing Sanctuary means working with a team that understands both the visible and invisible parts of a project &mdash; the finishes people see, the systems they rely on, and the decisions that shape the final experience.</p>
        </div>
        <div class="sh-about-why__grid">
            <article>
                <h3>Design-Led Thinking</h3>
                <p>We help clients make choices that support the overall look, feel, and function of each space.</p>
            </article>
            <article>
                <h3>Exclusive Global Access</h3>
                <p>Our portfolio brings internationally respected brands into the local market with proper representation and support.</p>
            </article>
            <article>
                <h3>Technical Understanding</h3>
                <p>From water systems to fire safety solutions, we consider the performance behind the design.</p>
            </article>
            <article>
                <h3>End-to-End Involvement</h3>
                <p>We remain involved from early planning through completion, helping each stage feel more structured and dependable.</p>
            </article>
        </div>
    </section>

    <section class="sh-about-final-cta" aria-labelledby="about-cta-title">
        <span class="sh-about-eyebrow">Start with Sanctuary</span>
        <h2 id="about-cta-title">Let&rsquo;s Shape Something Considered</h2>
        <p>Whether you are planning a private residence, boutique hotel, commercial space, or technical building requirement, our team is ready to help you explore the right solutions from the beginning.</p>
        <div class="sh-about-actions">
            <a class="sh-about-btn sh-about-btn--light" href="/contact/">Get in Touch</a>
            <a class="sh-about-btn sh-about-btn--outline" href="/partners/">Explore Our Partners</a>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var counters = document.querySelectorAll('.sh-about-count');
    if (!counters.length) {
        return;
    }

    var animateCounter = function (counter) {
        var target = parseInt(counter.getAttribute('data-count'), 10) || 0;
        var start = null;
        var duration = 1200;

        var tick = function (timestamp) {
            if (!start) {
                start = timestamp;
            }
            var progress = Math.min((timestamp - start) / duration, 1);
            counter.textContent = Math.floor(progress * target) + '+';
            if (progress < 1) {
                window.requestAnimationFrame(tick);
            }
        };

        window.requestAnimationFrame(tick);
    };

    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.45 });

        counters.forEach(function (counter) {
            observer.observe(counter);
        });
        return;
    }

    counters.forEach(animateCounter);
});
</script>

<?php get_footer(); ?>
