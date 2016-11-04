exports.config =
  # See http://brunch.io/#documentation for docs.
  npm:
    enabled: false

  server:
    run: true

  paths:
    public: 'public'

  files:
    javascripts:
      joinTo:
        'js/jquery.js': /^(bower_components[\\/]jquery[\\/]dist[\\/]jquery.js)/
        'js/app.js': /^(app[\\/]scripts)/
        'js/vendor.js': /^(vendor|bower_components(?![\\/]jquery[\\/]dist[\\/]jquery.js))/
    stylesheets:
      joinTo:
        'css/app.css':[
           /^(app[\\/]scss[\\/]styles(?!-rtl))/
           /bower_components[\\/](?!bootstrap-rtl[\\/]dist[\\/]css[\\/]bootstrap-rtl.css)/
        ]
        'css/app-rtl.css': [
          /^(app[\\/]scss[\\/]styles-rtl)/
          /(bower_components[\\/]bootstrap-rtl[\\/]dist[\\/]css[\\/]bootstrap-rtl.css)/
        ]
        'css/editor.css':[
           /^(app[\\/]scss[\\/]editor(?!-rtl))/
        ]
        'css/editor-rtl.css': [
          /^(app[\\/]scss[\\/]editor-rtl)/
        ]

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
      mode: 'native' # set to 'ruby' to force ruby
      allowCache: true
      options:
        includePaths: ['bower_components']

    assetsmanager:
      copyTo:
        'fonts': ['bower_components/bootstrap-sass-official/assets/fonts/bootstrap*']
