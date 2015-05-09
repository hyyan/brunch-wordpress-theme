# Require Or Recommend Plugins For Your WordPress Themes

This started theme comes prepared with [TGM-Plugin-Activation](https://github.com/TGMPA/TGM-Plugin-Activation) PHP library which allows you require or recommend plugins for your WordPress themes.

> [TGM-Plugin-Activation](https://github.com/TGMPA/TGM-Plugin-Activation)
 is a PHP library that allows you to easily require or recommend plugins for your WordPress themes (and plugins). It allows your users to install and even automatically activate plugins in singular or bulk fashion using native WordPress classes, functions and interfaces. You can reference pre-packaged plugins, plugins from the WordPress Plugin Repository or even plugins hosted elsewhere on the internet.


## How to use ?

In your `inc\dependencies.php` file , add your requires plugins in the `plugins` array.

**Examples**

```php
<?php

// ....

/*
 * Array of plugin arrays. Required keys are name and slug.
 * If the source is NOT from the .org repo, then source is also required.
 */
$plugins = array(
  // This is an example of how to include a plugin pre-packaged with a theme.
  array(
    'name'               => 'TGM Example Plugin', // The plugin name.
    'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
    'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
    'required'           => true, // If false, the plugin is only 'recommended' instead of required.
    'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
    'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
    'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
    'external_url'       => '', // If set, overrides default API URL and points to an external URL.
  ),
  // This is an example of how to include a plugin from an arbitrary external source in your theme.
  array(
    'name'         => 'TGM New Media Plugin', // The plugin name.
    'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
    'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
    'required'     => true, // If false, the plugin is only 'recommended' instead of required.
    'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
  ),
  // This is an example of how to include a plugin from a GitHub repository in your theme.
  // This presumes that the plugin code is based in the root of the GitHub repository
  // and not in a subdirectory ('/src') of the repository.
  array(
    'name'      => 'Adminbar Link Comments to Pending',
    'slug'      => 'adminbar-link-comments-to-pending',
    'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
    'required'  => false,
  ),
  // This is an example of how to include a plugin from the WordPress Plugin Repository.
  array(
    'name'      => 'BuddyPress',
    'slug'      => 'buddypress',
    'required'  => false,
  ),
  // This is an example of the use of 'is_callable' functionality. A user could - for instance -
  // have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
  // 'wordpress-seo-premium'.
  // By setting 'is_callable' to either a function from that plugin or a class method
  // `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
  // recognize the plugin as being installed.
  array(
    'name'        => 'WordPress SEO by Yoast',
    'slug'        => 'wordpress-seo',
    'is_callable' => 'wpseo_init',
  ),
);

```
