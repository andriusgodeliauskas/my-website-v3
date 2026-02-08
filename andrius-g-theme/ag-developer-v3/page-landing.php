<?php
/**
 * Template Name: Landing Page (Full Width Dark v4 - Huly)
 */

get_header(); 
?>

<style>
    /* Base Reset */
    body { background-color: #000 !important; }

    /* ===== HULY.IO STYLE VERTICAL BEAM EFFECT ===== */
    .hero-beam-container {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        pointer-events: none;
        z-index: 1;
    }

    /* Main bright vertical beam - the sharp white/cyan line */
    .beam-core {
        position: absolute;
        top: -10%;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 120%;
        background: linear-gradient(
            to bottom,
            rgba(255,255,255,1) 0%,
            rgba(123,97,255,1) 30%,
            rgba(0,212,255,0.8) 60%,
            rgba(123,97,255,0.3) 85%,
            transparent 100%
        );
        box-shadow:
            0 0 20px 5px rgba(123,97,255,1),
            0 0 60px 20px rgba(123,97,255,0.8),
            0 0 100px 40px rgba(0,212,255,0.5),
            0 0 200px 80px rgba(123,97,255,0.3);
        animation: beamPulse 4s ease-in-out infinite;
    }

    /* Wider glow behind the beam */
    .beam-glow {
        position: absolute;
        top: -20%;
        left: 50%;
        transform: translateX(-50%);
        width: 600px;
        height: 140%;
        background: radial-gradient(
            ellipse 50% 80% at 50% 20%,
            rgba(123,97,255,0.4) 0%,
            rgba(0,212,255,0.2) 30%,
            rgba(123,97,255,0.1) 50%,
            transparent 70%
        );
        filter: blur(40px);
        animation: glowPulse 4s ease-in-out infinite;
    }

    /* Secondary ambient glow for depth */
    .beam-ambient {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 1200px;
        height: 100%;
        background: radial-gradient(
            ellipse 40% 60% at 50% 10%,
            rgba(123,97,255,0.15) 0%,
            rgba(79,70,229,0.08) 40%,
            transparent 70%
        );
        filter: blur(80px);
    }

    /* Flowing particles/sparkles effect */
    .beam-particles {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        height: 100%;
    }

    .beam-particles::before,
    .beam-particles::after {
        content: '';
        position: absolute;
        left: 50%;
        width: 8px;
        height: 80px;
        background: linear-gradient(to bottom, rgba(255,255,255,0.9), transparent);
        border-radius: 50%;
        filter: blur(2px);
        animation: particleFlow 3s linear infinite;
    }

    .beam-particles::after {
        animation-delay: -1.5s;
        width: 6px;
        height: 60px;
        left: calc(50% + 15px);
    }

    /* Horizontal flare at the top */
    .beam-flare {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100vw;
        height: 300px;
        background: radial-gradient(
            ellipse 80% 100% at 50% 0%,
            rgba(255,255,255,0.3) 0%,
            rgba(123,97,255,0.2) 20%,
            rgba(0,212,255,0.1) 40%,
            transparent 60%
        );
        filter: blur(30px);
    }

    @keyframes beamPulse {
        0%, 100% { opacity: 0.9; }
        50% { opacity: 1; }
    }

    @keyframes glowPulse {
        0%, 100% { opacity: 0.8; transform: translateX(-50%) scaleX(1); }
        50% { opacity: 1; transform: translateX(-50%) scaleX(1.1); }
    }

    @keyframes particleFlow {
        0% {
            transform: translateX(-50%) translateY(-100px);
            opacity: 0;
        }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% {
            transform: translateX(-50%) translateY(100vh);
            opacity: 0;
        }
    }

    /* --- New Masonry Product Grid --- */
    #work ul.products {
        display: grid !important;
        grid-template-columns: repeat(1, 1fr) !important;
        gap: 2rem !important; /* Standard gap */
        margin: 0 auto !important;
        padding: 0 !important;
        list-style: none !important;
    }

    @media (min-width: 768px) {
        #work ul.products {
            grid-template-columns: repeat(2, 1fr) !important;
        }
        #work ul.products li.product:nth-child(1) {
            grid-column: 1 / -1; /* Span full width */
        }
        /* 2nd and 3rd fall into place */
        #work ul.products li.product:nth-child(4) {
            grid-column: 1 / -1; /* Span full width */
        }
    }

    /* --- Simplified Dark Product Card Style --- */
    #work ul.products li.product {
        width: 100% !important; margin: 0 !important; float: none !important;
        background: #111827 !important; /* Dark Gray */
        border: 1px solid #1f2937 !important;
        border-radius: 1.5rem !important; /* Slightly smaller radius */
        overflow: hidden !important;
        display: flex !important; flex-direction: column !important;
        transition: all 0.4s ease !important;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05) !important;
        position: relative;
        z-index: 1;
    }

    /* Remove the border beam pseudo-element */
    #work ul.products li.product::before {
        display: none;
    }

    #work ul.products li.product:hover {
        transform: translateY(-5px) !important;
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04) !important;
    }

    #work ul.products li.product a img {
        width: 100% !important; height: 350px !important; /* Adjusted height */
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

<!-- HERO SECTION -->
<main class="relative min-h-screen flex items-center px-6 lg:px-24 overflow-hidden" style="background-color: #000;">
    <!-- Huly.io Style Vertical Beam Effect -->
    <div class="hero-beam-container">
        <div class="beam-ambient"></div>
        <div class="beam-glow"></div>
        <div class="beam-flare"></div>
        <div class="beam-core"></div>
        <div class="beam-particles"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 w-full max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <!-- Left Side: Text Content -->
        <div class="space-y-6 text-left">
            <div class="space-y-4">
                <h2 class="text-sm tracking-[0.4em] text-purple-400 uppercase font-black">Good ideas for everyone</h2>
                <h1 class="text-8xl lg:text-9xl font-black tracking-tighter text-white leading-none">ANDRIUS G</h1>
            </div>
            <div class="w-32 h-1.5 bg-purple-500 rounded-full shadow-lg"></div>
            <div class="space-y-4 text-slate-300 pt-4">
                <p class="text-2xl italic">"Hi, I'm Andrius."</p>
                <p class="text-lg font-medium max-w-md">Tech enthusiast creating IT solutions for children's education and development.</p>
            </div>
            <div class="pt-8">
                <a href="#work" class="inline-block px-12 py-5 bg-purple-600 text-white font-black rounded-2xl hover:bg-purple-700 hover:scale-105 transition-all shadow-2xl uppercase tracking-widest text-xs">View My Work</a>
            </div>
        </div>
        <!-- Right side is implicitly empty, allowing the beam to be a visual element -->
    </div>
</main>


<!-- PROJECTS SECTION -->
<section id="work" class="py-32 px-6 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-24">
            <h2 class="text-5xl font-black text-gray-900 mb-6 tracking-tight uppercase italic">Selected Projects</h2>
            <div class="w-20 h-1.5 bg-purple-500 mx-auto rounded-full"></div>
        </div>
        
        <?php echo do_shortcode('[products limit="4" columns="2" orderby="date" order="DESC"]'); ?>
        
        <div class="text-center mt-20">
            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="px-12 py-5 border-2 border-gray-400 text-gray-400 font-bold rounded-full hover:bg-white hover:text-gray-900 transition-all uppercase tracking-widest text-xs">View All Projects</a>
        </div>
    </div>
</section>

<!-- (Expertise & Contact sections can be added back here if needed, keeping it focused on the fix first) -->

<?php get_footer(); ?>