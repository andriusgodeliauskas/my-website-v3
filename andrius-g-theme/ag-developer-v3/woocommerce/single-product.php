<?php
/**
 * The Template for displaying all single products.
 *
 * Dark theme with glassmorphism design.
 *
 * @package AndriusGTheme
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<style>
	/* Single Product Page */
	.ag-product {
		background: #0a0a0f;
		min-height: 100vh;
		padding: 7rem 1.5rem 6rem;
	}
	.ag-product__inner {
		max-width: 1100px;
		margin: 0 auto;
	}
	.ag-product__back {
		display: inline-flex;
		align-items: center;
		gap: 0.5rem;
		font-family: 'Fira Code', monospace;
		font-size: 0.8rem;
		color: #94a3b8;
		text-decoration: none;
		margin-bottom: 2.5rem;
		transition: color 0.3s ease;
		letter-spacing: 0.05em;
	}
	.ag-product__back:hover {
		color: #00f0ff;
	}
	.ag-product__back svg {
		width: 16px;
		height: 16px;
	}
	.ag-product__layout {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 3rem;
		align-items: start;
	}
	@media (max-width: 768px) {
		.ag-product__layout {
			grid-template-columns: 1fr;
			gap: 2rem;
		}
	}
	.ag-product__image-wrap {
		background: rgba(255,255,255,0.04);
		backdrop-filter: blur(12px);
		-webkit-backdrop-filter: blur(12px);
		border: 1px solid rgba(255,255,255,0.08);
		border-radius: 16px;
		overflow: hidden;
		display: flex;
		align-items: center;
		justify-content: center;
		aspect-ratio: 1;
	}
	.ag-product__image-wrap img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		border-radius: 16px;
	}
	.ag-product__image-placeholder {
		font-family: 'Space Grotesk', sans-serif;
		font-size: 2rem;
		font-weight: 700;
		color: #94a3b8;
	}
	.ag-product__info {
		display: flex;
		flex-direction: column;
		gap: 1.5rem;
	}
	.ag-product__title {
		font-family: 'Space Grotesk', sans-serif;
		font-size: clamp(1.75rem, 4vw, 2.75rem);
		font-weight: 700;
		color: #f5f5f5;
		line-height: 1.15;
	}
	.ag-product__excerpt {
		font-family: 'Inter', sans-serif;
		font-size: 1rem;
		color: #94a3b8;
		line-height: 1.7;
	}
	.ag-product__divider {
		height: 1px;
		background: rgba(255,255,255,0.08);
	}
	.ag-product__content {
		font-family: 'Inter', sans-serif;
		font-size: 0.95rem;
		color: #94a3b8;
		line-height: 1.8;
	}
	.ag-product__cta {
		background: rgba(255,255,255,0.04);
		backdrop-filter: blur(12px);
		-webkit-backdrop-filter: blur(12px);
		border: 1px solid rgba(255,255,255,0.08);
		border-radius: 16px;
		padding: 2rem;
		text-align: center;
	}
	.ag-product__cta p {
		font-family: 'Inter', sans-serif;
		font-size: 1rem;
		color: #94a3b8;
		margin-bottom: 1.25rem;
	}
	/* Add to cart button override for single product */
	.ag-product__cta .single_add_to_cart_button,
	.ag-product__cta .ag-glow-btn--amber {
		display: inline-flex;
		align-items: center;
		gap: 0.5rem;
		padding: 0.875rem 2rem;
		background: #f59e0b;
		color: #0a0a0f;
		font-family: 'Space Grotesk', sans-serif;
		font-weight: 600;
		font-size: 0.9rem;
		border: none;
		border-radius: 999px;
		cursor: pointer;
		text-decoration: none;
		transition: transform 0.3s ease, box-shadow 0.3s ease;
		letter-spacing: 0.02em;
	}
	.ag-product__cta .single_add_to_cart_button:hover,
	.ag-product__cta .ag-glow-btn--amber:hover {
		transform: scale(1.03);
		box-shadow: 0 0 24px rgba(245, 158, 11, 0.35);
	}
	/* Quantity input in add-to-cart form */
	.ag-product__cta .quantity input[type="number"] {
		background: rgba(255,255,255,0.06);
		border: 1px solid rgba(255,255,255,0.12);
		border-radius: 8px;
		color: #f5f5f5;
		font-family: 'Inter', sans-serif;
		padding: 0.5rem 0.75rem;
		width: 4rem;
		text-align: center;
		margin-right: 0.75rem;
	}
</style>

<main class="ag-product">
	<div class="ag-product__inner">
		<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="ag-product__back">
			<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
			<?php esc_html_e( 'Back to Shop', 'woocommerce' ); ?>
		</a>

		<div class="ag-product__layout">
			<div class="ag-product__image-wrap">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large' ); ?>
				<?php else : ?>
					<span class="ag-product__image-placeholder"><?php esc_html_e( 'No Image', 'woocommerce' ); ?></span>
				<?php endif; ?>
			</div>

			<div class="ag-product__info">
				<h1 class="ag-product__title"><?php the_title(); ?></h1>

				<?php if ( has_excerpt() ) : ?>
					<div class="ag-product__excerpt"><?php the_excerpt(); ?></div>
				<?php endif; ?>

				<div class="ag-product__divider"></div>

				<?php if ( get_the_content() ) : ?>
					<div class="ag-product__content"><?php the_content(); ?></div>
				<?php endif; ?>

				<?php if ( has_term( 'buy-me-a-coffee', 'product_cat', get_the_ID() ) ) : ?>
					<div class="ag-product__cta">
						<p><?php esc_html_e( 'If you like my work, you can support me!', 'woocommerce' ); ?></p>
						<?php woocommerce_template_single_add_to_cart(); ?>
					</div>
				<?php else : ?>
					<div class="ag-product__cta">
						<p><?php esc_html_e( 'If you like this project, you can support me!', 'woocommerce' ); ?></p>
						<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="ag-glow-btn--amber">
							<?php esc_html_e( 'Buy me a coffee', 'woocommerce' ); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
