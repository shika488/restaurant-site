<?php get_header();?>

    <section>
        <div class="splide" role="group" aria-label="Splideの基本的なHTML">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide overflow-hidden">
                        <img class="w-full h-auto md:h-[60%] object-cover ease-out duration-2000 relative"
                            src="<?php echo get_template_directory_uri(); ?>/images/rice-and-side.jpg" alt="ご飯とおかずの写真">
                        <p class="slide-note text-pink-600 bg-pink-100">
                            忙しいあなたを支えたい
                        </p>
                    </li>
                    <li class="splide__slide">
                        <img class="w-full h-auto md:h-[60%] object-cover ease-out duration-2000"
                            src="<?php echo get_template_directory_uri(); ?>/images/rice-ball.jpg" alt="おにぎりの写真">
                        <p class="slide-note text-green-700 bg-green-50">
                            特別じゃない日に来てください
                        </p>
                    </li>
                    <li class="splide__slide">
                        <img class="w-full h-auto md:h-[60%] object-cover ease-out duration-2000"
                            src="<?php echo get_template_directory_uri(); ?>/images/vegetable.jpg" alt="野菜の写真">
                        <p class="slide-note text-yellow-600 bg-yellow-50">
                            野菜がたくさん入っています
                        </p>
                    </li>
                    <li class="splide__slide">
                        <img class="w-full h-auto md:h-[60%] object-cover ease-out duration-2000"
                            src="<?php echo get_template_directory_uri(); ?>/images/cafe.jpg" alt="コーヒーとデザートの写真">
                        <p class="slide-note text-pink-600 bg-pink-100">
                            週末はカフェになります
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

<?php get_footer(); ?>