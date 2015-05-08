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
?>

<?php get_header(); ?>
<div class="primary-content">

    <header>
        <h1><?php get_template_part('inc/templates/title') ?></h1>
    </header>

    <?php
    if (have_posts()) :
        // Start the Loop.
        while (have_posts()) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part('content', get_post_format());

        endwhile;
        // Previous/next post navigation.
        brunch_paging_nav();

    else :
        // If no content, include the "No posts found" template.
        get_template_part('content', 'none');

    endif;
    ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>