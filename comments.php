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

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php //You can start editing here -- including this comment! ?>

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                    _nx(
                            'One thought on &ldquo;%2$s&rdquo;'
                            , '%1$s thoughts on &ldquo;%2$s&rdquo;'
                            , get_comments_number()
                            , 'comments title'
                            , BRUNCH_TEXTDOMAIN
                    )
                    , number_format_i18n(get_comments_number())
                    , '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <?php // are there comments to navigate through ?>
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text">
                    <?php _e('Comment navigation', BRUNCH_TEXTDOMAIN); ?>
                </h1>
                <div class="nav-previous">
                    <?php previous_comments_link(__('&larr; Older Comments', BRUNCH_TEXTDOMAIN)); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link(__('Newer Comments &rarr;', BRUNCH_TEXTDOMAIN)); ?>
                </div>
            </nav>
        <?php endif; ?>

        <ol class="comment-list">
            <?php wp_list_comments(array('callback' => 'brunch_comment'));?>
        </ol>

        <?php // are there comments to navigate through ?>
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text">
                    <?php _e('Comment navigation', BRUNCH_TEXTDOMAIN); ?>
                </h1>
                <div class="nav-previous">
                    <?php previous_comments_link(__('&larr; Older Comments', BRUNCH_TEXTDOMAIN)); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link(__('Newer Comments &rarr;', BRUNCH_TEXTDOMAIN)); ?>
                </div>
            </nav>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php // If comments are closed and there are comments, let's leave a little note, shall we? ?>
    <?php if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'sparkling'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div>
