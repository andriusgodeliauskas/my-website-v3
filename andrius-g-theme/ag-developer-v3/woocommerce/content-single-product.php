<?php
/**
 * The template for displaying product content in the single-product.php template.
 *
 * Dark theme with glassmorphism design.
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
	/* Single Product Content - Dark Theme */
	.ag-single-product {
		padding: 4rem 0 8rem;
	}
	.ag-single-product__grid {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 3rem;
		align-items: start;
		max-width: 1100px;
		margin: 0 auto;
		padding: 0 1rem;
	}
	@media (max-width: 768px) {
		.ag-single-product__grid {
			grid-template-columns: 1fr;
			gap: 2rem;
		}
	}

	/* Gallery */
	.ag-single-product__gallery {
		background: rgba(255,255,255,0.04);
		backdrop-filter: blur(12px);
		-webkit-backdrop-filter: blur(12px);
		border: 1px solid rgba(255,255,255,0.08);
		border-radius: 16px;
		overflow: hidden;
	}
	.ag-single-product__gallery img {
		border-radius: 16px;
		width: 100%;
		height: auto;
		display: block;
	}
	.ag-single-product__gallery .woocommerce-product-gallery {
		margin: 0;
		padding: 0;
	}
	.ag-single-product__gallery .woocommerce-product-gallery__image {
		margin: 0;
	}
	.ag-single-product__gallery .flex-control-thumbs {
		display: flex;
		gap: 0.5rem;
		padding: 0.75rem;
		list-style: none;
		margin: 0;
	}
	.ag-single-product__gallery .flex-control-thumbs li {
		flex: 0 0 60px;
	}
	.ag-single-product__gallery .flex-control-thumbs li img {
		border-radius: 8px;
		opacity: 0.5;
		transition: opacity 0.3s ease;
		cursor: pointer;
	}
	.ag-single-product__gallery .flex-control-thumbs li img.flex-active,
	.ag-single-product__gallery .flex-control-thumbs li img:hover {
		opacity: 1;
	}

	/* Summary / Info */
	.ag-single-product__info h1 {
		font-family: 'Space Grotesk', sans-serif;
		font-size: clamp(1.75rem, 4vw, 2.75rem);
		font-weight: 700;
		color: #f5f5f5;
		line-height: 1.15;
		margin-bottom: 1rem;
	}
	.ag-single-product__price {
		font-family: 'Space Grotesk', sans-serif;
		font-size: 2.25rem;
		font-weight: 700;
		color: #f59e0b;
		margin-bottom: 1.5rem;
		display: block;
	}
	.ag-single-product__price del {
		color: #94a3b8;
		font-size: 1.5rem;
		margin-right: 0.5rem;
	}
	.ag-single-product__price ins {
		text-decoration: none;
	}
	.ag-single-product__desc {
		font-family: 'Inter', sans-serif;
		font-size: 1rem;
		color: #94a3b8;
		line-height: 1.8;
		margin-bottom: 2rem;
	}

	/* Add to cart button */
	.ag-single-product__info .single_add_to_cart_button {
		display: inline-flex;
		align-items: center;
		gap: 0.5rem;
		padding: 0.875rem 2rem;
		background: #f59e0b;
		color: #0a0a0f;
		font-family: 'Space Grotesk', sans-serif;
		font-weight: 600;
		font-size: 0.9rem;
		border: none;
		border-radius: 999px;
		cursor: pointer;
		text-decoration: none;
		transition: transform 0.3s ease, box-shadow 0.3s ease;
		letter-spacing: 0.02em;
		text-transform: none;
	}
	.ag-single-product__info .single_add_to_cart_button:hover {
		transform: scale(1.03);
		box-shadow: 0 0 24px rgba(245, 158, 11, 0.35);
		background: #f59e0b;
		color: #0a0a0f;
	}

	/* Quantity input */
	.ag-single-product__info .quantity input[type="number"] {
		background: rgba(255,255,255,0.06);
		border: 1px solid rgba(255,255,255,0.12);
		border-radius: 8px;
		color: #f5f5f5;
		font-family: 'Inter', sans-serif;
		padding: 0.5rem 0.75rem;
		width: 4rem;
		text-align: center;
	}

	/* Meta */
	.ag-single-product__meta {
		margin-top: 2rem;
		padding-top: 2rem;
		border-top: 1px solid rgba(255,255,255,0.08);
		font-size: 0.85rem;
		color: #94a3b8;
	}
	.ag-single-product__meta a {
		color: #00f0ff;
		text-decoration: none;
		transition: color 0.3s ease;
	}
	.ag-single-product__meta a:hover {
		color: #f5f5f5;
	}

	/* Tabs / Related */
	.ag-single-product__extra {
		margin-top: 4rem;
		padding-top: 2.5rem;
		border-top: 1px solid rgba(255,255,255,0.08);
		max-width: 1100px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 1rem;
		padding-right: 1rem;
	}
	.ag-single-product__extra .woocommerce-tabs ul.tabs {
		list-style: none;
		display: flex;
		gap: 0.5rem;
		padding: 0;
		margin: 0 0 2rem;
		border-bottom: 1px solid rgba(255,255,255,0.08);
	}
	.ag-single-product__extra .woocommerce-tabs ul.tabs li {
		margin: 0;
		padding: 0;
	}
	.ag-single-product__extra .woocommerce-tabs ul.tabs li a {
		display: block;
		padding: 0.75rem 1.25rem;
		font-family: 'Inter', sans-serif;
		font-size: 0.85rem;
		font-weight: 500;
		color: #94a3b8;
		text-decoration: none;
		border-bottom: 2px solid transparent;
		transition: color 0.3s ease, border-color 0.3s ease;
	}
	.ag-single-product__extra .woocommerce-tabs ul.tabs li.active a {
		color: #f5f5f5;
		border-bottom-color: #00f0ff;
	}
	.ag-single-product__extra .woocommerce-tabs .panel {
		font-family: 'Inter', sans-serif;
		font-size: 0.95rem;
		color: #94a3b8;
		line-height: 1.8;
	}
	.ag-single-product__extra .woocommerce-tabs .panel h2 {
		font-family: 'Space Grotesk', sans-serif;
		color: #f5f5f5;
		font-size: 1.25rem;
		margin-bottom: 1rem;
	}
</style>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'ag-single-product', $product ); ?>>

	<div class="ag-single-product__grid">

		<!-- Gallery -->
		<div class="ag-single-product__gallery">
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
		<div class="ag-single-product__info">
			<?php
			// Title.
			the_title( '<h1>', '</h1>' );

			// Price.
			echo '<div class="ag-single-product__price">' . wp_kses_post( $product->get_price_html() ) . '</div>';

			// Short Description.
			if ( has_excerpt() ) {
				echo '<div class="ag-single-product__desc">';
				the_excerpt();
				echo '</div>';
			}

			// Add to Cart.
			woocommerce_template_single_add_to_cart();

			// Meta.
			echo '<div class="ag-single-product__meta">';
			woocommerce_template_single_meta();
			echo '</div>';
			?>
		</div>

	</div>

	<!-- Long Description & Reviews -->
	<div class="ag-single-product__extra">
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
