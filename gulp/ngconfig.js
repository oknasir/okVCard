/**
 * Use to control elements of Angular webpack configuration
 * @date 9/29/2016
 * @author Nasir Mehmood <oknasir@gmail.com>
 */

var webpack = require('webpack');

module.exports = {
    entry: {
        resume: './resources/assets/typescript/resume/main.ts',
        vendor: './resources/assets/typescript/vendor.ts'
    },
    debug: true,
    devtool: 'source-map',
    resolve: {
        extensions: ['', '.ts', '.js']
    },
    module: {
        loaders: [
            {
                test: /\.ts$/,
                loader: 'awesome-typescript-loader',
                exclude: /node_modules/
            },
            {
                test: /\.html$/,
                loader: 'raw-loader'
            }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            '__decorate': 'typescript-decorate',
            '__extends': 'typescript-extends',
            '__param': 'typescript-param',
            '__metadata': 'typescript-metadata'
        }),
        new webpack.optimize.CommonsChunkPlugin({
            name: 'vendor',
            filename: 'vendor.js',
            minChunks: Infinity
        }),
        new webpack.optimize.CommonsChunkPlugin({
            name: 'resume',
            filename: 'resume.js',
            minChunks: 4,
            chunks: [
                'resume'
            ]
        }),
        // new webpack.optimize.UglifyJsPlugin({
        //     compress: {
        //         warnings: false
        //     },
        //     sourceMap: true,
        //     minimize: true,
        //     mangle: false
        // })
    ],
    node: {
        global: 'window'
    }
};
