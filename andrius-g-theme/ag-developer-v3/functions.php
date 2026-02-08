<?php
/**
 * Andrius G Theme functions and definitions
 */

// Theme setup
if ( ! function_exists( 'andrius_g_setup' ) ) :
function andrius_g_setup() {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    register_nav_menus(array('primary' => 'Primary Menu'));

    // Custom image sizes for projects
    add_image_size('project-featured', 800, 600, true);
    add_image_size('project-card', 600, 400, true);
    add_image_size('project-thumb', 400, 300, true);
}
endif;
add_action('after_setup_theme', 'andrius_g_setup');

// Enqueue scripts and styles - NO Tailwind CDN, NO Alpine.js
function andrius_g_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap', array(), null);

    // Theme stylesheet
    wp_enqueue_style('andrius-g-style', get_stylesheet_uri(), array('google-fonts'), '2.0.0');

    // Theme JavaScript
    wp_enqueue_script('andrius-g-scripts', get_template_directory_uri() . '/js/ag-scripts.js', array(), '2.0.0', true);
}
add_action('wp_enqueue_scripts', 'andrius_g_scripts');

/**
 * Custom Nav Walker for ag-nav navigation (Desktop)
 * Outputs links with ag-nav__link class and data-section attribute
 */
class AG_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="ag-nav__sub-links">';
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</ul>';
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $active_class = '';
        if (in_array('current-menu-item', $classes) || in_array('current_page_item', $classes)) {
            $active_class = ' ag-nav__link--active';
        }

        // Extract section identifier from URL hash or use sanitized title
        $url = esc_url($item->url);
        $section = '';
        if (strpos($url, '#') !== false) {
            $section = sanitize_title(substr($url, strpos($url, '#') + 1));
        } else {
            $section = sanitize_title($item->title);
        }

        $output .= '<li>';
        $output .= '<a href="' . $url . '" class="ag-nav__link' . esc_attr($active_class) . '" data-section="' . esc_attr($section) . '">';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}

/**
 * Custom Nav Walker for Mobile Navigation
 * Outputs ag-nav__mobile-link items
 */
class AG_Mobile_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $url = esc_url($item->url);

        $output .= '<a href="' . $url . '" class="ag-nav__mobile-link">';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        // No wrapping li, mobile links are flat
    }
}

/**
 * Change add to cart text on single product page.
 */
add_filter('woocommerce_product_single_add_to_cart_text', 'andrius_g_custom_cart_button_text');
function andrius_g_custom_cart_button_text() {
    global $product;

    $category_slug = 'buy-me-a-coffee';

    if (has_term($category_slug, 'product_cat', $product->get_id())) {
        return __('Support Project', 'woocommerce');
    } else {
        return __('Add to cart', 'woocommerce');
    }
}

/**
 * Change add to cart text on archives.
 */
add_filter('woocommerce_product_add_to_cart_text', 'andrius_g_archive_custom_cart_button_text', 10, 2);
function andrius_g_archive_custom_cart_button_text($text, $product) {
    if ($product->is_type('simple')) {
        $category_slug = 'buy-me-a-coffee';

        if (has_term($category_slug, 'product_cat', $product->get_id())) {
            return __('Support Project', 'woocommerce');
        }
    }
    return $text;
}

/**
 * Custom add to cart button with glow effect for WooCommerce archives.
 */
add_filter('woocommerce_loop_add_to_cart_link', 'andrius_g_custom_add_to_cart_button', 10, 3);
function andrius_g_custom_add_to_cart_button($html, $product, $args) {
    if (is_shop() || is_product_category() || is_product_tag()) {
        $button_text = $product->add_to_cart_text();
        $html = '<div class="glow-button-wrapper" style="display: inline-block;">';
        $html .= '<a href="' . esc_url($product->add_to_cart_url()) . '" data-quantity="1" class="glow-button product_type_' . esc_attr($product->get_type()) . ' ' . ($product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '') . ' ajax_add_to_cart" data-product_id="' . esc_attr($product->get_id()) . '" rel="nofollow" style="padding: 0.8rem 1.5rem; font-size: 0.7rem;">';
        $html .= '<span class="glow-button-shimmer"></span>';
        $html .= '<span class="relative z-10">' . esc_html($button_text) . '</span>';
        $html .= '</a>';
        $html .= '</div>';
    }
    return $html;
}

/**
 * Email obfuscation helper
 * Encodes email addresses to prevent spam harvesting
 */
function andrius_g_obfuscate_email($email) {
    $output = '';
    for ($i = 0; $i < strlen($email); $i++) {
        $output .= '&#' . ord($email[$i]) . ';';
    }
    return $output;
}
