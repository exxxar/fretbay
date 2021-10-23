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

const WebpackShellPlugin = require('webpack-shell-plugin');
// Add shell command plugin configured to create JavaScript language file
mix.webpackConfig({
    plugins:
        [
            // new WebpackShellPlugin({onBuildStart:['php artisan lang:js resources/js/vue-translations.js --no-lib --quiet'], onBuildEnd:[]})
            new WebpackShellPlugin({onBuildStart:['php artisan lang:js resources/js/vue-translations.json --json --quiet'], onBuildEnd:[]})
        ]
});

if (mix.inProduction()) {
    const CompressionPlugin = require('compression-webpack-plugin');

    mix.webpackConfig({
        plugins: [
            new CompressionPlugin({
                filename: '[path].br[query]',
                algorithm: 'brotliCompress',
                test: /\.(js|css|html|svg)$/,
                compressionOptions: {level: 11},
                minRatio: 1,
                deleteOriginalAssets: false,
            })
        ],
    });
}


mix.disableNotifications();


mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.jpg', '.png', '.css', '.svg', '.mp3'],
        alias: {
            '@': __dirname + '/resources',
            '~': __dirname + '/public',
            // '^':__dirname + '/storage/app/public'
        }
    }
});

// mix.copyDirectory('resources/assets/js', 'public/js');

mix
    .js('resources/js/desktop/app.js', 'public/js/desktop')
    .sass('resources/sass/desktop/app.scss', 'public/css/desktop/app.css')
    .options({
        processCssUrls: false
    });


//**************** CSS ********************
//css
//mix.copy('resources/vendors/pace-progress/css/pace.min.css', 'public/css');
mix.copy('node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css', 'public/css/admin');
mix.copy('node_modules/cropperjs/dist/cropper.css', 'public/css/admin');
//main cs

//************** SCRIPTS ******************
// general scripts
mix.copy('node_modules/@coreui/utils/dist/coreui-utils.js', 'public/js/admin');
mix.copy('node_modules/axios/dist/axios.min.js', 'public/js/admin');
//mix.copy('node_modules/pace-progress/pace.min.js', 'public/js');
mix.copy('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js', 'public/js/admin');
// views scripts
mix.copy('node_modules/chart.js/dist/Chart.min.js', 'public/js/admin');
mix.copy('node_modules/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js', 'public/js/admin');

mix.copy('node_modules/cropperjs/dist/cropper.js', 'public/js/admin');
// details scripts
mix.copy('resources/js/admin/coreui/main.js', 'public/js/admin');
mix.copy('resources/js/admin/coreui/colors.js', 'public/js/admin');
mix.copy('resources/js/admin/coreui/charts.js', 'public/js/admin');
mix.copy('resources/js/admin/coreui/widgets.js', 'public/js/admin');
mix.copy('resources/js/admin/coreui/popovers.js', 'public/js/admin');
mix.copy('resources/js/admin/coreui/tooltips.js', 'public/js/admin');
// details scripts admin-panel
mix.js('resources/js/admin/coreui/menu-create.js', 'public/js/admin');
mix.js('resources/js/admin/coreui/menu-edit.js', 'public/js/admin');
mix.js('resources/js/admin/coreui/media.js', 'public/js/admin');
mix.js('resources/js/admin/coreui/media-cropp.js', 'public/js/admin');
//*************** OTHER ******************
//fonts
mix.copy('node_modules/@coreui/icons/fonts', 'public/fonts/admin');
//icons
mix.copy('node_modules/@coreui/icons/css/free.min.css', 'public/css/admin');
mix.copy('node_modules/@coreui/icons/css/brand.min.css', 'public/css/admin');
mix.copy('node_modules/@coreui/icons/css/flag.min.css', 'public/css/admin');
mix.copy('node_modules/@coreui/icons/svg/flag', 'public/images/svg/flag');

mix.copy('node_modules/@coreui/icons/sprites/', 'public/images/icons/sprites');


mix
    .js('resources/js/admin/app.js', 'public/js/admin')
    .sass('resources/sass/admin/app.scss', 'public/css/admin/app.css')
    .options({
        processCssUrls: false
    });




// mix.copyDirectory('resources/assets/images', 'public/images');
// mix.copyDirectory('resources/assets/css', 'public/css');
// mix.copyDirectory('resources/assets/fonts', 'public/fonts');


if (mix.inProduction()) {

    mix.minify('public/js/admin/app.js')
    mix.minify('public/css/admin/app.css')

    mix.minify('public/js/desktop/app.js')
    mix.minify('public/css/desktop/app.css')
}

mix.version();
