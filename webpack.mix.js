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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/content/create/fileUploader.js', 'public/js/content/create/fileUploader.js')
    .postCss('resources/css/app.css', 'public/css/tailwind.css')
    .options({
        postCss: [
            require('postcss-import'),
            require('tailwindcss')('./tailwind.config.js'),
        ]
    })
    .webpackConfig(require('./webpack.config'));
