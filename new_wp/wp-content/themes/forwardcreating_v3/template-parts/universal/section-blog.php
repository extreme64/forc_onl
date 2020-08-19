<?php
/**
 * Template part for displaying page section in page templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */
?>
<section class="sec-blog container-fluid margin-top-0">
  <div class="row">
    <div class="col-md-10 offset-1">
      <h4 class="margin-top-0 margin-bot-0">LATEST FROM BLOG</h4>
    </div>
  </div>
  <div class="row">
    <?php
    // category: 'News Showreal'
    $news_posts_options = array(
      'numberposts'      => 4,
      'category'         => 5,
      'orderby'          => 'date',
      'order'            => 'DESC',
      'include'          => array(),
      'exclude'          => array(),
      'meta_key'         => '',
      'meta_value'       => '',
      'post_type'        => 'post',
      'suppress_filters' => true
    );

    $news_posts = get_posts( $news_posts_options );
    foreach ($news_posts as $np_i => $post) :
        $featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium_large');
        $image_style_str = 'full';
        if(!$featured_img_url) {
            if($image_style_str == 'full')
                $featured_img_url = get_template_directory_uri() . "/imgs" . "/default-image.png";
            else
                $featured_img_url = get_template_directory_uri() . "/imgs" . "/default-image-33.png";
        }
        $loop_class_name_use =  'news-sr-bg-'.$np_i;
        $loop_class_name = '.'.$loop_class_name_use; ?>

      <style media="screen">
        <?php print $loop_class_name; ?> {
          min-height: 360px;
          margin: 30px auto 0px auto;
          padding: 15px;
          background-image: url(<?php print $featured_img_url; ?>);
          background-position: center center;
          background-repeat: no-repeat;
          background-size: cover;
          border-left: 3px solid #2f271d;
        }
      </style>
      <div class="col-md-4 blog-post-fp-prev <?php print $loop_class_name_use; ?>" >
        <h3><?php print $post->post_title ?></h3>
        <p class="margin-top--0">
          <?php
          $do_post_thumb = false;
          if($do_post_thumb && has_post_thumbnail($post->ID)) :
            $post_thumbnail = get_post_thumbnail_id( $post->ID );
            the_post_thumbnail('medium_large'); ?>
            <?php
          endif; ?>
          <?php print $post->post_excerpt ?>
          <a href="<?php print esc_url( get_permalink($post->ID) ); ?>">
            Full article <i class="fas fa-angle-double-right" aria-hidden="true"></i>
          </a>
        </p>
        <!-- <hr> -->
        <span><?php // print $post->post_date_gmt ?> <?php // print $post->post_modified_gmt ?></span>
      </div>
      <?php
      endforeach; ?>
  </div>
</section>
