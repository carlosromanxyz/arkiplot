<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ARKIPLOT
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php woocommerce_breadcrumb(); ?>
	<header class="entry-header py-5 position-relative" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
		<?php the_title( '<h1 class="entry-title text-center text-white font-weight-bold my-5 py-5 position-relative">', '</h1>' ); ?>
		<div class="overlay position-absolute w-100 h-100"></div>
	</header><!-- .entry-header -->

	<div class="container">
		<div class="entry-content py-5">
			<?php the_content(); ?>

			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'arkiplot' ),
				'after'  => '</div>',
			) ); ?>
		</div><!-- .entry-content -->
	</div>

	<section id="products" class="bg-light py-5">
		<div class="container">
			<h2 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Nuestros servicios', 'arkiplot' ); ?></h2>
			<div class="row">
				<?php

				/*
				 * The WordPress Query class.
				 *
				 * @link http://codex.wordpress.org/Function_Reference/WP_Query
				 */
				$args = array(	
			
					// Type & Status Parameters
					'post_type'   => 'servicio',
				
				);
				
				$query = new WP_Query( $args ); ?>
				<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
					<div class="col-lg-4">
						<div class="service mb-5 bg-white shadow p-3">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php the_post_thumbnail_url( 'featured-product' ); ?>" class="mb-3 w-100" alt="<?php the_title(); ?>">
							</a>
							<h5 class="mb-4"><?php the_title(); ?></h5>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="py-2 px-5 my-3 d-inline-block see-product text-white font-weight-bold">
								<?php _e( 'Ver servicio', 'arkiplot' ); ?>
							</a>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'arkiplot' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
