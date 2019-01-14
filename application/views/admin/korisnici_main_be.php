
        <style>
                .korisnici-panel-info{float: left; width: 100%; text-align: right; font-size:0.8em; color: #aaa}
                .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}
                .display-none{display: none}
        </style>
        <script type="text/javascript">
            

            
            $(document).ready(function() {

                    $("[data-id='sub_k']").click( function(){

                        var forma_polja;

                        if($(this).attr("name") == 'sub_nk')
                        {
                            forma_polja = {
                                inp_nalog: $("#inp_nalog").val(),
                                inp_mejl: $("#inp_mejl").val(),
                                inp_sifra: $("#inp_sifra").val(),
                                ddl_tip: $("[name='ddl_tip'] :selected").val(),
                                ddl_verifikovan: $("[name='ddl_verifikovan'] :selected").val()
                            }
                            forma_polja['nov']=true;
                        }
                        else
                        {
                            forma_polja = {
                                inp_koid: $("#inp_koid_e").val(),
                                inp_nalog: $("#inp_nalog_e").val(),
                                inp_mejl: $("#inp_mejl_e").val(),
                                inp_sifra: $("#inp_sifra_e").val(),
                                ddl_tip: $("[name='ddl_tip_e'] :selected").val(),
                                ddl_verifikovan: $("[name='ddl_verifikovan_e'] :selected").val()
                            }
                            forma_polja['nov']=false;
                        }

                        $.ajax({
                            url:'<?php print $base_url ?>admin/korisnici/dodaj_korisnika',
                            data: forma_polja,
                            type: 'POST',
                            dataType: 'JSON',
                            error:function(x,s,e){alert("Err: "+e+ " | S: "+s);},
                            success: function(val)
                            {
                                $(".korisnici-panel-info").text(val["feedback"])
                                // ukoliko je vracen "tip_nepromenjen" ili true, znaci da je info upisan, a tip takodje ukoliko je menjan
                                if(val["feedback"]=="tip_nepromenjen" || val["feedback"]==true)
                                    alert("Sačuvano");
                                else
                                    alert("Došlo je do greške! : " + val["feedback"]);
                            }
                        });
                    });


                    $("[data-edit-korisnik]").click(function(){

                        $.ajax({
                            url:'<?php print $base_url ?>admin/korisnici/info_korisnika_xcall/'+$(this).attr("data-edit-korisnik"),
                            dataType: 'json',
                            success: function(val)
                            {
                                $("[name='inp_koid_e']").val(val[0]['id_user']),
                                $("[name='inp_nalog_e']").val(val[0]['name']),
                                $("[name='inp_mejl_e']").val(val[0]['mail']),
                                $("[name='inp_sifra_e']").val(val[0]['pass']),
                                $("[name='ddl_tip_e']").val(val[0]['tip'])
                                $("[name='ddl_verifikovan_e']").val(val[0]['status'])
                                 
                                $("[name='novi-korisnik']").fadeOut(100);
                                $("[name='edit-korisnik']").toggle(400);    

                            }
                        });
                    });


                $("[data-ui-novikorisnik]").click(function(){

                    $("[name='edit-korisnik']").fadeOut(100);
                    $("[name='novi-korisnik']").toggle(400);
                })


                $("[data-ui-editbox]").click(function(){$("[name='edit-korisnik']").fadeOut(400); $("[name='novi-korisnik']").fadeOut(400)});
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
                                <h3 class="archive-heading"><i class="fa fa-group"></i> KORISNICI | <a><span data-ui-novikorisnik="" class="fa fa-plus"></span></a></h3>
                                <ul class="archive-list">
                                    
                                    <?php foreach($korisnici as $k): ?>
                                    <li>
                                        <h4><a href="<?php print $base_url ?>admin/korisnici/obrisi_korisnika/<?php print $k->id_user ?>"><i class="fa fa-trash"></i></a> <?php print $k->name ?> / 
                                            <?php print $k->id_user ?> / <?php print $k->mail ?> / 
                                            <?php print formatDatum($k->lastlog) ?> 
                                            / <?php print preKolikoCeoFormat($k->regtime, true) ?> / 
                                            <?php print $k->status==2 ? "<i title='Verifikovan' class='fa fa-check'></i>" : "<i title='Bez verifikacije'  class='fa fa-inbox'></i>" ?>
                                            / <a ><i data-edit-korisnik="<?php print $k->id_user ?>" class="fa fa-cog"></i></a>
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

                            <?php $form_ek_tip_opcije = array( '-1' => "Odaberi tip",
                                                                '0' => "Član", '1' => "Saradnik" ,
                                                                '2' => "Moderator", '3' => "Administrator" )
                                                                //TODO:     foreach iz DB
                            ?>

                            <div class="archive-box">
                                <h3 class="archive-heading"><i class="fa fa-cogs"></i> Dodatno <a></a></h3>
                                <ul class="archive-list">
                                    <?php
                                        $form_nk = array('method' => "POST", 'id' => "form_nk", 'name' => "form_nk");
                                        $form_nk_id = array('id' => "inp_koid", 'name' => "inp_koid", 'type' => "text", 'disabled' => "true");
                                        $form_nk_nalog = array('id' => "inp_nalog", 'name' => "inp_nalog", 'type' => "text");
                                        $form_nk_mejl = array('id' => "inp_mejl", 'name' => "inp_mejl", 'type' => "text");    
                                        $form_nk_sifra = array('id' => "inp_sifra", 'name' => "inp_sifra", 'type' => "text");
                                        $form_nk_verifikacija_opcije =  array('-1'=> "Da li verifikovan...", '1' => "Ne", '2' => "Da");
                                        $form_nk_submit = array('data-id' => "sub_k", 'id' => "sub_nk", 'name' => 'sub_nk', 'value' => "DODAJ", 'type' => "button");
                                    ?>
                                    <li name="novi-korisnik" class="display-none">
                                        <h3>Novi korisnik <span class="fa fa-plus"></span></h3>
                                        <p>
                                            <?php print form_open($base_url."", $form_nk); ?>
                                            <label>Nalog: </label><?php print form_input($form_nk_nalog); ?><br />
                                            <label>Mejl: </label><?php print form_input($form_nk_mejl); ?><br />
                                            <label>Šifra: </label><?php print form_input($form_nk_sifra); ?><br />
                                            <?php print form_dropdown('ddl_tip', $form_nk_tip_opcije, "-1"); ?>
                                            <?php print form_dropdown('ddl_verifikovan', $form_nk_verifikacija_opcije, "-1" ); ?>
                                            <i class="fa fa-caret-left" data-ui-editbox ></i> 
                                            <?php print form_submit($form_nk_submit); ?>
                                            <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>
                                            
                                            <?php print form_close(); ?>
                                        </p>
                                    </li>
                                    <?php
                                       $form_ek = array('method' => "POST", 'id' => "form_ek", 'name' => "form_nk");
                                        $form_ek_id = array('id' => "inp_koid_e", 'name' => "inp_koid_e", 'type' => "text", 'disabled' => "true");
                                        $form_ek_nalog = array('id' => "inp_nalog_e", 'name' => "inp_nalog_e", 'type' => "text");
                                        $form_ek_mejl = array('id' => "inp_mejl_e", 'name' => "inp_mejl_e", 'type' => "text");
                                        $form_ek_sifra = array('id' => "inp_sifra_e", 'name' => "inp_sifra_e", 'type' => "text");
                                        $form_ek_verifikacija_opcije =  array('0'=> "Da li verifikovan...", '1' => "Ne", '2' => "Da");
                                        $form_ek_submit2 = array('data-id' => "sub_k", 'id' => "sub_ek", 'name' => 'sub_ek', 'value' => "SAČUVAJ", 'type' => "button");
                                    ?>
                                    <li name="edit-korisnik" class="display-none">
                                        <h3>Edit korisnik <span class="fa fa-cog"></span></h3>
                                        <p>
                                            <?php print form_open($base_url."", $form_ek); ?>
                                            <label>Id: </label><?php print form_input($form_ek_id); ?><br />
                                            <label>Nalog: </label><?php print form_input($form_ek_nalog); ?><br />
                                            <label>Mejl: </label><?php print form_input($form_ek_mejl); ?><br />
                                            <label>Šifra: </label><?php print form_input($form_ek_sifra); ?><br />
                                            <?php print form_dropdown('ddl_tip_e', $form_ek_tip_opcije, "-1"); ?>
                                            <?php print form_dropdown('ddl_verifikovan_e', $form_ek_verifikacija_opcije, "0" ); ?>

                                            <i class="fa fa-caret-left" data-ui-editbox ></i>
                                            <?php print form_submit($form_ek_submit2); ?>
                                            <?php print form_reset(array('name' => 'reset_ek', 'value' => "OBRIŠI")); ?>
                                            
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