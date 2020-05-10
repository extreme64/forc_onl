/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */


    /*

    <div class="cke_notifications_area" >
        <div class="cke_notification cke_notification_info">
            <span class="cke_notification_progress"></span>
            <p class="cke_notification_message"> Show Notification </p>
            <a class="cke_notification_close" href="javascript:void(0)" title="Zatvori" role="button" tabindex="-1">
                <span class="cke_label">X</span>
            </a>
        </div>
    </div>

    */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    /* PLUGS */
    config.extraPlugins = 'uploadimage';
    config.uploadUrl = 'tekTestiratiOvo!!!!'; //config.uploadUrl = '/uploader/upload.php';
    //config.extraPlugins = 'abbr, iner';   //bug stil not solved 01-Dec-15
    config.toolbarCanCollapse = true;
    config.toolbarGroupCycling = true;
    //config.allowedContent = true;

    config.removeFormatAttributes = ''; //FIX: za uklanjanje argumente prilikom insertovanaj html-a u editor

    config.extraAllowedContent = 'img [*]{*}(*)';
    // Define the toolbar buttons you want to have available
    config.toolbar_sadamPimpsToolsis =
    [
        ['Preview'],
        ['Cut', 'Copy', '-','Paste', 'PasteText'], '/',
        ['SelectAll', 'RemoveFormat']
    ];




   config.toolbar_fuller =
   [
    	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', 'Preview' , 'find'] },
    	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
    	'/',
    	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
    	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
    	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
    	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'smiley' ] },
    	'/',
    	{ name: 'styles', items: [ 'Styles', 'Format' ] },
    	{ name: 'tools', items: [ 'Maximize' ] },
    	{ name: 'others', items: [ '-' ] },
    	{ name: 'about', items: [ 'About'] },
      { name: 'test', items: [ 'SuperButton',  'Abbr', 'Imgs', 'Gals', 'Vtx'] }
    ];




    /* custom command */
    editor.addCommand("alertData", {

        exec: function(edt) {
            //alert(edt.getData());
            var xml;
            edt.setData( "asdasdas dasd asd a" );

            $.ajax({
                url:"http://localhost/forcreating/admin/tekstovi/info_tekst_xcall/22",
                type: "POST",
                dataType: 'JSON',
                async: true,
                error: function(x,s,e){alert("error: "+e + x.responseText)},
                success: function(val)
                {  edt.setData(val[0]['text']) }
            });

        },
        async: true // samo primer CKEDITOR.commandDefinition
    });
    //

    // add button
    editor.ui.addButton('SuperButton', {
        label: "SuperButton, Click me",
        command: 'alertData',
        //toolbar: 'about',
        icon: 'http://individual.icons-land.com/IconsPreview/3D-Food/PNG/16x16/Alcohol_Cocktail_Martini.png'
    });
    editor.ui.addButton('smiley', {
        label: "Smiley",
        command: 'smiley'
    });
    editor.ui.addButton('find', {
        label: "find",
        command: 'find'
    });
    // http://www.xmlfiles.com/feeds/rss20/


};
