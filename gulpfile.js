var elixir = require('laravel-elixir');

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

 elixir.config.production = true;
 elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.styles([
        "foundation/css/normalize.css",
        "foundation/css/foundation.min.css",
        "foundation-icons/foundation-icons.css"
    ], 'public/assets/base.min.css', 'public/libraries/');

    mix.scripts([
        "foundation/js/vendor/modernizr.js",
        "foundation/js/vendor/jquery.js",
        "foundation/js/vendor/fastclick.js",
        "helpers/*.js",
        "foundation/js/foundation.min.js",
    ], 'public/assets/base.min.js', 'public/libraries/');


    mix.styles([
        "css/*.css",
        "css/default/*.css"
    ], 'public/assets/default.min.css', 'public/themes/basic-template/assets/');

    mix.scripts([
        "js/*.js",
        "js/default/*.js"
    ], 'public/assets/default.min.js', 'public/themes/basic-template/assets/');
});
