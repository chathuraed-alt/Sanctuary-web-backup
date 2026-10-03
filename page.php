<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */


/**
 * Keep the Downloads catalogue cards synchronized with partner catalogue fields.
 * The card's Brand details link supplies the partner slug; catalogue URL and cover
 * are always read from the current partner post.
 */
if ( ! function_exists( 'sh_sync_catalogue_cards' ) ) {
    function sh_sync_catalogue_cards( $content ) {
        if ( ! is_page( 'catalogues-technical-resources' ) || ! in_the_loop() || ! is_main_query() ) {
            return $content;
        }

        return preg_replace_callback(
            '#<article class="cc">.*?</article>#s',
            function ( $matches ) {
                $card = $matches[0];

                if ( ! preg_match( '#href="/partners/([^/]+)/"[^>]*>Details#', $card, $slug_match ) ) {
                    return $card;
                }

                $partner = get_page_by_path( sanitize_title( $slug_match[1] ), OBJECT, 'partners' );
                if ( ! $partner ) {
                    return $card;
                }

                $catalogue_url = function_exists( 'get_field' ) ? trim( (string) get_field( 'catalogue_url', $partner->ID ) ) : '';
                if ( '' === $catalogue_url ) {
                    $catalogue_url = trim( (string) get_post_meta( $partner->ID, 'catalogue_url', true ) );
                }

                $cover_url = '';
                if ( function_exists( 'get_field' ) ) {
                    $cover = get_field( 'catalogue_cover', $partner->ID );
                    if ( is_array( $cover ) && ! empty( $cover['url'] ) ) {
                        $cover_url = $cover['url'];
                    } elseif ( is_numeric( $cover ) ) {
                        $cover_url = wp_get_attachment_image_url( (int) $cover, 'full' );
                    } elseif ( is_string( $cover ) ) {
                        $cover_url = $cover;
                    }
                }
                if ( '' === $cover_url ) {
                    $cover_meta = get_post_meta( $partner->ID, 'catalogue_cover', true );
                    if ( is_array( $cover_meta ) && ! empty( $cover_meta['url'] ) ) {
                        $cover_url = $cover_meta['url'];
                    } elseif ( is_numeric( $cover_meta ) ) {
                        $cover_url = wp_get_attachment_image_url( (int) $cover_meta, 'full' );
                    } elseif ( is_string( $cover_meta ) ) {
                        $cover_url = trim( $cover_meta );
                    }
                }

                if ( '' !== $cover_url ) {
                    $card = preg_replace( '#<img src="[^"]*"#', '<img src="' . esc_url( $cover_url ) . '"', $card, 1 );
                }

                if ( '' !== $catalogue_url ) {
                    $button = '<a class="cb" href="' . esc_url( $catalogue_url ) . '" target="_blank" rel="noopener">Open Catalogue</a>';
                    $card = preg_replace( '#<a class="cb"[^>]*>.*?</a>#s', $button, $card, 1 );
                    $card = str_replace( '<em>Catalogue link pending</em>', '', $card );
                }

                return $card;
            },
            $content
        );
    }
    add_filter( 'the_content', 'sh_sync_catalogue_cards', 20 );
}

get_header(); ?>

<div id="page5">
	
	<!-- MAIN PAGE CONTENT -->
	<div class="main" id="single">

		<!-- SINGLE IMG WRAP -->
		<div id="single-img-wrap">


			<!-- CLEAR10 -->
			<div class="clear10"></div>

			<!-- SINGLE WRAP -->
			<div id="single-wrap">

				<!-- BEGIN SINGLE CONTENT -->
				<div id="single-content" class="single-col-page inner_content">

					<!-- BEGIN POST -->
					<div class="post-<?php get_the_ID(); ?> page type-page status-publish hentry" id="post-<?php get_the_ID(); ?>">


						<?php if(have_posts()):while(have_posts()):the_post();?>
                            <?php
                            // One accessible H1 per page: only add the title when the page content has none.
                            ob_start();
                            the_content();
                            $sh_page_content = ob_get_clean();
                            ?>
                            <?php if ( false === stripos( $sh_page_content, '<h1' ) ) : ?>
                                <h1 class="sr-only"><?php the_title(); ?></h1>
                            <?php endif; ?>
                            <?php echo $sh_page_content; ?>
       		            <?php endwhile ; endif;?>


						<!-- END POST -->
					</div>

					<!-- END SINGLE CONTENT -->
				</div>

				<!-- END WHILE -->

				<!-- MAIN PAGE CONTENT -->
			</div>

			<!-- END S1 -->
		</div>

		<!-- END MAIN -->
	</div>

	<!-- END WRAP -->
</div>

<?php get_footer(); ?>
