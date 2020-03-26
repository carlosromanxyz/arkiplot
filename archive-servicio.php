<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ARKIPLOT
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php woocommerce_breadcrumb(); ?>
			
			<section id="products" class="bg-light py-5">
				<div class="container">
					<h2 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Servicios de Arkiplot', 'arkiplot' ); ?></h2>
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
									<h5><?php the_title(); ?></h5>
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
