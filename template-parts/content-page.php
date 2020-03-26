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

	<?php if(is_page( 'instrucciones' )) : ?>
		<section id="instructions" class="bg-light py-5">
			<div class="container">
				<h2 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Instrucciones', 'arkiplot' ); ?></h2>
				<div class="p-2 p-lg-5 bg-white shadow">
					<div class="row">
						<div class="col-3 d-none d-lg-inline-block">
							<div class="nav flex-column nav-pills" id="instructions-tab" role="tablist" aria-orientation="vertical">
								<h6 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Secciones', 'arkiplot' ); ?></h5>
								<?php $tabcount = 0; ?>
								<?php 
								$args = array(
									'taxonomy' 		=> 'seccion',
									'hide_empty'	=> false
								);
								$tabs = get_terms( $args ); ?>
								<?php foreach($tabs as $tab) : ?>
									<?php $tabcount++; ?>
									<a class="nav-link <?php echo ($tabcount == 1) ? 'active' : ''; ?>" id="v-pills-<?php echo $tab->slug; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $tab->slug; ?>" role="tab" aria-controls="v-pills-<?php echo $tab->slug; ?>" aria-selected="<?php echo ($tabcount == 1) ? 'true' : 'false'; ?>">
										<?php echo $tab->name; ?>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-9 d-none d-lg-inline-block">
							<h6 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Instrucciones disponibles', 'arkiplot' ); ?></h5>
							<div class="tab-content" id="v-pills-tabContent">
								<?php $tabcountcontent = 0; ?>
								<?php foreach($tabs as $tab) : ?>
									<?php $tabcountcontent++; ?>
									<div class="tab-pane fade <?php echo ($tabcountcontent == 1) ? 'show active' : ''; ?>" id="v-pills-<?php echo $tab->slug; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $tab->slug; ?>-tab">
										<?php

										/*
										 * The WordPress Query class.
										 *
										 * @link http://codex.wordpress.org/Function_Reference/WP_Query
										 */
										$args = array(

											// Type & Status Parameters
											'post_type'   => 'instruccion',
									
											// Pagination Parameters
											'posts_per_page'         => -1,
									
											// Taxonomy Parameters
											'tax_query' => array(
												'relation' => 'AND',
												array(
													'taxonomy'         => 'seccion',
													'field'            => 'slug',
													'terms'            => array($tab->slug),
													'include_children' => false,
													'operator'         => 'IN',
												),
											)
										);
										
										$query = new WP_Query( $args ); ?>
										<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
											<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
										<?php endwhile; endif; wp_reset_postdata(); ?>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-12 d-block d-lg-none">
							<p class="alert alert-warning">
								<?php _e( 'Debes iniciar sesión desde un computador para ver estas instrucciones', 'arkiplot' ); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

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
