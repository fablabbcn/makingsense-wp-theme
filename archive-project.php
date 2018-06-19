<?php get_header(); ?>	
	<section class="title-section type5 appear animated">
		<div class="container">
			<span class="title">PROJECTS</span>
			<?php $page = get_page_by_path( 'projects-blank' ); ?>
			<?php echo get_field('intro_section', $page->ID ); ?>
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

	<section class="projects-area container">
	<?php
	$paged = ($_GET['paged_active']) ? $_GET['paged_active'] : 1;
	$projects  = new WP_Query( 
	array(
		'post_type' => 'project',
		'post_status' => 'publish',
		'meta_key'		=> 'activaite',
		'meta_value'	=> 'active',
		'paged' => $paged
		) 
	); ?>
	<?php if ($projects->have_posts()) : ?>	
		<ul class="projects-list" id="active">
			 <?php while ($projects->have_posts()) : $projects->the_post(); ?>
			<li class="appear animated">
				<div class="project-box">
					<a href="<?php the_permalink(); ?>">
						<div class="img-box">
							<div class="tag-box">
								<?php $place = get_field('place', get_the_ID()); ?>
								<span class="project-tag"><?php echo $place; ?></span>
							</div><!-- end tag-box -->
							<div class="ico-box">
								<?php $ico = get_field('image_ico', get_the_ID()); ?>
								<?php if ($ico): ?>
								<div class="project-ico ico-01">
									<img src="<?php echo $ico['url']; ?>" alt="<?php echo $ico['alt']; ?>">
								</div><!-- end project-ico -->								
								<?php else: ?>
								<div class="project-ico ico-05">
									<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-logo-01.svg" alt="image">
								</div><!-- end project-ico -->								
								<?php endif ?>
							</div><!-- end ico-box -->
							<div class="btn-box">
								<div class="valign">
									<!-- <a href="<?php the_permalink(); ?>" class="btn btn-info arrow-right">VIEW PROJECT</a> -->
									<span>VIEW PROJECT</span>
								</div><!-- end valign -->
							</div><!-- end btn-box -->
							<?php if (has_post_thumbnail()): ?>
								<div class="bg-image">							
									<?php the_post_thumbnail('post-thumbnails'); ?>
								</div><!-- end bg-image -->
							<?php endif ?>						
						</div><!-- end img-box -->
						<div class="description">
							<h2><?php the_title(); ?></h2>
							<?php if (has_excerpt()): ?>
								<p><?php the_excerpt(); ?></p>
							<?php else: ?>
								<p><?php echo wp_trim_words( get_the_content(), 10, $more=null ); ?></p>
							<?php endif ?>						
						</div><!-- end description -->
					</a>
				</div><!-- end project-box -->
			</li>
			<?php endwhile; ?>
			<?php wp_pagenavi(array( 'query' => $projects )); ?>
			<?php wp_reset_postdata();?>
		</ul><!-- end projects-list -->
		<?php endif; ?>	
		<?php
		$paged = ($_GET['paged_inactive']) ? $_GET['paged_inactive'] : 1;
		$projects_inactive = new WP_Query( 
		array(
			'post_type' => 'project',
			'meta_key'		=> 'activaite',
			'meta_value'	=> 'inactive',
			'paged' => $paged
			) 
		); ?>
		<?php if ($projects_inactive->have_posts()) : ?>
		<ul class="projects-list" id="inactive">

		<?php while ($projects_inactive->have_posts()) : $projects_inactive->the_post(); ?>
			<li class="appear animated">
				<div class="project-box inactive">
					<div class="img-box">
						<div class="tag-box">
							<?php $place = get_field('place', get_the_ID()); ?>
							<span class="project-tag"><?php echo $place; ?></span>
						</div><!-- end tag-box -->
						<div class="ico-box">
							<div class="project-ico ico-05">
								<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-03.png" alt="image">
							</div><!-- end project-ico -->
						</div><!-- end ico-box -->
					</div><!-- end img-box -->
					<div class="description">
						<h2><?php the_title(); ?></h2>
						<p><?php the_excerpt(); ?></p>
					</div><!-- end description -->
				</div><!-- end project-box -->
			</li>
		<?php endwhile; ?>
		<?php wp_pagenavi(array( 'query' => $projects_inactive )); ?>
		<?php wp_reset_postdata();?>
		</ul><!-- end projects-list -->	
		<?php endif; ?>	
	</section><!-- end projects-area -->
	
	<?php get_template_part('parts/getinvolved'); ?>
	
	<?php get_template_part('parts/sunscribe'); ?>	
	
<?php get_footer(); ?>
