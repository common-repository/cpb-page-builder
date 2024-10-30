/**
 * Custom Page Builder Base Admin JS
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @author Farhan Girach <farhangirach@hotmail.com>
 * @copyright Copyright (c) 2017, Farhan Girach
**/
jQuery( document ).ready( function( $ ){

	/* Function: Update Order */
	function cpb_UpdateOrder(){

		/* In each of rows */
		$('.cpb-rows > .cpb-row').each( function(i){

			/* Increase num by 1 to avoid "0" as first index. */
			var num = i + 1;

			/* Update order number in row title */
			$( this ).find( '.cpb-order' ).text( num );

			/* In each input in the row */
			$( this ).find( '.cpb-row-input' ).each( function(i) {

				/* Get field id for this input */
				var field = $( this ).attr( 'data-field' );

				/* Update name attribute with order and field name.  */
				$( this ).attr( 'name', 'cpb[' + num + '][' + field + ']');
			});
		});
	}

	/* Update Order on Page load */
	cpb_UpdateOrder();

	/* Make Row Sortable */
	$( '.cpb-rows' ).sortable({
		handle: '.cpb-handle',
		cursor: 'grabbing',
		stop: function( e, ui ) {
			cpb_UpdateOrder();
		},
	});

	/* Add Row */
	$( 'body' ).on( 'click', '.cpb-add-row', function(e){
		e.preventDefault();
 
		 /* Target the template. */
		var template = '.cpb-templates > .cpb-' + $( this ).attr( 'data-template' );

		/* Clone the template and add it. */
		$( template ).clone().appendTo( '.cpb-rows' );

		/* Hide Empty Row Message */
		$( '.cpb-rows-message' ).hide();

		/* Update Order */
		cpb_UpdateOrder();
	});

	/* Hide/Show Empty Row Message On Page Load */
	if( $( '.cpb-rows > .cpb-row' ).length ){
		$( '.cpb-rows-message' ).hide();
	}
	else{
		$( '.cpb-rows-message' ).show();
	}

	/* Delete Row */
	$( 'body' ).on( 'click', '.cpb-remove', function(e){
		e.preventDefault();

		/* Delete Row */
		$( this ).parents( '.cpb-row' ).remove();
		
		/* Show Empty Message When Applicable. */
		if( ! $( '.cpb-rows > .cpb-row' ).length ){
			$( '.cpb-rows-message' ).show();
		}

		/* Update Order */
		cpb_UpdateOrder();
	});

});
