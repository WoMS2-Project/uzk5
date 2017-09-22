<?php
 	get_header(); 
?>
 	<div id="main" class="container">
		<div class="col-sm-9"><!-- main col start -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="post" id="post-<?php the_ID(); ?>">
					<div class="responsiveimg-image">
						<?php 
							if ( has_post_thumbnail() ) {
							    the_post_thumbnail('responsiveimg-thumb');
							} 
					 	?>
					</div><!-- /.responsiveimg-image -->
					<h1>
						<?php 
							the_title(); 
						?>
					</h1>
					<div class="entry article-el">
						<?php 
							the_content(); 
							wp_link_pages(
								array(
									'before' => __('Pages: ','html5reset'), 
									'next_or_number' => 'number'
								)
							); 
						?>
					</div><!-- /.entry -->
					<div class="tags article-el">
						<?php 
							the_tags(); 
						?>
					</div><!-- /.tags -->
					<div class="edit article-el">
						<?php 
							edit_post_link('Eintrag bearbeiten'); 
						?>
					</div><!-- /.edit -->
				</article><!-- /.post -->
				<?php 
					//comments_template(); 
				?>
			<?php endwhile; endif; ?>
		</div><!-- main col end -->
	<!-- sidebar start -->
	<div class="col-sm-3">
		<?php 
			get_sidebar(); 
		?>
	</div>
	<!-- sidebar end -->
</div><!-- /.cotainer -->
<?php 
	get_footer(); 
?>