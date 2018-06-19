<?php get_header(); ?>	
	<?php if (have_posts()) :?>
	<?php while (have_posts()) : the_post() ?>
	<div class="post-area container">
		<article class="single-post-article">
			<header class="post-heading appear animated">
				<?php $cat = get_the_category(); ?>
				<span class="post-tag"><?php echo $cat[0]->name; ?></span>
				<h1><?php the_title(); ?></h1>
				<em class="date"><?php echo get_the_date('d F Y'); ?></em>
			</header><!-- end post-heading -->
			<div class="img appear animated">
				<?php if (has_post_thumbnail()): ?>
					<?php the_post_thumbnail('full'); ?>				
				<?php endif ?>
			</div><!-- end img -->
			<div class="block appear animated">
				<?php the_content(); ?>				
				<?php comments_template(); ?>
			</div><!-- end block -->
		</article><!-- end single-post -->
	</div><!-- end post-area -->
	<section class="news-area">
		<div class="container appear animated">
			<?php $intro_text_news = get_field('intro_text_news', get_option("page_on_front")); ?>
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
									<img src="<?php if(get_theme_mod('makingsense_blog_img')){echo esc_url( get_theme_mod('makingsense_blog_img'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/img-16.jpg';}  ?>" alt="image">
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
		</div><!-- end container -->
	</section><!-- end news-area -->
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