<?php 

function print_sidebar_style ($args) {

    if ($args['fit'] == 'full') {
        $columns = '0px ' . $args['sidebar_width'] . ' ' . $args['content'] . ' ' . $args['edge'];
        $args['alignfull_columns'] = '1fr';
        $args['alignfull_grid_column'] = '3 / 5';
        $args['alignwide_grid_column'] = '3 / 5';
        $args['alignfull_inner_grid_column'] = '1';
    } else {
        $columns = $args['edge'] . ' ' . $args['sidebar_width'] . ' ' . $args['content'] . ' ' . $args['edge'];
        $args['alignfull_columns'] = $columns;
        $args['alignfull_grid_column'] = '1 / 5';
        $args['alignwide_grid_column'] = '3';
        $args['alignfull_inner_grid_column'] = '3 / 4';
    }

    if ($args['square_branding'] == 1) {
        $args['branding_height'] = $args['sidebar_width'];
    } else {
        $args['branding_height'] = 'auto';
    }

    switch ( $args['branding_spacing'] ) {
        case 'none':
            $args['branding_a_margin'] = '0px';
            $args['branding_tagline_margin'] = '0px';
            break;
        case 'dense':
            $args['branding_a_margin'] = '44px 12px 3px 12px';
            $args['branding_tagline_margin'] = '3px 12px 12px 12px';
            break;
        case 'normal':
            $args['branding_a_margin'] = '56px 22px 6px 22px';
            $args['branding_tagline_margin'] = '6px 22px 22px 22px';
            break;
        case 'extra':
            $args['branding_a_margin'] = '68px 28px 8px 28px';
            $args['branding_tagline_margin'] = '8px 28px 28px 28px';
            break;
        default:
            //Do nothing
    }

    switch ( $args['primary_nav_spacing'] ) {
        case 'dense':
            $args['primary_nav_menu_margin'] = '12px 12px 6px 12px';
            $args['primary_nav_item_margin'] = '0px 0';
            break;
        case 'normal':
            $args['primary_nav_menu_margin'] = '22px 22px 11px 22px';
            $args['primary_nav_item_margin'] = '2px 0';
            break;
        case 'extra':
            $args['primary_nav_menu_margin'] = '28px 28px 14px 28px';
            $args['primary_nav_item_margin'] = '6px 0';
            break;
        default:
            //Do nothing
    }

    switch ( $args['secondary_nav_spacing'] ) {
        case 'dense':
            $args['secondary_nav_menu_margin'] = '6px 12px 12px 12px';
            $args['secondary_nav_item_margin'] = '0px 0';
            break;
        case 'normal':
            $args['secondary_nav_menu_margin'] = '11px 22px 22px 22px';
            $args['secondary_nav_item_margin'] = '2px 0';
            break;
        case 'extra':
            $args['secondary_nav_menu_margin'] = '14px 28px 28px 28px';
            $args['secondary_nav_item_margin'] = '6px 0';
            break;
        default:
            //Do nothing
    }
    
    echo '
    <style type="text/css">
        .grid { 
            grid-template-columns: ' . $columns . ';
            grid-template-rows: min-content auto auto;
        }
        .super-nav {
            grid-column: 1 / 5;
            grid-row: 1;
            display: inline-grid;
            padding: 6px 0;
            grid-template-columns: ' . $columns . ';
            background: ' . $args['super_nav_background'] . ';
        }
        .super-nav-container {
            grid-column: 3;
            padding: 0 ' . ($args['content_width'] * 0.05 ) . 'px;
        }
        .super-nav ul {
            justify-content: ' . $args['super_nav_justification'] . ';
        }
        .branding {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-end;
            padding: 0;
            width: 100%;
            height: ' . $args['branding_height'] . ';
            background: ' . $args['branding_background'] . ';
        }
        .branding a {
            line-height: 1;
            margin: ' . $args['branding_a_margin'] . ';
            display: block;
        }
        .branding p.tagline {
            margin: ' . $args['branding_tagline_margin'] . ';
           line-height: 1.2;
            display: block;
        }
        .header {
            grid-column: 2;
            grid-row: 1 / 3;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            z-index: 99;
        }
        .primary-nav .menu > ul {
            flex-direction: column;
            align-items: ' . $args['primary_nav_justification'] . ';
        }
        .secondary-nav .menu > ul {
            flex-direction: column;
            align-items: ' . $args['secondary_nav_justification'] . ';
        }
        .primary-nav .menu li, .primary-nav .menu > ul > li:last-of-type, .primary-nav .menu > ul > li:first-of-type {
            margin: ' . $args['primary_nav_item_margin'] . ';
        }
        .secondary-nav .menu li, .secondary-nav .menu > ul > li:last-of-type, .secondary-nav .menu > ul > li:first-of-type {
            margin: ' . $args['secondary_nav_item_margin'] . ';
        }
        .primary-nav a, .secondary-nav a {
            line-height: 1;
        }
        .nav {
            display: flex;
            width: 100%;
            flex-direction: column;
            background: ' . $args['primary_nav_background'] . ';
        }
        .primary-nav {
            margin: ' . $args['primary_nav_menu_margin'] . ';
        }
        .secondary-nav {
            margin: ' . $args['secondary_nav_menu_margin'] . ';
        }
        .header-widgets {
            background: ' . $args['primary_nav_background'] . ';
            margin-top: 12px;
            width: 100%;
        }
        .header-widgets > * {
            margin: 22px;
        }
        .main {
            grid-column: 1 / 5;
            grid-row: 2 / 4;
            display: grid;
            grid-template-columns: ' . $columns . ';
            grid-auto-rows: min-content;
        }
        .main > * {
            max-width: ' . $args['content_width'] . 'px;
            grid-column: 3;
            margin-left: ' . ($args['content_width'] * 0.05 ) . 'px;
            margin-right: ' . ($args['content_width'] * 0.05 ) . 'px;
            width: auto;
        }
        .main > .alignwide {
            grid-column: ' . $args['alignwide_grid_column'] . ';
            margin-left: ' . ($args['content_width'] * 0.05 ) . 'px;
            margin-right: ' . ($args['content_width'] * 0.05 ) . 'px;
            max-width: 100%;
        }
        .main > .alignfull {
            grid-column: ' . $args['alignfull_grid_column'] . ';
            margin-left: 0;
            margin-right: 0;
            max-width: 100%;
        }
        .alignfull.wp-block-cover-image .wp-block-cover__inner-container, .alignfull.wp-block-cover .wp-block-cover__inner-container {
            display: grid;
            max-width: 100%;
            width: 100%;
            grid-template-columns: ' . $args['alignfull_columns'] . ';
            grid-auto-rows: auto;					
        }
        .wp-block-cover-image .wp-block-cover__inner-container, .alignfull.wp-block-cover .wp-block-cover__inner-container > * {
            grid-column: ' . $args['alignfull_inner_grid_column'] . ';
            margin-left: ' . ($args['content_width'] * 0.05 ) . 'px;
            margin-right: ' . ($args['content_width'] * 0.05 ) . 'px;
        }
        .footer {
            padding-top: 56px;
            grid-column: 2;
            grid-row: 3;
        }
        .footer-widgets {
            flex-direction: column;
        }
    </style>
    ';
}