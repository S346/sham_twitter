var elixir = require('laravel-elixir');

var paths = {
    'jquery': 'bower_components/jquery/',
    'bootstrap': 'bower_components/bootstrap-sass/assets/'
};
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        // Bootstrapのフォントを public/fonts/bootstrapディレクトリにコピー
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap')

        // jquery.jsと bootstrap.jsを結合して、public/js/app.jsに出力
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js"
        ], 'public/js/app.js', './');
});
