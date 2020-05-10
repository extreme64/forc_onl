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

?>

	</div><!-- #content -->

	<footer id="colophon" class=" container-fluid site-footer footer1 padding-top-a1 padding-bottom-a1 color-5 bg-color-0">
		<div class="row">
			<div class="col-md-6 offset-md-1">
				<div class="">
					<h4><i class="fas fa-envelope-open"></i> JOIN EMAIL LIST</h4>
					<h5>Occasional newsletter with the latest in your inbox</h5>
					<form class="mail-list-form" action="index.html" method="post">
						<input type="text" name="" value="">
						<input type="button" name="" value="SUBMIT">
					</form>
				</div>
				<div class="social-icons">
					<i class="fab fa-youtube-square"></i>
					<i class="fab fa-instagram"></i>
					<i class="fab fa-facebook-square"></i>
					<i class="fab fa-reddit-square"></i>
				</div>

			</div>
			<div class="col-md-4">
				<div class="site-creditis">
					<span>Credits:</span>
					<ul>
						<li><i class="fas fa-user-ninja"></i> <a href="https://www.fontspring.com/fonts/radomir-tinkov/gilroy">Gilroy Font</a> by Radomir Tinkov</li>
						<li><i class="fas fa-user-ninja"></i> <a href="https://www.dafont.com/jura.font">Jura Font</a> by Daniel Johnson</li>
						<li><i class="fas fa-user-ninja"></i> <a href="https://wattenberger.com/photoronoi">Photoronoi</a> graphics processing by <a href="https://twitter.com/Wattenberger">Amelia Wattenberger</a></li>
						<li><i class="fas fa-user-ninja"></i> Vector Art by <a href="https://www.vecteezy.com/">Vecteezy</a></li>
						<li><a href="https://wordpress.org/">Powered by <i class="fab fa-wordpress"></i></a><span class="sep"> | </span>Theme: <a href="http://forwardcreating.com">MastG</a></li>
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
