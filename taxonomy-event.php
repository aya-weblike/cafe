<?php get_header();?>
<!-- メイン -->
<main>
	<div class="wrap">
		<section class="section-title">
			<h1>
				<?php if(is_month()): ?>
					<?php echo get_the_date('Y年n月');?>
				<?php else: ?>
					<?php single_term_title();?>
				<?php endif; ?>
			</h1>
		</section>
		<?php if(have_posts()): ?>
			<?php
			while (have_posts()):
				the_post();
				?>
				<?php get_template_part('template-parts/loop','event');?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- ページ送り -->
		<div class="pagination">
			<?php posts_nav_link(' ','←前へ','次へ→');?>
		</div>
	</div>
</main>
<?php get_footer();?>