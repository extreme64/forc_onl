<?php
/**
 * Template part for displaying page section in page templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */
  function intro_element($element_type=1) {
    switch ($element_type) {
      case 1: ?>
      <section class="sec-intro container-fluid mb-4 padding-top-a1 padding-bottom-a1 color-0a bg-color-2">
        <div class="row">
          <div class="col-md-7 offset-md-1">
            <div class="">
              <h1>Sustainable development in absolute form</h1>
              <h2>IDEA</h2>
              <h3>Forward Creating is a platform for publishing and promoting contemporary
                tools, products, services, concept or ideas that contribute towards sustainable future</h3>
            </div>
          </div>
          <div class="col-md-3">
            <img src="<?php print get_site_url() ?>/wp-content/uploads/2019/09/download-1.png" alt="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 offset-md-1 cta-btn-wrap margin-top-a">
            <a class="margin-btn1 padding-btn1" href="<?php print get_site_url() ?>/idea/">IDEA</a>
          </div>
        </div>
      </section>
      <?php
      break;
      case 2: ?>
      <section class="sec-intro container-fluid mb-4 padding-top-a1 padding-bottom-a1 color-0a bg-color-2 box-shadow1">
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
      <?php
      break;
      case 3: ?>
      <section class="sec-intro container-fluid padding-top-a1 padding-bottom-a1 color-0a bg-color-2">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="">
              <h1>Sustainable development in absolute form</h1>
              <h4>Forward Creating is a platform for publishing and promoting contemporary
                tools, products, services, concept or ideas that contribute towards sustainable future</h4>
              </div>
            </div>
          </div>
        </section>
      <?php
      break;

      default:
      // print "No view to display!";
      break;
    }
  }
?>
