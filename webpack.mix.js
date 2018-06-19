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
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js([
     'resources/assets/js/init.js',
     'resources/assets/js/form.js',
     'resources/assets/js/scripts.js'
], 'public/js/admin.js')
.styles([
    'resources/assets/css/theme.css',    
    'resources/assets/css/admin.css',
    'resources/assets/css/styles.css',
    'resources/assets/css/forms.css'
], 'public/css/admin.css');