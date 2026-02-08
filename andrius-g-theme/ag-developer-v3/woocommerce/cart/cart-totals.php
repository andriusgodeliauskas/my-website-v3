<?php
/**
 * Cart totals - Dark theme with glassmorphism design.
 *
 * @package AndriusGTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<style>
	/* Cart Totals - Dark Theme */
	.ag-cart-totals__title {
		font-family: 'Space Grotesk', sans-serif;
		font-size: 1.15rem;
		font-weight: 600;
		color: #f5f5f5;
		margin-bottom: 1.5rem;
		padding-bottom: 1rem;
		border-bottom: 1px solid rgba(255,255,255,0.08);
	}
	.ag-cart-totals__table {
		width: 100%;
		border-collapse: collapse;
		font-family: 'Inter', sans-serif;
		font-size: 0.9rem;
	}
	.ag-cart-totals__table th {
		text-align: left;
		font-weight: 400;
		color: #94a3b8;
		padding: 0.75rem 0;
	}
	.ag-cart-totals__table td {
		text-align: right;
		padding: 0.75rem 0;
		color: #f5f5f5;
		font-weight: 500;
	}
	.ag-cart-totals__table tr {
		border-bottom: 1px solid rgba(255,255,255,0.06);
	}
	.ag-cart-totals__table tr:last-child {
		border-bottom: none;
	}
	.ag-cart-totals__table .cart-discount td {
		color: #22c55e;
		font-weight: 500;
	}
	.ag-cart-totals__table .order-total {
		border-top: 1px solid rgba(255,255,255,0.12);
		border-bottom: none;
	}
	.ag-cart-totals__table .order-total th {
		font-family: 'Space Grotesk', sans-serif;
		font-weight: 600;
		color: #f5f5f5;
		padding-top: 1rem;
		font-size: 1rem;
	}
	.ag-cart-totals__table .order-total td {
		font-family: 'Space Grotesk', sans-serif;
		font-weight: 700;
		color: #f59e0b;
		padding-top: 1rem;
		font-size: 1.25rem;
	}

	/* Shipping text */
	.ag-cart-totals__table .shipping td {
		font-size: 0.85rem;
		color: #94a3b8;
	}
	.ag-cart-totals__table .shipping td a {
		color: #00f0ff;
		text-decoration: none;
	}
	.ag-cart-totals__table .shipping td a:hover {
		color: #f5f5f5;
	}

	/* Proceed to checkout button */
	.ag-cart-totals__checkout {
		margin-top: 1.5rem;
	}
	.ag-cart-totals__checkout .checkout-button {
		display: block;
		width: 100%;
		padding: 0.875rem 2rem;
		background: #f59e0b;
		color: #0a0a0f;
		font-family: 'Space Grotesk', sans-serif;
		font-weight: 600;
		font-size: 0.9rem;
		border: none;
		border-radius: 999px;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		transition: transform 0.3s ease, box-shadow 0.3s ease;
		letter-spacing: 0.02em;
	}
	.ag-cart-totals__checkout .checkout-button:hover {
		transform: scale(1.03);
		box-shadow: 0 0 24px rgba(245, 158, 11, 0.35);
		color: #0a0a0f;
	}
</style>

<div class="ag-cart-totals">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2 class="ag-cart-totals__title"><?php esc_html_e( 'Cart Totals', 'woocommerce' ); ?></h2>

	<table cellspacing="0" class="ag-cart-totals__table">

		<tr class="cart-subtotal">
			<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<tr class="shipping">
				<th><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
			</tr>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php
		if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) :
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = '';

			if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
				/* translators: %s: country name */
				$estimated_text = sprintf(
					' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>',
					esc_html( WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
				);
			}

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) :
				foreach ( WC()->cart->get_tax_totals() as $code => $tax ) :
					?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
						<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
					<?php
				endforeach;
			else :
				?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
					<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	</table>

	<div class="wc-proceed-to-checkout ag-cart-totals__checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
