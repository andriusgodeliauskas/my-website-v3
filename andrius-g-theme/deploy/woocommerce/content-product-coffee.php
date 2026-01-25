<?php
/**
 * The template for displaying product content for the 'buy me a coffee' list.
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'bg-slate-50 p-6 rounded-[2rem] border border-slate-200 flex flex-col md:flex-row items-center gap-6', $product ); ?>>
    <div class="w-24 h-24 rounded-2xl overflow-hidden flex-shrink-0">
        <?php echo $product->get_image('thumbnail'); ?>
    </div>
    <div class="flex-grow text-center md:text-left">
        <h2 class="text-2xl font-bold text-slate-900"><?php echo $product->get_name(); ?></h2>
        <div class="text-slate-600">
            <?php echo $product->get_short_description(); ?>
        </div>
    </div>
    <div class="flex-shrink-0 text-center md:text-right">
        <div class="text-3xl font-black text-cyan-600 mb-4"><?php echo $product->get_price_html(); ?></div>
        <?php woocommerce_template_loop_add_to_cart(); ?>
    </div>
</li>
