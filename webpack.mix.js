const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

mix.js('./resources/js/app.js', './public/js')
   .sass('./resources/sass/app.scss', './public/css')
   .webpackConfig({
      plugins: [
         new BrowserSyncPlugin({
            host: '127.0.0.1',
            port: 8000,
            proxy: '127.0.0.1:8000', // Replace with your Laravel project's local URL
            files: [
               'app/**/*.php',
               'resources/views/**/*.php',
               'public/js/**/*.js',
               'public/css/**/*.css'
            ],
            notify: false,
            open: false,
            reloadOnRestart: true,
         })
      ]
   });
