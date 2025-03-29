<?php get_header(); ?>

<!-- メイン -->
<main>
	<?php if(have_posts()):?>
		<?php
		while (have_posts()):
			the_post();
			?>
			<div class="wrap">
				<section class="section-title">
					<h1>
						<?php the_title();?>
					</h1>
				</section>

				<article id="post-<?php the_ID();?>" <?php post_class();?>>
					<?php the_content();?>
				</article>
			</div>
		<?php endwhile;?>
		<?php else : ?>
			<div class="wrap">
				<p>投稿が見つかりませんでした。</p>
			</div>
	<?php endif;?>
</main>

<?php get_footer(); ?>