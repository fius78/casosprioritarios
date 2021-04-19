//const mix = require('laravel-mix');

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

/*mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');*/

let mix = require('laravel-mix');

// general resources
let public_js = 'public/js/';
let public_css = 'public/css/';
let resource_sass = 'resources/sass/';
// Gentelella resources
let gentelella_home = 'node_modules/gentelella/';
let gentelella_vendor = gentelella_home + '/vendors/';


mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.
    copy(gentelella_home + 'build/css/custom.css',
        public_css + 'gentelella-custom.css').
    copy(gentelella_home + 'build/js/custom.js',
        public_js + 'gentelella-custom.js'); 