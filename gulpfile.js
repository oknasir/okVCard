process.env.DISABLE_NOTIFIER = true;

const elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

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
     * Angular scripts and SemanticJS bundling and copying
     */
    mix.scriptsIn('resources/assets/vendor/semantic/definitions/', 'public/js/semantic.js');
    mix.scripts([
        '../vendor/ease.min.js',
        '../../../node_modules/segment-js/dist/segment.js',
        '../../../node_modules/jquery/dist/jquery.js',
        '../../../public/js/semantic.js',
        '../../../public/resume/vendor.js',
        '../../../public/resume/resume.js'
    ], 'public/js/resume.js');

    /**
     * Semantic LESS and Colors
     */
    mix.less('resume.less');
    mix.sass('colors.scss');
    mix.styles(['../../../public/css/colors.css', '../../../public/css/resume.css'], 'public/css/resume.css');
    mix.delete(['public/css/colors.css', 'public/js/semantic.js']);

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

    // Semantic Themes
    mix.copy('resources/assets/vendor/semantic/themes/**/assets/**/*.*', 'public/build/fonts/semantic');

    /**
     * Live Reload
     */
    mix.livereload([
        'public/build/css/*.css',
        'public/build/js/*.js'
    ]);

});
