<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: {
                            dark: '#0f172a',
                            primary: '#2563eb',
                            primaryHover: '#1d4ed8',
                        }
                    },
                    screens: {
                        'xs': '375px',
                    }
                }
            }
        }
        var isFrontPage = <?php echo is_front_page() ? 'true' : 'false'; ?>;
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-slate-950 text-white font-sans antialiased' ); ?> x-data="{ mobileMenuOpen: false, scrolled: false, isFront: isFrontPage }" @scroll.window="scrolled = (window.pageYOffset > 20)" :class="{ 'overflow-hidden-mobile': mobileMenuOpen }" x-cloak>

<?php wp_body_open(); ?>

<nav class="fixed left-0 w-full z-50 px-4 sm:px-12 transition-all duration-500 flex justify-between items-center h-20 sm:h-auto top-0" :class="{ 'py-4 bg-slate-900/95 backdrop-blur-xl shadow-lg border-b border-white/10': scrolled || !isFront, 'sm:top-8 py-8 bg-transparent': !scrolled && isFront }">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-2xl sm:text-3xl font-black tracking-tighter cursor-pointer z-50 select-none transition-colors text-white">
        AG<span class="text-cyan-400">.</span>
    </a>


    <!-- Desktop Menu -->
    <nav class="hidden md:block">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'menu flex items-center gap-12 text-xs font-bold tracking-[0.3em] uppercase',
            'fallback_cb'    => 'wp_page_menu',
        ) );
        ?>
    </nav>
    
    <!-- Mobile Menu Toggle Button -->
    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 -mr-2 text-white focus:outline-none z-50">
        <div class="p-2 bg-white/10 rounded-lg backdrop-blur-sm">
            <!-- Hamburger Icon -->
            <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Close Icon -->
            <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </button>
</nav>

<!-- MOBILE MENU OVERLAY (Full Screen) -->
<div x-show="mobileMenuOpen"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-full"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-full"
     class="fixed inset-0 z-[40] bg-slate-950 flex flex-col pt-32 pb-10 px-6 md:hidden overflow-y-auto">

    <div class="flex flex-col gap-8">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'flex flex-col gap-8',
        'items_wrap'     => '%3$s',
        'fallback_cb'    => false,
        'walker'         => new Tailwind_Mobile_Nav_Walker(),
    ) );
    ?>
    </div>
</div>


<!-- Main Content Wrapper -->
<div id="page" class="site">
    <div id="content" class="site-content">