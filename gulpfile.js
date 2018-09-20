var elixir = require('laravel-elixir');
require('laravel-elixir-remove');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

/**
 * 打包前路径
 * @type {{cssWeb: string, jsWeb: string, font: string, bower: string, cssAdmin: string, jsAdmin: string}}
 */
var assets = {
    cssWeb: './resources/assets/jayfong/css/',
    jsWeb: './resources/assets/jayfong/js/',
    font: './resources/assets/bower/Font-Awesome/font/',
    bower: './resources/assets/bower/',
    cssAdmin: './resources/assets/admin/css/',
    jsAdmin: './resources/assets/admin/js/'
};

/**
 * 打包后路径
 * @type {{build: string, delWeb: string, cssWeb: string, jsWeb: string, fontWeb: string, cssAdmin: string, cssJs: string, fontAdmin: string, delAdmin: string}}
 */
var build = {
    build: './public/build',
    delWeb:'./public/web',
    cssWeb: './public/web/css/',
    jsWeb: './public/web/js/',
    fontWeb: './public/build/web/font/',
    cssAdmin: './public/admin/css/',
    jsAdmin: './public/admin/js/',
    fontAdmin: './public/build/admin/font/',
    delAdmin: './public/admin'
};

//取消源地图文件
elixir.config.sourcemaps = false;

/**
 * 打包文件
 */
elixir(function(mix) {

    /**
     * 打包前端文件
     */
    //前端首页
    mix.styles([
        assets.cssWeb + 'reset.css',
        assets.cssWeb + 'common.css',
        assets.cssWeb + 'index.css',
        assets.bower + 'Font-Awesome/css/font-awesome.min.css'
    ], build.cssWeb + 'all-index.css');
    mix.scripts([
        assets.bower + 'jquery/dist/jquery.min.js',
        assets.jsWeb + 'jayfong.js',
        assets.bower + 'TagCanvas/jquery.tagcanvas.min.js'
    ], build.jsWeb + 'all-index.js');

    //文章页面
    mix.styles([
        assets.cssWeb + 'reset.css',
        assets.cssWeb + 'common.css',
        assets.cssWeb + 'article.css',
        assets.bower + 'Font-Awesome/css/font-awesome.min.css'
    ], build.cssWeb + 'all-article.css');
    mix.scripts([
        assets.bower + 'jquery/dist/jquery.min.js',
        assets.bower + 'TagCanvas/jquery.tagcanvas.min.js'
    ], build.jsWeb + 'all-article.js');

    /**
     * 打包后台文件
     */
    // 登录页面
    mix.styles([
        assets.bower + 'bootstrap/dist/css/bootstrap.min.css',
        assets.cssAdmin + 'AdminLTE.min.css'
    ], build.cssAdmin + 'all-login.css');

    // 公用CSS
    mix.styles([
        assets.bower + 'bootstrap/dist/css/bootstrap.min.css',
        assets.bower + 'Font-Awesome/css/font-awesome.min.css',
        assets.cssAdmin + 'AdminLTE.min.css',
        assets.cssAdmin + 'skins/_all-skins.min.css',
        './resources/assets/uploadify/uploadify.css'
    ], build.cssAdmin + 'all-common.css');
    // 公用JS
    mix.scripts([
        assets.bower + 'jquery/dist/jquery.min.js',
        assets.bower + 'bootstrap/dist/js/bootstrap.min.js',
        assets.jsAdmin + 'app.min.js',
        './resources/assets/uploadify/jquery.uploadify.min.js'
    ], build.jsAdmin + 'all-common.js');
});

/**
 * 生成版本文件
 */
elixir(function (mix) {
    mix.version([

        /**
         * Web前端
         */
        //前端首页
        build.cssWeb + 'all-index.css',
        build.jsWeb + 'all-index.js',

        //文章页面
        build.cssWeb + 'all-article.css',
        build.jsWeb + 'all-article.js',

        /**
         * Admin后台
         */
        // 登录
        build.cssAdmin + 'all-login.css',

        // 公共
        build.cssAdmin + 'all-common.css',
        build.jsAdmin + 'all-common.js'
    ], build.build);

    //复制字体到前端web
    mix.copy(assets.font, build.fontWeb);
    //复制字体到后台admin
    mix.copy(assets.font, build.fontAdmin);
    //复制图片到前端Web
    mix.copy('./resources/assets/jayfong/images', './public/build/web/images');
    //复制上传图片的插件
    mix.copy('./resources/assets/uploadify', './public/build/admin/uploadify/');
    //复制layer
    mix.copy('./resources/assets/layer', './public/build/layer/');

    //删除打包后的原文件
    mix.remove([build.delWeb, build.delAdmin]);
});