<?php



/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ForwardCreating_v3
 */
namespace v3;
try {
	include dirname( __FILE__ ) . '/classes/ContributeView.class.php';
	include dirname( __FILE__ ) . '/classes/MailListView.class.php';
	include dirname( __FILE__ ) . '/classes/OssToolsView.class.php';
} catch (Exception $e) {}

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main post-tpl">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			?>
			<section class="container margin-top--0">
				<div class="row">
					<div class="col-md-12">
						<?php the_post_navigation(); ?>
					</div>
				</div>
			</section>

			<?php
		endwhile; // End of the loop.

		get_sidebar();

		/* oss tools */
		$ossToolsView = new OssToolsView(View::VIEW_TYPE_FULL_SLIM);
		print $ossToolsView->render();

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
