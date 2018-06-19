<?php
/*
Template Name: Template Contact
*/
?>
<?php get_header(); ?>	
	<?php if (have_posts()) :?>
	<?php while (have_posts()) : the_post() ?>
	<section class="title-section type4 appear animated">
		<div class="container">
			<span class="title"><?php the_title(); ?></span>
			<?php echo get_field('content_blog'); ?>
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
	
	<section class="social-section container appear animated">
		<h2>FIND US ONLINE</h2>
		<ul class="social-boxes">
			<li><a class="email" href="mailto:<?php echo get_theme_mod('makingsense_mail_profile', esc_html__('info@making-sense.eu', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_mail_profile_label', esc_html__('info@making-sense.eu', 'makingsense') ); ?></a></li>
			<li><a class="twitter" target="_blank" href="<?php echo get_theme_mod('makingsense_twitter_profile', esc_html__('https://twitter.com/', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_twitter_profile_label', esc_html__('#MakingSenseEU', 'makingsense') ); ?></a></li>
			<li><a class="facebook" target="_blank" href="<?php echo get_theme_mod('makingsense_facebook_profile', esc_html__('https://facebook.com/.', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_facebook_profile_label', esc_html__('facebook.com/MakingSenseEU', 'makingsense') ); ?></a></li>
			<li><a class="slideshare" target="_blank" href="<?php echo get_theme_mod('makingsense_slideshare_profile', esc_html__('https://slideshare.net/', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_slideshare_profile_label', esc_html__('slideshare.net/MakingSenseEU', 'makingsense') ); ?></a></li>
			<li><a class="github" target="_blank" href="<?php echo get_theme_mod('makingsense_github_profile', esc_html__('https://github.com/fablabbcn', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_github_profile_label', esc_html__('github.com/fablabbcn', 'makingsense') ); ?></a></li>
			<li><a class="github" target="_blank" href="<?php echo get_theme_mod('makingsense_github_profile_2', esc_html__('https://github.com/waagsociety', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_github_profile_label_2', esc_html__('github.com/waagsociety', 'makingsense') ); ?></a></li>
		</ul><!-- end social-boxes -->
	</section><!-- end social-section -->

	<?php $items_contact = get_field('items_contact'); ?>
	<?php if ($items_contact): ?>
		<div class="contacts-section">
			<div class="container appear animated">
				<div class="contacts-logos">
					<?php foreach ($items_contact as $key => $item): ?>
						<div class="logo-item">
							<a href="#"><img src="<?php echo $item['logo_image_contact']['sizes']['logo-contact-thumbnail']; ?>" alt="<?php echo $item['logo_image_contact']['alt']; ?>"></a>
						</div><!-- end logo-item -->
					<?php endforeach ?>
				</div><!-- end contacts-logos -->
			</div><!-- end container -->
		</div><!-- end contacts-section -->
	<div class="contacts-slideshow appear animated">				
	<?php foreach ($items_contact as $key => $item): ?>
		<div class="slide">
			<div class="container">
				<div class="block">
					<div class="section">
						<h3><?php echo $item['name']; ?></h3>
						<h4>Address</h4>
						<p><?php echo $item['address']; ?></p>
						<h4>PHONE</h4>
						<p><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $item['phone']); ?>"><?php echo $item['phone']; ?></a></p>
					</div><!-- end section -->
					<?php if ($item['collaborators']): ?>
						<h4>COLLABORATORS</h4>
						<ul class="team">
							<?php foreach ($item['collaborators'] as $iteration => $value): ?>							
								<li>
									<div class="photo">
										<img src="<?php echo $value['photo']['sizes']['ico-thumbnail']; ?>" alt="<?php echo $value['photo']['alt']; ?>">
									</div><!-- end photo -->
									<div class="box">
										<h5><?php echo $value['name']; ?></h5>
										<p><a target="_blank" href="<?php echo $value['mail']; ?>"><?php echo $value['label_mail']; ?></a></p>
									</div><!-- end box -->
								</li>
							<?php endforeach ?>
						</ul><!-- end team -->
					<?php endif ?>
				</div><!-- end block -->
				<div class="map-block">
					<div class="offset-block">
						<div class="map" data-coords="<?php echo $item['location_lng'] ?>, <?php echo $item['location_lat'] ?>" id="map-<?php echo $key; ?>"></div>
					</div><!-- end offset-block -->
				</div><!-- end map-block -->
			</div><!-- end container -->
		</div><!-- end slide -->
	<?php endforeach ?>
	</div><!-- end contacts-slideshow -->
	<?php endif ?>

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
	
	<?php get_template_part('parts/getinvolved'); ?>
	
<?php get_footer(); ?>
