<?php
/**
 * Template part for displaying page section in page templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */
?>

<?php
function contribute_element($element_type=1) {
  switch ($element_type) {
    case 1: ?>
    <!-- full page width, stand-alone section -->
    <!-- <div class="bg-color-1"> -->
    <style media="screen">
      .ci-contribute-bg {
        background: url(<?php print get_site_url() ?>/wp-content/uploads/2019/09/cont-2.jpg);
      }
    </style>
      <section class="sec-cont container-fluid ci-contribute-bg t-shadow-w1 box-shadow1">
        <div class="row">
          <div class="col-md-8 offset-md-2 padding-top-a text-center">
              <h3>CAN I CONTRIBUTE?</h3>
          </div>
        </div>
        <div class="row padding-bottom-a">
          <div class="col-md-8 offset-md-2 text-center">
            <h4 class="f-weight-b1">
              <a href="#">...contribute by ideas, suggessions e.t.c. <i class='fa fa-angle-double-right'></i></a>
            </h4>
            <h4 class="f-weight-b1">
              <a href="#">...make this website/producation sustainable. <i class='fa fa-angle-double-right'></i></a>
            </h4>
          </div>
        </div>
      </section>
    <!-- </div> -->
    <?php
    break;
    case 2: ?>
    <section class="sec-cont container-fluid ci-contribute-bg">
      <div class="row">
        <div class="col-md-12 padding-top-a text-center">
            <h3>CAN I CONTRIBUTE?</h3>
        </div>
      </div>
      <div class="row padding-bottom-a">
        <div class="col-md-12 text-center">
          <h5 class="f-weight-b1">
            <a href="#">...contribute by ideas, suggessions e.t.c. <i class='fa fa-angle-double-right'></i></a>
          </h5>
          <h5 class="f-weight-b1">
            <a href="#">...make this website/producation sustainable. <i class='fa fa-angle-double-right'></i></a>
          </h5>
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
