const mix = require('laravel-mix');
require('dotenv').config();


mix.react('resources/js/admin.js', 'public/js')
   .react('resources/js/website.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');