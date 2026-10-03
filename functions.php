<?php

/******************************************
    Jaffnaicf Function Page
    *******************************************/

/****DEFINITIONS****/

define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/images');

/*********INCLUDE CUSTOM POST TYPES***********/
    //header text
    include_once('custom/header-text.php');
    //slider links
    include_once('custom/slider.php');
    include_once('custom/testimonials.php');
    include_once('custom/news.php');
    include_once('custom/partner.php');
    include_once('custom/projects.php');

	//social
    include_once('custom/social.php');

/***** enable custom header *****/
    $args = array(
        'flex-width'    => true,
        'flex-height'    => true,
        'default-image' => get_template_directory_uri() . '/images/logo.png',
    );
    add_theme_support( 'custom-header', $args );

/***** enable featured images on post *****/
    add_theme_support( 'post-thumbnails' );



/****REGISTER NAVIGATION****/
    register_nav_menus(

        array(
            'main-menu' => 'Main Menu'
			
          

        )
    );
  



add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
}


//to add siteurl for share
function site_blogurl(){
 $bloginfo = get_bloginfo('siteurl'); 
 return $bloginfo;
  
}
add_shortcode( 'site-home', 'site_blogurl' );


// scripts function
add_action('wp_enqueue_scripts','wpexplorer_scripts_function');
function wpexplorer_scripts_function() {

// load jquery if it isn't
wp_enqueue_script('jquery');

 // SuperFish Scripts
 wp_enqueue_script('superfish', get_stylesheet_directory_uri() . '/js/superfish.min.js');
 wp_enqueue_script('supersubs', get_stylesheet_directory_uri() . '/js/supersubs.js');
}

function get_post_content_by_id($postID) {
    $content_post = get_post($postID);
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]>', $content);
    return $content;
}


function hide_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;

  // Hide the editor on the page titled 'Homepage'
  $homepgname = get_the_title($post_id);
  if($homepgname == 'About Us' || $homepgname == 'partners'){ 
    remove_post_type_support('page', 'editor');
  }

  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  // $template_file = get_post_meta($post_id, '_wp_page_template', true);

  // if($template_file == 'my-page-template.php'){ // the filename of the page template
  //   remove_post_type_support('page', 'editor');
  // }

}

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

//Pagination
function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;
 
    global $paged;
    if(empty($paged)) $paged = 1;
 
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
 
    if(1 != $pages)
    {
        echo "<div class=\"pagination\" ><span>Page ".$paged." of ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }
 
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}

function custom_search_url( $search_rewrite ) {
if( !is_array( $search_rewrite ) ) { return $search_rewrite; }

$new_array = array();
foreach( $search_rewrite as $pattern => $s_query_string ) {
$new_array[ str_replace( 'search/', 'my-search-url/', $pattern ) ] = $s_query_string;
}
$search_rewrite = $new_array;
unset( $new_array );
return $search_rewrite;
}




 
function word_count($string, $limit) {
 
$words = explode(' ', $string);
 
return implode(' ', array_slice($words, 0, $limit));
 
}

function sanctuary_get_current_path() {
    if ( is_front_page() ) {
        return '/';
    }

    $request_path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
    $request_path = untrailingslashit( $request_path );

    return '' === $request_path ? '/' : $request_path;
}

function sanctuary_get_path_seo_map() {
    return array(
        '/' => array(
            'title'       => 'Luxury Bathroom Fittings Sri Lanka | Sanctuary Holdings',
            'description' => 'Sanctuary Holdings supplies premium bathroom fittings, sanitaryware, bathtubs, hot water systems, pumps, and fire safety solutions in Sri Lanka.',
        ),
        '/newspage' => array(
            'title'       => 'Sanctuary Holdings News | Bathware & Project Updates',
            'description' => 'Read Sanctuary Holdings news, product updates, project highlights, and design insights across bathware, hot water, plumbing, pumps, and fire safety.',
        ),
        '/privacy-policy' => array(
            'title'       => 'Privacy Policy | Sanctuary Holdings',
            'description' => 'Review the Sanctuary Holdings privacy policy and learn how we handle website enquiries, contact information, and customer data responsibly.',
        ),
        '/my-account' => array(
            'title'       => 'My Account | Sanctuary Holdings',
            'description' => 'Access your Sanctuary Holdings account area for customer details, saved information, and website account management.',
        ),
        '/contact' => array(
            'title'       => 'Contact Sanctuary Holdings | Bathroom Showroom Ethul Kotte',
            'description' => 'Visit Sanctuary Holdings at No. 831, Kotte Road, Ethul Kotte, or contact our team for premium bathware, hot water, plumbing, pumps, and fire safety solutions.',
        ),
        '/project' => array(
            'title'       => 'Sanctuary Holdings Projects | Premium Bathware Sri Lanka',
            'description' => 'Explore Sanctuary Holdings projects across luxury residences, hotels, apartments, resorts, and commercial developments in Sri Lanka and the Maldives.',
        ),
        '/projects' => array(
            'title'       => 'Sanctuary Holdings Projects | Premium Bathware Sri Lanka',
            'description' => 'Explore Sanctuary Holdings projects across luxury residences, hotels, apartments, resorts, and commercial developments in Sri Lanka and the Maldives.',
        ),
        '/about' => array(
            'title'       => 'About Sanctuary Holdings | Premium Bathware Sri Lanka',
            'description' => 'Learn about Sanctuary Holdings, our story, partner brands, project approach, leadership team, and premium bathware and building solutions in Sri Lanka.',
        ),
        '/faq' => array(
            'title'       => 'FAQs | Sanctuary Holdings',
            'description' => 'Find answers about Sanctuary Holdings bathware, hot water, plumbing, pumps, fire curtains, showroom visits, quotations, and project support in Sri Lanka.',
        ),
        '/materia' => array(
            'title'       => 'Materia | Sanctuary Holdings',
            'description' => 'Explore material-led bathroom inspiration from Sanctuary, including bamboo, stone, wood, solid surface, cement, metallic, and textured washbasins.',
        ),
        '/atelier-colours' => array(
            'title'       => 'Atelier, Deco & Colour | Sanctuary Holdings',
            'description' => 'Explore hand-painted Bathco Atelier basins, decorative printed pieces, and colour ceramics from Bathco, Creavit and Alice for design-led bathrooms.',
        ),
        '/finishes-in-taps' => array(
            'title'       => 'The Finish Library | Sanctuary Holdings',
            'description' => 'Explore brassware finish options across THG Paris, Paffoni, Fima | Carlo Frattini, and Perrin & Rowe, from chrome and nickel to gold, bronze, colour and matte finishes.',
        ),
        '/classic-bathrooms' => array(
            'title'       => 'Classic Bathrooms | Sanctuary Holdings',
            'description' => 'Explore classic bathroom inspiration with Victoria + Albert bathtubs, CreaVit Antique, Alice Boheme, Fima | Carlo Frattini series, and Paffoni brassware.',
        ),
        '/hot-water-solutions' => array(
            'title'       => 'Hot Water Solutions | Sanctuary Holdings',
            'description' => 'Discover domestic, commercial, and hybrid hot water solutions including water heaters, heat pumps, solar systems, gas boilers, and project support.',
        ),
        '/pumps-fire-curtains' => array(
            'title'       => 'Pumps & Fire Curtains | Sanctuary Holdings',
            'description' => 'Explore premium pump solutions and fire or smoke curtain systems designed for reliable building performance, protection, and project safety.',
        ),
        '/inspiration' => array(
            'title'       => 'Bathroom Inspiration | Sanctuary Holdings',
            'description' => 'Explore bathroom trends, practical design guidance, and sustainable ideas curated by Sanctuary Holdings for better, more thoughtful spaces.',
        ),
        '/inspiration/bathroom-trends-2025' => array(
            'title'       => 'Bathroom Trends 2025 | Sanctuary Holdings',
            'description' => 'Explore bathroom design trends for 2025, from natural materials and minimal forms to sculptural washbasins and spa-inspired bathroom living.',
        ),
        '/inspiration/choosing-the-right-washbasin' => array(
            'title'       => 'Choosing the Right Washbasin | Sanctuary Holdings',
            'description' => 'Learn how to choose the right washbasin by balancing size, material, installation type, water flow, ergonomics, and everyday bathroom use.',
        ),
        '/inspiration/green-bathrooms' => array(
            'title'       => 'Green Bathrooms | Sanctuary Holdings',
            'description' => 'Discover sustainable bathroom design ideas using green tones, natural materials, water-smart fittings, ventilation, and refined nature-led details.',
        ),
        '/partners' => array(
            'title'       => 'Partner Brands | Sanctuary Holdings',
            'description' => 'Explore Sanctuary Holdings partner brands across designer bathware, hot water solutions, pumps, fire curtains, plumbing, and technical building systems.',
        ),
        '/partners/designer-bathware' => array(
            'title'       => 'Designer Bathware Partners | Sanctuary Holdings',
            'description' => 'Explore international designer bathware brands represented by Sanctuary, offering refined sanitaryware, bathtubs, brassware, basins, and accessories.',
        ),
        '/partners/hot-water-solutions' => array(
            'title'       => 'Hot Water Solution Partners | Sanctuary Holdings',
            'description' => 'Explore Sanctuary hot water partner brands supporting reliable water heaters, heat pumps, solar, gas, and hybrid systems for homes and projects.',
        ),
        '/partners/pumps-fire-curtains' => array(
            'title'       => 'Pumps & Fire Safety Partners | Sanctuary Holdings',
            'description' => 'Explore pump, fire curtain, and smoke control partner brands supporting reliable building performance, protection, and technical project needs.',
        ),
        '/slider' => array(
            'title'       => 'Sanctuary Holdings Slider Assets',
            'description' => 'Internal Sanctuary Holdings homepage slider assets used for visual presentation across the website.',
        ),
        '/testimonial' => array(
            'title'       => 'Sanctuary Holdings Testimonials',
            'description' => 'Internal Sanctuary Holdings testimonial assets used to support the website experience.',
        ),
    );
}

