<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 */

get_header(); ?>

<main class="bg-white min-h-screen pt-24 pb-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-5xl sm:text-7xl font-black text-slate-900 mb-6 tracking-tighter uppercase"><?php woocommerce_page_title(); ?>.</h1>
            <?php if ( woocommerce_product_archive_description() ) : ?>
                <div class="text-lg text-slate-600 max-w-2xl mx-auto"><?php echo woocommerce_product_archive_description(); ?></div>
            <?php endif; ?>
        </div>

        <?php if ( woocommerce_product_loop() ) : ?>
            <?php
            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();
                    wc_get_template_part( 'content', 'product-coffee' );
                }
            }

            woocommerce_product_loop_end();
            ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
