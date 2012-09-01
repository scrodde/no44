<?php
/**
 * Template Name: One pager, portfolio
 *
 */

get_header(); ?>

<?php
	get_header();
?>

<div id="main">
	<div class="row">
		
		<div class="span3" id="side-one">
			<ul class="xoxo">
				<?php dynamic_sidebar(' '); ?>
			</ul>
		</div>
		
		<div class="span6">
			CONTENT
		</div>
		
		<div class="span3" id="side-two">
			<?php dynamic_sidebar(' '); ?>
		</div>
	</div>
</div> <!-- #main -->

<?php
	get_footer();
?>

