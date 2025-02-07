<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package beakai
 */

/**
*
* beakai header
*/

function beakai_check_header() {
    $_id = get_the_ID();
    if ( is_single() && 'product' == get_post_type() ) { 
        $_id = wc_get_page_id('shop');
    } 
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }

    $beakai_header_style = function_exists('get_field') ? get_field( 'header_style', $_id ) : NULL;
    $beakai_default_header_style = get_theme_mod('choose_default_header', __('header-style-1','beakai') );

    if( $beakai_header_style == 'header-style-1' ) {
        beakai_header_style_1();
    }
    elseif( $beakai_header_style == 'header-style-2' ) {
        beakai_header_style_2();
    }  
    elseif( $beakai_header_style == 'header-style-3' ) {
        beakai_header_style_3();
    }    
    elseif( $beakai_header_style == 'header-style-4' ) {
        beakai_header_style_4();
    }  
    else {
        
        /** default header style **/
        if($beakai_default_header_style == 'header-style-2') {
            beakai_header_style_2();
        }
        elseif($beakai_default_header_style == 'header-style-3') {
            beakai_header_style_3();
        }
        elseif($beakai_default_header_style == 'header-style-4') {
            beakai_header_style_4();
        }
        else {
            beakai_header_style_1();
        }
    }

}
add_action('beakai_header_style', 'beakai_check_header', 10);

/**
* header style 1 + default
*/

