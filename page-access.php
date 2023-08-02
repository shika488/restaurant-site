<?php
/*
Template Name:アクセス
*/
?>

<?php get_header();?>

    <section class="w-[97%] lg:w-[90%] mb-5 md:my-5 md:flex justify-between items-center">

        <dl class="md:w-[50%] lg:h-[350px] mb-4 md:mb-0 md:mr-5 flex flex-wrap items-center">
            <dt class="left">住所</dt>
            <dd class="right"><?php echo CFS()->get('address', 9); ?></dd>
            <dt class="left">連絡先</dt>
            <dd class="right"><?php echo CFS()->get('tel', 9); ?></dd>
            <dt class="left">最寄り駅</dt>
            <dd class="right"><?php echo CFS()->get('nearest'); ?></dd>
            <dt class="left">営業時間</dt>
            <dd class="right"><?php echo CFS()->get('open'); ?></dd>
            <dt class="left">定休日</dt>
            <dd class="right"><?php echo CFS()->get('close'); ?></dd>
        </dl>

        <div class="md:w-[50%]">
            <div class="w-full h-full relative pt-[75%]"><?php echo CFS()->get('map'); ?></div>
        </div>

    </section>

<?php get_footer(); ?>