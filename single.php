<?php get_header(); ?>
		<!-- メイン -->
		<main>
			<div class="inner-wrap">
				<?php if(have_posts()): ?>
					<?php
						while(have_posts()):
							the_post();
							?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<section class="page-desc">
								<h2 class="section-title fadein"><?php the_title(); ?></h2>
								<p>
									<time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
								</p>
								<p><?php the_category();?></p>
							</section>
							<?php the_content(); ?>

							<section class="content-nav">
								<div><?php previous_post_link('&laquo; %link');?></div>
								<div class="content-nav-next"><?php next_post_link('%link &raquo;');?></div>
							</section>
							

						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</main>
<?php get_footer(); ?>

