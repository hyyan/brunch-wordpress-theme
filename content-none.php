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

<header class="page-header">
    <h1 class="page-title"><?php _e('Nothing Found', BRUNCH_TEXTDOMAIN); ?></h1>
</header>

<div class="page-content">
    <?php if (is_home() && current_user_can('publish_posts')) : ?>
        <p><?php printf(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', BRUNCH_TEXTDOMAIN), admin_url('post-new.php')); ?></p>
    <?php endif; ?>
</div>