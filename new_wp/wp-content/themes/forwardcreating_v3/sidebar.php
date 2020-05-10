<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ForwardCreating_v3
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<section class="container margin-top-0 margin-bot-0a">
	<aside class="row">
		<div class="col-md-4">
			<div id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- #secondary -->
		</div>
		<div class="col-md-4">
			<div id="secondary-2" class="widget-area">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- #secondary-2 -->
		</div>
		<div class="col-md-4">
			<div id="secondary-3" class="widget-area">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div><!-- #secondary-3 -->
		</div>
	</aside>
</section>
