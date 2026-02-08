<?php
/**
 * Template Name: About Me
 */

get_header(); ?>

<main class="bg-white min-h-screen pt-24 pb-24 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="aspect-[4/5] rounded-[3rem] overflow-hidden shadow-xl bg-slate-100 border border-slate-200">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
            <?php else: ?>
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover">
            <?php endif; ?>
        </div>
        <div class="space-y-8">
            <h1 class="text-5xl sm:text-7xl font-black tracking-tighter italic uppercase text-slate-900"><?php the_title(); ?>.</h1>
            <div class="space-y-6 text-xl text-slate-600 font-light">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>