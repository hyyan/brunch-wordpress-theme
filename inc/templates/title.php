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

/**
 * Simple template to find out the best title 
 */

if (is_day()) :
    printf(__('<span>Daily Archive</span> %s', BRUNCH_TEXTDOMAIN), get_the_date());
elseif (is_month()) :
    printf(__('<span>Monthly Archive</span> %s', BRUNCH_TEXTDOMAIN), get_the_date('F Y'));
elseif (is_year()) : 
    printf(__('<span>Yearly Archive</span> %s', BRUNCH_TEXTDOMAIN), get_the_date('Y'));
elseif (is_search()) : 
    printf(__('Search Results for: %s', BRUNCH_TEXTDOMAIN), '<span>' . get_search_query() . '</span>');
elseif (is_category()) :
    echo single_cat_title();
elseif (is_tag()) :
    echo single_tag_title();
elseif (is_home()) :
    _e('Latest Posts', BRUNCH_TEXTDOMAIN);
elseif (is_author()) :
    the_author();
endif;