<?php
/**
 * Front End Output
 * @since 1.0.0
**/

/* Filter Content as early as possible, but after all WP code filter runs. */
add_filter( 'the_content', 'cpb_filter_content', 10.5 );

/**
 * Filter Content
 * @since 1.0.0
**/
function cpb_filter_content( $content ){

	/* In single page when page builder template selected. */
	if( !is_admin() && is_page() && 'templates/main.php' == get_page_template_slug( get_the_ID() ) ){

		/* Add content with shortcode, autoembed, responsive image, etc. */
		$content = cpb_default_content_filter( cpb_get_content() );
	}

	/* Return content */
	return $content;
}

/**
 * Page Builder Content Output
 * This need to be use in the loop.
 * @since 1.0.0
**/
function cpb_get_content(){

	/* Get saved rows data and sanitize it */
	$row_datas = cpb_sanitize( get_post_meta( get_the_ID(), 'cpb', true ) );

	/* return if no rows data */
	if( !$row_datas ){
		return '';
	}

	/* Content */
	$content = '';

	/* Loop for each rows */
	foreach( $row_datas as $order => $row_data ){
		$order = intval( $order );

		/* === Row with 1 column === */
		if( 'col-1' == $row_data['type'] ){
			$content .= '<div class="' . $row_data['class'] . ' cpb-row cpb-row-' . $order . '" style="background-image:url('.$row_data['background'].');">' . "\r\n";
			$content .= '<div class="wrap">' . "\r\n\r\n";
			$content .= '<div class="row-content">' . "\r\n\r\n";
			$content .= $row_data['content'] . "\r\n\r\n";
			$content .= '</div>' . "\r\n";
			$content .= '</div>' . "\r\n";
			$content .= '</div>' . "\r\n\r\n";
		}
		
		
	}
	return $content;
}


/* === FRONT-END SCRIPTS === */

/* Enqueue Script */
add_action( 'wp_enqueue_scripts', 'cpbbase_front_end_scripts' );

/**
 * Admin Scripts
 * @since 1.0.0
 */
function cpbbase_front_end_scripts(){

	/* In a page using page builder */
	if( is_page() && ( 'templates/main.php' == get_page_template_slug( get_queried_object_id() ) ) ){

		/* Enqueue CSS & JS For Page Builder */
		wp_enqueue_style( 'cpb-page-builder', CPBBASE_URI. 'assets/page-builder.css', array(), CPBBASE_VERSION );
	}
}
