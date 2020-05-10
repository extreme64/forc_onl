<?php
/**
* Template Name: Production
*
* @package ForwardCreating_v3
*/
namespace v3;
$theme = wp_get_theme();
$themeName =  $theme->get( 'TextDomain' );
try {
	// include get_theme_root() . '/' . $themeName . '/classes/MailListView.class.php';
  include get_theme_root() . '/' . $themeName . '/classes/ProductionView.class.php';
	include get_theme_root() . '/' . $themeName . '/classes/IntroView.class.php';
  include get_theme_root() . '/' . $themeName . '/classes/ContributeView.class.php';
  // include get_theme_root() . '/' . $themeName . '/classes/OssToolsView.class.php';
} catch (Exception $e) {}

get_header();
?>
  <div id="primary" class="content-area color-0">
  	<main id="main" class="site-main main-production nodes-bg">


      <?php
      /* Production with big first and 3 other */
      $productionView = new ProductionView(View::VIEW_TYPE_FULL2);
      print $productionView->render();
      ?>

      <div class="margin-top-a">
        <?php
        /* Intro v3 slim info */
        $introView = new IntroView(View::VIEW_TYPE_SLIM2);
        print $introView->render();
        ?>
      </div>

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
