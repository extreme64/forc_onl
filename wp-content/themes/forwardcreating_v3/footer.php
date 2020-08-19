<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ForwardCreating_v3
 */

    namespace v3;
    $theme = wp_get_theme();
    $themeName =  $theme->get( 'TextDomain' );
    try {
        include_once get_theme_root() . '/' . $themeName . '/classes/SocialIconsView.class.php';
    } catch (Exception $e) {}
?>

	</div><!-- #content -->

	<footer id="colophon" class=" container-fluid site-footer footer1 padding-top-a1 padding-bottom-a1 color-5 bg-color-0">
		<div class="row">
			<div class="col-md-6 offset-md-1">

				<div class="">
                    <?php
                    // get all menu items
                    $navMenuSet = array(
                        'status' => 'publish', 
                        'orderby' => 'menu_order');
                    $menuReturn = wp_get_nav_menu_items( 'header-main', $navMenuSet); 
                    $menu = array();
                    // make top and sub menus
                    foreach ($menuReturn as $m) {
                        // no parent, you are TOP
                        if (empty($m->menu_item_parent)) {
                            $menu[$m->ID] = array();
                            $menu[$m->ID]['ID']         =   $m->ID;
                            $menu[$m->ID]['title']      =   $m->title;
                            $menu[$m->ID]['url']        =   $m->url;
                            $menu[$m->ID]['children']   =   array();
                        }else{
                            // you go to childs submenu
                            $menu[$m->menu_item_parent]['children'][] = $m; 
                        }
                    }
                    // render all menu items 
                    foreach ($menu as $key => $m) {                    
                        echo '<div class="foot-menu-items1">';
                        echo '<ul>'; 
                        echo '<li><a href="'.$m['url'].'">'.$m['title'].'</a></li>'; 
                        $curItemsChilds = $m['children'];
                        if(!empty($curItemsChilds)): ?>
                            <ul>
                            <?php 
                            foreach ($curItemsChilds as $itemKey2 => $value) {
                                echo '<li><a href="'.$value->url.'">'.$value->title.'</a></li>';
                            } ?>
                            </ul>
                        <?php 
                        endif;
                        echo '</ul>';
                        echo "</div>"; 
                    }

                    ?>
                </div>
                <style>
                    .social-icons {
                        float: left;
                        width: 100%;
                    }
                </style>
                <?php
                /* Social icons in a col */
                $socialiconsView = new SocialIconsView(View::VIEW_TYPE_COL, 'margin-top--0');
                print $socialiconsView->render();
                ?>

			</div>
			<div class="col-md-4">
				<div class="site-creditis">
					<span>Credits:</span>
					<ul>
						<li><i class="fas fa-user-ninja"></i> Radomir Tinkov <a href="https://www.fontspring.com/fonts/radomir-tinkov/gilroy">Gilroy Font</a></li>
						<li><i class="fas fa-user-ninja"></i> Daniel Johnson <a href="https://www.dafont.com/jura.font">Jura Font</a></li>
						<li><i class="fas fa-user-ninja"></i> Amelia Wattenberger, <a href="https://wattenberger.com/photoronoi">Photoronoi</a></li>
						<li><i class="fas fa-user-ninja"></i> Vecteezy <a href="https://www.vecteezy.com/">Vecteezy</a></li>
						<li>Powered by <i class="fab fa-wordpress"></i><span class="sep"> | </span>Theme: MastG</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row margin-top-a">
			<div class="col-md-10 offset-md-1 text-center">
				<q>A smallest of cogs needs to spin in order for largest of ideas to move forward.</q>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
