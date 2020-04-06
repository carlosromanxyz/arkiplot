<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ARKIPLOT
 */

?>

<section id="home-slider">
	<?php echo do_shortcode( '[layerslider id="1"]', false ); ?>
</section>

<section id="services">
	<div class="container-fluid">
		<div class="row">
			<?php

			$servicio = 0;

			/*
			 * The WordPress Query class.
			 *
			 * @link http://codex.wordpress.org/Function_Reference/WP_Query
			 */
			$args = array(	
		
				// Type & Status Parameters
				'post_type'   => 'servicio',

				// Pagination
				'posts_per_page' => 6
			
			);
			
			$query = new WP_Query( $args ); ?>
			<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); $servicio++; ?>
				<div class="col-xl-4 p-0">
					<div class="p-4 p-xl-5 <?php if($servicio == 1 || $servicio == 4) : echo 'bg-purple'; elseif($servicio == 2 || $servicio == 5) : echo 'bg-warning'; else : echo 'bg-danger'; endif; ?> text-white">
						<h6><?php _e( 'Servicio', 'arkiplot' ); ?></h6>
						<h3 class="font-weight-bold mb-4"><?php the_title(); ?></h3>
						<a href="<?php the_permalink(); ?>" class="btn border border-white px-5 text-white"><?php _e( 'Ver servicio', 'arkiplot' ); ?></a>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</section>

<section id="process" class="bg-light py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="mb-5">
					<?php the_field('texto_del_proceso'); ?>
				</div>
			</div>
			<?php if(have_rows('procesos_de_compra')) : while(have_rows('procesos_de_compra')) : the_row(); ?>
				<div class="col-sm-6 col-xl-3">
					<div class="process text-center position-relative">
						<i class="<?php the_sub_field('icono_del_proceso') ?> mb-4 bg-white shadow rounded-circle"></i>
						<p class="text-center"><?php the_sub_field('texto_del_proceso'); ?></p>
					</div>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
</section>

<section id="invitation" class="py-5 text-white bg-danger">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<h4 class="my-4 my-lg-1 font-weight-bold"><?php the_field('texto_de_la_invitacion'); ?></h4>
			</div>
			<div class="col-lg-5 text-center">
				<a href="#request-a-quote" class="btn btn-secondary btn-block text-white px-5">
					<?php _e( 'Cotizar producto', 'arkiplot' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<section id="products" class="bg-light py-5">
	<div class="container">
		<h2 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Productos destacados', 'arkiplot' ); ?></h2>
		<div class="row">
			<?php

			// The tax query
			$tax_query[] = array(
			    'taxonomy' => 'product_visibility',
			    'field'    => 'name',
			    'terms'    => 'featured',
			    'operator' => 'IN', // or 'NOT IN' to exclude feature products
			);

			// The query
			$query = new WP_Query( array(
			    'post_type'           => 'product',
			    'post_status'         => 'publish',
			    'ignore_sticky_posts' => 1,
			    'posts_per_page'      => 9,
			    'orderby'             => $orderby,
			    'order'               => $order == 'asc' ? 'asc' : 'desc',
			    'tax_query'           => $tax_query // <===
			) ); ?>
			<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
				<div class="col-lg-4">
					<div class="product mb-5 p-3 bg-white shadow text-center">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php the_post_thumbnail_url( 'featured-product' ); ?>" class="mb-5 w-100" alt="<?php the_title(); ?>">
						</a>
						<h5 class="font-weight-bold mb-3"><?php the_title(); ?></h5>
						<?php // the_excerpt(); ?>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="py-2 px-5 see-product text-white font-weight-bold my-4 d-inline-block">
							<?php _e( 'Comprar', 'arkiplot' ); ?>
						</a>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</section>

<section id="instagram-feed-section" class="bg-light py-5">
	<div class="container">
		<h2 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Síguenos en Instagram', 'arkiplot' ); ?></h2>
		<div class="mb-5 p-3 bg-white shadow">
			<?php echo do_shortcode( '[instagram-feed]', true ); ?>
		</div>
	</div>
</section>

<section id="reviews-section" class="bg-light py-5">
	<div class="container">
		<h2 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Nuestros clientes dicen', 'arkiplot' ); ?></h2>
		<div class="row">
			<div class="col-lg-6">
				<div class="mb-5 p-3 bg-white shadow">
					<?php echo do_shortcode( '[fbrev page_name="Arkiplot Plotter" page_id="1536740179969804" page_access_token="EAAVVPjFKgSEBAH9HJnMC0Vw2WSRpSxLsE3qekiRlaIZB2JHZCsG5VGj7yM4hEDjreZCrT1yEdZA3bYgQlF4bmNMSIa8lNmxEhJmlMWoaspqM9w4KtcmQA8avwe4caZCNRcs88W2f0yvefnG24BJ53Ogg0QADz0xXLR1y2DMjQCZAnflmOTZCNyp" pagination="5" text_size="120" hide_based_on=true lazy_load_img=true show_success_api=true open_link=true nofollow_link=true api_ratings_limit="500"]' ); ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mb-5 p-3 bg-white shadow">
					<?php echo do_shortcode( '[grw place_photo="https://maps.gstatic.com/mapfiles/place_api/icons/generic_business-71.png" place_name="Arkiplot" place_id="ChIJGznLy8bOYpYR09hS9mnyDI0" reviews_lang="es" pagination="5" text_size="120" refresh_reviews=true hide_based_on=true lazy_load_img=true reduce_avatars_size=true open_link=true nofollow_link=true]' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>