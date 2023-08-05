<?php get_header();?>

    <section class="my-5 w-[90%] md:w-[75%] lg:w-[60%]">

        <?php
        $args = array(
            'post_type' => 'news', // 投稿タイプ
            'category__not_in' => 5, // カテゴリーID'5'(今週のランチ)を除外
            'posts_per_page' => 5 // 表示件数
        );
        $new_query = new WP_Query($args);
        ?>

        <?php if ($new_query->have_posts()) : ?>
            <dl class="w-full md:flex flex-wrap items-center">
                <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                    <dt class="md:w-1/5 pt-6 pb-1 md:py-6 px-4 text-left text-sm lg:text-lg md:border-b">
                        <?php the_time('Y.m.d'); ?>
                    </dt>
                    <dd class="md:w-4/5 pb-6 md:py-6 px-4 text-left text-sm lg:text-lg border-b">
                        <?php the_title(); ?>
                    </dd>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </dl>
        <?php endif; ?>

    </section>


<?php get_footer(); ?>
