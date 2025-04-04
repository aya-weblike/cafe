<?php get_header();?>

<!-- メイン -->
<main>
	<?php if(have_posts()): ?>
		<?php
		while (have_posts()):
			the_post();
			?>
			<article id="post-<?php the_ID();?>" <?php post_class();?>>
				<div class="wrap">
					<section class="section-title">
						<h1>
							<?php the_title(); ?>
						</h1>
						<div class="content-meta">
							<?php the_category(',');?>
							<!-- 投稿日の取得 -->
							<?php
								$cafe_post_year = get_the_date('Y');
								$cafe_post_month = get_the_date('m');
							?>
							<a class="content-meta-date" href="<?php echo get_month_link($cafe_post_year,$cafe_post_month);?>">
								<time datetime="<?php echo get_the_date('Y-m-d');?>"><?php echo get_the_date();?></time>
							</a>
						</div>
					</section>
					<section class="event-info">
						<?php if(has_post_thumbnail()):?>
							<div class="thumbnail">
								<?php the_post_thumbnail('page_eyecatch');?>
							</div>
						<?php endif;?>
						<?php the_content();?>
					</section>
					<!-- タグの出力 -->
					<?php the_tags(
						'<ul class="content-tags" aria-label="タグ"><li>',
						'</li><li>',
						'</li></ul>'
					);?>

					<!-- ページ送り -->
					<div class="pagination">
						<div class="prev">
							<?php previous_post_link('%link','前の記事へ'); ?>
						</div>
						<div class="next">
							<?php next_post_link('%link', '次の記事へ'); ?>
						</div>
					</div>


				</div>
			</article>
		<?php endwhile;?>
	<?php endif;?>
</main>

<?php get_footer();?>