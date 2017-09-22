<?php
 	get_header(); ?>
 	<div id="main" class="container">

		<div class="col-sm-9">
			<?php if ( is_active_sidebar( 'front_page_topbar' ) ) : ?>
        <div id="front_page_topbar">
          <?php 
            dynamic_sidebar( 'front_page_topbar' ); 
          ?>
        </div>
      <?php endif; ?>

      <!-- -->

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="post" id="post-<?php the_ID(); ?>">
					<div class="responsiveimg-image">
						<?php 
							if ( has_post_thumbnail() ) { 
							  the_post_thumbnail('responsiveimg-thumb', array('class' => 'img-responsive'));
							} 
					 	?>
					</div>
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php 
								the_title(); 
							?>
						</a>
					</h2>
					<div class="entry">
						<?php 
							the_content(); 
							wp_link_pages(array(
								'before' => __('Pages: ','html5reset'), 
								'next_or_number' => 'number')
							); 
						?>
					</div><!-- /.entry -->
					<?php 
						edit_post_link('Eintrag bearbeiten'); 
					?>
				</article><!-- /.post -->
				<?php 
					comments_template(); 
				?>
			<?php endwhile; endif; ?>
		</div>

		<!-- sidebar start -->
		<div class="col-sm-3">
			<?php if ( is_active_sidebar( 'front_page_sidebar' ) ) : ?>
          <div id="front_page_sidebar">
            <?php 
              dynamic_sidebar( 'front_page_sidebar' ); 
            ?>
          </div>
        <?php endif; ?>
		</div><!-- sidebar end -->


	</div> <!-- /.container -->
<?php 
	get_footer(); 
?>
