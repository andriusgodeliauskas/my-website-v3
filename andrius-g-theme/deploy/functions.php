<?php
/**
 * Andrius G Theme functions and definitions
 */

if ( ! function_exists( 'andrius_g_setup' ) ) :
	function andrius_g_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register Navigation Menus
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'andrius-g-theme' ),
		) );

		// HTML5 support
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

        // WooCommerce Support
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'andrius_g_setup' );

/**
 * Enqueue scripts and styles.
 */
function andrius_g_scripts() {
	wp_enqueue_style( 'andrius-g-style', get_stylesheet_uri() );
    wp_enqueue_script( 'alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', array(), '3.10.5', true );
}
add_action( 'wp_enqueue_scripts', 'andrius_g_scripts' );


/**
 * Custom Nav Walker for Tailwind CSS classes (Desktop)
 */
class Tailwind_Nav_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $a_class = 'text-white/70 hover:text-cyan-400 transition-colors';
        if ( in_array('current-menu-item', $classes) ) {
            $a_class = 'text-cyan-400';
        }

        $output .= '<li>';
        $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($a_class) . '">';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

/**
 * Custom Nav Walker for Tailwind CSS classes (Mobile)
 */
class Tailwind_Mobile_Nav_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $a_class = 'text-5xl font-black tracking-tighter transition-colors text-white';
        if ( in_array('current-menu-item', $classes) ) {
            $a_class = 'text-5xl font-black tracking-tighter transition-colors text-cyan-400';
        }

        $output .= '<a href="' . esc_url($item->url) . '" @click="mobileMenuOpen = false" class="' . esc_attr($a_class) . '">';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }
}


/**
 * Change add to cart text on single product page.
 */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'andrius_g_custom_cart_button_text' );
function andrius_g_custom_cart_button_text() {
    global $product;
    
    // Define the category slug for "buy me a coffee" products
    $category_slug = 'buy-me-a-coffee';

    if ( has_term( $category_slug, 'product_cat', $product->get_id() ) ) {
        return __( 'Support Project', 'woocommerce' );
    } else {
        return __( 'Add to cart', 'woocommerce' );
    }
}

/**
 * Change add to cart text on archives.
 */
add_filter( 'woocommerce_product_add_to_cart_text', 'andrius_g_archive_custom_cart_button_text', 10, 2 );
function andrius_g_archive_custom_cart_button_text( $text, $product ) {
    if ( $product->is_type( 'simple' ) ) {
        // Define the category slug for "buy me a coffee" products
        $category_slug = 'buy-me-a-coffee';

        if ( has_term( $category_slug, 'product_cat', $product->get_id() ) ) {
            return __( 'Support Project', 'woocommerce' );
        }
    }
    return $text;
}

add_filter( 'woocommerce_loop_add_to_cart_link', 'andrius_g_custom_add_to_cart_button', 10, 3 );
function andrius_g_custom_add_to_cart_button( $html, $product, $args ) {
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        $button_text = $product->add_to_cart_text();
        $html = '<div class="glow-button-wrapper" style="display: inline-block;">';
        $html .= '<a href="' . esc_url($product->add_to_cart_url()) . '" data-quantity="1" class="glow-button product_type_' . esc_attr($product->get_type()) . ' ' . ($product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '') . ' ajax_add_to_cart" data-product_id="' . esc_attr($product->get_id()) . '" rel="nofollow" style="padding: 0.8rem 1.5rem; font-size: 0.7rem;">';
        $html .= '<span class="glow-button-shimmer"></span>';
        $html .= '<span class="relative z-10 flex items-center gap-2">' . esc_html($button_text) . '</span>';
        $html .= '</a>';
        $html .= '</div>';
    }
    return $html;
}
