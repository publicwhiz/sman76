<?php
if ( has_nav_menu( 'menu-2' ) ) {
    // User has assigned menu to this location;
    // output it
    ?>
    <nav class="nav navbar">
        <div class="navbar-menu">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'menu_id'        => 'primary-menu-single',
                ) );
            ?>
        </div>
       
        <div class='nav-link-container mobile-menu-link'> 
            <a href='#' class="nav-menu-link">              
                <div class="hamburger1"></div>
                <div class="hamburger2"></div>
                <div class="hamburger3"></div>
            </a> 
        </div>
    </nav>
    <?php
}

?>

<nav class="nav-container mobile-menu-container">
    <ul class="sidenav">
        <li class='nav-link-container'> 
            <a href='#' class="nav-menu-link">              
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
        <li class="social-icon-responsive">
             <?php get_template_part( 'inc/header/offcanvas-content' );?>
        </li>
    </ul> 

</nav>