<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ARKIPLOT
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<div class="container">
					<header class="page-header py-5">
						<h1 class="text-center error-title font-weight-bold"><?php _e( 'Error 404', 'arkiplot' ); ?></h1>
						<h1 class="page-title text-center font-weight-bold"><?php esc_html_e( 'Lo sentimos, no se encuentra lo que buscas.', 'arkiplot' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content pb-5 mb-5">
						<p class="text-center"><?php esc_html_e( 'No pudimos localizar el contenido que solicitaste, por favor inténta otro enlace.', 'arkiplot' ); ?></p>
						<?php // get_search_form(); ?>
					</div><!-- .page-content -->
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
