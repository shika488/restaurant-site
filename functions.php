<?php

function my_files(){
    // CSSファイルの読み込み
    // slick
    wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
    // tailwindcss
    wp_enqueue_style('tailwind', get_template_directory_uri().'/dist/output.css');

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
//管理画面の表示を変更（ブログ）
//---------------------------------------
function post_has_archive ($args, $post_type) {
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'blog';
        $args['label'] = 'ブログ';  // 「投稿」→「ブログ」に変更
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


//---------------------------------------
//カスタム投稿の追加
//---------------------------------------

function add_cpt_menu() {   // メニュー
    $labels = [
        'singular_name' => 'menu',
        'edit_item' => 'menu',
    ];
    $args = [
        'label' => 'メニュー',
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
        'rewrite' => ['slug' => 'menu', 'with_front' => true],
        'query_var' => true,
        'menu_position' => 5,
        'supports' => [
            'title',
            // 'editor',
            'thumbnail',   //アイキャッチ画像
        ],
    ];
    register_post_type('menu', $args);

    //カテゴリーの追加
    register_taxonomy_for_object_type('category', 'menu');
}
add_action('init', 'add_cpt_menu');


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


/* 管理画面での表示項目追加 */
function add_custom_column($column) {
    $column['stop-sales'] = '販売中止';
    return $column;
}
add_filter( 'manage_edit-menu_columns', 'add_custom_column' );

function my_add_columns_content($column_name, $post_id) {
    if( $column_name == 'stop-sales' ) {
        $metas = CFS()->get('stop-sales', $post_id);
    }

    if ( isset($metas) && $metas ) {
        echo '販売中止';
    } else {
        echo '-';
    }
}
add_action( 'manage_menu_posts_custom_column', 'my_add_columns_content', 10, 2 );


/* 管理画面でのソート機能追加 */
function add_sort($columns) {
    $columns['stop-sales'] = '販売中止';
    return $columns;
}

function add_sort_by_meta($query) {
    if ($query->is_main_query() && ( $orderby = $query->get('orderby'))) {
        switch($orderby) {
        case '販売中止':
            $query->set('meta_key', 'stop-sales');
            $query->set('orderby', 'meta_value_num');
            break;
        }
    }
}
add_filter('manage_edit-menu_sortable_columns', 'add_sort');
add_action('pre_get_posts', 'add_sort_by_meta', 1);


/* ブログ１件目 */
function is_first(){
    global $wp_query;
    return ($wp_query->current_post === 0);
}