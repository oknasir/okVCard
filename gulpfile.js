process.env.DISABLE_NOTIFIER = true;

const elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

require('./gulp/elixir-delete');
require('laravel-elixir-vue');
require('laravel-elixir-livereload');
require('laravel-elixir-webpack-official');

var production = process.argv.filter(function (arg) {
    return arg.indexOf('production') !== -1;
});

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
    if (production.length === 0)
    mix.webpack([]
        , 'public/storage/resume'
        , 'resources/assets/typescript'
        , require('./gulp/ngconfig.js')
    );

    /**
     * Angular scripts and SemanticJS bundling and copying
     */
    mix.scripts([
        '../vendor/ease.min.js',
        '../../../node_modules/segment-js/dist/segment.js',
        '../../../node_modules/jquery/dist/jquery.js',
        '../../../public/storage/semantic-ui/semantic.min.js',
        '../../../public/storage/resume/vendor.js',
        '../../../public/storage/resume/resume.js'
    ], 'public/js/resume.js');

    /**
     * Semantic and Resume SASS
     */
    mix.sass('resume.scss');
    mix.styles([
        '../../../public/storage/semantic-ui/semantic.min.css',
        '../../../public/css/resume.css'
    ], 'public/css/resume.css');

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
    mix.delete(['public/css', 'public/js']);
    if (production.length) mix.delete('public/storage/resume');

    // Font Awesome assets
    mix.copy('node_modules/font-awesome/fonts/**/*.*', 'public/storage/font-awesome');

    /**
     * Live Reload
     */
    mix.livereload([
        'public/build/css/*.css',
        'public/build/js/*.js'
    ]);

});
