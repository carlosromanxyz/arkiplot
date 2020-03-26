<?php
/**
 * ARKIPLOT functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ARKIPLOT
 */

if ( ! function_exists( 'arkiplot_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function arkiplot_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ARKIPLOT, use a find and replace
		 * to change 'arkiplot' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'arkiplot', get_template_directory() . '/languages' );

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
		add_image_size( 'featured-product', 300, 200, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'cabecera' => esc_html__( 'Cabecera', 'arkiplot' ),
			'pie' => esc_html__( 'Pié', 'arkiplot' ),
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
		add_theme_support( 'custom-background', apply_filters( 'arkiplot_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
	}
endif;
add_action( 'after_setup_theme', 'arkiplot_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function arkiplot_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'arkiplot_content_width', 640 );
}
add_action( 'after_setup_theme', 'arkiplot_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function arkiplot_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'arkiplot' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'arkiplot' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'arkiplot_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function arkiplot_scripts() {
	wp_enqueue_style( 'arkiplot-style', get_stylesheet_uri() );
	wp_enqueue_style( 'arkiplot-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css', 'all' );
	wp_enqueue_style( 'arkiplot-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css', 'all' );
	wp_enqueue_style( 'arkiplot-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', 'all' );
	wp_enqueue_style( 'arkiplot-blueimp', 'https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.36.0/css/blueimp-gallery.min.css', 'all' );
	wp_enqueue_style( 'arkiplot-blueimp-indicator', 'https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.36.0/css/blueimp-gallery-indicator.min.css', 'all' );

	// deregister default jQuery included with Wordpress
	wp_deregister_script( 'jquery' );

	$jquery_cdn = '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js';
	wp_enqueue_script( 'jquery', $jquery_cdn, array(), '2.2.4', false );

	wp_enqueue_script( 'arkiplot-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js', true );
	wp_enqueue_script( 'arkiplot-blueimp', 'https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.36.0/js/jquery.blueimp-gallery.min.js', true );
	wp_enqueue_script( 'arkiplot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'arkiplot-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'arkiplot-theme', get_template_directory_uri() . '/js/theme.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'arkiplot_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Advanced Custom Fields
 */
require get_template_directory() . '/inc/advanced-custom-fields.php';

/**
 * Bootstrap Navwalker
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Custom Post Type
 */
require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Custom Taxonomy
 */
require get_template_directory() . '/inc/custom-taxonomy.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
