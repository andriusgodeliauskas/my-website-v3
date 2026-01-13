<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 99fy
 */

$page_title_status = function_exists( 'nnfy_get_option' ) ? nnfy_get_option( 'nnfy_page_title_status', get_the_ID(), false ) : 1;
$breadcrumb_status = function_exists( 'nnfy_get_option' ) ? nnfy_get_option( 'nnfy_breadcrumb_status', get_the_ID(), false ) : 1;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<meta name="verify-paysera" content="96b1d7ec0353c93adeb2f27848a6b726">
<script type="text/javascript" charset="utf-8">
						var wtpQualitySign_projectId  = 178733;
						var wtpQualitySign_language   = "en";
						</script><script src="https://bank.paysera.com/new/js/project/wtpQualitySigns.js" type="text/javascript" charset="utf-8"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
					
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site site-wrapper">
		<div id="nnfy">
			<?php
			// If it's the front page, we want a transparent overlaid header
			if ( is_front_page() ) {
				$hero_bg_dark = get_template_directory_uri() . '/images/hero-bg-dark.png';
				?>
				<style>
					/* Force override theme styles for transparent header on Home Page */
					.header-default, .header-area {
						background: transparent !important;
						background-color: transparent !important;
						border: none !important;
						box-shadow: none !important;
						position: absolute; /* Ensure it sits on top if not already */
						width: 100%;
						z-index: 999;
					}
					.site-title a,
					.site-title h3 {
						font-size: 24px !important;
						font-weight: normal !important;
					}
					.site-title a,
					.site-title h3,
					.site-description,
					.primary-nav-wrap ul li a {
						color: #ffffff !important;
						text-shadow: 0 2px 4px rgba(0,0,0,0.6); /* Stronger shadow for readability */
					}
					/* Fix Sub-menu (Dropdown) text color - should be dark */
					.primary-nav-wrap ul li ul.sub-menu li a,
					.primary-nav-wrap ul li ul.dropdown-menu li a {
						color: #333333 !important;
						text-shadow: none !important;
					}
					.primary-nav-wrap ul li ul.sub-menu li a:hover,
					.primary-nav-wrap ul li ul.dropdown-menu li a:hover {
						color: #96bf48 !important;
						background-color: #f9f9f9 !important;
					}
					.primary-nav-wrap ul li a:hover {
						color: #96bf48 !important;
					}
					.hero-btn-custom:hover {
						background-color: #ffffff !important;
						color: #000000 !important;
					}
				</style>
				<div class="position-relative w-100 overflow-hidden bg-dark" style="min-height: 500px;">
					
					<!-- Background Image (Dictates the section height) -->
					<img src="<?php echo esc_url($hero_bg_dark); ?>" class="w-100 d-block" style="height: auto; filter: brightness(0.6);" alt="Hero Background">

					<!-- Transparent Header Overlay -->
					<div class="position-absolute top-0 start-0 w-100" style="z-index: 10;">
						<?php 
						get_template_part('inc/header/header-top-bar');
						get_template_part('inc/header/default');
						?>
					</div>

					<!-- Hero Content (Centered Overlay) -->
					<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center text-white" style="z-index: 1;">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-8">
									<h1 class="display-1 fw-bold mb-4 text-white">Hi, I'm Andrius.</h1>
									<p class="lead mb-5 mx-auto text-white" style="max-width: 600px; opacity: 0.9;">Tech enthusiast creating IT solutions for children's education and development.</p>
									<a href="https://godeliauskas.com/product-category/web-desing/" class="btn btn-outline-light rounded-0 px-4 py-2 text-uppercase text-white hero-btn-custom" style="letter-spacing: 1px;">VIEW MY WORK</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			} else {
				// Standard Header for other pages
				get_template_part('inc/header/header-top-bar');
				get_template_part('inc/header/default');
			}

			// Breadcrumb logic for non-front pages
			if( !is_front_page() && ( $page_title_status || $breadcrumb_status ) ){
				include get_template_directory().'/inc/breadcrumb/pagetitle.php';
			}
			?>

		<div id="content" class="site-content">