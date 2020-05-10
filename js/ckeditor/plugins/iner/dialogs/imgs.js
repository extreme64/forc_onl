

    var prog_notif = new CKEDITOR.plugins.notification( editor, { type: 'progress' } );
    var notification1 = new CKEDITOR.plugins.notification( editor, { type: 'info' } );
    var slike_html="";
    var insert_slike_array = [];
    var num = 3;
    var status = 1;
    var is_checked;
    /** prilikom odabira sliak vizuelno ih oznaciti  */
    var neselektovan_stil = "#eee";
    var selektovan_stil= "#3f8edf";
    //----

    function odabirSlike(e){
        slike_html= ''; // isprazni sve od prethodne selekcije
        insert_slike_array = []

        // markiraj odabranu sliku
        if($(e).attr('data-slike-selektovana') == "false"){
            $(e).css('background-color', selektovan_stil);
            $(e).attr('data-slike-selektovana','true')
        }else{
            $(e).css('background-color', neselektovan_stil)
            $(e).attr('data-slike-selektovana','false')
        }

        // ubaci sve markirano
        $('[data-slike-selektovana="true"]').each(function(){
            var html='';
            html += '<img width="48" height="48" title="'
                +$(this).attr('title')+'" src="'+$(this).attr('src')+'" alt="' + $(this).attr('alt')+'" />';

            insert_slike_array.push(html)
            /*slike_html += '<img width="48" height="48" title="'
                +$(this).attr('title')+'" src="'+$(this).attr('src')+'" alt="' + $(this).attr('alt')+'" />'   ;
                 */
        });
    }

    function ucitajSlike(id_gal)
    {
        var url

        // naziv JSON stringa 'slike/data'
        var return_data_meta;

        if(id_gal==undefined){
            url = "http://localhost/forcreating/admin/slike/sve/"+num;
            return_data_meta = "slike";
        }else{
            id_gal = id_gal.join("v"); // spojiti sve selektovane galerije
            url = "http://localhost/forcreating/admin/galerije/slike_iz_galerije/"+id_gal;
            return_data_meta = "data";
        }
        //num = $("[name='num']").val();

        $.ajax({
            url: url,
            type: "POST",     dataType: 'JSON',     async: true,

            error: function(x,s,e){  prog_notif.update({message: "error: "+e + x.responseText, type: 'warning'});  status=-1; },
            success: function(val)
            {
                prog_notif.update({message: 'Proces: 1%', progress: 0.01});
                var j=0;

                slike_html = '<ul id="slikewrapul" data-dialog-ui-ul >';
                for(var i in val[return_data_meta]) {

                    slike_html += '<li value="'+ val[return_data_meta][i].id_image
                        +'" ><img data-slike-selektovana="false"  onClick="odabirSlike(this)" style="max-width:64px !important; height:64px; float:left; padding: 2px; background-color: '+neselektovan_stil+'" title="'
                        +val[return_data_meta][i].author+'" src="http://localhost/forcreating/images/upload/'
                        +val[return_data_meta][i].url+'" alt="' + val[return_data_meta][i].alt+'" /></li>'

                    j+=100/num;
                    var d = 0.00*j;
                    prog_notif.update({message: 'Proces: '+j.toFixed(0)+'%', progress: d.toFixed(0)});
                }
                slike_html += '</ul>';
                $("#slikewrapul").html(slike_html);
            }
        });
    }



    // Our dialog definition.
    CKEDITOR.dialog.add( 'imgsDialog', function( editor ) {


        return {

    		// Basic properties of the dialog window: title, minimum size.
    		title: 'SLIKE PRETRAŽIVAČ',
    		minWidth: 500,
    		minHeight: 300,
            height: 350,

    		// Dialog window content definition.
    		contents: [
    			// Definition of the Advanced Settings dialog tab (page).
    			{
    				id: 'tab-slike',
    				label: 'Slike na serveru',
                    background: 'black',

    				elements:
                    [{
                        type : 'hbox',
                        widths : [ '60%', '40%' ],
                        children :
                        [
                            {
                                type: 'vbox',
                                children:
                                [
                                    {
                                        // Opis
                                        type:'html',
                                        html:'<div>Odaberite slike za obacivanje u tekst</div>',
                                    },
                                    {
                                        // ispis slika iz galerije
                                        type: 'html',
                						id: 'slikewrapul',
                						label: 'Lista slika',
                                        html: '<ul id="slikewrapul" data-dialog-ui-ul >'
                                            +'<li value="1"><img width="48" height="48" src="http://orig14.deviantart.net/f682/f/2010/331/4/e/darth_vader_icon_64x64_by_geo_almighty-d33pmvd.png" alt="slika u listi select" /></li>'
                                            //+'<li value="2"><img width="48" height="48" src="http://orig11.deviantart.net/9adf/f/2014/019/7/4/charizard_hgss_sprite_64x64_by_15crashbandicoot15-d72tiya.png" alt="slika u listi select" /></li>'
                                            //+'<li value="3"><img width="48" height="48" src="http://findicons.com/files/icons/175/halloween_avatar/64/jack_skellington.png" alt="slika u listi select" /></li>'
                                            +'</ul>' ,
                                        onLoad: function(){},

                                    },
                                    {
                                        // opcija za pravljenje linka
                                        type: 'html',
                						id: 'a_include',
                						label: 'Link checkbox',
                                        html: '<input id="link" type="checkbox" class="" value="true" title="Slika je ugnjezdena u linka samoj sebi" checked >Svaka slika kao link</input>'

                                    },
                                    {
                                        // opcije za linkove
                                        type: 'html',
                						id: 'a_attr_include',
                						label: 'a attr',
                                        html: '<label for="attr_text" >Opcioni argumenti linka:</label><br /><input id="a_text" type="text" class="cke_dialog_ui_input_text" value="data-ui-npr" style="max-width:70% !important; ">'

                                    },
                                    {
                                        // opcije za zlike
                                        type: 'html',
                						id: 'img_attr_include',
                						label: 'img attr',
                                        html: '<label for="attr_text" >Opcioni argumenti slike:</label><br /><input id="attr_text" type="text" class="cke_dialog_ui_input_text" value="ref=lightbox" style="max-width:70% !important; " />'

                                    }
                                ]
                            },
                            {
                                type: 'vbox',
                                children:
                                [
                                    {
                                        // dostupne galerije  (multi select)
                                        type: 'html',
                						id: 'gal_select',
                						label: 'Galerije',
                                        html: '<label for="gal_select" >Lista galerija:</label><br /><hr /><select id="gal_select" data-gal-select class="cke_dialog_ui_input_text" style="width: 95%;"  size="10" multiple="true" /></select>',

                                        onChange:function(e){
                                            prog_notif.show();
                                            prog_notif.update({message: 'Proces: 1%'+num, progress: 0.01});
                                        }
                                    },
                                    {
                                        // ui komanda za odabrane galerije, dohvatanje slika za ispis u boksu  #slikewrapul
                                        type: 'html',
                						id: 'dohvati_btm',
                						label: 'Dohvati',
                                        html: '<input type="button" value="Dohvati slike" style="background-color: #eee; padding: 3px 5px 3px 5px"   />' ,

                                        onClick: function(){  ucitajSlike($("[data-gal-select]").val());   }

                                    }
                                ]
                            }
                        ]
    			    }]
                }
            ],
            onLoad: function()
            {

                // prilikom prvog otvaranja, ucitati sve galerije iz kojih se mogu birati slike za ubacivanje u tekst
                 $.ajax({
                    url:"http://localhost/forcreating/admin/galerije/lista_naziva/",
                    type: "POST",     dataType: 'JSON',

                    error: function(x,s,e){  prog_notif.update({message: "error: "+e + x.responseText, type: 'warning'});   status=-1; },
                    success: function(val)
                    {
                        var gal_list_html = '';
                        for(var i in val["data"])
                            gal_list_html += '<option value="'+ val["data"][i].value+'">'+val["data"][i].text+'</option>' ;

                        $("[data-gal-select]").html(gal_list_html);
                    }
                });
            },
            onCancel: function(){ prog_notif.hide(); },
            onHide: function(){ prog_notif.hide(); },

            onShow: function(){
                prog_notif.hide(); // ako je bila prethodna notf. a nije zatvorena, da olaksamo posao
                ucitajSlike();
            },

    		// This method is invoked once a user clicks the OK button, confirming the dialog.
    		onOk: function() {
    			// The context of this function is the dialog object itself.
                var dialog = this;

                if(status==1)
                {
                    // ako je selektovano pravljenej linka, omotaj img tag za s linkom
                    is_checked = $("#link").is(':checked');

                        for(var i in insert_slike_array)
                        {
                            // trebamo izvuci src iz img-a, za href atribut linka
                            // uzimamo html string iz niza, finalno imamo <a> obj. i njegov atribut koristimo u link tagu
                            var a = document.createElement( 'span' );  // bilo koji wrep el.
                            var s = insert_slike_array[i];

                            // ovde ubacujemo atribute za img tag
                            var tmpo =  '<img ' + $("#attr_text").val() +' ';
                            s = s.replace('<img', tmpo);
                            console.log(s)  ;
                            a.innerHTML = s;
                            var c = a.firstChild;
                            var href = c.getAttribute('src');
                            /** */

                            var pop;
                            if(is_checked==true)
                                pop = '<a '+$("#a_text").val()+' href="'+href+'" >'+s+'</a>';  // ovde ubacujemo atribute za a tag
                            else
                                pop = s;  // samo img bez a omot taga

                            insert_slike_array[i] = pop;
                        }

                    /**** BUG: in CKEditor  Uncaught TypeError: Cannot read property 'checkReadOnly' of undefined    04-Dec-15    */
                    var htm_tmp = insert_slike_array.join(''); //hack ???
                    slike_html = "<pre>"+insert_slike_array.join('')+"</pre>";   // hack

                    try {
                        editor.insertHtml(slike_html);
                        //TODO: opcija:
                        //var d = getData(); setData(d); //ovim samo nateramo editor da psoavi selekciju u editor (setData() postavlja selekciju na pocetak sadrzaja uvek)
                    } catch (e) {
                        // hvatamo izuzetak
                       console.log(e.message, e.name); // pass exception object to err handler
                       try {
                        //editor.insertHtml("");
                        editor.insertHtml(htm_tmp);
                        } catch (e) {
                            console.log(e.message, e.name); // pass exception object to err handler
                        }

                       var er_notif = new CKEDITOR.plugins.notification( editor, { message: "Nije odabrana lokacija u tekstu za insertovanje slike/a", type: 'warning' } );
                       er_notif.show();
                    }
                    prog_notif.update({ type: 'success'});
                    /**** */
                }
    			//var image = editor.document.createElement( 'img' );

    			// Set element attribute and text by getting the defined field values.
    			//image.setAttribute( 'src', dialog.getValueOf( 'tab-slike', 'id' ) );
                //image.setAttribute( 'title', "Neki title slike");
                //image.setAttribute( 'id', "1" );

                // Finally, insert the element into the editor at the caret position.
    			//editor.insertElement( image );


    		}
    	};
    });