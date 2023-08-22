'use strict';

const my_splide = new Splide('.splide', {
    arrows: false, // 矢印ボタンを非表示
    pagination: false, // ページネーションを非表示
    autoplay: true, // 自動再生
    type: "fade", // フェード
    rewind: true, // スライダーの終わりまで行ったら先頭に巻き戻す
    pauseOnHover: false, // カーソルが乗ってもスクロールを停止させない
    interval: 5500, // 自動再生の間隔
    speed: 2000, // スライダーの移動時間
}).mount();