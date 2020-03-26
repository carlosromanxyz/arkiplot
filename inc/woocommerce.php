<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package ARKIPLOT
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function arkiplot_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'arkiplot_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function arkiplot_woocommerce_scripts() {
	// wp_enqueue_style( 'arkiplot-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'arkiplot-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'arkiplot_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function arkiplot_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'arkiplot_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function arkiplot_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'arkiplot_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function arkiplot_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'arkiplot_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function arkiplot_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'arkiplot_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function arkiplot_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'arkiplot_woocommerce_related_products_args' );

if ( ! function_exists( 'arkiplot_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function arkiplot_woocommerce_product_columns_wrapper() {
		$columns = arkiplot_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'arkiplot_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'arkiplot_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function arkiplot_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'arkiplot_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'arkiplot_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function arkiplot_woocommerce_wrapper_before() { ?>
		<?php woocommerce_breadcrumb(); ?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'arkiplot_woocommerce_wrapper_before' );

if ( ! function_exists( 'arkiplot_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function arkiplot_woocommerce_wrapper_after() { ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	<?php }
}
add_action( 'woocommerce_after_main_content', 'arkiplot_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'arkiplot_woocommerce_header_cart' ) ) {
			arkiplot_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'arkiplot_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function arkiplot_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		arkiplot_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'arkiplot_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'arkiplot_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function arkiplot_woocommerce_cart_link() { ?>
		<a class="btn btn-secondary px-5 text-white d-block d-lg-inline-block mb-3 mb-lg-0" type="button" id="cart-button" href="<?php echo wc_get_cart_url(); ?>">
			<?php $item_count_text = sprintf(_n( '%d producto', '%d productos', WC()->cart->get_cart_contents_count(), 'arkiplot' ), WC()->cart->get_cart_contents_count()); ?>
			<i class="fas fa-shopping-cart mr-2"></i>
			<span class="amount"><?php // echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
			<span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'arkiplot_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function arkiplot_woocommerce_header_cart() { ?>
			<?php arkiplot_woocommerce_cart_link(); ?>
		<?php
	}
}

// Remove breadcrumbs from shop & categories
add_filter( 'woocommerce_before_main_content', 'remove_breadcrumbs');
function remove_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
}

/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '<i class="fas fa-angle-right mx-2 mt-1"></i>',
            'wrap_before' => '<nav class="breadcrumb bg-white px-0" itemprop="breadcrumb"><div class="container">',
            'wrap_after'  => '</div></nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

// Remove title for customizations
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

// Remove the product description Title
add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
function remove_product_description_heading() {
	return '';
}

/**
 * Reorder product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

	$tabs['fancy_designer_tab']['priority'] = 1;		// Fancy Designer first
	// $tabs['reviews']['priority'] = 5;					// Reviews first
	$tabs['description']['priority'] = 10;				// Description second
	// $tabs['additional_information']['priority'] = 15;	// Additional information third
	return $tabs;
}

/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woocommerce_fancy_designer_tab' );
function woocommerce_fancy_designer_tab( $tabs ) {
	
	$designer = get_post_meta( get_the_ID(), 'fpd_product_settings' );
	
	if( $designer == '' ) :
		return false;
	else :
		// Add the new tab
		$tabs['fancy_designer_tab'] = array(
			'title' 	=> __( 'Diseña tu producto', 'arkiplot' ),
			'priority' 	=> 10,
			'callback' 	=> 'woocommerce_fancy_designer_tab_content'
		);
		return $tabs;
	endif;
}
function woocommerce_fancy_designer_tab_content() { ?>
	<div class="d-flex justify-content-center">
		<?php do_action( 'fpd_product_designer' ); ?>
	</div>
<?php }
