<?php
/**
 * Template part for displaying posts in archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ForwardCreating_v3
 */

?>
<style media="screen">
	.post-hero-bg {
		min-height: 400px;
		background-image: url(<?php print get_the_post_thumbnail_url(get_the_ID(),'full');  ?>)
	}
</style>

<span class="cont-archive margin-top-a display-b">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <header class="entry-header container-fluid">
      <!-- intro image on top -->
      <div class="row">
        <div  class="col-md-12 bg-setup-1 post-hero-bg">
          <?php // forwardcreating_v3_post_thumbnail(); ?>
        </div>
      </div>
      <div class="row margin-top-0">
        <div class="col-md-12">
        <?php
        if ( is_singular() ) :
          the_title( '<h1 class="entry-title text-center">', '</h1>' );
          else :
            the_title( '<h2 class="entry-title text-center"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
          endif;

          if ( 'post' === get_post_type() ) :
            ?>
            <div class="entry-meta">
              <?php
              // forwardcreating_v3_posted_on();
              // forwardcreating_v3_posted_by();
              ?>
            </div><!-- .entry-meta -->
          <?php endif; ?>
        </div>
      </div>
    </header><!-- .entry-header -->

    <div class="entry-content container margin-top-0">
      <div class="row">
        <div  class="col-md-12">
          <?php
          the_content( sprintf(
            wp_kses(
              /* translators: %s: Name of current post. Only visible to screen readers */
              __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'forwardcreating_v3' ),
              array(
                'span' => array(
                  'class' => array(),
                ),
              )
            ),
            get_the_title()
            ) );

            wp_link_pages( array(
              'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'forwardcreating_v3' ),
              'after'  => '</div>',
            )
          );
          ?>
        </div>
      </div>
    </div><!-- .entry-content -->

    <footer class="entry-footer container margin-top--0">
      <div class="row">
        <div  class="col-md-12">
          <?php forwardcreating_v3_entry_footer(); ?>
        </div>
      </div>
    </footer><!-- .entry-footer -->
  </article><!-- #post-<?php the_ID(); ?> -->
</span>
