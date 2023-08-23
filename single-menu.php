<?php get_header();?>

    <section class="w-[95%] lg:w-9/12">
        <div class="my-8 w-full border-8 border-[#f4efe9] rounded-xl animate-[fadeUp_2s]">
            <div class="m-4 lg:m-6 p-6 lg:p-10 border-8 border-white bg-[#f4efe9] rounded-xl">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <div class="flex">
                    <div class="<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?> px-4 gap-2 text-left text-xl bg-white rounded-lg flex">
                        <?php if ($cat == 'limited-time'): ?>
                            <span class="limited-time"></span>
                        <?php elseif ($cat == 'salad'): ?>
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
                </div>
                <div class="mt-4">
                    <img class="mx-auto w-60 lg:w-96 h-60 lg:h-96 object-cover" src="<?php echo CFS()->get('image'); ?>" alt="メニューの画像">
                    <h2 class="mt-6 text-2xl font-bold"><?php echo CFS()->get('name'); ?></h2>
                    <p><?php echo CFS()->get('price').'円(税込)'; ?></p>
                    <p class="text-base lg:text-lg"><?php echo CFS()->get('description'); ?></p>
                </div>
            </div>
        </div>

        <div class="my-10 mx-auto md:w-1/5">
            <a class="hover:text-[#20b2aa] active:text-[#20b2aa]" href="<?php home_url(); ?>/menu">メニュー一覧</a>
        </div>

        <?php endwhile; endif;?>

    </section>

<?php get_footer(); ?>