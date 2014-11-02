exports.config =
    # See http://brunch.io/#documentation for docs. 
    paths:
        public: 'public'

    files:
        javascripts:
            joinTo:
                'js/app.js': /^(app[\\/]scripts)/
                'js/vendor.js': /^(vendor|bower_components)/

        stylesheets:
            joinTo: 
                'css/app.css': /^((app[\\/]styles(?!-rtl))|bower_components|vendor)/
                'css/app-rtl.css': /^(app[\\/]styles-rtl)/	

    modules:
        wrapper: false
        definition: false

    conventions:
        # we don't want javascripts in asset folders to be copied like the one in 
        # the bootstrap assets folder
        assets: /assets[\\/](?!javascripts)/

    plugins:
        sass:
            debug: 'comments' # or set to 'debug' for the FireSass-style output
   