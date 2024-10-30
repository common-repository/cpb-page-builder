<?php
/**
 * Page Builder
 * - Register Page Template
 * - Add Page Builder Control
 * - Save Page Builder Data
 * - Admin Scripts
 * 
 * @since 1.0.0
 * @author Farhan Girach <farhangirach@hotmail.com>
 * @copyright Copyright (c) 2017, Farhan Girach
**/

/* === REGISTER PAGE TEMPLATE === */

/* Add page templates */
add_filter( 'theme_page_templates', 'cpbbase_register_page_template' );


/**
 * Register Page Template: Page Builder
 * @since 1.0.0
 */
function cpbbase_register_page_template( $templates ){
	$templates['templates/main.php'] = 'Page Builder';
	return $templates;
}


/* === ADD PAGE BUILDER CONTROL === */

/* Add page builder form after editor */
add_action( 'edit_form_after_editor', 'cpbbase_editor_callback', 10, 2 );

/**
 * Page Builder Control
 * Added after Content Editor in Page Edit Screen.
 * @since 1.0.0
 */
function cpbbase_editor_callback( $post ){
	if( 'page' !== $post->post_type ){
		return;
	}
?>
	<div id="cpb-page-builder">

		<div class="cpb-rows">
			<?php cpb_render_rows( $post ); // display saved rows ?>
		</div><!-- .cpb-rows -->

		<div class="cpb-actions">
			<a href="#" class="cpb-add-row button-primary button-large" data-template="col-1">Add Row</a>
			
		</div><!-- .cpb-actions -->

		
         
                <input class="header_logo_url" type="text" name="header_logo" size="60" value="<?php echo get_option('header_logo'); ?>" placeholder="copy url or drag drop image from beside">
                <a href="#" class="header_logo_upload">Upload</a>
                <img class="header_logo" src="<?php echo get_option('header_logo'); ?>" height="100" width="100"/>

        
        <div class="drag_drop">
        	<div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-12 class=custom_class]Add Html[/col-12]">col-12 <i class="fa fa-bars" aria-hidden="true"></i></div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-6 class=custom_class]Add Html[/col-6]">col-6</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-4 class=custom_class]Add Html[/col-4]">col-4</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-3 class=custom_class]Add Html[/col-3]">col-3</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-2 class=custom_class]Add Html[/col-2]">col-2</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-8 class=custom_class]Add Html[/col-8]">col-8</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-9 class=custom_class]Add Html[/col-9]">col-9</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-10 class=custom_class]Add Html[/col-10]">col-10</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-small-center class=custom_class]Add Html[/col-small-center]">Small Center Column</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="[col-large-center class=custom_class]Add Html[/col-large-center]">large Center Column</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<div class='Custom_class' id='custom_id'>Add Content Here</div>">Div</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<section class='Custom_class' id='custom_id'>Add Content Here</section>">Section</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<article class='Custom_class' id='custom_id'>Add Content Here</article>">Article</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<aside class='Custom_class' id='custom_id'>Add Content Here</aside>">Aside</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<header class='Custom_class' id='custom_id'>Add text Here</header>">Header</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<footer class='Custom_class' id='custom_id'>Add text Here</footer>">Footer</div>
			<div class="drag_but" draggable="true" ondragstart="drag(event)" id="[button class=custom_class]Add Text[/button]">Button</div>  
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<h1>Add text Here</h1>">h1</div>            
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<h2>Add Heading</h2>">h2</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<h3>Add Heading</h3>">h3</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<h4>Add Heading</h4>">h4</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<h5>Add Heading</h5>">h5</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<h6>Add Heading</h6>">h6</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<p>Add text</p>">p</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<ul>Add li here</ul>">ul</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<ol>Add li here</ol>">ol</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<li>Add text</li>">li</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<img src='Add image path'>">Image</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<b>Add text</b>">Bold Text</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<i>Add text</i>">Italic Text</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<u>Add text</u>">Underline Text</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<a href='Add link'>Add text</a>">Link</div>
            <div class="drag_but" draggable="true" ondragstart="drag(event)" id="<table><tr><th>Heading here</th></tr><tr><td>Data here</td></tr></table>">Table</div>
        </div>



        
        <div class="cpb-templates" style="display:none;">

			<?php /* == This is the 1 column row template == */ ?>
			<div class="cpb-row cpb-col-1">

				<div class="cpb-row-title">
					<span class="cpb-handle dashicons dashicons-move"></span>
					<span class="cpb-order">0</span>
					<span class="cpb-row-title-text">Row</span>
                    <span class="cpb-remove dashicons dashicons-no"></span>
				</div><!-- .cpb-row-title -->

				<div class="cpb-row-fields">
					
					Class : <input type="text" name="" id="class" data-field="class" placeholder="Add Custom Class">
                    Background Image Link : <input type="text" name="" id="bg_image" data-field="background" placeholder="Add Image link for Background"><textarea class="cpb-row-input" name="" data-field="content" placeholder="Add HTML here..." ondrop="drop(event)" ondragover="allowDrop(event)"></textarea>
					<input class="cpb-row-input" type="hidden" name="" data-field="type" value="col-1">
                    
				</div><!-- .cpb-row-fields -->

			</div><!-- .cpb-row.cpb-col-1 -->


		</div><!-- .cpb-templates -->

		<?php wp_nonce_field( "cpb_nonce_action", "cpb_nonce" ) ?>

	</div><!-- .cpb-page-builder -->
