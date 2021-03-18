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

mix.copyDirectory('resources/assets/js', 'public/js');

mix

    .js('resources/js/desktop/app.js', 'public/js/desktop')
    .sass('resources/sass/desktop/app.scss', 'public/css/desktop/app.css')
    .options({
        processCssUrls: false
    });


mix
    .js('resources/js/admin/app.js', 'public/js/admin')
    .sass('resources/sass/admin/app.scss', 'public/css/admin/app.css')
    .options({
        processCssUrls: false
    });

mix.copyDirectory('resources/assets/images', 'public/images');
mix.copyDirectory('resources/assets/css', 'public/css');
mix.copyDirectory('resources/assets/fonts', 'public/fonts');


if (mix.inProduction()) {

    mix.minify('public/js/admin/app.js')
    mix.minify('public/css/admin/app.css')

    mix.minify('public/js/desktop/app.js')
    mix.minify('public/css/desktop/app.css')
}

mix.version();
