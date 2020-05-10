<?php
/**
* Template Name: About
*
* @package ForwardCreating_v3
*/
namespace v3;
$theme = wp_get_theme();
$themeName =  $theme->get( 'TextDomain' );
try {
	include get_theme_root() . '/' . $themeName . '/classes/MailListView.class.php';
	include get_theme_root() . '/' . $themeName . '/classes/IntroView.class.php';
  include get_theme_root() . '/' . $themeName . '/classes/ContributeView.class.php';
} catch (Exception $e) {}

get_header();
?>
  <div id="primary" class="content-area color-0">
  	<main id="main" class="site-main main-about nodes-bg">

      <div class="box-shadow1 mb4">
      <section class="sec-intro container-fluid mb-4 padding-top-a1 padding-bottom-a1 color-0a bg-color-2">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="">
              <h1>
								About
							</h1>
              <h2>
								Forward Creating <i class="fas fa-project-diagram"></i>
							</h2>
              <h3>A platform for publishing and promoting contemporary
                tools, products, services, concept or ideas that contribute towards
                sustainable future in absolute form</h3>

            </div>
          </div>
        </div>
      </section>
			</div>

      <?php
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
