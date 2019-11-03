<?php

$directory = get_stylesheet_directory() . '/includes/customizer/panels/typography';

Kirki::add_panel( 'aspen_typography', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Typography', 'aspen' ),
    'description' => esc_html__( 'My panel description', 'aspen' ),
) );

require_once( $directory . '/sections/section-headers.php');
require_once( $directory . '/sections/section-body.php');
require_once( $directory . '/sections/section-menus.php');
require_once( $directory . '/sections/section-links.php');