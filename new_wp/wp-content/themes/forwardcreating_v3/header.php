<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ForwardCreating_v3
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'forwardcreating_v3' ); ?></a>

	<header id="masthead" class="site-header">
			<?php
			// the_custom_logo();
			// if ( is_front_page() && is_home() ) :
			// esc_url( home_url( '/' ) );
			// bloginfo( 'name' );
			// get_bloginfo( 'description', 'display' );
 			?>
		<nav id="site-navigation" class="container-fluid main-navigation">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'forwardcreating_v3' ); ?></button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
