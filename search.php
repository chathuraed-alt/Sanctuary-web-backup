<?php

get_header(); 
global $wp_query;

?>

            <!-- Slider -->
            <div class="main-banner about-banner">
                <div class="page-title">
                    <h2>Search Results</h2>
                </div>
            </div>

            <!-- About -->
            <div class="search-intro-wrapper">
                <div class="row container">
                    <div class="col-md-1"></div>
                    <div class="col-xs-12 col-md-10">
                       

                        <h1 class="search-title"> <?php echo $wp_query->found_posts; ?>
                            <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>" </h1>

                            <?php if ( have_posts() ) { ?>

                                <div class="search-result-wrapper">

                                <?php while ( have_posts() ) { the_post(); ?>

                                   <div class="search-result">
                                     <h3><a href="<?php echo get_permalink(); ?>">
                                       <?php the_title();  ?>
                                     </a></h3>
                                     <?php  the_post_thumbnail('medium') ?>
                                     <p><?php echo get_the_excerpt(); ?></p>
                                     <div> <a class="btn btn-green" href="<?php the_permalink(); ?>">Read More <i class="btn-arrow"></i></a></div>
                                     <hr>
                                   </div>
                                   

                                <?php } ?>

                                </div>

                               
                               
                               <div class="search-pagination-wrapper">
                                   <div class="pagination">
                                        <?php $args = array(
                                           'base'               => '%_%',
                                           'format'             => '?paged=%#%',
                                           'total'              => 1,
                                           'current'            => 0,
                                           'show_all'           => false,
                                           'end_size'           => 1,
                                           'mid_size'           => 2,
                                           'add_args'           => false,
                                           'add_fragment'       => '',
                                           'before_page_number' => '',
                                           'after_page_number'  => ''); ?>
                                        
                                        <!-- Put this where you want the paginate_links to appear -->
                                        <?php echo paginate_links( array(
                                        
                                          'prev_text' => '<span>Previous</span>',
                                          'next_text' => '<span>Next</span>'
                                        
                                        )); ?>
                                    </div>
                                </div>

                            <?php } ?>


                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>

    

<?php get_footer(); ?>
