
        <style>
                .korisnici-panel-info{float: left; width: 100%; text-align: right; font-size:0.8em; color: #aaa}
                .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}
                .display-none{display: none}
        </style>


        <script type="text/javascript">
            
            $( document ).ajaxError(function( event, request, settings ) {
               // alert( "<li>Error requesting page " + settings.url + "</li>" );
            });
            
            $(document).ready(function() {

                    $("#sub_nkom").click(function(){
                        var forma_polja = {
                            inp_komid: $("[name='inp_komid']").val(),  
                            inp_tekst: $("[name='inp_tekst']").val(),  
                            inp_status: $("[name='ddl_verifikovan'] :selected").val()
                            /*inp_user_id: $("[name='inp_user_id']").val(),   inp_post_tip: $("[name='inp_post_tip']").val(),
                            inp_post_id: $("[name='inp_post_id']").val()*/
                        }

                        $.ajax({
                            url:"<?php print $base_url ?>admin/komentari/dodaj_komentar",
                            data: forma_polja,
                            type: "POST",
                            dataType: 'JSON',
                            success: function(val)
                            {
                                
                                if(val['feedback'] == true)
                                    alert("Sačuvano");
                                else
                                    alert("Došlo je do greške!" + feedback);
                            }
                        });
                    });
                
                
                    $("[data-edit-unos]").click(function(){
                 
                        $.ajax({
                            url:'<?php print $base_url ?>admin/komentari/info_komentar_xcall/'+$(this).attr("data-edit-unos"),
                            dataType: 'json',
                            success: function(val)
                            {
                                $("[name='inp_komid']").val(val[0]['id_comment']); 
                                $("[name='inp_tekst']").val(val[0]['text']); 
                                $("[name='ddl_verifikovan']").val(val[0]['status']); 
                                    
                                $("[name='inp_user_id']").val(val[0]['autor']); 
                                $("[name='inp_post_tip']").val(val[0]['posttype']); 
                                $("[name='inp_post_id']").val(val[0]['id_post']);
                                    
                                 
                                $("[name='novi-komentar']").fadeOut(100);
                                $("[name='edit-komentar']").toggle(400);    
                                
                            }
                        });
                        
                        
                    });
                    
                $("[data-ui-novikomentar]").click(function(){
                    
                    $("[name='edit-komentar']").fadeOut(100);
                    $("[name='novi-komentar']").toggle(400);
                })

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
                                <h3 class="archive-heading"><i class="fa fa-group"></i> KOMENTARI <!--| <a><span data-ui-novikomentar="" class="fa fa-plus" title="Dodaj novo +"></span></a>--></h3>
                                <ul class="archive-list">
                                    
                                    <?php foreach($komentari as $k): ?>
                                    <li>
                                        <h4><a href="<?php print $base_url ?>admin/korisnici/obrisi_komentar/<?php print $k->id_comment ?>"><i class="fa fa-trash"></i></a> 
                                            <?php print ellipsize($k->text, 30, 0.8) ?> / <?php print $k->id_comment ?>
                                            <br />
                                            <?php print $k->autor ?> / 
                                            <?php print $k->posttype ?> / 
                                            <br />
                                            <?php print preKolikoCeoFormat($k->time, true) ?> / 
                                            <?php print $k->status==2 ? "<i title='Javan' class='fa fa-eye'></i>" : "<i title='Nije javan'  class='fa fa-eye-slash'></i>" ?>
                                            / <a ><i data-edit-unos="<?php print $k->id_comment ?>" class="fa fa-cog"></i></a>
                                        </h4>
                                    </li>
                                    <?php endforeach ?>
                                    
                                </ul>
                            </div> <!-- /.archive-box -->

                            
                        </div> <!-- /.box-content -->
                        <style>
                        
                            label{float: left; width: 60px;} 
                            
                        
                        </style>
                        
                        <div class="box-content box-zasebni-poc-admin" >
                            
                            <div class="archive-box">
                                <h3 class="archive-heading"><i class="fa fa-cogs"></i> Dodatno <a></a></h3>
                                <ul class="archive-list">
                                    <?php
                                        $form_nkom = array('method' => "POST", 'id' => "form_nkom", 'name' => "form_nkom");
                                        $form_nkom_id = array('id' => "inp_komid", 'name' => "inp_komid", 'type' => "text", 'disabled' => "true");
                                        $form_nkom_tekst = array('id' => "inp_tekst", 'name' => "inp_tekst", 'type' => "text", 'maxlength' => "240");
                                        $form_nkom_status =  array('-1'=> "Javan...", '1' => "Ne", '2' => "Da");

                                        $form_nkom_user_id = array('id' => "inp_user_id", 'name' => "inp_user_id", 'type' => "text", 'disabled' => "true");    
                                        $form_nkom_post_tip = array('id' => "inp_post_tip", 'name' => "inp_post_tip", 'type' => "text", 'disabled' => "true");
                                        $form_nkom_post_id = array('id' => "inp_post_id", 'name' => "inp_post_id", 'type' => "text", 'disabled' => "true");

                                        $form_nkom_submit = array('data-id' => "sub_nkom", 'id' => "sub_nkom", 'name' => 'sub_nk', 'value' => "SAČUVAJ", 'type' => "button");
                                        
                                    ?>
                                    <li name="edit-komentar" class="display-none">
                                        <h3>Edit komentar <span class="fa fa-cog"></span></h3>
                                        <p>
                                            <?php print form_open($base_url."", $form_nkom); ?>
                                            <label>ID: </label><?php print form_input($form_nkom_id); ?><br />
                                            <label>Tekst: </label><?php print form_input($form_nkom_tekst); ?><br />
                                            <label>Status: </label><?php print form_dropdown('ddl_verifikovan', $form_nkom_status, "-1" ); ?><br />
                                            <hr />
                                            <caption><header>POST info</header>
                                            <label>Autor: </label><?php print form_input($form_nkom_user_id); ?><br />
                                            <label>Tip: </label><?php print form_input($form_nkom_post_tip); ?><br />
                                            <label>ID: </label><?php print form_input($form_nkom_post_id); ?><br />
                                            </caption>
                                            <?php //print form_dropdown('ddl_verifikovan', $form_nk_verifikacija_opcije, "-1" ); ?>
                                            <i class="fa fa-caret-left" data-ui-novikomentar ></i> 
                                            <?php print form_submit($form_nkom_submit); ?>
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