function sanctuary_get_path_seo_meta( $path = '' ) {
    $path = $path ? untrailingslashit( $path ) : sanctuary_get_current_path();
    $path = '' === $path ? '/' : $path;
    $map  = sanctuary_get_path_seo_map();

    return isset( $map[ $path ] ) ? $map[ $path ] : array();
}

function sanctuary_get_seo_title() {
    $path_meta = sanctuary_get_path_seo_meta();
    if ( ! empty( $path_meta['title'] ) ) {
        return $path_meta['title'];
    }

    return '';
}

function sanctuary_filter_document_title( $title ) {
    if ( is_admin() ) {
        return $title;
    }

    $seo_title = sanctuary_get_seo_title();
    if ( ! empty( $seo_title ) ) {
        return $seo_title;
    }

    return $title;
}
add_filter( 'pre_get_document_title', 'sanctuary_filter_document_title', 20 );

function sanctuary_get_default_social_image_url() {
    $image = sanctuary_get_social_image_data();

    return isset( $image['url'] ) ? $image['url'] : '';
}

function sanctuary_get_social_image_data_from_attachment( $attachment_id ) {
    $attachment_id = absint( $attachment_id );
    if ( ! $attachment_id ) {
        return array();
    }

    $image = wp_get_attachment_image_src( $attachment_id, 'full' );
    if ( empty( $image[0] ) ) {
        return array();
    }

    $alt = trim( (string) get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) );
    if ( '' === $alt ) {
        $alt = trim( wp_strip_all_tags( get_the_title( $attachment_id ) ) );
    }

    return array(
        'id'     => $attachment_id,
        'url'    => $image[0],
        'width'  => isset( $image[1] ) ? (int) $image[1] : 0,
        'height' => isset( $image[2] ) ? (int) $image[2] : 0,
        'type'   => get_post_mime_type( $attachment_id ),
        'alt'    => $alt,
    );
}

function sanctuary_get_social_image_data_from_url( $url, $fallback_alt = '' ) {
    $url = esc_url_raw( $url );
    if ( '' === $url ) {
        return array();
    }

    $attachment_id = attachment_url_to_postid( $url );
    if ( $attachment_id ) {
        $image = sanctuary_get_social_image_data_from_attachment( $attachment_id );
        if ( ! empty( $image ) ) {
            if ( '' === $image['alt'] ) {
                $image['alt'] = $fallback_alt;
            }
            return $image;
        }
    }

    $width  = 0;
    $height = 0;
    $type   = '';
    $uploads = wp_upload_dir();
    if ( ! empty( $uploads['baseurl'] ) && ! empty( $uploads['basedir'] ) && 0 === strpos( $url, $uploads['baseurl'] ) ) {
        $file = str_replace( $uploads['baseurl'], $uploads['basedir'], $url );
        if ( is_readable( $file ) ) {
            $size = wp_getimagesize( $file );
            if ( is_array( $size ) ) {
                $width  = isset( $size[0] ) ? (int) $size[0] : 0;
                $height = isset( $size[1] ) ? (int) $size[1] : 0;
                $type   = isset( $size['mime'] ) ? $size['mime'] : '';
            }
        }
    }

    return array(
        'id'     => 0,
        'url'    => $url,
        'width'  => $width,
        'height' => $height,
        'type'   => $type,
        'alt'    => $fallback_alt,
    );
}

function sanctuary_get_social_image_data() {
    static $social_image = null;
    if ( null !== $social_image ) {
        return $social_image;
    }

    $queried_id = get_queried_object_id();
    $page_title = trim( wp_strip_all_tags( get_the_title( $queried_id ) ) );
    $default_alt = $page_title ? $page_title . ' | Sanctuary Holdings' : 'Sanctuary Holdings designer bathware and building solutions in Sri Lanka';

    if ( is_singular() && has_post_thumbnail( $queried_id ) ) {
        $social_image = sanctuary_get_social_image_data_from_attachment( get_post_thumbnail_id( $queried_id ) );
    }

    if ( empty( $social_image ) && is_front_page() ) {
        $slider_query = new WP_Query(
            array(
                'post_type'      => 'slider',
                'post_status'    => 'publish',
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
                'posts_per_page' => 1,
                'no_found_rows'  => true,
            )
        );

        if ( $slider_query->have_posts() ) {
            $slider_query->the_post();
            $social_image = sanctuary_get_social_image_data_from_attachment( get_post_thumbnail_id( get_the_ID() ) );
            wp_reset_postdata();
        }

        wp_reset_postdata();
    }

    if ( empty( $social_image ) && is_singular( 'partners' ) && function_exists( 'get_field' ) ) {
        $partner_slider = get_field( 'slider', $queried_id );
        if ( is_array( $partner_slider ) && ! empty( $partner_slider ) ) {
            $first_image = reset( $partner_slider );
            $first_id    = is_array( $first_image ) && ! empty( $first_image['ID'] ) ? $first_image['ID'] : $first_image;
            $social_image = sanctuary_get_social_image_data_from_attachment( $first_id );
        }
    }

    if ( empty( $social_image ) ) {
        $partner_hub_images = array(
            '/partners/designer-bathware'    => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/07/seros-victoria-albert.jpg',
            '/partners/hot-water-solutions'  => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-hot-water.png',
            '/partners/pumps-fire-curtains'  => 'https://sanctuaryholdings.lk/wp-content/uploads/2026/04/sanctuary-pumps-fire.png',
        );
        $path = sanctuary_get_current_path();
        if ( isset( $partner_hub_images[ $path ] ) ) {
            $social_image = sanctuary_get_social_image_data_from_url( $partner_hub_images[ $path ], $default_alt );
        }
    }

    if ( empty( $social_image ) ) {
        $social_image = array(
            'id'     => 0,
            'url'    => get_template_directory_uri() . '/images/sanctuary-social-default.png',
            'width'  => 1200,
            'height' => 630,
            'type'   => 'image/png',
            'alt'    => 'Sanctuary Holdings designer bathware and building solutions in Sri Lanka',
        );
    }

    if ( empty( $social_image['alt'] ) ) {
        $social_image['alt'] = $default_alt;
    }

    return $social_image;
}

function sanctuary_filter_wpseo_opengraph_title( $title ) {
    $seo_title = sanctuary_get_seo_title();
    return ! empty( $seo_title ) ? $seo_title : $title;
}
add_filter( 'wpseo_opengraph_title', 'sanctuary_filter_wpseo_opengraph_title' );
add_filter( 'wpseo_twitter_title', 'sanctuary_filter_wpseo_opengraph_title' );

