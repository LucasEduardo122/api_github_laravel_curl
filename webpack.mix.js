const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.css('resources/css/app.css', 'public/css/styles.css')
.js('resources/js/app.js', 'public/js/app.js')
.js('resources/js/bootstrap.js', 'public/js/bootstrap.js')
