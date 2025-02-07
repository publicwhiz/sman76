<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$course_id      = get_the_ID();
$course = LP_Global::course();
$rstheme_course = LP_Global::course();
if ( empty( $rstheme_course ) ) return;
    $rstheme_course      = LP_Global::course();
    $course_enroll_count = $rstheme_course->get_users_enrolled();
    $course_enroll_count = $course_enroll_count ? $course_enroll_count : 0;

    if ( empty( $rstheme_course ) ) return;

    $course_author       = get_post_field( 'post_author', $course_id );
    $course_author       = get_post_field( 'post_author', $course_id );
    $course_enroll_count = $course_enroll_count ? $course_enroll_count : 0; 
    $lessons             = $rstheme_course->get_curriculum_items( 'lp_lesson' )? count( $rstheme_course->get_curriculum_items( 'lp_lesson' ) ) : 0;

if ( function_exists( 'learn_press_get_course_rate' ) ) {
    $course_rate_res   = learn_press_get_course_rate( $course_id, false );
    $course_rate       = $course_rate_res['rated'];
    $course_rate_total = $course_rate_res['total'];
    $course_rate_text  = $course_rate_total > 1 ? esc_html__( 'Reviews', 'educavo' ) : esc_html__( 'Review', 'educavo' );
}

$taxonomy  = 'course_category'; 
$cats_show = get_the_term_list( $course_id, $taxonomy, ' ', '<span class="separator">,</span> ');   
$lrn_prs_ar_crs_layout       = get_option( 'learn_press_archive_courses_layout', 'grid' );
$lrn_prs_ar_crs_layout = ($lrn_prs_ar_crs_layout) ? $lrn_prs_ar_crs_layout : '' ;
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="rs-courses rs_course_style1 rs__archive_<?php echo esc_html($lrn_prs_ar_crs_layout); ?>">
    <?php
        $course_id = get_the_ID();
        $course = LP_Global::course();
        $rstheme_course = LP_Global::course();
        if ( empty( $rstheme_course ) ) return;
            $rstheme_course      = LP_Global::course();
            $course_enroll_count = $rstheme_course->get_users_enrolled();
            $course_enroll_count = $course_enroll_count ? $course_enroll_count : 0;

            if ( empty( $rstheme_course ) ) return;

            $course_author       = get_post_field( 'post_author', $course_id );
            $course_author       = get_post_field( 'post_author', $course_id );
            $course_enroll_count = $course_enroll_count ? $course_enroll_count : 0; 
            $lessons             = $rstheme_course->get_curriculum_items( 'lp_lesson' )? count( $rstheme_course->get_curriculum_items( 'lp_lesson' ) ) : 0;

        if ( function_exists( 'learn_press_get_course_rate' ) ) {
            $course_rate_res   = learn_press_get_course_rate( $course_id, false );
            $course_rate       = $course_rate_res['rated'];
            $course_rate_total = $course_rate_res['total'];
            $course_rate_text  = $course_rate_total > 1 ? esc_html__( 'Reviews', 'educavo' ) : esc_html__( 'Review', 'educavo' );
        }

        $taxonomy  = 'course_category'; 
        $cats_show = get_the_term_list( $course_id, $taxonomy, ' ', '<span class="separator">,</span> ');     

    ?>

        <div class="courses-item">
            <div class="img-part">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
            </div>
            <div class="content-part">
                <ul class="meta-part">
                    <li> 
                        <div class="course-price">
                            <span class="price"> 
                                <?php if ( $course->has_sale_price() ) { ?>
                                    <del class="rs_sale-price"> <?php echo wp_kses_post($course->get_regular_price_html());  ?></del>
                                <?php } ?> 
                                <?php echo wp_kses_post($course->get_price_html()); ?>
                            </span>
                        </div>                    
                    <li class="cat"><?php echo wp_kses($cats_show, 'educavo'); ?></li>
                </ul>

                <h3 class="title">
                    <a href="<?php the_permalink();?>"> <?php the_title();?> </a>
                </h3>            
                <?php 
                    if ( $lrn_prs_ar_crs_layout == 'list') {
                        the_excerpt();
                    }
                ?>
                <div class="bottom-part">
                    <div class="info-meta">
                        <ul>
                            <li class="user"><i class="far fa-user"></i> <?php echo esc_html($course_enroll_count); ?> </li>
                            <?php if ( function_exists( 'learn_press_get_course_rate' ) ) { ?>
                            <li class="course-ratings">
                                <?php learn_press_course_review_template( 'rating-stars.php', array( 'rated' => $course_rate ) );?><div class="course-rating-total"> 
                                (<?php echo esc_html( $course_rate_total );?>)</div>
                            </li> <?php } ?>
                        </ul>
                    </div>
                    <div class="btn-part">
                        <a href="<?php the_permalink();?>"><i class="educavoicon-right-arrow"></i></a>                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