function beakai_header_style_1() {
    // top info
    $beakai_mail_id = get_theme_mod('beakai_mail_id', __('info@example.com','beakai'));
    $beakai_phone = get_theme_mod('beakai_phone',__('+1 800 833 9780','beakai'));
    $beakai_address = get_theme_mod('beakai_address', __('58 Howard Street #2 San Francisco','beakai'));

    $beakai_topbar_switch = get_theme_mod('beakai_topbar_switch', false);
    $beakai_cart_hide = get_theme_mod('beakai_cart_hide', false);
    $beakai_show_button = get_theme_mod('beakai_show_button', false);
    $beakai_show_cta = get_theme_mod('beakai_show_cta', false);
    $beakai_hamburger_hide = get_theme_mod('beakai_hamburger_hide', false);
    $beakai_show_header_search = get_theme_mod('beakai_show_header_search' , false);
    $beakai_header_right = get_theme_mod('beakai_header_right', false);

    if (rtl_enable()) {
        $btn_text = get_theme_mod('beakai_button_text_rtl', __('Get A Quote','beakai'));
    }
    else { 
        $btn_text = get_theme_mod('beakai_button_text', __('Get A Quote','beakai'));
    }
    
    $btn_link = get_theme_mod('beakai_button_link', __('#','beakai'));

    $sticky_header_switch   = get_theme_mod('sticky_header_switch');
    $sticky_class = !empty($sticky_header_switch) ? 'sticky-header' : 'no-sticky';

    ?>

    <!-- header begin -->
    <header>
        <?php if( !empty($beakai_topbar_switch) ): ?>
        <div class="top-bar d-none d-md-block pt-15 pb-15">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-8 col-lg-8 col-md-7">
                        <div class="header-info">
                            <?php if( !empty($beakai_address) ): ?>
                            <span class="header-address"><i class="fa fa-map-marker-alt"></i> <?php print esc_html($beakai_address); ?></span>
                            <?php endif;  ?>

                            <?php if( !empty($beakai_phone) ): ?>
                            <span class="header-phone"><a href="tel:<?php print esc_attr($beakai_phone); ?>"><i class="fas fa-phone"></i><?php print esc_html($beakai_phone); ?></a></span>
                            <?php endif;  ?>

                            <?php if( !empty($beakai_mail_id) ): ?>
                            <span class="header-email"><a href="mailto:<?php print esc_attr($beakai_mail_id); ?>"><i class="fas fa-envelope"></i> <?php print esc_html($beakai_mail_id); ?></a></span>
                            <?php endif;  ?>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 d-none d-md-block">
                        <div class="header-social-icons header-social-icons-black f-right">
                            <?php beakai_header_social_profiles(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;  ?>
        <!-- menu-area -->
        <div id="<?php echo esc_attr( $sticky_class ); ?>" class="header-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-8 d-flex align-items-center">
                        <div class="logo">
                            <?php beakai_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 d-none d-lg-block">
                        <?php if( !empty($beakai_header_right) ): ?>
                        <?php if( !empty($btn_link) ): ?>
                        <div class="header-right f-right d-none d-lg-block">
                            <a href="<?php print esc_url( $btn_link ); ?>" class="bt-btn btn-h-white"><?php print esc_html($btn_text); ?></a>
                        </div>
                        <?php endif;  ?>
                        <?php endif;  ?>
                        <div class="header__menu f-right">
                            <nav id="mobile-menu">
                                <?php beakai_header_menu(); ?>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7 col-4 d-block d-xl-none d-lg-none text-right">
                        <div class="open-mobile-menu">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- slide-bar start -->
    <aside class="slide-bar">
        <div class="close-mobile-menu">
            <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
        </div>

        <nav class="side-mobile-menu">
            <?php beakai_mobile_menu(); ?>
        </nav>
    </aside>
    <div class="body-overlay"></div>
    <!-- slide-bar end -->

    
<?php 
}

/**
* header style 2 
*/
function beakai_header_style_2() {
    $beakai_topbar_switch = get_theme_mod('beakai_topbar_switch', false);
    $beakai_cart_hide = get_theme_mod('beakai_cart_hide', false);
    $beakai_show_button = get_theme_mod('beakai_show_button', false);
    $beakai_show_header_search = get_theme_mod('beakai_show_header_search' , false);

    $beakai_header_right = get_theme_mod('beakai_header_right', true);

    if (rtl_enable()) {
        $btn_text = get_theme_mod('beakai_button_text_rtl', __('Get A Quote','beakai'));
    }
    else { 
        $btn_text = get_theme_mod('beakai_button_text', __('Get A Quote','beakai'));
    }
    
    $btn_link = get_theme_mod('beakai_button_link', __('#','beakai'));

    $sticky_header_switch   = get_theme_mod('sticky_header_switch');
    $sticky_class = !empty($sticky_header_switch) ? 'sticky-header' : 'no-sticky';

    ?>

    <header>
        <!-- menu-area -->
        <div id="<?php echo esc_attr( $sticky_class ); ?>" class="header-menu-area header-padding transparrent-header">
            <div class="container-fluid">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-3 col-lg-2 col-md-5 col-8">
                        <div class="logo pos-rel">
                            <?php beakai_header_logo(); ?>
                            <?php beakai_header_sticky_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8 col-md-6 d-none d-lg-block d-xl-block">
                        <div class="header__menu header-menu-white">
                            <nav id="mobile-menu">
                                <?php beakai_header_menu(); ?>
                            </nav>
                        </div>
                    </div>
                    <?php if( !empty($beakai_header_right) ): ?>
                    <div class="col-xl-3 col-lg-2 d-none d-lg-block d-xl-block">
                        <div class="header-right f-right mt-0">
                            <?php if( !empty($beakai_show_header_search) ): ?>
                            <a href="#" class="nav-search search-trigger header-2-icon "><i class="fa fa-search"></i></a>
                            <?php endif;  ?>
                            <?php if( !empty($beakai_cart_hide) ): ?>
                            <a href="#" class="header-2-icon"><i class="fa fa-shopping-cart"></i></a>
                            <?php endif;  ?>
                            <?php if( !empty($btn_link) ): ?>
                            <a href="<?php print esc_url( $btn_link ); ?>" class="bt-btn bt-btn-sec"><?php print esc_html($btn_text); ?></a>
                            <?php endif;  ?>
                        </div>
                    </div>
                    <?php endif;  ?>
                    <div class="col-xl-9 col-lg-10 col-md-7 col-4 d-block d-xl-none d-lg-none text-right">
                        <div class="open-mobile-menu">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- slide-bar start -->
    <aside class="slide-bar">
        <div class="close-mobile-menu">
            <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
        </div>

        <nav class="side-mobile-menu">
            <?php beakai_mobile_menu(); ?>
        </nav>
    </aside>
    <div class="body-overlay"></div>
    <!-- slide-bar end -->

<?php 
}

/**
* header style 3
*/
function beakai_header_style_3() {
    // top left
    $beakai_mail_id = get_theme_mod('beakai_mail_id', __('info@example.com','beakai'));
    $beakai_support_label = get_theme_mod('beakai_support_label', __('Online 24/7','beakai'));
    $beakai_support_phone = get_theme_mod('beakai_support_phone', __('+444 32152','beakai'));
    $beakai_phone = get_theme_mod('beakai_phone', __('+876 7764 332','beakai'));
    $beakai_address_top = get_theme_mod('beakai_address_top', __('58 Howard Street New','beakai'));
    $beakai_address_bottom = get_theme_mod('beakai_address_bottom', __('San Francisco','beakai'));

    $beakai_topbar_switch = get_theme_mod('beakai_topbar_switch', true);
    $beakai_show_button = get_theme_mod('beakai_show_button', true);
    $beakai_show_header_search = get_theme_mod('beakai_show_header_search' , true);


    if (rtl_enable()) {
        $btn_text = get_theme_mod('beakai_button_text_rtl', __('Get A Quote', 'beakai'));
    }
    else { 
        $btn_text = get_theme_mod('beakai_button_text', __('Get A Quote', 'beakai'));
    }
    
    $btn_link = get_theme_mod('beakai_button_link', __('#','beakai'));

    // social 
    $beakai_topbar_fb_url = get_theme_mod('beakai_topbar_fb_url', __('#','beakai'));
    $beakai_topbar_twitter_url = get_theme_mod('beakai_topbar_twitter_url', __('#','beakai'));
    $beakai_topbar_instagram_url = get_theme_mod('beakai_topbar_instagram_url', __('#','beakai'));
    $beakai_topbar_linkedin_url = get_theme_mod('beakai_topbar_linkedin_url', __('#','beakai'));
    $beakai_topbar_youtube_url = get_theme_mod('beakai_topbar_youtube_url', __('#','beakai'));

    
    $sticky_header_switch   = get_theme_mod('sticky_header_switch');
    $sticky_class = !empty($sticky_header_switch) ? 'sticky-header' : 'no-sticky';

    ?>

    <header id="<?php echo esc_attr( $sticky_class ); ?>">
        <!-- menu-area -->
        <div class="top-bar-white top-bar-3 pt-20 pb-20">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-8">
                        <div class="logo logo-3 pos-rel">
                            <?php beakai_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8 d-none d-lg-block">
                        <?php if( !empty($btn_link) ): ?>    
                        <div class="header-right-btn f-right">
                            <a href="<?php print esc_url( $btn_link ); ?>" class="bt-btn"><?php print esc_html($btn_text); ?></a>
                        </div>
                        <?php endif;  ?>
                        <?php if( !empty($beakai_address_top) ): ?>
                        <div class="header-cta-info header-cta-info-3 cta-info-address">
                            <div class="header-cta-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="header-cta-text">
                                <h5><?php print esc_html($beakai_address_top); ?></h5>
                                <span class="primary-color"><?php print esc_html($beakai_address_bottom); ?></span>
                            </div>
                        </div>
                        <?php endif;  ?>
                        <?php if( !empty($beakai_phone) ): ?>
                        <div class="header-cta-info header-cta-info-3 cta-info-mail">
                            <div class="header-cta-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="header-cta-text">
                                <h5><a href="tel:<?php print esc_attr($beakai_phone); ?>"><?php print esc_html($beakai_phone); ?></a></h5>
                                <span class="primary-color"><a href="mailto:<?php print esc_attr($beakai_mail_id); ?>"><?php print esc_html($beakai_mail_id); ?></a></span>
                            </div>
                        </div>
                        <?php endif;  ?>
                        <?php if( !empty($beakai_support_label) ): ?>
                        <div class="header-cta-info header-cta-info-3 cta-info-phone">
                            <div class="header-cta-icon">
                                <i class="fa fa-comment-alt-lines"></i>
                            </div>
                            <div class="header-cta-text">
                                <h5><?php print esc_html($beakai_support_label); ?></h5>
                                <span class="primary-color"><?php print esc_html($beakai_support_phone); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endif;  ?>
                    <div class="col-xl-9 col-lg-8 col-md-8 col-4 d-block d-xl-none d-lg-none text-right">
                        <div class="open-mobile-menu">
                            <a href="javascript:void(0);">
                                <i class="fal fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu-area header-menu-blue theme-bg d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="header__menu menu-dark">
                            <nav id="mobile-menu">
                                <?php beakai_header_menu(); ?>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="header-right f-right mt-0">
                            <div class="header-social-icons f-right d-none d-lg-block p-0">
                                <ul>
                                <?php if (!empty($beakai_topbar_fb_url)): ?>
                                  <li><a href="<?php print esc_url($beakai_topbar_fb_url); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>

                                <?php if (!empty($beakai_topbar_twitter_url)): ?>
                                    <li><a href="<?php print esc_url($beakai_topbar_twitter_url); ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>

                                <?php if (!empty($beakai_topbar_instagram_url)): ?>
                                    <li><a href="<?php print esc_url($beakai_topbar_instagram_url); ?>"><i class="fab fa-instagram"></i></a></li>
                                <?php endif; ?>

                                <?php if (!empty($beakai_topbar_linkedin_url)): ?>
                                    <li><a href="<?php print esc_url($beakai_topbar_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a></li>
                                <?php endif; ?>        

                                <?php if (!empty($beakai_topbar_youtube_url)): ?>
                                    <li><a href="<?php print esc_url($beakai_topbar_youtube_url); ?>"><i class="fab fa-youtube"></i></a></li>
                                <?php endif; ?>
                                <?php if (!empty($beakai_show_header_search)): ?>
                                    <li class="header-menu-search">
                                        <a class="nav-search search-trigger" href="#"><i class="fas fa-search"></i></a>
                                    </li>
                                <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu mobile-menu-blue"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- slide-bar start -->
    <aside class="slide-bar">
        <div class="close-mobile-menu">
            <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
        </div>

        <nav class="side-mobile-menu">
            <?php beakai_mobile_menu(); ?>
        </nav>
    </aside>
    <div class="body-overlay"></div>
    <!-- slide-bar end -->

<?php 
}


/** 
 * [beakai_extra_info description]
 * @return [type] [description]
 */
function beakai_extra_info(){
    $beakai_extra_info_logo   = get_theme_mod('beakai_extra_info_logo',get_template_directory_uri() . '/img/logo/logo-white.png');

    // about title
    $beakai_extra_about_title     = get_theme_mod('beakai_extra_about_title','About Us');
    $beakai_extra_about_text     = get_theme_mod('beakai_extra_about_text', __('We must explain to you how all seds this mistakens idea off denouncing pleasures and praising pain was born and I will give you a completed accounts of the system and expound.' , 'beakai'));
    $beakai_extra_button     = get_theme_mod('beakai_extra_button', __('CONTACT US', 'beakai'));
    $beakai_extra_button_url     = get_theme_mod('beakai_extra_button_url', __('#', 'beakai'));

    
    // contact title
    $beakai_extra_contact_title     = get_theme_mod('beakai_extra_contact_title', __('Contact Info', 'beakai'));

    // address
    $beakai_extra_address     = get_theme_mod('beakai_extra_address', __('123/A, Miranda City Likaoli Prikano, Dope United States', 'beakai'));
    $beakai_extra_address_icon     = get_theme_mod('beakai_extra_address_icon', __('fal fa-rocket','beakai'));

    // phone 
    $beakai_extra_phone   = get_theme_mod('beakai_extra_phone', __('+0989 7876 9865 9','beakai'));
    $beakai_extra_phone_icon   = get_theme_mod('beakai_extra_phone_icon', __('far fa-phone', 'beakai'));

    // email 
    $beakai_extra_email  = get_theme_mod('beakai_extra_email', __('info@example.com','beakai'));
    $beakai_extra_email_icon  = get_theme_mod('beakai_extra_email_icon', __('far fa-envelope-open','beakai'));
    
?>

    <!-- extra info start -->
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>
        <?php if( !empty($beakai_extra_info_logo) ) : ?>
        <div class="logo-side mb-30">
            <a class="site-logo-2" href="<?php print home_url(); ?>">
                <img src="<?php print esc_url( $beakai_extra_info_logo ); ?>" alt="<?php esc_attr('Logo', 'beakai'); ?>" />
            </a>
        </div>
        <?php endif; ?>
        <div class="side-info">
            <div class="contact-list mb-40">
                <?php if( !empty($beakai_extra_about_title) ) : ?>
                <h4><?php print esc_html( $beakai_extra_about_title ); ?></h4>
                <?php endif; ?>

                <?php if( !empty($beakai_extra_about_text) ) : ?>
                <p><?php print esc_html( $beakai_extra_about_text ); ?></p>
                <?php endif; ?>

                <?php if( !empty($beakai_extra_button) ) : ?>
                <div class="mt-30 mb-30">
                    <a href="<?php print esc_url( $beakai_extra_button_url ); ?>" class="site-btn white"><?php print esc_html( $beakai_extra_button ); ?> <span class="icon"><i class="fal fa-calendar-alt"></i></span> </a>
                </div>
                <?php endif; ?>

            </div>
            <div class="contact-list mb-40">
                <?php if( !empty($beakai_extra_contact_title) ) : ?>
                <h4><?php print esc_html( $beakai_extra_contact_title ); ?> </h4>
                <?php endif; ?>

                <?php if( !empty($beakai_extra_address) ) : ?>
                <p>
                    <i class="<?php print esc_attr( $beakai_extra_address_icon ); ?>"></i> 
                    <span><?php print esc_html( $beakai_extra_address ); ?></span>
                </p>
                <?php endif; ?>

                <?php if( !empty($beakai_extra_phone) ) : ?>
                <p>
                    <i class="<?php print esc_attr( $beakai_extra_phone_icon ); ?>"></i> 
                    <span><?php print esc_html( $beakai_extra_phone ); ?></span> 
                </p>
                <?php endif; ?>

                <?php if( !empty($beakai_extra_email) ) : ?>
                <p>
                    <i class="<?php print esc_attr( $beakai_extra_email_icon ); ?>"></i>
                    <span><?php print esc_html( $beakai_extra_email ); ?></span>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="offcanvas-overly"></div>
    <!-- extra info end -->


<?php }



// favicon logo
function beakai_favicon_logo_func() {
    $beakai_favicon = get_template_directory_uri() . '/img/logo/favicon.png';
    $beakai_favicon_url = get_theme_mod('favicon_url', $beakai_favicon);
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $beakai_favicon_url ); ?>">

    <?php   
} 
add_action('wp_head', 'beakai_favicon_logo_func');

