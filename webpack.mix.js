let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copy('resources/assets/css/trix.css', 'public/css')
   .copy('resources/assets/css/clean-blog.min.css', 'public/css')
   .copy('resources/assets/css/dashboard.css', 'public/css')
   .copy('resources/assets/js/jqBootstrapValidation.js', 'public/js')
   .copy('resources/assets/js/contact_me.js', 'public/js')
   .copy('resources/assets/js/clean-blog.min.js', 'public/js');
