<?php
/**
 * Template Name: One pager, portfolio
 *
 */
	get_header();
?>

<div id="main" data-spy="scroll" data-target=".nav">
	<div class="row">
		
		<div class="span2">
			<ul class="xoxo">
			<?php if ( function_exists( 'get_custom_header' ) ) : ?>
				<li><ul><li><img id="logo" src="<?php header_image(); ?>" /></li></ul><li>
			<?php endif; ?>
			</ul>
			&nbsp;
		</div>
		
		<div class="row">
			<div class="span8">
				404	
			</div>
		</div>
		
		<div class="span2">
			<div id="side-two">
			<?php //dynamic_sidebar(' '); ?>
			<ul class="xoxo" >
				<li>
					<?php wp_nav_menu(array('container' => false, 'menu_class' => 'nav')); ?>
				</li>
				<?php dynamic_sidebar( 'primary-widget-area' ); ?>
			</ul>
			</div>
			&nbsp;
		</div>
		
	</div>	
	
</div> <!-- #main -->

<?php
	get_footer();
?>

