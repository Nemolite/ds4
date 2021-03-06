<?php

/**
 * Custom slider and the featured posts for the theme.
 */

if ( !function_exists( 'ds4_awaken_featured_posts' ) ) :

    function ds4_awaken_featured_posts() {

        $category = get_theme_mod( 'slider_category', '' );

        $slider_posts = new WP_Query( array(
                'posts_per_page' => 5,
                'cat'	=>	$category
            )
        ); 
        
        ?>

        <div class="awaken-featured-container">
            <div class="awaken-featured-posts" id="ds4-left">
                <?php do_action('ds4_chif_block');?>           
            </div> <!-- .awaken-featured-posts -->  
            <div class="awaken-featured-slider" id="ds4-right">
                <div class="infoblock">
                    <?php do_action('ds4_infoblock_welcome');?>
                </div>                              
                <section class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php while( $slider_posts->have_posts() ) : $slider_posts->the_post(); ?>

                                <li>
                                    <div class="awaken-slider-container">
                                        <?php
                                            if ( has_post_thumbnail() ) {
                                                $thumb_id           = get_post_thumbnail_id();
                                                $thumb_url_array    = wp_get_attachment_image_src($thumb_id, 'featured-slider', true);
                                                $featured_image_url = $thumb_url_array[0]; 
                                            } else {
                                                $featured_image_url = get_template_directory_uri() . '/images/slide.jpg';
                                            }
                                        ?>
                                        <div class="awaken-slide-holder" style="background: url(<?php echo $featured_image_url; ?>);">
                                            <div class="awaken-slide-content">
                                                <div class="awaken-slider-details-container">
                                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><h3 class="awaken-slider-title"><?php the_title(); ?></h3></a>
                                                </div>
                                            </div><!-- .awaken-slide-content -->
                                        </div><!--.awaken-slide-holder-->
                                    </div>
                                </li>

                            <?php endwhile; ?>
                        </ul>
                    </div>
                </section>
                <div class="docblock">
                <?php do_action('ds4_docblock');?>
                </div>
            </div><!-- .awaken-slider -->
           
        </div>
    <?php
    }

endif;