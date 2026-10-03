<?php
/*
 Template Name: Partners Page
*/

get_header();

$partner_divisions = array(
    array(
        'eyebrow' => 'Designer Bathware',
        'title' => 'Designer Bathware Partners',
        'description' => 'A curated selection of international bathware brands offering refined design, premium finishes and exceptional flexibility for luxury bathrooms.',
        'url' => home_url('/partners/designer-bathware/'),
        'brands' => array('Paffoni', 'Bathco', 'Creavit', 'Fima | Carlo Frattini', 'THG Paris', 'Kreiner', 'Perrin & Rowe', 'Sanibano', 'Sloan', 'Valvex', 'Victoria + Albert', 'Cosmic', 'Alice'),
    ),
    array(
        'eyebrow' => 'Hot Water Solutions',
        'title' => 'Hot Water Solution Partners',
        'description' => 'From simple water heaters to advanced heat pump, solar and hybrid systems, our partner brands support reliable solutions across every scale.',
        'url' => home_url('/partners/hot-water-solutions/'),
        'brands' => array('Gemake', 'Nulite', 'Rheem'),
    ),
    array(
        'eyebrow' => 'Pumps & Fire Curtains',
        'title' => 'Pumps & Fire Safety Partners',
        'description' => 'Specialist partner brands supporting water movement, fire protection and smoke control systems for residential, commercial and project environments.',
        'url' => home_url('/partners/pumps-fire-curtains/'),
        'brands' => array('DP Pumps', 'Tsurami', 'Matra', 'Kent', 'Elbi of America', 'BLE', 'B METERS', 'ZENIT', 'Stardart'),
    ),
);
?>

<main class="sh-partners-overview" id="main-content">
    <section class="sh-partners-overview-hero" aria-labelledby="sh-partners-overview-title">
        <div class="sh-partners-overview-hero__copy">
            <span class="sh-partners-overview-eyebrow">Our Partners</span>
            <h1 id="sh-partners-overview-title">Explore Sanctuary Partner Divisions</h1>
            <p>Discover the global brands Sanctuary represents across designer bathware, hot water solutions, pumps, and fire safety systems.</p>
            <a class="sh-partners-overview-button" href="#partner-divisions">View Divisions</a>
        </div>
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
    </section>

    <section class="sh-partners-overview-intro">
        <span class="sh-partners-overview-eyebrow">Partner Network</span>
        <h2>Choose the division that matches your project.</h2>
        <p>Each division page brings together the relevant partner brands, helping clients, designers, architects, and project teams move from interest to the right brand page with less searching.</p>
    </section>

    <section class="sh-partners-overview-grid" id="partner-divisions" aria-label="Partner divisions">
        <?php foreach ($partner_divisions as $division) : ?>
            <article class="sh-partners-overview-card">
                <a href="<?php echo esc_url($division['url']); ?>" aria-label="Explore <?php echo esc_attr($division['title']); ?>">
                    <span class="sh-partners-overview-eyebrow"><?php echo esc_html($division['eyebrow']); ?></span>
                    <h2><?php echo esc_html($division['title']); ?></h2>
                    <p><?php echo esc_html($division['description']); ?></p>
                    <div class="sh-partners-overview-brand-list" aria-label="<?php echo esc_attr($division['eyebrow']); ?> brands">
                        <?php foreach ($division['brands'] as $brand) : ?>
                            <span><?php echo esc_html($brand); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <span class="sh-partners-overview-card__cta">Explore Division</span>
                </a>
            </article>
        <?php endforeach; ?>
    </section>

    <section class="sh-partners-overview-cta">
        <span class="sh-partners-overview-eyebrow">Need Guidance?</span>
        <h2>Not sure which partner brand fits your project?</h2>
        <p>Our team can help you compare design intent, technical requirements, availability, and project suitability before you decide.</p>
        <a class="sh-partners-overview-button" href="<?php echo esc_url(home_url('/contact/')); ?>">Speak to Our Team</a>
    </section>
</main>

<?php get_footer(); ?>
