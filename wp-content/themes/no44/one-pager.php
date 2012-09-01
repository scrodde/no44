<?php
/**
 * Template Name: One pager, portfolio
 *
 */
	get_header();
?>

<div id="main">
	<div class="row">
		<div class="span2">
		<?php if ( function_exists( 'get_custom_header' ) ) : ?>
			<img id="logo" src="<?php header_image(); ?>" />
		<?php endif; ?>
		</div>
		<div class="span8">
			CONTENT
		</div>
		
		<div class="span2" id="side-two">
			SIDEBAR
			<?php dynamic_sidebar(' '); ?>
		</div>
	</div>	
</div> <!-- #main -->

<?php
	get_footer();
?>

