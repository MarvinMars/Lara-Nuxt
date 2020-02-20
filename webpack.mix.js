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

mix.js('resources/js/admin/admin.js', 'public/js')
    .sass('resources/sass/admin/admin.scss', 'public/css')
    .version()
    .sourceMaps();

mix.webpackConfig({
    resolve: {
        alias: {
            '@client': path.resolve(
                __dirname,
                "resources/js/client"
            ),
            "@blocks": '@client/components/blocks',
            '@admin': path.resolve(
                __dirname,
                'resources/js/admin'),
            "@thumbnails": '@admin/editor/thumbnails',
            '@core': '@admin/editor/core'
        }
    },
    module: {
        rules: [
            {
                test: /\.pug$/,
                loader: 'pug-plain-loader'
            }
        ]
    }
});
