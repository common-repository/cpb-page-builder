<?php
/**
 * Page Builder Functions
 * - Sanitize Page Builder Data
 * 
 * @since 1.0.0
 * @author Farhan Girach <farhangirach@hotmail.com>
 * @copyright Copyright (c) 2017, Farhan Girach
**/

/**
 * Sanitize Page Builder Data
 * @since 1.0.0
 */
function cpb_sanitize( $input ){

	/* If data is not array, return. */
	if( !is_array( $input ) ){
		return null;
	}

	/* Output var */
	$output = array();

	/* Loop the data submitted */
	foreach( $input as $row_order => $row_data ){

		/* Only if row type is set */
		if( isset( $row_data['type'] ) && $row_data['type'] ){

			/* Get type of row ("col-1" or "col-2") */
			$row_type = esc_attr( $row_data['type'] );

			/* Row with 1 Column */
			if( 'col-1' == $row_type ){

				/* Sanitize value for "content" field. */
				$output[$row_order]['content'] = wp_kses_post( $row_data['content'] );
				$output[$row_order]['class'] = wp_kses_post( $row_data['class'] );
				$output[$row_order]['background'] = wp_kses_post( $row_data['background'] );
				$output[$row_order]['type'] = $row_type;
			}

			
		}
	}

	return $output;
}


/**
 * Enable Default Content Filter
 * @since 1.0.0
 */
function cpb_default_content_filter( $content ){
	if( $content ){
		global $wp_embed;
		$content = $wp_embed->run_shortcode( $content );
		$content = $wp_embed->autoembed( $content );
		$content = wptexturize( $content );
		$content = convert_smilies( $content );
		$content = convert_chars( $content );
		$content = wptexturize( $content );
		$content = do_shortcode( $content );
		$content = shortcode_unautop( $content );
		if( function_exists('wp_make_content_images_responsive') ) { /* WP 4.4+ */
			$content = wp_make_content_images_responsive( $content );
		}
		$content = wpautop( $content );
	}
	return $content;
}
/*add_action('save_post','save_post_callback');
function save_post_callback(){
	
    global $wpdb,$results_img,$results_class;
		 $results = $wpdb->function;
     	$class= $_POST['class_name'];
		$url=$_POST['image_url'];
		 $wpdb->insert('custom_class', array('class_name' =>  $class, 'image_url' =>$url )); 
		 
		$sql = "SELECT * FROM custom_class WHERE class_name='$class'";
		$results_class = $wpdb->get_results($sql) or die(mysql_error());
		echo $results_class->class_name;
		
		$sql1 = "SELECT * FROM custom_class WHERE image_url='$url'";
		$results_img = $wpdb->get_results($sql1) or die(mysql_error());
		echo $results_img->image_url;
		
    //if you get here then it's your post type so do your thing....
}*/

function col_full( $atts, $content = null ) {
	$call_full = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb-col-12 ' .esc_attr($call_full['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-12', 'col_full' );

function col_half( $atts, $content = null ) {
	$call_half = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb-col-6 ' .esc_attr($call_half['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-6', 'col_half' );

function col_one_thired( $atts, $content = null ) {
	$col_onethired = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb-col-3 ' .esc_attr($col_onethired['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-3', 'col_one_thired' );

function col_one_forth( $atts, $content = null ) {
	$col_oneforth = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb-col-4 ' .esc_attr($col_oneforth['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-4', 'col_one_forth' );

function col_one_six( $atts, $content = null ) {
	$col_onesix = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb-col-2 ' .esc_attr($col_onesix['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-2', 'col_one_six' );

function col_small_center( $atts, $content = null ) {
	$col_small_center = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb_col_small_center ' .esc_attr($col_small_center['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-small-center', 'col_small_center' );

function col_large_center( $atts, $content = null ) {
	$col_large_center = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb_col_large_center ' .esc_attr($col_large_center['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-large-center', 'col_large_center' );

function col_8( $atts, $content = null ) {
	$col_eight = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb-col-8 ' .esc_attr($col_eight['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-8', 'col_8' );
function col_9( $atts, $content = null ) {
	$col_nine = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb-col-9 ' .esc_attr($col_nine['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-9', 'col_9' );

function col_10( $atts, $content = null ) {
	$col_ten = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<div class="cpb-col-10 ' .esc_attr($col_ten['class']) . '">' . $content . '</div>';
}
add_shortcode( 'col-10', 'col_10' );

function button( $atts, $content = null ) {
	$but = shortcode_atts( array(
		'class' => ' ',
	), $atts );
	return '<button class="' .esc_attr($but['class']) . '">' . $content . '</button>';
}
add_shortcode( 'button', 'button' );

