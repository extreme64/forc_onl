
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

        $(document).ready(function () {

                $("[data-id='sub_nu']").click(function () {
                        var forma_polja;
                        var formData = new FormData($(this).parents('form')[0]);
                        if ($(this).attr("name") == 'sub_nu')
                        {

                                formData.append("nov", "0");
                                formData.append("inp_uid", $('[name="inp_uid"]').val());
                        } else
                        {
                                formData.append("nov", "1");

                        }

                        $.ajax({
                                url: "<?php print $base_url ?>admin/usluge/dodaj_uslugu",
                                data: formData,
                                type: "POST",
                                dataType: 'JSON',
                                success: function (val)
                                {

                                        if (val !== false) {
                                                alert(val);
                                        } else {
                                                console.info(val);
                                                alert("Došlo je do greške!");
                                        }
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                        });
                });


                $("[data-edit-unos]").click(function () {

                        $.ajax({
                                url: '<?php print $base_url ?>admin/usluge/service_parent_options_xcall/' + $(this).attr("data-edit-unos"),
                                dataType: 'JSON',
                                success: function (val)
                                {
                                        var h = '<select name="ddl_parent"><option value="-1">Odaberi</option>';
                                        for (var v = 0; v < val['ddl_options'].length; v++)
                                        {
                                                h += "<option value='" + val['ddl_options'][v]['id_service'] + "' >" + val['ddl_options'][v]['name'] + "</option>"
                                        }
                                        h += '</select>';
                                        $("[name='ddl_parent']").html(h);

                                        $("[value='" + val['id_parent'][0]['id_parent'] + "']").attr('selected', 'true');
                                }
                        });


                        $.ajax({
                                url: '<?php print $base_url ?>admin/usluge/info_usluga_xcall/' + $(this).attr("data-edit-unos"),
                                dataType: 'JSON',
                                success: function (val)
                                {

                                        $("[name='inp_uid']").val(val[0]['id_service']);
                                        $("[name='inp_title']").val(val[0]['name']);

                                        //$("[name='ddl_parent']").val(val[0]['type']);

                                        $("[name='inp_text']").val(val[0]['desc']);


                                        $("[name='novo']").fadeOut(100);
                                        $("[name='edit']").toggle(400);

                                }
                        });


                });


                /* klik za novu uslugu */
                $("[data-ui-novausluga]").click(function () {

                        $.ajax({
                                url: '<?php print $base_url ?>admin/usluge/service_parent_options_xcall/',
                                dataType: 'JSON',
                                success: function (val)
                                {
                                        var h = '<select name="ddl_parent_n"><option value="-1">Odaberi</option>';
                                        for (var v = 0; v < val['ddl_options'].length; v++)
                                        {
                                                h += "<option value='" + val['ddl_options'][v]['id_service'] + "' >" + val['ddl_options'][v]['name'] + "</option>"
                                        }
                                        h += '</select>';
                                        $("[name='ddl_parent_n']").html(h);


                                }
                        });

                });




                $("[data-ui-novausluga]").click(function () {

                        $("[name='edit']").fadeOut(100);
                        $("[name='novo']").toggle(400);
                })

                $("[data-ui-editbox]").click(function () {
                        $("[name='edit']").fadeOut(400);
                        $("[name='novo']").fadeOut(400)
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
                                                <h3 class="archive-heading"><i class="fa fa-flag-checkered"></i> USLUGE |
                                                        <a><span data-ui-novausluga="" class="fa fa-plus" title="Dodaj novo +"></span></a></h3>
                                                <ul class="archive-list">

                                                        <?php foreach ($usluge as $iter): ?>
                                                                        <li>
                                                                                <h4><a href="<?php print $base_url ?>admin/usluge/obrisi_uslugu/<?php print $iter->id_service ?>"><i class="fa fa-trash"></i></a>
                                                                                        <?php print $iter->name ?> / <?php print $iter->id_service ?> / <a ><i data-edit-unos="<?php print $iter->id_service ?>" class="fa fa-cog"></i></a>
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
                                                                $form_nu = array('method' => "POST", 'name' => "form_nu");
                                                                $form_nu_id = array('name' => "inp_uid", 'type' => "text", 'disabled' => "true");
                                                                $form_nu_parent = array('-1' => "Pripada kome...",);

                                                                $form_nu_naziv = array('name' => "inp_title", 'type' => "text", 'maxlength' => "30");
                                                                $form_nu_opis = array('name' => "inp_text", 'rows' => "14", 'cols' => "35");

                                                                $form_nu_naziv_n = array('name' => "inp_title_n", 'type' => "text", 'maxlength' => "30");
                                                                $form_nu_opis_n = array('name' => "inp_text_n", 'rows' => "14", 'cols' => "35");

                                                                $form_nu_submit = array('data-id' => "sub_nu", 'name' => 'sub_nu', 'value' => "SAČUVAJ", 'type' => "button");
                                                                $form_nu_submit2 = array('data-id' => "sub_nu", 'name' => 'sub_nu2', 'value' => "DODAJ", 'type' => "button");
                                                        ?>
                                                        <li name="edit" class="display-none">
                                                                <h3>Edit usluga <span class="fa fa-cog"></span></h3>
                                                                <p>
                                                                        <?php print form_open($base_url . "", $form_nu); ?>

                                                                        <label>ID: </label><?php print form_input($form_nu_id); ?><br />
                                                                        <label>Naziv: </label><?php print form_input($form_nu_naziv); ?><br />

                                                                        <label>Pripada: </label><?php print form_dropdown('ddl_parent'); ?><br />


                                                                        <label>Opis: </label><?php print form_textarea($form_nu_opis); ?><br />


                                                                        <i class="fa fa-caret-left" data-ui-editbox ></i>
                                                                        <?php print form_submit($form_nu_submit); ?>
                                                                        <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>

                                                                        <?php print form_close(); ?>
                                                                </p>
                                                        </li>

                                                        <li name="novo" class="display-none">
                                                                <h3>Nova usluga <span class="fa fa-plus"></span></h3>
                                                                <p>
                                                                        <?php print form_open($base_url . "", $form_nu); ?>

                                                                        <label>Naziv: </label><?php print form_input($form_nu_naziv_n); ?><br />

                                                                        <label>Pripada: </label><?php print form_dropdown('ddl_parent_n'); ?><br />

                                                                        <label>Opis: </label><?php print form_textarea($form_nu_opis_n); ?><br />

                                                                        <i class="fa fa-caret-left" data-ui-editbox ></i>
                                                                        <?php print form_submit($form_nu_submit2); ?>
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