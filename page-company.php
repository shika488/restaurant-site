<?php
/*
Template Name:会社概要
*/
?>

<?php get_header();?>

    <section>

        <table>
            <tr>
                <td class="">会社名</td>
                <td class=""><?php echo CFS()->get('name'); ?></td>
            </tr>
            <tr>
                <td class="">設立</td>
                <td class=""><?php echo CFS()->get('found'); ?></td>
            </tr>
            <tr>
                <td class="">代表者</td>
                <td class=""><?php echo CFS()->get('CEO'); ?></td>
            </tr>
            <tr>
                <td class="">事業内容</td>
                <td class=""><?php echo CFS()->get('business-details'); ?></td>
            </tr>
            <tr>
                <td class="">所在地</td>
                <td class=""><?php echo CFS()->get('address'); ?></td>
            </tr>
            <tr>
                <td class="">連絡先</td>
                <td class=""><?php echo CFS()->get('tel'); ?></td>
            </tr>
        </table>
    </section>

<?php get_footer(); ?>