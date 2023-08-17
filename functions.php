<?php

function my_files(){
    /* CSSファイルの読み込み */
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
    // Google Fonts
    wp_enqueue_style('google-fonts-poiret-one','https://fonts.googleapis.com/css2?family=Poiret+One&display=swap');
    wp_enqueue_style('google-fonts-open-sans','https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');
    wp_enqueue_style('google-fonts-zen-kaku-gothic-new','https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300;400;500&display=swap');
    wp_enqueue_style('google-fonts-allura','https://fonts.googleapis.com/css2?family=Allura&display=swap');
    // Material Symbols
    wp_enqueue_style('material-symbols','https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200');
    // splide
    wp_enqueue_style('splide', get_template_directory_uri().'/splide.min.css');
    // tailwindcss
    wp_enqueue_style('tailwind', get_template_directory_uri().'/dist/output.css');

    /* JavaScriptファイルの読み込み */
    // splide
    if (is_front_page()) {
        wp_enqueue_script('splide', get_template_directory_uri() . '/splide.min.js', array(), false, true);
        wp_enqueue_script('main-js', get_template_directory_uri() . '/main.js', array('splide'), false, true);
    }
      // YubinBango
    if (is_page(11)) {
        wp_enqueue_script('yubinbango', 'https://yubinbango.github.io/yubinbango/yubinbango.js', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'my_files');


// プラグインのCSSを削除する
add_action('wp_print_styles', 'my_deregister_styles', 100);
function my_deregister_styles() {
    wp_deregister_style('wp-pagenavi');
}


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
            // 'editor',
        ],
    ];
    register_post_type('news', $args);

    //カテゴリーの追加
    register_taxonomy_for_object_type('category', 'news');
}
add_action('init', 'add_cpt_news');


/* 管理画面での投稿一覧の並びを日付順にする */
function admin_custom_posttype_order($wp_query) {
    if( is_admin() ) {
        $post_type = $wp_query->query['post_type'];
        if($post_type == 'news') {
            $wp_query->set('orderby','date'); //並べ替えの基準(日付)
            $wp_query->set('order','DESC'); //新しい順
        }
    }
}
add_filter('pre_get_posts', 'admin_custom_posttype_order');


function column_posts($query) {
    // 管理画面・メインクエリに干渉させない
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    // ブログ一覧ページにて表示件数を5件にする
    if ($query->is_archive()) {
        $query->set('posts_per_page', 5);
        return;
    }
}
add_action('pre_get_posts','column_posts');


/* ブログ１件目 */
function is_first(){
    global $wp_query;
    return ($wp_query->current_post === 0);
}


/* 管理画面での表示項目追加 */
function add_custom_columns($columns) {
    $columns['stop-sales'] = '提供中止';
    $columns['reason'] = '提供中止の理由';
    $columns['display-order'] = '表示順';
    return $columns;
}
add_filter( 'manage_edit-menu_columns', 'add_custom_columns' );

function add_columns_content($column_name, $post_id) {
    if ($column_name == 'stop-sales') {
        $metas = CFS()->get('stop-sales', $post_id);
    }

    if ($column_name == 'reason') {
        $metas = CFS()->get('reason', $post_id);
    }

    if ($column_name == 'display-order') {
        $metas = CFS()->get('display-order', $post_id);
    }

    if ( isset($metas) && $metas ) {
        if ($column_name == 'stop-sales' && $metas == 1 ) {
            echo ('提供中止');
        } else {
            echo esc_attr($metas);
        }
    } else {
        echo '-';
    }
}
add_action( 'manage_menu_posts_custom_column', 'add_columns_content', 10, 2 );


/* 管理画面でのソート機能追加 */
function add_sort($columns) {
    $columns['stop-sales'] = '提供中止';
    $columns['reason'] = '提供中止の理由';
    return $columns;
}

function add_sort_by_meta($query) {
    if ($query->is_main_query() && ( $orderby = $query->get('orderby'))) {
        switch($orderby) {
        case '提供中止':
            $query->set('meta_key', 'stop-sales');
            $query->set('orderby', 'meta_value_num');
            break;
        }
    }
}
add_filter('manage_edit-menu_sortable_columns', 'add_sort');
add_action('pre_get_posts', 'add_sort_by_meta', 1);


