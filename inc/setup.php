<?php

/*
 * This file is part of the hyyan/brunch-wordpress-theme package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!defined('ABSPATH'))
    exit('restricted access');

require_once __DIR__ . '/vendor/wp_bootstrap_navwalker.php';

add_action('after_setup_theme', 'brunch_setup');
add_action('widgets_init', 'brunch_widgets_init');

/** Setup theme */
function brunch_setup() {

    // Make theme available for translation
    load_theme_textdomain(BRUNCH_TEXTDOMAIN, get_template_directory() . '/languages');

    // This theme styles the visual editor to resemble the theme style.
    is_rtl() ? add_editor_style(array('public/css/editor-rtl.css')) :
                    add_editor_style(array('public/css/editor.css'));

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus(array(
        'primary_navigation' => __('Primary Navigation', BRUNCH_TEXTDOMAIN)
    ));

    // theme support
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array(''));
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    // post types support
    add_post_type_support('page', 'excerpt');

    // enable shortcodes in text widget
    add_filter('widget_text', 'do_shortcode');
    // smart tilte
    add_filter('wp_title', 'brunch_wp_title', 10, 2);

    // hide protected posts
    add_action('pre_get_posts', 'brunch_exclude_protected_action');
}

/**
 * Register sidebars
 */
function brunch_widgets_init() {
    register_sidebar(array(
        'name' => __('Primary', BRUNCH_TEXTDOMAIN),
        'id' => 'sidebar-primary',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer', BRUNCH_TEXTDOMAIN),
        'id' => 'sidebar-footer',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

/**
 * Filter to hide protected posts
 * 
 * @param string $where
 * 
 * @global type $wpdb
 * @return string
 */
function brunch_exclude_protected($where) {
    global $wpdb;
    return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

/**
 * Decide where to display them
 * 
 * @param WP_Query $query
 */
function brunch_exclude_protected_action($query) {
    if (!is_single() && !is_page() && !is_admin()) {
        add_filter('posts_where', 'brunch_exclude_protected');
    }
}

/**
 * Handle custom comment display 
 * 
 * @param object $comment
 * @param array $args
 * @param integer $depth
 */
function brunch_comment($comment, $args, $depth) {
    include(locate_template('inc/templates/comment.php'));
}

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * 
 * @return string The filtered title.
 */
function brunch_wp_title($title, $sep) {
    global $paged, $page;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo('name', 'display');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() )) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', BRUNCH_TEXTDOMAIN), max($paged, $page));
    }

    return $title;
}
