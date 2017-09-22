<?php
 	get_header(); 
?>
	<div id="main" class="container">
		<div class="col-md-9">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="post" id="post-<?php the_ID(); ?>">
					<div class="responsiveimg-image">
						<?php 
							if ( has_post_thumbnail() ) {
							  the_post_thumbnail('responsiveimg-thumb');
							} 
					 	?>
					</div><!-- /.responsiveimg-image -->
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php 
								the_title(); 
							?>
						</a>
					</h2>
					<?php 
						posted_on(); 
					?>
					<div class="entry">
						<?php 
							the_content(); 
						?>

						<?php 
							wp_link_pages(array('before' => __('Pages: ','html5reset'), 'next_or_number' => 'number')); 
						?>
					</div>
					<?php 
						edit_post_link('Eintrag bearbeiten'); 
					?>
				</article><!-- /.post -->
				<!-- Add the pagination functions here. -->
				<div class="nav-previous alignleft"><?php next_posts_link( 'Ältere Inhalte' ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( 'Neuere Inhalte' ); ?></div>
				<?php //comments_template(); ?>
			<?php endwhile; endif; ?>
		</div>
	
		<div class="col-md-3">
			<?php
				get_sidebar();
			?>
		</div>
	</div><!-- /.container -->
<?php 
	get_footer();
?>
