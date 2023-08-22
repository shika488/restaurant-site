    </main>

    <footer class="py-2 w-full bg-[#ff4337] text-white">
        <div class="mx-auto py-2 w-[95%] lg:w-[70%] flex flex-col-reverse lg:flex-row items-center">
            <div class="pt-2 lg:pt-0 lg:w-1/5 flex gap-4">
                <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
                    <img class="w-10 h-10 rounded-full" src="<?php echo get_template_directory_uri(); ?>/images/twitter.jpeg" alt="ツイッターのアイコン">
                </a>
                <a href="https://facebook.com/" target="_blank" rel="noopener noreferrer">
                    <img class="w-10 h-10 rounded-full" src="<?php echo get_template_directory_uri(); ?>/images/facebook.jpeg" alt="フェイスブックのアイコン">
                </a>
            </div>

            <nav class="mb-0 mx-auto lg:mx-0 lg:w-4/5 text-sm md:text-base">
                <ul class="w-full flex justify-center lg:justify-end flex-wrap">
                    <li class="partition border-l">
                        <a class="f-nav"
                            href="<?php echo esc_url(home_url('/')); ?>">
                            Home
                        </a>
                    </li>
                    <li class="partition">
                        <a class="f-nav"
                            href="<?php home_url(); ?>/menu">
                            Menu
                        </a>
                    </li>
                    <li class="partition">
                        <a class="f-nav"
                            href="<?php home_url(); ?>/news">
                            News
                        </a>
                    </li>
                    <li class="partition">
                        <a class="f-nav" 
                            href="<?php home_url(); ?>/blog">
                            Blog
                        </a>
                    </li>
                    <li class="partition">
                        <a class="f-nav" 
                            href="<?php home_url(); ?>/access">
                            Access
                        </a>
                    </li>
                    <li class="partition">
                        <a class="f-nav" 
                            href="<?php home_url(); ?>/company">
                            Company
                        </a>
                    </li>
                    <li class="partition">
                        <a class="f-nav" 
                            href="<?php home_url(); ?>/contact">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <small class="my-3">© <span class="font-title tracking-widest"><?php bloginfo('name'); ?></span> All Rights Reserved.</small>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>