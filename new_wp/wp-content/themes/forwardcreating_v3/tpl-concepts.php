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
										<h2>Latest Concepts</h2>

                    <style media="screen">
                      .filters-row .filters-wrap {
                        display: block;
                        text-align: center;
                        /* width: auto; */
                      }
                      .filters-row .filters-wrap h5 {
                        display: inline-block;
                        width: 230px;
                        height: auto;
                        margin: 0px 5px;
                        padding: 14px 5px;
                        text-align: center;
                        font-weight: 600;
                        font-size: 25px;
                        line-height: 32px;
                        color: #2e294e;
                        background: #FFF;
                        border: 4px dashed #c5d86d;
                        border-radius: 12px;
                      }
											.filters-row .filters-wrap h5:hover {
                        color: #2e294e;
                        background: #FFF;
                        border: 4px solid #c5d86d;
                      }

											.concepts-row h3 a,
											.concepts-row h4 a,
											.concepts-row h5 a,
											.concepts-row h3 a:visited,
											.concepts-row h4 a:visited,
											.concepts-row h5 a:visited,
											.concepts-row p a,
											.concepts-row p a:visited {
													color: #2e294e;
											}
                    </style>
										<?php
										// if ( ! $category || is_wp_error( $category ) ) {
			 							// 	return '';
	 									// }
										// TODO: no cats set ????
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
	                <?php
									$concept_posts_options = array(
										'numberposts'      => 12,
										'category'         => 0, /*'concepts-preview' */
										'orderby'          => 'date',
										'order'            => 'DESC',
										'include'          => array(),
										'exclude'          => array(),
										'meta_key'         => '',
										'meta_value'       => '',
										'post_type'        => 'post',
										'suppress_filters' => true
									);
									$posts = array(); //get_posts( $concept_posts_options );
									$num_posts = count($posts);

	                foreach ( $posts as $key => $post ) :
	                  reset($posts);
	                  if ($key === key($posts)) { ?>
	                      <div class="row concepts-row">
	                  <?php
	                  }
	                  if ($key % 4 == 0 && $key !== 0) { ?>
	                    </div>
	                    <div class="row concepts-row">
	                  <?php
	                  } ?>
	                  <div class="col-md-3 margin-top-0">
	                    <img src="<?php print get_the_post_thumbnail_url($post->ID, 'thumbnail', true); ?>" alt="">
	                    <h4 class="margin-top--0 margin-bot-0">
	                      <a href="<?php print esc_url( get_permalink($post->ID) ); ?>">
	                        <?php print $post->post_title ?>
	                      </a>
	                    </h4>
	                    <p>
	                      <?php print $post->post_excerpt ?>
	                    </p>
	                    <p>
	                      <a href="<?php print esc_url( get_permalink($post->ID) ); ?>">continue... <i class="fas fa-angle-double-right"></i></a>
	                    </p>
	                  </div>
	                  <?php
	                  end($posts);
	                  if ($key === key($posts)) { ?>
	                    </div>
	                  <?php
	                  } ?>

	               <?php
	               endforeach;
	               wp_reset_postdata();
	           ?>
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
