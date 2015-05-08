<?php

/*
 * This file is part of the hyyan/brunch-wordpress-theme package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!defined('ABSPATH')) {
    exit('restricted access');
}

require_once __DIR__ . '/vendor/wp_bootstrap_navwalker.php';

add_action('init', 'brunch_setup');

/** Setup theme */
function brunch_setup()
{

    // Make theme available for translation
    load_theme_textdomain(BRUNCH_TEXTDOMAIN, get_template_directory() . '/languages');

    // This theme styles the visual editor to resemble the theme style.
    is_rtl() ? add_editor_style(array('public/css/editor-rtl.css')) :
                    add_editor_style(array('public/css/editor.css'));

    require_once (locate_template('inc/menus.php'));
    require_once (locate_template('inc/sidebars.php'));

    // theme support
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('post-formats', array(''));
    add_theme_support('post-thumbnails', array('post', 'page'));
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    add_theme_support(
            'brunch_jquery_cdn'
            , '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'
    );

    // post types support
    add_post_type_support('page', 'excerpt');

    // enable shortcodes in text widget
    add_filter('widget_text', 'do_shortcode');
}