// header logo
function beakai_header_logo() {
    ?>
            <?php 
            $beakai_logo_on = function_exists('get_field') ? get_field('is_enable_sec_logo') : NULL;
            $beakai_logo = get_template_directory_uri() . '/img/logo/logo.png';
            $beakai_logo_white = get_template_directory_uri() . '/img/logo/logo-light.png';

            $beakai_site_logo = get_theme_mod('logo', $beakai_logo);
            $beakai_secondary_logo = get_theme_mod('seconday_logo', $beakai_logo_white);
            ?>
             
            <?php
            if( has_custom_logo()){
                the_custom_logo();
            }else{
                
                if( !empty($beakai_logo_on) ) { ?>
                    <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($beakai_secondary_logo); ?>" alt="<?php print esc_attr('logo','beakai'); ?>" />
                    </a>
                <?php 
                }
                else{ ?>
                    <a class="standard-logo-white" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($beakai_site_logo); ?>" alt="<?php print esc_attr('logo','beakai'); ?>" />
                    </a>
                <?php 
                }
            }   
            ?>
    <?php 
} 

function beakai_header_sticky_logo() {
    ?>
    <?php
        $beakai_logo = get_template_directory_uri() . '/img/logo/logo.png';
        $beakai_site_logo = get_theme_mod( 'logo_sticky', $beakai_logo );
    ?>

    <?php
        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
        ?>
            <a class="standard-logo-sticky" href="<?php print esc_url( home_url( '/' ) );?>">
                <img src="<?php print esc_url( $beakai_site_logo );?>" alt="<?php print esc_attr( 'logo', 'beakai' );?>" />
            </a>
        <?php

        }
    ?>
    <?php
}


