var mix = require('laravel-mix');

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

mix
    .setPublicPath('public/backend')
    .copy('resources/assets/limitless/css/icons/icomoon/fonts', 'public/backend/css/fonts', false)
    .copy('resources/assets/limitless/css/icons/glyphicons', 'public/backend/css/icons/glyphicons', false)
    .copy('resources/assets/limitless/css/icons/fontawesome/fonts', 'public/backend/css/fonts', false)
    .copy('resources/assets/limitless/css/icons/summernote', 'public/backend/css/fonts', false)
    .copy('resources/assets/limitless', 'public/backend/assets/', false)
    .styles([
        'resources/assets/limitless/css/icons/icomoon/styles.css',
        'resources/assets/limitless/css/icons/fontawesome/styles.min.css',
        'resources/assets/limitless/css/bootstrap.min.css',
        'resources/assets/limitless/css/bootstrap_limitless.min.css',
        'resources/assets/limitless/css/core.min.css',
        'resources/assets/limitless/css/components.min.css',
        'resources/assets/limitless/css/colors.min.css',
        'resources/assets/limitless/css/layout.min.css',
        'resources/assets/css/backend.css'
    ], 'public/backend/css/backend.css')
    .scripts([
        'resources/assets/limitless/js/core/libraries/jquery.min.js',
        'resources/assets/limitless/js/core/libraries/bootstrap.min.js',
        'resources/assets/limitless/js/plugins/loaders/blockui.min.js',
        'resources/assets/limitless/js/plugins/ui/dragula.min.js',
        'resources/assets/limitless/js/plugins/ui/fab.min.js',
        'resources/assets/limitless/js/plugins/ui/headroom.min.js',
        'resources/assets/limitless/js/plugins/ui/perfect_scrollbar.min.js',
        'resources/assets/limitless/js/plugins/ui/prism.min.js',
        'resources/assets/limitless/js/plugins/ui/slinky.min.js',
        'resources/assets/limitless/js/plugins/ui/sticky.min.js'
    ], 'public/backend/js/core.js')
    .js([
        'resources/assets/limitless/js/core/app.js',
        'resources/assets/js/backend/app.js'
    ], 'public/backend/js/app.js')
    .scripts([
        'resources/assets/limitless/js/plugins/ui/ripple.min.js',
        'resources/assets/limitless/js/plugins/notifications/jgrowl.min.js',
        'resources/assets/limitless/js/plugins/forms/selects/select2.min.js',
        'resources/assets/limitless/js/plugins/forms/styling/uniform.min.js',
        'resources/assets/limitless/js/plugins/forms/styling/switchery.min.js',
        'resources/assets/js/backend/plugins/checkbox.js',
        'resources/assets/js/backend/plugins/select.js'
    ], 'public/backend/js/plugins.js');

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}

