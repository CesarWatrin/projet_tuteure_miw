const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css')
.sourceMaps();

mix.js('resources/js/map.js', 'public/js')
.sass('resources/sass/map.scss', 'public/css')
.sourceMaps();

mix.js('resources/js/favori.js', 'public/js').sourceMaps();

mix.js('resources/js/navbar.js', 'public/js')
.sass('resources/sass/navbar.scss', 'public/css')
.sourceMaps();

mix.js('resources/js/catalogue.js', 'public/js')
.sass('resources/sass/catalogue.scss', 'public/css')
.sourceMaps();

mix.js('resources/js/index.js', 'public/js')
.sass('resources/sass/index.scss', 'public/css').sourceMaps();

mix.sass('resources/sass/connect.scss', 'public/css').sourceMaps();

mix.sass('resources/sass/favoris.scss', 'public/css').sourceMaps();

mix.sass('resources/sass/footer.scss', 'public/css').sourceMaps();

mix.sass('resources/sass/account.scss', 'public/css').sourceMaps();

mix.sass('resources/sass/stores.scss', 'public/css').sourceMaps();

mix.sass('resources/sass/stores_add.scss', 'public/css').sourceMaps();

mix.sass('resources/sass/dashboard.scss', 'public/css').sourceMaps();

mix.sass('resources/sass/ratings.scss', 'public/css').sourceMaps();

mix.sass('resources/sass/404.scss', 'public/css').sourceMaps();

mix.combine([
    'public/css/app.css',
    'public/css/navbar.css',
    'public/css/footer.css',
    'public/css/stores.css',
    'public/css/stores_add.css',
    'public/css/dashboard.css'
], 'public/css/main.min.css');

mix.combine([
    'public/js/app.js',
    'public/js/navbar.js'
], 'public/js/main.min.js');
