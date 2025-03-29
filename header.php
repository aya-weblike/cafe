<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="<?php echo esc_url(get_theme_file_uri('/assets/img/favicon.ico'));?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">		
	<?php wp_head(); ?>
	</head>

    <body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<!-- ヘッダー -->
        <header class="header">
			<div class="header-inner">
				<h1 class="logo">
					<a href="<?php echo esc_url(home_url()); ?>">
						<img src="<?php echo esc_url(get_theme_file_uri('/assets/img/logo.svg'));?>" alt="<?php bloginfo('name');?>">
					</a>
				</h1>

				<!-- ハンバーガーボタン -->
				<button class="hamburger" id="js-hamburger">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>

			<!-- ナビゲーション -->
			<nav class="header-nav" id="js-nav">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'container' => false,
						)
					);
				?>
			</nav>
		</header>
