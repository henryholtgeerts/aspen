<?php

Kirki::add_section( 'typography_menus', array(
    'title'          => esc_html__( 'Menus', 'aspen' ),
    'description'    => esc_html__( 'My section description.', 'kirki' ),
    'panel'          => 'aspen_typography',
    'priority'       => 40,
) );

Kirki::add_field( 'aspen_theme', [
	'type'        => 'typography',
	'settings'    => 'menus_typography',
	'label'       => esc_html__( 'Menu style', 'aspen' ),
	'section'     => 'typography_menus',
	'default'     => [
		'font-family'    => 'Roboto',
		'color'          => '#333333',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => ['.menu a'],
		],
	],
] );