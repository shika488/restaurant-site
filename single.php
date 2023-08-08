<?php get_header();?>

    <section class="w-[90%] lg:max-w-[840px] mx-auto">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <div class="my-8 lg:my-12 w-full text-left flex flex-col">
            <div class="my-5 flex">
                <!-- 投稿日 -->
                <span class="text-left text-sm">
                    <?php echo get_post_time('Y.m.d l'); ?>
                </span>
                <!-- タグ -->
                <div class="ml-10">
                    <?php the_tags('<span class="tag">', '</span> <span>', '</span>'); ?>
                </div>
            </div>
            <!-- タイトル -->
            <h3 class="text-xl md:text-3xl font-medium">
                <?php the_title(); ?>
            </h3>
            <!-- アイキャッチ画像 -->
            <div class="my-4 md:my-6 mx-auto">
                <?php
                if (has_post_thumbnail()): the_post_thumbnail();
                endif; ?>
            </div>
            <!-- 本文 -->
            <div class="mx-auto md:text-lg flex flex-col">
                <?php the_content(); ?>
            </div>
        </div>

        <!-- ページネーション -->
        <div class="my-8 mx-2 md:flex items-center justify-between lg:text-lg">
            <div class="my-2 md:w-1/3 hover:text-[#5be5d3] active:text-[#5be5d3] text-left"><?php previous_post_link(); ?></div>
            <div class="my-2 md:w-1/5 hover:text-[#5be5d3] active:text-[#5be5d3]"><a href="<?php home_url(); ?>/blog">ブログ一覧</a></div>
            <div class="my-2 md:w-1/3 hover:text-[#5be5d3] active:text-[#5be5d3] text-right"><?php next_post_link(); ?></div>
        </div>

        <?php endwhile; endif; ?>
    </section>

<?php get_footer(); ?>