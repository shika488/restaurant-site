<?php
/*
Template Name:アクセス
*/
?>

<?php get_header();?>

    <section>
        <div><?php echo CFS()->get('map'); ?></div>
        <table>
            <tr>
                <td class="">住所</td>
                <td class=""><?php echo CFS()->get('address'); ?></td>
            </tr>
            <tr>
                <td class="">連絡先</td>
                <td class=""><?php echo CFS()->get('tel'); ?></td>
            </tr>
            <tr>
                <td class="">最寄り駅</td>
                <td class=""><?php echo CFS()->get('nearest'); ?></td>
            </tr>
            <tr>
                <td class="">営業時間</td>
                <td class=""><?php echo CFS()->get('open'); ?></td>
            </tr>
            <tr>
                <td class="">定休日</td>
                <td class=""><?php echo CFS()->get('close'); ?></td>
            </tr>
        </table>
    </section>

<?php get_footer(); ?>