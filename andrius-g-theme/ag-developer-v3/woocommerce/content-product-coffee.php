<?php
/**
 * The template for displaying product content as a coffee card.
 *
 * Glassmorphism card matching the coffee section from the portfolio dark theme.
 *
 * @package AndriusGTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Get product details.
$product_name  = $product->get_name();
$product_desc  = $product->get_short_description();
$product_price = $product->get_price_html();
$product_link  = $product->get_permalink();

// Determine emoji based on price or product name.
$price_val = (float) $product->get_price();
if ( $price_val >= 10 ) {
	$emoji = '&#9749;&#9749;&#9749;';
} elseif ( $price_val >= 5 ) {
	$emoji = '&#9749;&#9749;';
} else {
	$emoji = '&#9749;';
}

// Check if this is the "popular" product (medium tier or has a specific tag).
$is_popular = has_term( 'popular', 'product_tag', $product->get_id() );
?>

<li <?php wc_product_class( 'ag-coffee__card' . ( $is_popular ? ' ag-coffee__card--popular' : '' ), $product ); ?>>
	<?php if ( $is_popular ) : ?>
		<div class="ag-coffee__popular-badge"><?php esc_html_e( 'Most Popular', 'woocommerce' ); ?></div>
	<?php endif; ?>

	<div class="ag-coffee__emoji"><?php echo $emoji; ?></div>

	<h3 class="ag-coffee__card-title">
		<a href="<?php echo esc_url( $product_link ); ?>" style="color: inherit; text-decoration: none;">
			<?php echo esc_html( $product_name ); ?>
		</a>
	</h3>

	<?php if ( $product_desc ) : ?>
		<p class="ag-coffee__card-desc"><?php echo wp_kses_post( $product_desc ); ?></p>
	<?php endif; ?>

	<div class="ag-coffee__price"><?php echo wp_kses_post( $product_price ); ?></div>

	<?php woocommerce_template_loop_add_to_cart(); ?>
</li>
