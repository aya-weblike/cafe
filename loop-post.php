<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<a href="<?php the_permalink();?>">
		<div class="loop-post-item">
			<?php if(has_post_thumbnail()):?>
				<?php the_post_thumbnail( '', array('class' => 'loop-post-img'));?>
			<?php else:?>
				<img src="<?php echo esc_url(get_theme_file_uri('/img/dummy-image.png'));?>" class="loop-post-img">
			<?php endif;?>

			<h2><?php the_title();?></h2>
			<p>
				<time datetime="<?php echo get_the_date('Y-m-d');?>">
				<?php echo get_the_date();?></time>
			</p>			
		</div>
	</a>
</article>
