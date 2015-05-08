# Wordpress Menus And SideBars

The theme defines two files `menus` and `sidebars` where you can add new menus and sidebars.

# How to use

in `inc/menus.php` , add new menu

```php

<?php

// Register wp_nav_menu() menus
// http://codex.wordpress.org/Function_Reference/register_nav_menus
register_nav_menus(array(
    'my-menu' => __('Theme Navigation', BRUNCH_TEXTDOMAIN)
));

```

In `inc\sidebars.php`, add new sidebar

```php

<?php

register_sidebar(array(
    'name' => __('Theme Sidebar', BRUNCH_TEXTDOMAIN),
    'id' => 'theme-sidebar',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

```

# Bootstrap Menus

This theme comes prepared with [WP Bootstrap Navwalker](https://github.com/twittem/wp-bootstrap-navwalker) A custom WordPress nav walker class to fully implement the Twitter Bootstrap 3.0+ navigation style in a custom theme using the WordPress built in menu manager

You can learn more about this class from its [Repository](https://github.com/twittem/wp-bootstrap-navwalker).
