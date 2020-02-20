require('dotenv').config();
const path = require("path");
const TerserPlugin = require('terser-webpack-plugin');

const isDev = process.env.NODE_ENV !== 'production';

module.exports = {
    mode: 'spa',
    srcDir: 'resources/js/client',
    loading: true,
    modules: [
        '@nuxtjs/axios',
        '@nuxtjs/proxy',
        'nuxt-fullpage.js',
        '~/modules/spa',
        '@nuxtjs/sitemap',
        ['@nuxtjs/google-analytics', {
            id: 'UA-115915081-1'
        }]
    ],
    plugins: [
        {src: '~/plugins/common.js', mode: 'client'},
        {src: '~/plugins/waypoints', mode: 'client'},
        {src: '~/plugins/vue-js-modal.js', ssr: false},
        {src: '~/plugins/vue-touch.js', ssr: false},
        {src: '~/plugins/vue-validate.js', ssr: false},
    ],
    head: {
        title: '',
        htmlAttrs: {
            lang: 'en-US',
        },
        meta: [
            {charset: 'utf-8'},
            {name: 'viewport', content: 'width=device-width, initial-scale=1'},
            {hid: 'http-equiv', name: 'X-UA-Compatible', content: 'IE=edge'},
            {
                hid: 'description',
                name: "description",
                content: ""
            },
            {
                hid: 'keywords',
                name: "keywords",
                content: ''
            },
            {
                name: 'theme-color',
                content: '#a758a9'
            },
            {
                name: 'msapplication-TileColor',
                content: '#a758a9'
            }
        ],
        link: [
            {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'},
            {rel: 'apple-touch-icon', sizes: '180x180', type: 'image/x-icon', href: '/apple-touch-icon.png'},
            {rel: 'icon', sizes: '32x32', type: 'image/x-icon', href: '/favicon-32x32.png'},
            {rel: 'icon', sizes: '16x16', type: 'image/x-icon', href: '/favicon-16x16.png'},
            {rel: 'manifest', type: 'image/x-icon', href: '/site.webmanifest'},
            {rel: 'mask-icon', type: 'image/x-icon', href: '/safari-pinned-tab.svg', color: '#a758a9'},
        ],
    },
    css: [
        '~/assets/sass/app.scss',
    ],
    script: [
        {src: 'https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver', body: true}
    ],
    render: {
        bundleRenderer: {
            shouldPreload: (file, type) => {
                return ['script', 'style', 'font', 'img'].includes(type)
            }
        }
    },
    proxy: isDev
        ? [
            [
                ["/api/**", "/images/**", "/media/**", "/storage/**", "/svg/**", "/uploads/**", "/img/**"],
                {
                    target: process.env.APP_URL,
                },
            ],
        ]
        : null,
    axios: {
        baseURL: '/',
        proxy: isDev
    },
    router: {
        scrollBehavior: function (to, from, savedPosition) {
            let position = {x: 0, y: 0};

            // savedPosition is only available for popstate navigations (back button)
            if (savedPosition) {
                position = savedPosition
            }

            return new Promise(resolve => {
                window.$nuxt.$once('triggerScroll', () => {
                    if (to.hash && document.querySelector(to.hash)) {
                        position = {selector: to.hash}
                    }
                    resolve(position)
                })
            })
        }
    },
    build: {
        analyze: isDev,
        extractCSS: true,
        cssSourceMap: isDev,
        extend(config) {
            config.resolve.alias['~node_modules'] = path.resolve(
                __dirname,
                'node_modules'
            );
            config.resolve.alias['@client'] = path.resolve(
                __dirname,
                "resources/js/client"
            );
            config.resolve.alias["@blocks"] = '@client/components/blocks';
            config.resolve.alias['@admin'] = path.resolve(
                __dirname,
                'resources/js/admin'
            );
            config.resolve.alias["@thumbnails"] = '@admin/editor/thumbnails';
            config.resolve.alias['@core'] = '@admin/editor/core';
        },
        optimization: {
            minimize: !isDev,
            minimizer: [
                new TerserPlugin({
                    sourceMap: isDev,
                    terserOptions: {
                        output: {
                            comments: false,
                        },
                        compress: {
                            pure_funcs: !isDev ? [
                                'console.log'
                            ] : []
                        },
                    },
                }),
            ],
        }
    },
};
