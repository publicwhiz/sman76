<?php
/* Top Header part for educavo Theme
*/
global $educavo_option;
$mobile_hide_topbar = (!empty($educavo_option['mobile_top_bar'])) ? 'mobile-hide-topbars' : '';
require get_parent_theme_file_path('inc/header/header-options.php');
?>

<?php if ( is_active_sidebar( 'topbar-1' ) || is_active_sidebar( 'topbar-2' ) ) { ?>
<div class="toolbar-area toolbar-area-custom <?php echo esc_attr($mobile_hide_topbar);?>">
    <div class="<?php echo esc_attr($header_width);?>">
        <div class="row align-items-center">
            <?php if ( is_active_sidebar( 'topbar-1' ) ) { ?>
                <div class="col-lg-6">
                    <?php dynamic_sidebar( 'topbar-1' ); ?>
                </div>
            <?php } ?>
            <?php if ( is_active_sidebar( 'topbar-2' ) ) { ?>
                <div class="col-lg-6 rs-top-right-last">
                    <?php dynamic_sidebar( 'topbar-2' ); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>