<?php get_header();?>

    <section class="my-5 mx-auto w-[90%] lg:w-[85%]">
        <ul class="my-6 flex justify-between flex-wrap md:after:content-[''] md;after:block md:after:w-[30%]">
            <!-- article - start -->
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <li class="my-5 w-[45%] md:w-[30%] border rounded-lg border-[#f4efe9] hover:bg-[#ecf03c] active:bg-[#ecf03c] drop-shadow-xl">
                <a href="<?php the_permalink(); ?>" class="flex flex-col overflow-hidden">
                    <div class="h-48 md:h-64 overflow-hidden">
                        <img src="<?php the_post_thumbnail_url(); ?>" loading="lazy" alt="サムネイル画像"
                            class="inset-0 h-full w-full object-cover object-center transition duration-300 hover:scale-110"/>
                    </div>

                    <div class="flex flex-1 flex-col p-3 md:p-6">
                        <?php if (is_first()): ?>
                            <div class="mb-3 text-left lg:flex">
                                <span class="mr-6 text-left text-sm">
                                    <?php echo get_post_time('Y-m-d l'); ?>
                                </span>
                                <span class="mr-4 w-12 inline-block py-1 px-2 rounded-sm font-bold text-center text-sm bg-[#ff0a91] text-white">
                                    NEW
                                </span>
                            </div>
                        <?php else: ?>
                            <!-- 投稿日 -->
                            <span class="mb-4 text-left text-sm">
                                <?php echo get_post_time('Y-m-d l'); ?>
                            </span>
                        <?php endif; ?>
                        <!-- タイトル -->
                        <h3 class="mb-2 text-lg font-semibold">
                            <?php the_title(); ?>
                        </h3>
                    </div>
                </a>
            </li>
            <?php endwhile; else: ?>
            <?php endif; ?>
            <!-- article - end -->
        </ul>
    </section>

<?php get_footer(); ?>