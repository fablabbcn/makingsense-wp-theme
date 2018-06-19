<?php

/*-----------------------------------------------------------------------------------*/
/*	Theme Customization Options
/*-----------------------------------------------------------------------------------*/
 
add_action( 'customize_register', 'makingsense_customize_register' );

function makingsense_customize_register($wp_customize) {

	/*-----------------------------------------------------------------------------------*/
	/*	General Settings
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->get_section('title_tagline')->title = esc_html__('General Settings', 'makingsense');
	$wp_customize->get_section('title_tagline')->priority = 10;
    

	// Logo header
    $wp_customize->add_setting( 'makingsense_img_logo', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_img_logo', array(
        'label'   => esc_html__('Image Logo Header', 'makingsense'),
        'section' => 'title_tagline',
    ) ) );
  

	/*-----------------------------------------------------------------------------------*/
	/*	Footer Settings
	/*-----------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'footer_options' , array(
	    'title'      => __( 'Footer Settings', 'makingsense' ),
	    'priority'   => 120,
	) );

	$wp_customize->get_section('footer_options')->title = esc_html__('Footer Settings', 'makingsense');  



    // Logo footer
    $wp_customize->add_setting( 'makingsense_footer_logo', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_footer_logo', array(
        'label'   => esc_html__('Image Logo Footer', 'makingsense'),
        'section' => 'footer_options',
    ) ) );


	// Copyright
    $wp_customize->add_setting( 'makingsense_copyright_text', array (
	    'default' => esc_html__('Copyright &copy; 2016 Making Sense.', 'makingsense'),
		'sanitize_callback' => 'custom_sanitize_textarea',
    ) );	

    $wp_customize->add_control('makingsense_copyright_text', array(
	    'label'    => esc_html__('Copyright Text', 'makingsense'),
	    'section'  => 'footer_options',
	    'type'     => 'textarea',
	) );

	// Footer Logo Text
    $wp_customize->add_setting( 'footer_logo_text', array (
	    'default' => esc_html__('Making Sense Advances and experiments in participatory sensing', 'makingsense'),
		'sanitize_callback' => 'custom_sanitize_textarea',
    ) );	

    $wp_customize->add_control('footer_logo_text', array(
	    'label'    => esc_html__('Footer Logo Text', 'makingsense'),
	    'section'  => 'footer_options',
	    'type'     => 'textarea',
	) );

	// Footer Additional Text section 1
    $wp_customize->add_setting( 'footer_additional_text_1', array (
	    'default' => esc_html__('This project has been co-funded by the European Commision within the Call H2020 ICT2015 Research and Innovation action.', 'makingsense'),
		'sanitize_callback' => 'custom_sanitize_textarea',
    ) );	

    $wp_customize->add_control('footer_additional_text_1', array(
	    'label'    => esc_html__('Footer Additional Text section 1', 'makingsense'),
	    'section'  => 'footer_options',
	    'type'     => 'textarea',
	) );

	// Footer Additional Text section 2
    $wp_customize->add_setting( 'footer_additional_text_2', array (
	    'default' => esc_html__('The grant agreement number is 688620.', 'makingsense'),
		'sanitize_callback' => 'custom_sanitize_textarea',
    ) );	

    $wp_customize->add_control('footer_additional_text_2', array(
	    'label'    => esc_html__('Footer Additional Text section 2', 'makingsense'),
	    'section'  => 'footer_options',
	    'type'     => 'textarea',
	) );

	/*-----------------------------------------------------------------------------------*/
	/*	Social Networks
	/*-----------------------------------------------------------------------------------*/
	

    $wp_customize->add_section( 'makingsense_social_networks', array(
	    'title'          => esc_html__( 'Social Networks', 'makingsense' ),
	    'priority'       => 50,
	) );

	// Mail label
    $wp_customize->add_setting( 'makingsense_mail_profile_label', array (
    	'default' => esc_html__('info@making-sense.eu', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_mail_profile_label', array(
	    'label'    => esc_html__('Label for Email:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	) );

	// Mail 
    $wp_customize->add_setting( 'makingsense_mail_profile', array (
    	'default' => esc_html__('info@making-sense.eu', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_mail_profile', array(
	    'label'    => esc_html__('Email:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	) );

	// Twitter label
    $wp_customize->add_setting( 'makingsense_twitter_profile_label', array (
    	'default' => esc_html__('#MakingSenseEU', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_twitter_profile_label', array(
	    'label'    => esc_html__('Label for Twitter:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	) );

	// Twitter
    $wp_customize->add_setting( 'makingsense_twitter_profile', array (
    	'default' => esc_html__('https://twitter.com/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_twitter_profile', array(
	    'label'    => esc_html__('Twitter Link:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	    'type'     => 'url',
	) );

	// Facebook label
    $wp_customize->add_setting( 'makingsense_facebook_profile_label', array (
    	'default' => esc_html__('facebook.com/MakingSenseEU', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_facebook_profile_label', array(
	    'label'    => esc_html__('Label for Facebook:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	) );

	// Facebook
    $wp_customize->add_setting( 'makingsense_facebook_profile', array (
    	'default' => esc_html__('https://facebook.com/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_facebook_profile', array(
	    'label'    => esc_html__('Facebook Link:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	    'type'     => 'url',
	) );


	// slideshare label
    $wp_customize->add_setting( 'makingsense_slideshare_profile_label', array (
    	'default' => esc_html__('slideshare.net/MakingSenseEU', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_slideshare_profile_label', array(
	    'label'    => esc_html__('Label for Slideshare:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	) );

	// slideshare
    $wp_customize->add_setting( 'makingsense_slideshare_profile', array (
    	'default' => esc_html__('https://slideshare.net/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_slideshare_profile', array(
	    'label'    => esc_html__('Slideshare Link:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	    'type'     => 'url',
	) );


	// github label 1
    $wp_customize->add_setting( 'makingsense_github_profile_label', array (
    	'default' => esc_html__('github.com/fablabbcn', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_github_profile_label', array(
	    'label'    => esc_html__('Label for Github 1:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	    'type'     => 'url',
	) );

	// github 1
    $wp_customize->add_setting( 'makingsense_github_profile', array (
    	'default' => esc_html__('https://github.com/fablabbcn', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_github_profile', array(
	    'label'    => esc_html__('Github Link 1:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	    'type'     => 'url',
	) );

	// github label 2
    $wp_customize->add_setting( 'makingsense_github_profile_label_2', array (
    	'default' => esc_html__('github.com/waagsociety', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_github_profile_label_2', array(
	    'label'    => esc_html__('Label for Github 2:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	    'type'     => 'url',
	) );

	// github 2
    $wp_customize->add_setting( 'makingsense_github_profile_2', array (
    	'default' => esc_html__('https://github.com/waagsociety', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_github_profile_2', array(
	    'label'    => esc_html__('Github Link 2:', 'makingsense'),
	    'section'  => 'makingsense_social_networks',
	    'type'     => 'url',
	) );


	/*-----------------------------------------------------------------------------------*/
	/*	Partners
	/*-----------------------------------------------------------------------------------*/
	

    $wp_customize->add_section( 'makingsense_partners', array(
	    'title'          => esc_html__( 'Partners', 'makingsense' ),
	    'priority'       => 51,
	) );

	// Label partners
    $wp_customize->add_setting( 'makingsense_partners_link_1', array (
    	'default' => esc_html__('http://example.com/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_partners_link_1', array(
	    'label'    => esc_html__('Link for partners 1:', 'makingsense'),
	    'section'  => 'makingsense_partners',
	    'type'     => 'url',
	) );

	 // Image partners
    $wp_customize->add_setting( 'makingsense_partners_img_1', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_partners_img_1', array(
        'label'   => esc_html__('Image for partners 1:', 'makingsense'),
        'section' => 'makingsense_partners',
    ) ) );

    // Label partners
    $wp_customize->add_setting( 'makingsense_partners_link_2', array (
    	'default' => esc_html__('http://example.com/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_partners_link_2', array(
	    'label'    => esc_html__('Link for partners 2:', 'makingsense'),
	    'section'  => 'makingsense_partners',
	    'type'     => 'url',
	) );

	 // Image partners
    $wp_customize->add_setting( 'makingsense_partners_img_2', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_partners_img_2', array(
        'label'   => esc_html__('Image for partners 2:', 'makingsense'),
        'section' => 'makingsense_partners',
    ) ) );

    // Label partners
    $wp_customize->add_setting( 'makingsense_partners_link_3', array (
    	'default' => esc_html__('http://example.com/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_partners_link_3', array(
	    'label'    => esc_html__('Link for partners 3:', 'makingsense'),
	    'section'  => 'makingsense_partners',
	    'type'     => 'url',
	) );

	 // Image partners
    $wp_customize->add_setting( 'makingsense_partners_img_3', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_partners_img_3', array(
        'label'   => esc_html__('Image for partners 3:', 'makingsense'),
        'section' => 'makingsense_partners',
    ) ) );

    // Label partners
    $wp_customize->add_setting( 'makingsense_partners_link_4', array (
    	'default' => esc_html__('http://example.com/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_partners_link_4', array(
	    'label'    => esc_html__('Link for partners 4:', 'makingsense'),
	    'section'  => 'makingsense_partners',
	    'type'     => 'url',
	) );

	 // Image partners
    $wp_customize->add_setting( 'makingsense_partners_img_4', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_partners_img_4', array(
        'label'   => esc_html__('Image for partners 4:', 'makingsense'),
        'section' => 'makingsense_partners',
    ) ) );

      // Label partners
    $wp_customize->add_setting( 'makingsense_partners_link_5', array (
    	'default' => esc_html__('http://example.com/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_partners_link_5', array(
	    'label'    => esc_html__('Link for partners 5:', 'makingsense'),
	    'section'  => 'makingsense_partners',
	    'type'     => 'url',
	) );

	 // Image partners
    $wp_customize->add_setting( 'makingsense_partners_img_5', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_partners_img_5', array(
        'label'   => esc_html__('Image for partners 5:', 'makingsense'),
        'section' => 'makingsense_partners',
    ) ) );

      // Label partners
    $wp_customize->add_setting( 'makingsense_partners_link_6', array (
    	'default' => esc_html__('http://example.com/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_partners_link_6', array(
	    'label'    => esc_html__('Link for partners 6:', 'makingsense'),
	    'section'  => 'makingsense_partners',
	    'type'     => 'url',
	) );

	 // Image partners
    $wp_customize->add_setting( 'makingsense_partners_img_6', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_partners_img_6', array(
        'label'   => esc_html__('Image for partners 6:', 'makingsense'),
        'section' => 'makingsense_partners',
    ) ) );
    
    
    
      // Label partners
    $wp_customize->add_setting( 'makingsense_partners_link_7', array (
    	'default' => esc_html__('http://example.com/', 'makingsense'),
		'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('makingsense_partners_link_7', array(
	    'label'    => esc_html__('Link for partners 7:', 'makingsense'),
	    'section'  => 'makingsense_partners',
	    'type'     => 'url',
	) );

	 // Image partners
    $wp_customize->add_setting( 'makingsense_partners_img_7', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_partners_img_7', array(
        'label'   => esc_html__('Image for partners 7:', 'makingsense'),
        'section' => 'makingsense_partners',
    ) ) );

    /*-----------------------------------------------------------------------------------*/
	/*	Blog
	/*-----------------------------------------------------------------------------------*/
	

    $wp_customize->add_section( 'makingsense_blog', array(
	    'title'          => esc_html__( 'Blog', 'makingsense' ),
	    'priority'       => 52,
	) );

	 // Default image
    $wp_customize->add_setting( 'makingsense_blog_img', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'makingsense_blog_img', array(
        'label'   => esc_html__('Default image for posts (size image 370*267 for best result):', 'makingsense'),
        'section' => 'makingsense_blog',
    ) ) );

    

	/*-----------------------------------------------------------------------------------*/
	/*	Twitter Api
	/*-----------------------------------------------------------------------------------*/
	

    $wp_customize->add_section( 'makingsense_twitter', array(
	    'title'          => esc_html__( 'Twitter Api', 'makingsense' ),
	    'priority'       => 53,
	) );

	  // Twitter api key
    $wp_customize->add_setting( 'makingsense_twitter_api_key', array (
    	'default' => esc_html__('', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_twitter_api_key', array(
	    'label'    => esc_html__('Consumer Key (API Key):', 'makingsense'),
	    'section'  => 'makingsense_twitter',
	) );

	  // Twitter api secret key
    $wp_customize->add_setting( 'makingsense_twitter_api_key_s', array (
    	'default' => esc_html__('', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_twitter_api_key_s', array(
	    'label'    => esc_html__('Consumer Secret (API Secret):', 'makingsense'),
	    'section'  => 'makingsense_twitter',
	) );

	  // Twitter user id
    $wp_customize->add_setting( 'makingsense_twitter_user', array (
    	'default' => esc_html__('', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_twitter_user', array(
	    'label'    => esc_html__('Twitter Owner ID:', 'makingsense'),
	    'section'  => 'makingsense_twitter',
	) );

	/*-----------------------------------------------------------------------------------*/
	/*	Google Map Api
	/*-----------------------------------------------------------------------------------*/
	

    $wp_customize->add_section( 'makingsense_map', array(
	    'title'          => esc_html__( 'Google Map Api', 'makingsense' ),
	    'priority'       => 54,
	) );

	  // Google map api key
    $wp_customize->add_setting( 'makingsense_google_api_key', array (
    	'default' => esc_html__('', 'makingsense'),
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('makingsense_google_api_key', array(
	    'label'    => esc_html__('Google Map API Key:', 'makingsense'),
	    'section'  => 'makingsense_map',
	) );

	


} 


/*-----------------------------------------------------------------------------------*/
/*	Custom Sanitization Function(s)
/*-----------------------------------------------------------------------------------*/

function custom_sanitize_textarea( $input ) {
      return wp_kses_post( force_balance_tags( $input ) );
}