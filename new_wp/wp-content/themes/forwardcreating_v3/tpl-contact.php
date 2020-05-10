<?php
/**
* Template Name: Contact
*
* @package ForwardCreating_v3
*/
namespace v3;
$theme = wp_get_theme();
$themeName =  $theme->get( 'TextDomain' );
try {
	include get_theme_root() . '/' . $themeName . '/classes/MailListView.class.php';
} catch (Exception $e) {}

get_header();
?>
  <div id="primary" class="content-area color-0">
  	<main id="main" class="site-main main-about nodes-bg">

      <div class="bg-color-2">
        <section class="container padding-top-a padding-bottom-a">
          <div class="row">
            <div class="col-md-12">
            <h1 class="text-center">Contact</h1>
            <h4 class="padding-bottom-0 text-center">If you have an idea, any kind of a suggestion
              or critic contact us here.</h4>
            <style media="screen">
              .cfsFormShell { display: block; margin: auto }
            </style>
            <?php
            echo do_shortcode("[supsystic-form id='11']");
            ?>

          </div>
        </div>
      </section>
      </div>

      <section class="padding-top-0 padding-bottom-0">

        <?php
        get_sidebar();
        ?>
      </section>

      <div class="bg-color-1">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <?php
              /* Mailing List in a col */
              $mailListView = new MailListView(View::VIEW_TYPE_FULL);
              print $mailListView->render();
              ?>
            </div>
          </div>
        </div>
      </div>

    </main><!-- #main -->
  </div><!-- #primary -->
<?php
get_footer();
