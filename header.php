<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ARKIPLOT
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site font-poppins">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'arkiplot' ); ?></a>

	<header id="masthead" class="site-header">
		<section id="header-top" class="d-none d-lg-block bg-light border-bottom border-dark">
			<div class="container">
				<div class="row">
					<div class="col-xl-5">
						<div class="header-links d-flex justify-content-around">
							<?php $count == 0; if(have_rows('telefonos', 'option')) : while(have_rows('telefonos', 'option')) : the_row(); $count++; ?>
								<?php if($count == 1 ) : ?>
									<a href="tel:<?php the_sub_field('numero_telefonico', 'option'); ?>" class="text-dark phone pl-5 position-relative">
										<span class="data d-block"><?php the_sub_field('nombre_del_telefono', 'option'); ?></span>
										<span class="font-weight-bold d-block"><?php the_sub_field('numero_telefonico', 'option'); ?></span>
									</a>
								<?php endif; ?>
							<?php endwhile; endif; ?>
							<?php $count == 0; if(have_rows('correos_electronicos', 'option')) : while(have_rows('correos_electronicos', 'option')) : the_row(); $count++; ?>
								<a href="mailto:<?php the_sub_field('correo_electronico', 'option'); ?>" class="text-dark email pl-5 position-relative">
									<span class="data d-block"><?php _e( 'Correo electrónico', 'arkiplot' ); ?></span>
									<span class="font-weight-bold d-block"><?php the_sub_field('correo_electronico', 'option'); ?></span>
								</a>
							<?php endwhile; endif; ?>
						</div>
					</div>
					<div class="col-xl-2 text-center">
						<!-- Display custom logo -->
						<?php // the_custom_logo(); this doesn't work for my purposes ?>
						<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
						<a class="logo d-inline-block text-center shadow rounded-circle bg-white position-relative" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" width="80px">
						</a>
					</div>
					<div class="col-xl-5">
						<div class="header-links d-flex justify-content-around">
							<a href="#" class="text-dark hour pl-5 position-relative">
								<span class="data d-block"><?php _e( 'Horario de Atención', 'arkiplot' ) ?></span>
								<span class="font-weight-bold d-block"><?php the_field('horario_de_atencion', 'option'); ?></span>
							</a>
							<a href="#" class="text-dark address pl-5 position-relative">
								<span class="data d-block"><?php _e( 'Dirección', 'arkiplot' ); ?></span>
								<span class="font-weight-bold d-block"><?php the_field('direccion', 'option'); ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="header-bottom" class="bg-light py-3">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<!-- Display custom logo -->
					<?php // the_custom_logo(); this doesn't work for my purposes ?>
					<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
					$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
					<a class="navbar-brand d-inline-block d-lg-none" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" width="50px">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cabecera-movil" aria-controls="cabecera-movil" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="cabecera-movil">

						<ul class="navbar-nav my-2 my-lg-0 mr-auto">
							<!-- Megamenu-->
							<li class="nav-item dropdown megamenu">
								<a id="megamneu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-uppercase btn btn-success px-5 text-white">
									<i class="fas fa-shopping-bag"></i>
									<span class="ml-2"><?php _e( 'Tienda', 'arkiplot' ); ?></span>
								</a>
								<div aria-labelledby="megamneu" class="dropdown-menu border-0 p-0 m-0">
									<div class="row bg-white rounded-0 m-0 shadow-sm">
										<div class="col-lg-12">
											<div class="py-3 p-lg-4">
												<div class="row">
													<?php $terms = get_terms(
														array(
															'taxonomy' 		=> 'product_cat',
															'parent'		=> 0,
															'hidden_empty'	=> false
														)
													); ?>
													<?php foreach($terms as $term) : ?>
														<div class="col-lg-4 mb-4">
															<h6 class="font-weight-bold text-uppercase">
																<a href="<?php echo get_term_link( $term, 'product_cat' ); ?>"><?php echo $term->name; ?></a>
															</h6>
															<?php $subterms = get_terms(
																array(
																	'taxonomy'		=> 'product_cat',
																	'child_of' 		=> $term->term_id,
																	'hide_empty' 	=> false
																)
															); ?>
															<ul class="list-unstyled">
																<?php foreach($subterms as $subterm) : ?>
																	<li class="nav-item"><a href="<?php echo get_term_link( $subterm, 'product_cat' ); ?>" class="text-small pb-0"><?php echo $subterm->name; ?></a></li>
																<?php endforeach; ?>
															</ul>
														</div>
													<?php endforeach; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>

						<?php

						// Menu cabecera
						wp_nav_menu( array(
						    'theme_location'  => 'cabecera',
						    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
						    'container'       => '',
						    'container_class' => '',
						    'container_id'    => '',
						    'menu_class'      => 'navbar-nav mr-auto font-weight-bold text-primary mb-3 mb-lg-0',
						    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						    'walker'          => new WP_Bootstrap_Navwalker(),
						) ); ?>
						
						<?php arkiplot_woocommerce_header_cart(); ?>

						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" id="my-account-link" class="btn btn-secondary d-block d-lg-inline-block px-5 ml-0 ml-lg-2 mb-3 mb-lg-0 text-white">
							<i class="fas fa-user"></i>
							<?php if(is_user_logged_in()) : ?>
								<span class="ml-2 d-none d-xl-inline-block"><?php _e( 'Mi cuenta', 'arkiplot' ); ?></span>
							<?php else : ?>
								<span class="ml-2 d-none d-xl-inline-block"><?php _e( 'Iniciar sesión', 'arkiplot' ); ?></span>
							<?php endif; ?>
						</a>
					</div>
				</nav>
			</div>
		</section>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