function sanctuary_filter_wpseo_opengraph_desc( $description ) {
    if ( is_singular() ) {
        $yoast_meta_description = get_post_meta( get_queried_object_id(), '_yoast_wpseo_metadesc', true );
        if ( ! empty( $yoast_meta_description ) ) {
            return $yoast_meta_description;
        }
    }

    $meta_description = sanctuary_get_meta_description();
    return ! empty( $meta_description ) ? $meta_description : $description;
}
add_filter( 'wpseo_opengraph_desc', 'sanctuary_filter_wpseo_opengraph_desc' );
add_filter( 'wpseo_twitter_description', 'sanctuary_filter_wpseo_opengraph_desc' );

function sanctuary_filter_wpseo_opengraph_image( $image ) {
    $social_image = sanctuary_get_social_image_data();
    return ! empty( $social_image['url'] ) ? $social_image['url'] : $image;
}
add_filter( 'wpseo_opengraph_image', 'sanctuary_filter_wpseo_opengraph_image' );
add_filter( 'wpseo_twitter_image', 'sanctuary_filter_wpseo_opengraph_image' );

function sanctuary_filter_wpseo_opengraph_image_width( $width ) {
    $social_image = sanctuary_get_social_image_data();
    return ! empty( $social_image['width'] ) ? $social_image['width'] : $width;
}
add_filter( 'wpseo_opengraph_image_width', 'sanctuary_filter_wpseo_opengraph_image_width' );

function sanctuary_filter_wpseo_opengraph_image_height( $height ) {
    $social_image = sanctuary_get_social_image_data();
    return ! empty( $social_image['height'] ) ? $social_image['height'] : $height;
}
add_filter( 'wpseo_opengraph_image_height', 'sanctuary_filter_wpseo_opengraph_image_height' );

function sanctuary_filter_wpseo_opengraph_image_type( $type ) {
    $social_image = sanctuary_get_social_image_data();
    return ! empty( $social_image['type'] ) ? $social_image['type'] : $type;
}
add_filter( 'wpseo_opengraph_image_type', 'sanctuary_filter_wpseo_opengraph_image_type' );

function sanctuary_filter_wpseo_frontend_presentation( $presentation ) {
    $social_image = sanctuary_get_social_image_data();
    if ( ! empty( $social_image['url'] ) ) {
        $presentation->open_graph_images = array(
            array(
                'url'    => $social_image['url'],
                'width'  => $social_image['width'],
                'height' => $social_image['height'],
                'type'   => $social_image['type'],
            ),
        );
        $presentation->twitter_card  = 'summary_large_image';
        $presentation->twitter_image = $social_image['url'];
    }

    if ( in_array( sanctuary_get_current_path(), array( '/partners/designer-bathware', '/partners/hot-water-solutions', '/partners/pumps-fire-curtains' ), true ) ) {
        $presentation->open_graph_url         = home_url( trailingslashit( ltrim( sanctuary_get_current_path(), '/' ) ) );
        $presentation->open_graph_description = sanctuary_get_meta_description();
        $presentation->open_graph_type        = 'website';
    }

    return $presentation;
}
add_filter( 'wpseo_frontend_presentation', 'sanctuary_filter_wpseo_frontend_presentation', 20 );

if ( class_exists( '\\Yoast\\WP\\SEO\\Presenters\\Abstract_Indexable_Presenter' ) && ! class_exists( 'Sanctuary_WPSEO_Open_Graph_Image_Alt_Presenter' ) ) {
    class Sanctuary_WPSEO_Open_Graph_Image_Alt_Presenter extends \Yoast\WP\SEO\Presenters\Abstract_Indexable_Presenter {
        public function get() {
            $social_image = sanctuary_get_social_image_data();
            return isset( $social_image['alt'] ) ? $social_image['alt'] : '';
        }

        public function present() {
            $alt = $this->get();
            return '' !== $alt ? '<meta property="og:image:alt" content="' . esc_attr( $alt ) . '" />' : '';
        }
    }
}

function sanctuary_add_wpseo_social_presenters( $presenters ) {
    if ( class_exists( 'Sanctuary_WPSEO_Open_Graph_Image_Alt_Presenter' ) ) {
        $presenters[] = new Sanctuary_WPSEO_Open_Graph_Image_Alt_Presenter();
    }
    return $presenters;
}
add_filter( 'wpseo_frontend_presenters', 'sanctuary_add_wpseo_social_presenters', 20 );

function sanctuary_get_meta_description() {
    $path_meta = sanctuary_get_path_seo_meta();
    if ( ! empty( $path_meta['description'] ) ) {
        return $path_meta['description'];
    }

    if ( is_singular() ) {
        $yoast_meta_description = get_post_meta( get_queried_object_id(), '_yoast_wpseo_metadesc', true );
        if ( ! empty( $yoast_meta_description ) ) {
            return $yoast_meta_description;
        }
    }

    return get_bloginfo( 'description' );
}

function sanctuary_output_meta_description() {
    if ( is_admin() ) {
        return;
    }

    if ( is_singular() ) {
        $yoast_meta_description = get_post_meta( get_queried_object_id(), '_yoast_wpseo_metadesc', true );
        if ( ! empty( $yoast_meta_description ) ) {
            return;
        }
    }

    $description = sanctuary_get_meta_description();
    if ( ! empty( $description ) ) {
        echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $description ) ) . '" />' . "\n";
    }
}

function sanctuary_is_approved_indexable_page() {
    return in_array(
        sanctuary_get_current_path(),
        array(
            '/partners/designer-bathware',
            '/partners/hot-water-solutions',
            '/partners/pumps-fire-curtains',
            '/hot-water-solutions',
        ),
        true
    );
}

function sanctuary_should_noindex_current_url() {
    if ( sanctuary_is_approved_indexable_page() ) {
        return false;
    }

    $path          = sanctuary_get_current_path();
    $noindex_paths = array(
        '/my-account',
        '/slider',
        '/testimonial',
        '/design-bath-ware',
        '/testoviy-post-02-05',
        '/our-happy-clients',
        '/we-are-linked-with-around-the-world',
        '/hot-water',
        '/plumbing-solutions',
    );

    foreach ( $noindex_paths as $noindex_path ) {
        if ( 0 === strpos( $path, $noindex_path ) ) {
            return true;
        }
    }

    if ( is_attachment() || is_author() || is_category() || is_tag() || is_date() || is_search() ) {
        return true;
    }

    return false;
}

function sanctuary_filter_wpseo_robots( $robots ) {
    if ( sanctuary_is_approved_indexable_page() ) {
        return 'index, follow';
    }

    if ( sanctuary_should_noindex_current_url() ) {
        return 'noindex, follow';
    }

    return $robots;
}
add_filter( 'wpseo_robots', 'sanctuary_filter_wpseo_robots', 20 );

function sanctuary_filter_wp_robots( $robots ) {
    if ( sanctuary_is_approved_indexable_page() ) {
        unset( $robots['noindex'] );
        $robots['index']  = true;
        $robots['follow'] = true;
        return $robots;
    }

    if ( sanctuary_should_noindex_current_url() ) {
        $robots['noindex'] = true;
        unset( $robots['index'] );
    }

    return $robots;
}
add_filter( 'wp_robots', 'sanctuary_filter_wp_robots', 20 );

function sanctuary_exclude_utility_post_types_from_yoast_sitemap( $excluded, $post_type ) {
    if ( in_array( $post_type, array( 'attachment', 'post', 'slider', 'testimonial' ), true ) ) {
        return true;
    }

    return $excluded;
}
add_filter( 'wpseo_sitemap_exclude_post_type', 'sanctuary_exclude_utility_post_types_from_yoast_sitemap', 20, 2 );

function sanctuary_exclude_utility_taxonomies_from_yoast_sitemap( $excluded, $taxonomy ) {
    if ( in_array( $taxonomy, array( 'category', 'post_tag' ), true ) ) {
        return true;
    }

    return $excluded;
}
add_filter( 'wpseo_sitemap_exclude_taxonomy', 'sanctuary_exclude_utility_taxonomies_from_yoast_sitemap', 20, 2 );

