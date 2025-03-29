<?php
/*-------------------------------------------
特定の機能をテーマに追加する
-------------------------------------------*/
function cafe_theme_setup(){
	// ページタイトル出力
	add_theme_support('title-tag');

	// ナビゲーションメニュー
	register_nav_menus(
		array(
			'main-menu' => 'メインメニュー',
		)
	);

	// アイキャッチ
	add_theme_support('post-thumbnails');
	add_image_size('page_eyecatch',1100,610,true);
	add_image_size('archive_thumbnail',200,150,true);
	
}
add_action('after_setup_theme','cafe_theme_setup');

/*-------------------------------------------
ウィジェット
-------------------------------------------*/
function cafe_widgets_init(){
	register_sidebar(
		array(
		'name' => 'オリジナルウィジェット', // 任意のウィジェット名
		'id' => 'event-widget', // 任意のウィジェットのID名
		'description' => 'イベント情報のウィジェット',
		'before_widget' => '<div id="%1s" class="%2s">', // ウィジェット直前のHTML
		'after_widget' => '</div>', // ウィジェット直後のHTML
		)
	);
}
add_action('widgets_init','cafe_widgets_init');


/*-------------------------------------------
テーマ独自のファイルを読み込む
-------------------------------------------*/
function add_files(){
	// リセットCSS
	wp_enqueue_style(
		'reset-style',
		'https://unpkg.com/destyle.css@1.0.5/destyle.css'
	);

	// Google Fonts
	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Zen+Kaku+Gothic+New:wght@400;700&display=swap'
	);

	// メインのCSSファイル
	wp_enqueue_style(
		'main-style', 
		get_theme_file_uri().'/assets/css/style.min.css',
	);

	// テーマ独自のCSSファイル
	wp_enqueue_style(
		'theme-style', 
		get_theme_file_uri().'/assets/css/theme-styles.min.css',
	);

	// jQuery
	wp_enqueue_script('jquery');

	// JSファイル
	wp_enqueue_script(
		'main-script',
		get_theme_file_uri().'/assets/js/script.js',
		array(),
		'1.0.0',
		true
	);
			
	// Font awesome
	wp_enqueue_script(
		'fontawesome',
		'https://kit.fontawesome.com/44a6871718.js',
		array(), 
		'1.0.0',
		true
	);
	add_filter('script_loader_tag', 'custom_script_loader_tag', 10, 2);
		function custom_script_loader_tag($tag, $handle) {
		if($handle !== 'fontawesome') {
		return $tag;
		}
		return str_replace('></script>', ' crossorigin="anonymous"></script>', $tag);
	}
}
add_action('wp_enqueue_scripts','add_files');

/*-------------------------------------------
テーマをブロックエディタに対応させる
-------------------------------------------*/
function cafe_block_setup(){
	// ブロック用のCSSを有効化
	add_theme_support('wp-block-styles');

	// 埋め込みブロックのレスポンシブ化
	add_theme_support('responsive-embeds');

	// コンテンツ幅の拡張
	add_theme_support('align-wide');

	// カラーパレット
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name' => '文字色',
				'slug' => 'color-font',
				'color' => '#3c3c3c',
			),
			array(
				'name' => 'ベースカラー',
				'slug' => 'color-base',
				'color' => '#f5deb3',
			),
			array(
				'name' => 'メインカラー',
				'slug' => 'color-main',
				'color' => '#da6d24',
			),
			array(
				'name' => 'アクセントカラー',
				'slug' => 'color-accent',
				'color' => '#8b4513',
			),
			array(
				'name' => 'ボタンホバー',
				'slug' => 'color-btn-hover',
				'color' => '#ccc',
			),
			array(
				'name' => 'ボタンテキスト',
				'slug' => 'color-btn-text',
				'color' => '#fff',
			),
		)
	);
	// フォントスタイル指定
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name' => '極小',
				'size' => '12',
				'slug' => 'x-small'
			),
			array(
				'name' => '小',
				'size' => '14',
				'slug' => 'small'
			),
			array(
				'name' => '標準',
				'size' => '16',
				'slug' => 'normal'
			),
			array(
				'name' => '大',
				'size' => '18',
				'slug' => 'large'
			),
			array(
				'name' => '特大',
				'size' => '24',
				'slug' => 'huge'
			),
		)
	);

	// エディター側にスタイルを適用させる
	add_theme_support('editor-styles');
	add_editor_style('/assets/css/editor-styles.min.css');
	add_editor_style('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Zen+Kaku+Gothic+New:wght@400;700&display=swap');

}
add_action('after_setup_theme','cafe_block_setup');

/*-------------------------------------------
コアブロックのスタイル
-------------------------------------------*/
function cafe_block_style_setup(){
	register_block_style(
		'core/button',
		array(
			'name' => 'normal-btn',
			'label' => '標準ボタン',
		)
	);
	register_block_style(
		'core/button',
		array(
			'name' => 'fixed',
			'label' => '幅固定',
		)
	);
}
add_action('after_setup_theme','cafe_block_style_setup');

/*-------------------------------------------
固定ページのbodyにスラッグ名をクラスで出す
-------------------------------------------*/
function my_body_class($classes)
{
    if (is_page()) {
        $page = get_post();
        $classes[] = $page->post_name;
    }
    return $classes;
}
add_filter('body_class', 'my_body_class');
