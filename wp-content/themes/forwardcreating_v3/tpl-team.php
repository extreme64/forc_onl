<?php
/**
* Template Name: Team
*
* @package ForwardCreating_v3
*/
namespace v3;
$theme = wp_get_theme();
$themeName =  $theme->get( 'TextDomain' );
try {
	include get_theme_root() . '/' . $themeName . '/classes/ContributeView.class.php';
	include get_theme_root() . '/' . $themeName . '/classes/MailListView.class.php';
  include get_theme_root() . '/' . $themeName . '/classes/ProductionView.class.php';
	include get_theme_root() . '/' . $themeName . '/classes/OssToolsView.class.php';
} catch (Exception $e) {}

get_header();
?>
  <div id="primary" class="content-area color-0">
  	<main id="main" class="site-main main-team nodes-bg">


      <div class="box-shadow1 mb4">
      <section class="sec-intro container-fluid mb-4 padding-top-a1 padding-bottom-a1 color-0a bg-color-2">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="">
              <h1>
                Team
              </h1>
              <h2>
                Join Forward Creating Community <i class="fas fa-project-diagram"></i>
              </h2>
              <h3>A platform for publishing and promoting contemporary
                tools, products, services, concept or ideas that contribute towards
                sustainable future in absolute form</h3>

            </div>
          </div>
        </div>
      </section>
      </div>


      <section class="container padding-top-a padding-bottom-a">
        <div class="row">
          <div class="col-nd-12">
            <h4>
              Forward creating is envisioned as a hub for sustainable development enthusiasts. Anyone that
              already creats or wishes to, is wellcome to contribute with their work.
            </h4>
          </div>
        </div>

        <div class="row margin-top-0a">
          <div class="col-nd-12">
            <h4>
              You have a chance to use this medium in several ways: your creative work to be published
              or to contribute to Forward Creating in house production.
            </h4>
            <h4>
              What is needed is professional quality work and preferably, production tools used, to be from the FOSS family.
            </h4>
          </div>
        </div>

        <div class="row margin-top-0a">
          <div class="col-nd-12">
            <h4>
              If you have an idea how to be a member of the Forward Creating communty or have any kind
              of a suggestion or critic <a href="<?php print get_site_url() ?>/contact/">contact us</a>.
            </h4>
          </div>
        </div>
      </section>


      <?php
      /* Production with big first and 3 other */
      $productionView = new ProductionView(View::VIEW_TYPE_FULL);
      print $productionView->render();
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

      <?php
      /* oss tools */
      $ossToolsView = new OssToolsView(View::VIEW_TYPE_FULL_SLIM);
      print $ossToolsView->render();
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->
<?php
get_footer();
