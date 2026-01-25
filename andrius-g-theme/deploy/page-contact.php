<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

<main class="bg-white min-h-screen pt-24 pb-24 px-6 flex items-center justify-center text-center">
    <div class="max-w-4xl space-y-12">
        <h1 class="text-5xl sm:text-9xl font-black tracking-tighter italic text-slate-900"><?php the_title(); ?>.</h1>
        <div class="flex flex-col gap-8">
            <a href="mailto:andrius.godeliauskas@gmail.com" class="text-2xl sm:text-5xl font-black text-cyan-600 hover:text-cyan-500 break-all transition-colors">andrius.godeliauskas@gmail.com</a>
            <a href="tel:+37060127050" class="text-4xl sm:text-7xl font-black text-slate-900 hover:text-cyan-600 transition-colors">+370 601 27050</a>
        </div>
    </div>
</main>

<?php get_footer(); ?>