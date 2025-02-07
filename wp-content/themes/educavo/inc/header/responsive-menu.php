<?php
global $educavo_option;
?>
<nav class="nav-container mobile-menu-container mobile-menus menu-wrap-off fdgdgfdg">
    <ul class="sidenav">
        <li class='nav-link-container'> 
            <a href='#' class="nav-menu-link close-button">               
                <div class="hamburger1"></div>
                <div class="hamburger3"></div>
            </a> 
        </li>
        <li>
          <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu-single2',
                ) );
            ?>
        </li>
       
    </ul>
    <div class="social-icon-responsive">
        <?php get_template_part( 'inc/header/offcanvas-content' );?>
    </div>
</nav>