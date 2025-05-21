const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [])
   .browserSync({
       proxy: 'http://192.168.1.32:8000',
       host: '192.168.1.32', // <- usa esta URL exacta
       open: true,                     // <- abrirá el navegador automáticamente
       port: 3000,                     // <- puedes cambiarlo si lo deseas
       files: [
            'public/css/**/*.css',
            'public/js/**/*.js',
            'resources/views/**/*.blade.php',
            'resources/css/**/*.css',
            'resources/js/**/*.js',
            'routes/**/*.php',
            'app/**/*.php',
       ],
   });
