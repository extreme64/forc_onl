/**
 * Copyright (c) 2015, Forward Creating - Adam Gicevic. All rights reserved.
 * Licensed under the terms of the Commercal License (see LICENSE_forc.txt).
 */


// Register the plugin within the editor.
CKEDITOR.plugins.add( 'iner', {

	// Register the icons.
	icons: 'iner',

	// The plugin initialization logic goes inside this method.
	init: function( editor ) {

		// Define an editor command that opens our dialog window.
		editor.addCommand( 'iner', new CKEDITOR.dialogCommand( 'imgsDialog' ) );

		// Create a toolbar button that executes the above command.
		editor.ui.addButton( 'Imgs', {

			label: 'Slike pregled',   	// The text part of the button (if available) and the tooltip.

			command: 'iner' ,              // The command to execute on click.

			toolbar: 'test,1'  ,

            icon: "http://findicons.com/files/icons/1581/silk/16/application_view_gallery.png"
		});

        editor.ui.addButton( 'Gals', {

			label: 'Galerije pregled',   	// The text part of the button (if available) and the tooltip.

			command: 'iner' ,              // The command to execute on click.

			toolbar: 'test,2'  ,

            icon: "http://www.megaicons.net/static/img/icons_sizes/160/379/16/gallery-icon.png"
		});


		// Register our dialog file -- this.path is the plugin folder path.
		CKEDITOR.dialog.add( 'imgsDialog', this.path + 'dialogs/imgs.js' );
	}
});











