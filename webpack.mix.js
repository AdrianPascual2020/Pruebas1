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

mix.copyDirectory('resources/assets/json', 'public/json');
mix.scripts('resources/assets/js/app.js', 'public/js/app.js');
mix.scripts('resources/assets/js/task.js', 'public/js/task.js');

/**
 * VERSIONING
 *
 */
if (mix.inProduction()) {
    mix.version();
}
