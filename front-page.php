<?php get_header(); ?>
		<!-- メイン -->
		<main>
			<div class="fv">
				<picture>
					<!-- ブラウザ幅最大～700pxまでPC用の高解像度画像が表示 -->
					<source srcset="<?php echo esc_url(get_theme_file_uri('/img/home-fv-pc.jpg')); ?> " media="(min-width: 700px)" type="image/jpg">
					<!-- ブラウザ幅700px～から最小幅までSP用の画像が表示 -->
					<img src="<?php echo esc_url(get_theme_file_uri('/img/home-fv-sp.jpg')); ?> " alt=”カフェのトップイメージ画像です”>
				</picture>
			</div>
			
			<div class="inner-wrap">
				<?php 
				if(have_posts()){
					while(have_posts()){
						the_post();
						the_content();
					}
				}
				?>
			</div>
		</main>
<?php get_footer(); ?>