/** 
 * [beakai_header_social_profiles description]
 * @return [type] [description]
 */
function beakai_header_social_profiles() {
    $beakai_topbar_fb_url             = get_theme_mod('beakai_topbar_fb_url', __('#','beakai'));
    $beakai_topbar_twitter_url       = get_theme_mod('beakai_topbar_twitter_url', __('#','beakai'));
    $beakai_topbar_instagram_url      = get_theme_mod('beakai_topbar_instagram_url', __('#','beakai'));
    $beakai_topbar_linkedin_url      = get_theme_mod('beakai_topbar_linkedin_url', __('#','beakai'));
    $beakai_topbar_youtube_url        = get_theme_mod('beakai_topbar_youtube_url', __('#','beakai'));
    ?> 
        <ul>
        <?php if (!empty($beakai_topbar_fb_url)): ?>
          <li><a href="<?php print esc_url($beakai_topbar_fb_url); ?>"><i class="fab fa-facebook-f"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($beakai_topbar_twitter_url)): ?>
            <li><a href="<?php print esc_url($beakai_topbar_twitter_url); ?>"><i class="fab fa-twitter"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($beakai_topbar_instagram_url)): ?>
            <li><a href="<?php print esc_url($beakai_topbar_instagram_url); ?>"><i class="fab fa-instagram"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($beakai_topbar_linkedin_url)): ?>
            <li><a href="<?php print esc_url($beakai_topbar_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a></li>
        <?php endif; ?>        

        <?php if (!empty($beakai_topbar_youtube_url)): ?>
            <li><a href="<?php print esc_url($beakai_topbar_youtube_url); ?>"><i class="fab fa-youtube"></i></a></li>
        <?php endif; ?>
        </ul>
<?php 
}