function sanctuary_exclude_authors_from_yoast_sitemap() {
    return true;
}
add_filter( 'wpseo_sitemap_exclude_author', 'sanctuary_exclude_authors_from_yoast_sitemap', 20 );

function sanctuary_get_sanctuary_faqs() {
    return array(
        array(
            'question' => 'What does Sanctuary Holdings supply in Sri Lanka?',
            'answer'   => 'Sanctuary Holdings supplies premium bathware, sanitaryware, bathroom fittings, hot water systems, plumbing solutions, pumps, and fire protection products for residential and commercial projects in Sri Lanka.',
        ),
        array(
            'question' => 'Which types of projects does Sanctuary Holdings support?',
            'answer'   => 'Sanctuary Holdings supports luxury homes, apartments, hotels, resorts, mixed-use developments, and commercial construction projects that need dependable bathware, hot water, plumbing, and fire safety solutions.',
        ),
        array(
            'question' => 'Does Sanctuary Holdings represent international brands?',
            'answer'   => 'Yes. Sanctuary Holdings represents a portfolio of international bathware, hot water, plumbing, and fire protection brands and supplies them to clients in Sri Lanka through its showroom and project team.',
        ),
        array(
            'question' => 'Where is the Sanctuary Holdings showroom located?',
            'answer'   => 'The Sanctuary Holdings showroom is located at No. 831, Kotte Road, Ethul Kotte, 10100, Sri Lanka.',
        ),
        array(
            'question' => 'How can I contact Sanctuary Holdings for a quotation?',
            'answer'   => 'You can contact Sanctuary Holdings by phone at +94 114 331191 or visit the Contact page to request a quotation for bathware, hot water, plumbing, or fire protection requirements.',
        ),
    );
}

function sanctuary_enrich_yoast_organization_schema( $data ) {
    $data['@type'] = array( 'Organization', 'LocalBusiness' );
    $data['name'] = 'Sanctuary Holdings (Pvt) Ltd';
    $data['image'] = sanctuary_get_default_social_image_url();
    $data['description'] = sanctuary_get_meta_description();
    $data['telephone'] = '+94 114 331191';
    $data['email'] = 'contact@sanctuaryholdings.lk';
    $data['areaServed'] = array(
        array( '@type' => 'Country', 'name' => 'Sri Lanka' ),
        array( '@type' => 'Country', 'name' => 'Maldives' ),
    );
    $data['address'] = array(
        '@type'           => 'PostalAddress',
        'streetAddress'   => 'No. 831, Kotte Road, Ethul Kotte',
        'addressLocality' => 'Ethul Kotte',
        'postalCode'      => '10100',
        'addressCountry'  => 'LK',
    );
    $data['knowsAbout'] = array(
        'Premium bathware',
        'Sanitaryware',
        'Bathroom fittings',
        'Hot water systems',
        'Plumbing solutions',
        'Fire protection systems',
        'Pumps',
    );
    $data['hasOfferCatalog'] = array(
        '@type'           => 'OfferCatalog',
        'name'            => 'Sanctuary Holdings Solutions',
        'itemListElement' => array(
            array( '@type' => 'OfferCatalog', 'name' => 'Designer Bathware', 'url' => home_url( '/partners/designer-bathware/' ) ),
            array( '@type' => 'OfferCatalog', 'name' => 'Hot Water Solutions', 'url' => home_url( '/hot-water-solutions/' ) ),
            array( '@type' => 'OfferCatalog', 'name' => 'Plumbing Solutions', 'url' => home_url( '/partners/plumbing-brands/' ) ),
            array( '@type' => 'OfferCatalog', 'name' => 'Pumps & Fire Curtains', 'url' => home_url( '/pumps-fire-curtains/' ) ),
        ),
    );

    return $data;
}
add_filter( 'wpseo_schema_organization', 'sanctuary_enrich_yoast_organization_schema' );

function sanctuary_output_faq_schema() {
    if ( is_admin() || ( ! is_page( 'faq' ) && ! is_page( 'faqs' ) ) ) {
        return;
    }

    $faq_entities = array();
    foreach ( sanctuary_get_sanctuary_faqs() as $faq_item ) {
        $faq_entities[] = array(
            '@type'          => 'Question',
            'name'           => $faq_item['question'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => $faq_item['answer'],
            ),
        );
    }

    $schema_graph = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        '@id'        => home_url( '/faq/#faq' ),
        'mainEntity' => $faq_entities,
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema_graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'sanctuary_output_faq_schema', 30 );

function sanctuary_force_public_store_live_mode() {
    return 'no';
}
add_filter( 'pre_option_woocommerce_coming_soon', 'sanctuary_force_public_store_live_mode' );
add_filter( 'pre_option_woocommerce_store_pages_only', 'sanctuary_force_public_store_live_mode' );
add_filter( 'pre_option_woocommerce_private_link', 'sanctuary_force_public_store_live_mode' );

function sanctuary_delete_directory_contents( $directory ) {
    if ( ! is_dir( $directory ) ) {
        return;
    }

    $items = glob( trailingslashit( $directory ) . '*', GLOB_NOSORT );
    if ( empty( $items ) ) {
        return;
    }

    foreach ( $items as $item ) {
        if ( is_dir( $item ) ) {
            sanctuary_delete_directory_contents( $item );
            @rmdir( $item );
            continue;
        }

        @unlink( $item );
    }
}

function sanctuary_purge_known_cache_layers_once() {
    if ( get_option( 'sanctuary_cache_reset_20260430_range_inspiration' ) ) {
        return;
    }

    $content_dir = WP_CONTENT_DIR;
    $cache_paths = array(
        $content_dir . '/boost-cache',
        $content_dir . '/cache',
        $content_dir . '/litespeed',
    );

    foreach ( $cache_paths as $cache_path ) {
        sanctuary_delete_directory_contents( $cache_path );
    }

    if ( function_exists( 'do_action' ) ) {
        do_action( 'litespeed_purge_all' );
    }

    update_option( 'sanctuary_cache_reset_20260430_range_inspiration', time(), false );
}
add_action( 'init', 'sanctuary_purge_known_cache_layers_once', 1 );

function sanctuary_purge_seo_refresh_cache_once() {
    if ( get_option( 'sanctuary_cache_reset_20260505_full_seo' ) ) {
        return;
    }

    $content_dir = WP_CONTENT_DIR;
    $cache_paths = array(
        $content_dir . '/boost-cache',
        $content_dir . '/cache',
        $content_dir . '/litespeed',
    );

    foreach ( $cache_paths as $cache_path ) {
        sanctuary_delete_directory_contents( $cache_path );
    }

    if ( class_exists( 'autoptimizeCache' ) && method_exists( 'autoptimizeCache', 'clearall' ) ) {
        autoptimizeCache::clearall();
    }

    do_action( 'litespeed_purge_all' );
    wp_cache_flush();

    update_option( 'sanctuary_cache_reset_20260505_full_seo', time(), false );
}
add_action( 'init', 'sanctuary_purge_seo_refresh_cache_once', 1 );

function sanctuary_remove_platformist_plugin_once() {
    if ( get_option( 'sanctuary_removed_platformist_plugin_20260427' ) ) {
        return;
    }

    $plugin_directory = WP_CONTENT_DIR . '/plugins/platformist-quadendpointer';
    if ( is_dir( $plugin_directory ) ) {
        sanctuary_delete_directory_contents( $plugin_directory );
        @rmdir( $plugin_directory );
    }

    update_option( 'sanctuary_removed_platformist_plugin_20260427', time(), false );
}
add_action( 'init', 'sanctuary_remove_platformist_plugin_once', 2 );

