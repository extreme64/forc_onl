<?php
/**
* Template Name: Idea
*
* @package ForwardCreating_v3
*/
namespace v3;
$theme = wp_get_theme();
$themeName =  $theme->get( 'TextDomain' );
try {
	include get_theme_root() . '/' . $themeName . '/classes/ContributeView.class.php';
	include get_theme_root() . '/' . $themeName . '/classes/MailListView.class.php';
	include get_theme_root() . '/' . $themeName . '/classes/OssToolsView.class.php';
} catch (Exception $e) {}

get_header();
?>
  <div id="primary" class="content-area color-0">
  	<main id="mai n" class="site-main main-idea nodes-bg">


			<div class="box-shadow1 mb4">
      <section class="sec-intro container-fluid mb-4 padding-top-a1 padding-bottom-a1 color-0a bg-color-2">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="">
              <h1>
								Sustainable development in absolute form
							</h1>
              <h2>
								<i class="fas fa-project-diagram"></i>
							</h2>
              <h3>Forward Creating is a platform for publishing and promoting contemporary
                tools, products, services, concept or ideas that contribute towards sustainable future</h3>
								<div class="">
								</div>
            </div>
          </div>
        </div>
      </section>
			</div>

      <section class="sec-main-focus-and-news container-fluid padding-top-a1 padding-bottom-a1">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h2 class="margin-top-0">MAIN FOCUS</h2>
            <h3 class="margin-top-0 margin-bot-0 color-0 text-bg-1">
              Design of concepts or ideas, base with underlining principals of absolute
              sustainability as it’s core objective.
            </h3>
            <div class="row">
              <div class="col-md-6">
                <span class="i-h4-wrap margin-top-0a">
                  <i class="fas fa-exchange-alt"></i>
                  <h4 class="margin-top-0">Flexibility, reusability, modularity, recyclability<!-- accessibility.longevity --></h4>
                </span>
              </div>
              <div class="col-md-6">
                <span class="i-h4-wrap margin-top-0a">
                  <i class="fas fa-landmark"></i>
                  <h4 class="margin-top-0">Open source and public domain</h4>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <span class="i-h4-wrap margin-top-0a">
                  <i class="far fa-handshake"></i>
                  <h4 class="margin-top-0">Voluntary cooperative participation </h4>
                </span>
              </div>
              <div class="col-md-6">
                <span class="i-h4-wrap margin-top-0a">
                  <i class="fas fa-less-than-equal"></i>
                  <h4 class="margin-top-0">Stride towards a zero new resources extraction</h4>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <style media="screen">
        .sec-why-bg {
          /* background: url(../new_wp/wp-content/uploads/2019/09/download-13.jpg); */
          background-position: center left;
          background-repeat: no-repeat;
          background-size: contain;
        }
      </style>
      <section class="sec-why container-fluid mt-4 padding-top-a1 padding-bottom-a1 sec-why-bg">
        <div class="row">
          <div class="col-md-8 offset-2 text-center">
            <h2 class="">What Does Sustainability Mean?</h2>
            <h3>
              Sustainability is simply the ability to sustain something.
            </h3>
            <h4>To sustain something, we must prolong it indefinitely, which begs the obvious question: what is it
              that we want to sustain? Do we want to sustain our consumer lifestyle, our growth-based economic system,
              or our control over other nations’ resources? Sustainability, therefore, is the discussion around our
              ability to sustain something given the resources we have available.
            </h4>
            <h2 class="padding-top-a">What Do You Want To Sustain?</h2>
            <h4>
              To answer this question, we need to answer other one, "How feasible is the sustainability of
              the system embedded into one that it self in it's foundation is not?"
            </h4>
            <h4>
              If we are to assume that that is likely unattainable than sustainability of any system turns
              towards evolving the parent one into more efficient version. This principle is to be applied to
              entire hierarchy.
            </h4>
            <h4>
              By evolving parent one we achieve possibility for the child one, the one that lies a top of
              the formentiond one, to evolve further too. This goes against the traditional approach that
              we tackle the problem of one as in existing in isolation of the influences of others.
            </h4>
          </div>
        </div>
      </section>

      <?php
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
