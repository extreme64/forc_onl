
<style>
        .korisnici-panel-info{float: left; width: 100%; text-align: right; font-size:0.8em; color: #aaa}
        .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}
        .display-none{display: none}
        label{float: left; width: 60px;}
</style>


<script type="module">
  import { ItemEdit }   from '../js/item.edit.class.js';
  import { ReferenceItemEdit } from '../js/reference.item.edit.class.js'

      $(document).ready(function () {

              $("[data-id='sub']").click(function () {

                      var forma_polja;

                      if ($(this).attr("name") != 'sub')
                      {
                              forma_polja = {
                                      nov: '0',
                                      inp_id: $("[name='inp_id_e']").val(),
                                      inp_naziv: $("[name='inp_naziv_e']").val(),
                                      inp_opis: $("[name='inp_opis_e']").val(),
                                      ddl_slika: $("[name='ddl_slika_e'] :selected").val(),
                                      ddl_galerija: $("[name='ddl_galerija_e'] :selected").val(),
                                      inp_url: $("[name='inp_url_e']").val(),
                                      inp_video: $("[name='inp_video_e']").val(),
                                      ddl_status: $("[name='ddl_status_e']  :selected").val(),
                                      ddl_usluga: $("[name='ddl_usluga_e']  :selected").val()
                              };
                      } else
                      {
                              forma_polja = {
                                      nov: '1',
                                      inp_id: $("[name='inp_id']").val(),
                                      inp_naziv: $("[name='inp_naziv']").val(),
                                      inp_opis: $("[name='inp_opis']").val(),
                                      ddl_slika: $("[name='ddl_slika'] :selected").val(),
                                      ddl_galerija: $("[name='ddl_galerija'] :selected").val(),
                                      inp_url: $("[name='inp_url']").val(),
                                      inp_video: $("[name='inp_video']").val(),
                                      ddl_status: $("[name='ddl_status']  :selected").val(),
                                      ddl_usluga: $("[name='ddl_usluga']  :selected").val()
                              };
                      }

                      $.ajax({
                              url: "<?php print $base_url ?>admin/reference/dodaj",
                              data: forma_polja,
                              type: "POST",
                              dataType: 'json',
                              success: function (val)
                              {
                                      console.log(val[0])
                                      if (val[0] !== "false" || val[0] === 0)
                                              alert("Sacuvano");
                                      else
                                              alert("Došlo je do greške!");
                              }
                      });
              });


              $("[data-edit-unos]").click(function () {

                      $.ajax({
                              url: '<?php print $base_url ?>admin/reference/info_referenca_xcall/' + $(this).attr("data-edit-unos"),
                              dataType: 'json',
                              success: function (val)
                              {


                                      $("[name='inp_id_e']").val(val[0]['id_reference']);
                                      $("[name='time']").text(val[0]['time']);
                                      $("[name='inp_naziv_e']").val(val[0]['name']);
                                      $("[name='inp_opis_e']").val(val[0]['desc']);
                                      $("[name='ddl_slika_e']").val(val[0]['id_image']);
                                      $("[name='ddl_galerija_e']").val(val[0]['id_gal']);
                                      $("[name='inp_url_e']").val(val[0]['url']);
                                      $("[name='inp_video_e']").val(val[0]['video']);
                                      $("[name='ddl_status_e']").val(val[0]['status']);
                                      $("[name='ddl_usluga_e']").val(val[0]['id_service']);


                                      $("[name='nova-kategorija']").fadeOut(100);
                                      $("[name='edit-kategorija']").toggle(400);

                              }
                      });


              });

              $("[data-ui-novakategorija]").click(function () {

                      $("[name='edit-kategorija']").fadeOut(100);
                      $("[name='nova-kategorija']").toggle(400);
              })

              $("[data-ui-editbox]").click(function () {
                      $("[name='edit-kategorija']").fadeOut(400);
                      $("[name='nova-kategorija']").fadeOut(400)
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
                                                <h3 class="archive-heading"><i class="fa fa-plus-square-o"></i> REFERENCE |
                                                        <a><span data-ui-novakategorija="" class="fa fa-plus" title="Dodaj novo +"></span></a></h3>
                                                <ul class="archive-list">

                                                        <?php foreach ($reference as $r): ?>
                                                                        <li>
                                                                                <h4><a href="<?php print $base_url ?>admin/kategorije/obrisi_kategoriju/<?php print $r->id_reference ?>"><i class="fa fa-trash"></i></a>
                                                                                        <?php print $r->name ?> / <?php print $r->id_reference ?> / <a ><i data-edit-unos="<?php print $r->id_reference ?>" class="fa fa-cog"></i></a>
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
                                                                $form_n = array('method' => "POST", 'name' => "form_nkat");

                                                                $inp_id = array('name' => "inp_id", 'type' => "text", 'disabled' => "true");
                                                                $inp_naziv = array('name' => "inp_naziv", 'type' => "text", 'maxlength' => "30");
                                                                $inp_opis = array('name' => "inp_opis", 'type' => "text", 'maxlength' => "30");
                                                                $inp_slika = array('-1' => "Slika odabir...");
                                                                $inp_galerija = array('-1' => "Galerija odabir...");
                                                                $inp_url = array('name' => "inp_url", 'type' => "text", 'maxlength' => "30");
                                                                $inp_video = array('name' => "inp_video", 'type' => "text", 'maxlength' => "30");
                                                                $inp_status = array('1' => "Vidljivo", '0' => "Nevidljivo");

                                                                $inp_usluga = array('-1' => "Kome pripada");


                                                                $inp_id_e = array('name' => "inp_id_e", 'type' => "text", 'disabled' => "true");
                                                                $inp_naziv_e = array('name' => "inp_naziv_e", 'type' => "text", 'maxlength' => "30");
                                                                $inp_opis_e = array('name' => "inp_opis_e", 'type' => "text", 'maxlength' => "30");
                                                                $inp_slika_e = array('-1' => "Slika odabir...");
                                                                $inp_galerija_e = array('-1' => "Galerija odabir...");
                                                                $inp_url_e = array('name' => "inp_url_e", 'type' => "text", 'maxlength' => "30");
                                                                $inp_video_e = array('name' => "inp_video_e", 'type' => "text", 'maxlength' => "30");
                                                                $inp_status_e = array('1' => "Vidljivo", '0' => "Nevidljivo");


                                                                $form_submit = array('data-id' => "sub", 'name' => 'sub', 'value' => "DODAJ", 'type' => "button");
                                                                $form_submit_e = array('data-id' => "sub", 'name' => 'sub_e', 'value' => "SAČUVAJ", 'type' => "button");
                                                        ?>
                                                        <li name="edit-kategorija" class="display-none">
                                                                <h3>Edit kategorija <span class="fa fa-cog"></span></h3>
                                                                <p>
                                                                        <?php print form_open($base_url . "", $form_n); ?>

                                                                        <label>ID: </label><?php print form_input($inp_id_e); ?><br />
                                                                        <label name="time"><?php print '26.6.1979' ?></label><br />
                                                                        <label>Naziv: </label><?php print form_input($inp_naziv_e); ?><br />
                                                                        <label>Pripada: </label><?php print form_dropdown('ddl_usluga_e', $usluge_ddl, "0"); ?><br />

                                                                        <label>Opis: </label><?php print form_input($inp_opis_e); ?><br />
                                                                        <label>Slika: </label><?php print form_dropdown('ddl_slika_e', $slike_ddl, "0"); ?><br />
                                                                        <label>Galerija: </label><?php print form_dropdown('ddl_galerija_e', $galerije_ddl, "0"); ?><br />
                                                                        <label>Url: </label><?php print form_input($inp_url_e); ?><br />
                                                                        <label>Video: </label><?php print form_input($inp_video_e); ?><br />
                                                                        <label>Status: </label><?php print form_dropdown('ddl_status_e', $inp_status_e, "-1"); ?><br />

                                                                        <i class="fa fa-caret-left" data-ui-editbox ></i>
                                                                        <?php print form_submit($form_submit_e); ?>
                                                                        <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>

                                                                        <?php print form_close(); ?>
                                                                </p>
                                                        </li>

                                                        <li name="nova-kategorija" class="display-none">
                                                                <h3>Nova kategorija <span class="fa fa-plus"></span></h3>
                                                                <p>
                                                                        <?php print form_open($base_url . "", $form_n); ?>

                                                                        <label>Naziv: </label><?php print form_input($inp_naziv); ?><br />
                                                                        <label>Pripada: </label><?php print form_dropdown('ddl_usluga', $usluge_ddl, "0"); ?><br />

                                                                        <label>Opis: </label><?php print form_input($inp_opis); ?><br />
                                                                        <label>Slika: </label><?php print form_dropdown('ddl_slika', $slike_ddl, "0"); ?><br />
                                                                        <label>Galerija: </label><?php print form_dropdown('ddl_galerija', $galerije_ddl, "0"); ?><br />
                                                                        <label>Url: </label><?php print form_input($inp_url); ?><br />
                                                                        <label>Video: </label><?php print form_input($inp_video); ?><br />
                                                                        <label>Status: </label><?php print form_dropdown('ddl_status', $inp_status, "-1"); ?><br />
                                                                        <i class="fa fa-caret-left" data-ui-editbox ></i>
                                                                        <?php print form_submit($form_submit); ?>
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
