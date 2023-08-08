<?php
/*
Template Name:お問い合わせ
*/
?>

<?php get_header();?>

    <section class="mx-auto w-[95%] md:w-[90%] animate-[fadeUp_2s]">
        <?php echo do_shortcode('[contact-form-7 id="138" title="Contact" html_class="h-adr"]'); ?>
    </section>

<?php get_footer(); ?>