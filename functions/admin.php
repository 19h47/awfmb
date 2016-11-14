<?php
/**
 *
 */
// add_filter( 'manage_pages_columns', 'formeact_custom_pages_columns' );
// function formeact_custom_pages_columns( $columns ) {

// 	/** Remove a Comments Columns **/
// 	unset(
// 		$columns['comments']
// 	);

// 	return $columns;
// }

/**
 *
 */
// add_filter( 'manage_posts_columns', 'formeact_custom_posts_columns');
// function formeact_custom_posts_columns( $columns ) {

// 	/** Remove a Comments Columns **/
// 	unset(
// 		$columns['comments']
// 	);

// 	return $columns;
// }

/**
 * Remove comments menu entry
 */
// add_action( 'admin_menu', function () {
//   	remove_menu_page( 'edit-comments.php' );
// });


/**
 * 
 * @param string $post_type The post type for which to remove the feature.
 * @param string $feature   The feature being removed.
 * https://codex.wordpress.org/Function_Reference/remove_post_type_support
 */
// add_action( 'init', function () {
//    	remove_post_type_support( 'post', 'comments' );
//  	remove_post_type_support( 'page', 'comments' );
// });

/*
 * Set custom footer text.
 * @link https://developer.wordpress.org/reference/hooks/admin_footer_text/
 */
add_filter( 'admin_footer_text', function(){
    return 'Thank you for creating with <a href="http://www.19h47.fr/" target="_blank">19h47</a>.';
});

/**
 * Remove All Dashboard Widgets
 */
// function remove_dashboard_widgets() {
//     global $wp_meta_boxes;
//     //Completely remove various dashboard widgets (remember they can also be HIDDEN from admin)
// 	remove_meta_box( 'dashboard_quick_press',   'dashboard', 'side' );      //Quick Press widget
// 	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );      //Recent Drafts
// 	remove_meta_box( 'dashboard_primary',       'dashboard', 'side' );      //WordPress.com Blog
// 	remove_meta_box( 'dashboard_secondary',     'dashboard', 'side' );      //Other WordPress News
// 	remove_meta_box( 'dashboard_incoming_links','dashboard', 'normal' );    //Incoming Links
// 	remove_meta_box( 'dashboard_plugins',       'dashboard', 'normal' );    //Plugins
// }
// add_action('wp_dashboard_setup', 'remove_dashboard_widgets');