	<?php 
	$twitter_api_key = trim(get_theme_mod('makingsense_twitter_api_key'));
	$twitter_api_key_s = trim(get_theme_mod('makingsense_twitter_api_key_s'));
	$twitter_api_user_id = trim(get_theme_mod('makingsense_twitter_user'));
	$key = urlencode( $twitter_api_key );
	$secret = urlencode( $twitter_api_key_s );
	$concatenated = $key . ':' . $secret;
	$encoded = base64_encode( $concatenated );
	 $args = array(
	'headers' => array(
	    'Authorization' => 'Basic ' . $encoded,
	    'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
	),
		'body' => 'grant_type=client_credentials'
	);							
	$response_twit = wp_remote_post( 'https://api.twitter.com/oauth2/token', $args );
	$body = wp_remote_retrieve_body( $response_twit );
	$body = json_decode( $body, true );
	$access_token = $body['access_token'];
	if ($access_token && $twitter_api_user_id) {
		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json?user_id='.$twitter_api_user_id.'&count=15';
		$args = array(
		    'headers' => array(
		        'Authorization' => 'Bearer ' . $access_token,
		    ),
		);
		$response = wp_remote_get( $url, $args );
		$tweets = json_decode( wp_remote_retrieve_body($response), true );
	} ?>
<?php get_header(); ?>	
	<section class="title-section type3 appear animated">
		<div class="container">
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
			<span class="title"><?php _e( 'Posts Category', 'makingsense' );?> &#8216;<?php single_cat_title(); ?>&#8217;</span>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<span class="title"><?php _e( 'Posts Tagged', 'makingsense' );?> &#8216;<?php single_tag_title(); ?>&#8217;</span>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<span class="title"><?php _e( 'Archive for', 'makingsense' );?> <?php the_time('F jS, Y'); ?></span>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<span class="title"><?php _e( 'Archive for', 'makingsense' );?> <?php the_time('F, Y'); ?></span>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<span class="title"><?php _e( 'Archive for', 'makingsense' );?> <?php the_time('Y'); ?></span>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<span class="title"><?php _e( 'Author Archive', 'makingsense' );?></span>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<span class="title"><?php _e( 'Blog Archives', 'makingsense' );?></span>
			<?php } ?>
			<?php echo get_field('content_blog', get_option('page_for_posts')); ?>
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
	<?php if (!is_wp_error( $response_twit ) && $tweets): ?>
	<div class="twitter-slideshow appear animated">
		<?php foreach ($tweets as $key => $tweet):?>
				<div class="slide">
					<div class="container">
						<i class="ico ico-twitter">&nbsp;</i>
						<p> <span class="twit-clear-hash"><?php echo $tweet['text'] ?></span>
							<?php $hash = $tweet['entities']['hashtags']; ?><br>
							<?php if ($hash): ?>
							<?php foreach ($hash as $key => $value): ?>
								<a target="_blank" href="<?php echo 'https://twitter.com/hashtag/'.$value['text'].'?src=hash'; ?>"><?php echo '#'.$value['text']; ?></a>
							<?php endforeach ?>								
							<?php endif ?>
						</p>
					</div><!-- end container -->
				</div><!-- end slide -->
		<?php endforeach ?>
	</div>
	<?php endif ?>	
	<section class="blog-area container">
		<div class="row">
			<div class="col-sm-8">
				<?php if (have_posts()) :?>
				<ul class="posts-list">
					 <?php while (have_posts()) : the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<figure class="news-widget appear animated">
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
										<em class="date"><?php echo get_the_date('d F Y'); ?></em>
										<h2><?php the_title(); ?></h2>
										<span class="tag-news"><?php echo $cat[0]->name; ?></span>
										<p><?php echo wp_trim_words( get_the_content() , 10 , $more = null ); ?></p>
									</div><!-- end block -->
									<span class="link-more">Continue Reading</span>
								</figcaption>
							</figure><!-- end news-widget -->
						</a>
					</li>
					<?php endwhile; ?>
				</ul><!-- end posts-list -->
				<?php wp_pagenavi(); ?>				
				<?php else : ?>		
					<h1><?php _e( 'Not Found', 'makingsense' );?></h1>
					<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'makingsense' );?></p>									
				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div><!-- end row -->		
	</section><!-- end blog-area -->
	<?php get_template_part('parts/sunscribe'); ?>	
<?php get_footer() ?>