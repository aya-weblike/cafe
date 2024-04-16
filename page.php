<?php get_header(); ?>
		<!-- メイン -->
		<main>
			<div class="inner-wrap">
				<?php if(have_posts()): ?>
					<?php 
						while(have_posts()):
						the_post();
						?>
						<section class="page-desc">
							<h2 class="section-title fadein"><?php the_title(); ?></h2>
						</section>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</main>
<?php get_footer(); ?>