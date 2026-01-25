<?php
/**
 * The Template for displaying all single products
 */

get_header(); ?>

<main class="bg-white min-h-screen pt-24 pb-24 px-6">
    <div class="max-w-7xl mx-auto">
        <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="mb-10 flex items-center gap-2 text-slate-500 hover:text-cyan-600 font-bold uppercase text-xs tracking-widest transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Back to Projects
        </a>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="aspect-square bg-slate-100 rounded-[2.5rem] flex items-center justify-center text-slate-400 font-black text-4xl border border-slate-200">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail('large');
                } else {
                    echo 'MAIN IMAGE';
                } ?>
            </div>
            <div class="space-y-8">
                <h1 class="text-4xl sm:text-6xl font-black text-slate-900 leading-tight"><?php the_title(); ?></h1>
                <div class="text-xl text-slate-600">
                    <?php the_excerpt(); ?>
                </div>
                <div class="h-px bg-slate-200"></div>
                <div class="text-lg text-slate-600 leading-relaxed">
                    <?php the_content(); ?>
                </div>

                <?php if ( has_term( 'buy-me-a-coffee', 'product_cat', get_the_ID() ) ) : ?>
                    <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-200 text-center">
                        <p class="text-lg text-slate-600 mb-4">If you like my work, you can support me!</p>
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>
                <?php else: ?>
                    <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-200 text-center">
                        <p class="text-lg text-slate-600 mb-4">If you like this project, you can support me!</p>
                        <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="glow-button-wrapper">
                            <span class="glow-button">
                                <span class="glow-button-shimmer"></span>
                                <span class="relative z-10 flex items-center gap-2">
                                    Buy me a coffee
                                </span>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
