<?php get_header();?>

    <section class="mx-auto">
        <div class="bg-white w-11/12 mx-auto py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-xl px-4 md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                    Blog
                </h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                    <!-- This is a section of some simple filler text, also known as placeholder text. -->
                </p>
                </div>
                <!-- text - end -->

                <div class="grid gap-8 sm:grid-cols-2 sm:gap-12 lg:grid-cols-2 xl:grid-cols-2 xl:gap-16">
            
                    <!-- article - start -->
                    <?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <div class="flex flex-col items-center gap-4 md:flex-row lg:gap-6">
                            <a href="<?php the_permalink(); ?>" class="group relative block h-56 w-full shrink-0 self-start overflow-hidden rounded-sm bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40">
                            <img src="<?php the_post_thumbnail_url(); ?>" loading="lazy" alt="m" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>

                            <div class="flex flex-col gap-2">
                                <?php if (is_first()): ?>
                                    <span class="mr-4 w-12 inline-block py-1 px-2 rounded-sm font-bold text-center text-sm bg-rose-500 text-white">
                                        NEW
                                    </span>
                                <?php else: ?>
                                <?php endif; ?>
                                    <span class="text-sm text-gray-400">
                                        <?php echo get_post_time('Y-m-d l'); ?>
                                    </span>

                                <h2 class="text-xl font-bold text-gray-800">
                                    <a href="<?php the_permalink(); ?>" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <div>
                                    <a href="<?php the_permalink(); ?>" class="font-semibold text-base text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">
                                        Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; else: ?>
                    <!-- article - end -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>