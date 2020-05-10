/**
 * Copyright (c) 2015, Forward Creating - Adam Gicevic. All rights reserved.
 * Licensed under the terms of the Commercal License (see LICENSE_forc.txt).
 */


// Register the plugin within the editor.
CKEDITOR.plugins.add( 'vitex', {

	// Register the icons.
	icons: 'vitex',

	// The plugin initialization logic goes inside this method.
	init: function( editor ) {

		// Define an editor command that opens our dialog window.
		editor.addCommand( 'dictaphoneDialog', new CKEDITOR.dialogCommand( 'dictaDialog' ) );

		// Create a toolbar button that executes the above command.
		editor.ui.addButton( 'Vtx', {

			label: 'Diktafon',   	// The text part of the button (if available) and the tooltip.

			command: 'dictaphoneDialog' ,              // The command to execute on click.

			toolbar: 'test'  ,

            icon: CKEDITOR.basePath+"plugins/vitex/images/metro-microphone-icon.png"
		});
        console.log(this.path + 'dialogs/vitex.js');


		// Register our dialog file -- this.path is the plugin folder path.
		CKEDITOR.dialog.add( 'dictaDialog', this.path + 'dialogs/dicta.js' );
	}
});











