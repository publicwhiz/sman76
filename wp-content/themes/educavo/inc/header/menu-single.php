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
				'menu_id'        => 'single-menu',
			) );
		?>
    </div>
    <div class='nav-link-container mobile-menu-link'> 
        <a href='#' class="nav-menu-link">              
            <div class="dot1"></div>
            <div class="dot2"></div>
            <div class="dot3"></div>
            <div class="dot4"></div>
            <div class="dot5"></div>
            <div class="dot6"></div>
            <div class="dot7"></div>
            <div class="dot8"></div>
            <div class="dot9"></div>
        </a> 
    </div>
</nav>
<?php } 

?>
<nav class="nav-container mobile-menu-container">
    <ul class="sidenav">
        <li class='nav-link-container'> 
            <a href='#' class="nav-menu-link">              
                <div class="dot1"></div>
                <div class="dot2"></div>
                <div class="dot3"></div>
                <div class="dot4"></div>
                <div class="dot5"></div>
                <div class="dot6"></div>
                <div class="dot7"></div>
                <div class="dot8"></div>
                <div class="dot9"></div>
            </a> 
        </li>
        <li>
          <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'menu_id'        => 'mobile-single-menu',
                ) );
            ?>
        </li>
    </ul>
</nav>