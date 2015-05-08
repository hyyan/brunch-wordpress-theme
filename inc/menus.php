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

// Register wp_nav_menu() menus
// http://codex.wordpress.org/Function_Reference/register_nav_menus
register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', BRUNCH_TEXTDOMAIN)
));
