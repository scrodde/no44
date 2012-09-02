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
			
			<div class="section" id="intro">
				
			<div class="carousel" id="slideshow">
				<div class="carousel-inner">
					<?php for($i = 1; $i <= 3; $i++) : ?>
						<div class="<?php echo ($i === 1) ? ' active ' : ''; ?> item ">
							<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/tmp/<?php echo $i ?>.jpg" />
						</div>
					<?php endfor; ?>
				</div>
					
				<a class="carousel-control left" href="#slideshow" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#slideshow" data-slide="next">&rsaquo;</a>
			</div>
			
			<div class="indicator pull-right">
				<a>/\</a>
				<a>\</a>
				<a>\</a>
			</div>
			</div>
			
			<div id="work" class="section"> <!-- work -->
				<h2>work</h2>
				<div class="thumbnails">
				<?php for($i = 0; $i < 7; $i++) : ?>
					<div class="project-thumbnail view view-first">
						<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/tmp/logo.png"/>
						<div class="mask">  
							<h2>Title</h2>  
						    <p>Your Text</p>  
						     <a href="#" class="info">Read More</a>  
						 </div>  
					</div>
				<?php endfor; ?>
				</div>
				
				<div id="project-list">
	
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
			
			<div id="us" class="section"> <!-- us -->
				<h2>us</h2>
				<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/tmp/Us1.jpg"/>
			</div> <!-- us -->
			
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

