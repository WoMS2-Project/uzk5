<?php
 	get_header(); 
?>
 	<div id="main" class="container">
		<div class="col-sm-9">
			<h1>
				Error 404
				<small>
					Die Seite wurde nicht gefunden
				</small>
			</h1>
			<p>
				Leider konnte die angeforderte Seite nicht gefunden werden.
				<br>
				<br>
			</p>
			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
			  <div>
			  	<label for="s" class="screen-reader-text">
			  		Suche nach:
			  	</label>
			  	<input type="search" id="s" name="s" value="" />
			  	<input type="submit" value="Suche" id="searchsubmit" />
			  </div>
			</form><!-- /#searchform -->
		</div>
	<div class="col-sm-3">
		<?php 
			get_sidebar(); 
		?>
	</div>
</div><!-- /.container -->
<?php 
	get_footer(); 
?>