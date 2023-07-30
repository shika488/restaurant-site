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
        <div class="mt-2 md:mt-0 h-24 md:h-20 w-11/12 md:flex justify-between items-center mx-auto">
            <h1 class="mb-2 md:mb-0 font-title text-4xl tracking-widest">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>

            <nav class="md:w-3/5 md:text-xl">
                <ul class="flex justify-between text-left">
                    <li class="w-14">
                        <a class="hover:text-yellow-500 focus:text-yellow-500 border-b-4 border-yellow-500 rounded-sm block w-0 hover:w-12 duration-300 transition-all" 
                            href="<?php home_url(); ?>/menu">
                            Menu
                        </a>
                    </li>
                    <li class="w-14">
                        <a class="hover:text-green-600 focus:text-green-600 border-b-4 border-green-500 rounded-sm block w-0 hover:w-12 duration-300 transition-all" 
                            href="<?php home_url(); ?>/news">
                            News
                        </a>
                    </li>
                    <li class="w-12">
                        <a class="hover:text-violet-600 focus:text-violet-600 border-b-4 border-violet-500 rounded-sm block w-0 hover:w-9 duration-300 transition-all" 
                            href="<?php home_url(); ?>/blog">
                            Blog
                        </a>
                    </li>
                    <li class="w-16">
                        <a class="hover:text-orange-600 focus:text-orange-600 border-b-4 border-orange-500 rounded-sm block w-0 hover:w-14 duration-300 transition-all" 
                            href="<?php home_url(); ?>/access">
                            Access
                        </a>
                    </li>
                    <li class="w-20">
                        <a class="hover:text-cyan-500 focus:text-cyan-500 border-b-4 border-cyan-500 rounded-sm block w-0 hover:w-20 duration-300 transition-all" 
                            href="<?php home_url(); ?>/company">
                            Company
                        </a>
                    </li>
                    <li class="w-16">
                        <a class="hover:text-pink-600 focus:text-pink-600 border-b-4 border-pink-500 rounded-sm block w-0 hover:w-16 duration-300 transition-all" 
                            href="<?php home_url(); ?>/contact">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="">
            <?php if (is_front_page()): ?>
            <?php else: ?>
                <?php if(is_post_type_archive('menu') || is_singular('menu')): ?>
                    <div class="page-head bg-gradient-to-r from-yellow-50 to-yellow-400">
                        <div class="page-ttl">
                            <h3 class="ttl-up -rotate-6 -top-10 text-yellow-500">
                                Menu
                            </h3>
                            <h2 class="ttl-down">
                                メニュー
                            </h2>
                        </div>
                <?php elseif(is_post_type_archive('news') || is_singular('news')): ?>
                    <div class="page-head bg-gradient-to-r from-green-50 to-green-500">
                        <div class="page-ttl">
                            <h3 class="ttl-up -rotate-6 -top-10 text-green-600">
                                News
                            </h3>
                            <h2 class="ttl-down">
                                ニュース
                            </h2>
                        </div>
                <?php elseif(is_archive() || is_single()): ?>
                    <div class="page-head bg-gradient-to-r from-violet-50 to-violet-500">
                        <div class="page-ttl">
                            <h3 class="ttl-up -rotate-12 -top-11 text-violet-600">
                                Blog
                            </h3>
                            <h2 class="ttl-down">
                                ブログ
                            </h2>
                        </div>
                <?php elseif(is_page(7)): ?>
                    <div class="page-head bg-gradient-to-r from-orange-50 to-orange-400">
                        <div class="page-ttl">
                            <h3 class="ttl-up -rotate-6 -top-11 text-orange-500">
                                Access
                            </h3>
                            <h2 class="ttl-down">
                                アクセス
                            </h2>
                        </div>
                <?php elseif(is_page(9)): ?>
                    <div class="page-head bg-gradient-to-r from-cyan-50 to-cyan-400">
                        <div class="page-ttl">
                            <h3 class="ttl-up -rotate-6 -top-12 text-cyan-500">
                                Company
                            </h3>
                            <h2 class="ttl-down">
                                会社概要
                            </h2>
                        </div>
                <?php elseif(is_page(11)): ?>
                    <div class="page-head bg-gradient-to-r from-pink-50 to-pink-400">
                        <div class="page-ttl">
                            <h3 class="ttl-up -rotate-6 -top-11 text-pink-500">
                                Contact
                            </h3>
                            <h2 class="ttl-down">
                                お問い合わせ
                            </h2>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <main class="flex-1 w-full">