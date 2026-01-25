<?php
/**
 * Cart Page
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main class="bg-white min-h-screen pt-24 pb-24 px-6">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-5xl font-black mb-12 tracking-tighter text-slate-900">Your Cart.</h1>

        <?php if ( ! WC()->cart->is_empty() ) : ?>
            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Cart Items List -->
                    <div class="flex-grow">
                        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                            <div class="hidden md:grid grid-cols-12 gap-4 p-4 border-b border-gray-200 bg-gray-50 text-gray-500 text-sm font-medium uppercase tracking-wider">
                                <div class="col-span-6"><?php esc_html_e( 'Product', 'woocommerce' ); ?></div>
                                <div class="col-span-2 text-center"><?php esc_html_e( 'Price', 'woocommerce' ); ?></div>
                                <div class="col-span-2 text-center"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></div>
                                <div class="col-span-2 text-right"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
                            </div>
                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                    ?>
                                    <div class="woocommerce-cart-form__cart-item p-4 border-b border-gray-100 hover:bg-gray-50 transition-colors grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                                        <div class="col-span-12 md:col-span-6 flex items-center gap-4">
                                            <div class="w-20 h-20 rounded-lg flex-shrink-0 overflow-hidden bg-gray-200 border border-gray-200">
                                                <?php
                                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                echo $product_permalink ? sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ) : $thumbnail;
                                                ?>
                                            </div>
                                            <div>
                                                <?php
                                                echo $product_permalink ? sprintf( '<a href="%s" class="font-bold text-brand-dark hover:text-brand-primary transition-colors">%s</a>', esc_url( $product_permalink ), $_product->get_name() ) : wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                                echo wc_get_formatted_cart_item_data( $cart_item );
                                                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="text-yellow-600 text-xs">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="hidden md:block col-span-2 text-center text-gray-600 font-medium">
                                            <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                                        </div>
                                        <div class="col-span-12 md:col-span-2 flex justify-start md:justify-center items-center gap-2 mt-2 md:mt-0">
                                            <?php
                                            if ( $_product->is_sold_individually() ) {
                                                $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                            } else {
                                                $product_quantity = woocommerce_quantity_input( array(
                                                    'input_name' => "cart[{$cart_item_key}][qty]",
                                                    'input_value' => $cart_item['quantity'],
                                                    'max_value' => $_product->get_max_purchase_quantity(),
                                                    'min_value' => '0',
                                                    'product_name' => $_product->get_name(),
                                                    'classes' => 'bg-white text-brand-dark w-16 text-center border border-gray-300 rounded py-1 focus:border-brand-primary focus:outline-none', 
                                                ), $_product, false );
                                            }
                                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                            ?>
                                        </div>
                                        <div class="col-span-12 md:col-span-2 text-left md:text-right mt-2 md:mt-0 flex justify-between md:block items-center">
                                            <span class="text-gray-500 text-sm md:hidden">Subtotal:</span>
                                            <span class="font-bold text-brand-primary">
                                                <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="mt-6 flex flex-col md:flex-row gap-4 justify-between items-center">
                             <?php if ( wc_coupons_enabled() ) { ?>
                                <div class="flex gap-4 w-full md:w-auto">
                                    <input type="text" name="coupon_code" class="flex-grow bg-white border border-gray-300 rounded px-4 py-3 text-brand-dark focus:border-brand-primary outline-none shadow-sm" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> 
                                    <button type="submit" class="px-6 py-3 border border-gray-300 bg-white text-brand-dark font-medium rounded hover:bg-gray-50 transition-colors shadow-sm" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                                </div>
                            <?php } ?>
                            <button type="submit" class="button w-full md:w-auto bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 px-6 rounded shadow-lg" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
                            <?php wp_nonce_field( 'woocommerce-cart' ); ?>
                        </div>
                    </div>
                    <!-- Cart Totals (Sidebar) -->
                    <div class="w-full lg:w-96">
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 sticky top-4 shadow-sm">
                            <?php do_action( 'woocommerce_cart_collaterals' ); ?>
                        </div>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <div class="bg-slate-50 p-8 rounded-[3rem] border border-slate-200 text-center py-20">
                <p class="text-2xl font-bold text-slate-500">Your cart is currently empty.</p>
                <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="mt-8 px-8 py-4 bg-cyan-600 hover:bg-cyan-700 text-white font-bold rounded-xl transition-all">Go to Projects</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