function sanctuary_strip_preview_redirect_query( $location, $status ) {
    if ( is_admin() || empty( $location ) ) {
        return $location;
    }

    $current_request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
    $clean_location      = remove_query_arg( 'v', $location );

    if ( ! empty( $current_request_uri ) ) {
        $current_url         = home_url( $current_request_uri );
        $normalized_target   = wp_parse_url( $clean_location );
        $normalized_current  = wp_parse_url( $current_url );
        $target_path         = isset( $normalized_target['path'] ) ? untrailingslashit( $normalized_target['path'] ) : '';
        $current_path        = isset( $normalized_current['path'] ) ? untrailingslashit( $normalized_current['path'] ) : '';
        $target_query_string = isset( $normalized_target['query'] ) ? $normalized_target['query'] : '';
        $current_query       = isset( $normalized_current['query'] ) ? $normalized_current['query'] : '';

        if ( $target_path === $current_path && $target_query_string === $current_query ) {
            return false;
        }
    }

    return $clean_location ? $clean_location : $location;
}
add_filter( 'wp_redirect', 'sanctuary_strip_preview_redirect_query', 10, 2 );

function sanctuary_force_fresh_frontend_html_headers() {
    if ( is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
        return;
    }

    if ( headers_sent() ) {
        return;
    }

    nocache_headers();
    header( 'Cache-Control: no-store, no-cache, must-revalidate, max-age=0', true );
    header( 'Pragma: no-cache', true );
    header( 'Expires: Wed, 11 Jan 1984 05:00:00 GMT', true );
}
// Disabled so SiteGround/Cloudflare can cache public HTML.
// add_action( 'send_headers', 'sanctuary_force_fresh_frontend_html_headers', 20 );

function sanctuary_render_partner_division_pages() {
    if ( is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
        return;
    }

    $request_path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
    $request_path = untrailingslashit( $request_path );

    $division_paths = array(
        '/partners/designer-bathware',
        '/partners/hot-water-solutions',
        '/partners/pumps-fire-curtains',
    );

    if ( ! in_array( $request_path, $division_paths, true ) ) {
        return;
    }

    $page_path = ltrim( $request_path, '/' );
    $division_page = get_page_by_path( $page_path );

    if ( ! $division_page || 'publish' !== $division_page->post_status ) {
        return;
    }

    global $post, $wp_query;

    $post = $division_page;
    setup_postdata( $post );

    if ( $wp_query ) {
        $wp_query->is_404    = false;
        $wp_query->is_page   = true;
        $wp_query->is_single = false;
        $wp_query->post      = $division_page;
        $wp_query->posts     = array( $division_page );
    }

    status_header( 200 );
    nocache_headers();
    get_header();
    echo do_shortcode( $division_page->post_content );
    get_footer();
    wp_reset_postdata();
    exit;
}
add_action( 'template_redirect', 'sanctuary_render_partner_division_pages', 2 );

function sanctuary_redirect_www_to_non_www() {
    if ( is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
        return;
    }

    $host_sources = array();
    if ( ! empty( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ) {
        $forwarded_parts = explode( ',', wp_unslash( $_SERVER['HTTP_X_FORWARDED_HOST'] ) );
        $host_sources[]  = trim( strtolower( $forwarded_parts[0] ) );
    }
    if ( ! empty( $_SERVER['HTTP_X_ORIGINAL_HOST'] ) ) {
        $host_sources[] = trim( strtolower( wp_unslash( $_SERVER['HTTP_X_ORIGINAL_HOST'] ) ) );
    }
    if ( ! empty( $_SERVER['HTTP_HOST'] ) ) {
        $host_sources[] = trim( strtolower( wp_unslash( $_SERVER['HTTP_HOST'] ) ) );
    }
    if ( ! empty( $_SERVER['SERVER_NAME'] ) ) {
        $host_sources[] = trim( strtolower( wp_unslash( $_SERVER['SERVER_NAME'] ) ) );
    }

    $host = '';
    foreach ( $host_sources as $candidate_host ) {
        if ( 0 === strpos( $candidate_host, 'www.' ) ) {
            $host = $candidate_host;
            break;
        }
    }

    if ( empty( $host ) && ! empty( $host_sources ) ) {
        $host = $host_sources[0];
    }

    if ( 0 !== strpos( $host, 'www.' ) ) {
        return;
    }

    $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/';
    $target_url  = 'https://' . substr( $host, 4 ) . $request_uri;

    header( 'Location: ' . $target_url, true, 301 );
    exit;
}
add_action( 'template_redirect', 'sanctuary_redirect_www_to_non_www', 0 );


/* sh2_ga4_conversion_tracking */
function sanctuary_output_ga4_conversion_tracking() {
    if ( is_admin() ) {
        return;
    }
    ?>
    <script id="sh2-ga4-conversion-tracking">
    (function () {
        function trackEvent(name, parameters) {
            if (typeof window.gtag !== 'function') return;
            window.gtag('event', name, parameters || {});
        }

        document.addEventListener('click', function (event) {
            var link = event.target.closest && event.target.closest('a');
            if (!link) return;

            var href = String(link.getAttribute('href') || '');
            var text = String(link.textContent || '').trim().slice(0, 80);

            if (href.indexOf('tel:') === 0) {
                trackEvent('phone_click', { event_category: 'contact', link_text: text });
            } else if (href.indexOf('mailto:') === 0) {
                trackEvent('email_click', { event_category: 'contact', link_text: text });
            } else if (/wa.me|whatsapp/i.test(href)) {
                trackEvent('whatsapp_click', { event_category: 'contact', link_text: text });
            }

            if (/book-a-showroom-visit/i.test(href)) {
                trackEvent('book_showroom_click', { event_category: 'enquiry', link_text: text });
            }
        }, true);

        /* Contact Form 7: form_submit fires only on wpcf7mailsent (mail confirmed sent).
           wpcf7invalid, wpcf7spam, wpcf7mailfailed and button clicks are deliberately ignored. */
        if (!window.shFormSubmitTrackingBound) {
            window.shFormSubmitTrackingBound = true;
            var lastFormSubmit = {};

            document.addEventListener('wpcf7mailsent', function (event) {
                var detail = event.detail || {};
                var formId = String(detail.contactFormId || '');
                var unitTag = String(detail.unitTag || '');
                var key = unitTag || formId;
                var now = Date.now();

                if (lastFormSubmit[key] && now - lastFormSubmit[key] < 3000) return;
                lastFormSubmit[key] = now;

                trackEvent('form_submit', {
                    event_category: 'enquiry',
                    form_type: 'contact_form_7',
                    form_id: formId,
                    form_unit: unitTag,
                    form_post_id: String(detail.containerPostId || ''),
                    page_path: window.location.pathname,
                    page_title: document.title
                });
            }, false);
        }
    }());
    </script>
    <?php
}
add_action( 'wp_footer', 'sanctuary_output_ga4_conversion_tracking', 40 );

/* Sanctuary crawl-bloat protection. */
function sanctuary_block_spam_crawl_urls() {
    if (
        is_admin() ||
        wp_doing_ajax() ||
        ( defined( 'REST_REQUEST' ) && REST_REQUEST )
    ) {
        return;
    }

    $search_term = get_search_query( false );
    $raw_query   = isset( $_SERVER['QUERY_STRING'] )
        ? wp_unslash( $_SERVER['QUERY_STRING'] )
        : '';

    $numeric_search = is_search()
        && preg_match( '/^\d{5,}$/', $search_term );

    $request_path = isset( $_SERVER['REQUEST_URI'] )
        ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH )
        : '';

    $search_feed = ( is_search() && is_feed() )
        || preg_match( '#^/search/\d{5,}/feed(?:/rss2)?/?$#i', $request_path );

    $malformed_query = ! empty( $raw_query )
        && false === strpos( $raw_query, '=' )
        && preg_match( '/^\d+(?:[._-][a-z0-9]+)*$/i', $raw_query );

    if ( ! $numeric_search && ! $search_feed && ! $malformed_query ) {
        return;
    }

    status_header( 410 );
    nocache_headers();
    header( 'X-Robots-Tag: noindex, nofollow', true );
    exit;
}
add_action( 'parse_request', 'sanctuary_block_spam_crawl_urls', -99 );
add_action( 'template_redirect', 'sanctuary_block_spam_crawl_urls', -99 );


