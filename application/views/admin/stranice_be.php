
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


        $(document).ready(function ()
        {

                $("[data-id='sub_s']").click(function () {

                        var forma_polja;
                        //var formData = new FormData($(this).parents('form')[0]);
                        if ($(this).attr("name") == 'sub_ns')
                        {
                                forma_polja = {
                                        inp_naziv: $("#inp_naziv").val(),
                                        inp_opis: $("[name='inp_opis']").val(),
                                        inp_url: $("[name='inp_url']").val(),
                                        ddl_status: $("[name='ddl_status'] :selected").val(),
                                        ddl_parent: $("[name='ddl_roditelj'] :selected").val(),
                                        inp_index: $("[name='inp_index']").val()
                                }
                                forma_polja['nov'] = "1";
                        } else
                        {
                                forma_polja = {
                                        inp_sid: $("#inp_sid_e").val(),
                                        inp_naziv: $("#inp_naziv_e").val(),
                                        inp_opis: $("[name='inp_opis_e']").val(),
                                        inp_url: $("[name='inp_url_e']").val(),
                                        ddl_status: $("[name='ddl_status_e'] :selected").val(),
                                        ddl_parent: $("[name='ddl_roditelj_e'] :selected").val(),
                                        inp_index: $("[name='inp_index_e']").val()
                                }
                                forma_polja['nov'] = "0";
                        }


                        $.ajax({
                                url: '<?php print $base_url ?>admin/stranice/dodaj_stranicu',
                                data: forma_polja,
                                type: 'POST',
                                dataType: 'JSON',
                                success: function (val)
                                {
                                        if (val['greska'] == "0")
                                                alert("Sacuvano");
                                        else
                                                alert("Nope :/");
                                }
                        });
                });
                $("[data-edit-stranica]").click(function () {
                        $('[name="ddl_roditelj_e"] > [value="0"]').prop('selected', true);
                        $.ajax({
                                url: '<?php print $base_url ?>admin/stranice/stranica_info/' + $(this).attr("data-edit-stranica"),
                                dataType: 'json',
                                success: function (val)
                                {
                                        $("[name='inp_sid_e']").val(val[0]['id_page']);
                                        $("[name='inp_naziv_e']").val(val[0]['name']);
                                        $("[name='inp_desc_e']").val(val[0]['desc']);

                                        $('[name="ddl_roditelj_e"] > [value="' + val[0]['id_parent'] + '"]').prop('selected', true);
                                        $('[name="ddl_status_e"] > [value="' + val[0]['status'] + '"]').prop('selected', true);

                                        $("[name='inp_opis_e']").val(val[0]['desc']);
                                        $("[name='inp_url_e']").val(val[0]['url']);
                                        $("[name='inp_index_e']").val(val[0]['index']);


                                        $("[name='nova-stranica']").fadeOut(100);
                                        $("[name='edit-stranica']").toggle(400);
                                }
                        });
                });
                $("[data-ui-novastranica]").click(function () {

                        $("[name='edit-stranica']").fadeOut(100);
                        $("[name='nova-stranica']").toggle(400);
                })

                $("[data-ui-editbox]").click(function () {
                        $("[name='edit-stranica']").fadeOut(400);
                        $("[name='nova-stranica']").fadeOut(400)
                });
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
                                                <h3 class="archive-heading"><i class="fa fa-group"></i> STRANICE | <a><span data-ui-novastranica="" class="fa fa-plus"></span></a></h3>
                                                <ul class="archive-list">

                                                        <?php foreach ($pages as $s): ?>
                                                                        <li>
                                                                                <h4><a href="<?php print $base_url ?>admin/korisnici/obrisi_korisnika/<?php print $s->id_page ?>"><i class="fa fa-trash"></i></a> <?php print $s->name ?> /
                                                                                        <?php print $s->id_page ?> / <?php print $s->name ?> /
                                                                                        <?php print $s->status == 1 ? "<i title='Vidljiva' class='fa fa-eye'></i>" : "<i title='Skrivena'  class='fa fa-eye-slash'></i>"  ?>
                                                                                        / <a ><i data-edit-stranica="<?php print $s->id_page ?>" class="fa fa-cog"></i></a>
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
                                                                /* new fields */
                                                                $form_str = array('method' => "POST", 'id' => "form_ns", 'name' => "form_ns");
                                                                $form_str_id = array('id' => "inp_sid", 'name' => "inp_sid", 'type' => "text", 'disabled' => "true");
                                                                $form_str_naziv = array('id' => "inp_naziv", 'name' => "inp_naziv", 'type' => "text");
                                                                $form_str_status = array('1' => "Vidljiva", '0' => "Nevidljiva");
                                                                $form_str_roditelj = array('0' => "Sama za sebe");

                                                                $form_str_opis = array('id' => "inp_opis", 'name' => "inp_opis", 'type' => "text");
                                                                $form_str_url = array('id' => "inp_url", 'name' => "inp_url", 'type' => "text");
                                                                $form_str_index = array('id' => "inp_index", 'name' => "inp_index", 'type' => "text");

                                                                foreach ($top_pages as $p)
                                                                        $form_str_roditelj[$p->id_page] = $p->name;

                                                                $form_str_submit = array('data-id' => "sub_s", 'id' => "sub_s", 'name' => 'sub_ns', 'value' => "DODAJ", 'type' => "button");



                                                                /* edit fields */
                                                                $form_str_e = array('method' => "POST", 'id' => "form_es", 'name' => "form_es");
                                                                $form_str_id_e = array('id' => "inp_sid_e", 'name' => "inp_sid_e", 'type' => "text", 'disabled' => "true");
                                                                $form_str_naziv_e = array('id' => "inp_naziv_e", 'name' => "inp_naziv_e", 'type' => "text");
                                                                $form_str_status_e = array('1' => "Vidljiva", '0' => "Nevidljiva");
                                                                $form_str_roditelj_e = array('0' => "Sama za sebe");

                                                                $form_str_opis_e = array('id' => "inp_opis_e", 'name' => "inp_opis_e", 'type' => "text");
                                                                $form_str_url_e = array('id' => "inp_url_e", 'name' => "inp_url_e", 'type' => "text");
                                                                $form_str_index_e = array('id' => "inp_index_e", 'name' => "inp_index_e", 'type' => "text");

                                                                foreach ($top_pages as $p)
                                                                        $form_str_roditelj_e[$p->id_page] = $p->name;

                                                                $form_str_submit2 = array('data-id' => "sub_s", 'id' => "sub_s2", 'name' => 'sub_es', 'value' => "SACUVAJ", 'type' => "button");

                                                                $reset_par = array('name' => 'reset_str', 'value' => "OBRIŠI");
                                                        ?>

                                                        <li name="nova-stranica" class="display-none">
                                                                <h3>Nova stranica <span class="fa fa-plus"></span></h3>
                                                                <p>
                                                                        <?php print form_open($base_url . "", $form_str); ?>
                                                                        <label>Naziv: </label><?php print form_input($form_str_naziv); ?><br />
                                                                        <?php print form_dropdown('ddl_roditelj', $form_str_roditelj, "-1"); ?> <br />
                                                                        <?php print form_dropdown('ddl_status', $form_str_status, "-1"); ?> <br />

                                                                        <label>Opis: </label><?php print form_input($form_str_opis); ?><br />
                                                                        <label>Url: </label><?php print form_input($form_str_url); ?><br />
                                                                        <label>R. br. </label><?php print form_input($form_str_index); ?><br />

                                                                        <i class="fa fa-caret-left" data-ui-editbox ></i>
                                                                        <?php print form_submit($form_str_submit) . " " . form_reset($reset_par); ?>
                                                                        <?php print form_close(); ?>
                                                                </p>
                                                        </li>
                                                        <li name="edit-stranica" class="display-none">
                                                                <h3>Edit stranica <span class="fa fa-cog"></span></h3>
                                                                <p>
                                                                        <?php print form_open($base_url . "", $form_str_e); ?>
                                                                        <label>Id: </label><?php print form_input($form_str_id_e); ?><br />
                                                                        <label>Naziv: </label><?php print form_input($form_str_naziv_e); ?><br />
                                                                        <?php print form_dropdown('ddl_roditelj_e', $form_str_roditelj_e, "-1"); ?> <br />
                                                                        <?php print form_dropdown('ddl_status_e', $form_str_status_e, "-1"); ?> <br />

                                                                        <label>Opis: </label><?php print form_input($form_str_opis_e); ?><br />
                                                                        <label>Url: </label><?php print form_input($form_str_url_e); ?><br />
                                                                        <label>R. br. </label><?php print form_input($form_str_index_e); ?><br />

                                                                        <i class="fa fa-caret-left" data-ui-editbox ></i>
                                                                        <?php print form_submit($form_str_submit2) . " " . form_reset($reset_par); ?>
                                                                        <?php print form_close(); ?>
                                                                </p>
                                                        </li>
                                                </ul>
                                        </div> <!-- /.archive-box -->



                                </div>


                        </div> <!-- /.col-md-12 -->
                        <p class="korisnici-panel-info">
                                <i class="fa fa-group"></i> Prikaz svih stranica. Izmena, dodavanje, brisanje. Uloge.
                        </p>
                </div> <!-- /.row -->
        </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->