<?php

function print_stacked_style ($args) {
    if ($args['bg_row'] !== 0) {
        $super_nav_row = 'min-content';
    } else {
        $super_nav_row = '';
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
            display: inline-grid;
            grid-template-columns: ' . $args['edge'] . ' ' . $args['content'] . ' ' . $args['edge'] . ';
            grid-row: ' . $args['bg_row'] . ';
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
            grid-column: 2;
            display: flex;
            justify-content: space-between;
        }
        .branding {
            padding: 22px 16px 16px 0;
            background: ' . $args['branding_background'] . ';
            display: flex;
            flex-direction: column;
            flex: 0 1 auto;
            justify-content: center;
            align-items: flex-start;
        }
        .branding a {
            line-height: 1;
            display: block;
            width: max-content;
        }
        .branding .tagline {
            margin: 4px 0 -4px 0;
            display: inline;
        }
        .branding-bg {
            grid-column: 1;
            grid-row: ' . ( $args['bg_row'] + 1 ) . ';
            background: ' . $args['branding_background'] . ';
        }
        .header-widgets {
            display: flex;
            align-items: center;
            line-height: 1.1;
            padding: 0 16px;
            flex: 1;
            background: ' . $args['primary_nav_background'] . ';
        }
        .nav {
            display: flex;
            flex: 1 0 auto;
            flex-direction: column;
            justify-content: center;
            padding: 12px 0 16px 16px;
            background: ' . $args['primary_nav_background'] . ';
        }
        .nav-bg {
            grid-column: 3;
            grid-row: ' . ( $args['bg_row'] + 1 ) . ';
            background: ' . $args['primary_nav_background'] . ';
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