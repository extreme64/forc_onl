<?php
/**
 * Template part for displaying page section in page templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */
 function production_element($element_type=1) {
   switch ($element_type) {
     case 1: ?>
      <section class="sec-big-prods container-fluid margin-top-a1">
        <div class="row">
          <div class="col-md-12">
            <h3>PRODUCTION</h3>
            <h4>Documentaries & Concept Illustrations by ForwardCreating</h4>
          </div>
        </div>
        <div class="row">
          <?php
          // category: 'main-showreal'
          $main_posts_options = array(
              'numberposts'      => 3,
              'category'         => 'main-showreal',
              'orderby'          => 'date',
              'order'            => 'DESC',
              'include'          => array(),
              'exclude'          => array(),
              'meta_key'         => '',
              'meta_value'       => '',
              'post_type'        => 'post',
              'suppress_filters' => true
          );
          $main_posts = get_posts( $main_posts_options );
          foreach ($main_posts as $mp_i => $post_m) :
            $featured_img_url = get_the_post_thumbnail_url($post_m->ID, 'medium_large');
            $loop_class_name_f_use =  'main-sr-bg-'.$mp_i;
            $loop_class_name_f = '.'.$loop_class_name_f_use; ?>

            <style media="screen">
              .sec-big-prods <?php print $loop_class_name_f; ?> {
                display: block;
                height: 500px;
                width: 100%;
                margin: 0px auto 0px auto;
                padding: 15px;
                background-image: url(<?php print $featured_img_url; ?>);
                background-position: center bottom;
                background-repeat: no-repeat;
                background-size: cover;
              }
            </style>
            <div class="col-md-4">
                <span class="big-prods-span <?php print $loop_class_name_f_use; ?> box-shadow1" >
                  <h2>
                    <a href="<?php print esc_url( get_permalink($post_m->ID) ); ?>">
                      <?php print $post_m->post_title ?>
                    </a>
                  </h2>
                </span>
                <span class="bg-color-2 excerpt-span box-shadow1">
                  <p class="big-prods-info">
                    <?php print $post_m->post_excerpt ?>
                    <a href="<?php print esc_url( get_permalink($post_m->ID) ); ?>">continue... <i class="fas fa-angle-double-right"></i></a>
                  </p>
                  <i class="fas fa-caret-down ui-open-down"></i>
                </span>
            </div>
          <?php
          endforeach;
          ?>
        </div>
      </section>

      <script type="text/javascript">
        jQuery().ready(function($){
          $(".excerpt-span").click(function(e){
            var elToShow = $(this).find(".big-prods-info")
            var uiOpenDown = $(this).find(".ui-open-down")
            if($(elToShow).css("display") === "block") {
              $(elToShow).fadeOut(200)
              $(uiOpenDown).removeClass("fa-caret-up")
              $(uiOpenDown).addClass("fa-caret-down")
            }else{
              $(elToShow).fadeIn(350)
              $(uiOpenDown).removeClass("fa-caret-down")
              $(uiOpenDown).addClass("fa-caret-up")
            }
          })
        })
        // external .js
        // window.onload = function() {
        //   var element = document.createElement("script");
        //   element.src = "myScript.js";
        //   document.body.appendChild(element);
        // };

      </script>
      <?php
      break;
      case 2: ?>
      <?php
      // category: 'main-showreal'
      $main_posts_options = array(
          'numberposts'      => 4,
          'category'         => 'main-showreal',
          'orderby'          => 'date',
          'order'            => 'DESC',
          'include'          => array(),
          'exclude'          => array(),
          'meta_key'         => '',
          'meta_value'       => '',
          'post_type'        => 'post',
          'suppress_filters' => true
      );
      $main_posts = get_posts( $main_posts_options );
      $num_main_posts = count($main_posts);
      ?>
      <section class="sec-big-prods big-prods-full container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>PRODUCTION</h1>
            <h4>Documentaries & Concept Illustrations by ForwardCreating</h4>
          </div>
        </div>
        <div class="highlight-prod-wrap margin-top-a">
          <div class="row">
            <div class="col-md-7">
              <?php
              $first_post;
              if($num_main_posts>0) {
                $first_post = array_shift($main_posts);
                $fp_featured_img_url = get_the_post_thumbnail_url($first_post->ID, 'medium_large'); ?>
                <img class="width-100p" src="<?php print $fp_featured_img_url; ?>" alt="<?php print $first_post->post_title ?>">
              <?php
              }
              ?>
            </div>
            <div class="col-md-5">
              <h2>
                <a href="<?php print esc_url( get_permalink($first_post->ID) ); ?>">
                  <?php print $first_post->post_title ?>
                </a>
              </h2>
              <p>
                <?php print $first_post->post_excerpt ?>
              </p>
              <a href="<?php print esc_url( get_permalink($first_post->ID) ); ?>">continue... <i class="fas fa-angle-double-right"></i></a>
            </div>
          </div>
        </div>
        <?php
        if($num_main_posts>0): ?>
        <div class="row margin-top-a1">
          <?php

          foreach ($main_posts as $mp_i => $post_m) :
            $featured_img_url = get_the_post_thumbnail_url($post_m->ID, 'medium_large');
            $loop_class_name_f_use =  'main-sr-bg-'.$mp_i;
            $loop_class_name_f = '.'.$loop_class_name_f_use; ?>

            <style media="screen">
              .sec-big-prods <?php print $loop_class_name_f; ?> {
                display: block;
                height: 500px;
                width: 100%;
                margin: 0px auto 0px auto;
                padding: 15px;
                background-image: url(<?php print $featured_img_url; ?>);
                background-position: center bottom;
                background-repeat: no-repeat;
                background-size: cover;
              }
            </style>
            <div class="col-md-4">
                <span class="big-prods-span <?php print $loop_class_name_f_use; ?> box-shadow1" >
                  <h2>
                    <a href="<?php print esc_url( get_permalink($post_m->ID) ); ?>">
                      <?php print $post_m->post_title ?>
                    </a>
                  </h2>
                </span>
                <span class="bg-color-2 excerpt-span box-shadow1">
                  <p class="big-prods-info">
                    <?php print $post_m->post_excerpt ?>
                    <a href="<?php print esc_url( get_permalink($post_m->ID) ); ?>">continue... <i class="fas fa-angle-double-right"></i></a>
                  </p>
                  <i class="fas fa-caret-down ui-open-down"></i>
                </span>
            </div>
          <?php
          endforeach;
          ?>
        </div>
        <?php
        endif; ?>
      </section>

      <script type="text/javascript">
        jQuery().ready(function($){
          $(".excerpt-span").click(function(e){
            var elToShow = $(this).find(".big-prods-info")
            var uiOpenDown = $(this).find(".ui-open-down")
            if($(elToShow).css("display") === "block") {
              $(elToShow).fadeOut(200)
              $(uiOpenDown).removeClass("fa-caret-up")
              $(uiOpenDown).addClass("fa-caret-down")
            }else{
              $(elToShow).fadeIn(350)
              $(uiOpenDown).removeClass("fa-caret-down")
              $(uiOpenDown).addClass("fa-caret-up")
            }
          })
        })
      </script>
      <?php
      break;

    default:
    // print "No view to display!";
    break;
  }
}
?>
