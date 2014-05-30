<?php
/*
 *	Plugin Name: Theme Options Maker
 *	Plugin URI: 
 *	Description: Interactive Theme Options Maker
 *	Author: tonjoo
 *	Version: 1.0
 *	Author URI: 
 */

function tonjoo_tom_init() {

	//  permission
	if ( !current_user_can( 'edit_theme_options' ) )
		return;

	// Load other resource
	require plugin_dir_path( __FILE__ ) . 'includes/class.tom-options.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class.tom-generate.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class.tom-upload.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class.tom-sanitization.php';

	// Instantiate the main plugin class.
	$tom = new tomOptions;
	$tom->init();

	// Instantiate the media uploader class
	$tom_media_uploader = new tomUpload;
	$tom_media_uploader->init();

}
add_action( 'init', 'tonjoo_tom_init', 20 );


function filter_by_value ($array, $index, $value){ 
    if(is_array($array) && count($array)>0)  
    { 
        foreach(array_keys($array) as $key){ 
            $temp[$key] = $array[$key][$index]; 
             
            if ($temp[$key] == $value){ 
                $newarray[$key] = $array[$key]; 
            } 
        } 
      } 
  return $newarray; 
} 


?>