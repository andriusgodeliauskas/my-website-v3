<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<!-- Navigation -->
<nav class="ag-nav" id="ag-nav">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="ag-nav__logo">AG<span class="ag-nav__logo-dot">.</span></a>

    <!-- Desktop Links -->
    <ul class="ag-nav__links">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'fallback_cb'    => false,
            'walker'         => new AG_Nav_Walker(),
        ));
        ?>
    </ul>

    <!-- Burger Button (Mobile) -->
    <button class="ag-nav__burger" id="ag-burger" aria-label="<?php echo esc_attr__('Toggle menu', 'andrius-g'); ?>">
        <span class="ag-nav__burger-line"></span>
        <span class="ag-nav__burger-line"></span>
        <span class="ag-nav__burger-line"></span>
    </button>

    <!-- Mobile Overlay -->
    <div class="ag-nav__mobile-overlay">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'fallback_cb'    => false,
            'walker'         => new AG_Mobile_Nav_Walker(),
        ));
        ?>
    </div>
</nav>

<!-- Main Content Wrapper -->
<div id="page" class="site">
    <div id="content" class="site-content">
