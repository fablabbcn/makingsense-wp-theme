<?php
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
			'id' => 'default-sidebar',
			'name' => 'Default Sidebar',
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		));
}

// Add HTML5 support
  add_theme_support( 'html5' );

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 370, 267, true ); // Normal post thumbnails
	add_image_size( 'baner-thumbnail', 1440, 901, true );
	add_image_size( 'project-thumbnail', 1440, 802, true );
	add_image_size( 'camp-thumbnail', 1604, 900, true );
	add_image_size( 'single-post-thumbnail', 868, 439, true );
	add_image_size( 'logo-contact-thumbnail', 158, 118, true );
	add_image_size( 'ico-thumbnail', 57, 57, true );
	add_image_size( 'action-thumbnail', 300, 234, true );
	add_image_size( 'info-thumbnail', 112, 74, true );
	add_image_size( 'publication-thumbnail', 262, 369, true );
	add_image_size( 'cover-thumbnail', 1632, 1224, true );
}


register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'makingsense' ),
		'toolkit' => __( 'Toolkit Navigation', 'makingsense' ),
	) );


// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode', 11 );

// Replace Standart WP Menu Classes
function change_menu_classes( $css_classes ) {
	$css_classes = str_replace( "current-menu-item", "active", $css_classes );
	$css_classes = str_replace( "current-menu-parent", "active", $css_classes );
	$css_classes = str_replace( "current_page_item", "active", $css_classes );
	return $css_classes;
}
add_filter( 'nav_menu_css_class', 'change_menu_classes' );
add_filter( 'page_css_class', 'change_menu_classes' );

