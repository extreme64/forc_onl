        
        <style>
                .korisnici-panel-info{float: left; width: 100%; text-align: right; font-size:0.8em; color: #aaa}
                .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}
                .display-none{display: none}
                label{float: left; width: 60px;} 
        </style>


        <script type="text/javascript">
            
            /*$( document ).ajaxError(function( event, request, settings ) {
                alert( "Error requesting page " + settings.url +" "+ settings + "" );
            });*/
            
            $(document).ready(function() {

                    $("[data-id='sub_ns']").click(function(){
                         var forma_polja;
                        var formData = new FormData($(this).parents('form')[0]);
                        if($(this).attr("name") == 'sub_ns')
                        {
                            
                            formData.append("nov", "0");
                            formData.append("inp_szid", $('[name="inp_szid"]').val());   
                        }
                        else
                        {
                            formData.append("nov", "1");
                            
                        }
                        
                        $.ajax({
                            url:"<?php print $base_url ?>admin/staze/dodaj_stazu",
                            data: formData,
                            type: "POST",
                            dataType: 'JSON',
                            success: function(val)
                            {
                               
                                if(val[0] != "false")
                                    alert("OK");
                                else
                                    alert("Došlo je do greške!");
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    });
                
                
                    $("[data-edit-unos]").click(function(){
                 
                        $.ajax({
                            url:'<?php print $base_url ?>admin/staze/info_staza_xcall/'+$(this).attr("data-edit-unos"),
                            dataType: 'JSON',
                            success: function(val)
                            {
                                
                                $("[name='inp_szid']").val(val[0]['id_staza']); 
                                $("[name='inp_title']").val(val[0]['title']); 
                                
                                $("[name='ddl_tip']").val(val[0]['type']); 
                                $("[name='inp_lenght']").val(val[0]['lenght']); 
                                $("[name='inp_id_image']").val(val[0]['id_image']); 
                                $("[name='inp_text']").val(val[0]['text']); 
                                    
                                 
                                $("[name='novi-staza']").fadeOut(100);
                                $("[name='edit-staza']").toggle(400);    
                                
                            }
                        });
                        
                        
                    });
                    
                $("[data-ui-novastaza]").click(function(){
                    
                    $("[name='edit-staza']").fadeOut(100);
                    $("[name='novi-staza']").toggle(400);
                })
                
                $("[data-ui-editbox]").click(function(){$("[name='edit-staza']").fadeOut(400); $("[name='novi-staza']").fadeOut(400)});
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
                            
                            
                            
                            <div class="archive-box">
                                <h3 class="archive-heading"><i class="fa fa-flag-checkered"></i> STAZE | 
                                    <a><span data-ui-novastaza="" class="fa fa-plus" title="Dodaj novo +"></span></a></h3>
                                <ul class="archive-list">
                                    
                                    <?php foreach($staze as $s): ?>
                                    <li>
                                        <h4><a href="<?php print $base_url ?>admin/staze/obrisi_stazu/<?php print $s->id_staza ?>"><i class="fa fa-trash"></i></a> 
                                            <?php  print $s->title ?> / <?php print $s->id_staza ?> / <a ><i data-edit-unos="<?php print $s->id_staza ?>" class="fa fa-cog"></i></a>
                                        </h4>
                                    </li>
                                    <?php endforeach ?>
                                    
                                </ul>
                            </div> <!-- /.archive-box -->
                        </div> <!-- /.box-content -->

                        
                        <div class="box-content box-zasebni-poc-admin" >
                            
                            <div class="archive-box">
                                <h3 class="archive-heading"><i class="fa fa-cogs"></i> Dodatno <a></a></h3>
                                <ul class="archive-list">
                                    <?php
                                        $form_ns = array('method' => "POST", 'name' => "form_ns");
                                        
                                        $form_ns_id = array( 'name' => "inp_szid", 'type' => "text", 'disabled' => "true"   );

                                        $form_ns_tip =  array('-1'=> "Tip...", '1' => "DH", '2' => "FR", '3' => "ED");                                        

                                        $form_ns_naziv = array( 'name' => "inp_title", 'type' => "text", 'maxlength' => "30");
                                        $form_ns_slika_id = array( 'name' => "inp_id_image", 'type' => "text", 'maxlength' => "10");
                                        $form_ns_duzina = array( 'name' => "inp_lenght", 'type' => "text", 'maxlength' => "20");
                                        $form_ns_opis = array( 'name' => "inp_text", 'rows' => "14", 'cols' => "35");


                                        $form_ns_naziv_n = array( 'name' => "inp_title_n", 'type' => "text", 'maxlength' => "30");
                                        $form_ns_slika_id_n = array( 'name' => "inp_id_image_n", 'type' => "text", 'maxlength' => "10");
                                        $form_ns_duzina_n = array( 'name' => "inp_lenght_n", 'type' => "text", 'maxlength' => "20");
                                        $form_ns_opis_n = array( 'name' => "inp_text_n", 'rows' => "14", 'cols' => "35");



                                        $form_ns_submit = array('data-id' => "sub_ns",  'name' => 'sub_ns', 'value' => "SAČUVAJ", 'type' => "button");
                                        $form_ns_submit2 = array('data-id' => "sub_ns",  'name' => 'sub_ns2', 'value' => "DODAJ", 'type' => "button");
                                        
                                    ?>
                                    <li name="edit-staza" class="display-none">
                                        <h3>Edit staza <span class="fa fa-cog"></span></h3>
                                        <p>
                                            <?php print form_open($base_url."", $form_ns); ?>
                                            
                                            <label>ID: </label><?php print form_input($form_ns_id); ?><br />
                                            <label>Naziv: </label><?php print form_input($form_ns_naziv); ?><br />
                                            
                                            <label>Tip: </label><?php print form_dropdown('ddl_tip', $form_ns_tip, "-1" ); ?><br />
                                            <label>Dužina: </label><?php print form_input($form_ns_duzina); ?><br />
                                            
                                            <label>Slika ID: </label><?php print form_input($form_ns_slika_id); ?><br />
                                            
                                            
                                            
                                            <label>Opis: </label><?php print form_textarea($form_ns_opis); ?><br />
                                            
                                            
                                            <i class="fa fa-caret-left" data-ui-editbox ></i> 
                                            <?php print form_submit($form_ns_submit); ?>
                                            <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>
                                            
                                            <?php print form_close(); ?>
                                        </p>
                                    </li>
                                    
                                    <li name="novi-staza" class="display-none">
                                        <h3>Nova staza <span class="fa fa-plus"></span></h3>
                                        <p>
                                            <?php print form_open($base_url."", $form_ns); ?>
                                            
                                            <label>Naziv: </label><?php print form_input($form_ns_naziv_n); ?><br />
                                            
                                            <label>Tip: </label><?php print form_dropdown('ddl_tip_n', $form_ns_tip, "-1" ); ?><br />
                                            <label>Dužina: </label><?php print form_input($form_ns_duzina_n); ?><br />
                                            
                                            <label>Slika ID: </label><?php print form_input($form_ns_slika_id_n); ?><br />
                                            
                                            
                                            
                                            <label>Opis: </label><?php print form_textarea($form_ns_opis_n); ?><br />
                                            
                                            <i class="fa fa-caret-left" data-ui-editbox ></i> 
                                            <?php print form_submit($form_ns_submit2); ?>
                                            <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>
                                            
                                            <?php print form_close(); ?>
                                        </p>
                                    </li>
                                    
                                </ul>
                            </div> <!-- /.archive-box -->
                            
                           
                            
                        </div>
                    
                        
                    </div> <!-- /.col-md-12 -->
                        <p class="korisnici-panel-info">
                                <i class="fa fa-file-o"></i> Prikaz svih tekstova. Izmena, dodavanje, brisanje.
                        </p>
                </div> <!-- /.row -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->