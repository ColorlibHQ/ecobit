<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'ECOBIT_DIR_URI' ) )
		define( 'ECOBIT_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'ECOBIT_DIR_ASSETS_URI' ) )
		define( 'ECOBIT_DIR_ASSETS_URI', ECOBIT_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'ECOBIT_DIR_CSS_URI' ) )
		define( 'ECOBIT_DIR_CSS_URI', ECOBIT_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'ECOBIT_DIR_JS_URI' ) )
		define( 'ECOBIT_DIR_JS_URI', ECOBIT_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('ECOBIT_DIR_ICON_IMG_URI') )
		define( 'ECOBIT_DIR_ICON_IMG_URI', ECOBIT_DIR_ASSETS_URI.'img/icon/' );
	
	// Animate Icon Images
	if( !defined('ECOBIT_DIR_ANIMATE_ICON_IMG_URI') )
		define( 'ECOBIT_DIR_ANIMATE_ICON_IMG_URI', ECOBIT_DIR_ASSETS_URI.'img/animate_icon/' );
	
	//DIR inc
	if( !defined( 'ECOBIT_DIR_INC' ) )
		define( 'ECOBIT_DIR_INC', ECOBIT_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'ECOBIT_DIR_ELEMENTOR' ) )
		define( 'ECOBIT_DIR_ELEMENTOR', ECOBIT_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'ECOBIT_DIR_PATH' ) )
		define( 'ECOBIT_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'ECOBIT_DIR_PATH_INC' ) )
		define( 'ECOBIT_DIR_PATH_INC', ECOBIT_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'ECOBIT_DIR_PATH_LIB' ) )
		define( 'ECOBIT_DIR_PATH_LIB', ECOBIT_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'ECOBIT_DIR_PATH_CLASSES' ) )
		define( 'ECOBIT_DIR_PATH_CLASSES', ECOBIT_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'ECOBIT_DIR_PATH_WIDGET' ) )
		define( 'ECOBIT_DIR_PATH_WIDGET', ECOBIT_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'ECOBIT_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'ECOBIT_DIR_PATH_ELEMENTOR_WIDGETS', ECOBIT_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( ECOBIT_DIR_PATH_INC . 'ecobit-breadcrumbs.php' );
	// Sidebar register file include
	require_once( ECOBIT_DIR_PATH_INC . 'widgets/ecobit-widgets-reg.php' );
	// Post widget file include
	require_once( ECOBIT_DIR_PATH_INC . 'widgets/ecobit-recent-post-thumb.php' );
	// News letter widget file include
	require_once( ECOBIT_DIR_PATH_INC . 'widgets/ecobit-newsletter-widget.php' );
	//Social Links
	require_once( ECOBIT_DIR_PATH_INC . 'widgets/ecobit-social-links.php' );
	// Instagram Widget
	require_once( ECOBIT_DIR_PATH_INC . 'widgets/ecobit-instagram.php' );
	// Nav walker file include
	require_once( ECOBIT_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( ECOBIT_DIR_PATH_INC . 'ecobit-functions.php' );

	// Theme Demo file include
	require_once( ECOBIT_DIR_PATH_INC . 'demo/demo-import.php' );

	// Post Like
	require_once( ECOBIT_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( ECOBIT_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( ECOBIT_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( ECOBIT_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( ECOBIT_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( ECOBIT_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( ECOBIT_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( ECOBIT_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( ECOBIT_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class ecobit dashboard
	require_once( ECOBIT_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );
	// Common css
	require_once( ECOBIT_DIR_PATH_INC . 'ecobit-commoncss.php' );


	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( ECOBIT_DIR_PATH_INC . 'ecobit-metabox.php' );
	}
	

	// Admin Enqueue Script
	function ecobit_admin_script(){
		wp_enqueue_style( 'ecobit-admin', get_template_directory_uri().'/assets/css/ecobit_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'ecobit_admin', get_template_directory_uri().'/assets/js/ecobit_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'ecobit_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Ecobit object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Ecobit Dashboard .
	 *
	 */
	
	$Ecobit = new Ecobit();
	
