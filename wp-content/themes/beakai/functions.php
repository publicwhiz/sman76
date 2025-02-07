<?php
/**
 * beakai functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beakai
 */

if ( ! function_exists( 'beakai_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function beakai_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on beakai, use a find and replace
		 * to change 'beakai' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'beakai', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'beakai' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'beakai' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'beakai_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//Enable custom header
		add_theme_support('custom-header');
		


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Enable suporrt for Post Formats
		 *
		 * see: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'audio',
			'video',
			'gallery',
			'quote',
		) );

		// Add theme support for selective refresh for widgets.
		//add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		remove_theme_support( 'widgets-block-editor' );


		add_image_size( 'beakai-case-details', 1170, 600, array('center','center') );
	}
endif;
add_action( 'after_setup_theme', 'beakai_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beakai_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'beakai_content_width', 640 );
}
add_action( 'after_setup_theme', 'beakai_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function beakai_widgets_init() {

	$footer_style_2_switch = get_theme_mod('footer_style_2_switch', false );
	$footer_style_3_switch = get_theme_mod('footer_style_3_switch', false );

	/**
	* blog sidebar
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'beakai' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget mb-40 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title mb-30">',
		'after_title'   => '</h3>',
	) );

	$footer_widgets = get_theme_mod('footer_widget_number', 4);


	for( $num=1; $num <= $footer_widgets; $num++ ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer '. $num, 'beakai'),
			'id'            => 'footer-'. $num,
			'description'   => esc_html__( 'Footer '. $num, 'beakai' ),
			'before_widget' => '<div id="%1$s" class="footer-widget mb-50 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-title mb-30">',
			'after_title'   => '</h4>',
		) );			
	}


	// footer 2
	if ( $footer_style_2_switch ) {
		for( $num=1; $num <= $footer_widgets; $num++ ) {

			register_sidebar( array(
				'name'          => esc_html__( 'Footer Style 2: '. $num, 'beakai'),
				'id'            => 'footer-2-'. $num,
				'description'   => esc_html__( 'Footer Style 2: '. $num, 'beakai' ),
				'before_widget' => '<div id="%1$s" class="footer-widget mb-50 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="footer-title mb-30">',
				'after_title'   => '</h4>',
			) );			
		}
	}

	// footer 3
	if ( $footer_style_3_switch ) {
		for( $num=1; $num <= $footer_widgets; $num++ ) {
			register_sidebar( array(
				'name'          => esc_html__(  'Footer Style 3: '. $num, 'beakai'),
				'id'            => 'footer-3-'. $num,
				'description'   => esc_html__( 'Footer Style 3: '. $num, 'beakai' ),
				'before_widget' => '<div id="%1$s" class="footer-widget mb-50 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="footer-title mb-30">',
				'after_title'   => '</h4>',
			) );			
		}
	}	

	/**
	* Service Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Service Sidebar', 'beakai' ),
			'id' 			=> 'services-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Service Details Sidebar.', 'beakai' ),
			'before_title' 	=> '<div class="widget-title-box mb-30">
                    <h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);	

	/**
	* Portfolio Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Portfolio Sidebar', 'beakai' ),
			'id' 			=> 'portfolio-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Portfolio Details Sidebar.', 'beakai' ),
			'before_title' 	=> '<div class="widget-title-box mb-30"><h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget sidebar-wrap widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);	



}
add_action( 'widgets_init', 'beakai_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

define('BEAKAI_THEME_DIR', get_template_directory());
define('BEAKAI_THEME_URI', get_template_directory_uri());
define('BEAKAI_THEME_CSS_DIR', BEAKAI_THEME_URI . '/css/');
define('BEAKAI_THEME_JS_DIR', BEAKAI_THEME_URI . '/js/');
define('BEAKAI_THEME_INC', BEAKAI_THEME_DIR . '/inc/');

/** 
 * beakai_scripts description
 * @return [type] [description]
 */
function beakai_scripts() {
	/**
	* all css files
	*/
	wp_enqueue_style( 'beakai-fonts', beakai_fonts_url(), array(), '1.0.0' );

	if( is_rtl() ){
		wp_enqueue_style( 'bootstrap-rtl', BEAKAI_THEME_CSS_DIR.'bootstrap.min-rtl.css', array() );
	}else{
		wp_enqueue_style( 'bootstrap', BEAKAI_THEME_CSS_DIR.'bootstrap.min.css', array() );
	}

	wp_enqueue_style( 'owl-carousel', BEAKAI_THEME_CSS_DIR.'owl.carousel.min.css', array() );
	wp_enqueue_style( 'animate', BEAKAI_THEME_CSS_DIR.'animate.min.css', array() );
	wp_enqueue_style( 'nice-select', BEAKAI_THEME_CSS_DIR.'nice-select.css', array() );
	wp_enqueue_style( 'magnific-popup', BEAKAI_THEME_CSS_DIR.'magnific-popup.css', array() );
	wp_enqueue_style( 'fontawesome-pro', BEAKAI_THEME_CSS_DIR.'fontawesome.pro.min.css', array() );
	wp_enqueue_style( 'flaticon', BEAKAI_THEME_CSS_DIR.'flaticon.css', array() );
	wp_enqueue_style( 'meanmenu', BEAKAI_THEME_CSS_DIR.'meanmenu.css', array() );
	wp_enqueue_style( 'metisMenu', BEAKAI_THEME_CSS_DIR.'metisMenu.css', array() );
	wp_enqueue_style( 'slick', BEAKAI_THEME_CSS_DIR.'slick.css', array() );
	wp_enqueue_style( 'beakai-default', BEAKAI_THEME_CSS_DIR.'default.css', array() );
	wp_enqueue_style( 'beakai-core', BEAKAI_THEME_CSS_DIR.'beakai-core.css', array() );
	wp_enqueue_style( 'beakai-unit', BEAKAI_THEME_CSS_DIR.'beakai-unit.css', array() );
	wp_enqueue_style( 'beakai-style', get_stylesheet_uri() );
	wp_enqueue_style( 'beakai-responsive', BEAKAI_THEME_CSS_DIR.'responsive.css', array() );


	// all js
	wp_enqueue_script( 'popper', BEAKAI_THEME_JS_DIR.'popper.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap', BEAKAI_THEME_JS_DIR.'bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', BEAKAI_THEME_JS_DIR.'owl.carousel.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'isotope-pkgd', BEAKAI_THEME_JS_DIR.'isotope.pkgd.min.js', array('imagesloaded'), false, true );
	wp_enqueue_script( 'slick', BEAKAI_THEME_JS_DIR.'slick.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'wow', BEAKAI_THEME_JS_DIR.'wow.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-nice-select', BEAKAI_THEME_JS_DIR.'jquery.nice-select.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-scrollUp', BEAKAI_THEME_JS_DIR.'jquery.scrollUp.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-meanmenu', BEAKAI_THEME_JS_DIR.'jquery.meanmenu.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'metismenu', BEAKAI_THEME_JS_DIR.'metisMenu.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-counterup', BEAKAI_THEME_JS_DIR.'jquery.counterup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'waypoints', BEAKAI_THEME_JS_DIR.'waypoints.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-magnific-popup', BEAKAI_THEME_JS_DIR.'jquery.magnific-popup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'beakai-main', BEAKAI_THEME_JS_DIR.'main.js', array('jquery'), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'beakai_scripts' );

/*
Register Fonts
*/
function beakai_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'beakai' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Poppins:200,300,400,500,600,700|Rubik:400,500,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}


// wp_body_open
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
            do_action( 'wp_body_open' );
    }
}



