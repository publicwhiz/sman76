<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); 

?>

        <div class="service-details-area pt-120 pb-90">
            <div class="container">
                <?php 
                if( have_posts() ):
                    while( have_posts() ): the_post();
                        $department_details_thumb = function_exists('get_field') ? get_field('department_details_thumb') : '';
                        $department_info_list = function_exists('get_field') ? get_field('department_info_list') : '';
                        $department_sub_title = function_exists('get_field') ? get_field('department_sub_title') : '';
                        $department_quote_text = function_exists('get_field') ? get_field('department_quote_text') : '';
                        $department_info_thumb = function_exists('get_field') ? get_field('department_info_thumb') : '';
                        $department_features_list = function_exists('get_field') ? get_field('department_features_list') : '';
                        $department_content_list = function_exists('get_field') ? get_field('department_content_list') : '';
                        $gallery_images =  function_exists('acf_photo_gallery') ? acf_photo_gallery('department_gallery', get_the_id()) : ''; 
                        // department short info
                        $department_bottom_text = function_exists('get_field') ? get_field('department_bottom_text') : '';  

                ?>
                <div class="row">
                    <div class="col-xl-12">
                        <article class="service-details-box">
                            <div class="service-details-thumb mb-40">
                                <?php if (!empty($department_details_thumb['url'])) : ?>
                                <img class="img" src="<?php echo esc_url($department_details_thumb['url']); ?>" alt="img">
                                <?php endif; ?>
                                <?php if (!empty($department_info_list)) : ?>
                                <div class="case-info">
                                    <?php echo wp_kses_post($department_info_list); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="section-title pos-rel mb-45">
                                <div class="section-text pos-rel">
                                    <?php if (!empty($department_sub_title)) : ?>
                                    <h5 class="green-color text-up-case"><?php echo wp_kses_post($department_sub_title); ?></h5>
                                    <?php endif; ?>
                                    <h1><?php the_title(); ?><span>.</span></h1>
                                </div>
                            </div>
                            <div class="service-details-text mb-30">
                                <div class="service-content-inner service-excerpt fix mb-30">
                                    <?php if (!empty($department_quote_text)) : ?>
                                    <span><?php echo esc_html($department_quote_text); ?></span>
                                    <?php endif; ?>
                                    <?php the_excerpt(); ?>
                                    </div>
                                <?php the_content(); ?>
                            </div>
                            <div class="row mt-35 mb-40">
                                <?php if (!empty($department_info_thumb['url'])) : ?>
                                <div class="col-xl-5 col-lg-7 col-md-12">
                                    <div class="service_details__thumb2">
                                        <img class="img" src="<?php echo esc_url($department_info_thumb['url']); ?>" alt="img">
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($department_content_list)) : ?>
                                <div class="col-xl-7 col-lg-12 col-md-12">
                                    <div class="service_details__list mt-20 pl-20">
                                        <?php echo wp_kses_post($department_content_list); ?>                                  
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($department_bottom_text)) : ?>
                            <div class="gallery-inner-text mt-40">
                                <?php echo wp_kses_post($department_bottom_text); ?>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($department_features_list)) : ?>
                            <div class="row mt-50 pb-30">
                                <?php echo wp_kses_post($department_features_list); ?>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($gallery_images)) : ?>
                            <div class="service-doctors">
                                <div class="row">
                                    <?php foreach( $gallery_images as $key => $image ) :  ?>
                                    <div class="col-md-6">
                                        <div class="serv-g-image mb-30">
                                            <img src="<?php echo  esc_url($image['full_image_url']); ?>" alt="img">
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </article>
                    </div>
                </div>
                <?php 
                    endwhile; wp_reset_query();
                endif; 
                ?>
            </div>
        </div>


<?php get_footer();  ?>