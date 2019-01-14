
        <style>
                .korisnici-panel-info{float: left; width: 100%; text-align: right; font-size:0.8em; color: #aaa}
                .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}
                .display-none{display: none}
                label{float: left; width: 60px;} 
                .slika_prev_lista{width: 50px; height: 50px; float: left}
        </style>

        
        <script type="text/javascript">
            /*$( document ).ajaxError(function( event, request, settings ) {
                alert( "Error requesting page " + settings.url +" "+ settings + "" );
            });*/
             
            $(document).ready(function()
            {

                $("[data-id='sub_nsl']").click(function(event){
                    event.stopPropagation();
                    event.preventDefault();
                    //$("[name='fileupload']").submit();
                    //alert("!"+event.isDefaultPrevented() );

                    var forma_polja;

                    var formData = new FormData($(this).parents('form')[0]);



                    if($(this).attr("name") == 'sub_nsl')
                    {
                        formData.append("nov", "0");
                        forma_polja = {
                            nov: '0',
                            inp_catid: $("[name='inp_katid']").val(),
                            inp_title: $("[name='inp_title']").val(),
                            inp_tip: $("[name='ddl_gal_n'] :selected").val()
                        };
                    }
                    else
                    {
                         formData.append("nov", "1");
                         forma_polja = {
                            nov: '1',
                            title: $("[name='inp_title_n']").val(),
                            galerija: $("[name='ddl_gal_n'] :selected").val(),
                            file: 'userfile'
                        };
                    }

                    $.ajax({
                        url: '<?php print $base_url ?>admin/slike/dodaj_sliku',
                        type: 'POST',
                        xhr: function() {
                            var myXhr = $.ajaxSettings.xhr();
                            return myXhr;
                        },
                        success: function (data) {

                            if(data[0] == "OK")
                                alert('Slike sačuvane!');
                            else
                                alert(data)
                            alert("Data Uploaded: "+data);
                        },
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    });



                });


                // dodavanje nove i cuvanje azurirane vec postojece galerije
                $("[data-id='sub_gal']").click(function(){
                     var forma_polja;
                    if($(this).attr("name") == 'sub_gal')
                    {
                        forma_polja = {
                            nov: '0',
                            inp_galid: $("[name='inp_galid']").val(),
                            inp_title: $("[name='inp_title']").val()
                        };
                    }
                    else
                    {
                         forma_polja = {
                            nov: '1',
                            inp_title_n: $("[name='inp_title_n']").val()
                        };

                    }

                    $.ajax({
                        url:"<?php print $base_url ?>admin/galerije/dodaj_galeriju",
                        data: forma_polja,
                        type: "POST",
                        dataType: 'json',
                        success: function(val)
                        {
                            if(val[0] != "false"){
                                // kada se edituje galerija, reflektovati promenu u ddl za desinaciju akcije
                                $("[data-ui-title="+forma_polja["inp_galid"]+"]").text(forma_polja["inp_title"]);
                                ostaleGalerije( selektovana_galerija() );

                                alert(val);
                            }
                            else
                                alert("Došlo je do greške!");
                        }
                    });

                });

                // prikaz edit boksa i forme sa sve podacima o galeriji
                $("[data-edit-unos]").click(function()
                {
                    var j = $(this).attr("data-edit-unos");
                    console.log( j + " | " + $("[name='inp_galid']").val())

                    if( j != $("[name='inp_galid']").val() )     // slati ajax samo ako trazimo drugu galeriju
                    {
                        if( $("[name='inp_galid']").val() != undefined ){
                            if($("[name='edit-galeriju']").css("display")=="none") {
                                $("[name='edit-galeriju']").toggle(700);
                            }
                            else{
                                $("[name='edit-galeriju']").toggle(100).toggle(700);
                            }
                        }

                        $.ajax({
                            url:'<?php print $base_url ?>admin/galerije/info_galerija_xcall/'+ j,
                            dataType: 'json',
                            success: function(val)
                            {
                                $("[name='inp_galid']").val(val[0]['id_gal']);
                                $("[name='inp_title']").val(val[0]['title']);

                                $("[name='nova-galerija']").fadeOut(100);
                                $("[name='edit-galeriju']").fadeIn(400);
                            }
                        });
                    }

                });

                // nova galerioja box i forma za novu galeriju
                $("[data-ui-novagalerija]").click(function(){
                    
                    $("[name='edit-galeriju']").fadeOut(100);
                    $("[name='nova-galerija']").toggle(400);
                })
                
                $("[data-ui-editbox]").click(function(){$("[name='edit-galeriju']").fadeOut(400); $("[name='nova-galerija']").fadeOut(400)});

                // otvaranje galerije i prikaz slika
                $("[data-ui-slikegalerija]").click(function(){



                    var forma_polja;
                    forma_polja = {
                        gid: $(this).attr("data-gid")
                    }
                    $.ajax({
                        url:"<?php print $base_url ?>admin/galerije/slike_iz_galerije",
                        data: forma_polja,
                        type: "POST",
                        dataType: 'JSON',
                        error:function(x,s,e){alert(x.responseText + "Err: "+e+ " | S: "+s);},
                        success: function(val)
                        {
                            //alert(val["data"]);
                            if(val["data"] != false)
                            {
                                //$("[data-slikegalerija-box]").text(val["data"].length);

                                var html="";
                                for(var i in val["data"]) {
                                   //console.log(i,val["data"][i]);
                                   html += "<i data-sel-stat=\"0\" data-edit-unos=\""+val["data"][i].id_image+"\" class=\"edit-rm-off left fa fa-square-o\" >   "
                                                + " <img width=\"100\" src=\"<?php print $base_url ?>images/upload/" + val["data"][i].url+ "\"  alt=\""
                                                + val["data"][i].alt+ "\" title=\"" + val["data"][i].author+ "\"  />  "
                                            + " </i> ";
                                }
                                if(html!="")
                                {
                                    // resetuj icone
                                    $("[data-gid] > i").removeClass('fa fa-folder-open').addClass('fa fa-folder');
                                    // setuj selektovanu, da reflektuje otvorenu galeriju
                                    $("[data-gid='"+forma_polja["gid"]+"'] > i").removeClass('fa fa-folder').addClass('fa fa-folder-open');
                                    $("[data-slikegalerija-box-prikaz]").html(html);

                                    // setovanje koja je galerija otvorena
                                    ostaleGalerije( selektovana_galerija() );


                                }
                            }
                            else
                                alert("Došlo je do greške! " + val["data"]);
                        }
                    });

                    /** prikaz/skrivanje boksa u kome se iscrtava html za prikaz slika
                     * unutar galerije koja je selektovana
                     */
                    if($("[data-slikegalerija-box]").css("display")=="none") {
                        $("[data-slikegalerija-box]").toggle(700);
                    }
                    else{
                        $("[data-slikegalerija-box]").toggle(100).toggle(700);
                    }

                })

                /** selektovanje slike. Selektovane slike se mogu dalje manipulisati */
                $(document).unbind().on( "click", "[data-sel-stat]", function() {                // .on jer je ovaj elemnt dodan kroz js nakon kreiranja dom-a  | .unbind() FIX for .on called 2x
                    //reset grafike
                    //var elem = $(this).get(0);
                    //setovanje grafike da reflektuje status selektovanog checkbox-a
                    if($(this).attr("data-sel-stat") == "1")
                        $(this).attr("data-sel-stat", "0").removeClass('fa-check-square-o').addClass('fa-square-o');
                    else
                        $(this).removeClass('fa-square-o').addClass('fa-check-square-o').attr("data-sel-stat", "1");
                });

                $("[data-akcije-slike]").change(function(){
                    // ucitaj galerije u selection, sve osim trenutno otvorene
                    ostaleGalerije( selektovana_galerija() );
                })

                function selektovana_galerija()
                {
                    var opened_gallery;
                    $.each($("[data-gid] > i") , function( index, value )
                    {
                        if($(value).hasClass("fa fa-folder-open"))
                            opened_gallery = $(value).parent(0).attr("data-gid");
                    });
                    return  opened_gallery;
                }

                function ostaleGalerije(str){
                    data_gid = { id1 : str }

                    $.ajax({
                        url:"<?php print $base_url ?>admin/galerije/sve_galerije/exc",
                        data: data_gid,
                        type: "POST",
                        dataType: 'JSON',
                        error:function(x,s,e){alert(x.responseText + "Err: "+e+ " | Status: "+s);},
                        success: function(val)
                        {
                            var html="", data = val["data"];
                            for(var i in data)
                               html +=  "<option value=\"" + data[i].id_gal + "\">" + data[i].title + "</option>";
                            $("[data-akcije-izbor-galerije]").html(html);
                        }
                    });
                }

                $("[data-ui-slike-ok]").click(function()
                {
                    var selected = {};
                    var i=0;
                    $.each($("[data-edit-unos]") , function( index, value )
                    {
                        if($(this).attr("data-sel-stat") == 1) { selected["ids"+i] = $(value).attr("data-edit-unos");  i++; }
                    });

                    if(i==0){
                        alert("Ništa selektovano !"); return;

                    }else{

                        var action = $("[data-akcije-slike] :selected").val();

                        if(action > -1)
                        {
                            var target;
                            target = (action != 3) ? $("[data-akcije-izbor-galerije] :selected").val() : selektovana_galerija();  /* 3 je opcija za brisanje (1/2 kopiranje/premestanje) */
                            if( target > -1 )
                            {
                                var data = { "selected" : selected, "target" : target, "action" : action};

                                $.ajax({
                                    url:"<?php print $base_url ?>admin/galerije/akcije_galerije",
                                    data: data,
                                    type: "POST",
                                    dataType: 'JSON',
                                    error:function(x,s,e){alert(x.responseText + "Err: "+e+ " | Status: "+s);},
                                    success: function(val)
                                    {
                                        alert(JSON.stringify(val));
                                        console.log(val["data"]);
                                    }
                                });
                            }else{alert("Nije odabrana destinacija ili"); return;}
                        }
                        else
                        {alert("Nije odabrana akcija !"); return; }
                    }

                });

            }); // / $(document).ready(function()
        </script>


        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2><?php print $title ?></h2>
                        <span>Panel za edit | <?php print $title ?></span>
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12" style="width: 100%; background-color: #fff">
                       
                            
                        <div class="box-content box-zasebni-poc-admin" >
                            <?php print $sub_menu; ?>
                        </div>

                        <div class="box-content box-zasebni-poc-admin" >
                            
                            
                            <!-- ispis naziva svih galerija -->
                            <div class="archive-box">
                                <h3 class="archive-heading"><i class="fa fa-folder"></i> GALERIJE |
                                    <a><span data-ui-novagalerija="" class="fa fa-plus" title="Dodaj novo +"></span></a></h3>
                                <ul class="archive-list">
                                    <?php if($galerije!=false): ?>
                                    <?php foreach($galerije as $g): ?>
                                    <li>
                                        <h4><a href="<?php print $base_url ?>admin/galerije/obrisi_galeriju/<?php print $g->id_gal ?>"><i class="fa fa-trash"></i></a>

                                            <span data-ui-title="<?php print $g->id_gal ?>"><?php print $g->title ?></span>

                                            <a data-gid="<?php print $g->id_gal ?>" data-ui-slikegalerija title="Otvori galeriju i prikazi slike"><i class="fa fa-folder"></i></a>  <!-- fa fa-folder-open -->
                                            <a title="Izmena podataka"><i data-edit-unos="<?php print $g->id_gal ?>" class="fa fa-cog"></i></a>
                                        </h4>
                                    </li>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </ul>
                            </div> <!-- /.archive-box -->

                            <!-- akcije ddl -->
                            <div data-slikegalerija-box class="display-none" >
                                <div>
                                    <select data-akcije-slike >
                                        <option>Akcije...</option>
                                        <option title="Kopiraj u drugu galeriju"            value="1" >KOPIRAJ</option>
                                        <option title="Premesti iz ove u drugu galeriju"    value="2" >PREMESTI</option>
                                        <option title="Ukloni odabrano iz galerije"         value="3" >UKLONI</option>
                                    </select>
                                    <select data-akcije-izbor-galerije title="U koju galeriju premestiti/kopirati selektovane slike">
                                        <option>Galerije...</option>
                                        <?php if($galerije!=false): ?>
                                        <?php foreach($galerije as $g): ?>
                                        <option value="<?php print $g->id_gal ?>"> <?php print $g->title ?> </option>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                    <button data-ui-slike-ok >OK</button>
                                </div>
                                <div data-slikegalerija-box-prikaz  >
                                </div>


                            </div>
                        </div> <!-- /.box-content 2 -->

                        
                        <div class="box-content box-zasebni-poc-admin" >
                            
                            <div class="archive-box">
                                <h3 class="archive-heading"><i class="fa fa-cogs"></i> Dodatno <a></a></h3>
                                <ul class="archive-list">
                                    <?php
                                        $form_gal = array( 'method' => "POST", 'name' => "form_gal");

                                        $form_gal_id = array( 'name' => "inp_galid", 'type' => "text", 'disabled' => "true"   );

                                        $form_gal_title =  array('name' => "inp_title", 'type' => "text", 'maxlength' => "30");                                        
                                        $form_gal_title_n =  array('name' => "inp_title_n", 'type' => "text", 'maxlength' => "30");

                                    
                                        $form_nsl_submit = array('data-id' => "sub_gal",  'name' => 'sub_gal', 'value' => "SAČUVAJ", 'type' => "button");
                                        $form_nsl_submit2 = array('data-id' => "sub_gal",  'name' => 'sub_gal2', 'value' => "DODAJ", 'type' => "button");
                                        
                                    ?>
                                    <li name="edit-galeriju" class="display-none">
                                        <h3>Edit galeriju <span class="fa fa-cog"></span></h3>
                                        <p>
                                            <?php print form_open("", $form_gal); ?>
                                            
                                            <label>ID: </label><?php print form_input($form_gal_id); ?><br />
                                            <label>Naziv: </label><?php print form_input($form_gal_title); ?><br />
                                            
                                            <i class="fa fa-caret-left" data-ui-editbox ></i> 
                                            <?php print form_submit($form_nsl_submit); ?>
                                            <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>
                                            
                                            <?php print form_close(); ?>
                                        </p>
                                    </li>
                                    
                                    <li name="nova-galerija" class="display-none">
                                        <h3>Nova galerija <span class="fa fa-plus"></span></h3>
                                        <p>
                                            <?php print form_open('', $form_gal);   ?>
                                            
                                            <label>Naziv: </label><?php print form_input($form_gal_title_n); ?><br />
                                            
                                            <i class="fa fa-caret-left" data-ui-editbox ></i> 
                                            <?php print form_submit($form_nsl_submit2); ?>
                                            <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>
                                            
                                            <?php print form_close(); ?>
                                        </p>
                                    </li>
                                    
                                    
                                    
                                </ul>
                            </div> <!-- /.archive-box -->
                            
                        </div>
                    
                    </div> <!-- /.col-md-12 -->
                        <p class="korisnici-panel-info">
                                <i class="fa fa-folder"></i> Prikaz svih galerija. Izmena, dodavanje, brisanje.
                        </p>
                </div> <!-- /.row -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->


