<?php
/*
 Template Name: Bathware Completed
*/

get_header(); ?>

<link rel="stylesheet" href="<?php print THEMEROOT;?>/css/isotope-docs.css?6" media="screen">
            <!-- Slider -->
            <div class="main-banner project-banner">
                <div class="page-title">
                    <h2>Projects</h2>
                </div>
            </div>

      

            <!-- Projects -->
            <div class="project-intro-wrapper">
                <div class="row container text-center">
                    <div class="col-md-1"></div>
                    <div class="col-xs-12 col-md-10">
                        <div class="project-intro">
                            <div class="title-header center-align center-align-mobile green-header">
                                <h3>We Have Done 100+ Projects</h3>
                                <p>Premium Bathware Designs</p>
                                <span class="long-line"></span>
                                <span class="short-line"></span>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>


            <div class="projects-wrapper">
                <div class="row container">
                  
                    <div class="project-content">
                        
                        <div class="main-category">
                            <a class="btn btn-green active" href="/sanctuaryholdings/bathware-completed/">Completed</a>
                            <a class="btn btn-green" href="/sanctuaryholdings/bathware-ongoing/">Ongoing</a>
                        </div>

                        <div class="big-demo go-wide" data-js="filtering-demo">
                          <div class="filter-button-group button-group js-radio-button-group">
                            <button class="button is-checked" data-filter="*">show all</button>
                            <button class="button" data-filter=".Residences">Residences</button>
                            <button class="button" data-filter=".Hotels">Hotels</button>
                            <button class="button" data-filter=".Apartments">Apartments</button>
                            <button class="button" data-filter=".Government">Government</button>
                            
                          </div>

                         

                          <div class="grid">

                            <?php
                                $args = array(
                                'post_type'   => 'projects',
                                'post_status' => 'publish',
                                'orderby'   => 'menu_order',
                                'order'               => 'DESC',
                                'posts_per_page' => -1,
                                'category_name'  => 'completed-bathware'
                                );
                                $query = new WP_Query( $args );  

                                $i = 1;
                                  while($query->have_posts()):$query->the_post(); ?>
                                 

                        
                              <div class="col-xs-12 col-md-3 element-item <?php the_field( 'type' ); ?> " data-category="transition">
                                   <?php $featured_img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                   <div class="img-container">
                                        <img alt="project-<?php echo $i; ?>" class="project-image-main" src="<?php echo $featured_img_url; ?>">
                                        <a class="middle" href="<?php echo get_post_permalink(); ?>">
                                            <span class="btn btn-green">Read More<i class="btn-arrow"></i></span>
                                        </a>
                                   </div>    
                                  
                                    <h3><?php the_title(); ?></h3>
                              </div>
                         

                              <?php $i++ ; endwhile;?>
                             
                              
                          </div>

                          
                        </div>
                    


                    </div>
                </div>

            </div>

 
<?php get_footer(); ?>

<script src="<?php print THEMEROOT;?>/js/isotope-docs.min.js?6"></script> 