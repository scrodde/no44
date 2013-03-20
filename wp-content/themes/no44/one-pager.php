<?php
/**
 * Template Name: One pager, portfolio
 *
 */
	get_header();
?>
<div class="container section" id="work">
	<div class="row">
		<div class="span1">
			<ul class="xoxo widget-area-one" id="widget-area-one">
			<?php if ( function_exists( 'get_custom_header' ) ) : ?>
				<li><ul><li><img id="logo" src="<?php header_image(); ?>" /></li></ul><li>
			<?php endif; ?>
			</ul>
			&nbsp;
		</div>
		
		<div class="span1 offset10">
			<ul class="xoxo widget-area-two" id="widget-area-two">
				<li>
					<?php wp_nav_menu(array('container' => false, 'menu_class' => 'nav')); ?>
				</li>
				<?php dynamic_sidebar( 'primary-widget-area' ); ?>
			</ul>
			&nbsp;
		</div>
	</div>

	<div class="row">
		<div class="span10 offset1">
			
			<?php 
				while(have_posts() ): the_post();
					the_content();
				endwhile;
			?>
		</div>
	</div> <!-- .row -->
	
	<?php
		$work_category = get_category_by_slug('work');
		$args = array( 	'numberposts' => -1,
						'category' => (int)$work_category->term_id,
						'orderby' => 'menu_order',
						'order' => 'ASC'
 					);
		$posts = get_posts($args); 
	?>

	<div class="row project-thumbnails">
		<div class="span10 offset1">
			<h2>work</h2>
			<div class="thumb-container">
			<?php foreach($posts as $post) : setup_postdata($post); ?>
				<?php  $img_data  = theme_featured_image_src('thumbnail'); ?>
					<div class="project-thumbnail">
						<a href="<?php the_permalink(); ?>">
						
						<img src="<?php echo $img_data[0]; ?>" />
						</a>
					</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	
	<div class="row" id="project-listing">
		<div class="span10 offset1">
			<?php foreach($posts as $post) : 
				setup_postdata($post);
				$images = get_children( array( 
					'post_parent' => $post->ID, 
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'orderby' => 'menu_order', 
					'order' => 'ASC', 
					'numberposts' => 999,
					'exclude' => get_post_thumbnail_id($post->ID) )
				);
				?>
				<div class="project" id="project-<?php echo $post->ID; ?>">
					<div class="content">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	
	<?php  /* foreach($posts as $post) : setup_postdata($post); ?>
		<div class="row" class="project-details" id="project-<?php echo $post->ID; ?>">
		<div class="span8 offset2">
			<?php the_title(); ?>
		</div>
		</div>
	<?php endforeach; */ ?>
	
</div> <!-- work container -->


<div id="news" class="container section"> <!-- news -->
	<div class="row">
		<div class="span10 offset1">
			<h2>news</h2>
				
			<?php
				$cat = get_category_by_slug('news');
				$query = new WP_Query('cat='.$cat->term_id);
				if($query->have_posts() ):
			 ?>
			<div class="news-post">
				<?php while($query->have_posts()) : $query->the_post(); ?>
					<div class="news-post">
						<h3><?php echo get_the_date(); ?><span class="delimeter">//</span></h3>
						<div class="content"><?php the_content(); ?></div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php endif ?>
		</div>
	</div>
</div> <!-- news -->

<?php
	 $us_page = get_page_by_title("us");
	$img_data = wp_get_attachment_image_src(get_post_thumbnail_id($us_page->ID), 'full', false);
?>
<div id="us" class="" style="background-image: url('<?php echo $img_data[0]; ?>');">
	<div class="container section">
		<div class="row">
			<div class="span10 offset1">
				<h2><?php echo apply_filters('the_title', $us_page->post_title); ?></h2>
			
				<div class="content"><?php echo apply_filters('the_content', $us_page->post_content); ?></div>
			</div>
		</div>
	</div>
</div>

<?php
	$contact_page = get_page_by_title("contact");
?>
<div class="container section" id="contact">
	<div class="row">
		<div class="span10 offset1">
			<h2><?php echo apply_filters('the_title', $contact_page->post_title); ?></h2>
			<div class="content"><?php echo apply_filters('the_content', $contact_page->post_content); ?></div>
		</div>
	</div>
</div>
	

<?php 
	get_footer(); 
?>

