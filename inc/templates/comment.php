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

$isByAuthor = false;
if ($comment->comment_author_email == get_the_author_meta('email')) {
    $isByAuthor = true;
}
$GLOBALS['comment'] = $comment;
?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" <?php
    if ($isByAuthor) {
        echo 'class="comment-by-author"';
    }
    ?>>
        <div class="comment-author vcard">
            <?php echo get_avatar($comment->comment_author_email, 52); ?>

            <?php printf(__('<cite class="comment-name">%s</cite>'), get_comment_author()) ?><?php edit_comment_link(__('(Edit)', BRUNCH_TEXTDOMAIN), '  ', '') ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em><?php _e('Your comment is awaiting moderation.', BRUNCH_TEXTDOMAIN) ?></em>
            <br />
        <?php endif; ?>

        <?php comment_text() ?>

        <div class="reply">
            <?php comment_reply_link(array_merge((array)$args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
    </div>
</li>