<?php

function print_centered_style ($args) {
    if ($args['bg_row'] !== 0) {
        $super_nav_row = 'min-content';
    } else {
        $super_nav_row = '';
    }

    switch ( $args['branding_spacing'] ) {
        case 'none':
            $args['branding_height'] = 'auto';
            $args['branding_margin'] = '0px';
            break;
        case 'dense':
            $args['branding_height'] = '56px';
            $args['branding_margin'] = '12px 16px';
            break;
        case 'normal':
            $args['branding_height'] = '66px';
            $args['branding_margin'] = '16px 22px';
            break;
        case 'extra':
            $args['branding_height'] = '108px';
            $args['branding_margin'] = '22px 28px';
            break;
        default:
            //Do nothing
    }

    switch ( $args['primary_nav_spacing'] ) {
        case 'dense':
            $args['nav_height'] = '56px';
            break;
        case 'normal':
            $args['nav_height'] = '66px';
            break;
        case 'extra':
            $args['nav_height'] = '108px';
            break;
        default:
            //Do nothing
    }

    echo '
    <style type="text/css">
        .grid {
            grid-template-columns: ' . $args['edge'] . ' ' . $args['content'] . ' ' . $args['edge'] . ';
            grid-template-rows: ' . $super_nav_row . ' min-content 1fr auto;
        }
        .super-nav {
            grid-column: 1 / 4;
            padding: 6px 0;
            grid-row: ' . $args['bg_row'] . ';
            display: inline-grid;
            grid-template-columns: ' . $args['edge'] . ' ' . $args['content'] . ' ' . $args['edge'] . ';
            background: ' . $args['super_nav_background'] . ';
        }
        .super-nav-container {
            grid-column: 2;
        }
        .super-nav ul {
            justify-content: ' . $args['super_nav_justification'] . ';
        }
        .super-nav-bg {
            grid-column: 1 / 4;
            grid-row: ' . $args['bg_row'] . ';
            background: ' . $args['super_nav_background'] . ';
        }
        .header {
            grid-column: 1 / 4;
            height: ' . $args['nav_height'] . ';
            display: inline-grid;
            grid-template-rows: min-content;
            grid-template-columns: ' . $args['edge'] . ' ' . $args['content'] . ' ' . $args['edge'] . ';
            background: ' . $args['primary_nav_background'] . ';
        }
        .nav {
            grid-column: 2;
            display: inline-grid;
            grid-template-columns: 1fr auto 1fr;
        }
        .branding {
            grid-column: 2;
            z-index: 2;
            display: flex;
            align-items: center;
        }
        .branding-content {
            background: ' . $args['branding_background'] . ';
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: ' . $args['branding_height'] . ';
        }
        .branding a {
            line-height: 1;
            display: inline-block;
            width: max-content;
            margin: ' . $args['branding_margin'] . ';
        }
        .branding .tagline {
            margin: 4px 0 -4px 0;
            display: inline-block;
            margin: ' . $args['branding_margin'] . ';
            margin-top: -8px;
        }
        .header-widgets {
            display: flex;
            align-items: center;
            line-height: 1.1;
            padding: 0 16px;
            grid-column: 1;
            background: ' . $args['primary_nav_background'] . ';
        }
        .primary-nav {
            grid-column: 1;
            height: ' . $args['nav_height'] . ';
            margin-right: ' . $args['branding_margin'] . ';
        }
        .secondary-nav {
            grid-column: 3;
            height: ' . $args['nav_height'] . ';
            margin-left: ' . $args['branding_margin'] . ';
        }
        .primary-nav ul {
            justify-content: ' . $args['primary_nav_justification'] . ';
        }
        .secondary-nav ul {
            justify-content: ' . $args['secondary_nav_justification'] . ';
        }
        .main {
            grid-column: 1 / 4;
        }
        .main > * {
            max-width: ' . $args['content_width'] . 'px; 
            margin-right: auto;
            margin-left: auto;
        }
        .main > .alignwide {
            max-width: 80%;
        }
        .main > .alignfull {
            max-width: 100%;
            width: 100%;
        }
        .footer {
            grid-column: 2;
        }
    </style>
    ';
}

?>