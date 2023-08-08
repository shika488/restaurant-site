<?php get_header();?>

    <section class="my-5 w-[90%] md:w-[75%] lg:w-[60%]">

        <?php
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'news', // 投稿タイプ
            'category__not_in' => 5, // カテゴリーID'5'(今週のランチ)を除外
            'posts_per_page' => 5, // 表示件数
            'paged' => get_query_var('paged')
        );
        $new_query = new WP_Query($args);
        ?>

        <?php if ($new_query->have_posts()) : ?>
            <dl class="w-full md:flex flex-wrap items-center animate-[fadeUp_2s]">
                <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                    <dt class="md:w-1/5 pt-6 pb-1 md:py-6 px-4 text-left text-sm lg:text-lg md:border-b border-[#d194f7]">
                        <?php the_time('Y.m.d'); ?>
                    </dt>
                    <dd class="md:w-4/5 pb-6 md:py-6 px-4 text-left text-sm lg:text-lg border-b border-[#d194f7]">
                        <?php the_title(); ?>
                    </dd>
                <?php endwhile; ?>
            </dl>
        <?php else: endif; ?>

        <!-- pagenation -->
        <div class="navigation animate-[fadeIn_2s]">
            <?php if (function_exists('wp_pagenavi')) { wp_pagenavi(array('query'=> $new_query));} ?>
        </div>
        <!-- /pagenation -->

        <?php wp_reset_postdata();?>

    </section>

<?php get_footer(); ?>
