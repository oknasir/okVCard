process.env.DISABLE_NOTIFIER = true;

const elixir = require('laravel-elixir');

require('./gulp/elixir-delete');
require('laravel-elixir-vue');
require('laravel-elixir-livereload');
require('laravel-elixir-webpack-official');

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

    /**
     * sass
     */
    mix.sass('front.scss');

    /**
     * Vue, JQuery and Bootstrap scripts webpack bundling and copying
     */
    mix.webpack('front.js');

    /**
     * Angular scripts webpack
     */
    mix.webpack([]
        , 'public/resume'
        , 'resources/assets/typescript'
        , require('./gulp/ngconfig.js')
    );

    /**
     * Angular scripts bundling and copying
     */
    mix.scripts([
        '../vendor/ease.min.js',
        '../../../node_modules/segment-js/dist/segment.js',
        '../../../public/resume/vendor.js',
        '../../../public/resume/resume.js'
    ], 'public/js/resume.js');

    /**
     * Version all assets
     */
    mix.version([
        'css/*.css',
        'js/*.js'
    ]);

    /**
     * Remove distributed pack files
     */
    mix.delete(['public/resume', 'public/css', 'public/js']);

    /**
     * copy fonts
     */
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/build/fonts/bootstrap');

    /**
     * Live Reload
     */
    mix.livereload([
        'public/build/css/*.css',
        'public/build/js/*.js'
    ]);

});
