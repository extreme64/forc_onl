

    var prog_notif = new CKEDITOR.plugins.notification( editor, { type: 'progress' } );
    var status = 1;
    /** prilikom odabira sliak vizuelno ih oznaciti  */
    var neselektovan_stil = "#eee";
    var selektovan_stil= "#3f8edf";

    //----   plug in specificno
    var final_transcript = '';
    var recognizing = false;
    var ignore_onend;
    var recognition




    // Our dialog definition.
    CKEDITOR.dialog.add( 'dictaDialog', function( editor ) {


        return {

    		// Basic properties of the dialog window: title, minimum size.
    		title: 'DIKTAFON',
    		minWidth: 300,
    		minHeight: 200,

    		// Dialog window content definition.
    		contents: [
                // Definition of the Advanced Settings dialog tab (page).
    			{
    				id: 'tab-dict',
    				label: 'Diktiranje teksta',
                    background: 'black',

    				elements:
                    [{
                        type : 'hbox',
                        widths : [ '70%', '30%' ],
                        children :
                        [
                            {
                                type: 'vbox',
                                children:
                                [
                                    {
                                        // Opis
                                        type:'html',
                                        html:'<div>Tasteri diktafona</div>',
                                    },
                                    {
                                        type: 'hbox',
                                        children:
                                        [
                                            {
                                                type: 'html',
                        						id: 'snimanje_btn',
                        						label: 'Snimanje',
                                                html: '<input type="button" value="SNIMAJ" style=" text-align: center; min-width: 60px; min-height: 40px; background-color: #eee; padding: 3px 5px 3px 5px"   />' ,
                                                onClick: function(){

                                                    console.log("REC: !!!");
                                                    recognition.start();
                                                    ignore_onend = false;
                                                }
                                            },
                                            {
                                                type: 'html',
                        						id: 'prekid_btn',
                        						label: 'Prekid',
                                                html: '<input type="button" value="STOP" style=" text-align: center; min-width: 60px; min-height: 40px; background-color: #eee; padding: 3px 5px 3px 5px"   />' ,
                                                onClick: function(){    recognition.stop(); console.log("REC STOP !!!")   }
                                            },
                                            {
                                                type: 'html',
                        						id: 'trenutno_zabelezeno_inp',
                        						label: 'Trenutno',
                                                html: '<input id="trenutno_zabelezeno_inp" type="text" value="Trenutno zigovoreno... ovde"    />'
                                            },
                                            {
                                                type: 'html',
                        						id: 'zabelezi_u_preset_btn',
                        						label: 'Zabelezi za kasnije',
                                                html: '<input type="button" value="Sačuvaj" style="background-color: #eee; padding: 3px 5px 3px 5px"   />' ,
                                                onClick: function(){
                                                    console.log("Insertuj trenutno u presete!!!")
                                                }
                                            }
                                        ]

                                    },
                                    {
                                        //
                                        type: 'html',
                						id: 'presets_text',
                						label: 'Sačuvani uzorci',
                                        html: '<textarea id="presets_text" width="200" rows="7">Preseti neki , preset drugi , itd. , </textarea>;'
                                    },
                                    {
                                        //
                                        type: 'html',
                						id: 'ubaci_preset_btn',
                						label: 'Ubaci sačuvano u tekst',
                                        html: '<input type="button" value="Ubaci" style="background-color: #eee; padding: 3px 5px 3px 5px"   />' ,
                                        onLoad: function(){}
                                    }
                                ]
                            },
                            {
                                type: 'vbox',
                                children:
                                [
                                    {
                                          // Opis
                                        type:'html',
                                        html:'<div>"VITEX" diktafon plagin / <br />Forward Creating &copy; 2015.</div>',
                                    },
                                    {
                                        // ui komanda za odabrane galerije, dohvatanje slika za ispis u boksu  #slikewrapul
                                        type: 'html',
                						id: 'test_btm',
                						label: 'Test',
                                        html: '<input type="button" value="Test" style="background-color: #eee; padding: 3px 5px 3px 5px"   />' ,

                                        onClick: function(){    }
                                    }
                                ]
                            }
                        ]
    			    }]
                }
            ],
            onLoad: function()
            {

                recognition = new webkitSpeechRecognition();
                recognition.continuous = true;
                recognition.interimResults = true;
                recognition.lang = "en-US";

                recognition.onstart = function () {
                    recognizing = true;
                };

                recognition.onend = function () {
                    recognizing = false;
                    if (ignore_onend) {
                        return;
                    }
                    if (!final_transcript) {
                        return;
                    }
                };

                recognition.onresult = function (event) {
                    var interim_transcript = '';
                    for (var i = event.resultIndex; i < event.results.length; ++i) {
                        if (event.results[i].isFinal) {
                            final_transcript += event.results[i][0].transcript;
                        } else {
                            interim_transcript += event.results[i][0].transcript;
                        }
                    }

                    $("#trenutno_zabelezeno_inp").val(format(interim_transcript));

                    console.log(format(final_transcript)+"\n");
                    var str_tmp = $("#presets_text").text();
                    str_tmp += format(interim_transcript);
                    $("#presets_text").text(str_tmp);
                };



            },
            onCancel: function(){ },
            onHide: function(){ },

            onShow: function(){ },

    		// This method is invoked once a user clicks the OK button, confirming the dialog.
    		onOk: function() {   	}
    	};
    });




    /* helper functions */

    function format(s) {
        return linebreak(capitalize(s));
    }

    function linebreak(s) {
        return s.replace(/\n\n/g, '<p></p>').replace(/\n/g, '<br>');
    }

    function capitalize(s) {
        return s.replace(/\S/, function (m) {
            return m.toUpperCase();
        });
    }

