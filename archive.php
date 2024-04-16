<?php get_header(); ?>
		<!-- メイン -->
		<main>
			<div class="inner-wrap">
				<section class="page-desc">
					<h2 class="section-title fadein"><?php single_term_title(); ?></h2>
				</section>
				
				<div class="flex">
					<?php if(have_posts()):?>
						<?php
							while(have_posts()):
								the_post();
								?>
								<?php get_template_part('loop', 'post');?>
						<?php endwhile; ?>
					<?php endif;?>
				</div>
			</div>
			<?php the_posts_pagination();?>
		</main>
<?php get_footer(); ?>