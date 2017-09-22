<aside id="sidebar">
  <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
  	<h2>Archiv</h2>
  	<ul>
  		<?php wp_get_archives('type=monthly'); ?>
  	</ul>
  	<h2>Meta</h2>
  	<ul>
  		<?php 
        wp_register(); 
      ?>
  		<li>
        <?php 
          wp_loginout(); 
        ?>
      </li>
  		<li>
        <a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">
          WordPress
        </a>
      </li>
  		<?php 
        wp_meta(); 
      ?>
  	</ul>
  	<h2>
      Subscribe
    </h2>
  	<ul>
  		<li>
        <a href="<?php bloginfo('rss2_url'); ?>">
          Einträge
        </a>
      </li>
  		<li>
        <a href="<?php bloginfo('comments_rss2_url'); ?>">
          Kommentare
        </a>
      </li>
  	</ul>
	<?php endif; ?>
</aside>