<?php
/**
 * Cart Page - Dark theme with glassmorphism design.
 *
 * @package AndriusGTheme
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<style>
	/* Cart Page - Dark Theme */
	.ag-cart {
		background: #0a0a0f;
		min-height: 100vh;
		padding: 7rem 1.5rem 6rem;
	}
	.ag-cart__inner {
		max-width: 1100px;
		margin: 0 auto;
	}
	.ag-cart__label {
		font-family: 'Fira Code', monospace;
		font-size: 0.875rem;
		color: #22c55e;
		margin-bottom: 0.75rem;
	}
	.ag-cart__title {
		font-family: 'Space Grotesk', sans-serif;
		font-size: clamp(2rem, 5vw, 3rem);
		font-weight: 700;
		color: #f5f5f5;
		margin-bottom: 2.5rem;
	}
	.ag-cart__layout {
		display: flex;
		gap: 2rem;
		align-items: flex-start;
	}
	@media (max-width: 1024px) {
		.ag-cart__layout {
			flex-direction: column;
		}
	}
	.ag-cart__items {
		flex: 1;
		min-width: 0;
	}

	/* Cart items card */
	.ag-cart__card {
		background: rgba(255,255,255,0.04);
		backdrop-filter: blur(12px);
		-webkit-backdrop-filter: blur(12px);
		border: 1px solid rgba(255,255,255,0.08);
		border-radius: 16px;
		overflow: hidden;
	}
	.ag-cart__header {
		display: none;
		padding: 1rem 1.5rem;
		border-bottom: 1px solid rgba(255,255,255,0.08);
		font-family: 'Fira Code', monospace;
		font-size: 0.75rem;
		color: #94a3b8;
		text-transform: uppercase;
		letter-spacing: 0.1em;
	}
	@media (min-width: 769px) {
		.ag-cart__header {
			display: grid;
			grid-template-columns: 6fr 2fr 2fr 2fr;
			gap: 1rem;
		}
		.ag-cart__header-price,
		.ag-cart__header-qty,
		.ag-cart__header-subtotal {
			text-align: center;
		}
		.ag-cart__header-subtotal {
			text-align: right;
		}
	}

	/* Individual cart item row */
	.ag-cart__item {
		padding: 1.25rem 1.5rem;
		border-bottom: 1px solid rgba(255,255,255,0.05);
		transition: background 0.3s ease;
	}
	.ag-cart__item:last-child {
		border-bottom: none;
	}
	.ag-cart__item:hover {
		background: rgba(255,255,255,0.02);
	}
	@media (min-width: 769px) {
		.ag-cart__item {
			display: grid;
			grid-template-columns: 6fr 2fr 2fr 2fr;
			gap: 1rem;
			align-items: center;
		}
	}
	.ag-cart__item-product {
		display: flex;
		align-items: center;
		gap: 1rem;
	}
	.ag-cart__item-thumb {
		width: 64px;
		height: 64px;
		border-radius: 10px;
		overflow: hidden;
		flex-shrink: 0;
		background: rgba(255,255,255,0.06);
		border: 1px solid rgba(255,255,255,0.08);
	}
	.ag-cart__item-thumb img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.ag-cart__item-name {
		font-family: 'Space Grotesk', sans-serif;
		font-weight: 600;
		color: #f5f5f5;
		text-decoration: none;
		transition: color 0.3s ease;
	}
	.ag-cart__item-name:hover {
		color: #00f0ff;
	}
	.ag-cart__item-backorder {
		font-size: 0.75rem;
		color: #f59e0b;
		margin-top: 0.25rem;
	}
	.ag-cart__item-price {
		font-family: 'Inter', sans-serif;
		color: #94a3b8;
		font-size: 0.9rem;
		text-align: center;
	}
	.ag-cart__item-qty {
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.ag-cart__item-qty input[type="number"] {
		background: rgba(255,255,255,0.06);
		border: 1px solid rgba(255,255,255,0.12);
		border-radius: 8px;
		color: #f5f5f5;
		font-family: 'Inter', sans-serif;
		padding: 0.4rem 0.5rem;
		width: 3.5rem;
		text-align: center;
		font-size: 0.85rem;
	}
	.ag-cart__item-qty input[type="number"]:focus {
		border-color: #00f0ff;
		outline: none;
	}
	.ag-cart__item-subtotal {
		font-family: 'Space Grotesk', sans-serif;
		font-weight: 600;
		color: #f59e0b;
		text-align: right;
		font-size: 0.95rem;
	}
	/* Mobile label for subtotal */
	.ag-cart__item-subtotal-label {
		display: none;
		font-family: 'Inter', sans-serif;
		font-size: 0.8rem;
		color: #94a3b8;
		font-weight: 400;
	}
	@media (max-width: 768px) {
		.ag-cart__item-price {
			text-align: left;
			margin-top: 0.75rem;
		}
		.ag-cart__item-qty {
			justify-content: flex-start;
			margin-top: 0.5rem;
		}
		.ag-cart__item-subtotal {
			text-align: left;
			margin-top: 0.5rem;
			display: flex;
			align-items: center;
			gap: 0.5rem;
		}
		.ag-cart__item-subtotal-label {
			display: inline;
		}
	}

	/* Actions row */
	.ag-cart__actions {
		display: flex;
		flex-wrap: wrap;
		gap: 1rem;
		margin-top: 1.5rem;
		align-items: center;
		justify-content: space-between;
	}
	@media (max-width: 768px) {
		.ag-cart__actions {
			flex-direction: column;
		}
	}
	.ag-cart__coupon {
		display: flex;
		gap: 0.75rem;
	}
	.ag-cart__coupon-input {
		background: rgba(255,255,255,0.06);
		border: 1px solid rgba(255,255,255,0.12);
		border-radius: 10px;
		color: #f5f5f5;
		font-family: 'Inter', sans-serif;
		padding: 0.75rem 1rem;
		font-size: 0.85rem;
		min-width: 180px;
	}
	.ag-cart__coupon-input::placeholder {
		color: #94a3b8;
	}
	.ag-cart__coupon-input:focus {
		border-color: #00f0ff;
		outline: none;
	}
	.ag-cart__coupon-btn {
		background: rgba(255,255,255,0.06);
		border: 1px solid rgba(255,255,255,0.12);
		border-radius: 10px;
		color: #f5f5f5;
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		padding: 0.75rem 1.25rem;
		font-size: 0.85rem;
		cursor: pointer;
		transition: border-color 0.3s ease, color 0.3s ease;
	}
	.ag-cart__coupon-btn:hover {
		border-color: #00f0ff;
		color: #00f0ff;
	}

	/* Update cart button - glow style */
	.ag-cart__update-btn {
		display: inline-flex;
		align-items: center;
		gap: 0.5rem;
		padding: 0.75rem 1.75rem;
		background: #f59e0b;
		color: #0a0a0f;
		font-family: 'Space Grotesk', sans-serif;
		font-weight: 600;
		font-size: 0.85rem;
		border: none;
		border-radius: 999px;
		cursor: pointer;
		transition: transform 0.3s ease, box-shadow 0.3s ease;
	}
	.ag-cart__update-btn:hover {
		transform: scale(1.03);
		box-shadow: 0 0 24px rgba(245, 158, 11, 0.35);
	}

	/* Sidebar totals wrapper */
	.ag-cart__sidebar {
		width: 100%;
		max-width: 360px;
	}
	@media (max-width: 1024px) {
		.ag-cart__sidebar {
			max-width: 100%;
		}
	}
	.ag-cart__sidebar-card {
		background: rgba(255,255,255,0.04);
		backdrop-filter: blur(12px);
		-webkit-backdrop-filter: blur(12px);
		border: 1px solid rgba(255,255,255,0.08);
		border-radius: 16px;
		padding: 1.5rem;
		position: sticky;
		top: 6rem;
	}

	/* Empty cart */
	.ag-cart__empty {
		text-align: center;
		padding: 4rem 2rem;
		background: rgba(255,255,255,0.04);
		backdrop-filter: blur(12px);
		-webkit-backdrop-filter: blur(12px);
		border: 1px solid rgba(255,255,255,0.08);
		border-radius: 16px;
	}
	.ag-cart__empty p {
		font-family: 'Space Grotesk', sans-serif;
		font-size: 1.25rem;
		color: #94a3b8;
		margin-bottom: 2rem;
	}
	.ag-cart__empty-btn {
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
		text-decoration: none;
		transition: transform 0.3s ease, box-shadow 0.3s ease;
	}
	.ag-cart__empty-btn:hover {
		transform: scale(1.03);
		box-shadow: 0 0 24px rgba(245, 158, 11, 0.35);
	}

	/* WooCommerce notices styling */
	.ag-cart .woocommerce-message,
	.ag-cart .woocommerce-info,
	.ag-cart .woocommerce-error {
		background: rgba(255,255,255,0.04);
		border: 1px solid rgba(255,255,255,0.08);
		border-radius: 10px;
		color: #f5f5f5;
		font-family: 'Inter', sans-serif;
		padding: 1rem 1.25rem;
		margin-bottom: 1.5rem;
	}
	.ag-cart .woocommerce-error {
		border-color: rgba(239, 68, 68, 0.3);
	}
	.ag-cart .woocommerce-message {
		border-color: rgba(34, 197, 94, 0.3);
	}
</style>

<main class="ag-cart">
	<div class="ag-cart__inner">
		<p class="ag-cart__label">// cart</p>
		<h1 class="ag-cart__title"><?php esc_html_e( 'Your Cart', 'woocommerce' ); ?></h1>

		<?php if ( ! WC()->cart->is_empty() ) : ?>
			<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
				<div class="ag-cart__layout">
					<!-- Cart Items List -->
					<div class="ag-cart__items">
						<div class="ag-cart__card">
							<div class="ag-cart__header">
								<div class="ag-cart__header-product"><?php esc_html_e( 'Product', 'woocommerce' ); ?></div>
								<div class="ag-cart__header-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></div>
								<div class="ag-cart__header-qty"><?php esc_html_e( 'Qty', 'woocommerce' ); ?></div>
								<div class="ag-cart__header-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
							</div>
							<?php
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
									?>
									<div class="woocommerce-cart-form__cart-item ag-cart__item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
										<!-- Product -->
										<div class="ag-cart__item-product">
											<div class="ag-cart__item-thumb">
												<?php
												$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
												if ( $product_permalink ) {
													printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
												} else {
													echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												}
												?>
											</div>
											<div>
												<?php
												if ( $product_permalink ) {
													printf(
														'<a href="%s" class="ag-cart__item-name">%s</a>',
														esc_url( $product_permalink ),
														esc_html( $_product->get_name() )
													);
												} else {
													echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) );
												}

												echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

												if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
													echo wp_kses_post( apply_filters(
														'woocommerce_cart_item_backorder_notification',
														'<p class="ag-cart__item-backorder">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>',
														$product_id
													) );
												}
												?>
											</div>
										</div>

										<!-- Price -->
										<div class="ag-cart__item-price">
											<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</div>

										<!-- Quantity -->
										<div class="ag-cart__item-qty">
											<?php
											if ( $_product->is_sold_individually() ) {
												$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
											} else {
												$product_quantity = woocommerce_quantity_input(
													array(
														'input_name'   => "cart[{$cart_item_key}][qty]",
														'input_value'  => $cart_item['quantity'],
														'max_value'    => $_product->get_max_purchase_quantity(),
														'min_value'    => '0',
														'product_name' => $_product->get_name(),
													),
													$_product,
													false
												);
											}
											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											?>
										</div>

										<!-- Subtotal -->
										<div class="ag-cart__item-subtotal">
											<span class="ag-cart__item-subtotal-label"><?php esc_html_e( 'Subtotal:', 'woocommerce' ); ?></span>
											<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</div>
									</div>
									<?php
								}
							}
							?>
						</div>

						<!-- Actions -->
						<div class="ag-cart__actions">
							<?php if ( wc_coupons_enabled() ) : ?>
								<div class="ag-cart__coupon">
									<input type="text" name="coupon_code" class="ag-cart__coupon-input" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
									<button type="submit" class="ag-cart__coupon-btn" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">
										<?php esc_html_e( 'Apply', 'woocommerce' ); ?>
									</button>
								</div>
							<?php endif; ?>

							<button type="submit" class="ag-cart__update-btn" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">
								<?php esc_html_e( 'Update Cart', 'woocommerce' ); ?>
							</button>

							<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
						</div>
					</div>

					<!-- Cart Totals (Sidebar) -->
					<div class="ag-cart__sidebar">
						<div class="ag-cart__sidebar-card">
							<?php do_action( 'woocommerce_cart_collaterals' ); ?>
						</div>
					</div>
				</div>
			</form>
		<?php else : ?>
			<div class="ag-cart__empty">
				<p><?php esc_html_e( 'Your cart is currently empty.', 'woocommerce' ); ?></p>
				<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="ag-cart__empty-btn">
					<?php esc_html_e( 'Browse Shop', 'woocommerce' ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
