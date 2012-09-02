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
			
			<div id="work" class="section">
				<h2>work</h2>
				<div class="thumbnails">
				<?php for($i = 0; $i < 7; $i++) : ?>
					<div class="project-thumbnail">
						<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/tmp/logo.png"/>
						<p class="title">Tetra</p>
						<p class="description">Lorem</p>
					</div>
				<?php endfor; ?>
				</div>
				
				<div id="project-list">
					<div class="project">
						<div class="carousel" >
							<div class="carousel-inner">
								<?php for($i = 1; $i <= 3; $i++) : ?>
									<div class="<?php echo ($i === 1) ? ' active ' : ''; ?> item ">
										<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/tmp/<?php echo $i ?>.jpg" />
										<p class="title">NOSTE X</p>
										<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
				</div>
				
			</div>
			
			<div id="news" class="section">
				<h2>news</h2>
				
				<div class="news-post">
					<h3>2.9.2012 <span class="delimeter">//</span></h3>
					<div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
				</div>
				
				<div class="news-post">
					<h3>12.8.2012 <span class="delimeter">//</span></h3>
					<div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
				</div>
				
				<div class="news-post">
					<h3>7.8.2012 <span class="delimeter">//</span></h3>
					<div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
				</div>
				
				
				<div class="news-post">
					<h3>28.7.2012 <span class="delimeter">//</span></h3>
					<div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
				</div>
				
			</div>
			
			<div id="us" class="section">
				<h2>us</h2>
				<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/tmp/Us1.jpg"/>

			</div>
			
			<div id="contact" class="section">
				<h2>contact</h2>
				<h3>Lauri Hiilinen</h3>
				<p>+358 XXXXXXX<p>
				<p>lauri at no44.fi</p>
				<h3>Thomas Tallqvist</h3>
				<p>+358 XXXXXXX<p>
				<p>thomas at no44.fi</p>
			</div>
			
			<?php for($i = 0; $i < 1000; $i++) : ?>
			<?php endfor; ?>
		</div>
		
		<div class="span2">
			<div id="side-two">
			<?php //dynamic_sidebar(' '); ?>
			<ul class="xoxo" >
				<li>
					<ul class="nav">
						<li><a href="#work">work</a></li>
						<li><a href="#news">news</a></li>
						<li><a href="#us">us</a></li>
						<li><a href="#contact">contact</a></li>
					</ul>
				</li>
			</ul>
			</div>
			&nbsp;
		</div>
	</div>	
</div> <!-- #main -->

<?php
	get_footer();
?>

