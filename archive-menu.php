<?php get_header();?>

    <section class="mx-auto">
        <div class="bg-white py-6 sm:py-8 lg:py-12 animate-[fadeUp_2s]">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <h2 class="mb-8 pb-2 text-center text-2xl font-bold text-gray-800 lg:text-3xl border-b-2 border-[#009100] inline-block">
                        期間限定メニュー
                    </h2>

                <?php
                $args = array(
                    'post_type' => 'menu', // 投稿タイプ
                    'category_name' => 'limited-time', // 「期間限定」カテゴリ名（スラッグ）
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
                            <a href="<?php the_permalink(); ?>" class="group relative flex h-48 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-64">
                                <img src="<?php echo CFS()->get('image'); ?>" loading="lazy" alt="" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent"></div>

                                <div class="relative mt-auto p-4">
                                    <h2 class="mb-2 text-xl md:text-lg font-semibold text-white transition duration-100">
                                        <?php echo CFS()->get('name'); ?>
                                    </h2>
                                    <p class="m-0 block text-sm text-gray-200">
                                        <?php echo CFS()->get('price').'円(税込)'; ?>
                                    </p>
                                </div>
                            </a>
                            <!-- article - end -->
                        <?php else: endif; ?>
                    <?php endwhile; else: ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="mx-auto max-w-screen-2xl md:px-8">
                <div class="my-10 py-6 bg-[#f3efe8]">
                    <h2 class="mb-6 pb-2 text-center text-2xl font-bold text-gray-800 lg:text-3xl border-b-2 border-[#FF4337] inline-block">
                        フードメニュー
                    </h2>
                    <?php
                    $cats = get_categories(array(
                        'child_of' => '9',//「フード」（親のカテゴリーID）
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
                        'posts_per_page' => 100, // 表示件数
                        'meta_key'=>'display-order',
                        'orderby'=>'meta_value_num',
                        'order' => 'asc'
                    );
                    $new_query = new WP_Query($args);
                    ?>

                    <div class="mt-3 mb-8 mx-auto w-full lg:w-3/4 text-left">
                        <h3 class="mb-2 p-2 text-lg font-bold text-gray-800 lg:text-xl border-l-4 border-b-2 border-[#FF4337]">
                            <?php echo $menu_name; ?>
                        </h3>

                        <ul class="lg:columns-2">
                        <?php if ($new_query->have_posts()): while ($new_query->have_posts()) : $new_query->the_post(); ?>
                            <?php if (!(get_post_meta($post->ID, 'stop-sales', true))): ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>" class="px-4 rounded-lg hover:bg-[#dfdbd5] active:bg-[#dfdbd5] flex justify-between">
                                        <p class="my-1 md:text-lg"><?php echo CFS()->get('name'); ?></p>
                                        <p class="ml-8 my-1 md:text-lg"><?php echo CFS()->get('price').'円(税込)'; ?></p>
                                    </a>
                                </li>
                            <?php else: endif; ?>
                        <?php endwhile; else: ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-14">
                    <h2 class="mb-6 pb-2 text-center text-2xl font-bold text-gray-800 lg:text-3xl border-b-2 border-[#2e8b57] inline-block">
                        ドリンクメニュー
                    </h2>
                    <?php
                    $cats = get_categories(array(
                        'child_of' => '23',//「ドリンク」（親のカテゴリーID）
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
                        'posts_per_page' => 100, // 表示件数
                        'meta_key'=>'display-order',
                        'orderby'=>'meta_value_num',
                        'order' => 'asc'
                    );
                    $new_query = new WP_Query($args);
                    ?>

                    <div class="mt-3 mb-8 mx-auto w-[90%] md:w-3/4 text-left">
                        <h3 class="mb-2 p-2 text-lg font-bold text-gray-800 lg:text-xl border-l-4 border-b-2 border-[#2e8b57] rounded-sm">
                            <?php echo $menu_name; ?>
                        </h3>

                        <ul class="lg:columns-2">
                        <?php if ($new_query->have_posts()): ?>
                            <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                                <?php if (!(get_post_meta($post->ID, 'stop-sales', true))): ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>" class="px-4 rounded-lg hover:bg-[#dfdbd5] active:bg-[#dfdbd5] flex justify-between">
                                            <p class="my-1 md:text-lg"><?php echo CFS()->get('name'); ?></p>
                                            <p class="ml-8 my-1 md:text-lg"><?php echo CFS()->get('price').'円(税込)'; ?></p>
                                        </a>
                                    </li>
                                <?php else: endif; ?>
                            <?php endwhile; else: ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>