<?php get_header(); ?>

<!-- メイン -->
<main>
	<!-- メインビジュアル -->
	<div class="fv">
		<picture>
			<!-- ブラウザ幅最大～700pxまでPC用の高解像度画像が表示 -->
			<source srcset="<?php echo esc_url(get_theme_file_uri('/assets/img/home-fv-pc.jpg'));?>" media="(min-width: 700px)" type="image/jpg">
			<!-- ブラウザ幅700px～から最小幅までSP用の画像が表示 -->
			<img src="<?php echo esc_url(get_theme_file_uri('/assets/img/home-fv-sp.jpg'));?>" alt=”カフェのトップイメージ画像です”>

		</picture>
	</div>
	<div class="wrap home-inner">
		<!-- 最新のイベント情報を１件出力する -->
		<div class="event-info">
			<?php
			$cafe_args = array(
				'post_type' => 'events',
				'posts_per_page' => 1,
			);
			$cafe_event_query = new WP_Query($cafe_args);
			if($cafe_event_query->have_posts()):
			?>
				<?php
				while($cafe_event_query->have_posts()):
					$cafe_event_query->the_post();
					?>
					<?php get_template_part('template-parts/loop','post');?>
				<?php
					endwhile;
					wp_reset_postdata();
					?>
			<?php endif;?>
		</div>

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