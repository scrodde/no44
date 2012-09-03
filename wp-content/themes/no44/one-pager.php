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
		
		<div class="span8">
			
			<?php 
				$page = get_page_by_title("Frontpage");

				$images = get_posts(array(
				    'post_type'      => 'attachment',
				    'post_mime_type' => 'image',
				    'numberposts'    => 3,
				    'post_status'    => null,
					'post_parent' 	 => 0,
				    'orderby'        => 'rand',
				  ));

				if($images) :
			?>
			<div class="section" id="intro">

				<div class="carousel slide" id="slideshow">
					<div class="carousel-inner">
					<?php 
						$i = 0;
						foreach($images as $img) :
							$img_data = wp_get_attachment_image_src($img->ID, 'full', false);
					 ?>
					
						<div class="item <?php echo ($i === 0) ? ' active ' : ''; ?>">
							<img src="<?php echo $img_data[0] ?>" />
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
			
			</div>
			
			<?php endif; ?> <!-- end intro -->
			
			<?php
				
				$work_category = get_category_by_slug('work');
				$args = array( 	'numberposts' => 10,
								'category' => (int)$work_category->term_id
							);
				$posts = get_posts($args);
			?>
			<div id="work" class="section"> <!-- work -->
				<h2>work</h2>
				
				<div class="thumbnails">
				<?php foreach($posts as $post) : setup_postdata($post); ?>
					<div class="project-thumbnail view view-first">
						<?php $img_data = theme_featured_image_src('full'); ?>
						<img src="<?php echo $img_data[0]; ?>"/>
						<div class="mask">  
							<h2><?php the_title(); ?></h2>  
						    <p><?php the_excerpt(); ?></p>  
						     <a href="#" class="info">Read More</a>  
						 </div>  
					</div>
				<?php endforeach; ?>
				</div>
				
				<div id="project-list">
					<?php foreach($posts as $post) : setup_postdata($post);
						$images = get_posts(array(
						    'post_type'      => 'attachment',
						    'post_mime_type' => 'image',
						    'numberposts'    => 3,
						    'post_status'    => null,
							'post_parent' 	 => 0,
						    'orderby'        => 'rand',
						  ));
					?>
					<div class="project">
						<div class="carousel slide" id="carousel-<?php echo $post->ID; ?>">
							<div class="carousel-inner">
							<?php 
								$i = 0;
								foreach($images as $img) :
									$img_data = wp_get_attachment_image_src($img->ID, 'full', false);
							 ?>
					
								<div class="item <?php echo ($i === 0) ? ' active ' : ''; ?>">
									<img src="<?php echo $img_data[0] ?>" />
								</div>
							<?php $i++; ?>
							<?php endforeach; ?>
							</div>
					
							<a class="carousel-control left" href="#carousel-<?php echo $post->ID; ?>" data-slide="prev">&lsaquo;</a>
							<a class="carousel-control right" href="#carousel-<?php echo $post->ID; ?>" data-slide="next">&rsaquo;</a>
					
							<div class="indicator pull-right">
								<?php for($i = 0; $i < count($images); $i++) : ?>
								<a href="#" class="<?php echo ($i === 0) ? 'active': ''; ?>"><span>/</span>\</a>
								<?php endfor; ?>	
							</div>
						</div>
						
						<div class="content">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
						</div>

					</div>
					<?php endforeach; ?>
				</div>
				
			</div> <!-- work -->
			
			<div id="news" class="section"> <!-- news -->
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
			</div> <!-- news -->
			
			
			<div id="contact" class="section">
				<h2>contact</h2>
				<?php $page = get_page_by_title("contact"); ?>
				<?php if($page) { echo apply_filters('the_content', $page->post_content); } ?>
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

