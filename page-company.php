<?php
/*
Template Name:会社概要
*/
?>

<?php get_header();?>

    <section class="w-[90%] md:w-full my-8 animate-[fadeUp_2s]">
        <div class="mt-4 md:mt-8 md:h-[480px] lg:h-[550px] rounded-lg md:relative">
            <dl class="p-4 md:ml-10 w-full md:w-1/2 flex flex-wrap items-center bg-[#f4efe9] rounded-lg">
                <dt class="left pr-8 py-4 w-1/3">会社名</dt>
                <dd class="right py-4 w-2/3"><?php echo CFS()->get('name'); ?></dd>
                <dt class="left pr-8 py-4 w-1/3">設立</dt>
                <dd class="right py-4 w-2/3"><?php echo CFS()->get('found'); ?></dd>
                <dt class="left pr-8 py-4 w-1/3">代表者</dt>
                <dd class="right py-4 w-2/3"><?php echo CFS()->get('CEO'); ?></dd>
                <dt class="left pr-8 py-4 w-1/3">事業内容</dt>
                <dd class="right py-4 w-2/3"><?php echo CFS()->get('business-details'); ?></dd>
                <dt class="left pr-8 py-4 w-1/3">所在地</dt>
                <dd class="right py-4 w-2/3"><?php echo CFS()->get('address'); ?></dd>
                <dt class="left pr-8 py-4 w-1/3">連絡先</dt>
                <dd class="right py-4 w-2/3"><?php echo CFS()->get('tel'); ?></dd>
            </dl>

            <img class="w-full md:w-[40%] h-80 md:h-3/4 object-cover rounded-lg md:absolute top-[20%] left-1/2" src="<?php echo get_template_directory_uri(); ?>/images/company.jpg" alt="会社の写真">
        </div>

        <div class="mt-14 md:w-[95%] md:flex justify-between items-center">
            <div class="mx-auto w-full md:w-5/12">
                <img class="mx-auto w-1/2 md:w-2/3 rounded-full" src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="代表の写真">
                <p>代表取締役社長　しか</p>
            </div>
            <div class="py-2 px-6 md:px-10 w-full md:w-7/12 bg-[#f4efe9] rounded-lg">
                <h3 class="my-6 px-4 text-2xl font-bold border-x-2 border-[#d194f7] inline-block message">代表メッセージ</h3>
                <div class="text-left">
                    <h4 class="p-1 text-lg font-bold border-b-2 border-[#d194f7] inline-block">忙しいあなたを支えたい</h4>
                    <p>
                        社会人であれ、学生であれ、皆、毎日忙しい。<br>
                        そんな忙しい毎日の中で「食事」に気を配れている人は少ないと思います。<br>
                        忙しいあなたを支える体や心を作るには、「食べること」は大切です。<br>
                        私たちはあなたを「食」でバックアップします。
                    </p>
                    <h4 class="p-1 text-lg font-bold border-b-2 border-[#d194f7] inline-block">特別じゃない日に来てください</h4>
                    <p>
                        豪華なメニューはありません。<br>
                        華やかなメニューはありません。<br>
                        記念日用のメニューはありません。<br>
                        栄養バランスを考えたメニューがあります。<br>
                        特別な日ではなく、何でもないいつもの日に来てください。
                    </p>
                    <h4 class="p-1 text-lg font-bold border-b-2 border-[#d194f7] inline-block">週末はカフェになります</h4>
                    <p>
                        週末はレストランはお休みします。<br>
                        代わりにカフェになります。<br>
                        お休みの日は、ゆっくりお茶しに来てください。
                    </p>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-10 md:mt-20 p-6 w-full md:w-2/3 bg-[#f4efe9] rounded-lg">
            <h3 class="my-2 px-4 text-2xl font-bold tracking-widest border-x-2 border-[#d194f7] history inline-block">沿 革</h3>
            <div class="text-left">
                <p>
                    2000年 創業。「しか食堂」として現在の地にオープン。毎日利用しやすく気軽に来てほしいお店を目指し、低価格で栄養バランスの取れたメニューを揃える。
                </p>
                <p>
                    2010年、店舗拡大。不揃い等を理由に廃棄となる野菜の利用をすべく、活動を始める。
                </p>
                <p>
                    2020年、海外進出を果たす。
                </p>
                <p>
                    2022年、現代表取締役就任。「Shika Dining」としてリニューアルオープン。
                </p>
            </div>
        </div>

    </section>

<?php get_footer(); ?>