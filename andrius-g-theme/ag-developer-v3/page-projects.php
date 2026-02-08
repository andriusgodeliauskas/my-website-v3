<?php
/**
 * Template Name: Project List
 */

get_header(); ?>

<main class="bg-white min-h-screen pt-24 pb-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-5xl sm:text-7xl font-black text-slate-900 mb-6 tracking-tighter uppercase"><?php the_title(); ?>.</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <?php
            $all_products = new WP_Query( array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
            ) );
            if ( $all_products->have_posts() ) :
                while ( $all_products->have_posts() ) : $all_products->the_post();
            ?>
                <div class="group cursor-pointer">
                    <a href="<?php the_permalink(); ?>">
                        <div class="aspect-[4/3] bg-slate-100 rounded-[2.5rem] overflow-hidden relative border border-slate-200 flex items-center justify-center text-3xl font-black text-slate-400 uppercase tracking-widest group-hover:border-cyan-500/50 transition-all">
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail('large');
                            } else {
                                echo 'Project Img';
                            } ?>
                        </div>
                        <h3 class="mt-6 text-2xl font-black px-2 text-slate-900 group-hover:text-cyan-600 transition-colors italic uppercase"><?php the_title(); ?></h3>
                    </a>
                </div>
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
