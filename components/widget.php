<?php 

/**
 * Add Magazine widget.
 */
class Magazine_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'makingsense_widget', 
			'Making Sense Widget',
			array( 'description' => 'This is siteorient widget for display category, tags and arhive in sidebar.', 'classname' => '', )
		);
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$title_2 = apply_filters( 'widget_title', $instance['title_2'] );
		$title_3 = apply_filters( 'widget_title', $instance['title_3'] );
		echo $args['before_widget'];
		if (is_month()) {
			echo '<span id="active-helper" data-year="'.get_the_time('Y').'" data-month="'.get_the_time('F').'" style="display:none"></span>';
		} elseif (is_category()) {
			echo '<span id="active-helper" data-cat="'.single_cat_title('',false).'" style="display:none"></span>';
		} elseif(is_tag()){
			echo '<span id="active-helper" data-tag="'.single_tag_title('',false).'" style="display:none"></span>';
		}
		$cats = get_categories();
		if (!empty($cats)) {
			echo '<h3>'.$title.'</h3>';
			echo '<ul class="posts-categories">';
			foreach ($cats as $key => $value) {
				if ($value->name !== 'Uncategorized') {
					echo '<li><a href="'.get_category_link($value->term_id).'">'.$value->name.'</a></li>';
				}
				
			}
			echo '</ul>';
		}
		$terms = get_terms( array(
		    'taxonomy' => 'post_tag',
		    'hide_empty' => false,
		) );
		if(!empty($terms)) {
			echo '<h3>'.$title_2.'</h3>';
			echo '<ul class="tags-list">';
		   foreach ($terms as $key => $tag) {				
				echo '<li><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a></li>';
			}
			echo '</ul>';
		}
		

		global $wpdb;
		$limit = 0;
		$year_prev = null;
		$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,	YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
		if ($months) {
			echo '<h3>'.$title_3.'</h3>';
		}
		foreach($months as $month) :
			$year_current = $month->year;
			if ($year_current != $year_prev){
				if ($year_prev != null){?>
				</ul>				
				<?php } ?>			
			<h4 class="data-year"><?php echo $month->year; ?></h4>
			<ul class="month-list">			
			<?php } ?>

			<li><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>"><span class="archive-month"><?php echo date_i18n("F", mktime(0, 0, 0, $month->month, 1, $month->year)) ?></span></a></li>
			
			<?php			
		$year_prev = $year_current;
		if(++$limit >= 18) { break; }
		endforeach;
		echo $args['after_widget'];
	}

	/**
	 * @param array $instance
	 */
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Categories';
		$title_2 = @ $instance['title_2'] ?: 'TAGS';
		$title_3 = @ $instance['title_3'] ?: 'ARCHIVE';

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title Category:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

			<label for="<?php echo $this->get_field_id( 'title_2' ); ?>"><?php _e( 'Title Tags:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title_2' ); ?>" name="<?php echo $this->get_field_name( 'title_2' ); ?>" type="text" value="<?php echo esc_attr( $title_2 ); ?>">

			<label for="<?php echo $this->get_field_id( 'title_3' ); ?>"><?php _e( 'Title Arhive:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title_3' ); ?>" name="<?php echo $this->get_field_name( 'title_3' ); ?>" type="text" value="<?php echo esc_attr( $title_3 ); ?>">

			
		</p>
		<?php 
	}

	/**
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['title_2'] = ( ! empty( $new_instance['title_2'] ) ) ? strip_tags( $new_instance['title_2'] ) : '';
		$instance['title_3'] = ( ! empty( $new_instance['title_3'] ) ) ? strip_tags( $new_instance['title_3'] ) : '';

		return $instance;
	}
} 


function register_magazine_widget() {
	register_widget( 'Magazine_Widget' );
}
add_action( 'widgets_init', 'register_magazine_widget' );
?>