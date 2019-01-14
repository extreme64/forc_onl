        
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

                    $("[data-id='sub_nkat']").click(function(){
                         var forma_polja;
                        if($(this).attr("name") == 'sub_nkat')
                        {
                            forma_polja = {
                                nov: '0', 
                                inp_catid: $("[name='inp_katid']").val(),  
                                inp_title: $("[name='inp_title']").val(),  
                                inp_tip: $("[name='ddl_tip'] :selected").val()
                            };    
                        }
                        else
                        {
                             forma_polja = { 
                                nov: '1', 
                                inp_title: $("[name='inp_title2']").val(),  
                                inp_tip: $("[name='ddl_tip2'] :selected").val()
                            };   
                        }
                        
                        $.ajax({
                            url:"<?php print $base_url ?>admin/kategorije/dodaj_kategoriju",
                            data: forma_polja,
                            type: "POST",
                            dataType: 'json',
                            success: function(val)
                            {
                                if(val[0] != "false")
                                    alert(val[0]);
                                else
                                    alert("Došlo je do greške!");
                            }
                        });
                    });
                
                
                    $("[data-edit-unos]").click(function(){
                 
                        $.ajax({
                            url:'<?php print $base_url ?>admin/kategorije/info_kategorija_xcall/'+$(this).attr("data-edit-unos"),
                            dataType: 'json',
                            success: function(val)
                            {
                                $("[name='inp_katid']").val(val[0]['id_cat']); 
                                $("[name='inp_title']").val(val[0]['title']); 
                                $("[name='ddl_tip']").val(val[0]['type']); 
                                    
                                 
                                $("[name='nova-kategorija']").fadeOut(100);
                                $("[name='edit-kategorija']").toggle(400);    
                                
                            }
                        });
                        
                        
                    });
                    
                $("[data-ui-novakategorija]").click(function(){
                    
                    $("[name='edit-kategorija']").fadeOut(100);
                    $("[name='nova-kategorija']").toggle(400);
                })
                
                $("[data-ui-editbox]").click(function(){$("[name='edit-kategorija']").fadeOut(400); $("[name='nova-kategorija']").fadeOut(400)});
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
                                <h3 class="archive-heading"><i class="fa fa-plus-square-o"></i> KATEGORIJE | 
                                    <a><span data-ui-novakategorija="" class="fa fa-plus" title="Dodaj novo +"></span></a></h3>
                                <ul class="archive-list">
                                    
                                    <?php foreach($kategorije as $k): ?>
                                    <li>
                                        <h4><a href="<?php print $base_url ?>admin/kategorije/obrisi_kategoriju/<?php print $k->id_cat ?>"><i class="fa fa-trash"></i></a> 
                                            <?php  print $k->title ?> / <?php print $k->id_cat ?> / <a ><i data-edit-unos="<?php print $k->id_cat ?>" class="fa fa-cog"></i></a>
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
                                        $form_nkat = array('method' => "POST", 'name' => "form_nkat");
                                        $form_nkat_id = array( 'name' => "inp_katid", 'type' => "text", 'disabled' => "true"   );
                                        $form_nkat_title = array( 'name' => "inp_title", 'type' => "text", 'maxlength' => "30");
                                        $form_nkat_tip =  array('-1'=> "Tip odabir...", '1' => "tip 1", '2' => "tip 2");

                                        $form_nkat_title2 = array( 'name' => "inp_title2", 'type' => "text", 'maxlength' => "30");
                                        $form_nkat_tip2 =  array('-1'=> "Tip odabir...", '1' => "tip 1", '2' => "tip 2");

                                        $form_nkat_submit = array('data-id' => "sub_nkat",  'name' => 'sub_nkat', 'value' => "SAČUVAJ", 'type' => "button");
                                        $form_nkat_submit2 = array('data-id' => "sub_nkat",  'name' => 'sub_nkat2', 'value' => "DODAJ", 'type' => "button");
                                        
                                    ?>
                                    <li name="edit-kategorija" class="display-none">
                                        <h3>Edit kategorija <span class="fa fa-cog"></span></h3>
                                        <p>
                                            <?php print form_open($base_url."", $form_nkat); ?>
                                            
                                            <label>ID: </label><?php print form_input($form_nkat_id); ?><br />
                                            <label>Naziv: </label><?php print form_input($form_nkat_title); ?><br />
                                            <label>Tip: </label><?php print form_dropdown('ddl_tip', $form_nkat_tip, "-1" ); ?><br />
                                            
                                            <i class="fa fa-caret-left" data-ui-editbox ></i> 
                                            <?php print form_submit($form_nkat_submit); ?>
                                            <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>
                                            
                                            <?php print form_close(); ?>
                                        </p>
                                    </li>
                                    
                                    <li name="nova-kategorija" class="display-none">
                                        <h3>Nova kategorija <span class="fa fa-plus"></span></h3>
                                        <p>
                                            <?php print form_open($base_url."", $form_nkat); ?>
                                            
                                            <label>Naziv: </label><?php print form_input($form_nkat_title2); ?><br />
                                            <label>Tip: </label><?php print form_dropdown('ddl_tip2', $form_nkat_tip2, "-1" ); ?><br />
                                            
                                            <i class="fa fa-caret-left" data-ui-editbox ></i> 
                                            <?php print form_submit($form_nkat_submit2); ?>
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