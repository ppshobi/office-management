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
    .js('resources/assets/adminator/scripts/index.js', 'public/js')
    .sass('resources/assets/adminator/styles/index.scss', 'public/css')
    .styles(['resources/assets/sass/vendor/toastr.min.css'], 'public/css/vendor.css');

mix.copyDirectory('resources/assets/adminator/static/images', 'public/images')
    .copyDirectory('resources/assets/adminator/static/fonts', 'public/fonts');

