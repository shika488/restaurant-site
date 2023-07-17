<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>

    <link href="<?php echo get_theme_file_uri(); ?>/img/" rel="shortcut icon">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/style.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <?php wp_head(); ?>
</head>
<body class="min-h-screen flex flex-col items-center text-center">
    <header class="h-20 w-11/12 md:flex justify-between items-center mx-auto">
        <h1>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </h1>

        <nav class="md:w-3/5 text-xs md:text-sm">
            <?php
            $args = array(
                'menu_class' => 'flex justify-between',
                'container' => false,
            );
            wp_nav_menu($args);
            ?>
        </nav>
    </header>