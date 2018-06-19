<?php get_header(); ?>	
	<?php if (have_posts()) :?>

	<section class="title-section type2 appear animated">
		<div class="container">
			<span class="title">TOOLKIT</span>
			<?php $page = get_page_by_path( 'resources' ); ?>
			<?php echo get_field('content_blog',$page->ID); ?>
		</div><!-- end container -->
		<div class="particles-area">
			<div class="particles-layer" id="particles-20"></div>
			<div class="particles-layer" id="particles-21"></div>
			<div class="particles-layer" id="particles-22"></div>
			<div class="particles-layer" id="particles-23"></div>
			<div class="particles-layer" id="particles-24"></div>
			<div class="particles-layer" id="particles-25"></div>
		</div><!-- end particles-area -->
	</section><!-- end title-section -->
	<div class="posts-area container">
		<nav class="posts-nav appear animated">
			<?php $menu_name = 'toolkit';
			$locations = get_nav_menu_locations();
			if( $locations && isset($locations[$menu_name]) ){
				$menu = wp_get_nav_menu_object($locations[$menu_name]); 
				$menu_items = wp_get_nav_menu_items($menu);		
			} ?>
			<ul id="menu-toolkit-nav">
				<?php foreach ($menu_items as $key => $item): ?>
				<?php //print_r($item) ?>
				<?php $cats = get_term_by('name', $item->title, 'publication_categories');?>
					<li <?php if($item->title == 'All'){ echo 'class="active"';} ?>><a href="#1" <?php if($item->title == 'All'){ echo 'data-filter="*"';} else {echo 'data-filter=".'.$cats->slug.'"';} ?>><?php echo $item->title; ?></a></li>
				<?php endforeach ?>	
			</ul>
		</nav><!-- end posts-nav -->
		<?php $args = array(
			'post_type' => 'publication',
			'post_status' => 'publish',
			'posts_per_page' => -1
		);
		$posts = get_posts($args);
		$count = count($posts); ?>
		<div style="position: relative">
			<img class="prelouder-load-more" src="<?php echo esc_url( get_template_directory_uri()).'/images/prelouder.gif'; ?>" alt="prelouder">
		</div>		
		<div id="container_publications" data-count="<?php echo $count; ?>" data-cat="-1" data-offset="<?php echo get_option('posts_per_page');?>" data-ppp="<?php echo get_option('posts_per_page');?>">							
			
		</div>					
	</div><!-- end posts-area -->
	<?php get_template_part('parts/sunscribe'); ?>
	<?php else : ?>
	<div class="container post-area">
		<h1><?php _e( 'Not Found', 'makingsense' );?></h1>
		<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'makingsense' );?></p>
		<div class="search-404">
			<?php get_search_form(); ?>
		</div>			
	</div>		
	<?php endif; ?>	
<?php get_footer(); ?>
