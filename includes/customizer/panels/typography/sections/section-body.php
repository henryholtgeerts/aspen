<?php

Kirki::add_section( 'typography_body', array(
    'title'          => esc_html__( 'Body', 'aspen' ),
    'description'    => esc_html__( 'My section description.', 'kirki' ),
    'panel'          => 'aspen_typography',
    'priority'       => 40,
) );

Kirki::add_field( 'aspen_theme', [
	'type'        => 'typography',
	'settings'    => 'body_typography',
	'label'       => esc_html__( 'Body style', 'aspen' ),
	'section'     => 'typography_body',
	'default'     => [
		'font-family'    => 'Roboto',
		'color'          => '#333333',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => ['p', 'a'],
		],
	],
] );