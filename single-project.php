<?php get_header(); ?>	
	<?php if (have_posts()) :?>
	<?php while (have_posts()) : the_post() ?>


	<figure class="project-visual parallax appear animated">
		<figcaption class="container">
			<div class="ico ico-01">
				<?php $image_ico = get_field('image_ico'); ?>
				<?php if ($image_ico): ?>
				<?php $ico = get_field('image_ico'); ?>
					<img src="<?php echo $ico['url']; ?>" alt="<?php echo $ico['alt']; ?>">
				<?php else: ?>
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ).'/images/ico-logo-01.svg'; ?>" alt="ico-image">
				<?php endif ?>				
			</div><!-- end ico -->
			<h1><?php the_title(); ?></h1>
			<p><?php the_excerpt(); ?></p>
		</figcaption><!-- end container -->
		<?php if (has_post_thumbnail()): ?>
			<?php the_post_thumbnail('camp-thumbnail'); ?>
		<?php else: ?>
			<img width="1620" src="<?php echo esc_url( get_theme_mod('makingsense_blog_img')); ?>" alt="image">
		<?php endif ?>
	</figure><!-- end project-visual -->

	<?php $info_progect = get_field('info_progect'); ?>
	<?php if ($info_progect): ?>
		<section class="stats-section appear animated">
			<div class="container">
				<div class="row">
					<?php foreach ($info_progect as $key => $value): ?>
					<div class="col-sm-4">
						<i class="ico <?php if($key == 0){echo 'ico-users';}elseif($key == 1){echo 'ico-wifi';}elseif($key == 2){echo 'ico-location';} ?>">&nbsp;</i>
						<h2><?php echo $value['value_project']; ?></h2>
						<p><?php echo $value['item_project']; ?></p>
					</div>
					<?php endforeach ?>
				</div><!-- end row -->
			</div><!-- end container -->
		</section><!-- end stats-section -->
	<?php endif ?>


	<section class="project-description container appear animated">
		<?php the_content(); ?>
	</section><!-- end project-description -->

	<?php $gallery = get_field('gallery'); ?>
	<?php if ($gallery): ?>
		<div class="gallery-section container appear animated">
			<div class="project-gallery">
				<?php foreach ($gallery as $key => $img): ?>
				<?php //print_r($img) ?>
					<div class="slide">
						<figure class="gallery-image">
							<figcaption>
								<a class="fancybox" href="<?php echo $img['url']; ?>" data-fancybox-group="group-01" title="<?php echo $img['description']; ?>">
									<div class="valign">
										<i class="ico-zoom">&nbsp;</i>
										<h2><?php echo $img['caption']; ?></h2>
									</div><!-- end valign -->
								</a>
							</figcaption>
							<img src="<?php echo $img['sizes']['project-thumbnail']; ?>" alt="<?php echo $img['alt']; ?>">
						</figure><!-- end gallery-image -->
					</div><!-- end slide -->
				<?php endforeach ?>
			</div><!-- end project-gallery -->
		</div><!-- end gallery-section -->
	<?php endif ?>

	<?php $items_project = get_field('items_project'); ?>
	<?php if ($items_project): ?>
		<?php foreach ($items_project as $key => $value): ?>	
			<section class="info-section <?php if($key%2 !== 0){echo 'image-right';} else {echo 'image-left';} ?> appear animated">
				<div class="container">
					<figure>
						<div class="img">
							<?php foreach ($value['Gallery_repeater'] as $iteration => $img): ?>
							<?php if ($iteration == 0): ?>																
								<a href="<?php echo $img['url']; ?>" class="fancybox" data-fancybox-group="group-<?php echo ($key+100) ?>" title="<?php echo $img['description']; ?>">
									<div class="offset-block">
										<i class="ico-zoom">&nbsp;</i>
										<div class="image-block">
											<img src="<?php echo $img['sizes']['cover-thumbnail']; ?>" alt="<?php echo $img['alt']; ?>">
										</div><!-- end image-block -->
									</div><!-- end offset-block -->
								</a>
							<?php else: ?>
								<a href="<?php echo $img['url']; ?>" class="fancybox hidden" data-fancybox-group="group-<?php echo ($key+100) ?>" title="<?php echo $img['description']; ?>"></a>
							<?php endif ?>
							<?php endforeach ?>
						</div><!-- end img -->
						<figcaption>
							<h2><?php echo $value['title']; ?></h2>
							<p><?php echo $value['content']; ?></p>
							<footer class="btn-row">
								<a href="<?php echo $value['link']; ?>" class="btn btn-default type2 arrow-right"><?php echo $value['button_label']; ?></a>
							</footer><!-- end btn-row -->
						</figcaption>
					</figure>
				</div><!-- end container -->
			</section><!-- end info-section -->
		<?php endforeach ?>
	<?php endif ?>


	<section class="news-area">
		<div class="container appear animated">
			<?php $intro_text_news = get_field('intro_text_news', get_option('page_on_front')); ?>
			<?php if ($intro_text_news): ?>
				<header class="news-heading">
					<?php echo $intro_text_news; ?>
				</header><!-- end news-heading -->
			<?php endif ?>
			<?php $news = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3) ); ?>
			<?php if ($news->have_posts()) : ?>
			<div class="news-carousel">
			 <?php while ($news->have_posts()) : $news->the_post(); ?>
				<div class="slide">
					<a href="<?php the_permalink(); ?>">
						<figure class="news-widget">
							<div class="img">
								<?php if (has_post_thumbnail()): ?>
									<?php the_post_thumbnail('post-thumbnails'); ?>
								<?php else: ?>
									<img width="370" src="<?php if(get_theme_mod('makingsense_blog_img')){echo esc_url( get_theme_mod('makingsense_blog_img'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/img-16.jpg';}  ?>" alt="image">
								<?php endif ?>
							</div><!-- end img -->
							<figcaption>
								<div class="block">
									<?php $cat = get_the_category(); ?>
									<span class="tag-news"><?php echo $cat[0]->name; ?></span>
									<h3><?php the_title(); ?></h3>
									<em class="date"><?php echo get_the_date('d F Y'); ?></em>
									
									<p><?php echo wp_trim_words( get_the_content() , 10 , $more = null ); ?></p>
								</div><!-- end block -->
								<span class="link-more">Continue Reading</span>
							</figcaption>
						</figure><!-- end news-widget -->
					</a>
				</div><!-- end slide -->				
			<?php endwhile; ?>
			<?php wp_reset_postdata();?>
			</div><!-- end news-carousel -->
			<?php endif;?>
			<?php $button_label_news = get_field('button_label_news', get_option('page_on_front')); ?>
			<?php $link_news = get_field('link_news', get_option('page_on_front')); ?>
			<?php if ($button_label_news && $link_news): ?>
				<footer class="btn-row">
					<a href="<?php echo $link_news; ?>" class="btn btn-success"><?php echo $button_label_news; ?></a>
				</footer><!-- end btn-row -->
				<?php endif ?>			
		</div><!-- end container -->
		<div class="particles-area">
			<div class="particles-layer" id="particles-01"></div>
			<div class="particles-layer" id="particles-02"></div>
			<div class="particles-layer" id="particles-03"></div>
			<div class="particles-layer" id="particles-04"></div>
			<div class="particles-layer" id="particles-05"></div>
			<div class="particles-layer" id="particles-06"></div>
		</div><!-- end particles-area -->
	</section><!-- end news-area -->
	<section class="join-section">
		<div class="container appear animated">
			<h2><?php echo get_field('title_contact'); ?></h2>
			<div class="row">
				<div class="col-sm-8">
					<p><?php echo get_field('content_contact'); ?></p>
				</div>
				<div class="col-sm-4">
					<a href="<?php echo get_field('link_contact'); ?>" class="btn btn-default"><?php echo get_field('button_label_contact'); ?></a>
				</div>
			</div><!-- end row -->
		</div><!-- end container -->
		<div class="particles-area">
			<div class="particles-layer" id="particles-30"></div>
			<div class="particles-layer" id="particles-31"></div>
			<div class="particles-layer" id="particles-32"></div>
			<div class="particles-layer" id="particles-33"></div>
			<div class="particles-layer" id="particles-34"></div>
			<div class="particles-layer" id="particles-35"></div>
		</div><!-- end particles-area -->
	</section><!-- end join-section -->
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