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

add_action('wp_enqueue_scripts', 'brunch_scripts', 100);

/**
 * Enqueue theme scripts
 */
function brunch_scripts() {

    $uri = get_template_directory_uri() . '/public';
    $jcdn = '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js';

    // add styles
    wp_enqueue_style('brunch_css', $uri . '/css/app.css', false, null);
    if (is_rtl())
        wp_enqueue_style('brunch_css_rtl', $uri . '/css/app-rtl.css', false, null);


    /**
     * @link https://github.com/roots/roots-sass  original idea 
     * 
     * jQuery is loaded using the same method from HTML5 Boilerplate:
     * 
     * Grab Google CDN's latest jQuery with a protocol relative URL; fallback to
     * local if offline It's kept in the header instead of footer to avoid 
     * conflicts with plugins.
     */
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', $jcdn, array(), null, false);
        add_filter('script_loader_src', 'brunch_jquery_local_fallback', 10, 2);
    }

    wp_enqueue_script('jquery');
    wp_enqueue_script('brunch_js_vendor', $uri . '/js/vendor.js', array(), null, true);
    wp_enqueue_script('brunch_js_app', $uri . '/js/app.js', array(), null, true);

    if (is_single() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
}

// http://wordpress.stackexchange.com/a/12450
add_action('wp_head', 'brunch_jquery_local_fallback');
function brunch_jquery_local_fallback($src, $handle = null) {
    static $add_jquery_fallback = false;

    if ($add_jquery_fallback) {
        $local = get_template_directory_uri() . '/public/js/jquery.js';
        echo '<script>window.jQuery || document.write(\'<script src="' . $local . '"><\/script>\')</script>' . "\n";
        $add_jquery_fallback = false;
    }

    if ($handle === 'jquery') {
        $add_jquery_fallback = true;
    }

    return $src;
}
