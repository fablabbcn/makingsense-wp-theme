<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		
		
		<div class="campaigns-area appear">
			<?php $background_image_camp = get_field('background_image_camp'); ?>
			<?php $projects = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => -1) ); ?>
			
			<div class="campaigns-slideshow campaigns-slideshow-new animated">
				<div class="slide slide-first">
				 	<figure class="home-banner">
				 	<figcaption class="container">
						<div class="v-middle">
							<?php echo get_field('content_intro'); ?>
							<a href="<?php echo get_field('link_intro'); ?>" class="btn btn-default"><?php echo get_field('label_button'); ?></a>
						</div><!-- end valign -->
					</figcaption><!-- end container -->
				 	</figure>
			 	</div>
			  <?php if ($projects->have_posts()) : ?>
			 <?php while ($projects->have_posts()) : $projects->the_post(); ?>
				<div class="slide">
					<?php /* <img src="<?php echo $background_image_camp['sizes']['camp-thumbnail']; ?>" alt="image"> */ ?>
					<?php the_post_thumbnail('camp-thumbnail'); ?>
					<div class="container">
						<div class="v-middle v-middle-top">
						<div class="icon">
							<?php $image = get_field('image_ico'); ?>
							<?php if ($image): ?>
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></a>
							<?php else: ?>
								<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-logo-01.svg" alt="image"></a>
							<?php endif ?>
	
						</div><!-- end icon -->
						<h2><?php the_title(); ?></h2>
						<p><?php the_excerpt(); ?></p>
						</div>
					</div><!-- end container -->
				</div><!-- end slide -->
			<?php endwhile; ?>
			<?php wp_reset_postdata();?>
			</div><!-- end campaigns-slideshow -->
			<?php endif;?>
			<?php /* <img src="<?php echo $background_image_camp['sizes']['camp-thumbnail']; ?>" alt="image"> */ ?>
		</div><!-- end campaigns-area -->
		
	<?php /* OLD HOME BANNER
	
	<figure class="home-banner">
		

		<div class="image-bg visible-sm-block visible-xs-block">
			<?php if (has_post_thumbnail()): ?>
				<?php the_post_thumbnail('baner-thumbnail'); ?>
			<?php endif ?>
		</div><!-- end image-bg -->
		
		<div class="particles-area">
			<div class="particles-layer" id="particles-01"></div>
			<div class="particles-layer" id="particles-02"></div>
			<div class="particles-layer" id="particles-03"></div>
			<div class="particles-layer" id="particles-04"></div>
			<div class="particles-layer" id="particles-05"></div>
			<div class="particles-layer" id="particles-06"></div>
		</div><!-- end particles-area -->
		
		
		
		
		
	</figure><!-- end home-banner -->
	
	<?php */ ?>
	
	<div class="about-section">
		<div class="container appear animated">
			<div class="logo-ico">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-logo-01.svg" alt="image">
			</div><!-- end logo-ico -->
			<p><?php echo get_field('content_about'); ?></p>
			<a href="<?php echo get_field('link_btn_about'); ?>" class="btn btn-success"><?php echo get_field('label_button_about'); ?></a>
		</div><!-- end container -->
	</div><!-- end about-section -->
	<div class="logos-section">
		<div class="container appear animated">
			<ul class="partners-logos">
				<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_partners_link_1', esc_html__('http://example.com/', 'makingsense') ); ?>"><img src="<?php if(get_theme_mod('makingsense_partners_img_1')){echo esc_url( get_theme_mod('makingsense_partners_img_1'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/logo-waag.svg';}  ?>" alt="image" width="68" height="81"></a></li>
				<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_partners_link_2', esc_html__('http://example.com/', 'makingsense') ); ?>"><img src="<?php if(get_theme_mod('makingsense_partners_img_2')){echo esc_url( get_theme_mod('makingsense_partners_img_2'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/logo-iaac.svg';}  ?>" alt="image" width="103" height="70"></a></li>
				<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_partners_link_3', esc_html__('http://example.com/', 'makingsense') ); ?>"><img src="<?php if(get_theme_mod('makingsense_partners_img_3')){echo esc_url( get_theme_mod('makingsense_partners_img_3'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/logo-dundee.svg';}  ?>" alt="image" width="90" height="76"></a></li>
				<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_partners_link_4', esc_html__('http://example.com/', 'makingsense') ); ?>"><img src="<?php if(get_theme_mod('makingsense_partners_img_4')){echo esc_url( get_theme_mod('makingsense_partners_img_4'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/logo-pen.svg';}  ?>" alt="image" width="97" height="91"></a></li>
				<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_partners_link_5', esc_html__('http://example.com/', 'makingsense') ); ?>"><img src="<?php if(get_theme_mod('makingsense_partners_img_5')){echo esc_url( get_theme_mod('makingsense_partners_img_5'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/logo-jrc.svg';}  ?>" alt="image" width="137" height="64"></a></li>
				<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_partners_link_6', esc_html__('http://example.com/', 'makingsense') ); ?>"><img src="<?php if(get_theme_mod('makingsense_partners_img_6')){echo esc_url( get_theme_mod('makingsense_partners_img_6'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/logo-fablab.svg';}  ?>" alt="image" width="76" height="76"></a></li>
				<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_partners_link_7', esc_html__('http://example.com/', 'makingsense') ); ?>"><img src="<?php if(get_theme_mod('makingsense_partners_img_7')){echo esc_url( get_theme_mod('makingsense_partners_img_7'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/logo-desinglab.svg';}  ?>" alt="image" width="76" height="76"></a></li>
			</ul><!-- end partners-logos -->
		</div><!-- end container -->
	</div><!-- end logos-section -->
	<?php if(!is_user_logged_in()){ ?>
	<div class="campaigns-area appear">
		<?php $background_image_camp = get_field('background_image_camp'); ?>
		<?php $intro_camp = get_field('intro_camp'); ?>
		<?php if ($intro_camp): ?>
			<header class="campaigns-heading container animated">
				<div class="tbl">
					<div class="tbl-cell"><?php echo $intro_camp; ?></div>
				</div>
			</header><!-- end campaigns-heading -->
		<?php endif ?>
		<?php $projects = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => -1) ); ?>
		<?php if ($projects->have_posts()) : ?>
		<div class="campaigns-slideshow animated">
		 <?php while ($projects->have_posts()) : $projects->the_post(); ?>
			<div class="slide">
				<!-- <img src="<?php echo $background_image_camp['sizes']['camp-thumbnail']; ?>" alt="image"> -->
				<?php the_post_thumbnail('camp-thumbnail'); ?>
				<div class="container">
					<div class="icon">
						<?php $image = get_field('image_ico'); ?>
						<?php if ($image): ?>
							<a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></a>
						<?php else: ?>
							<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-logo-01.svg" alt="image"></a>
						<?php endif ?>

					</div><!-- end icon -->
					<h2><?php the_title(); ?></h2>
					<p><?php the_excerpt(); ?></p>
				</div><!-- end container -->
			</div><!-- end slide -->
		<?php endwhile; ?>
		<?php wp_reset_postdata();?>
		</div><!-- end campaigns-slideshow -->
		<?php endif;?>
		<!-- <img src="<?php echo $background_image_camp['sizes']['camp-thumbnail']; ?>" alt="image"> -->
	</div><!-- end campaigns-area -->
	
	
	<?php $label_button_camp = get_field('label_button_camp'); ?>
	<?php $link_button_camp = get_field('link_button_camp'); ?>
	<?php if ($link_button_camp && $label_button_camp): ?>
		<div class="all-campaigns">
			<div class="container appear animated">
				<a href="<?php echo $link_button_camp; ?>" class="btn btn-primary arrow-right"><?php echo $label_button_camp; ?></a>
			</div><!-- end container -->
		</div><!-- end all-campaigns -->
	<?php endif ?>
	
	<?php } ?>
	
	
	<section class="news-area">
		<div class="container appear animated">
			<?php $intro_text_news = get_field('intro_text_news'); ?>
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
									<img width="370" src="<?php if(get_theme_mod('makingsense_blog_img')){echo esc_url( get_theme_mod('makingsense_blog_img'));} else {echo esc_url( get_stylesheet_directory_uri() ).'/images/img-03.jpg';}  ?>" alt="image">
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
			<?php $button_label_news = get_field('button_label_news'); ?>
			<?php $link_news = get_field('link_news'); ?>
			<?php if ($button_label_news && $link_news): ?>
				<footer class="btn-row">
					<a href="<?php echo $link_news; ?>" class="btn btn-success"><?php echo $button_label_news; ?></a>
				</footer><!-- end btn-row -->
				<?php endif ?>
		</div><!-- end container -->
	</section><!-- end news-area -->
	<?php get_template_part('parts/sunscribe'); ?>
<?php endwhile; ?>
	<?php else : ?>
	<div class="container post-area">
		<h1><?php _e( 'Not Found', 'makingsense' );?></h1>
		<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'makingsense' );?></p>
		<div class="search-404">
			<?php get_search_form(); ?>
		</div>
	</div>
<?php endif ?>

<?php get_template_part('parts/getinvolved'); ?>

<?php get_footer() ?>
