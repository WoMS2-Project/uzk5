<?php

	/*
	 *	thumbnails & image sizes
	 */

	add_theme_support('post-thumbnails');
	add_image_size('teaser-thumb', 1200, 250, true);
	add_image_size('responsiveimg-thumb', 1200, 675, true);
	add_image_size('fullimg-thumb', 1200, 9999);


	/*
	 *	define allowed mime type
	 */

	/*jpg, jpeg, png, gif, pdf, zip, cpp, rar*/
	function my_upload_mimes() {
	    $mime_types = array(
	    	'jpg'	=>	'image/jpg',
	    	'jpeg'=>	'image/jpeg',
	    	'png'	=>	'image/png',
	    	'gif'	=>	'image/gif',
	    	'pdf'	=>	'application/pdf',
	    	'zip'	=>	'application/zip',
	    	'rar'	=>	'application/x-rar-compressed',
	    	/* allthoug maybe not a good choice for server: */
	    	'cpp'	=>	'text/x-c',	// for C++ course!!
	    	'h'		=> 	'text/x-h',	// for C++ course!!
	    );
	    return $mime_types;
	}
	add_filter( 'upload_mimes', 'my_upload_mimes' );

	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
		require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'html5reset_setup' );

	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_scripts_styles() {
		global $wp_styles;
	}
	add_action( 'wp_enqueue_scripts', 'html5reset_scripts_styles' );

	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_wp_title( $title, $sep ) {
		global $paged, $page;
		if ( is_feed() ) { return $title; }
	//	Add the site name.
		$title .= get_bloginfo( 'name' );

	//	Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

	//	Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( 'Page %s', max( $paged, $page ) );

		return $title;
	}
	add_filter( 'wp_title', 'html5reset_wp_title', 10, 2 );


	/*
	 *	require menu walkers
	 */
	require_once('ukwalker.php');
	require_once('wp_bootstrap_navwalker.php');

	/*
	 *	register nav menus
	 */
	function register_my_menus() {
	  register_nav_menus(
	    array(
	      'main-menu' => __( 'Hauptmenü / Navigation' ),
	      'meta-menu' => __( 'Metamenü' ),
	      'right-footer-menu' => __( 'Footermenü ( Rechts )' )
	    )
	  );
	}
	add_action( 'init', 'register_my_menus' );

	/*
	 *	register widgets
	 */
	if ( function_exists('register_sidebar' )) {
		function html5reset_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar Widgets', 'html5reset' ),
				'id'            => 'sidebar-primary',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>'
			) );

			register_sidebar(array(
				'name'=> 'Footer Left',
				'id' => 'footer_left',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => ''
			));

			register_sidebar(array(
				'name'=> 'Footer Right',
				'id' => 'footer_right',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => ''
			));

			register_sidebar(array(
				'name'=> 'Footer Upper Left',
				'id' => 'footer_upper_left',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => ''
			));

			register_sidebar(array(
				'name'=> 'Footer Upper Right',
				'id' => 'footer_upper_right',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => ''
			));

			register_sidebar( array(
				'name'=> 'Front Page Sidebar',
				'id' => 'front_page_sidebar',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>'
			) );

			register_sidebar( array(
				'name'=> 'Front Page Topbar',
				'id' => 'front_page_topbar',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>'
			) );

			register_sidebar( array(
				'name'=> 'Priority Content',
				'id' => 'priority_content',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>'
			) );

		}
		add_action( 'widgets_init', 'html5reset_widgets_init' );
	}

	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Ältere').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Neuere &raquo;').'</div>';
		echo '</div>';
	}

	// Posted On
	function posted_on() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}

