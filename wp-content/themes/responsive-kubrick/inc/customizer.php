<?php
/**
 * Responsive Kubrick Theme Customizer.
 *
 * @package Responsive Kubrick
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function glamink_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Custom Header Gradient

	$wp_customize->add_section(
		'glamink_color_section',
		array(
			'title'       => __( 'Header Gradient', 'responsive-kubrick' ),
			'priority'    => 1,
		)
	);

	$wp_customize->add_setting(
		'glamink_colortop_setting',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'refresh',
			'default' => '#69aee7',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'glamink_colortop_control',
			array(
				'label' => 'Gradient Top Color',
				'section' => 'glamink_color_section',
				'settings' => 'glamink_colortop_setting',
			)
		)
	);

	$wp_customize->add_setting(
		'glamink_colorbottom_setting',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'refresh',
			'default' => '#4180b6',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'glamink_colorbottom_control',
			array(
				'label' => 'Gradient Bottom Color',
				'section' => 'glamink_color_section',
				'settings' => 'glamink_colorbottom_setting',
			)
		)
	);
}
add_action( 'customize_register', 'glamink_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function glamink_customize_preview_js() {
	wp_enqueue_script( 'glamink_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20160308', true );
}
add_action( 'customize_preview_init', 'glamink_customize_preview_js' );