<?php
/**
* Template Name: Q&A
*
* @package ForwardCreating_v3
*/
namespace v3;
$theme = wp_get_theme();
$themeName =  $theme->get( 'TextDomain' );
try {
	include get_theme_root() . '/' . $themeName . '/classes/ContributeView.class.php';
	include get_theme_root() . '/' . $themeName . '/classes/MailListView.class.php';
	include get_theme_root() . '/' . $themeName . '/classes/IntroView.class.php';
} catch (Exception $e) {}

get_header();
?>
  <div id="primary" class="content-area color-0">
  	<main id="main" class="site-main main-qa nodes-bg">

			<div class="box-shadow1 mb4">
			<?php
      /* Intro v3 slim info */
      $introView = new IntroView(View::VIEW_TYPE_SLIM2);
      print $introView->render();
      ?>
			</div>


        <!-- QAs -->
        <section class="sec-qas container margin-top-a margin-bot-a">
          <div class="row">
            <div class="col-md-12">
              <?php
              $gqas = get_field('general-qas');
              $gC = count($gqas);
              if($gC>0 && $gqas !== false){
                foreach ($gqas as $key => $value) { ?>
                  <div class="qa-wrap">
                    <div class="question">
                      <h2><?php print $value['question']; ?></h2>
                    </div>
                    <div class="answer">
                      <h5><?php print $value['answer']; ?></h5>
                    </div>
                  </div><?php
                }
              } ?>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <?php
              $ossqas = get_field('oss-pd-qas');
              $ossC = count($ossqas);
              if($ossC>0 && $ossqas !== false){
                foreach ($ossqas as $key => $value) { ?>
                  <div class="qa-wrap">
                    <div class="question">
                      <h2><?php print $value['question']; ?></h2>
                    </div>
                    <div class="answer">
                      <h5><?php print $value['answer']; ?></h5>
                    </div>
                  </div><?php
                }
              } ?>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <?php
              $colqas = get_field('collaboration-qas');
              $cC = count($colqas);
              if($cC>0 && $colqas !== false){
                foreach ($colqas as $key => $value) { ?>
                  <div class="qa-wrap">
                    <div class="question">
                      <h2><?php print $value['question']; ?></h2>
                    </div>
                    <div class="answer">
                      <h5><?php print $value['answer']; ?></h5>
                    </div>
                  </div><?php
                }
              } ?>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <?php
              $paqas = get_field('price-alternatives-qas');
              $paC = count($paqas);
              if($paC>0 && $paqas !== false){
                foreach ($paqas as $key => $value) { ?>
                  <div class="qa-wrap">
                    <div class="question">
                      <h2><?php print $value['question']; ?></h2>
                    </div>
                    <div class="answer">
                      <h5><?php print $value['answer']; ?></h5>
                    </div>
                  </div><?php
                }
              } ?>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <?php
              $ssqas = get_field('self-sufficient-qas');
              $ssC = count($ssqas);
              if($ssC>0 && $ssqas !== false){
                foreach ($ssqas as $key => $value) { ?>
                  <div class="qa-wrap">
                    <div class="question">
                      <h2><?php print $value['question']; ?></h2>
                    </div>
                    <div class="answer">
                      <h5><?php print $value['answer']; ?></h5>
                    </div>
                  </div><?php
                }
              } ?>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <?php
              $conqas = get_field('interested-to-contibute-qas');
              $coC = count($conqas);
              if($coC>0 && $conqas !== false){
                foreach ($conqas as $key => $value) { ?>
                  <div class="qa-wrap">
                    <div class="question">
                      <h2><?php print $value['question']; ?></h2>
                    </div>
                    <div class="answer">
                      <h5><?php print $value['answer']; ?></h5>
                    </div>
                  </div><?php
                }
              } ?>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <?php
              $ocqas = get_field('online-course-qas');
              $ocC = count($ocqas);
              if($ocC>0 && $ocqas !== false){
                foreach ($ocqas as $key => $value) { ?>
                  <div class="qa-wrap">
                    <div class="question">
                      <h4><a href="<?php print print $value['answer']; ?>"> <?php print $value['question']; ?></a></h4>
                    </div>
                    <!-- <div class="answer">

                    </div> -->
                  </div><?php
                }
              } ?>
            </div>
          </div>
        </section>


        <section class="bg-color-1">
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
        </section>

    </main><!-- #main -->
  </div><!-- #primary -->
<?php
get_footer();
