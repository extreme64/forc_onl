<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */
 namespace v3;
 try {
 	include dirname( __FILE__ ) . '/classes/ContributeView.class.php';
 	include dirname( __FILE__ ) . '/classes/MailListView.class.php';
 } catch (Exception $e) {}

get_header();
?>

	<div id="primary" class="content-area blog">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'archive' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;


		get_sidebar();
		?>

		<div class="bg-color-1">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<?php
						/* Mailing List in a col */
						$mailListView = new MailListView(View::VIEW_TYPE_COL);
						print $mailListView->render();
						?>
					</div>
					<div class="col-md-6">
						<?php
						/* Can I Contibute in a col */
						$contributeView = new ContributeView(View::VIEW_TYPE_COL);
						print $contributeView->render();
						?>
					</div>
				</div>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
