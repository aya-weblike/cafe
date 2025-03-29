// 「$」を「jQuery」で置き換えるために、デフォルトのエイリアスを「$j」に置き換える
var $j = jQuery;

/*-------------------------------------------
ハンバーガーメニューの動き
-------------------------------------------*/
const ham = $j('#js-hamburger');
const nav = $j('#js-nav');
ham.on('click', function () { //ハンバーガーメニューをクリックしたら
  ham.toggleClass('active'); // ハンバーガーメニューにactiveクラスを付け外し
  nav.toggleClass('active'); // ナビゲーションメニューにactiveクラスを付け外し
});

/*-------------------------------------------
フェードイン
-------------------------------------------*/
// スクロールしたら、ふわっと表示
// 監視対象が範囲内に現れたら実行する動作
const animateFade = (entries,obs) => {
	entries.forEach((entry) => {
		if(entry.isIntersecting){
			entry.target.animate(
				{
					opacity:[0,1],
					filter:['blur(.4rem)','blur(0)'],
					translate:['0 4rem',0],
				},
				{
					duration:2000,
					easing:'ease',
					fill:'forwards',
				}
			);
			// １度ふわっとさせたら監視をやめて動きをとめる
			obs.unobserve(entry.target);
		}
	});
};

// 監視設定
const fadeObserver = new IntersectionObserver(animateFade);

// .fadeinを監視するよう指示
const fadeElements = document.querySelectorAll('h2');
fadeElements.forEach((fadeElement) => {
	fadeObserver.observe(fadeElement);
});
