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
			<ul class="xoxo" id="widget-area-one">
			<?php if ( function_exists( 'get_custom_header' ) ) : ?>
				<li><ul><li><img id="logo" src="<?php header_image(); ?>" /></li></ul><li>
			<?php endif; ?>
			</ul>
			&nbsp;
		</div>
		
		<div class="span1 offset10">
			<ul class="xoxo" id="widget-area-two">
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
					$images = get_children( array( 
						'post_parent' => $post->ID, 
						'post_type' => 'attachment', 
						'post_mime_type' => 'image', 
						'orderby' => 'menu_order', 
						'order' => 'ASC', 
						'numberposts' => 999 )
					);
				endwhile;
				
				if($images) :
			?>

			<div class="carousel slide" id="slideshow">
				<div class="carousel-inner">
				<?php 
					$i = 0;
					foreach($images as $img) :
						$img_data = wp_get_attachment_image_src($img->ID, 'full', false);
				 ?>
					
					<div class="item <?php echo ($i === 0) ? ' active ' : ''; ?>">
						<img src="<?php echo $img_data[0]; ?>" />
					</div>
				<?php $i++; ?>
				<?php endforeach; ?>
				</div>
					
				<a class="carousel-control left" href="#slideshow" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#slideshow" data-slide="next">&rsaquo;</a>
					
				<div class="indicator pull-right">
					<?php for($i = 0; $i < count($images); $i++) : ?>
					<a href="#" class="<?php echo ($i === 0) ? 'active': ''; ?>"><span>/</span>\</a>
					<?php endfor; ?>	
				</div>
			</div>
			
			
		<?php endif; ?> 
		</div>
	</div> <!-- .row -->
	
	<?php
		$work_category = get_category_by_slug('work');
		$args = array( 	'numberposts' => -1,
						'category' => (int)$work_category->term_id
					);
		$posts = get_posts($args); 
	?>

	<div class="row" class="project-thumbnails">
		<div class="span10 offset1">
			<h2>work</h2>
			<div class="row">
			<?php foreach($posts as $post) : setup_postdata($post); ?>
				<?php  $img_data  = theme_featured_image_src('thumbnail'); ?>
				<div class="span2">
					<div class="project-thumbnail">
						<img src="<?php echo $img_data[0]; ?>" />
						<div class="mask"><?php the_title(); ?></div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
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
						<h3><?php the_date(); ?><span class="delimeter">//</span></h3>
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
<div id="us" class="section" style="background: url('<?php echo $img_data[0]; ?>') no-repeat center center scroll;">
	<div class="container">
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

