<?php 

require_once get_stylesheet_directory() . '/includes/conditional/header/stacked-header.php';
require_once get_stylesheet_directory() . '/includes/conditional/header/centered-header.php';
require_once get_stylesheet_directory() . '/includes/conditional/header/sidebar-header.php';

function aspen_header () {
    $args = [
        'layout' => get_theme_mod( 'layout_type', '' ),
        'content_width' => get_theme_mod( 'content_width', ''),
        'sidebar_width' => get_theme_mod( 'sidebar_width', ''),
        'fit' => get_theme_mod( 'layout_fit', '' ),
        'branding_background' => get_theme_mod( 'branding_background', ''),
        'super_nav_background' => get_theme_mod( 'super_nav_background', ''),
        'super_nav_justification' => get_theme_mod( 'super_nav_justification', ''),
        'primary_nav_background' => get_theme_mod( 'primary_nav_background', ''),
        'primary_nav_justification' => get_theme_mod( 'primary_nav_justification', ''),
        'secondary_nav_justification' => get_theme_mod( 'secondary_nav_justification', ''),
        'bg_row' => 0,
    ]; 
    
    switch ($args['layout']) {
        case 'stacked': 
            print_stacked_header($args);
            break;
        case 'centered': 
            print_centered_header($args);
            break;
        case 'sidebar':
            print_sidebar_header($args);
            break;
        default:
            // Do nothing
    }

}

?>