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
    .setPublicPath('public/frontend')
    .copy('resources/assets/limitless_frontend/images', 'public/frontend/images', false)
    .copy('resources/assets/limitless_frontend/css/icons/icomoon/fonts', 'public/frontend/css/icons/icomoon/fonts', false)
    .copy('resources/assets/limitless_frontend/css/icons/glyphicons', 'public/frontend/css/icons/glyphicons', false)
    .copy('resources/assets/limitless_frontend/css/icons/fontawesome/fonts', 'public/frontend/css/icons/fontawesome/fonts', false)
    .copy('resources/assets/limitless_frontend/css/icons/icomoon/styles.css', 'public/frontend/css/icons/icomoon/icomoon.css', false)
    .copy('resources/assets/limitless_frontend/css/icons/fontawesome/styles.min.css', 'public/frontend/css/icons/fontawesome/fontawesome.min.css', false)
    .copy('resources/assets/limitless_frontend/js/plugins/uploaders/dropzone.min.js', 'public/frontend/js/plugins/dropzone/dropzone.min.js', false)
    .copy('resources/assets/limitless_frontend/js/plugins/extensions/jquery_ui/full.min.js', 'public/frontend/js/plugins/jquery_ui/full.min.js', false)
    .copy('resources/assets/limitless_frontend/js/plugins/notifications/jgrowl.min.js', 'public/frontend/js/plugins/jgrowl/jgrowl.min.js', false)
    .styles([
        'resources/assets/limitless_frontend/css/bootstrap.min.css',
        'resources/assets/limitless_frontend/css/bootstrap_limitless.min.css',
        'resources/assets/limitless_frontend/css/colors.min.css',
        'resources/assets/limitless_frontend/css/components.min.css',
        'resources/assets/limitless_frontend/css/layout.min.css',
    ], 'public/frontend/css/frontend.css')
    .scripts([
        'resources/assets/limitless_frontend/js/main/jquery.min.js',
        'resources/assets/limitless_frontend/js/main/bootstrap.bundle.min.js',
        'resources/assets/limitless_frontend/js/main/blockui.min.js',
    ], 'public/frontend/js/core.js')
    .scripts([
        'resources/assets/limitless_frontend/js/plugins/visualization/d3/d3.min.js',
        'resources/assets/limitless_frontend/js/plugins/visualization/d3/d3_tooltip.js',
        'resources/assets/limitless_frontend/js/plugins/forms/styling/switchery.min.js',
        'resources/assets/limitless_frontend/js/plugins/forms/selects/bootstrap_multiselect.js',
        'resources/assets/limitless_frontend/js/plugins/ui/moment/moment.min.js',
        'resources/assets/limitless_frontend/js/plugins/pickers/daterangepicker.js',
    ], 'public/frontend/js/plugins.js')
    .scripts([
        'resources/assets/limitless_frontend/js/plugins/forms/inputs/inputmask/dist/inputmask.js',
        'resources/assets/limitless_frontend/js/plugins/forms/inputs/inputmask/extensions/inputmask.extensions.js',
        'resources/assets/limitless_frontend/js/plugins/forms/inputs/inputmask/extensions/inputmask.numeric.extensions.js',
        'resources/assets/limitless_frontend/js/plugins/forms/inputs/inputmask/extensions/inputmask.date.extensions.js',
        'resources/assets/limitless_frontend/js/plugins/forms/inputs/inputmask/extensions/inputmask.phone.extensions.js',
        'resources/assets/limitless_frontend/js/plugins/forms/inputs/inputmask/dist/jquery.inputmask.js',
        'resources/assets/limitless_frontend/js/plugins/forms/inputs/inputmask/dist/phone.js'
    ], 'public/frontend/js/plugins/inputmask/inputmask.js')
    .js([
        'resources/assets/limitless_frontend/js/main/app.js',
        'resources/assets/limitless_frontend/js/main/dashboard.js'
    ], 'public/frontend/js/app.js');


if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}
