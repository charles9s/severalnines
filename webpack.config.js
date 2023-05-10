const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = {
    mode: 'development',
    entry: {
        'admin': ['./assets/css/admin.scss', './assets/js/app-admin.js' ],
        'frontend': ['./assets/css/layout.scss', './assets/js/app.js' ]
    },
    output: {
        path: path.resolve(__dirname, 'assets/dist'),
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                include: [path.resolve(__dirname, 'assets/js/app.js'), path.resolve(__dirname, 'assets/js/app-admin.js')],
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        plugins: ['lodash'],
                        presets: ['@wordpress/default']
                    }
                }
            },
            {
                enforce: "pre",
                loader: "import-glob-loader"
            },
            {
                test: /\.scss$/,
                include: [path.resolve(__dirname, 'assets/css/layout.scss'), path.resolve(__dirname, 'assets/css/admin.scss')],
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '../dist/[name].css',
                        }
                    },
                    {
                        loader: 'extract-loader'
                    },
                    {
                        loader: 'css-loader?-url'
                    },
                    {
                        loader: 'postcss-loader'
                    },
                    {
                        loader: 'sass-loader'
                    }
                ]
            },
        ]
    },
    plugins: [
        new BrowserSyncPlugin(
            // BrowserSync options
            {
            // browse to http://localhost:3000/ during development
            host: "localhost",
            port: 3000,
            proxy: "https://seve9.test/",
            },
            // plugin options
            {
            // prevent BrowserSync from reloading the page
            // and let Webpack Dev Server take care of this
            reload: true,
            watch: true,
            }
        ),
    ],
    watch: true,
    watchOptions: {
        ignored: /node_modules/,
    },
		externals: {
		// Require("jquery") is external and available. Now importing npm js(with jQuery) packages is seamless.
		"jquery": "jQuery"
	}
};
