let mix = require('laravel-mix');

mix.sass('assets/scss/main.scss', 'dist');
mix.js('assets/js/main.js', 'dist');
mix.options({
    processCssUrls: false
});
mix.copyDirectory('assets/fontawesome/webfonts', 'dist')
mix.copyDirectory('assets/fonts', 'dist')