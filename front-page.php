<?php get_header();?>
    <section class="sec-info w-full bg-[#f3efe8]">
        <div class="w-full text-base md:text-xl flex flex-col md:flex-row justify-center items-center">
            <h2 class="my-2 md:mr-8 p-1 md:p-2 font-normal bg-[#ecf03c]">お知らせ</h2>
            <div class="flex mb-2 md:mb-0">
                <h3 class="inline-block mr-4">ランチセット</h3>
                <div>
                    <?php
                    $args = array(
                        'post_type' => 'news', // 投稿タイプ
                        'category_name' => 'lunch-this-week', // カテゴリ名（スラッグ）
                        'posts_per_page' => 1 // 表示件数
                    );
                    $new_query = new WP_Query($args);
                    ?>

                    <?php if ($new_query->have_posts()) : ?>
                        <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                            <p class="m-0"><?php the_title(); ?></p>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-menu my-10 w-[90%]">
        <div class="flex flex-col md:flex-row">
            <div class="mb-5 md:w-1/5 text-left">
                <h2 class="text-4xl lg:text-5xl font-bold tracking-wide text-[#d194f7]">Menu</h2>
                <p class="m-0 md:m-1 text-xl lg:text-2xl">メニュー</p>
            </div>

            <div class="w-full md:w-4/5 flex flex-wrap justify-between gap-y-6">
                <?php
                $args = array(
                    'post_type' => 'menu', // 投稿タイプ
                    'category_name' => 'limited-time', // 「期間限定」カテゴリ名（スラッグ）
                    'posts_per_page' => 1, // 表示件数
                    'meta_key'=>'display-order',
                    'orderby'=>'meta_value_num',
                    'order' => 'asc'
                );
                $new_query = new WP_Query($args);
                ?>
                <?php if ($new_query->have_posts()) : ?>
                    <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                        <?php if (!get_post_meta($post->ID, 'stop-sales', true)): ?>
                            <!-- article - start -->
                            <a href="<?php the_permalink(); ?>" class="group relative flex w-[45%] md:w-[30%] h-64 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg ">
                                <img src="<?php echo CFS()->get('image'); ?>" loading="lazy" alt="" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent"></div>

                                <div class="relative mt-auto p-4">
                                    <div class="<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?> gap-2 text-left text-white text-sm lg:text-base">
                                        <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
                                    </div>
                                    <h2 class="lg:text-lg font-semibold text-white transition duration-100">
                                        <?php echo CFS()->get('name'); ?>
                                    </h2>
                                </div>
                            </a>
                            <!-- article - end -->
                        <?php else: endif; ?>
                    <?php endwhile; else: ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <?php
                $parent_categories = get_categories('orderby=id');

                foreach($parent_categories as $category) :
                    $categories = get_categories('child_of='.$category->cat_ID);

                    usort($categories, function($a, $b){
                        return $a->description - $b->description;
                    });
                ?>

                    <?php 
                    foreach($categories as $category) :
                        $query = new WP_Query(
                        array(
                            'post_status'      => 'publish',
                            'posts_per_page'   => 1,
                            'post_type'        => 'menu',
                            'meta_key'=>'display-order',
                            'orderby'=>'meta_value_num',
                            'order' => 'asc',
                            'category__in' => $category->cat_ID
                        ));
                    ?>

                        <?php if ($query->have_posts()): while ($query->have_posts()) : $query->the_post(); ?>
                            <!-- article - start -->
                            <a href="<?php the_permalink(); ?>" class="group relative flex w-[45%] md:w-[30%] h-64 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg">
                                <img src="<?php echo CFS()->get('image'); ?>" loading="lazy" alt="" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent"></div>

                                <div class="relative mt-auto p-4">
                                    <div class="<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?> gap-2 text-left text-white text-sm lg:text-base">
                                        <?php if ($cat == 'salad'): ?>
                                            <span class="salad"></span>
                                        <?php elseif ($cat == 'soup'): ?>
                                            <span class="soup"></span>
                                        <?php elseif ($cat == 'pasta'): ?>
                                            <span class="pasta"></span>
                                        <?php elseif ($cat == 'pizza'): ?>
                                            <span class="pizza"></span>
                                        <?php elseif ($cat == 'dolce'): ?>
                                            <span class="dolce"></span>
                                        <?php elseif ($cat == 'alcohol'): ?>
                                            <span class="alcohol"></span>
                                        <?php elseif ($cat == 'soft-drink'): ?>
                                            <span class="soft-drink"></span>
                                        <?php elseif ($cat == 'coffee'): ?>
                                            <span class="coffee"></span>
                                        <?php elseif ($cat == 'tea'): ?>
                                            <span class="tea"></span>
                                        <?php endif; ?>
                                        <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
                                    </div>

                                    <h2 class="lg:text-lg font-semibold text-white transition duration-100">
                                        <?php echo CFS()->get('name'); ?>
                                    </h2>
                                </div>
                            </a>
                            <!-- article - end -->
                        <?php endwhile; endif; ?>
                        <?php wp_reset_query(); ?>
                    <?php endforeach; // 子カテゴリーのループ終了 ?>
                <?php endforeach; // 親カテゴリーのループ終了 ?>
            </div>
        </div>

        <div class="mt-10 flex justify-center">
            <a class="link text-[#20b2aa] hover:text-white hover:bg-[#20b2aa]" href="<?php home_url(); ?>/menu">View More</a>
        </div>
    </section>

    <section class="sec-news my-5 w-[90%]">
        <div class="md:flex">
            <div class="mb-6 md:w-2/5 text-left">
                <h2 class="text-4xl lg:text-5xl font-bold tracking-wide text-[#d194f7]">News</h2>
                <p class="m-1 text-lg lg:text-xl">ニュース</p>
            </div>

            <?php
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'news', // 投稿タイプ
                'category__not_in' => 5, // カテゴリーID'5'(今週のランチ)を除外
                'posts_per_page' => 3, // 表示件数
                'paged' => get_query_var('paged')
            );
            $new_query = new WP_Query($args);
            ?>
            <?php if ($new_query->have_posts()) : ?>
                <dl class="w-full border-t border-[#d194f7]">
                    <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                        <dt class="pt-6 pb-1 px-4 text-left text-sm lg:text-lg">
                            <?php the_time('Y.m.d'); ?>
                        </dt>
                        <dd class="pb-6 px-4 text-left text-sm lg:text-lg border-b border-[#d194f7]">
                            <?php the_title(); ?>
                        </dd>
                    <?php endwhile; ?>
                </dl>
            <?php else: endif; ?>
            <?php wp_reset_postdata();?>
        </div>

        <div class="mt-10 flex justify-center">
            <a class="link text-[#20b2aa] hover:text-white hover:bg-[#20b2aa]" href="<?php home_url(); ?>/news">View More</a>
        </div>
    </section>

    <section class="sec-blog my-5 w-[90%] mb-10">
        <div class="md:w-2/5 text-left">
            <h2 class="text-4xl lg:text-5xl font-bold tracking-wide text-[#d194f7]">Blog</h2>
            <p class="m-1 text-xl lg:text-2xl">ブログ</p>
        </div>


        <div class="max-w-md mx-auto grid gap-6 lg:grid-cols-3 md:max-w-7xl md:grid-cols-2">
        <!-- article - start -->
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="border rounded-lg bg-white hover:shadow-lg hover:bg-[#ecf03c]">
                <div class="flex flex-col-reverse">
                    <div class="flex-1">
                        <div class="p-6">
                            <?php if (is_first()): ?>
                                <div class="text-left lg:flex justify-flex-start items-center">
                                    <!-- 投稿日 -->
                                    <span class="mr-6 text-left text-sm">
                                        <?php echo get_post_time('Y.m.d l'); ?>
                                    </span>
                                    <span class="mr-4 w-12 inline-block p-1 rounded-sm font-bold text-center text-sm bg-[#ff4337] text-white">
                                        NEW
                                    </span>
                                </div>
                            <?php else: ?>
                                <div class="text-left lg:flex justify-flex-start items-center">
                                <!-- 投稿日 -->
                                    <span class="text-left text-sm">
                                        <?php echo get_post_time('Y.m.d l'); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <!-- タイトル -->
                            <h3 class="mt-4 text-lg font-semibold">
                                <?php the_title(); ?>
                            </h3>
                        </div>
                    </div>
                    <div class="flex-shrink-0 overflow-hidden">
                        <img
                            class="h-48 w-full object-cover sm:h-56 transition duration-200 hover:scale-110"
                            src="<?php the_post_thumbnail_url(); ?>" 
                            alt="サムネイル画像"
                        >
                    </div>
                </div>
            </a>
        <?php endwhile; else: ?>
        <?php endif; ?>
        <!-- article - end -->
        </div>

        <div class="mt-10 flex justify-center">
            <a class="link text-[#20b2aa] hover:text-white hover:bg-[#20b2aa]" href="<?php home_url(); ?>/blog">View More</a>
        </div>
    </section>

    <section class="sec-contact mt-5 mb-20 w-[90%]">
        <div class="md:flex">
            <div class="md:w-[30%] text-left">
                <h2 class="text-4xl lg:text-5xl font-bold tracking-wide text-[#d194f7]">Contact</h2>
                <p class="m-1 text-lg lg:text-xl">お問い合わせ</p>
            </div>

            <div>
                <p>
                    ご意見やご相談、お問い合わせはこちらからお願いいたします。
                </p>

            </div>
        </div>

        <div class="flex justify-center">
            <a class="link text-[#20b2aa] hover:text-white hover:bg-[#20b2aa]" href="<?php home_url(); ?>/contact">Contact</a>
        </div>
    </section>

<?php get_footer(); ?>