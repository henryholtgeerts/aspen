<?php

Kirki::add_section( 'layout_general', array(
    'title'          => esc_html__( 'General', 'aspen' ),
    'description'    => esc_html__( 'My section description.', 'kirki' ),
    'panel'          => 'aspen_layout',
    'priority'       => 40,
) );

Kirki::add_field( 'aspen_theme', [
	'type'        => 'toggle',
	'settings'    => 'fixed_header_enabled',
	'label'       => esc_html__( 'Use fixed header', 'aspen' ),
	'section'     => 'layout_general',
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( 'aspen_theme', [
	'type'        => 'toggle',
	'settings'    => 'fit_to_content_width',
	'label'       => esc_html__( 'Fit layout to content width', 'aspen' ),
	'section'     => 'layout_general',
	'default'     => '1',
	'priority'    => 10,
] );

Kirki::add_field( 'aspen_theme', [
	'type'        => 'slider',
	'settings'    => 'content_width',
	'label'       => esc_html__( 'Content Width', 'aspen' ),
	'section'     => 'layout_general',
	'default'     => 660,
	'choices'     => [
		'min'  => 400,
		'max'  => 1200,
		'step' => 10,
	],
] );
