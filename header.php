<!DOCTYPE html>
<html <?php language_attributes();?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    <?php if (get_theme_mod('makingsense_img_logo')): ?>
    	<style type="text/css">
			#header .logo{
				background: url(<?php echo esc_url( get_theme_mod('makingsense_img_logo')); ?>) no-repeat;
			}
    	</style>
    <?php endif ?>
    <?php if (get_theme_mod('makingsense_footer_logo')): ?>
    	<style type="text/css">
			#footer .logo-footer{
				background: url(<?php echo esc_url( get_theme_mod('makingsense_footer_logo')); ?>) no-repeat;
			}
    	</style>
    <?php endif ?>
</head>
<body <?php body_class(); ?>>
<div id="la-anim-1" class="la-anim-1"></div>
	<div class="page-area">
		<div id="wrapper">
			<header id="header" <?php if(is_singular('post') || is_home() || (is_archive() && !is_post_type_archive( 'project' ) && !is_tax('publication_categories')) || is_search() ||  is_404()){echo 'class="type3"';} elseif (is_page('contact') || is_tax('publication_categories') || is_post_type_archive( 'project' ) || is_page('projects') ) {echo 'class="type2"';} ?>>
				<div class="container">
					<strong class="logo"><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a></strong>
					<nav class="main-menu">
						<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class' => '',
						'container' =>  false,		
						'link_before' => '',
						'link_after' => '') ); ?>
						<a href="#" class="close-menu"><span class="sr-only">close menu</span></a>
					</nav><!-- end main-menu -->
					<a href="#" class="btn-menu visible-xs-block"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></a>
				</div><!-- end container -->
			</header><!-- end header -->