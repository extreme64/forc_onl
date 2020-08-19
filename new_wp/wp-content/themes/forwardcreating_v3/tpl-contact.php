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
    include_once get_theme_root() . '/' . $themeName . '/classes/SocialIconsView.class.php';
} catch (Exception $e) {}

get_header();
?>
  <div id="primary" class="content-area color-0">
  	<main id="main" class="site-main main-contact nodes-bg">

      <div class="bg-color-2">
        <section class="container mid-email-list-cta padding-top-a padding-bottom-a">
          <h1 class="text-center">Contact</h1>
          <h4 class="padding-bottom-0 text-center">
            If you have an idea any kind of a suggestion or critic, contact us here.
          </h4>
          <div class="row">
            <div class="col-md-9">
              <style media="screen">
                .cfsFormShell { display: block; margin: auto }
              </style>
              <div class="mail-list-form">
              <?php
              echo do_shortcode('[contact-form-7 id="168" title="Contact form 1"]');
              ?>
              </div>
            </div>
            <div class="col-md-3">
              <h3 class="text-center">Other avenues</h3>
              <h5 class="padding-bottom-0 text-center">
                If it is more convenient here are our social network channels and other online locations
              </h5>
              <?php
                /* Social icons in a col */
                $socialiconsViewContent = new SocialIconsView(View::VIEW_TYPE_COL, "text-center");
                print $socialiconsViewContent->render();
              ?>
            </div>
          </div>
        </div>
      </section>
     </div>

      <section class="padding-top-0 padding-bottom-0">

        <?php
        get_sidebar();
        ?>
      </section>

    </main><!-- #main -->
  </div><!-- #primary -->
<?php
get_footer();
