	<section class="join-section">
		<div class="container appear animated">
			<?php $page = get_page_by_path('projects-blank'); ?>
				<h2><?php echo get_field('title_contact', $page->ID); ?></h2>
		<div class="row">
			<div class="col-sm-8">
				<p><?php echo get_field('content_contact', $page->ID); ?></p>
			</div>
			<div class="col-sm-4">
				<a href="<?php echo get_field('link_contact', $page->ID); ?>" class="btn btn-default"><?php echo get_field('button_label_contact', $page->ID); ?></a>
			</div>
		</div><!-- end row -->
		</div><!-- end container -->
	</section><!-- end join-section -->