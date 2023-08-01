<?php
/*
Template Name:アクセス
*/
?>

<?php get_header();?>

    <section class="w-[97%] md:w-[90%] my-5 md:flex justify-between items-center">
        <div class="md:w-[50%]">
            <div class="w-full h-full relative pt-[75%]"><?php echo CFS()->get('map'); ?></div>
        </div>
        
        <table class="mt-5 md:mt-0 md:w-[48%] h-72 md:h-[350px] text-sm md:text-base border-none">
            <tbody class="border-none">
                <tr class="border-none">
                    <th class="left">住所</th>
                    <td class="right"><?php echo CFS()->get('address', 9); ?></td>
                </tr>
                <tr class="border-none">
                    <th class="left">連絡先</th>
                    <td class="right"><?php echo CFS()->get('tel', 9); ?></td>
                </tr>
                <tr class="border-none">
                    <th class="left">最寄り駅</th>
                    <td class="right text-base"><?php echo CFS()->get('nearest'); ?></td>
                </tr>
                <tr class="border-none">
                    <th class="left">営業時間</th>
                    <td class="right text-base"><?php echo CFS()->get('open'); ?></td>
                </tr>
                <tr class="border-none">
                    <th class="left">定休日</th>
                    <td class="right text-base"><?php echo CFS()->get('close'); ?></td>
                </tr>
            </tbody>
        </table>
    </section>

<?php get_footer(); ?>