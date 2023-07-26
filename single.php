<?php get_header();?>

    <section>
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <div class="w-full bg-gray-100 py-6 sm:py-8 lg:py-12">
                <div class="w-11/12 md:w-4/6 m-auto max-w-screen-2xl px-4 md:px-8">
                    <div class="rounded-md text-left bg-white px-10 py-6 md:py-8 lg:py-12">
                        <p class="mt-0 font-semibold text-gray-500 text-sm">
                            <?php echo get_post_time('Y-m-d l'); ?>
                        </p>

                        <h2 class="mb-4 text-xl font-bold text-gray-800 md:mb-6 md:text-2xl">
                            <?php the_title(); ?>
                        </h2>

                        <div class="mx-auto max-w-screen-md text-gray-600 md:text-lg">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; endif;  ?>
    </section>

<?php get_footer(); ?>