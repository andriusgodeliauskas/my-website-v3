<?php
/**
 * The Template for displaying product archives, including the main shop page.
 *
 * Dark theme with glassmorphism design.
 *
 * @package AndriusGTheme
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<style>
	/* Shop Archive Page */
	.ag-shop {
		background: #0a0a0f;
		min-height: 100vh;
		padding: 7rem 1.5rem 6rem;
	}
	.ag-shop__inner {
		max-width: 1200px;
		margin: 0 auto;
	}
	.ag-shop__label {
		font-family: 'Fira Code', monospace;
		font-size: 0.875rem;
		color: #22c55e;
		margin-bottom: 0.75rem;
		text-align: center;
	}
	.ag-shop__title {
		font-family: 'Space Grotesk', sans-serif;
		font-size: clamp(2rem, 5vw, 3.5rem);
		font-weight: 700;
		color: #f5f5f5;
		margin-bottom: 1rem;
		text-align: center;
	}
	.ag-shop__desc {
		font-family: 'Inter', sans-serif;
		font-size: 1rem;
		color: #94a3b8;
		max-width: 600px;
		margin: 0 auto 3rem;
		text-align: center;
		line-height: 1.7;
	}
	.ag-shop__grid {
		display: grid;
		grid-template-columns: repeat(3, 1fr);
		gap: 1.5rem;
		max-width: 960px;
		margin: 0 auto;
		list-style: none;
		padding: 0;
	}
	@media (max-width: 768px) {
		.ag-shop__grid {
			grid-template-columns: 1fr;
			max-width: 360px;
		}
	}
	.ag-shop__empty {
		text-align: center;
		padding: 4rem 2rem;
		background: rgba(255,255,255,0.04);
		backdrop-filter: blur(12px);
		-webkit-backdrop-filter: blur(12px);
		border: 1px solid rgba(255,255,255,0.08);
		border-radius: 16px;
	}
	.ag-shop__empty p {
		font-family: 'Space Grotesk', sans-serif;
		font-size: 1.25rem;
		color: #94a3b8;
	}
</style>

<main class="ag-shop">
	<div class="ag-shop__inner">
		<p class="ag-shop__label">// shop</p>
		<h1 class="ag-shop__title"><?php echo esc_html( woocommerce_page_title( false ) ); ?></h1>
		<?php if ( get_the_archive_description() ) : ?>
			<div class="ag-shop__desc"><?php echo wp_kses_post( get_the_archive_description() ); ?></div>
		<?php endif; ?>

		<?php if ( woocommerce_product_loop() ) : ?>
			<ul class="ag-shop__grid products">
				<?php
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
						wc_get_template_part( 'content', 'product-coffee' );
					}
				}
				?>
			</ul>
		<?php else : ?>
			<div class="ag-shop__empty">
				<p><?php esc_html_e( 'No products found.', 'woocommerce' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
