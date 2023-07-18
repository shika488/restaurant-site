<?php

// CSSファイルの読み込み
function my_style_files(){
    // slick
    wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
    // tailwindcss
    wp_enqueue_style('tailwind', get_template_directory_uri().'/dist.css');
}
add_action('wp_enqueue_scripts', 'my_style_files');


// JavaScriptファイルの読み込み
function my_script_files() {
    // jQuery
    wp_enqueue_script('jquery');
    // slick
    // wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
    // main.js
    // wp_enqueue_script('main-js', get_template_directory_uri().'/main.js', array('slick'), false, true);
}
add_action('wp_enqueue_scripts', 'my_script_files');


//メニュー機能をON
add_theme_support('menus');

//アイキャッチ画像をON
add_theme_support('post-thumbnails');