// Enqueue fonts
function google_fonts() {
	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Rubik:900italic,900,700italic,700,500italic,400italic,300italic,300,400,500', array(), null );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );

// Enqueue style and js
function theme_scripts() {
	wp_enqueue_style(
		'font-awesome',
		get_stylesheet_directory_uri() . '/css/font-awesome.css'
	);
	wp_enqueue_style(
		'ss-standard',
		get_stylesheet_directory_uri() . '/css/ss-standard.css'
	);
	wp_enqueue_style(
		'ss-social',
		get_stylesheet_directory_uri() . '/css/ss-social.css'
	);
	wp_enqueue_style(
		'bootstrap',
		get_stylesheet_directory_uri() . '/css/bootstrap.min.css'
	);
	wp_enqueue_style(
		'slick',
		get_stylesheet_directory_uri() . '/css/slick.css'
	);
	wp_enqueue_style(
		'jquery.fancybox',
		get_stylesheet_directory_uri() . '/css/jquery.fancybox.css'
	);
	wp_enqueue_style(
		'styles',
		get_stylesheet_directory_uri() . '/css/styles.css?'.time()
	);
	wp_enqueue_style(
		'style',
		get_stylesheet_directory_uri() . '/style.css?'.time()
	);

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery',
		get_stylesheet_directory_uri() . '/js/jquery-1.12.4.min.js' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script(
		'bootstrap',
		get_stylesheet_directory_uri() . '/js/bootstrap.min.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'isotope',
		get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'slick',
		get_stylesheet_directory_uri() . '/js/slick.min.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'equal-height',
		get_stylesheet_directory_uri() . '/js/equal-height.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'placeholders',
		get_stylesheet_directory_uri() . '/js/placeholders.js?'.time(),
		array( 'jquery' )
	);
	
	wp_enqueue_script(
		'appear',
		get_stylesheet_directory_uri() . '/js/appear.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'validation',
		get_stylesheet_directory_uri() . '/js/jquery.validate.min.js',
		array( 'jquery' )
	);

	wp_register_script( 'particles', get_template_directory_uri() . '/js/particles.js', array( 'jquery') );
	wp_enqueue_script( 'particles' );
	wp_localize_script( 'particles', 'script_object', array(
		'home_url' => home_url(),
		'home_path' => get_stylesheet_directory_uri(),
	) );
	
	wp_enqueue_script(
		'fancybox',
		get_stylesheet_directory_uri() . '/js/jquery.fancybox.pack.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'fancybox-thumbs',
		get_stylesheet_directory_uri() . '/js/jquery.fancybox-thumbs.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'map',
		'http://maps.google.com/maps/api/js?sensor=true&key='.trim(get_theme_mod('makingsense_google_api_key')),
		array( 'jquery' )
	);
	wp_enqueue_script(
		'google-map',
		get_stylesheet_directory_uri() . '/js/google-map.js',
		array( 'jquery' )
	);
	

	wp_register_script( 'scripts', get_template_directory_uri() . '/js/scripts.js?'.time(), array( 'jquery', 'bootstrap', 'isotope', 'slick', 'equal-height', 'placeholders', 'appear', 'validation', 'particles', 'fancybox', 'fancybox-thumbs', 'map' , 'google-map') );
	wp_enqueue_script( 'scripts' );
	wp_localize_script( 'scripts', 'script_object', array(
			'home_url' => home_url(),
			'home_path' => get_stylesheet_directory_uri(),
			'ajax_url' => admin_url('admin-ajax.php'),
			'action_close_prelouder' => 'close_prelouder',
			'action_load_post' => 'load_publication_post',
			'action_count_category_post' => 'count_category_post',
			'data_session' => $_SESSION['closePrelouder']
		) );

}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

add_editor_style(get_bloginfo('template_url').'/editor.css');

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

// Add Quicktags
function custom_quicktags() {
	if ( wp_script_is( 'quicktags' ) ) {
?>
	<script type="text/javascript">
		QTags.addButton( 'special_span', 'span', '<span class="item-title">', '</span>', 'span', 'span', 20 );
		QTags.addButton( 'figure', 'figure', '<figure>', '</figure>', 'figure', 'figure', 21 );
		QTags.addButton( 'figcaption', 'figcaption', '<figcaption>', '</figcaption>', 'figcaption', 'figcaption', 22 );
		QTags.addButton( 'q', 'q', '<q>', '</q>', 'q', "Represents some phrasing content quoted from another source.Tags should be within b-quote tag", 40 );
		QTags.addButton( 'cite', 'cite', '<cite>', '</cite>', 'cite', "Contains a citation or a reference to other sources.", 41 );
		QTags.addButton( 'address', 'address', '<address>', '</address>', 'address', 'address', 200 );
		QTags.addButton( 'dl', 'dl', '<dl>', '</dl>', 'dl', "Description list, with terms and descriptions. Tags 'dt' and 'dd' should be within this tag", 250 );
		QTags.addButton( 'dt', 'dt', '<dt>', '</dt>', 'dt', 'Defines terms/names the description list', 251 );
		QTags.addButton( 'dd', 'dd', '<dd>', '</dd>', 'dd', 'Describes each term/name the description list', 252 );
		QTags.addButton( 'table', 'table', '<table>', '</table>', 'table', 'Tables are defined with this tag', 300 );
		QTags.addButton( 'th', 'th', '<th>', '</th>', 'th', 'A table row can be divided into table headings with this tag', 301 );
		QTags.addButton( 'tr', 'tr', '<tr>', '</tr>', 'tr', 'Table rows are divided into table data with this tag', 302 );
		QTags.addButton( 'td', 'td', '<td>', '</td>', 'td', 'Table rows are divided into table data with this tag', 303 );
	</script>
	<?php
	}
}
add_action( 'admin_print_footer_scripts', 'custom_quicktags' );

// Add opengraph meta tags

function doctype_opengraph( $output ) {
	return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"';
}
add_filter( 'language_attributes', 'doctype_opengraph' );

function opengraph() {
	global $post;

	if ( is_single() ) {
		if ( has_post_thumbnail( $post->ID ) ) {
			$img_src_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
			$img_src = $img_src_arr[0];
		} else {
			$img_src = get_option('default_image');
		}
		if ( $excerpt = $post->post_content ) {
			$excerpt = strip_tags( $post->post_content );
			$excerpt = str_replace( "", "'", $excerpt );
			$excerpt = wp_trim_words( $excerpt, 55, $more = null );
		} else {
			$excerpt = get_bloginfo( 'description' );
		}
?>
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>
<?php
	} else {		
		$img_src = get_option('default_image');
?>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />  
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />  
	<meta property="og:type" content="website" />  
	<meta property="og:image" content="<?php echo $img_src; ?>" />
<?php
	}
}
add_action( 'wp_head', 'opengraph', 5 );

// Start/Destroy Session
add_action('init', 'GoStartSession', 1);
add_action('wp_logout', 'GoEndSession');
add_action('wp_login', 'GoEndSession');

function GoStartSession() {	
    if(!session_id()) {
        session_start();
    }
}
function GoEndSession() {
    session_destroy ();
}

// Close prelouder after first load
function close_prelouder(){  		
  	$_SESSION['closePrelouder'] = true;  		  	
	echo $_SESSION['closePrelouder'];
	wp_die();
}
add_action ( 'wp_ajax_nopriv_close_prelouder', 'close_prelouder' );
add_action ( 'wp_ajax_close_prelouder', 'close_prelouder' );

// Load publications category posts
function load_publication_post(){  		

	$cat_name = ( $_POST['cat_name'] ) ? $_POST['cat_name'] : '';
	$offset = intval($_POST['offset']);

	if($cat_name == '-1'){
		$args = array(
			'post_type' => 'publication',
			'post_status' => 'publish',
			'offset' => $offset,
			'posts_per_page' => get_option( 'posts_per_page' ),
		);	
	} else {	
		$cat = get_term_by('name', $cat_name, 'publication_categories');
		$cat_id = $cat->term_id;

		$args = array(
			'post_type' => 'publication',
			'post_status' => 'publish',
			'offset' => $offset,
			'posts_per_page' => get_option( 'posts_per_page' ),
			'tax_query' => array(
				array(
					'taxonomy' => 'publication_categories',
					'field'    => 'term_id',
					'terms'    => array( $cat_id ),
				),
			),
		);

	}
	
	$loop = new WP_Query( $args );
	ob_start();
	if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) { $loop->the_post();

			$cats = wp_get_post_terms(get_the_ID(), 'publication_categories');
			$list_cats = '';
			if ($cats){
				foreach ($cats as $key => $cat) {
					$list_cats = $list_cats.' '.$cat->slug;
				} 
			}

			echo '<figure class="post appear animated '.$list_cats.'">';
				echo '<div class="img">';
					if (has_post_thumbnail()){
						the_post_thumbnail('publication-thumbnail');
					} else {
						if(get_theme_mod('makingsense_blog_img')){
							$src = esc_url( get_theme_mod('makingsense_blog_img'));
						} else {
							$src = esc_url( get_stylesheet_directory_uri() ).'/images/img-16.jpg';
						};
						echo '<img width="262" src="'.$src.'" alt="image">';
					}
				echo '</div>';
				echo '<figcaption>';
					echo '<em class="date">'.get_the_date('d F Y').'</em>';
					echo '<h3>'.get_the_title().'</h3>';
					echo '<p>'.get_the_content().'</p>';
					$content_additional = get_field('content_additional',get_the_ID());
					if ($content_additional){
						echo '<span class="note">'.$content_additional.'</span>';
					}	
					$file = get_field('file',get_the_ID());
					if ($file){
						echo '<footer class="btn-row">';							
							echo '<a href="'.$file['url'].'" class="btn btn-success ico-download" download >DOWNLOAD PDF</a>';
						echo '</footer>';
					}						
				echo '</figcaption>';
			echo '</figure>';						
		}
	}

	$myvariable = ob_get_clean();
    echo $myvariable;

	wp_die();
}
add_action ( 'wp_ajax_nopriv_load_publication_post', 'load_publication_post' );
add_action ( 'wp_ajax_load_publication_post', 'load_publication_post' );

