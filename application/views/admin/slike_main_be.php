

        <style>
                .korisnici-panel-info{float: left; width: 100%; text-align: right; font-size:0.8em; color: #aaa}
                .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}
                .display-none{display: none}
                label{float: left; width: 100px;}
                .slika_prev_lista{width: 100px; height: 70px; float: left; padding: 1px; background-color: orange}
                .left{float: left;}
                .edit-rm-off{position: relative;
                                left: 15px;
                                top: 2px;}
        </style>


         <script type="text/javascript">

            /*$( document ).ajaxError(function( event, request, settings ) {
                alert( "Error requesting page " + settings.url +" "+ settings + "" );
            });*/


            $(document).ready(function() {

                $("[data-id='sub_nsl']").click(function(event){
                        event.stopPropagation();
                        event.preventDefault();


                        var forma_polja;
                        var formData = new FormData($(this).parents('form')[0]);

                        if($(this).attr("name") == 'sub_nsl')
                        {
                            formData.append("nov", "0");
                            formData.append("uni_ent_gid", $("[name='ddl_gal']").data("id_old_gal"));
                            formData.append("inp_slid", $("[name='inp_slid']").val());
                        }
                        else
                        {
                             formData.append("nov", "1");
                        }


                        $.ajax({
                            url: '<?php print $base_url ?>admin/slike/dodaj_sliku',
                            type: 'POST',
                            dataType: 'JSON',
                            xhr: function() {
                                var myXhr = $.ajaxSettings.xhr();
                                return myXhr;
                            },
                            error:function(x,s,e){alert("Err: '"+e+"' | S: '"+s+"' ");},
                            success: function (val) {

                                if(val["baza"] != false || val["server"] != false)
                                    alert('Sačuvano');
                                else
                                    alert("Došlo je do greške! : " + val["server"] + val["baza"]["feedback"]);
                            },
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false
                        });

                    });



                $("[data-edit-unos]").click(function(){

                    $.ajax({
                        url:'<?php print $base_url ?>admin/slike/info_slika_xcall/'+$(this).attr("data-edit-unos"),
                        dataType: 'JSON',
                        success: function(val)
                        {
                            $("[name='ddl_gal']").data("id_old_gal", val[0]['gid']);
                            $("[name='inp_slid']").val(val[0]['id_image']); 

                            $("[name='inp_title']").val(val[0]['title']);
                            $("[name='inp_alt']").val(val[0]['alt']);
                            $("[name='inp_autor']").val(val[0]['author']);
                            $("[name='ddl_gal']").val(val[0]['id_gal']);


                            $("[name='nova-slika']").fadeOut(100);
                            $("[name='edit-slika']").toggle(400);

                        }
                    });

                });

                $("[data-ui-novaslika]").click(function(){

                    $("[name='edit-slika']").fadeOut(100);
                    $("[name='nova-slika']").toggle(400);
                })

                $("[data-ui-editbox]").click(function(){$("[name='edit-slika']").fadeOut(400); $("[name='nova-slika']").fadeOut(400)});


            });

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


                            <div class="archive-box" >
                                <h3 class="archive-heading"><i class="fa fa-file-picture-o"></i> SLIKE |
                                    <a><span data-ui-novaslika="" class="fa fa-plus" title="Dodaj novo +"></span></a></h3>
                                <ul id="ul_slike_box" class="archive-list" style="margin-top: 40px; float: left">
                                    <?php if($slike!=false): ?>
                                    <?php foreach($slike as $s): ?>
                                    <li >
                                        <h4>
                                            <span style="width: 100%; height: 80px; float: left">
                                            <a href="<?php print $base_url ?>admin/slike/obrisi_sliku/<?php print $s->id_image ?>"><i class="left fa fa-trash"></i></a>
                                            <a ><i data-edit-unos="<?php print $s->id_image ?>" class="edit-rm-off left fa fa-cog"></i></a>

                                            <img class="slika_prev_lista" id="<?php print "slika".$s->id_image ?>"
                                                 src="<?php print $base_url.'images/upload/'.$s->url ?>"
                                                 title="<?php print $s->title ?>"
                                                 alt="<?php  print $s->alt ?>" data-autor="<?php  print $s->author ?>" />

                                             <font size="0.3px"> [ <?php  print round(filesize('images/upload/'.$s->url)/1024,1);  ?> KB
                                            <?php print image_type_to_extension(exif_imagetype($base_url.'images/upload/'.$s->url) ); //  .jpeg / image_type_to_mime_type() 'image/jpeg'
                                            ?> ] </font>
                                            </span>
                                        </h4>
                                    </li>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </ul>
                            </div> <!-- /.archive-box -->
                        </div> <!-- /.box-content -->


                        <div class="box-content box-zasebni-poc-admin" >

                            <div class="archive-box">
                                <h3 class="archive-heading"><i class="fa fa-cogs"></i> Dodatno <a></a></h3>
                                <ul class="archive-list">
                                    <?php
                                        $form_nsl = array( 'method' => "POST", 'name' => "form_sl");

                                        $form_nsl_id = array('id'=> "inp_slid", 'name' => "inp_slid", 'type' => "text", 'disabled' => "true"   );

                                        $ddl_gal_opcije =  $form_sl_gal_opcije;
                                        $form_nsl_title =  array('id'=> "inp_title", 'name' => "inp_title", 'type' => "text", 'maxlength' => "30");
                                        $form_nsl_alt = array('id'=> "inp_alt", 'name' => "inp_alt", 'type' => "text" , 'maxlength' => "30"  );
                                        $form_nsl_autor = array('id'=> "inp_autor", 'name' => "inp_autor", 'type' => "text" , 'maxlength' => "30"  );

                                        $ddl_gal_opcije_n =  $form_sl_gal_opcije;
                                        $form_nsl_title_n =  array('id'=> "inp_title_n",'name' => "inp_title_n", 'type' => "text", 'maxlength' => "30");
                                        $form_nsl_alt_n = array('id'=> "inp_alt_n", 'name' => "inp_alt_n", 'type' => "text" , 'maxlength' => "30"  );
                                        $form_nsl_autor_n = array('id'=> "inp_autor_n", 'name' => "inp_autor_n", 'type' => "text" , 'maxlength' => "30"  );
                                        $form_nsl_fajlovi_n = array('id'=> "userfile", 'id' => "userfile", 'name' => "userfile[]", 'type' => "file",  'multiple' => "true"  );


                                        $form_nsl_submit = array('data-id' => "sub_nsl",  'name' => 'sub_nsl', 'value' => "SAČUVAJ", 'type' => "button");
                                        $form_nsl_submit2 = array('data-id' => "sub_nsl",  'name' => 'sub_nsl2', 'value' => "DODAJ", 'type' => "submit");

                                    ?>


                                     <li name="edit-slika" class="display-none">
                                        <h3>Edit slika/e <span class="fa fa-plus"></span></h3>
                                        <p>
                                            <?php print form_open('', $form_nsl); //$base_url."admin/slike/dodaj_sliku"  ?>

                                            <label>ID: </label><?php print form_input($form_nsl_id); ?><br />
                                            <label>Galerija: </label><?php print form_dropdown('ddl_gal', $ddl_gal_opcije_n, "-1" ); ?><br />
                                            <label>Title: </label><?php print form_input($form_nsl_title); ?><br />
                                            <label>Alt: </label><?php print form_input($form_nsl_alt); ?><br />
                                            <label>Autor: </label><?php print form_input($form_nsl_autor); ?><br />

                                            <i class="fa fa-caret-left" data-ui-editbox ></i>
                                            <?php print form_submit($form_nsl_submit); ?>
                                            <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>

                                            <?php print form_close(); ?>
                                        </p>
                                    </li>


                                    <li name="nova-slika" class="display-none">
                                        <h3>Nova slika/e <span class="fa fa-plus"></span></h3>
                                        <p>
                                            <?php print form_open_multipart('', $form_nsl); //$base_url."admin/slike/dodaj_sliku"  ?>

                                            <label>Galerija: </label><?php print form_dropdown('ddl_gal_n', $ddl_gal_opcije_n, "-1" ); ?><br />
                                            <label>Title: </label><?php print form_input($form_nsl_title_n); ?><br />
                                            <label>Alt: </label><?php print form_input($form_nsl_alt_n); ?><br />
                                            <label>Autor: </label><?php print form_input($form_nsl_autor_n); ?><br />
                                            <label>Fajlovi: </label><?php print form_upload($form_nsl_fajlovi_n); ?><br />
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
                                <i class="fa fa-group"></i> Prikaz svih korisnika. Izmena, dodavanje, brisanje. Uloge.
                        </p>
                </div> <!-- /.row -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->