<?php
}


/* === SAVE PAGE BUILDER DATA === */

/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'cpbbase_save_post', 10, 2 );

/**
 * Save Page Builder Data When Saving Page
 * @since 1.0.0
 */

function cpbbase_save_post( $post_id, $post ){

	/* Stripslashes Submitted Data */
	$request = stripslashes_deep( $_POST );

	/* Verify/validate */
	if ( ! isset( $request['cpb_nonce'] ) || ! wp_verify_nonce( $request['cpb_nonce'], 'cpb_nonce_action' ) ){
		return $post_id;
	}
	/* Do not save on autosave */
	if ( defined('DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	/* Check post type and user caps. */
	$post_type = get_post_type_object( $post->post_type );
	if ( 'page' != $post->post_type || !current_user_can( $post_type->cap->edit_post, $post_id ) ){
		return $post_id;
	}

	/* == Save, Delete, or Update Page Builder Data == */

	/* Get (old) saved page builder data */
	$saved_data = get_post_meta( $post_id, 'cpb', true );

	/* Get new submitted data and sanitize it. */
	$submitted_data = isset( $request['cpb'] ) ? cpb_sanitize( $request['cpb'] ) : null;

	/* New data submitted, No previous data, create it  */
	if ( $submitted_data && '' == $saved_data ){
		add_post_meta( $post_id, 'cpb', $submitted_data, true );
	}
	/* New data submitted, but it's different data than previously stored data, update it */
	elseif( $submitted_data && ( $submitted_data != $saved_data ) ){
		update_post_meta( $post_id, 'cpb', $submitted_data );
	}
	/* New data submitted is empty, but there's old data available, delete it. */
	elseif ( empty( $submitted_data ) && $saved_data ){
		delete_post_meta( $post_id, 'cpb' );
	}

	/* == Get Selected Page Template == */
	$page_template = isset( $request['page_template'] ) ? esc_attr( $request['page_template'] ) : null;

	/* == Page Builder Template Selected, Save to Post Content == */
	if( 'templates/main.php' == $page_template ){

		/* Page builder content without row/column wrapper */
		$pb_content = cpb_format_post_content_data( $submitted_data );

		/* Post Data To Save */
		$this_post = array(
			'ID'           => $post_id,
			'post_content' => sanitize_post_field( 'post_content', $pb_content, $post_id, 'db' ),
		);

		/**
		 * Prevent infinite loop.
		 * @link https://developer.wordpress.org/reference/functions/wp_update_post/
		 */
		remove_action( 'save_post', 'cpbbase_save_post' );
		wp_update_post( $this_post );
		add_action( 'save_post', 'cpbbase_save_post' );
	}

	/* == Always delete page builder data if page template not selected == */
	else{
		delete_post_meta( $post_id, 'cpb' );
	}
}


/**
 * Format Page Builder Content Without Wrapper Div.
 * This is added to post content.
 * @since 1.0.0
**/
function cpb_format_post_content_data( $row_datas ){

	/* return if no rows data */
	if( !$row_datas ){
		return '';
	}

	/* Output */
	$content = '';

	/* Loop for each rows */
	foreach( $row_datas as $order => $row_data ){
		$order = intval( $order );

		/* === Row with 1 column === */
		if( 'col-1' == $row_data['type'] ){
			$content .= $row_data['content'] . "\r\n\r\n";
			$content .= $row_data['class'] . "\r\n\r\n";
			$content .= $row_data['background'] . "\r\n\r\n";
		}
		
	}
	return $content;
}


/**
 * Render Saved Rows
 * @since 1.0.0
 */
function cpb_render_rows( $post ){

	/* Get saved rows data and sanitize it */
	$row_datas = cpb_sanitize( get_post_meta( $post->ID, 'cpb', true ) );

	/* Default Message */
	$default_message = 'Please add row to start!';

	/* return if no rows data */
	if( !$row_datas ){
		echo '<p class="cpb-rows-message">' . $default_message . '</p>';
		return;
	}
	/* Data available, hide default notice */
	else{
		echo '<p class="cpb-rows-message" style="display:none;">' . $default_message . '</p>';
	}

	/* Loop for each rows */
	foreach( $row_datas as $order => $row_data ){
		$order = intval( $order );

		/* === Row with 1 column === */
		if( 'col-1' == $row_data['type'] ){
			?>
			<div class="cpb-row cpb-col-1">

				<div class="cpb-row-title">
					<span class="cpb-handle dashicons dashicons-move"></span>
					<span class="cpb-order"><?php echo $order; ?></span>
					<span class="cpb-row-title-text">Row</span>
                    <span class="cpb-remove dashicons dashicons-no"></span>
                   
				</div><!-- .cpb-row-title -->

				<div class="cpb-row-fields">
					 Class : <input type="text" name="cpb[<?php echo $order; ?>][class]" id="class" data-field="class" value="<?php echo $row_data['class']; ?>"/>
                     Background Image Link : <input type="text" name="cpb[<?php echo $order; ?>][background]" id="bg_image" data-field="background" value="<?php echo $row_data['background']; ?>">
					<textarea class="cpb-row-input" name="cpb[<?php echo $order; ?>][content]" data-field="content" placeholder="Add HTML here..." ><?php echo esc_textarea( $row_data['content'] ); ?></textarea>
					
                    <input class="cpb-row-input" type="hidden" name="cpb[<?php echo $order; ?>][type]" data-field="type" value="col-1">
                   
				</div><!-- .cpb-row-fields -->

			</div><!-- .cpb-row.cpb-col-1 -->
			<?php
		}
				
	}
}


/* === ADMIN SCRIPTS === */

/* Admin Script */
add_action( 'admin_enqueue_scripts', 'cpbbase_admin_scripts' );

/**
 * Admin Scripts
 * @since 1.0.0
 */
function cpbbase_admin_scripts( $hook_suffix ){
	global $post_type;

	/* In Page Edit Screen */
	if( 'page' == $post_type && in_array( $hook_suffix, array( 'post.php', 'post-new.php' ) ) ){

		/* Load Editor/Page Builder Toggle Script */
		wp_enqueue_script( 'cpbbase-admin-editor-toggle', CPBBASE_URI . 'assets/admin-editor-toggle.js', array( 'jquery' ), CPBBASE_VERSION );

		/* Enqueue CSS & JS For Page Builder */
		wp_enqueue_style( 'cpbbase-admin', CPBBASE_URI. 'assets/admin-page-builder.css', array(), CPBBASE_VERSION );
		wp_enqueue_script( 'cpbbase-admin', CPBBASE_URI. 'assets/admin-page-builder.js', array( 'jquery', 'jquery-ui-sortable' ), CPBBASE_VERSION, true );
	}
}


