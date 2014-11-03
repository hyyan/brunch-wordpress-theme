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
?>
<?php if (is_active_sidebar('sidebar-footer')) : ?>
    <div id="footer-sidebar" class="footer-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
<?php endif; ?>