<?php
/*
 *  Author: Henry Holtgeerts
 *  URL: henryholtgeerts.com
 *  Custom functions, support, and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

// kirki plugin
require_once get_stylesheet_directory() . '/includes/kirki/kirki.php';

// customizer settings
require_once get_stylesheet_directory() . '/includes/customizer/customizer.php';

// conditional header
require_once get_stylesheet_directory() . '/includes/conditional/header/aspen-header.php';

// conditional styles
require_once get_stylesheet_directory() . '/includes/conditional/styles/aspen-styles.php';

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add menu support
    add_theme_support('menus');

    // Add wide/full alignment support
    add_theme_support('align-wide');

    // Add thumbnail support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail

    // Add support for custom backgrounds
    add_theme_support('custom-background', array(
        'default-color' => 'FFF',
        'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('aspen', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

//Super nav
function aspen_super_nav() {
    wp_nav_menu([
		'theme_location'  => 'super-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
    ]);
}

//Primary nav
function aspen_primary_nav() {
    wp_nav_menu([
		'theme_location'  => 'primary-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
    ]);
}

//Secondary nav
function aspen_secondary_nav() {
    wp_nav_menu([
		'theme_location'  => 'secondary-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
    ]);
}

// Load Aspen scripts (header.php)
function aspen_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('pjax', get_template_directory_uri() . '/assets/js/vendor/pjax.min.js', null, '0.2.8'); // Pjax
        wp_enqueue_script('pjax'); // Enqueue it!

        wp_register_script('aspen-scripts', get_template_directory_uri() . '/assets/js/scripts.js', ['jquery', 'pjax'], '1.0.0'); // Custom scripts
        wp_enqueue_script('aspen-scripts'); // Enqueue it!

        $data = [
            'content_width' => get_theme_mod('content_width', ''),
            'layout' => get_theme_mod('layout_type', '')
        ];

        wp_localize_script( 'aspen-scripts', 'aspen_data', $data );

    }
}

// Load Aspen styles
function load_aspen_styles()
{
    wp_register_style('aspen-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('aspen-style'); // Enqueue it!
}

// Register Aspen Navigation
function register_aspen_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'primary-menu' => __('Primary Menu', 'aspen'), // Main Navigation
        'super-menu' => __('Super Menu', 'aspen'), // Main Navigation
        'secondary-menu' => __('Secondary Menu', 'aspen'), // Main Navigation
        'footer-menu' => __('Footer Menu', 'aspen') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Header Widgets', 'aspen'),
        'description' => __('Description for this widget-area...', 'aspen'),
        'id' => 'header-widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title'  => '<!-- ',
        'after_title'   => ' -->',
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Primary Menu Widgets', 'aspen'),
        'description' => __('Description for this widget-area...', 'aspen'),
        'id' => 'primary-menu-widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title'  => '<!-- ',
        'after_title'   => ' -->',
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Super Menu Widgets', 'aspen'),
        'description' => __('Description for this widget-area...', 'aspen'),
        'id' => 'super-menu-widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title'  => '<!-- ',
        'after_title'   => ' -->',
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Secondary Menu Widgets', 'aspen'),
        'description' => __('Description for this widget-area...', 'aspen'),
        'id' => 'secondary-menu-widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title'  => '<!-- ',
        'after_title'   => ' -->',
    ));
}

// Remove wp_head() injected Recent Comment styles
function aspen_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function aspen_wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function aspen_wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create the Custom Excerpts callback
function aspen_wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function aspen_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'aspen') . '</a>';
}

// Remove 'text/css' from our enqueued stylesheet
function aspen_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function aspen_gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'aspen_header_scripts'); // Add Custom Scripts to wp_head
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'load_aspen_styles'); // Add Theme Stylesheet
add_action('init', 'register_aspen_menu'); // Add Aspen Menu
add_action('widgets_init', 'aspen_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'aspen_wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'aspen_gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'aspen_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'aspen_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('show_admin_bar', '__return_false');

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

?>
