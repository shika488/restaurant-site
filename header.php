<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body class="min-h-screen flex flex-col items-center text-center font-body font-light">
    <header class="w-full">
        <div class="md:mt-0 px-2 md:px-0 w-full h-28 md:h-32 lg:flex justify-around items-center bg-[#ecf03c]">
            <h1 class="py-1 lg:py-0 font-title text-[40px] md:text-[45px] lg:text-[55px] tracking-widest">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>

            <nav class="mb-0 mx-auto lg:mx-0 lg:w-1/2 text-sm md:text-xl lg:text-2xl">
                <ul class="mx-auto w-[95%] lg:w-full flex justify-between">
                    <li>
                        <a class="h-nav"
                            href="<?php home_url(); ?>/menu">
                            Menu
                        </a>
                    </li>
                    <li>
                        <a class="h-nav"
                            href="<?php home_url(); ?>/news">
                            News
                        </a>
                    </li>
                    <li>
                        <a class="h-nav" 
                            href="<?php home_url(); ?>/blog">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a class="h-nav" 
                            href="<?php home_url(); ?>/access">
                            Access
                        </a>
                    </li>
                    <li>
                        <a class="h-nav" 
                            href="<?php home_url(); ?>/company">
                            Company
                        </a>
                    </li>
                    <li>
                        <a class="h-nav" 
                            href="<?php home_url(); ?>/contact">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <?php if (is_front_page()): ?>
        <?php else: ?>
            <?php if(is_post_type_archive('menu') || is_singular('menu')): ?>
                <div class="page-head">
                    <div class="page-ttl w-[270px] md:w-[420px]">
                        <h3 class="ttl-up -rotate-[7deg] bottom-10 md:bottom-2">
                            Menu
                        </h3>
                        <h2 class="ttl-down">
                            メニュー
                        </h2>
                    </div>
                </div>
            <?php elseif(is_post_type_archive('news') || is_singular('news')): ?>
                <div class="page-head">
                    <div class="page-ttl w-[250px] md:w-[390px]">
                        <h3 class="ttl-up -rotate-6 bottom-10 md:bottom-2">
                            News
                        </h3>
                        <h2 class="ttl-down">
                            ニュース
                        </h2>
                    </div>
                </div>
            <?php elseif(is_archive() || is_single()): ?>
                <div class="page-head">
                    <div class="page-ttl w-[240px] md:w-[350px]">
                        <h3 class="ttl-up -rotate-12 bottom-8 md:bottom-2">
                            Blog
                        </h3>
                        <h2 class="ttl-down">
                            ブログ
                        </h2>
                    </div>
            <?php elseif(is_page(7)): ?>
                <div class="page-head">
                    <div class="page-ttl w-[290px] md:w-[440px]">
                        <h3 class="ttl-up -rotate-6 bottom-10 md:bottom-2">
                            Access
                        </h3>
                        <h2 class="ttl-down">
                            アクセス
                        </h2>
                    </div>
            <?php elseif(is_page(9)): ?>
                <div class="page-head">
                    <div class="page-ttl w-[310px] md:w-[510px]">
                        <h3 class="ttl-up text-[80px] md:text-[120px] -rotate-[7deg] bottom-10 md:bottom-3">
                            Company
                        </h3>
                        <h2 class="ttl-down text-[30px] md:text-[43px] tracking-widest right-10">
                            会社概要
                        </h2>
                    </div>
            <?php elseif(is_page(11)): ?>
                <div class="page-head">
                    <div class="page-ttl w-[280px] md:w-[420px]">
                        <h3 class="ttl-up text-[80px] md:text-[120px] -rotate-6 left-4 bottom-9 md:bottom-2">
                            Contact
                        </h3>
                        <h2 class="ttl-down text-[30px] md:text-[43px]">
                            お問い合わせ
                        </h2>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </header>

    <main class="flex-1 w-screen flex flex-col items-center">