<?php

function my_files(){
    // CSSファイルの読み込み
    // slick
    wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
    // tailwindcss
    wp_enqueue_style('tailwind', get_template_directory_uri().'/dist.css');

    // JavaScriptファイルの読み込み
     // slick
     // wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
     // main.js
     // wp_enqueue_script('main-js', get_template_directory_uri().'/main.js', array('slick'), false, true);
}
add_action('wp_enqueue_scripts', 'my_files');


//メニュー機能をON
add_theme_support('menus');

//アイキャッチ画像をON
add_theme_support('post-thumbnails');


//---------------------------------------
//カスタム投稿の追加
//---------------------------------------

function add_cpt_news() {   // ニュース
    $labels = [
        'singular_name' => 'news',
        'edit_item' => 'news',
    ];
    $args = [
        'label' => 'ニュース',
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'show_in_rest' => true,
        'rest_base' => '',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'has_archive' => true,
        'delete_with_user' => false,
        'exclude_from_search' => false,
        'map_meta_cap' => true,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'news', 'with_front' => true],
        'query_var' => true,
        'menu_position' => 6,
        'supports' => [
            'title',
            'editor',
        ],
    ];
    register_post_type('news', $args);

    //カテゴリーの追加
    register_taxonomy_for_object_type('category', 'news');
}
add_action('init', 'add_cpt_news');
