<?php
/**
 * Template Name: Project List
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

    /* --- New 2x2 Product Grid --- */
    #work ul.products {
        display: grid !important;
        grid-template-columns: repeat(1, 1fr) !important;
        gap: 2rem !important;
        margin: 0 auto !important; padding: 0 !important;
        list-style: none !important;
    }
    @media (min-width: 768px) {
        #work ul.products { grid-template-columns: repeat(2, 1fr) !important; }
    }

    /* --- Simplified Dark Product Card Style --- */
    #work ul.products li.product {
        width: 100% !important; margin: 0 !important; float: none !important;
        background: #111827 !important; /* Dark Gray */
        border: 1px solid #1f2937 !important;
        border-radius: 1.5rem !important;
        overflow: hidden !important;
        display: flex !important; flex-direction: column !important;
        transition: all 0.4s ease !important;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05) !important;
        position: relative;
        z-index: 1;
    }

    #work ul.products li.product:hover {
        transform: translateY(-5px) !important;
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04) !important;
    }

    #work ul.products li.product a img {
        width: 100% !important; height: 350px !important;
        object-fit: cover !important; margin: 0 !important; padding: 0 !important;
        border-radius: 0 !important; display: block !important;
        opacity: 0.9; transition: opacity 0.3s ease;
    }
    #work ul.products li.product:hover a img { opacity: 1; }

    #work ul.products li.product .woocommerce-loop-product__title {
        font-size: 1.25rem !important; font-weight: 700 !important; color: #f1f5f9 !important;
        padding: 1.5rem 1.5rem 0.5rem 1.5rem !important; margin: 0 !important; line-height: 1.2 !important;
    }

    #work ul.products li.product .price {
        padding: 0 1.5rem 1.5rem 1.5rem !important; margin: 0 !important; color: #a78bfa !important;
        font-weight: 600 !important; font-size: 1rem !important; display: block !important;
    }
    #work .onsale, #work .button { display: none !important; }
</style>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

        <!-- Page Header -->
        <div class="page-header-clean">
            <div class="container mx-auto px-4">
                <h1 class="page-title-clean"><?php the_title(); ?>.</h1>
                <div class="w-24 h-2 bg-purple-600 mx-auto rounded-full"></div>
            </div>
        </div>

        <!-- Projects Grid -->
        <section id="work" class="py-16 px-6 bg-white">
            <div class="max-w-7xl mx-auto">
                <?php echo do_shortcode('[products orderby="date" order="DESC"]'); ?>
            </div>
        </section>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
