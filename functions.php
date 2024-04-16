<?php
function add_files(){
	// リセットCSS
	wp_enqueue_style('reset-style' , 'https://unpkg.com/destyle.css@1.0.5/destyle.css');
	// Google Fonts
	wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Zen+Kaku+Gothic+New&display=swap');
	// メインのCSSファイル
	wp_enqueue_style('main-style' , get_stylesheet_uri());
	// JavaScriptファイル
	wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/44a6871718.js', array(), '' , false);
	wp_enqueue_script('main-script', get_theme_file_uri().'/js/script.js', array(), '', true ); 
}
add_action('wp_enqueue_scripts','add_files');

function theme_setup(){
	// ブロック用のCSSを有効化する
	add_theme_support('wp-block-styles');

	// 埋め込みブロックのレスポンシブ化
	add_theme_support('responsive-embeds');

	// 幅広スタイルの対応
	add_theme_support('align-wide');

	// アイキャッチ画像有効
	add_theme_support( 'post-thumbnails' );
	add_filter( 'post_thumbnail_html', 'custom_attribute' );
	function custom_attribute( $html ){
		// width height を削除する
		$html = preg_replace('/(width|height)="\d*"\s/', '', $html);
		return $html;
	}

	// titleタグ
	add_theme_support('title-tag');

	// メニュー
	register_nav_menus(
		array(
			'main-menu' => 'メインメニュー',
		)
	);

	// カラーパレットの設定
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name' => 'ダークグレー',
				'slug' => 'dark-gray',
				'color' => '#3c3c3c',
			),
			array(
				'name' => 'オレンジ',
				'slug' => 'orange',
				'color' => '#da6d24',
			),
			array(
				'name' => 'クリーム',
				'slug' => 'cream',
				'color' => '#f5deb3',
			),
			array(
				'name' => 'ブラウン',
				'slug' => 'brown',
				'color' => '#8b4513',
			),
			array(
				'name' => 'ダークイエロー',
				'slug' => 'dark-yellow',
				'color' => '#d3a415',
			),
		)
	);

	// 独自のエディタースタイルを有効化する
	add_theme_support('editor-styles');
	add_editor_style('css/editor-styles.css');
	add_editor_style('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Zen+Kaku+Gothic+New&display=swap');

}
add_action('after_setup_theme','theme_setup');


// 固定ページのbodyにスラッグ名をクラスで出す
function my_body_class($classes)
{
    if (is_page()) {
        $page = get_post();
        $classes[] = $page->post_name;
    }
    return $classes;
}
add_filter('body_class', 'my_body_class');

// ショートコードを使って投稿一覧の記事を任意の数だけ表示
function aya_event_shortcode() {
	global $post;
	$args = array(
	'post_type'      => 'post',
	'posts_per_page' => 1,
	'post_status'    => 'publish'
	);
	$posts_array = get_posts($args);
	$html = '<ul>';
		foreach($posts_array as $post): // loop開始
			setup_postdata($post);
			$html .= '<li><a href="'.get_permalink().'">'; // 記事URLを取得
			$html .= '<div class="event-thumbnail"><img src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'"></div>'; //アイキャッチ画像表示
			$html .= '<time datetime="'.get_the_date( DATE_W3C ).'">'.get_the_date().'</time>'; // 投稿日を表示
			$html .= '<p>'.get_the_title().'</p>'; // タイトルを表示
			$html .= '</a></li>';
		endforeach; // loop終了
	$html.='</ul>';
	wp_reset_postdata();
	return $html;
}
add_shortcode('my_post_list', 'aya_event_shortcode');


