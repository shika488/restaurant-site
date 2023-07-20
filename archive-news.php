<?php get_header();?>

    <section class="">
        
        <div>
            <h3>お知らせ</h3>
            <?php
            $args = array(
                'post_type' => 'news', // 投稿タイプ
                'category_name' => 'new-info', // カテゴリ名（スラッグ）
                'posts_per_page' => 3 // 表示件数
            );
            $new_query = new WP_Query($args);
            ?>

            <?php if ($new_query->have_posts()) : ?>
                <dl>
                <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <dt><?php the_time('Y.m.d'); ?></dt>
                        <dd><?php the_title(); ?></dd>
                    </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                </dl>
            <?php endif; ?>
        </div>
<br>
<br>
        <div>
            <h3>今週のお知らせ</h3>

            <?php
            $args = array(
                'post_type' => 'news', // 投稿タイプ
                'category_name' => 'news-this-week', // カテゴリ名（スラッグ）
                'posts_per_page' => 1 // 表示件数
            );
            $new_query = new WP_Query($args);
            ?>

            <?php if ($new_query->have_posts()) : ?>
                <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                    <p><?php the_title(); ?></p>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>


        </div>

    </section>


<?php get_footer(); ?>
