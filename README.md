# Brunch Wordpress Theme

[![project status](http://stillmaintained.com/hyyan/brunch-wordpress-theme.png)](http://stillmaintained.com/hyyan/brunch-wordpress-theme)
[![dependency Status](https://david-dm.org/hyyan/brunch-wordpress-theme/status.svg)](https://david-dm.org/hyyan/brunch-wordpress-theme#info=dependencies)


**Brunch Wordpress Theme** is a WordPress starter theme based on HTML5 Boilerplate, brunch, Bower, and Bootstrap Sass, that will help you make better themes.

* Source: [https://github.com/hyyan/brunch-wordpress-theme](https://github.com/hyyan/brunch-wordpress-theme)
* Wiki  : [Brunch Wordpress Theme Wiki](https://github.com/hyyan/brunch-wordpress-theme/wiki)
* Twitter: [HyyanAF](https://twitter.com/HyyanAF)

## Requirements

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| PHP >= 5.3.x    | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Node.js >= 0.10.25  | `node -v`    | [nodejs.org](http://nodejs.org/) |
| Brunch >= 1.8.2  | `brunch -v`    | `npm install -g brunch` |
| Bower >= 1.3.12 | `bower -v`   | `npm install -g bower` |


## Features

* [Brunch](https://github.com/brunch/brunch) build script that compiles both Sass and Less, checks for JavaScript errors, optimizes images, and concatenates and minifies files
* [Bower](http://bower.io/) for front-end package management
* [Sass](https://github.com/twbs/bootstrap-sass) [Bootstrap](http://getbootstrap.com/)
* [TGM-Plugin-Activation](https://github.com/TGMPA/TGM-Plugin-Activation) PHP library that allows you to easily require or recommend plugins for your WordPress themes
* [WP Bootstrap Navwalker](https://github.com/twittem/wp-bootstrap-navwalker) A custom WordPress nav walker class to fully implement the Twitter Bootstrap 3.0+ navigation style



## Installation

1. Clone the git repo :
 `git clone https://github.com/hyyan/brunch-wordpress-theme.git` and then rename the directory to the name of your theme or website.

## Configuration

1. If you want to use compass set the `http_path` in `config.rb` to meet your theme relative path `wp-content/themes/my-theme-name/`

2. if you want libsass instead of ruby to compile sass change to this in your `brunch-config.coffe` file:

```coffeescript
config =
  plugins:
    sass:
      mode: 'native' # set to 'native' to force libsass
```

## Theme Main Folders

1. The `app` folder will contains assets files (images,sass,js , ...)
2. The `inc` folder contains the logic of your theme  (functions,template-tags,configurations , ...)
3. The `vendor` folder contains assets files which can not be handled by [Bower](http://bower.io/)
4. The rest files is just orgainzed as any wordpress standard theme

**Note** : The theme is using [brunch-with-hyyan](https://github.com/hyyan/brunch-with-hyyan) sekelton , you can read more about to take a deeper look

## Theme development

*Brunch Wordpress Theme* uses [Brunch](https://github.com/brunch/brunch) as its build system and [Bower](http://bower.io/) to manage front-end packages.

**1 - Install Brunch and Bower**

Building the theme requires [node.js](http://nodejs.org/download/).

From the command line:

1. Install [Brunch](https://github.com/brunch/brunch) and [Bower](http://bower.io/) globally with `npm install -g brunch bower`
2. Navigate to the theme directory, then run `npm install`

You now have all the necessary dependencies to run the build process.

**2 - Available Brunch commands**

* `brunch build` — Compile and optimize the files in your app directory
* `brunch watch` — Compile assets when file changes are made
* `brunch build --production` — Compile assets for production (no source maps).

## Documentaions

* [Understanding Frontend Package Management](https://github.com/hyyan/brunch-wordpress-theme/blob/master/docs/frontend.md)
* [Require Or Recommend Plugins For Your WordPress Themes](https://github.com/hyyan/brunch-wordpress-theme/blob/master/docs/wordpress-plugins.md)
* [Wordpress Menus And SideBars](https://github.com/hyyan/brunch-wordpress-theme/blob/master/docs/menus-sidebars.md)
* [Theme Deployment](https://github.com/hyyan/brunch-wordpress-theme/blob/master/docs/deployment.md)

## Contributing

Everyone is welcome to help contribute and improve this project. There are several
ways you can contribute:

* Reporting issues (please read [issue guidelines](https://github.com/necolas/issue-guidelines))
* Suggesting new features
* Writing or refactoring code
* Fixing [issues](https://github.com/hyyan/brunch-wordpress-theme/issues)
