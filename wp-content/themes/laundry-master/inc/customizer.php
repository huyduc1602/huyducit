<?php
/**
 * Laundry Master: Customizer
 *
 * @subpackage Laundry Master
 * @since 1.0
 */

use WPTRT\Customize\Section\Laundry_Master_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Laundry_Master_Button::class );

	$manager->add_section(
		new Laundry_Master_Button( $manager, 'laundry_master_pro', [
			'title'       => __( 'Laundry Master Pro', 'laundry-master' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'laundry-master' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/laundry-wordpress-theme/', 'laundry-master')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'laundry-master-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'laundry-master-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function laundry_master_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'laundry_master_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'laundry-master' ),
	    'description' => __( 'Description of what this panel does.', 'laundry-master' ),
	) );

	$wp_customize->add_section( 'laundry_master_theme_options_section', array(
    	'title'      => __( 'General Settings', 'laundry-master' ),
		'priority'   => 30,
		'panel' => 'laundry_master_panel_id'
	) );

	$wp_customize->add_setting('laundry_master_theme_options',array(
        'default' => __('Right Sidebar','laundry-master'),
        'sanitize_callback' => 'laundry_master_sanitize_choices'	        
	));
	$wp_customize->add_control('laundry_master_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','laundry-master'),
        'section' => 'laundry_master_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','laundry-master'),
            'Right Sidebar' => __('Right Sidebar','laundry-master'),
            'One Column' => __('One Column','laundry-master'),
            'Three Columns' => __('Three Columns','laundry-master'),
            'Four Columns' => __('Four Columns','laundry-master'),
            'Grid Layout' => __('Grid Layout','laundry-master')
        ),
	));

	//Topbar section
	$wp_customize->add_section( 'laundry_master_contact' , array(
    	'title'      => __( 'Contact Us', 'laundry-master' ),
		'priority'   => null,
		'panel' => 'laundry_master_panel_id'
	) );

	$wp_customize->add_setting('laundry_master_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'laundry_master_sanitize_phone_number'
	));	
	$wp_customize->add_control('laundry_master_call',array(
		'label'	=> __('Phone No.','laundry-master'),
		'section'	=> 'laundry_master_contact',
		'type'		=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'laundry_master_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'laundry-master' ),
		'priority'   => null,
		'panel' => 'laundry_master_panel_id'
	) );

	$wp_customize->add_setting('laundry_master_slider_hide_show',array(
       	'default' => false,
       	'sanitize_callback'	=> 'laundry_master_sanitize_checkbox'
	));
	$wp_customize->add_control('laundry_master_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide slider','laundry-master'),
	   	'section' => 'laundry_master_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'laundry_master_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'laundry_master_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'laundry_master_slider' . $count, array(
			'label' => __( 'Select Slide Image Page', 'laundry-master' ),
			'section' => 'laundry_master_slider_section',
			'type' => 'dropdown-pages'
		) );
	}

	// Our Expertise 
	$wp_customize->add_section('laundry_master_services_section',array(
		'title'	=> __('Services Section','laundry-master'),
		'description'=> __('This section will appear below the Slider section.','laundry-master'),
		'panel' => 'laundry_master_panel_id',
	));
	
	for ( $count = 0; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'laundry_master_services_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'laundry_master_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'laundry_master_services_page' . $count, array(
			'label'    => __( 'Select Service Page', 'laundry-master' ),
			'description' => __('Image size (255px x 300px)', 'laundry-master'),
			'section'  => 'laundry_master_services_section',
			'type'     => 'dropdown-pages'
		));
	}

	//Footer
    $wp_customize->add_section( 'laundry_master_footer', array(
    	'title'      => __( 'Footer Text', 'laundry-master' ),
		'priority'   => null,
		'panel' => 'laundry_master_panel_id'
	) );

    $wp_customize->add_setting('laundry_master_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('laundry_master_footer_copy',array(
		'label'	=> __('Footer Text','laundry-master'),
		'section'	=> 'laundry_master_footer',
		'setting'	=> 'laundry_master_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'laundry_master_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'laundry_master_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'laundry_master_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'laundry_master_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'laundry-master' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'laundry-master' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'laundry_master_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'laundry_master_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'laundry_master_customize_register' );

function laundry_master_customize_partial_blogname() {
	bloginfo( 'name' );
}

function laundry_master_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function laundry_master_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function laundry_master_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}