<?php 

/**
 * https://premium.wpmudev.org/blog/customizing-wordpress-post-editor/
 */
add_filter("mce_buttons_2", "tinymce_enable_more_buttons");

function tinymce_enable_more_buttons($buttons) {

	// $buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	// $buttons[] = 'styleselect';
	// $buttons[] = 'backcolor';
	// $buttons[] = 'newdocument';
	// $buttons[] = 'cut';
	// $buttons[] = 'copy';
	// $buttons[] = 'charmap';
	// $buttons[] = 'hr';
	// $buttons[] = 'visualaid';

	return $buttons;
}
// add_filter( 'mce_buttons_4', 'tinymce_buttons' );

/**
 *
 */
add_filter( 'tiny_mce_before_init', 'tinymce_enable_more_text_sizes' );

function tinymce_enable_more_text_sizes( $initArray ){
    $initArray['theme_advanced_font_sizes'] = "15px 25px 33px";
    $initArray['fontsize_formats'] = "15px 25px 33px";
    return $initArray;
}

/**
 * https://urosevic.net/wordpress/tips/custom-colours-tinymce-4-wordpress-39/
 */
add_filter('tiny_mce_before_init', 'tinymce_custom_colors');

function tinymce_custom_colors($init) {
  $default_colours = '"000000", "Black",
                      "CC99FF", "Plum"';

  	$custom_colours = 	'"d17883", "Red slightly desaturated",
                      	"2f344a", "Blue very dark desaturated",
                        "707070", "Blue very dark grayish",
                        "f1dbdc", "Red light grayish"';
                      	// "ED1C24", "Color 3 Name",
                      	// "F99B1C", "Color 4 Name",
                      	// "50B848", "Color 5 Name",
                      	// "00A859", "Color 6 Name",
                      	// "00AAE7", "Color 7 Name",
                      	// "282828", "Color 8 Name"
	
  // build colour grid default+custom colors
  // $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

  	$init[ 'textcolor_map' ] = '['.$custom_colours.']';

  	// enable 6th row for custom colours in grid
  	$init['textcolor_rows'] = 6;

  return $init;
}

/**
 * https://codex.wordpress.org/TinyMCE_Custom_Styles
 */

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_3( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_3', 'my_mce_buttons_3' );

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
  // Define the style_formats array
  $style_formats = array(  
    // Each array child is a format with it's own settings
    array(  
      'title' => 'Bouton',  
      // 'block' => 'blockquote',
      'inline' => 'span',
      'classes' => 'Button no-margin-bottom Button--red-slightly-desaturated',
      // 'wrapper' => true,
      
    ),

    array(  
      'title' => 'Bouton avec bordure',  
      // 'block' => 'blockquote',  
      'inline' => 'span',
      'classes' => 'Button--outline display-inline-block',
      // 'wrapper' => true,
    ), 

    array(  
      'title' => 'Serif',  
      // 'block' => 'blockquote',  
      'inline' => 'span',
      'classes' => 'font-adobegaramondpro-italic',
      // 'wrapper' => true,
    ),
    // array(  
    //   'title' => '.ltr⇢',  
    //   // 'block' => 'h1',  
    //   'classes' => 'ltr',
    //   'wrapper' => true,
    // ),
  );  
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
  
  return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  
 