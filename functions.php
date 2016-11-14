<?php
/**
 * Anotherwhiskyformisterbukowski functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage aow
 * @since 1.0
 */

// Composer
require_once( __DIR__ . '/vendor/autoload.php' );

// Functions
require_once( __DIR__ . '/functions/admin.php' );
require_once( __DIR__ . '/functions/reset.php' );
require_once( __DIR__ . '/functions/utilities.php' );

// Timber
$timber = new \Timber\Timber();

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {
	
	function __construct() {
		
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'    => __( 'Menu principal', 'awfmb' ),
			'secondary' => __( 'Menu secondaire', 'awfmb' ),
		) );

		add_filter( 'timber_context', array( $this, 'add_to_context' ) );

		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );

		add_action( 'init', array( $this, 'register_post_types' ) );

		add_action( 'init', array( $this, 'register_taxonomies' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'awfmb_add_custom_assets' ) );

		add_filter('terms_clauses', array( $this, 'awfmb_custom_terms_clauses') );

		add_action( 'wp_ajax_awfmb_load_news', array( $this, 'awfmb_load_news' ) );
		add_action( 'wp_ajax_nopriv_awfmb_load_news', array( $this, 'awfmb_load_news' ) );

		parent::__construct();
	}

	function awfmb_load_news() {

		$args = array(
	    	'post_type' => 'post',
	    	'posts_per_page' => 10,
	    	// https://codex.wordpress.org/Class_Reference/WP_Query#Category_Parameters
	    	'category_name' => 'News'

		);

		$ajax_query = new WP_Query($args);

		//var_dump($ajax_query);

		if ( $ajax_query->have_posts() ) : 
			while ( $ajax_query->have_posts() ) : 
				$ajax_query->the_post(); ?>
				
					<?php include( locate_template( 'views/post-news.twig' ) ); ?>

			<?php endwhile;

		endif;


		// https://codex.wordpress.org/AJAX_in_Plugins
		// This is required to terminate immediately and return a proper response
    	wp_die(); 
	}

	function register_post_types() {
		//this is where you can register custom post types
		// require_once( __DIR__ . '/functions/custom-post-types/' );
	}
	function register_taxonomies() {
		//this is where you can register custom taxonomies
		// require_once( __DIR__ . '/functions/taxonomies/' );
	}
	function add_to_context( $context ) {
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu'] = new TimberMenu();
		$context['site'] = $this;
		return $context;
	}
	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

	function awfmb_custom_terms_clauses( $clauses ) {

		$pattern = '|(name LIKE )\'%(.+%)\'|';

		$clauses['where'] = preg_replace( $pattern, '$1 \'$2\'', $clauses['where'] );
		
		return $clauses;
	}
	
	function awfmb_add_custom_assets() {
    	if ( ! is_admin() ) {

    		// Register stylesheets

	        // Global styles
	        wp_register_style( 'awfmb-global', get_template_directory_uri() . '/dist/css/global.css', null, null );

	        // Register scripts

	        // global $wp_scripts;
	        
	        // Remove wp-embed script from WordPress
	        wp_deregister_script( 'wp-embed' );
	        
	        // Remove contact-form-7 script from CF7
	        // wp_deregister_script( 'contact-form-7' );

	        // Remove native version of jQuery
	        wp_deregister_script( 'jquery' );
	        // Use custom CDN version
	        wp_register_script( 'jquery', '//code.jquery.com/jquery-3.1.0.min.js', false, null, true );

	        // Bundle scripts
	        wp_register_script( 'awfmb-main', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), null, true ); 

	        $args = array(
				'template_directory_uri'    => get_template_directory_uri(),
            	'home_url'                  => home_url( '/' ),
            	'base_url'                  => site_url(),
				'ajax_url' 					=> admin_url( 'admin-ajax.php' )			
			);

			wp_localize_script( 
				'awfmb-main', 
				'wp', 
				$args 
			);

	        // Then load
	        wp_enqueue_style( 'awfmb-global' );
	        wp_enqueue_script( 'awfmb-main' );

    	}

	}
}
new StarterSite();