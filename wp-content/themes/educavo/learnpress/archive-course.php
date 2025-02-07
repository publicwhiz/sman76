<?php
/**
 * Template for displaying archive course content.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-archive-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */
/**
 * Prevent loading this file directly
 */

defined( 'ABSPATH' ) || exit();

global $post, $wp_query, $lp_tax_query, $wp_query, $educavo_option;


/**
 * 
 *
 * @see LP_Template_General::template_header()
 */
do_action( 'learn-press/template-header' );

/**
 * LP Hook
 */
do_action( 'learn-press/before-main-content' );

$page_title = learn_press_page_title( false );
?>

<?php
global $post, $wp_query, $lp_tax_query, $wp_query;
$show_description = get_theme_mod( 'thim_learnpress_cate_show_description' );
$show_desc        = !empty( $show_description ) ? $show_description : '';
$cat_desc         = term_description();
$total            = $wp_query->found_posts;

if ( $total == 0 ) {
    $message = '<p class="message message-error">' . esc_html__( 'No courses found!', 'educavo' ) . '</p>';
    $index   = esc_html__( 'There are no available courses!', 'educavo' );
}elseif ( $total == 1 ) {
    $index = esc_html__( 'Showing only one result', 'educavo' );
}else {
    $courses_per_page = absint( LP()->settings->get( 'archive_course_limit' ) );
    $paged            = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $from             = 1 + ( $paged - 1 ) * $courses_per_page;
    $to               = ( $paged * $courses_per_page > $total ) ? $total : $paged * $courses_per_page;
    if ( $from == $to ) {
        $index = sprintf(
            esc_html__( 'Showing last course of %s results', 'educavo' ),
            $total
        );
    } else {
        $index = sprintf(
            esc_html__( 'Showing %s-%s of %s results', 'educavo' ),
            $from,
            $to,
            $total
        );
    }
}
?>

<?php
    $course_layout=''; 

    if(!empty($educavo_option['course-layout'])){
        $course_layout = !empty($educavo_option['course-layout']) ? $educavo_option['course-layout'] : '';
        if($course_layout == 'full')
        {
           $layout ='full-layout'; 
        } 
        elseif($course_layout == '2left')
        {
          $layout = 'full-layout-left';  
        }
        elseif($course_layout == '2right')
        {
           $layout = 'full-layout-right'; 
        } 
        else{
            $course_layout = ''; 
        }
    }
    else{
        $course_layout =''; 
        $layout      ='';
    }
    $lrn_prs_ar_crs_layout       = get_option( 'learn_press_archive_courses_layout', 'grid' );
    $lrn_prs_ar_crs_layout = ($lrn_prs_ar_crs_layout) ? $lrn_prs_ar_crs_layout : '' ;
?>
<div class="all-archives course_<?php echo esc_attr( $layout) ?>">
<div class="all-archives-left">
<div class="rs-course-archive-top"> 
    <div class="row">
        <div class="col-lg-6">
            <div class="course-left">
                <div class="course-icons">
                    <?php if ( $lrn_prs_ar_crs_layout === 'grid') { ?>
                        <a href="#" class="rs-grid active-grid"><i class="fa fa-th-large"></i></a>
                    <?php } ?>
                    <a href="#" class="rs-list active-list"><i class="fa fa-list-ul"></i></a>
                </div>
                <div class="course-index">
                    <span><?php echo esc_html( $index ); ?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="rs-search">
                <form method="get" action="<?php echo esc_url( get_post_type_archive_link( 'lp_course' ) ); ?>">
                    <input type="hidden" name="ref" value="course">
                    <input type="text" value="<?php echo isset($_REQUEST['search_query']) ? $_REQUEST['search_query'] : ''; ?>" name="search_query" placeholder="<?php esc_attr_e( 'Search our courses', 'educavo' ) ?>" class="form-control" />
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
global  $paged;

$category = get_queried_object_id(); 

$s = isset($_REQUEST['search_query']) ? $_REQUEST['search_query'] : '';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if(!empty($category) && empty($s)){
    
    $best_wp = new wp_Query(array(
        'post_type'           => 'lp_course',
        'posts_per_page' => LP()->settings->get('learn_press_archive_course_limit') ,
        'ignore_sticky_posts' => 1,  
        'paged'          => $paged,
        'tax_query' => array(
            array(
             'taxonomy' => 'course_category', //double check your taxonomy name in you dd 
             'field'    => 'id',
             'terms'    => $category,
            ),
        )
    ));  
}
    elseif(!empty($s)){
    $best_wp = new wp_Query(array(
        'post_type'           => 'lp_course',
        'posts_per_page' => LP()->settings->get('learn_press_archive_course_limit') ,
        'ignore_sticky_posts' => 1,  
        's' =>  $s,
    ));  
}
    
    else{
        $best_wp = new wp_Query(array(
        'post_type'           => 'lp_course',
        'posts_per_page' => LP()->settings->get('learn_press_archive_course_limit') ,
        'ignore_sticky_posts' => 1,  
        'paged'          => $paged
    ));   
}


if ( have_posts() ) :   
    learn_press_begin_courses_loop();
    while($best_wp->have_posts()): $best_wp->the_post();
        learn_press_get_template_part( 'content', 'course' );
    endwhile;

    $paginate = paginate_links( array(
        'total' => $best_wp->max_num_pages
    ));

    $pagination_type  =  LP_Settings::get_option( 'course_pagination_type', 'number' );    

    if ( $pagination_type != '') {
        } else {
        if(!empty($paginate )){ ?>
            <div class="rs-pagination-area"><div class="nav-links"><?php echo wp_kses_post($paginate); ?></div></div>
        <?php } 
    }
    LP()->template( 'course' )->end_courses_loop();

    /**

     * @since 3.0.0

     */

    do_action( 'learn_press_after_courses_loop' );
    /**

     * @deprecated

     */
    do_action( 'learn-press/after-courses-loop' );
    wp_reset_postdata();
     
else:
    learn_press_display_message( __( 'No course found.', 'educavo' ), 'error' );
endif;

?>
</div>

<?php if ( $course_layout == '2left' || $course_layout == '2right') : ?>
    <div class="course-sidebar-secondary bs-sidebar">
        <?php dynamic_sidebar( 'archive-courses-sidebar' ); ?>
    </div>
<?php endif; ?>
</div>
<?php

/**
 * @since 4.0.0
 *
 * @see   LP_Template_General::template_footer()
 */
do_action( 'learn-press/template-footer' );
