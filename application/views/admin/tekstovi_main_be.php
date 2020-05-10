
<style>
        .korisnici-panel-info{float: left; width: 100%; text-align: right; font-size:0.8em; color: #aaa}
        .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}
        .display-none{display: none}
        label{float: left; width: 60px;}
</style>

<script src="<?php print $base_url ?>js/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
        /*$( document ).ajaxError(function( event, request, settings ) {
         alert( "Error requesting page " + settings.url +" "+ settings + "" );
         });*/

        $(document).ready(function () {

                $("[data-id='sub_nt']").click(function () {
                        var forma_polja;
                        var formData = new FormData($(this).parents('form')[0]);
                        if ($(this).attr("name") == 'sub_nt')
                        {
                                formData.append("nov", "0");
                                formData.append("inp_postid", $('[name="inp_postid"]').val());
                                formData.append("inp_text", CKEDITOR.instances.editor1.getData());
                        } else
                        {
                                formData.append("nov", "1");
                                formData.append("id_author", "<?php print $this->session->userdata('id_user') ?>");
                                formData.append("inp_text2", CKEDITOR.instances.editor1.getData());
                        }

                        $.ajax({
                                url: "<?php print $base_url ?>admin/tekstovi/dodaj_tekst",
                                data: formData,
                                type: "POST",
                                dataType: 'JSON',
                                error: function (x, s, e) {
                                        alert("error: " + e + x.responseText)
                                },
                                success: function (val)
                                {
                                        if (val["feedback"] == true || val["feedback"] == "nepromenjeno")
                                                alert("Sačuvano");
                                        else
                                                alert("Došlo je do greške! : " + val["feedback"]);
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                        });
                });


                $("[data-edit-unos]").click(function () {

                        $.ajax({
                                url: '<?php print $base_url ?>admin/tekstovi/info_tekst_xcall/' + $(this).attr("data-edit-unos"),
                                dataType: 'JSON',
                                success: function (val)
                                {

                                        $("[name='inp_postid']").val(val[0]['post_id']);
                                        $("[name='inp_title']").val(val[0]['title']);

                                        $("[name='inp_time']").text(val[0]['time']);

                                        $("[name='ddl_status']").val(val[0]['status']);
                                        $("[name='inp_author']").val(val[0]['autor']);
                                        $("[name='inp_author']").data("id_author", val[0]['id_user'])
                                        //$("[name='inp_text']").html(val[0]['text']);
                                        //$("[name='editor1']").text(val[0]['text']);
                                        CKEDITOR.instances.editor1.setData(val[0]['text'], function ()
                                        {
                                                this.checkDirty();  // true
                                        });

                                        $("[name='ddl_kategorija']").val(val[0]['id_cat']);

                                        $("[name='novi-tekst']").fadeOut(200);
                                        $("[name='edit-tekst'], .box-text").fadeIn(400);
                                }
                        });

                });


                $("[data-ui-novitekst]").click(function () {

                        CKEDITOR.instances.editor1.setData('');
                        //if($(".box-text").css("display", "none")){ $(".box-text").fadeIn(100);   }
                        $("[name='edit-tekst']").fadeOut(200);
                        $("[name='novi-tekst'], .box-text").fadeIn(400);


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
                                                <h3 class="archive-heading"><i class="fa fa fa-file-o"></i> TEKSTOVI |
                                                        <a><span data-ui-novitekst="" class="fa fa-plus" title="Dodaj novo +" data-on-status="off" box-text-ui="hide"></span></a></h3>
                                                <ul class="archive-list">

                                                    <?php foreach ($tekstovi as $t): ?>
                                                          <li>
                                                                  <h4><a href="<?php print $base_url ?>admin/tekstovi/obrisi_tekst/<?php print $t->post_id ?>"><i class="fa fa-trash"></i></a>
                                                                    <?php print $t->title ?> / <?php print $t->post_id ?> / <a ><i data-edit-unos="<?php print $t->post_id ?>" class="fa fa-cog" data-on-status="off" box-text-ui="hide"></i></a>
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
                                                                $form_nt = array('method' => "POST", 'name' => "form_npo");

                                                                $form_nt_id = array('name' => "inp_postid", 'type' => "text", 'disabled' => "true");
                                                                $form_nt_naslov = array('name' => "inp_title", 'type' => "text", 'maxlength' => "30");
                                                                $form_nt_vreme;
                                                                $form_nt_status = array('-1' => "Status...", '1' => "Objavljen", '0' => "Neobjavljen");
                                                                $form_nt_autor = array('name' => "inp_author", 'type' => "text", 'maxlength' => "30", 'disabled' => "true");
                                                                $form_nt_tekst = array('name' => "inp_text", 'rows' => "14", 'cols' => "35");
                                                                $form_nt_kategorija_opcije;

                                                                $form_nt_naslov2 = array('name' => "inp_title2", 'type' => "text", 'maxlength' => "30");
                                                                $form_nt_vreme2;
                                                                $form_nt_status2 = array('-1' => "Status...", '1' => "Objavljen", '0' => "Neobjavljen");
                                                                $form_nt_autor2 = array('name' => "inp_author2", 'type' => "text", 'maxlength' => "30", 'disabled' => "true");
                                                                $form_nt_tekst2 = array('name' => "inp_text2", 'rows' => "14", 'style' => "width: 100%;");


                                                                $form_nt_submit = array('data-id' => "sub_nt", 'name' => 'sub_nt', 'value' => "SAČUVAJ", 'type' => "button");
                                                                $form_nt_submit2 = array('data-id' => "sub_nt", 'name' => 'sub_nt2', 'value' => "DODAJ", 'type' => "button");
                                                        ?>
                                                        <li name="edit-tekst" class="display-none">
                                                                <h3>Edit tekst <span class="fa fa-cog"></span></h3>
                                                                <p>
                                                                        <?php print form_open($base_url . "", $form_nt); ?>
                                                                        <label>ID: </label><?php print form_input($form_nt_id); ?><br />

                                                                        <label>Naslov: </label><?php print form_input($form_nt_naslov); ?><br />
                                                                        <i>Objavljeno: <span name="inp_time"><?php ?></span></i><br />

                                                                        <label>Staus: </label><?php print form_dropdown('ddl_status', $form_nt_status, "-1"); ?><br />
                                                                        <label>Kateg. - </label><?php print form_dropdown('ddl_kategorija', $form_nt_kategorija_opcije, "-1"); ?><br />

                                                                        <label>Autor: </label><?php print form_input($form_nt_autor); ?><br />

                                                                        <i class="fa fa-caret-left" data-ui-editbox ></i>
                                                                        <?php print form_submit($form_nt_submit); ?>
                                                                        <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>

                                                                        <?php print form_close(); ?>
                                                                </p>
                                                        </li>

                                                        <li name="novi-tekst" class="display-none">
                                                                <h3>Novi tekst <span class="fa fa-plus"></span></h3>
                                                                <p>
                                                                        <?php print form_open($base_url . "", $form_nt); ?>

                                                                        <label>Naslov: </label><?php print form_input($form_nt_naslov2); ?><br />

                                                                        <label>Staus: </label><?php print form_dropdown('ddl_status2', $form_nt_status2, "-1"); ?><br />
                                                                        <label>Kategorija: </label><?php print form_dropdown('ddl_kategorija2', $form_nt_kategorija_opcije, "-1"); ?><br />

                                                                        <label>Autor: </label><?php print form_input($form_nt_autor2); ?><br />

                                                                        <i class="fa fa-caret-left" data-ui-editbox ></i>
                                                                        <?php print form_submit($form_nt_submit2); ?>
                                                                        <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>

                                                                        <?php print form_close(); ?>
                                                                </p>
                                                        </li>

                                                </ul>
                                        </div> <!-- /.archive-box -->


                                </div>

                                <!-- TEXT WSIWYG box-->
                                <div class="box-content box-text" style="float:right; width: 80%; display: none" data-ui-open-status="false">

                                        <textarea name="editor1"></textarea>
                                        <script>
                                                /* cofig on init */
                                                editor = CKEDITOR.replace('editor1',
                                                        {
                                                                language: 'sr-latn',
                                                                skin: 'bootstrapck',
                                                                toolbar: 'fuller',
                                                                extraPlugins: 'abbr,iner,vitex'
                                                        });
                                                CKEDITOR.config.height = '30vh';
                                                CKEDITOR.allowedContent = true;


                                                /* sadam add stuff */



                                        </script>
                                        <!--<label>Tekst: </label><?php print form_textarea($form_nt_tekst2); ?><br />   -->
                                </div> <!-- /.archive-box  /// box-content box-text -->

                        </div> <!-- /.col-md-12 -->
                        <p class="korisnici-panel-info">
                                <i class="fa fa-file-o"></i> Prikaz svih tekstova. Izmena, dodavanje, brisanje.
                        </p>
                </div> <!-- /.row -->
        </div> <!-- /.inner-content -->
</div> <!-- /.content-wrapper -->
