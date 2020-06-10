<?php
/**
* Template Name: Concepts
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
  include get_theme_root() . '/' . $themeName . '/classes/OssToolsView.class.php';
  include get_theme_root() . '/' . $themeName . '/classes/ProductionView.class.php';
} catch (Exception $e) {}

get_header();
?>
  <div id="primary" class="content-area color-0">
  	<main id="main" class="site-main main-concepts nodes-bg">

      <section class="container-fluid color-5 padding-top-a padding-bottom-a bg-color-6">
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <h1>Concepts</h1>
            <h2>Concepts of The Sustainable Future</h2>
            <h4>Graphics, illustrations, videos, e.t.c  from various authors</h4>
          </div>
        </div>
      </section>

      <section class="container-fluid padding-top-a padding-bottom-a bg-color-1 box-shadow1">
        <?php
        if ( $posts ) { ?>
          <div class="row">
            <div class="col-md-10 offset-md-1">
              <div class="row filters-row">
                <div class="col-md-12">
									<h3>Sustainable Concepts</h3>
									<h4>Latest Posts</h4>
									<?php
									$categories = get_categories(array(
								    'orderby' => 'name',
										'hide_empty' => false,
										'parent' => 6
									) );
									// 'parent'  => 0 just top cats
									 ?>
									<span class="filters-wrap margin-top-0 margin-bot-a">
									<?php
									foreach ( $categories as $category ) {
								    printf( '  <h5 class="box-shadow2" data-cats="filter-ui" data-cats-val="%1$s">%2$s</h5>',
							        $category->cat_ID,
							        esc_html( $category->name )
								    );
									}
									// get_category_link()
									?>
                </div>
              </div>
							<span class="post-rows-wrap">
								<!-- posts render element -->
							</span>
							<span >
								<div class="col-md-10 offset-md-1 cta-btn-wrap alt2 margin-top-a">
			            <span data-ui="load-more" data-post-page="1" data-cats-val="0" class="margin-btn1 padding-btn1" title="Laod more content from the sustainable concepts">MORE</a>
			          </div>
							</span>
	          </div>
	        </div>
        <?php
        } ?>
      </section>

      <?php
      /* Production with big first and 3 other */
      $productionView = new ProductionView(View::VIEW_TYPE_FULL);
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
