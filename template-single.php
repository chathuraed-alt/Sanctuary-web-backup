<?php
/*
 Template Name: Single page
*/

get_header(); ?>

            <h1 class="sr-only"><?php echo esc_html( get_the_title( get_queried_object_id() ) ); ?></h1>


            <div class="main-banner contact-banner">
                <!--<div class="page-title">-->
                <!--    <h2>Contact</h2>-->
                <!--</div>-->
            </div>

            <!-- news List -->
            <div class="privacy-content-wrapper">
                <div class="row container">
                    <div class="col-xs-12 col-md-1"></div>
                    <div class="col-xs-12 col-md-10">
                        <div class="title-header center-align green-header">
                            <h3>Privacy Policy</h3>
                            <span class="long-line"></span>
                            <span class="short-line"></span>
                        </div>
                        <div class="privacy-body-content">
                            <?php
                                wp_reset_query(); // necessary to reset query
                                while ( have_posts() ) : the_post();
                                    the_content();
                                endwhile; // End of the loop.
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-1"></div>
                </div>

            </div>

<?php get_footer(); ?>