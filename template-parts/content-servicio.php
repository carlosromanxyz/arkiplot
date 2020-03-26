<?php
/**
 * Template part for displaying services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ARKIPLOT
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php woocommerce_breadcrumb(); ?>
	<header class="entry-header py-5 position-relative" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title text-center text-white font-weight-bold my-5 py-5 position-relative">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title text-center text-white font-weight-bold my-5 py-5 position-relative"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
		<div class="overlay position-absolute w-100 h-100"></div>
	</header><!-- .entry-header -->

	<div class="container">
		<div class="entry-content py-5">
			<?php the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'arkiplot' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'arkiplot' ),
				'after'  => '</div>',
			) ); ?>

			<?php $images = get_field('galeria_de_imagenes'); ?>
			<?php if($images) : ?>
				<div id="gallery" class="py-5">
					<h3 class="font-weight-bold mb-2"><?php _e( 'Galería de imágenes', 'arkiplot' ); ?></h3>
					<p class="font-italic"><?php _e( 'Haz click en cualquier imagen para ampliar', 'arkiplot' ); ?></p>
					<div id="gallery-links">
						<?php foreach($images as $image) : ?>
							<a href="<?php echo $image['sizes']['large']; ?>" title="<?php the_title(); ?>" class="mb-1 d-inline-block">
								<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php the_title(); ?>" />
							</a>
						<?php endforeach; ?>
					</div>

					<!-- The Gallery as lightbox dialog, should be a document body child element -->
					<div id="blueimp-gallery" class="blueimp-gallery">
						<div class="slides"></div>
						<h3 class="title"></h3>
						<a class="prev">‹</a>
						<a class="next">›</a>
						<a class="close">×</a>
						<a class="play-pause"></a>
						<ol class="indicator"></ol>
					</div>
				</div>
			<?php endif; ?>
		</div><!-- .entry-content -->
	</div>

	<section id="products" class="bg-light py-5">
		<div class="container">
			<h2 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Otros servicios', 'arkiplot' ); ?></h2>
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

					// Exclude current ID
					'post__not_in' => array(get_the_ID())
				
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

	<footer class="entry-footer">
		<?php arkiplot_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
