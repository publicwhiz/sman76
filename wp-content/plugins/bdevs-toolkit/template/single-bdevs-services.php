<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); 

$services_column = is_active_sidebar( 'services-sidebar' ) ? 7 : 12 ;

?>

    <div class="service-details-area pt-120 pb-100">
        <div class="container">
            <?php 
            if( have_posts() ):
                while( have_posts() ): the_post();
                    $department_details_thumb = function_exists('get_field') ? get_field('department_details_thumb') : '';
                    $department_sub_title = function_exists('get_field') ? get_field('department_sub_title') : '';
                    $department_feathures_list = function_exists('get_field') ? get_field('department_feathures_list') : '';

                    $gallery_images =  function_exists('acf_photo_gallery') ? acf_photo_gallery('department_gallery', get_the_id()) : ''; 
                    // video
                    $department_video_image = function_exists('get_field') ? get_field('department_video_image') : '';
                    $department_video_url = function_exists('get_field') ? get_field('department_video_url') : '';

                    // department short info
                    $department_bottom_text = function_exists('get_field') ? get_field('department_bottom_text') : '';  

            ?>
            <div class="row">
                <div class="col-xl-<?php print esc_attr($services_column); ?> col-lg-8">
                    <article class="service-details-box">
                        <?php if (!empty($department_details_thumb['url'])) : ?>
                        <div class="service-details-thumb mb-40">
                            <img src="<?php echo esc_url($department_details_thumb['url']); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="section-title details-section-title pos-rel mb-30">
                            <div class="section-text pos-rel">
                                <?php if (!empty($department_sub_title)) : ?>
                                <h5 class="green-color text-up-case"><?php echo wp_kses_post($department_sub_title); ?></h5>
                                <?php endif; ?>
                                <h2>Project Summery<span>.</span></h2>
                            </div>
                        </div>
                        <div class="service-details-text mb-30">
                            <?php the_content(); ?>
                        </div>
                        <?php if (!empty($department_feathures_list)) : ?>
                        <div class="service-details-feature fix mb-35">
                            <?php echo wp_kses_post($department_feathures_list); ?>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($gallery_images)) : ?>
                        <div class="service-doctors mb-55">
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
                <?php if ( is_active_sidebar( 'services-sidebar' ) ) : ?>
                <div class="col-xl-5 col-lg-4">
                    <?php do_action("beakai_service_sidebar"); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php 
                endwhile; wp_reset_query();
            endif; 
            ?>
        </div>
    </div>


<?php get_footer();  ?>