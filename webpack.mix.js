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
    .js('node_modules/admin-lte/build/js/AdminLTE.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
   // .sass('node_modules/admin-lte/build/scss/AdminLTE.scss', 'public/css');
//
// mix.less('resources/assets/less/app.less', 'public/css')
//     .less('resources/assets/less/admin.less', 'public/css');