function beakai_footer_social_profiles() {
    $beakai_footer_fb_url             = get_theme_mod('beakai_footer_fb_url', __('#','beakai'));
    $beakai_footer_twitter_url       = get_theme_mod('beakai_footer_twitter_url', __('#','beakai'));
    $beakai_footer_vine_url      = get_theme_mod('beakai_footer_vine_url', __('#','beakai'));
    $beakai_footer_weebly_url        = get_theme_mod('beakai_footer_weebly_url', __('#','beakai'));
    $beakai_footer_vuejs_url        = get_theme_mod('beakai_footer_vuejs_url', __('#','beakai'));
    ?>
        <ul class="mb-0">
            <?php if ($beakai_footer_fb_url): ?>
            <li><a href="<?php print esc_url($beakai_footer_fb_url); ?>"><i class="fab fa-facebook-f"></i></a></li>
            <?php endif; ?>

            <?php if ($beakai_footer_twitter_url): ?>
            <li><a href="<?php print esc_url($beakai_footer_twitter_url); ?>"><i class="fab fa-twitter"></i></a></li>
            <?php endif; ?>

            <?php if ($beakai_footer_vine_url): ?>
            <li><a href="<?php print esc_url($beakai_footer_vine_url); ?>"><i class="fab fa-vine"></i></a></li>
            <?php endif; ?>

            <?php if ($beakai_footer_weebly_url): ?>
            <li><a href="<?php print esc_url($beakai_footer_weebly_url); ?>"><i class="fab fa-weebly"></i></a></li>
            <?php endif; ?>

            <?php if ($beakai_footer_vuejs_url): ?>
            <li><a href="<?php print esc_url($beakai_footer_vuejs_url); ?>"><i class="fab fa-vuejs"></i></a></li>
            <?php endif; ?>
        </ul>
<?php 
}


/** 
 * [beakai_header_address description]
 * @return [type] [description]
 */
function beakai_header_address() {
    $beakai_header_address = get_theme_mod('beakai_header_address', __('15 Hamston Street, West','beakai'));
    $beakai_address_icon = get_theme_mod('beakai_header_address_icon', __('far fa-map-marker-alt','beakai'));
    ?>
        <span><i class="<?php print esc_attr( $beakai_address_icon ); ?>"> </i> <?php print esc_html( $beakai_header_address ); ?></span>
<?php 
}

/** 
 * [beakai_header_phone description]
 * @return [type] [description]
 */
function beakai_header_phone() {
    $beakai_phone_icon = get_theme_mod('beakai_header_phone_icon', __('far fa-phone','beakai'));
    $header_phone_label = get_theme_mod('beakai_header_phone_label', __('We are available','beakai'));
    $beakai_phone_number = get_theme_mod('icon_phone', __('812 (345) 6789', 'beakai'));
    ?>
        <span class="header-ph"><i class="<?php print esc_attr( $beakai_phone_icon ); ?>"> </i> <?php print esc_html( $beakai_phone_number ); ?></span>
<?php 
}


/** 
 * [beakai_header_email_address description]
 * @return [type] [description]
 */
function beakai_header_email_address() {
    $header_email_icon = get_theme_mod('beakai_header_email_icon', __('far fa-envelope-open','beakai'));
    $header_email_address = get_theme_mod('beakai_header_email_address', __('support@gmail.com','beakai'));
    ?>
        <span class="header-en"><i class="<?php print esc_attr( $header_email_icon ); ?>"></i> <?php print esc_html( $header_email_address ); ?></span>
<?php 
}


/** 
 * [beakai_header_button description]
 * @return [type] [description]
 */
function beakai_header_button() {
    $header_show_button      = get_theme_mod('beakai_show_header_button');
    $header_btn_text     = get_theme_mod('beakai_header_btn_text', __('Consultancy','beakai'));
    $header_btn_icon     = get_theme_mod('beakai_header_btn_icon', __('far fa-long-arrow-right','beakai'));
    $header_btn_link     = get_theme_mod('beakai_header_btn_link', __('#','beakai'));

    if($header_show_button && !empty( $header_btn_text )): ?>
        <a class="btn" href="<?php print esc_url($header_btn_link); ?>"><span class="btn-text"><?php print esc_html($header_btn_text); ?> <i class="<?php print esc_attr( $header_btn_icon ); ?>"></i></span> </a>
    <?php endif; ?>

<?php 
} 


/** 
 * [beakai_header_menu description]
 * @return [type] [description]
 */
function beakai_header_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Beakai_Navwalker_Class::fallback',
                'walker'            => new Beakai_Navwalker_Class
            ));
           ?>
    <?php 
}

/** 
 * [beakai_header_menu left description]
 * @return [type] [description]
 */
function beakai_header_left_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-left-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Beakai_Navwalker_Class::fallback',
                'walker'            => new Beakai_Navwalker_Class
            ));
           ?>
    <?php 
}

/** 
 * [beakai_header_menu left description]
 * @return [type] [description]
 */
function beakai_header_right_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-right-menu',
                'menu_class'        => '',
                'container'         => '',
                'fallback_cb'       => 'Beakai_Navwalker_Class::fallback',
                'walker'            => new Beakai_Navwalker_Class
            ));
           ?>
    <?php 
}


/**
 * [beakai_header_menu description]
 * @return [type] [description]
 */
function beakai_mobile_menu() { ?>
    <?php
    $beakai_menu = wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'        => 'mobile-menu-active',
        'echo'           => false
    ) );

    $beakai_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $beakai_menu );
    echo wp_kses_post( $beakai_menu );
    ?>
    <?php
}


function beakai_header_3_menu() { ?>
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'main-menu',
                'menu_class'        => '',
                'container'         => '',
            ));
           ?>
    <?php 
}


/** 
 * [beakai_footer_menu description]
 * @return [type] [description]
 */
function beakai_footer_menu() { 
    
    wp_nav_menu(array(
        'theme_location'    => 'footer-menu',
        'menu_class'        => 'm-0',
        'container'         => '',
        'fallback_cb'       => 'Beakai_Navwalker_Class::fallback',
        'walker'            => new Beakai_Navwalker_Class
    ));
 
}


/**
*
* beakai footer
*/
add_action('beakai_footer_style', 'beakai_check_footer', 10);