/**
 * Implement the Custom Header feature.
 */
require BEAKAI_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BEAKAI_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require BEAKAI_THEME_INC . 'template-helper.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require BEAKAI_THEME_INC . 'jetpack.php';
}

/**
* include beakai functions file
*/
require_once BEAKAI_THEME_INC . 'class-breadcrumb.php';
require_once BEAKAI_THEME_INC . 'class-navwalker.php';
require_once BEAKAI_THEME_INC . 'class-customizer.php';
require_once BEAKAI_THEME_INC . 'customizer_data.php';
require_once BEAKAI_THEME_INC . 'class-tgm-plugin-activation.php';
require_once BEAKAI_THEME_INC . 'add_plugin.php';



/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function beakai_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'beakai_pingback_header' );


/**
*
* comment section
*
*/
add_filter('comment_form_default_fields', 'beakai_comment_form_default_fields_func');

function beakai_comment_form_default_fields_func($default){
	$default['author'] = '<div class="row">
    <div class="col-xl-6">
    	<div class="contacts-name">
    		<label>'.esc_html__('Your name *','beakai').'</label>
        	<input type="text" name="author">
        </div>
    </div>';
	$default['email'] = '<div class="col-xl-6">
		<div class="contacts-email ">
		<label>'.esc_html__('Your email *','beakai').'</label>
        <input type="text" name="email">
    	</div>
    </div>';
	$default['url'] = '';

	$default['clients_commnet'] = '<div class="col-xl-12">
	<div class="contacts-message">
	<label>'.esc_html__('Comments *','beakai').'</label>
     <textarea id="comment" name="comment" cols="30" rows="10"></textarea>
    </div>';
	return $default;
}

