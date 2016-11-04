<?php
/*
 * This file is part of the hyyan/brunch-wordpress-theme package.
 * (c) Hyyan Abo Fakher <hyyanaf@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!defined('ABSPATH')) {
    exit('restricted access');
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <?php
        if (is_single()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h1 class="entry-title">'
                    . '<a href="' . esc_url(get_permalink())
                    . '" rel="bookmark">'
                    , '</a></h1>'
            );
        endif;
        ?>

        <div class="entry-meta">

            <?php if ('post' == get_post_type()) brunch_posted_on(); ?>

            <?php if (!post_password_required() && ( comments_open() || get_comments_number() )) : ?>
                <span class="comments-link">
                    <?php
                    comments_popup_link(
                            __('Leave a comment', BRUNCH_TEXTDOMAIN)
                            , __('1 Comment', BRUNCH_TEXTDOMAIN)
                            , __('% Comments', BRUNCH_TEXTDOMAIN)
                    );
                    ?>
                </span>
            <?php endif; ?>

            <?php
            edit_post_link(
                    __('Edit', BRUNCH_TEXTDOMAIN)
                    , '<span class="edit-link">'
                    , '</span>'
            );
            ?>

        </div>

    </header>

    <div class="entry-content">
        <?php
        if (is_single()) {
            the_content();
        } else {
            the_excerpt();
        }
        wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', BRUNCH_TEXTDOMAIN) . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
        ));
        ?>
    </div>

    <?php
    the_tags(
            '<footer class="entry-meta"><span class="tag-links ">' . __('Tags', BRUNCH_TEXTDOMAIN) . ' : '
            , ' > '
            , '</span></footer>'
    );
    ?>

</article>
