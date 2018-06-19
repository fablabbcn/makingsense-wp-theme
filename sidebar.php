<?php if (is_active_sidebar('default-sidebar')) : ?>
<div class="col-sm-4">
	<div class="posts-filter appear animated">
	<?php dynamic_sidebar('default-sidebar'); ?>	
	</div>
</div>
<?php endif; ?>