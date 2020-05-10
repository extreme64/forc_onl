<?php
/**
* Template Name: Home_v1
*
* @package ForwardCreating_v3
*/
namespace v3;
try {
	include dirname( __FILE__ ) . '/classes/IntroView.class.php';
	include dirname( __FILE__ ) . '/classes/ContributeView.class.php';
	include dirname( __FILE__ ) . '/classes/MailListView.class.php';
	include dirname( __FILE__ ) . '/classes/OssToolsView.class.php';
	include dirname( __FILE__ ) . '/classes/ProductionView.class.php';
} catch (Exception $e) {}

get_header();
?>

	<div id="primary" class="content-area color-0">
		<main id="main" class="site-main main-hp nodes-bg">

      <!-- intro -->
			<div class="box-shadow1">
				<?php
				/* Intro v1 full */
				$introView = new IntroView(View::VIEW_TYPE_FULL);
				print $introView->render();
				?>
			</div>

			<?php
			/* Production with big first and 3 other */
			$productionView = new ProductionView(View::VIEW_TYPE_FULL);
			print $productionView->render();
			?>

      <!-- main-focus-and-news-->
      <?php get_template_part( 'template-parts/universal/section', 'focuspoints' ); ?>

			<!-- latest from blog -->
			<?php get_template_part( 'template-parts/universal/section', 'blog' ); ?>

			<!-- mail list submit -->
			<?php
			/* Mailing List in a col */
			$mailListView = new MailListView(View::VIEW_TYPE_FULL);
			print $mailListView->render();
			?>

			<!-- oss tools -->
			<?php
			/* HP version */
			$ossToolsView = new OssToolsView(View::VIEW_TYPE_FULL);
			print $ossToolsView->render();
			?>

      <!-- why -->
			<?php get_template_part( 'template-parts/universal/section', 'sustainability' ); ?>

      <!-- contibute? -->
			<div class="bg-color-1">
				<?php
				/* contibute as a section */
				$contributeView = new ContributeView(View::VIEW_TYPE_FULL);
				print $contributeView->render();
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
