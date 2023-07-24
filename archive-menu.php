<?php get_header();?>

    <section class="mx-auto">
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16">
                    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                        期間限定メニュー
                    </h2>
                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                        <!-- This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated. -->
                    </p>
                </div>
                <!-- text - end -->

                <?php
                $args = array(
                    'post_type' => 'menu', // 投稿タイプ
                    'category_name' => 'limited-time', // カテゴリ名（スラッグ）
                    'posts_per_page' => 10, // 表示件数
                    'meta_key'=>'display-order',
                    'orderby'=>'meta_value_num',
                    'order' => 'asc'
                );
                $new_query = new WP_Query($args);
                ?>
                <?php if ($new_query->have_posts()) : ?>
                <div class="mx-auto grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8 md:w-10/12">
                    <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                        <?php if (!get_post_meta($post->ID, 'stop-sales', true)): ?>

                            <!-- article - start -->
                            <a href="#" class="group relative flex h-48 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-64">
                                <img src="<?php echo CFS()->get('image'); ?>" loading="lazy" alt="" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent"></div>

                                <div class="relative mt-auto p-4">
                                    <h2 class="mb-2 text-xl md:text-lg font-semibold text-white transition duration-100">
                                        <?php echo CFS()->get('name'); ?>
                                    </h2>
                                    <span class="block text-sm text-gray-200">
                                        <?php echo CFS()->get('price').'円(税込)'; ?>
                                    </span>
                                    <span class="font-semibold text-indigo-300">
                                        Read more
                                    </span>
                                </div>
                            </a>
                            <!-- article - end -->
                        <?php else: endif; ?>
                    <?php endwhile; else: ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <div class="mt-20">
                    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                        メニュー
                    </h2>

                    <div class="my-6 text-left">
                        <?php
                        $cats = get_categories(array(
                            'child_of' => '9',//※特定親のカテゴリーID
                            // 'title_li' => '',//見出しをなしに
                            // 'orderby' => 'ID',//ソート規則
                        ));
                        usort($cats, function($a, $b){
                            return $a->description - $b->description;
                        });

                        foreach ($cats as $cat): ?>
                        <?php
                        $menu_name = $cat->name;
                        $slug = $cat->slug;

                        $args = array(
                            'post_type' => 'menu', // 投稿タイプ
                            'category_name' => $slug, // カテゴリ名（スラッグ）
                            'posts_per_page' => 20, // 表示件数
                            'meta_key'=>'display-order',
                            'orderby'=>'meta_value_num',
                            'order' => 'asc'
                        );
                        $new_query = new WP_Query($args);
                        ?>

                        <h3 class="text-lg font-bold text-gray-800 lg:text-xl border-b-2 border-yellow-300 inline-block">
                            <?php echo $menu_name; ?>
                        </h3>

                        <div class="mt-3 mb-8">
                            <?php if ($new_query->have_posts()): ?>
                                <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                                    <?php if (!(get_post_meta($post->ID, 'stop-sales', true))): ?>
                                        <div class="flex">
                                            <p><?php echo CFS()->get('name'); ?></p>
                                            <p class="ml-8"><?php echo CFS()->get('price').'円(税込)'; ?></p>
                                        </div>
                                    <?php else: endif; ?>
                                <?php endwhile; else: ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>