<?php 

require_once get_stylesheet_directory() . '/includes/conditional/styles/stacked-style.php';
require_once get_stylesheet_directory() . '/includes/conditional/styles/centered-style.php';
require_once get_stylesheet_directory() . '/includes/conditional/styles/sidebar-style.php';

function aspen_styles () {
    $args = [
        'layout' => get_theme_mod( 'layout_type', '' ),
        'content_width' => get_theme_mod( 'content_width', ''),
        'sidebar_width' => get_theme_mod( 'sidebar_width', '') . 'px',
        'fit' => get_theme_mod( 'layout_fit', '' ),
        'branding_spacing' => get_theme_mod( 'branding_spacing', ''),
        'branding_background' => get_theme_mod( 'branding_background', ''),
        'super_nav_background' => get_theme_mod( 'super_nav_background', ''),
        'super_nav_justification' => get_theme_mod( 'super_nav_justification', ''),
        'primary_nav_spacing' => get_theme_mod( 'primary_nav_spacing', ''),
        'primary_nav_background' => get_theme_mod( 'primary_nav_background', ''),
        'primary_nav_justification' => get_theme_mod( 'primary_nav_justification', ''),
        'secondary_nav_spacing' => get_theme_mod( 'secondary_nav_spacing', '' ),
        'secondary_nav_justification' => get_theme_mod( 'secondary_nav_justification', ''),
        'bg_row' => 0,
        'square_branding' => get_theme_mod('square_branding', '')
    ];

    $include_super_nav = get_theme_mod( 'include_super_nav', '');
    if ($include_super_nav == true) {
        $args['bg_row'] = 1;
    }

    switch ($args['fit']) {
        case 'narrow':
            $args['content'] = $args['content_width'] . 'px';
            $args['edge'] = '1fr';
            break;
        case 'wide':
            $args['content'] = 'minmax(' . $args['content_width'] . 'px, 1fr)';
            $args['edge'] = '8vw';
            break;
        case 'full':
            $args['content'] = '1fr';
            $args['edge'] = '5vw';
            break;
    }

    switch ($args['layout']) {
        case 'stacked': 
            print_stacked_style($args);
            break;
        case 'centered': 
            print_centered_style($args);
            break;
        case 'sidebar':
            print_sidebar_style($args);
            break;
        default:
            // Do nothing
    }

}

?>