/* ===== TEMPORARY: server-side image sideload helper for brand hero slider sourcing (2026-07) - REMOVE AFTER USE ===== */
add_action('wp_ajax_sh_sideload_image', 'sh_sideload_image_handler');
function sh_sideload_image_handler() {
    if ( ! current_user_can('manage_options') ) { wp_send_json_error('forbidden'); }
    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $url = isset($_POST['url']) ? esc_url_raw($_POST['url']) : '';
    $desc = isset($_POST['desc']) ? sanitize_text_field($_POST['desc']) : '';
    if ( ! $url ) { wp_send_json_error('no url'); }

    $tmp = download_url($url);
    if ( is_wp_error($tmp) ) { wp_send_json_error($tmp->get_error_message()); }

    $file_array = array(
        'name' => sanitize_file_name(basename(parse_url($url, PHP_URL_PATH))),
        'tmp_name' => $tmp
    );

    $id = media_handle_sideload($file_array, 0, $desc);
    if ( is_wp_error($id) ) {
        @unlink($file_array['tmp_name']);
        wp_send_json_error($id->get_error_message());
    }

    wp_send_json_success(array('id' => $id, 'url' => wp_get_attachment_url($id)));
}


/* ===== TEMPORARY: set ACF gallery field helper for brand hero slider sourcing (2026-07) - REMOVE AFTER USE ===== */
add_action('wp_ajax_sh_set_gallery_field', 'sh_set_gallery_field_handler');
function sh_set_gallery_field_handler() {
    if ( ! current_user_can('manage_options') ) { wp_send_json_error('forbidden'); }
    if ( ! function_exists('update_field') ) { wp_send_json_error('ACF not active'); }

    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    $field = isset($_POST['field']) ? sanitize_text_field($_POST['field']) : '';
    $ids_raw = isset($_POST['ids']) ? sanitize_text_field($_POST['ids']) : '';
    if ( ! $post_id || ! $field || ! $ids_raw ) { wp_send_json_error('missing params'); }

    $ids = array_map('intval', explode(',', $ids_raw));
    $result = update_field($field, $ids, $post_id);

    wp_send_json_success(array('result' => $result, 'ids' => $ids));
}

/*
 * Sanctuary privacy-first cookie consent.
 *
 * Non-essential scripts are rendered inert in the cached HTML and are only
 * activated in the browser after the visitor grants the matching category.
 * This keeps the behaviour consistent across page-cache variants.
 */
