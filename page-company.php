<?php
/*
Template Name:会社概要
*/
?>

<?php get_header();?>

    <section class="w-[97%] md:w-[90%] my-8">
        <table class="mx-auto w-[90%] h-[300px] border-none">
            <tbody class="border-none">
                <tr class="w-full table-row border-none">
                    <th class="left w-1/2">会社名</th>
                    <td class="right w-1/2"><?php echo CFS()->get('name'); ?></td>
                </tr>
                <tr class="w-full table-row border-none">
                    <th class="left">設立</th>
                    <td class="right"><?php echo CFS()->get('found'); ?></td>
                </tr>
                <tr class="w-full table-row border-none">
                    <th class="left">代表者</th>
                    <td class="right"><?php echo CFS()->get('CEO'); ?></td>
                </tr>
                <tr class="w-full table-row border-none">
                    <th class="left">事業内容</th>
                    <td class="right"><?php echo CFS()->get('business-details'); ?></td>
                </tr>
                <tr class="w-full table-row border-none">
                    <th class="left">所在地</th>
                    <td class="right"><?php echo CFS()->get('address'); ?></td>
                </tr>
                <tr class="w-full table-row border-none">
                    <th class="left">連絡先</th>
                    <td class="right"><?php echo CFS()->get('tel'); ?></td>
                </tr>
            </tbody>
        </table>
    </section>

<?php get_footer(); ?>