<?php
/*
Template Name:会社概要
*/
?>

<?php get_header();?>

    <section class="w-[97%] md:w-[90%] my-8">

        <dl class="h-[300px] flex flex-wrap items-center">
            <dt class="left w-1/2">会社名</dt>
            <dd class="right w-1/2"><?php echo CFS()->get('name'); ?></dd>
            <dt class="left w-1/2">設立</dt>
            <dd class="right w-1/2"><?php echo CFS()->get('found'); ?></dd>
            <dt class="left w-1/2">代表者</dt>
            <dd class="right w-1/2"><?php echo CFS()->get('CEO'); ?></dd>
            <dt class="left w-1/2">事業内容</dt>
            <dd class="right w-1/2"><?php echo CFS()->get('business-details'); ?></dd>
            <dt class="left w-1/2">所在地</dt>
            <dd class="right w-1/2"><?php echo CFS()->get('address'); ?></dd>
            <dt class="left w-1/2">連絡先</dt>
            <dd class="right w-1/2"><?php echo CFS()->get('tel'); ?></dd>
        </dl>

    </section>

<?php get_footer(); ?>