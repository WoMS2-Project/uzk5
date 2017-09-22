<?php
 	get_header(); 
?>
<div id="main" class="container">
	<div class="col-sm-9">
		<div class="responsiveimg-image">
			<?php 
				if ( has_post_thumbnail() ) {
				  the_post_thumbnail('responsiveimg-thumb');
				} 
		 	?>
		</div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
			<article class="post" id="post-<?php the_ID(); ?>">
				<h1>
					<?php 
						the_title(); 
					?>
				</h1>
				
				<?php
					the_date( 'd.m.Y h:t', '<small class="the-date">', ' Uhr</small>' );
				?>
				<div class="postedon article-el">
					<?php 
						//posted_on(); 
					?>
				</div>
				<div class="entry article-el">
					<?php 
						the_content();
					?>
				</div>
				<div class="tags article-el">
					<?php 
						the_tags();
					?>
				</div>
				<div class="edit article-el">
					<?php 
						edit_post_link('Eintrag bearbeiten'); 
					?>
				</div>
			</article><!-- /.post -->
			<?php 
				//comments_template(); 
			?>
		<?php endwhile; endif; ?>
	</div>
	<div class="col-sm-3">
		<?php 
			get_sidebar(); 
		?>
	</div>
</div>
<?php 
	get_footer(); 
?>
