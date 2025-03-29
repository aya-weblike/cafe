<?php get_header();?>

<!-- メイン -->
<main>
	<article>
		<div class="wrap">
			<section class="section-title">
				<h1>
					ページが見つかりません
				</h1>
			</section>
			<div>
				<p class="error-msg">
					<a href="<?php echo esc_url(home_url());?>">トップページ</a>へ戻る。
				</p>
			</div>
		</div>
	</article>
</main>

<?php get_footer();?>