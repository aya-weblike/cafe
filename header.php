<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_theme_file_uri('/img/apple-touch-icon.png')); ?>">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_theme_file_uri('/img/favicon-32x32.png')); ?>">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_theme_file_uri('/img/favicon-16x16.png')); ?>">          
		<link rel="manifest" href="<?php echo esc_url(get_theme_file_uri('/img/site.webmanifest')); ?>">
		<?php wp_head(); ?>		
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<!-- ヘッダー -->
		<header>
			<div class="wrap">
				<h1 class="logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">AyaCafe</a>
				</h1>
				<nav>
					<button class="btn-menu"></button>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'contain' => '',
								'menu_class' => 'header-nav'
							)
						);
					?>
				</nav>
			</div>
		</header>
