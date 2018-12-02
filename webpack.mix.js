const mix = require('laravel-mix');
const LiveReloadPlugin = require('webpack-livereload-plugin');


mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .webpackConfig({
       plugins: [
           new LiveReloadPlugin()
       ]
   });
