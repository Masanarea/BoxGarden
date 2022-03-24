const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

// resources/js/内に.jsのファイルを作成し、
// npm run dev(開発用)やnpm run production(デプロイ用)でコンパイルされpublic/jsにjsファイルが作成

// mix
// .browserSync(
//     'welcome.blade.php'

    // Docker コンテナで実行する場合は以下の引数を指定
    // proxy: '0.0.0.0:8081', // アプリの起動アドレス
    // open: false // ブラウザを自動で開かない

    // )
//     .js('resources/js/app.js', 'public/js')
//   .js('resources/js/result.js', 'public/js')
// //   .sass('resources/css/app.css', 'public/css')
//   .version();


mix.copy('resources/js/app.js', 'public/js')
   .copy('resources/js/result.js', 'public/js')
    .version();