if ( ! function_exists( 'sanctuary_consent_cookie' ) ) {
    function sanctuary_consent_cookie() {
        $defaults = array(
            'analytics'   => false,
            'advertising' => false,
            'functional'  => false,
        );

        if ( empty( $_COOKIE['sh_cookie_consent'] ) ) {
            return $defaults;
        }

        $raw  = rawurldecode( wp_unslash( $_COOKIE['sh_cookie_consent'] ) );
        $data = json_decode( $raw, true );

        if ( ! is_array( $data ) || empty( $data['version'] ) || '1.0' !== (string) $data['version'] ) {
            return $defaults;
        }

        foreach ( array_keys( $defaults ) as $category ) {
            $defaults[ $category ] = ! empty( $data[ $category ] );
        }

        return $defaults;
    }

    function sanctuary_consent_script_category( $markup ) {
        $markup = strtolower( (string) $markup );

        if ( preg_match( '/facebook|fbq\s*\(|_fbp|facebooksignal|doubleclick|googlesyndication|googleadservices|adsbygoogle|pagead2|gtm\.js|googletagmanager\.com\/ns\.html|gtm-[a-z0-9]+|_gcl/', $markup ) ) {
            return 'advertising';
        }

        if ( preg_match( '/google-analytics|googletagmanager\.com\/gtag|googlesitekit-consent-mode|googlesitekit-events-provider|gtag\s*\(|googleanalyticsobject|analytics\.google|_ga(?:\W|$)/', $markup ) ) {
            return 'analytics';
        }

        if ( preg_match( '/wonderpush|cdn\.by\.wonderpush|brevo|wp-content\/plugins\/mailin|accounts\.google\.com\/gsi|sign-in-with-google|google\.accounts/', $markup ) ) {
            return 'functional';
        }

        return '';
    }

    function sanctuary_consent_filter_script( $matches ) {
        $attributes = isset( $matches[1] ) ? $matches[1] : '';
        $content    = isset( $matches[2] ) ? $matches[2] : '';

        if ( false !== stripos( $attributes, 'data-sh-consent-manager' ) || false !== stripos( $attributes, 'data-sh-consent-category' ) ) {
            return $matches[0];
        }

        /* Structured data is page content, not executable tracking code. */
        if ( false !== stripos( $attributes, 'application/ld+json' ) ) {
            return $matches[0];
        }

        /* Site Kit uses one Google tag for both Analytics and Ads. Keep it as
         * a shared category; the browser-side loader selects the permitted
         * destination and removes the other configuration before execution. */
        $category = preg_match( '/\bid\s*=\s*(?:"|\')google_gtagjs-js(?:-|(?:"|\'))/i', $attributes )
            ? 'google'
            : sanctuary_consent_script_category( $attributes . ' ' . $content );
        if ( ! $category ) {
            return $matches[0];
        }

        $attributes = preg_replace( '/\s+type\s*=\s*(?:"[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $attributes );

        /* Removing src prevents the HTML parser and optimisation layers from
         * fetching an external script before the consent manager activates it. */
        $attributes = preg_replace_callback(
            '/\s+(?:src|data-src)\s*=\s*("([^"]*)"|\'([^\']*)\'|([^\s>]+))/i',
            function ( $src_match ) {
                $src = ! empty( $src_match[2] ) ? $src_match[2] : ( ! empty( $src_match[3] ) ? $src_match[3] : $src_match[4] );
                return ' data-sh-consent-src="' . esc_attr( $src ) . '"';
            },
            $attributes
        );

        return '<script type="application/x-sh-consent" data-no-delay-js data-sgoptout data-sh-consent-category="' . esc_attr( $category ) . '"' . $attributes . '>' . $content . '</script>';
    }

    function sanctuary_consent_filter_html( $html ) {
        if ( ! is_string( $html ) || false === stripos( $html, '</body>' ) ) {
            return $html;
        }

        $html = preg_replace_callback( '/<script\b([^>]*)>(.*?)<\/script>/is', 'sanctuary_consent_filter_script', $html );

        /* Noscript pixels must never fire before consent. Their JS equivalents
         * are activated after consent, so the tracking-only fallback is removed. */
        $html = preg_replace( '/<noscript\b[^>]*>.*?(?:facebook\.com\/tr|googletagmanager\.com\/ns\.html|doubleclick|googlesyndication).*?<\/noscript>/is', '', $html );

        $privacy_url = esc_url( home_url( '/privacy-policy/' ) );
        $ui          = <<<'SH_CONSENT_UI'
<style id="sh-cookie-consent-style">
:root{--shc-green:#3f5949;--shc-ivory:#f7f2ea;--shc-ink:#243129;--shc-line:rgba(63,89,73,.22);--shc-shadow:0 18px 55px rgba(22,39,29,.22)}
.shc-lock{overflow:hidden}.shc-banner,.shc-modal{font-family:"Work Sans",Arial,sans-serif;color:var(--shc-ink);line-height:1.55;letter-spacing:0}
.shc-banner{position:fixed;z-index:2147483000;left:24px;right:24px;bottom:24px;display:none;max-width:1240px;margin:auto;padding:24px;background:var(--shc-ivory);border:1px solid var(--shc-line);box-shadow:var(--shc-shadow)}
.shc-banner.is-visible{display:block}.shc-banner__inner{display:grid;grid-template-columns:minmax(0,1fr) minmax(520px,.95fr);align-items:end;gap:28px}.shc-eyebrow{margin:0 0 8px;color:var(--shc-green);font-size:11px;font-weight:600;letter-spacing:.14em;text-transform:uppercase}.shc-title{margin:0 0 8px;font-family:Italiana,Lora,Georgia,serif;font-size:30px;font-weight:400;line-height:1.12;color:var(--shc-green)}
.shc-copy{margin:0;max-width:720px;font-size:14px}.shc-copy a,.shc-modal a{color:var(--shc-green);text-decoration:underline;text-underline-offset:3px}.shc-actions{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}.shc-button{appearance:none;min-height:48px;padding:11px 14px;border:1px solid var(--shc-green);border-radius:0;background:transparent;color:var(--shc-green);font:600 12px/1.25 "Work Sans",Arial,sans-serif;letter-spacing:.04em;text-align:center;cursor:pointer}.shc-button:hover,.shc-button:focus-visible{background:var(--shc-green);color:var(--shc-ivory);outline:2px solid transparent}.shc-button--filled{background:var(--shc-green);color:var(--shc-ivory)}
.shc-preferences{position:fixed;z-index:2147482000;left:18px;bottom:18px;display:none;min-height:42px;padding:10px 14px;border:1px solid var(--shc-green);border-radius:0;background:var(--shc-ivory);color:var(--shc-green);box-shadow:0 8px 25px rgba(22,39,29,.13);font:600 11px/1.2 "Work Sans",Arial,sans-serif;letter-spacing:.06em;text-transform:uppercase;cursor:pointer}.shc-preferences.is-visible{display:block}
.sh3-utility .shc-footer-preferences{position:static;display:inline-flex;align-items:center;min-height:44px;padding:0;border:0;background:transparent;box-shadow:none;color:inherit;font:inherit;letter-spacing:inherit;text-transform:none;cursor:pointer;text-align:left}.sh3-utility .shc-footer-preferences:hover{text-decoration:underline}.sh3-utility .shc-footer-preferences:focus-visible{outline:2px solid #bb8964;outline-offset:4px}

.shc-backdrop{position:fixed;z-index:2147483100;inset:0;display:none;padding:24px;background:rgba(17,28,22,.64);overflow:auto}.shc-backdrop.is-visible{display:flex;align-items:center;justify-content:center}.shc-modal{width:min(680px,100%);max-height:calc(100vh - 48px);overflow:auto;background:var(--shc-ivory);border:1px solid rgba(247,242,234,.62);box-shadow:var(--shc-shadow)}.shc-modal__head{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;padding:28px 28px 20px;border-bottom:1px solid var(--shc-line)}.shc-modal__head .shc-title{font-size:32px}.shc-close{width:42px;height:42px;border:1px solid var(--shc-line);background:transparent;color:var(--shc-green);font-size:25px;line-height:1;cursor:pointer}.shc-modal__body{padding:6px 28px 28px}.shc-category{display:grid;grid-template-columns:minmax(0,1fr) auto;gap:18px;padding:20px 0;border-bottom:1px solid var(--shc-line)}.shc-category h3{margin:0 0 5px;font-family:Lora,Georgia,serif;font-size:17px;font-weight:500;color:var(--shc-green)}.shc-category p{margin:0;font-size:13px}.shc-required{color:var(--shc-green);font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.shc-switch{position:relative;display:inline-flex;align-items:center;width:48px;height:27px;margin-top:4px}.shc-switch input{position:absolute;opacity:0;pointer-events:none}.shc-switch span{width:100%;height:100%;border:1px solid var(--shc-green);background:#d9dbd5;cursor:pointer;transition:.2s}.shc-switch span:after{content:"";display:block;width:19px;height:19px;margin:3px;background:#fff;box-shadow:0 1px 5px rgba(0,0,0,.18);transition:.2s}.shc-switch input:checked+span{background:var(--shc-green)}.shc-switch input:checked+span:after{transform:translateX(21px)}.shc-switch input:focus-visible+span{outline:2px solid var(--shc-green);outline-offset:3px}.shc-modal__actions{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;padding-top:24px}
@media(max-width:860px){.shc-banner{left:12px;right:12px;bottom:12px;padding:20px}.shc-banner__inner{grid-template-columns:1fr;gap:20px}.shc-actions{grid-template-columns:1fr}.shc-title{font-size:26px}.shc-backdrop{padding:12px;align-items:flex-end}.shc-modal{max-height:calc(100vh - 24px)}.shc-modal__head{padding:22px 20px 16px}.shc-modal__body{padding:4px 20px 20px}.shc-modal__actions{grid-template-columns:1fr}.shc-preferences{left:12px;bottom:12px}}
</style>
<section class="shc-banner" id="shc-banner" role="region" aria-label="Cookie choices" aria-hidden="true">
  <div class="shc-banner__inner">
    <div><p class="shc-eyebrow">Your privacy, your choice</p><h2 class="shc-title">Privacy, thoughtfully managed</h2><p class="shc-copy">We use necessary cookies to make this website work. With your permission, we also use analytics, advertising and optional functionality to understand visits and improve your experience. You can accept, reject or choose by category. Read our <a href="__PRIVACY_URL__">Privacy &amp; Cookie Policy</a>.</p></div>
    <div class="shc-actions"><button type="button" class="shc-button" data-shc-action="accept">Accept all</button><button type="button" class="shc-button" data-shc-action="reject">Reject non-essential</button><button type="button" class="shc-button" data-shc-action="manage">Manage preferences</button></div>
  </div>
</section>
<button type="button" class="shc-preferences" id="shc-preferences" data-shc-action="manage">Cookie preferences</button>
<div class="shc-backdrop" id="shc-backdrop" aria-hidden="true">
  <section class="shc-modal" role="dialog" aria-modal="true" aria-labelledby="shc-modal-title">
    <header class="shc-modal__head"><div><p class="shc-eyebrow">Privacy controls</p><h2 class="shc-title" id="shc-modal-title">Manage preferences</h2><p class="shc-copy">Choose which optional technologies Sanctuary may use. Necessary cookies are always active.</p></div><button type="button" class="shc-close" aria-label="Close cookie preferences" data-shc-action="close">&times;</button></header>
    <div class="shc-modal__body">
      <div class="shc-category"><div><h3>Necessary</h3><p>Required for core site functions, security and remembering your privacy choice.</p></div><span class="shc-required">Always active</span></div>
      <div class="shc-category"><div><h3>Analytics</h3><p>Google Analytics and Ahrefs Web Analytics help us understand visits and interactions so we can improve the website.</p></div><label class="shc-switch"><input type="checkbox" id="shc-analytics"><span aria-hidden="true"></span><span class="screen-reader-text">Allow analytics cookies</span></label></div>
      <div class="shc-category"><div><h3>Advertising</h3><p>Google advertising tools and Meta Pixel support advertising measurement and relevant campaigns.</p></div><label class="shc-switch"><input type="checkbox" id="shc-advertising"><span aria-hidden="true"></span><span class="screen-reader-text">Allow advertising cookies</span></label></div>
      <div class="shc-category"><div><h3>Optional functionality &amp; web push</h3><p>Enables optional services such as Google sign-in where offered and Brevo/WonderPush web notifications. Browser notification permission remains a separate choice.</p></div><label class="shc-switch"><input type="checkbox" id="shc-functional"><span aria-hidden="true"></span><span class="screen-reader-text">Allow optional functionality and web push</span></label></div>
      <div class="shc-modal__actions"><button type="button" class="shc-button shc-button--filled" data-shc-action="save">Save preferences</button><button type="button" class="shc-button" data-shc-action="reject">Reject non-essential</button><button type="button" class="shc-button" data-shc-action="accept">Accept all</button></div>
    </div>
  </section>
</div>
<script id="sh-cookie-consent-manager" data-no-delay-js data-sgoptout data-sh-consent-manager>
(function(){
  'use strict';
  var VERSION='1.0', COOKIE='sh_cookie_consent', MONTHS=15552000;
  var banner=document.getElementById('shc-banner'), backdrop=document.getElementById('shc-backdrop'), preferences=document.getElementById('shc-preferences');
  var checks={analytics:document.getElementById('shc-analytics'),advertising:document.getElementById('shc-advertising'),functional:document.getElementById('shc-functional')};
  var firstFocus=null;
  var footerList=document.querySelector('.sh3-utility ul');
  if(footerList&&preferences){var preferenceItem=document.createElement('li');preferences.className='shc-footer-preferences';preferenceItem.appendChild(preferences);footerList.appendChild(preferenceItem)}

  function read(){var m=document.cookie.match(new RegExp('(?:^|; )'+COOKIE.replace(/[.$?*|{}()\[\]\\\/\+^]/g,'\\$&')+'=([^;]*)'));if(!m)return null;try{var p=JSON.parse(decodeURIComponent(m[1]));return p&&p.version===VERSION?p:null}catch(e){return null}}
  function write(p){p.version=VERSION;p.updated=new Date().toISOString();document.cookie=COOKIE+'='+encodeURIComponent(JSON.stringify(p))+'; path=/; max-age='+MONTHS+'; SameSite=Lax; Secure'}
  function expire(name,domain){document.cookie=name+'=; path=/; max-age=0; SameSite=Lax; Secure'+(domain?'; domain='+domain:'')}
  function clean(p){var names=document.cookie.split(';').map(function(v){return v.trim().split('=')[0]});names.forEach(function(n){if((!p.analytics&&/^(_ga|_gid|_gat)/.test(n))||(!p.advertising&&/^(_fbp|_fbc|_gcl_|IDE$|fr$)/.test(n))||(!p.functional&&/^(g_state|session_id|email_id|sib_|wonderpush|wp_wonderpush)/i.test(n))){expire(n);expire(n,location.hostname);expire(n,'.'+location.hostname)}});if(!p.functional&&navigator.serviceWorker){navigator.serviceWorker.getRegistrations().then(function(rs){rs.forEach(function(r){var u=(r.active&&r.active.scriptURL)||(r.installing&&r.installing.scriptURL)||'';if(/wonderpush|mailin|brevo/i.test(u)||/wonderpush/i.test(r.scope||''))r.unregister()})})}}
  function scheduleClean(p){clean(p);[0,500,2000].forEach(function(ms){setTimeout(function(){clean(p)},ms)});window.addEventListener('load',function(){clean(p)},{once:true})}
  function cloneScript(old,p){return new Promise(function(resolve){if(old.dataset.shActivated){resolve();return}old.dataset.shActivated='1';var deferredSrc=old.getAttribute('data-sh-consent-src')||old.getAttribute('src');var code=old.textContent;var s=document.createElement('script');Array.from(old.attributes).forEach(function(a){if(a.name!=='type'&&a.name!=='src'&&a.name!=='data-sh-consent-category'&&a.name!=='data-sh-consent-src'&&a.name!=='data-sh-activated')s.setAttribute(a.name,a.value)});if(old.dataset.shConsentCategory==='google'){if(p.analytics&&!p.advertising){if(deferredSrc)deferredSrc=deferredSrc.replace('id=GT-KFNBBKFH','id=G-KFNBBKFH');code=code.replace(/gtag\(\"config\", \"GT-KFNBBKFH\", ([^;]+);/,'gtag(\"consent\",\"update\",{\"analytics_storage\":\"granted\",\"ad_storage\":\"denied\",\"ad_user_data\":\"denied\",\"ad_personalization\":\"denied\"});\\ngtag(\"config\", \"G-KFNBBKFH\", $1;').replace(/\s*gtag\(\"config\", \"AW-18039187336\"\);/,'')}else if(!p.analytics&&p.advertising){if(deferredSrc)deferredSrc=deferredSrc.replace('id=GT-KFNBBKFH','id=AW-18039187336');code=code.replace(/\s*gtag\(\"config\", \"GT-KFNBBKFH\", [^;]+;/,'').replace('gtag(\"config\", \"AW-18039187336\");','gtag(\"consent\",\"update\",{\"analytics_storage\":\"denied\",\"ad_storage\":\"granted\",\"ad_user_data\":\"granted\",\"ad_personalization\":\"granted\"});\\ngtag(\"config\", \"AW-18039187336\");')}else if(p.analytics&&p.advertising){code=code.replace('gtag(\"config\", \"GT-KFNBBKFH\",','gtag(\"consent\",\"update\",{\"analytics_storage\":\"granted\",\"ad_storage\":\"granted\",\"ad_user_data\":\"granted\",\"ad_personalization\":\"granted\"});\\ngtag(\"config\", \"GT-KFNBBKFH\",')}}if(deferredSrc){s.onload=resolve;s.onerror=resolve;s.src=deferredSrc;old.replaceWith(s)}else{s.text=code;old.replaceWith(s);resolve()}})}
  async function activate(p){var scripts=Array.from(document.querySelectorAll('script[type="application/x-sh-consent"][data-sh-consent-category]'));for(var i=0;i<scripts.length;i++){var c=scripts[i].dataset.shConsentCategory;var allowed=c==='google'?p.analytics:p[c];if(allowed)await cloneScript(scripts[i],p)}}
  function showBanner(){banner.classList.add('is-visible');banner.setAttribute('aria-hidden','false');preferences.classList.remove('is-visible')}
  function hideBanner(){banner.classList.remove('is-visible');banner.setAttribute('aria-hidden','true');preferences.classList.remove('is-visible')}
  function openManager(){var p=read()||{analytics:false,advertising:false,functional:false};Object.keys(checks).forEach(function(k){checks[k].checked=!!p[k]});firstFocus=document.activeElement;backdrop.classList.add('is-visible');backdrop.setAttribute('aria-hidden','false');document.documentElement.classList.add('shc-lock');setTimeout(function(){checks.analytics.focus()},20)}
  function closeManager(){backdrop.classList.remove('is-visible');backdrop.setAttribute('aria-hidden','true');document.documentElement.classList.remove('shc-lock');if(firstFocus&&firstFocus.focus)firstFocus.focus()}
  function apply(p){var before=read();write(p);scheduleClean(p);hideBanner();closeManager();if(before&&((before.analytics&&!p.analytics)||(before.advertising&&!p.advertising)||(before.functional&&!p.functional))){location.reload();return}activate(p)}
  document.addEventListener('click',function(e){var b=e.target.closest('[data-shc-action]');if(!b)return;var a=b.dataset.shcAction;if(a==='manage')openManager();if(a==='close')closeManager();if(a==='accept')apply({analytics:true,advertising:true,functional:true});if(a==='reject')apply({analytics:false,advertising:false,functional:false});if(a==='save')apply({analytics:checks.analytics.checked,advertising:checks.advertising.checked,functional:checks.functional.checked})});
  document.addEventListener('keydown',function(e){if(e.key==='Escape'&&backdrop.classList.contains('is-visible'))closeManager()});
  var saved=read();if(saved){hideBanner();scheduleClean(saved);activate(saved)}else{scheduleClean({analytics:false,advertising:false,functional:false});showBanner()}
}());
</script>
SH_CONSENT_UI;

        $ui   = str_replace( '__PRIVACY_URL__', $privacy_url, $ui );
        $html = preg_replace( '/<\/body>/i', $ui . '</body>', $html, 1 );

        return $html;
    }

    function sanctuary_consent_filter_headers() {
        $consent = sanctuary_consent_cookie();
        $headers = headers_list();
        $keep    = array();
        $changed = false;

        foreach ( $headers as $header_line ) {
            if ( 0 !== stripos( $header_line, 'Set-Cookie:' ) ) {
                continue;
            }

            $remove = ( ! $consent['advertising'] && preg_match( '/Set-Cookie:\s*(?:_fbp|_fbc|_gcl_|IDE=|fr=)/i', $header_line ) )
                || ( ! $consent['analytics'] && preg_match( '/Set-Cookie:\s*(?:_ga|_gid|_gat)/i', $header_line ) );

            if ( $remove ) {
                $changed = true;
            } else {
                $keep[] = $header_line;
            }
        }

        if ( $changed ) {
            header_remove( 'Set-Cookie' );
            foreach ( $keep as $header_line ) {
                header( $header_line, false );
            }
        }
    }

    function sanctuary_consent_bootstrap() {
        if ( is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
            return;
        }

        if ( function_exists( 'header_register_callback' ) ) {
            header_register_callback( 'sanctuary_consent_filter_headers' );
        }

        ob_start( 'sanctuary_consent_filter_html' );
    }
    /* Start before optimisation plugins open their HTML buffers. This makes
     * our privacy filter the outermost buffer, so the consent manager itself
     * is inserted only after SiteGround has finished rewriting scripts. */
    add_action( 'init', 'sanctuary_consent_bootstrap', -10000 );
}


/* Sanctuary Ahrefs Web Analytics (consent-gated). */
function sanctuary_output_ahrefs_web_analytics() {
    if ( is_admin() ) {
        return;
    }

    echo '<script type="application/x-sh-consent" data-no-delay-js data-sgoptout data-sh-consent-category="analytics" src="https://analytics.ahrefs.com/analytics.js" data-key="zhwRd0koo4DvEXnOe6zlRA" async></script>' . "\n";
}
add_action( 'wp_head', 'sanctuary_output_ahrefs_web_analytics', 20 );
