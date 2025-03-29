<article id="post-<?php the_ID();?>" <?php post_class('archive-content-wrap');?>>
	<a href="<?php the_permalink();?>" class="archive-item-link">
		<div class="archive-item-img">
			<?php if(has_post_thumbnail()):?>
				<?php the_post_thumbnail('archive_thumbnail');?>
			<?php else: ?>
				<img 
					src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/dummy-image.jpg"
					width="200"
					height="150"
					load="lazy"
				>
			<?php endif; ?>
		</div>
		<div class="archive-content-body">
			<h2 class="archive-content-title">
				<?php the_title();?>
			</h2>
			<!-- 抜粋 -->
			<?php the_excerpt();?>
			<ul class="archive-content-meta">
				<!-- カテゴリー名の取得 -->
				<?php
					$cafe_category_list = get_the_category();
					if($cafe_category_list):
				?>
					<li class="archive-content-category">
						<?php echo esc_html($cafe_category_list[0]->name);?>
					</li>
				<?php endif; ?>
				<li>
					<time datetime="<?php echo get_the_date('Y-m-d');?>"><?php echo get_the_date();?></time>
				</li>
			</ul>
		</div>
	</a>
</article>