add_filter('comment_form_defaults', 'beakai_comment_form_defaults_func');

function beakai_comment_form_defaults_func($info){
	if( !is_user_logged_in() ) {
		$info['comment_field'] = '';
		$info['submit_field'] = '%1$s %2$s</div></div>';
	} 
	else {
		$info['comment_field'] = '<div class="comments-textarea contacts-message contact-icon">
											<label>'.esc_html__('Comments *','beakai').'</label>
                                                <textarea id="comment" name="comment" cols="30" rows="10"></textarea>';
        $info['submit_field'] = '%1$s %2$s</div>';
	}


	$info['submit_button'] = '<button class="bt-btn btn-h-white" type="submit"><i class="fal fa-comments"></i> '.esc_html__('Post Comment','beakai').' </button>';

	$info['title_reply_before'] = '<div class="post-comments-title">
                                        <h2>';
	$info['title_reply_after'] = '</h2></div>';
	$info['comment_notes_before'] = '';

	return $info;
}

if( !function_exists('beakai_comment') ) {
	function beakai_comment($comment, $args, $depth) {
		$GLOBAL['comment'] = $comment;
		extract($args, EXTR_SKIP);
		$args['reply_text'] = '<i class="fal fa-reply"></i> Reply';
		$replayClass = 'comment-depth-' . esc_attr($depth);
		?>
			<li id="comment-<?php comment_ID(); ?>">
				<div class="comments-box">
					<div class="comments-avatar">
						<?php print get_avatar($comment, 102, null, null, array('class'=> array())); ?>
					</div>
					<div class="comments-text">
						<div class="avatar-name">
							<h5><?php print get_comment_author_link(); ?></h5>
							<span><?php comment_time( get_option('date_format') ); ?></span>
						</div>
						<?php comment_text(); ?>
						<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>
					</div>
				</div>
		<?php
	}
}



/**
* shortcode supports for removing extra p, spance etc
*
*/
add_filter( 'the_content', 'beakai_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function beakai_shortcode_extra_content_remove( $content ) {

    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );

}


// beakai_search_filter_form
if( !function_exists('beakai_search_filter_form')) {
  function beakai_search_filter_form( $form ) {
    
    $form = sprintf( 
    	'<div class="sidebar-form"><form class="sidebar-search-form" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="fas fa-search"></i>  </button>
		</form></div>',
		esc_url( home_url('/') ),
		esc_attr( get_search_query() ),
		esc_html__('Search','beakai')
	);

    return $form;
  }
  add_filter( 'get_search_form','beakai_search_filter_form');
}

add_action('admin_enqueue_scripts', 'beakai_admin_custom_scripts');

function beakai_admin_custom_scripts() {
	wp_enqueue_media();
	wp_register_script('beakai-admin-custom', get_template_directory_uri().'/inc/js/admin_custom.js', array('jquery'), '', true);
	wp_enqueue_script('beakai-admin-custom');
}


