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
							<?php the_terms(get_the_ID(),'event');?>
							<!-- 投稿日の取得 -->
							<?php
                                $cafe_event_year = get_the_date('Y');
                                $cafe_event_month = get_the_date('m');
                            ?>
							<span class="content-meta-date">
								<time datetime="<?php echo get_the_date('Y-m-d');?>"><?php echo get_the_date();?></time>
							</span>
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