function beakai_check_footer() {
    $beakai_footer_style = function_exists('get_field') ? get_field( 'footer_style' ) : NULL;
    $beakai_default_footer_style = get_theme_mod('choose_default_footer', __('footer-style-1','beakai') );
   

    if( $beakai_footer_style == 'footer-style-1' ) {
        beakai_footer_style_1();
    }    
    elseif( $beakai_footer_style == 'footer-style-2' ) {
        beakai_footer_style_2();
    }    
    elseif( $beakai_footer_style == 'footer-style-3' ) {
        beakai_footer_style_3();
    }
    else{

        /** default footer style **/
        if($beakai_default_footer_style == 'footer-style-2') {
           beakai_footer_style_2();
        }        
        elseif($beakai_default_footer_style == 'footer-style-3') {
           beakai_footer_style_3();
        }
        else {
            beakai_footer_style_1();
        }

    }
}

/**
* footer  style_defaut
*/
function beakai_footer_style_1() {

    $footer_bg_img = get_theme_mod('beakai_footer_bg');
    $footer_social_switch = get_theme_mod('footer_social_switch',false);
    $beakai_copyright_center = $footer_social_switch ? 'col-md-6' : 'col-md-12 text-center';
    $beakai_footer_bg_url_from_page = function_exists('get_field') ? get_field('beakai_footer_bg') : '';
    $beakai_footer_bg_color_from_page = function_exists('get_field') ? get_field('beakai_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('beakai_footer_bg_color');
    
    // bg image
    $bg_img = !empty($beakai_footer_bg_url_from_page['url']) ? $beakai_footer_bg_url_from_page['url'] : $footer_bg_img;  

    // bg color
    $bg_color = !empty($beakai_footer_bg_color_from_page) ? $beakai_footer_bg_color_from_page : $footer_bg_color;   

    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-'. $num ) ){
            $footer_columns++;
        }
    } 

    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;        
        case '4':
        $footer_class[1] = 'col-xl-3 col-lg-4 col-md-6';
        $footer_class[2] = 'col-xl-3 col-lg-4 col-md-6 col-md-6';
        $footer_class[3] = 'col-xl-3 col-lg-3 col-md-6 d-lg-none d-xl-block';
        $footer_class[4] = 'col-xl-3 col-lg-4 col-md-6 d-lg-block';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }  

?>

    <footer data-bg-color="#223645">
        <?php if ( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4') ): ?>
        <div class="footer-top pt-115 pb-70">
            <div class="container">
                <div class="row">
                <?php
                if ( $footer_columns < 4 ) {     
                    print '<div class="col-md-6 col-lg-3">';
                    dynamic_sidebar( 'footer-1');
                    print '</div>';
                
                    print '<div class="col-md-6 col-lg-3">';
                    dynamic_sidebar( 'footer-2');
                    print '</div>';
                
                    print '<div class="col-md-6 col-lg-3">';
                    dynamic_sidebar( 'footer-3');
                    print '</div>'; 

                    print '<div class="col-md-6 col-lg-3">';
                    dynamic_sidebar( 'footer-4');
                    print '</div>';       
                }
                else{
                    for( $num=1; $num <= $footer_columns; $num++ ) {
                        if ( !is_active_sidebar( 'footer-'. $num ) ) continue;
                        print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                        dynamic_sidebar( 'footer-'. $num );
                        print '</div>';
                    }  
                }

                ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="copyright-area pt-25 pb-20">
            <div class="container">
                <div class="row">
                    <div class="<?php print esc_attr($beakai_copyright_center); ?>">
                        <div class="footer-copyright">
                            <p class="white-color"><?php print beakai_copyright_text(); ?></p>
                        </div>
                    </div>
                    <?php if(!empty($beakai_footer_logo)) : ?>
                    <div class="col-md-6">
                        <div class="footer-social text-left text-md-right">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>

<?php 
}

/**
* footer  style 2
*/
function beakai_footer_style_2() {
    $footer_bg_img = get_theme_mod('beakai_footer_bg');
    $beakai_footer_logo_black = get_theme_mod('beakai_footer_logo_black');
    $beakai_copyright_center = $beakai_footer_logo_black ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
    $beakai_footer_bg_url_from_page = function_exists('get_field') ? get_field('beakai_footer_bg') : '';
    $beakai_footer_bg_color_from_page = function_exists('get_field') ? get_field('beakai_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('beakai_footer_bg_color');
    
    // bg image
    $bg_img = !empty($beakai_footer_bg_url_from_page['url']) ? $beakai_footer_bg_url_from_page['url'] : $footer_bg_img;  
    // bg color
    $bg_color = !empty($beakai_footer_bg_color_from_page) ? $beakai_footer_bg_color_from_page : $footer_bg_color;  

    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for( $num=1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-2-'. $num ) ){
            $footer_columns++;
        }
    }



    switch ( $footer_columns ) {
        case '1':
        $footer_class[1] = 'col-lg-12';
        break;
        case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
        case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;        
        case '4':
        $footer_class[1] = 'col-md-6 col-lg-3';
        $footer_class[2] = 'col-md-6 col-lg-3';
        $footer_class[3] = 'col-md-6 col-lg-3';
        $footer_class[4] = 'col-md-6 col-lg-3';
        break;
        default:
        $footer_class = 'col-xl-4 col-lg-4 col-md-6';
        break;
    }    

?>


    <footer class="footer1 footer-style-2">
        <?php if ( is_active_sidebar('footer-2-1') OR is_active_sidebar('footer-2-2') OR is_active_sidebar('footer-2-3') OR is_active_sidebar('footer-2-4') ): ?>
        <div class="footer1__padding1">
            <div class="container">
                <div class="row footer-border">
                        <?php
                        if ( $footer_columns < 4 ) {     
                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2-1');
                            print '</div>';
                        
                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2-2');
                            print '</div>';
                        
                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2-3');
                            print '</div>'; 

                            print '<div class="col-md-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2-4');
                            print '</div>';       
                        }
                        else{
                            for( $num=1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-2-'. $num ) ) continue;
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-2-'. $num );
                                print '</div>';
                            }  
                        }

                        ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="footer1__copyright">
            <div class="container">
                <div class="row align-items-center">
                    <?php if(!empty($beakai_footer_logo_black)) : ?>
                    <div class="col-lg-4 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <div class="footer1__copyright--thumb">
                            <a href="<?php print esc_url(home_url('/')); ?>">
                                <img src="<?php print esc_url($beakai_footer_logo_black); ?>" alt="Logo Image">
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="<?php print esc_attr($beakai_copyright_center); ?>">
                        <div class="footer1__copyright--text">
                            <p class="m-0"><?php print beakai_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php 
}



