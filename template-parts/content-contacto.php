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

	<section id="contact-us" class="bg-light py-5">
		<div class="container">
			<h2 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Contáctenos', 'arkiplot' ); ?></h2>
			<div class="row">
				<div class="col-lg-8">
					<div class="form bg-white shadow p-3 mb-3">
						<?php echo do_shortcode( '[contact-form-7 id="152" title="Formulario de contacto" html_class="row"]', true ); ?>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="data bg-white shadow p-3 mb-3">
						<ul class="list-unstyled">
							<?php if(have_rows('telefonos', 'option')) : while(have_rows('telefonos', 'option')) : the_row(); ?>
								<li>
									<a href="tel:<?php the_sub_field('numero_telefonico', 'option'); ?>" class="d-block py-1 text-dark">
										<i class="fas fa-phone mr-2"></i>
										<span><?php the_sub_field('numero_telefonico', 'option'); ?></span>
									</a>
								</li>
							<?php endwhile; endif; ?>
							<?php if(have_rows('correos_electronicos', 'option')) : while(have_rows('correos_electronicos', 'option')) : the_row(); ?>
								<li>
									<a href="mailto:<?php the_sub_field('correo_electronico', 'option'); ?>" class="d-block py-1 text-dark">
										<i class="fas fa-envelope mr-2"></i>
										<span><?php the_sub_field('correo_electronico', 'option'); ?></span>
									</a>
								</li>
							<?php endwhile; endif; ?>
							<li>
								<a href="#" class="d-block py-1 text-dark">
									<i class="fas fa-map-marker mr-2"></i>
									<span><?php the_field('direccion', 'option'); ?></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="map">
		<iframe src="<?php the_field('mapa_de_ubicacion'); ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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
