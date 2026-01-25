<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<style>
    /* Custom Product Page Styles */
    .product-detail-wrapper {
        padding: 4rem 0 8rem;
    }
    .product-gallery-clean img {
        border-radius: 2rem;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        width: 100%;
        height: auto;
    }
    .product-info-clean h1 {
        font-size: 4rem;
        font-weight: 900;
        color: #0f172a;
        margin-bottom: 1rem;
        line-height: 1.1;
        text-align: center;
    }
    .product-price-clean {
        font-size: 2.5rem;
        font-weight: 800;
        color: #2563eb;
        margin-bottom: 2rem;
        display: block;
    }
    .product-description-clean {
        font-size: 1.125rem;
        color: #475569;
        line-height: 1.8;
        margin-bottom: 2.5rem;
    }
    .single_add_to_cart_button {
        background-color: #0f172a !important;
        color: white !important;
        padding: 1rem 3rem !important;
        border-radius: 1rem !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.1em !important;
        transition: all 0.3s !important;
    }
    .single_add_to_cart_button:hover {
        background-color: #2563eb !important;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
    }
</style>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product-detail-wrapper container mx-auto px-4', $product ); ?>>

	<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
        
        <!-- Gallery -->
        <div class="product-gallery-clean">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'woocommerce_before_single_product_summary' );
            ?>
        </div>

        <!-- Summary -->
        <div class="product-info-clean">
            <?php
                // Title
                the_title( '<h1>', '</h1>' );
                
                // Price
                echo '<div class="product-price-clean">' . $product->get_price_html() . '</div>';
                
                // Short Description
                echo '<div class="product-description-clean">';
                the_excerpt();
                echo '</div>';
                
                // Add to Cart
                woocommerce_template_single_add_to_cart();
                
                // Meta
                echo '<div class="mt-8 pt-8 border-t border-slate-100 text-sm text-slate-400">';
                woocommerce_template_single_meta();
                echo '</div>';
            ?>
        </div>

	</div>
    
    <!-- Long Description & Reviews -->
    <div class="mt-20 pt-10 border-t border-slate-100">
        <?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>
    </div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>