function beakai_copyright_text(){
    if( rtl_enable() ){
        print get_theme_mod('beakai_copyright_rtl', esc_html__('Copyright ©2022 ThemePure. All Rights Reserved','beakai'));
    }
    else{
       print get_theme_mod('beakai_copyright', esc_html__('Copyright ©2022 ThemePure. All Rights Reserved','beakai'));
    }
}

/** 
 * [beakai_breadcrumb_func description]
 * @return [type] [description]
 */
function beakai_breadcrumb_func() { 

    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    $title = get_the_title();

    $_id = get_the_ID();

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'beakai'));
        $breadcrumb_class = 'home_front_page';
        
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'beakai'));
        $breadcrumb_show = 0;

    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $_id = get_option( 'page_for_posts' );
            $title = get_the_title( get_option( 'page_for_posts' ) );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_blog_title_details_rtl', __('Blog', 'beakai')); 
        else
            $title = get_the_title();
        
    }
    elseif ( is_single() && 'product' == get_post_type() ) { 
        $_id = wc_get_page_id('shop');
        $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'beakai'));
    }   
    elseif ( is_single() && 'bdevs-services' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_department_details_rtl', __('Services', 'beakai'));
        else
            $title = get_the_title();

    }    
    elseif ( is_single() && 'bdevs-doctor' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_doctor_details_rtl', __('Doctor Details', 'beakai'));
        else
            $title = get_theme_mod('breadcrumb_doctor_details', __('Doctor Details', 'beakai'));

    }    
    elseif ( is_single() && 'bdevs-case_study' == get_post_type() ) { 
        if (rtl_enable()) 
            $title = get_theme_mod('breadcrumb_case_study_details_rtl', __('Gallery', 'beakai'));
        else
            $title = get_theme_mod('breadcrumb_case_study_details', __('Gallery', 'beakai'));

    }
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'beakai' ) . get_search_query();
    }
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'beakai' );
    }
    elseif ( function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop',esc_html__('Shop', 'beakai'));
    }
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    }
    else {
        $title = get_the_title();
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb') : '';

    
    if( empty($is_breadcrumb) && $breadcrumb_show == 1 ) { 

    
        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';
        $back_title = function_exists('get_field') ? get_field('breadcrumb_back_title', $_id) : '';

        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');


        if( $hide_bg_img ){
            $bg_img = '';
        }
        else {
          $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;  
        } ?>

        <div class="breadcrumb-bg pt-180 pb-180 bg_img breadcrumb-spacings <?php print esc_attr($breadcrumb_class); ?>" data-overlay="5" data-background="<?php print esc_attr($bg_img);?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title text-center">
                            <h1 class="breadcrumb-title"><?php echo wp_kses_post( $title );?></h1>
                            <div class="breadcrumb-menu">
                                <?php beakai_breadcrumb_callback();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php 
    }
}
add_action('beakai_before_main_content', 'beakai_breadcrumb_func');


function beakai_breadcrumb_callback() {
    $args = array(
        'show_browse'   => false,
        'post_taxonomy' => array( 'product' =>'product_cat' )
    );
    $breadcrumb = new Beakai_Breadcrumb( $args );
    
    return $breadcrumb->trail();
}


// gru_search_form
function beakai_search_form() { ?>
        <!-- Modal Search -->
        <div class="search-wrap">
            <div class="search-inner">
                <i class="fal fa-times search-close" id="search-close"></i>
                <div class="search-cell">
                    <form method="get" action="<?php print esc_url(home_url('/')); ?>" >
                        <div class="search-field-holder">
                            <input type="search" name="s" class="main-search-input" value="<?php print esc_attr( get_search_query() ) ?>" placeholder="<?php print esc_attr('Search Your Keyword...', 'beakai'); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php 
}

add_action('beakai_before_main_content', 'beakai_search_form');

