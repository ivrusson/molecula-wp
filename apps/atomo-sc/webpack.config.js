const path = require('path');
const HtmlPlugin = require('html-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
 
const env = process.env.NODE_ENV || 'development'

module.exports = {
  mode: env === 'development' ? 'development' : 'production',
  entry: {
    'mowp-atomo-shortcode': path.join(__dirname, 'src/index.jsx'),
  },
  output: {
    path: path.join(__dirname, 'dist'),
    publicPath: env === 'development' ? '/' : '',
    filename: '[name].js',
  },
  devtool: env === 'development' ? 'inline-source-map' : '',
  plugins: [
    new CleanWebpackPlugin(),
    new CleanWebpackPlugin({ cleanStaleWebpackAssets: false }),
    new HtmlPlugin({
      title: 'Atomo Shortcode',
      template: path.join(__dirname, 'src/index.html'),
    }),
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),
  ],
  resolve: {
    extensions: ['.js', '.jsx'],
    "alias": { 
      "react": "preact/compat",
      "react-dom/test-utils": "preact/test-utils",
      "react-dom": "preact/compat",
    },
  },
  module: {
    rules: [
      {
        test: /\.jsx?$/,
        loader: 'babel-loader',
        include: [__dirname],
      },
      {
        test: /\.css$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
        ]
      },
    ],
  },
  devServer: {
    contentBase: path.join(__dirname, 'dist'),
  },
}
