<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ARKIPLOT
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<section id="request-a-quote" class="py-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<h2 class="font-weight-bold text-white border-bottom border-success pb-3 mb-3"><?php _e( 'Cotiza con nosotros', 'arkiplot' ); ?></h2>
						<p class="text-white"><?php _e( 'Te invitamos a cotizar con nosotros completando el siguiente formulario', 'arkiplot' ); ?></p>
					</div>
					<div class="col-lg-8">
						<?php echo do_shortcode( '[contact-form-7 id="48" title="Formulario de cotización" html_class="row"]', false ); ?>
					</div>
					<div class="col-lg-12">	
						<div class="text-center py-5">
							<!-- Display custom logo -->
							<?php // the_custom_logo(); this doesn't work for my purposes ?>
							<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
							<a class="logo d-inline-block shadow rounded-circle bg-white position-relative" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" width="80px">
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="footer-links" class="py-5 border-top border-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="widget">
							<h3 class="text-white border-bottom border-success pb-3 mb-3"><?php _e( 'Nosotros', 'arkiplot' ); ?></h3>
							<p class="text-white"><?php the_field('texto_del_pie', 'option'); ?></p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="widget">
							<h3 class="text-white border-bottom border-success pb-3 mb-3"><?php _e( 'Nuestro sitio', 'arkiplot' ); ?></h3>
							<ul class="list-unstyled">
								<?php
							    $menu 	= wp_get_nav_menu_object( 'pie' );
							    $items 	= wp_get_nav_menu_items($menu->term_id); ?>
							 
							    <ul id="menu-<?php echo $menu_name; ?>" class="list-unstyled">
								    <?php foreach($items as $item ) : ?>
								        <?php $title 	= $item->title; ?>
								        <?php $url 		= $item->url; ?>
								        <li><a href="<?php echo $url; ?>" class="btn btn-sm text-white"><?php echo $title; ?></a></li>
								    <?php endforeach; ?>
							   	</ul>
							</ul>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="widget">
							<h3 class="text-white border-bottom border-success pb-3 mb-3"><?php _e( 'Contáctanos', 'arkiplot' ); ?></h3>
							<ul class="list-unstyled">
								<?php if(have_rows('telefonos', 'option')) : while(have_rows('telefonos', 'option')) : the_row(); ?>
									<li>
										<a href="tel:<?php the_sub_field('numero_telefonico', 'option'); ?>" class="btn btn-sm text-white">
											<i class="fas fa-phone mr-2"></i>
											<span><?php the_sub_field('numero_telefonico', 'option'); ?></span>
										</a>
									</li>
								<?php endwhile; endif; ?>
								<?php if(have_rows('correos_electronicos', 'option')) : while(have_rows('correos_electronicos', 'option')) : the_row(); ?>
									<li>
										<a href="mailto:<?php the_sub_field('correo_electronico', 'option'); ?>" class="btn btn-sm text-white">
											<i class="fas fa-envelope mr-2"></i>
											<span><?php the_sub_field('correo_electronico', 'option'); ?></span>
										</a>
									</li>
								<?php endwhile; endif; ?>
								<li>
									<a href="#" class="btn btn-sm text-white">
										<i class="fas fa-map-marker mr-2"></i>
										<span><?php the_field('direccion', 'option'); ?></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="social py-5 text-center">
							<a href="<?php the_field('facebook', 'option'); ?>" class="btn btn-lg text-white">
								<i class="fab fa-facebook"></i>
							</a>
							<a href="<?php the_field('instagram', 'option'); ?>" class="btn btn-lg text-white">
								<i class="fab fa-instagram"></i>
							</a>
							<a href="https://api.whatsapp.com/send?phone=+<?php the_field('whatsapp'); ?>&text=Hola,%20les%20contacto%20desde%20el%20sitio%20web" class="btn btn-lg text-white">
								<i class="fab fa-whatsapp"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-6">
						<p class="text-center text-lg-left text-white">
							&copy;<?php echo date('Y');?> <?php bloginfo('name'); ?> - <?php _e('Algunos derechos reservados.', 'arkiplot'); ?>
						</p>
					</div>
					<div class="col-lg-6">
						<p class="text-center text-lg-right"><a href="https://carlosroman.xyz" class="text-white"><?php _e( 'Desarrollado por Carlos Román', 'arkiplot' ); ?></a></p>
					</div>
				</div>
			</div>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
