<?php
/**
 * The template for displaying all pages (Clean & Modern)
 */

get_header(); ?>

<style>
    body { background-color: #ffffff; color: #0f172a; }
    
    .page-header-clean {
        padding: 10rem 0 6rem;
        text-align: center;
        background: #ffffff;
    }
    .page-title-clean {
        font-size: 5rem;
        font-weight: 900;
        letter-spacing: -0.02em;
        color: #0f172a;
        margin-bottom: 1.5rem;
        line-height: 1;
    }
    .page-content-clean {
        padding: 4rem 0 8rem;
        max-width: 64rem;
        margin: 0 auto;
        font-size: 1.25rem;
        line-height: 1.8;
        color: #475569;
        font-weight: 300;
    }
    
    /* Content Typography */
    .page-content-clean h2 { font-size: 2.5rem; font-weight: 800; margin-top: 4rem; margin-bottom: 1.5rem; color: #0f172a; letter-spacing: -0.02em; }
    .page-content-clean h3 { font-size: 1.75rem; font-weight: 700; margin-top: 3rem; margin-bottom: 1rem; color: #0f172a; }
    .page-content-clean p { margin-bottom: 2rem; }
    .page-content-clean ul { list-style: disc; padding-left: 1.5rem; margin-bottom: 2rem; }
    .page-content-clean a { color: #2563eb; text-decoration: underline; font-weight: 600; }
    .page-content-clean img { border-radius: 2rem; margin: 3rem 0; width: 100%; height: auto; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); }

    @media (max-width: 768px) {
        .page-title-clean { font-size: 3.5rem; }
        .page-header-clean { padding: 8rem 0 3rem; }
    }
</style>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

        <!-- Page Header -->
        <div class="page-header-clean">
            <div class="container mx-auto px-4">
                <h1 class="page-title-clean"><?php the_title(); ?>.</h1>
                <div class="w-24 h-2 bg-blue-600 mx-auto rounded-full"></div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="container mx-auto px-6">
            <div class="page-content-clean">
                <?php the_content(); ?>
            </div>
        </div>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>