<?php 
global $educavo_option;
$rs_offcanvas = get_post_meta(get_the_ID(), 'show-off-canvas', true);
$logo_height = !empty($educavo_option['logo-height']) ? 'style = "max-height: '.$educavo_option['logo-height'].'"' : '';
    //off convas here
?>
    
<nav class="menu-wrap-off nav-container nav menu-ofcn">       
<div class="inner-offcan">
    <div class="nav-link-container">  
        <a href='#' class="nav-menu-link close-button" id="close-button2">              
            <div class="hamburger1"></div>
            <div class="hamburger3"></div>
        </a> 
    </div> 
    <div class="sidenav offcanvas-icon">
            <div id="mobile_menu" class="rs-offcanvas-inner-left">
                <?php
                    if ( has_nav_menu( 'menu-1' ) ) {
                        // User has assigned menu to this location;
                        // output it
                        ?>                                
                            <div class="widget widget_nav_menu mobile-menus">  
                            <?php $mobile_off_logo_height = !empty($educavo_option['mobile_off_logo_height']) ? 'style="height: '.$educavo_option['mobile_off_logo_height'].'"' : '';
                                $mobile_off_contact_margin_top = !empty($educavo_option['mobile_off_contact_margin_top']) ? 'style="margin-top: '.$educavo_option['mobile_off_contact_margin_top'].'"' : '';    
                                if (!empty( $educavo_option['mobile_off_logo']['url'] ) ) { ?>
                                    <div class="mobile_off_logo">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($mobile_off_logo_height, 'educavo');?> src="<?php echo esc_url( $educavo_option['mobile_off_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
                                    </div>
                                <?php }

                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-1',
                                        'menu_id'        => 'primary-menu-single1',
                                    ) );

                                    if (!empty($educavo_option['mobile_off_contact_number'])) { ?>
                                        <div class="mobile_off_contact_number" <?php echo wp_kses($mobile_off_contact_margin_top, 'educavo');?>>
                                            <i class="educavoicon-call"></i>
                                            <div>
                                                <span class="text-body-color"><?php esc_html_e('Call Us', 'educavo') ?></span>
                                                <a href="tel:<?php echo esc_attr( $educavo_option['mobile_off_contact_number'] ) ?>"><?php echo esc_html( $educavo_option['mobile_off_contact_number'] ) ?></a>
                                            </div>
                                        </div>
                                    <?php }
                                ?>
                            </div>                                
                        <?php
                    }
                    ?>
            </div>            
        <?php 
        if(!empty( $educavo_option['off_canvas'] ) || ($rs_offcanvas == 'show') ){
            $off = $educavo_option['off_canvas'];
            if( ($off == 1) || ($rs_offcanvas == 'show')){ ?>            
            <div class="rs-innner-offcanvas-contents"> 

                <?php $offcanvas_logo_height = !empty($educavo_option['offcanvas_logo_height']) ? 'style="height: '.$educavo_option['offcanvas_logo_height'].'"' : '';

                if (!empty( $educavo_option['offcanvas_logo']['url'] ) ) { ?>
                    <div class="offcanvas_logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($offcanvas_logo_height, 'educavo');?> src="<?php echo esc_url( $educavo_option['offcanvas_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
                    </div>
                <?php }
                 dynamic_sidebar('sidebarcanvas-1');?>
            </div>            
            <?php }
        }?>
    </div>
    </div>
</nav>