/**
*
* pagination
*/
if( !function_exists('beakai_pagination') ) {

    function _beakai_pagi_callback($pagination) {
        return $pagination;
    }

    //page navegation
    function beakai_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        
        if( $pages=='' ){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            
            if(!$pages)
                $pages = 1;
        }

        $pagination = array(
            'base' => add_query_arg('paged','%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        //rewrite permalinks
        if( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        if( !empty($wp_query->query_vars['s']) )
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

        $pagi = '';
        if(paginate_links( $pagination )!=''){
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
                        foreach ($paginations as $key => $pg) {
                            $pagi.= '<li>'.$pg.'</li>';
                        }
            $pagi .= '</ul>';
        }

        print _beakai_pagi_callback($pagi);
    }
}

// rtl_enable
function rtl_enable(){
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $rtl_enable =get_theme_mod( 'rtl_switch',false);
    if ( $my_current_lang  != 'en' && $rtl_enable ) {
        return true;
    }
    else {
        return false;
    }
}

// header top bg color
function beakai_breadcrumb_bg_color(){
    $color_code = get_theme_mod( 'beakai_breadcrumb_bg_color',__('#222','beakai'));
    wp_enqueue_style( 'beakai-custom', BEAKAI_THEME_CSS_DIR . 'beakai-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: ".$color_code."}";

        wp_add_inline_style('beakai-breadcrumb-bg',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'beakai_breadcrumb_bg_color');

// beakai_theme_color
function beakai_theme_color(){
    $color_code = get_theme_mod( 'beakai_color_option',__('#086AD8','beakai'));
    wp_enqueue_style( 'beakai-custom', BEAKAI_THEME_CSS_DIR . 'beakai-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".bt-btn,.slider-active button:hover,.about-video-btn.white-video-btn:hover,#scrollUp,.single-pricing-box.active::before,.footer-subsccribe form button,.about-text-list ul li:hover i,.service-content-2 h3 a::before,.team-social-profile ul,.theme-bg,.counter-box-white h6::before,.service-box-3 .service-link,.play-btn:hover,.analysis-area ul li.nav-item:nth-child(1) a.nav-link,.testi-box-2:hover .testi-quato-icon-green,.analysis-area .nav-item a.nav-link::after,.service-box-3 a.service-link:hover,.team-social-widget ul,.portfolio-image::before,.portfolio-filter button::before,.postbox__gallery .slick-arrow:hover,.service-content-inner span,.process__item::before,.contact-btn input,.widget .widget-title::after,.sidebar-search-form button,.sidebar-tad li a:hover, .tagcloud a:hover,.basic-pagination-2 ul li span:hover, .basic-pagination ul li span.current,.basic-pagination-2 ul li a:hover, .basic-pagination-2 ul li.active a { background: ".$color_code."}";

        $custom_css .= ".header-info span i,.header__menu4 ul li a:hover, .header__menu ul li ul.sub-menu li a:hover,.mv-icon i,.section-title h1 span,.service-content h3 a:hover,.team-content h6,.news-meta ul li a i,.news-meta ul a:hover,.latest-news-content h3 a:hover,.header__menu.header-menu-white ul li:hover > a,.service-box.service-box-2 .service-content-2 h3 a:hover,.service-box-2 .service-content-2 a.service-link:hover,.green-color,.header__menu.header-menu-white ul li ul.sub-menu li:hover > a,.header-cta-icon i,.author-desination-2 h6,.single-couter-2 i,.appoinment-content span,.analysis-area ul li.nav-item:nth-child(3) a.nav-link i,.ser-fea-icon i,.ser-fea-list ul li i,.more-service-icon i,.more-service-list ul li a:hover .more-service-title,.portfolio-filter button:hover, .portfolio-filter button.active,.process__thumb i,.post-meta span i,.blog-title a:hover,.post-meta span a:hover,.widget-posts-title a:hover,.widget li a:hover,.blog-post-tag a:hover{ color: ".$color_code."}";

        $custom_css .= ".header__menu ul li ul.sub-menu,.about-video-btn.white-video-btn:hover,.faq-right-box .btn-link,.faq-right-box .card-body,.case-info,.basic-pagination-2 ul li span:hover, .basic-pagination ul li span.current,.basic-pagination-2 ul li a:hover, .basic-pagination-2 ul li.active a,.blog-post-tag a:hover { border-color: ".$color_code."}";

        wp_add_inline_style('beakai-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'beakai_theme_color');

// beakai_sec_color_option
function beakai_sec_color_option(){
    $color_code = get_theme_mod( 'beakai_sec_color_option',__('#d2a98e','beakai'));
    wp_enqueue_style( 'beakai-custom', BEAKAI_THEME_CSS_DIR . 'beakai-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".play-btn,.single-pricing-box.active .bt-btn,.testi-quato-icon-green,.bt-btn:hover,.service-box-3:hover .service-link,.professinals-list li:hover i,.analysis-area ul li.nav-item:nth-child(2) a.nav-link,.analysis-area .nav-item:nth-child(2) a.nav-link::after,.contact i { background: ".$color_code."}";

        $custom_css .= ".service-box .service-link:hover,a:focus, a:hover,.latest-news-box-2 .latest-news-content h3 a:hover,.counter-box-white i,.professinals-list li i,.contact-icon::before,.single-satisfied h1{ color: ".$color_code."}";

        $custom_css .= ".professinals-list li i,.service-widget{ border-color: ".$color_code."}";

        wp_add_inline_style('beakai-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'beakai_sec_color_option');

// breadcrumb-spacing top
function beakai_breadcrumb_spacing(){
    $padding_px = get_theme_mod( 'beakai_breadcrumb_spacing', __('160px','beakai'));
    wp_enqueue_style( 'beakai-custom', BEAKAI_THEME_CSS_DIR . 'beakai-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: ".$padding_px."}";

        wp_add_inline_style('beakai-breadcrumb-top-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'beakai_breadcrumb_spacing');

// breadcrumb-spacing bottom
function beakai_breadcrumb_bottom_spacing(){
    $padding_px = get_theme_mod( 'beakai_breadcrumb_bottom_spacing', __('160px','beakai'));
    wp_enqueue_style( 'beakai-custom', BEAKAI_THEME_CSS_DIR . 'beakai-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: ".$padding_px."}";

        wp_add_inline_style('beakai-breadcrumb-bottom-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'beakai_breadcrumb_bottom_spacing');


// scrollup
function beakai_scrollup_switch(){
    $scrollup_switch = get_theme_mod( 'beakai_scrollup_switch', false);
    wp_enqueue_style( 'beakai-custom', BEAKAI_THEME_CSS_DIR . 'beakai-custom.css', array());
    if($scrollup_switch){
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('beakai-scrollup-switch',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'beakai_scrollup_switch');



// beakai_kses_intermediate
function beakai_kses_intermediate( $string = '' ) {
    return wp_kses( $string, beakai_get_allowed_html_tags( 'intermediate' ) );
}

function beakai_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b' => [],
        'i' => [],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
        'a' => [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => []
        ]
    ];

    return $allowed_html;
}