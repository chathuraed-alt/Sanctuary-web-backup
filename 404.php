<?php

get_header(); 


?>

            <!-- Slider -->
            <div class="main-banner about-banner">
                <!-- <div class="page-title">
                    <h2>About</h2>
                </div> -->
            </div>

            <!-- About -->
            <div class="error-intro-wrapper">
                <div class="row container text-center">
                    <div class="col-md-1"></div>
                    <div class="col-xs-12 col-md-10">
                       

                        <h1 class="error-title"> 404 Error </h1>

                        <div class="error-result-wrapper">
                            <img class="error-image" src="<?php print THEMEROOT;?>/images/404-image.png" alt="404-image">
                            <h3>Please <a href="<?php bloginfo('home'); ?>" Click here</a> to return to our home page, or you can wait to be redirected in 10 seconds.</h3>
                        </div>



                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>

    
<script>
//   setTimeout(function(){ window.location = "<?php echo get_home_url(); ?>"; },10000);  
    
    
</script>
<?php get_footer(); ?>
