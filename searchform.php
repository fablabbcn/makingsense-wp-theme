<?php $sq = get_search_query() ? get_search_query() : 'SEARCH'; ?>
<div class="search-form subscribe-form">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>" >
		<input type="text" class="form-control" name="s" value="" placeholder="<?php echo $sq; ?>">	
		<input type="submit" class="btn btn-success" value="SEARCH">
	</form>
</div>