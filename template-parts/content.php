<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ARKIPLOT
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		</div><!-- .entry-content -->
	</div>

	<footer class="entry-footer">
		<?php arkiplot_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
