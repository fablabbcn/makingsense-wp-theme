<?php
/*
Template Name: Template About Us
*/
?>
<?php get_header(); ?>	
	<?php if (have_posts()) :?>
	<?php while (have_posts()) : the_post() ?>

	<section class="title-section appear animated">
		<div class="container">
			<span class="title"><?php the_title(); ?></span>
			<?php echo get_field('content_blog'); ?>
		</div><!-- end container -->
		<div class="particles-area">
			<div class="particles-layer" id="particles-01"></div>
			<div class="particles-layer" id="particles-02"></div>
			<div class="particles-layer" id="particles-03"></div>
			<div class="particles-layer" id="particles-04"></div>
			<div class="particles-layer" id="particles-05"></div>
			<div class="particles-layer" id="particles-06"></div>
		</div><!-- end particles-area -->
	</section><!-- end title-section -->

	<section class="mission-info container appear animated">
		<div class="logo-ico">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-logo-01.svg" alt="image">
		</div><!-- end logo-ico -->
		<?php echo get_field('content_about'); ?>
	</section><!-- end mission-info -->

	<section class="how-area appear animated">
		<div class="container">
			<h2><?php echo get_field('title_section'); ?></h2>
			<?php $items = get_field('items'); ?>
			<?php if ($items): ?>
			<div class="how-carousel">
				<?php foreach ($items as $key => $value): ?>
					<div class="slide">
						<div class="logo-ico">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-logo-0<?php if($key == 0){echo '2';}elseif($key == 1){echo '3';}elseif($key == 2){echo '4';}else{echo '2';} ?>.svg" alt="image">
						</div><!-- end logo-ico -->
						<div class="img">
							<img src="<?php echo $value['image_item']['sizes']['action-thumbnail']; ?>" alt="<?php echo $value['image_item']['alt']; ?>">
						</div><!-- end img -->
						<div class="block">
							<h3 <?php if($key == 0){echo 'class="color-blue"';}elseif($key == 1){echo 'class="color-orange"';}elseif($key == 2){echo 'class="color-green"';} ?>><?php echo $value['title_item']; ?></h3>
							<?php echo $value['content_item']; ?>
						</div><!-- end block -->
						<?php if ($value['link_item'] && $value['label_buttom_item']): ?>
							<a href="<?php echo $value['link_item']; ?>" class="btn <?php if($key == 0){echo 'btn-primary arrow-right';}elseif($key == 1){echo 'btn-warning';}elseif($key == 2){echo 'btn-success';} ?>"><?php echo $value['label_buttom_item']; ?></a>
						<?php endif ?>						
					</div><!-- end slide -->
				<?php endforeach ?>				
			</div><!-- end how-carousel -->
			<?php endif ?>
		</div><!-- end container -->
	</section><!-- end how-area -->

	<?php $content_info = get_field('content_info'); ?>
	<?php $image_info = get_field('image_info'); ?>
	<?php if ($image_info || $image_info): ?>	
		<div class="eu-info container appear animated">
			<?php if ($image_info): ?>	
				<div class="img">
					<img src="<?php echo $image_info['sizes']['info-thumbnail']; ?>" alt="<?php echo $image_info['alt']; ?>">
				</div><!-- end img -->
			<?php endif ?>
			<?php echo $content_info; ?>		
		</div><!-- end eu-info -->
	<?php endif ?>
	
	<?php $content_info_2 = get_field('content_info_2'); ?>
	<?php $image_info_2 = get_field('image_info_2'); ?>
	<?php if ($image_info_2 || $image_info_2): ?>	
		<div class="eu-info capssi-about container appear animated">
			<?php if ($image_info_2): ?>	
				<div class="img">
					<img src="<?php echo $image_info_2['sizes']['medium']; ?>" alt="<?php echo $image_info_2['alt']; ?>">
				</div><!-- end img -->
			<?php endif ?>
			<?php echo $content_info_2; ?>		
		</div><!-- end eu-info -->
	<?php endif ?>

	<section class="consortium-area appear animated">
		<div class="container">
			<h2><?php echo get_field('title_section_consort'); ?></h2>
			<?php $items_consort = get_field('items_consort'); ?>
			<?php if ($items_consort): ?>
				<div class="consortium-logos hidden-xs">
					<?php foreach ($items_consort as $key => $item): ?>
						<div class="logo-item">
							<a href="#"><img src="<?php echo $item['image_desktop']['sizes']['logo-contact-thumbnail']; ?>" alt="<?php echo $item['image_desktop']['alt']; ?>"></a>
						</div><!-- end logo-item -->
					<?php endforeach ?>			
				</div><!-- end consortium-logos -->
				<div class="consortium-content">
					<?php foreach ($items_consort as $key => $item): ?>
						<div class="slide">
							<div class="mobile-logo visible-xs-block">
								
							</div><!-- end mobile-logo -->
							<?php echo $item['content_item']; ?>
						</div><!-- end slide -->
					<?php endforeach ?>				
				</div><!-- end consortium-content -->
			<?php endif ?>
		</div><!-- end container -->
	</section><!-- end consortium-area -->

	<?php get_template_part('parts/sunscribe'); ?>
	
	<?php endwhile ?>	
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
