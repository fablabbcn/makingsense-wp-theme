			<footer id="footer">
				<div class="container appear animated">
					<div class="top row">
						<div class="col-sm-4">
							<strong class="logo-footer"><a href="<?php echo esc_url( home_url() ); ?>"><?php echo get_theme_mod('footer_logo_text', esc_html__('Making Sense Advances and experiments in participatory sensing', 'makingsense') ); ?></a></strong>
							<div class="txt-block hidden-xs">
								<img class="img-responsive footer-img" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-eu-flag.svg" alt="eu flag">
								<p><?php echo get_theme_mod('footer_additional_text_1', esc_html__('This project has been co-funded by the European Commision within the Call H2020 ICT2015 Research and Innovation action.', 'makingsense') ); ?></p>
								<p><?php echo get_theme_mod('footer_additional_text_2', esc_html__('The grant agreement number is 688620.', 'makingsense') ); ?></p>
								<img class="img-responsive capssi" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/capssi1.png" alt="CAPSSI">
								<p><?php echo get_theme_mod('footer_additional_text_3', esc_html__('This project is part of the call for CAPSSI Collective Awareness Platforms for Sustainable Social Innovation.', 'makingsense') ); ?></p>

							</div><!-- end txt-block -->
						</div>
						<?php $news = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3) ); ?>
						<?php if ($news->have_posts()) : ?>
						<div class="col-sm-4">
							<h4>Recent Posts</h4>
							<ul class="links">
								 <?php while ($news->have_posts()) : $news->the_post(); ?>
								 <?php $cat = get_the_category(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php if($cat[0] && $cat[0]->name !== 'Uncategorized'){ echo $cat[0]->name.':'; } ?> <?php the_title(); ?></a></li>
								<?php endwhile; ?>
								<?php wp_reset_postdata();?>
							</ul><!-- end links -->
						</div>
						<?php endif;?>
						<div class="col-sm-4">
							<ul class="footer-social">
								<li class="email"><a href="mailto:<?php echo get_theme_mod('makingsense_mail_profile', esc_html__('info@making-sense.eu', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_mail_profile_label', esc_html__('info@making-sense.eu', 'makingsense') ); ?></a></li>
								<li class="twitter"><a target="_blank" href="<?php echo get_theme_mod('makingsense_twitter_profile', esc_html__('https://twitter.com/', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_twitter_profile_label', esc_html__('#MakingSenseEU', 'makingsense') ); ?></a></li>
								<li class="facebook"><a target="_blank" href="<?php echo get_theme_mod('makingsense_facebook_profile', esc_html__('https://facebook.com/.', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_facebook_profile_label', esc_html__('facebook.com/MakingSenseEU', 'makingsense') ); ?></a></li>
								<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_slideshare_profile', esc_html__('https://slideshare.net/', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_slideshare_profile_label', esc_html__('slideshare.net/MakingSenseEU', 'makingsense') ); ?></a></li>
								<li class="github"><a target="_blank" href="<?php echo get_theme_mod('makingsense_github_profile', esc_html__('https://github.com/fablabbcn', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_github_profile_label', esc_html__('github.com/fablabbcn', 'makingsense') ); ?></a>
									<br>
									<a target="_blank" href="<?php echo get_theme_mod('makingsense_github_profile_2', esc_html__('https://github.com/waagsociety', 'makingsense') ); ?>"><?php echo get_theme_mod('makingsense_github_profile_label_2', esc_html__('github.com/waagsociety', 'makingsense') ); ?></a>
								</li>
							</ul><!-- end footer-social -->
						</div>
					</div><!-- end top -->
					<div class="bottom">
						<div class="row">
							<div class="col-sm-6">
								<p><?php echo get_theme_mod('makingsense_copyright_text', esc_html__('Copyright &copy; 2016 Making Sense.', 'makingsense') ); ?></p>
							</div>
							<div class="col-sm-6">
								<ul class="bottom-social">
									<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_twitter_profile', esc_html__('https://twitter.com/', 'makingsense') ); ?>" class="twitter">twitter</a></li>
									<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_facebook_profile', esc_html__('https://facebook.com/.', 'makingsense') ); ?>" class="facebook">facebook</a></li>
									<li><a target="_blank" href="<?php echo get_theme_mod('makingsense_github_profile', esc_html__('https://github.com/fablabbcn', 'makingsense') ); ?>" class="github">github</a></li>
								</ul><!-- end bottom-social -->
							</div>
						</div><!-- end row -->
					</div><!-- end bottom -->
				</div><!-- end container -->
			</footer><!-- end footer -->
			<?php //if ($_SESSION['closePrelouder'] != '1'): 
				if(is_front_page()):
			?>		
				<div class="loading-area">
					<div class="valign">
						<div class="loader-image">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ms-loader.gif" alt="image">
						</div><!-- end loader-image -->
					</div><!-- end valign -->
				</div><!-- end loading-area -->
			<?php endif ?>

			<?php if (is_front_page()): ?>
			<?php $link_video = get_field('link_video'); ?>
				<div class="video-bg">
					<video autoplay loop muted="muted">
						<source src="<?php echo $link_video; ?>" type="video/mp4">
					</video>
				</div><!-- end video-bg -->
			<?php endif ?>
		</div><!-- end wrapper -->
	</div><!-- end page-area -->
<?php wp_footer(); ?>
	<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/js/jquery.parallax.js"></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84658922-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>