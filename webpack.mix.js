const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/custom/custom.scss', 'public/dist/css/custom.min.css')
    .js('resources/js/custom/*', 'public/dist/js/custom.min.js');