// Count category post
function count_category_post(){	
	$cat_name = ( $_POST['cat_name'] ) ? $_POST['cat_name'] : '';
	if ($cat_name == '-1') {
		$args = array(
			'post_type' => 'publication',
			'post_status' => 'publish',
			'posts_per_page' => -1
		);
	} else {

		$cat = get_term_by('name', $cat_name, 'publication_categories');
		$cat_id = $cat->term_id;

		$args = array(
			'post_type' => 'publication',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'publication_categories',
					'field'    => 'term_id',
					'terms'    => array( $cat_id ),
				),
			),
		);

	}


	$posts = get_posts($args);
	$count = count($posts);
	echo $count;
	wp_die();
}
add_action ( 'wp_ajax_nopriv_count_category_post', 'count_category_post' );
add_action ( 'wp_ajax_count_category_post', 'count_category_post' );

// Add svg mime-type
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Register a custom post type

function register_post_types() {

	register_taxonomy(  
    'publication_categories',
    'publication',
	    array(  
	        'hierarchical' => true,  
	        'label' => 'Publication Categories',
	        'query_var' => true,
	        'rewrite' => array(
	            'slug' => 'publication_categories', 
	            'with_front' => false 
	        )
	    )  
	);

    $labels = array(
        'name'               => _x( 'Publication', 'post type general name', 'makingsense' ),
        'singular_name'      => _x( 'Publication', 'post type singular name', 'makingsense' ),
        'menu_name'          => _x( 'Publications', 'admin menu', 'makingsense' ),
        'name_admin_bar'     => _x( 'Publication', 'add new on admin bar', 'makingsense' ),
        'add_new'            => _x( 'Add New', 'Publication', 'makingsense' ),
        'add_new_item'       => __( 'Add New Publication', 'makingsense' ),
        'new_item'           => __( 'New Publication', 'makingsense' ),
        'edit_item'          => __( 'Edit Publication', 'makingsense' ),
        'view_item'          => __( 'View Publication', 'makingsense' ),
        'all_items'          => __( 'All Publications', 'makingsense' ),
        'search_items'       => __( 'Search Publication', 'makingsense' ),
        'parent_item_colon'  => __( 'Parent Publication:', 'makingsense' ),
        'not_found'          => __( 'No publication found.', 'makingsense' ),
        'not_found_in_trash' => __( 'No publication found in Trash.', 'makingsense' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Publication post type.', 'makingsense' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'publication' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array(
			'title', 'editor', 'thumbnail',
			),
        'taxonomies' => array( 'publication_categories'),
    );

    register_post_type( 'publication', $args );



    $labels = array(
        'name'               => _x( 'Campaign', 'post type general name', 'makingsense' ),
        'singular_name'      => _x( 'Campaign', 'post type singular name', 'makingsense' ),
        'menu_name'          => _x( 'Campaigns', 'admin menu', 'makingsense' ),
        'name_admin_bar'     => _x( 'Campaign', 'add new on admin bar', 'makingsense' ),
        'add_new'            => _x( 'Add New', 'Campaign', 'makingsense' ),
        'add_new_item'       => __( 'Add New Campaign', 'makingsense' ),
        'new_item'           => __( 'New Campaign', 'makingsense' ),
        'edit_item'          => __( 'Edit Campaign', 'makingsense' ),
        'view_item'          => __( 'View Campaign', 'makingsense' ),
        'all_items'          => __( 'All Campaigns', 'makingsense' ),
        'search_items'       => __( 'Search Campaign', 'makingsense' ),
        'parent_item_colon'  => __( 'Parent Campaign:', 'makingsense' ),
        'not_found'          => __( 'No campaigns found.', 'makingsense' ),
        'not_found_in_trash' => __( 'No campaigns found in Trash.', 'makingsense' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Project post type.', 'makingsense' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'campaigns' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array(
			'title', 'editor', 'thumbnail','excerpt',
			)
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'register_post_types' ); 


/*
Add website favicons*/

function llos_add_favicons(){ ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/images/favicon.png"/>
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon-retina.png">
    <?php }
add_action('wp_head','llos_add_favicons');



// Widgets
require_once 'components/widget.php';

// Customaizer
require_once 'options/options.php';

// Shortcode
require_once 'components/shortcodes.php';

?>
