<?php get_header(); ?>
		<!-- メイン -->
		<main>
			<div class="inner-wrap">
				<section class="page-desc">
					<h2 class="section-title fadein">ページが見つかりません</h2>
				</section>
				
				<div>
					<p>お探しのページは、移動または削除された可能性があります。</p>
					<p><a href="<?php echo esc_url(home_url());?>">トップページ</a>よりお探しください。</p>
				</div>
			</div>
		</main>
<?php get_footer(); ?>