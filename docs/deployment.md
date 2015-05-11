# Theme Deployment

To make your theme production ready , just run the following command :

`brunch build --production`

The commonad will rebuild a clean `public` folder.


## What I need to upload

All your theme folder expect the following:

* bower_components
* node_modules
* bower.json
* package.json
* config.rb
* brunch-config.coffee

# Simple FTP Deployment Tool

If you want , to automate your theme deployment using FTP/SFTP , then you can use [dg/ftp-deployment](https://github.com/dg/ftp-deployment) tool.

And here is a simple config file :

```ini

[Production site] ; Optional section (there may be more than one section).
; remote FTP server
remote = ftp://user:secretpassword@ftp.example.com/directory
; you can use ftps:// or sftp:// protocols (sftp requires SSH2 extension)

; local path (optional)
local = /full/path/to/your/current/theme

; run in test-mode? (can be enabled by option -t or --test)
test = no

; files and directories to ignore
ignore = "
    .git*
    *.ini
    /bower_components
    /node_modules
    /bower.json
    /package.json
    /config.rb
    /brunch-config.coffee
"
; files to preprocess (defaults to *.js *.css)
preprocess = no

```
