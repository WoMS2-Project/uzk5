<!DOCTYPE html>
	<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="html5-reset-wordpress-theme">
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
		<?php // <meta name="description" content="<?php bloginfo('description'); ? >" /> ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">
		<?php
			if (true == of_get_option('meta_author')) { echo '<meta name="author" content="' . of_get_option("meta_author") . '" />'; }
			if (true == of_get_option('meta_google')) { echo '<meta name="google-site-verification" content="' . of_get_option("meta_google") . '" />'; }
		?>	
		<?php
			if (is_search()) { echo '<meta name="robots" content="noindex, nofollow" />'; }
		?>

		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/png">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/uk256.png"/>


		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- concatenate and minify for production -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

		
		<!-- Open Sans via fonts.googleapis.com -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php 
			wp_head(); 
		?>
	</head>
	<body <?php body_class(); ?>>
		<nav id="adm"></nav>
		<div id="outer-wrapper">
			<header id="header">
				<div class="container">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div id="the_logo_box" class="pull-left">
							<img id="header-logo" alt="Siegel der Universität zu Köln" src="<?php echo get_template_directory_uri(); ?>/img/uk.png">
					</div>
					<?php
						$description = get_bloginfo( 'description', 'display' );
					?>
					<div id="the_title_box" class="pull-right">
						<span id="the_wp_title">
							<?php 
								bloginfo('name'); 
							?>
						</span>
						<br>
						<span id="the_wp_subtitle" class="visible-lg visible-md">
							<?php echo $description; ?>
						</span>
					</div>
					</a>
				</div>
			</header>
			<nav id="navbar-woms" class="navbar navbar-woms navbar-fixed-top visible-md visible-lg hidden-sm hidden-xs"> <!-- visible-sm visible-md visible-lg hidden-xs -->
				<div id="navcnt" class="container">
				    	<?php
				    		wp_nav_menu( 
				    			array( 
					    			'theme_location' => 'main-menu', 
					    			'menu_id' => 'wp-main-nav', 
					    			'depth' => 1,
					    			'container' => false,
					    			'menu_class' => 'nav navbar-nav', 
									'walker' => new FirstOrderWalker()
									)
				    		);
				    	?>

				    	<?php
				    		$matches = array();
				    		$subject = wp_nav_menu( 
									array( 
					    			'theme_location' => 'main-menu', 
					    			'menu_id' => 'wp-main-nav', 
					    			'depth' => 0,
					    			'container' => false,
					    			'menu_class' => 'nav navbar-nav', 
									'walker' => new submenuWalker(),
									'echo' => false
									)
				    		);

				    		if ( preg_match("/<ul [^>]*>(.*)<\/ul>/is", $subject, $matches) === 1 ) {
				    			echo $matches[1];
				    		}
				    		
				    	?>

				      <ul class="nav navbar-nav navbar-right">
				        <li>
				        	<form id="navSearch" class="navbar-form navbar-left" role="search" action="<?php bloginfo('url'); ?>">
					        	<div class="inner-addon right-addon">
							      	<i class="glyphicon glyphicon-search"></i>
							      	<input type="text" class="form-control" placeholder="Suche" name="s" />
							    	</div>
									</form>
				        </li>
				      </ul>

				</div>
			</nav>




			<nav id="navbar-woms-mobile-nav" class="navbar navbar-woms-mobile navbar-fixed-top hidden-md hidden-lg visible-xs visible-sm">
				<div id="mnavcnt" class="container">
				  <div class="navbar-header">
				    <button id="nwmn-btn" type="button" class="navbar-toggle" data-toggle="" data-target="">
				      <span class="sr-only">Toggle navigation</span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				    </button>
				  </div>
					<div class="collapse navbar-collapse" id="nwmv-collapse">
				    <?php
				    	wp_nav_menu( 
				    		array( 
					  			'theme_location' => 'main-menu', 
					  			'menu_id' => 'wp-mobile-nav', 
					  			'depth' => 5,
					  			'container' => false,
					  			'menu_class' => 'nav navbar-nav', 
								'walker' => new wp_bootstrap_navwalker()
								)
				    	);
				    ?>
				    <ul class="nav navbar-nav navbar-right">
				      <li>
				      	<form id="navSearchMob" class="navbar-form navbar-left" role="search" action="<?php bloginfo('url'); ?>">
					      	<div class="inner-addon right-addon">
						      	<i class="glyphicon glyphicon-search"></i>
						      	<input type="text" class="form-control" placeholder="Suche" name="s" />
						    	</div>
								</form>
				      </li>
				    </ul>
				  </div><!-- /.navbar-collapse -->
				</div>
			</nav>



			


			
















