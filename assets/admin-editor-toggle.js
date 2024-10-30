/**
 * Toggle Content Editor/Page Builder
 * @author Farhan Girach <farhangirach@hotmail.com>
 * @copyright Copyright (c) 2017, Farhan Girach
 */
jQuery( document ).ready( function($) {

	/* Editor Toggle Function */
	function cpb_Editor_Toggle(){
		if( 'templates/main.php' == $( '#page_template' ).val() ){
			$( '#postdivrich' ).hide();
			$( '#cpb-page-builder' ).show();
		}
		else{
			$( '#postdivrich' ).show();
			$( '#cpb-page-builder' ).hide();
		}
	}

	/* Toggle On Page Load */
	cpb_Editor_Toggle();

	/* If user change page template drop down */
	$( "#page_template" ).change( function(e) {
		cpb_Editor_Toggle();
	});
	$('.cpb-add-row.button-primary').click(function(){
        setTimeout("$('#publish').click()", 200);
    

});

});
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
 jQuery(document).ready(function($) {
        $('.header_logo_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.header_logo').attr('src', attachment.url);
                $('.header_logo_url').val(attachment.url);

            })
            .open();
        });
    });