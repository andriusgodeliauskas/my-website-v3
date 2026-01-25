<?php
/**
 * Cart totals (Custom Tailwind Design - Light)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="w-full text-brand-dark">
	
	<div class="cart-total2">
		
		<?php do_action( 'woocommerce_before_cart_totals' ); ?>

		<h2 class="text-xl font-bold text-brand-dark mb-6 border-b border-gray-200 pb-4"><?php _e( 'Cart totals', '99fy' ); ?></h2>

		<table cellspacing="0" class="w-full text-sm [&_th]:text-left [&_th]:font-normal [&_th]:text-gray-500 [&_th]:py-3 [&_td]:text-right [&_td]:py-3 [&_tr]:border-b [&_tr]:border-gray-200 last:[&_tr]:border-0">

			<tr class="cart-subtotal">
				<th><?php _e( 'Subtotal', '99fy' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Subtotal', '99fy' ); ?>" class="font-medium text-brand-dark"><?php wc_cart_totals_subtotal_html(); ?></td>
			</tr>

			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
					<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>" class="text-green-600 font-medium"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

				<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

			<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

				<tr class="shipping">
					<th><?php _e( 'Shipping', '99fy' ); ?></th>
					<td data-title="<?php esc_attr_e( 'Shipping', '99fy' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
				</tr>

			<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<tr class="fee">
					<th><?php echo esc_html( $fee->name ); ?></th>
					<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) :
				$taxable_address = WC()->customer->get_taxable_address();
				$estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
						? sprintf( ' <small>' . __( '(estimated for %s)', '99fy' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
						: '';

				if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
					<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
						<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
							<th><?php echo esc_html( $tax->label ) . $estimated_text; ?></th>
							<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr class="tax-total">
						<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
						<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
					</tr>
				<?php endif; ?>
			<?php endif; ?>

			<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

			<tr class="order-total text-lg font-bold text-brand-dark border-t border-gray-300">
				<th class="py-4 text-brand-dark"><?php _e( 'Total', '99fy' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Total', '99fy' ); ?>" class="py-4 text-brand-primary"><?php wc_cart_totals_order_total_html(); ?></td>
			</tr>

			<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

		</table>

		<div class="wc-proceed-to-checkout mt-6">
            <style>
                .wc-proceed-to-checkout .checkout-button {
                    display: block;
                    width: 100%;
                    background-color: #2563eb; /* Brand Primary */
                    color: #ffffff;
                    font-weight: 700;
                    padding: 1rem;
                    text-align: center;
                    border-radius: 0.5rem;
                    transition: all 0.3s;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1), 0 2px 4px -1px rgba(37, 99, 235, 0.06);
                }
                .wc-proceed-to-checkout .checkout-button:hover {
                    background-color: #1d4ed8; /* Brand Hover */
                    transform: translateY(-2px);
                    box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
                    color: #ffffff;
                }
            </style>
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>

		<?php do_action( 'woocommerce_after_cart_totals' ); ?>

	</div>

</div>
