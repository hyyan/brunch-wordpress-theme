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

if (!function_exists('brunch_paging_nav')) :

    /**
     * Display navigation to next/previous set of posts when applicable.
     * 
     * @since brunch 1.0
     */
    function brunch_paging_nav() {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }

        $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $query_args = array();
        $url_parts = explode('?', $pagenum_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
        $pagenum_link = trailingslashit($pagenum_link) . '%_%';

        $format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links(array(
            'base' => $pagenum_link,
            'format' => $format,
            'total' => $GLOBALS['wp_query']->max_num_pages,
            'current' => $paged,
            'mid_size' => 1,
            'add_args' => array_map('urlencode', $query_args),
            'prev_text' => __('&larr; Previous', BRUNCH_TEXTDOMAIN),
            'next_text' => __('Next &rarr;', BRUNCH_TEXTDOMAIN),
        ));

        if ($links) :
            ?>
            <nav class="navigation paging-navigation" role="navigation">
                <div class="pagination loop-pagination">
                    <?php echo $links; ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
            <?php
        endif;
    }

endif;


if (!function_exists('brunch_post_nav')) :

    /**
     * Display navigation to next/previous post when applicable.
     * 
     * @since brunch 1.0
     */
    function brunch_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);

        if (!$next && !$previous) {
            return;
        }
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <div class="nav-links">
                <?php
                if (is_attachment()) :
                    previous_post_link('%link', __('<span class="meta-nav">Published In</span>%title', BRUNCH_TEXTDOMAIN));
                else :
                    previous_post_link('%link', __('<span class="meta-nav">Previous Post</span>%title', BRUNCH_TEXTDOMAIN));
                    next_post_link('%link', __('<span class="meta-nav">Next Post</span>%title', BRUNCH_TEXTDOMAIN));
                endif;
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
        <?php
    }

endif;



if (!function_exists('brunch_posted_on')) :

    /**
     * Print HTML with meta information for the current post-date/time and author.
     *
     * @since brunch 1.0
     */
    function brunch_posted_on() {
        if (is_sticky() && is_home() && !is_paged()) {
            echo '<span class="featured-post">' . __('Sticky', BRUNCH_TEXTDOMAIN) . '</span>';
        }

        // Set up and print post meta information.
        printf(
                '   <span class="entry-date">'
                . '     <a href="%1$s" rel="bookmark">'
                . '         <time class="entry-date" datetime="%2$s">%3$s</time>'
                . '     </a>'
                . '</span> '
                . '<span class="byline">'
                . '     <span class="author vcard">'
                . '         <a class="url" href="%4$s" rel="author">%5$s</a>'
                . '     </span>'
                . '</span>'
                , esc_url(get_permalink())
                , esc_attr(get_the_date('c'))
                , esc_html(get_the_date())
                , esc_url(get_author_posts_url(get_the_author_meta('ID')))
                , get_the_author()
        );
    }


endif;