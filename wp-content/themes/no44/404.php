<?php
/**
 * Template Name: One pager, portfolio
 *
 */
	get_header();
?>

<div class="container">
	<div class="row">
		
		<div class="span2">
			<ul class="xoxo">
			<?php if ( function_exists( 'get_custom_header' ) ) : ?>
				<li><ul><li><a href="<?php bloginfo('url'); ?>"><img id="logo" src="<?php header_image(); ?>" /></a></li></ul><li>
			<?php endif; ?>
			</ul>
			&nbsp;
		</div>
		
		<div class="span8" id="content">s
			<h1>404</h1>
			<h2>Page not found.</h2>
		</div>
		
	</div>	<!-- .row -->
</div> <!-- .container -->

<?php
	get_footer();
?>

