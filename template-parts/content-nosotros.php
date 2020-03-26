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

	<section id="team" class="bg-light py-5">
		<div class="container">
			<h2 class="font-weight-bold border-bottom border-success pb-3 mb-4"><?php _e( 'Nuestro equipo', 'arkiplot' ); ?></h2>
			<div class="row">
				<?php if(have_rows('integrantes')) : while(have_rows('integrantes')) : the_row(); ?>
					<div class="col-lg-4">
						<div class="profile mb-5 text-center shadow p-4 bg-white">
							<?php $image = get_sub_field('imagen_del_integrante'); ?>
							<?php if($image) : ?>
								<img src="<?php echo $image['sizes']['medium']; ?>" class="rounded-circle mb-5" alt="<?php the_sub_field('nombre_del_integrante'); ?>">
							<?php else : ?>
								<img src="https://placehold.it/300x300" class="rounded-circle mb-5">
							<?php endif; ?>
							<h4 class="font-weight-bold profile-title"><?php the_sub_field('nombre_del_integrante'); ?></h4>
							<p class="font-italic"><?php the_sub_field('cargo_del_integrante'); ?></p>
						</div>
					</div>
				<?php endwhile; endif; ?>
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
