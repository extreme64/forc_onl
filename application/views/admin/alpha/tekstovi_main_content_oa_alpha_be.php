<style>
        .korisnici-panel-info{float: left;  text-align: right; font-size:0.8em; color: #aaa}
        .box-zasebni-poc-admin{float:left; min-width:200px; max-width: 70%; }
        .display-none{display: none}
        label{float: left; width: 60px;}
        textarea{
          background-color: #1a1c1f !important;
        }
</style>
<!--  -->
<script src="<?php print $base_url ?>js/ckeditor/ckeditor.js"></script>
<!--  -->
<script type="module">
  import { ItemEdit }   from '../js/item.edit.class.js';
  import { TekstoviItemEdit } from '../js/tekstovi.item.edit.class.js'



  // ON READY
  $(document).ready(function () {

    let tekstovi_item_edit = new TekstoviItemEdit("[name='new']", "[name='edit']", "[btn-new]", "[btn-edit]", "[data-id='sub_nt']" ,"forma_polja", "form_data");

    // btn event bind
    tekstovi_item_edit.new_item_btn_click();
    tekstovi_item_edit.edit_item_btn_click('', '../../admin/tekstovi/info_tekst_xcall/', {  inp_postid : 'post_id',
                                                                                            inp_title : 'title',
                                                                                            inp_time : 'time',
                                                                                            ddl_status : 'status',
                                                                                            inp_author : 'autor',
                                                                                            inp_text : 'text',
                                                                                            editor1 : 'text',
                                                                                            ddl_kategorija : 'id_cat'
                                                                                          });

    // on btn clic submit
    tekstovi_item_edit.ajax_submit("[data-id='sub_nt']")

  });
</script>
<!--  -->
				<div class="rows">
	        	<!-- <div class="box left">
		            <div class="box-header with-border">
		              	<div class="box-title">
		              		<h3>2 A</h3>
		              	</div>
		              	<div class="box-tools pull-right">

		              	</div>
		              	<div class="clearfix"></div>
		            </div>
	         	</div> -->
            <style media="screen">

            </style>

            <!-- item list -->
            <div class="box box-inbox box-inbox-mod-lists left" >
  						<div class="box-header with-border">
  							<div class="box-title">
  								<h3 data-sadam="sadammmmm" >Item Preview</h3>
  								<span style="">47</span>
  							</div>
              	<div class="box-tools pull-right">
              		<i class="zmdi zmdi-more-vert waves-effect waves-teal"></i>
              		<ul class="dropdown-menu">
              			<li>
              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Action</a>
              			</li>
              			<li>
              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Support</a>
              			</li>
              			<li>
              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">FAQ</a>
              			</li>
              			<li>
              				<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" class="waves-effect" title="">Message</a>
              			</li>
              		</ul>
              	</div><!-- /.box-tools pull-right -->
              	<div class="clearfix"></div>
	            </div><!-- /.box-header -->
	            <div class="box-content">
                <div class="box-content box-zasebni-poc-admin" >

                  <div class="archive-box">
                    <h3 class="archive-heading">TEKSTOVI <a btn-new ><span data-ui-novausluga="" class="fa fa-plus"></span></a>
                    </h3>
                    <ul class="archive-list">

                      <?php foreach ($tekstovi as $iter): ?>
                        <li>
                          <h4>
                            <a class="display_inline" href="<?php print $base_url ?>admin/tekstovi/obrisi_tekst/<?php print $iter->post_id ?>"><i class="fas fa-trash-alt"></i></a>
                            <?php print $iter->title ?> / <?php print $iter->post_id ?> /
                            <a btn-edit edit-item-id="<?php print $iter->post_id ?>" class="display_inline">
                              <i class="fas fa-cog" style="float: right; margin-left: 45px" ></i>
                            </a>
                          </h4>
                        </li>
                      <?php endforeach ?>

                    </ul>
                  </div> <!-- /.archive-box -->
                </div> <!-- /.box-content -->



	            	<!--
                <ul class="inbox-list">
	            		<li class="waves-effect">
	            			<a href="http://corpthemes.com/html/oneadmin/?storefront=envato-elements#" title="">
	            				<div class="left">
		            				<img src="<?php print $base_url ?>images/one_cms/inbox-01.png" alt="">
		            				<div class="info">
		            					<p class="name">John Alex</p>
		            					<p>Hey! How are you?</p>
		            				</div>
		            			</div>
		            			<div class="right"> 12:20 PM </div>
		            			<div class="clearfix"></div>
	            			</a>
	            		</li>

	            	</ul><!-- /.inbox-list -->


              </div><!-- /.box-content -->
	           </div><!-- /.box box-inbox -->

            <!--  -->

            <!-- selected item edit/new UI fields -->
	         	<div class="box box-statistics right">
              <div class="box-header with-border">
              	<div class="box-title">
              		<h3>Seleted Item</h3>
              	</div>
              	<div class="box-tools pull-right">

              	</div>
              	<div class="clearfix"></div>
	            </div><!-- /.box-header -->
	            <div class="box-content style1">



                <div class="box-content box-zasebni-poc-admin" >

                  <div class="archive-box">
                    <h3 class="archive-heading"><i class="fa fa-cogs"></i> <a></a></h3>
                    <ul class="archive-list">

                      <?php
                        $form_nt = array('method' => "POST", 'name' => "form_npo");

                        $form_nt_id = array('name' => "inp_postid", 'type' => "text", 'disabled' => "true");
                        $form_nt_naslov = array('name' => "inp_title", 'type' => "text", 'maxlength' => "30");
                        $form_nt_vreme;
                        $form_nt_status = array('-1' => "Status...", '1' => "Objavljen", '0' => "Neobjavljen");
                        $form_nt_autor = array('name' => "inp_author", 'type' => "text", 'maxlength' => "30", 'disabled' => "true");
                        $form_nt_tekst = array('name' => "inp_text", 'rows' => "14", 'cols' => "35");
                        //$form_nt_kategorija_opcije;

                        $form_nt_naslov2 = array('name' => "inp_title2", 'type' => "text", 'maxlength' => "30");
                        $form_nt_vreme2;
                        $form_nt_status2 = array('-1' => "Status...", '1' => "Objavljen", '0' => "Neobjavljen");
                        $form_nt_autor2 = array('name' => "inp_author2", 'type' => "text", 'maxlength' => "30", 'disabled' => "true");
                        $form_nt_tekst2 = array('name' => "inp_text2", 'rows' => "14", 'style' => "width: 100%;");


                        $form_nt_submit = array('data-id' => "sub_nt", 'name' => 'sub_nt', 'value' => "SAČUVAJ", 'type' => "button");
                        $form_nt_submit2 = array('data-id' => "sub_nt", 'name' => 'sub_nt2', 'value' => "DODAJ", 'type' => "button");
                      ?>

                      <li name="edit" class="display-none">
                        <h3>Edit tekst <span class="fa fa-cog"></span></h3>
                        <p>
                          <?php print form_open($base_url . "", $form_nt); ?>
                          <label>ID: </label><?php print form_input($form_nt_id); ?><br />

                          <label>Naslov: </label><?php print form_input($form_nt_naslov); ?><br />
                          <i>Objavljeno: <span name="inp_time"><?php ?></span></i><br />

                          <label>Staus: </label><?php print form_dropdown('ddl_status', $form_nt_status, "-1"); ?><br />
                          <?php if(!isset($id_kategorija)): ?>
                            <?php $id_kategorija = -1 ?>
                          <?endif ?>
                          <label>Kateg. - </label><?php print form_dropdown('ddl_kategorija', $form_nt_kategorija_opcije, $id_kategorija); ?><br />

                          <label>Autor: </label><?php print form_input($form_nt_autor); ?><br />

                          <i class="fa fa-caret-left" data-ui-editbox ></i>
                          <?php print form_submit($form_nt_submit); ?>
                          <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>

                          <?php print form_close(); ?>
                        </p>
                      </li>

                      <li name="new" class="display-block">
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


              </div><!-- /.box-content -->
					</div><!-- /.box box-statistics -->






		         	<div class="clearfix"></div>
				</div><!-- /.rows -->


        <div class="rows">
          <div class="box box-stackedColumn left" style="width: calc(100%);">

            <div main-body-edit-box="" style="padding-bottom: 10px">Neki tekst ovde sta god TODO:<br></div>

            <!-- old bug fix, conflict with CKEditor styles <div class="box-header with-border"> -->
            <div class="with-border">
              <div class="box-title">
                <h3>Main text body edit</h3>

                <textarea style="width: 100% !important" name="editor1"></textarea>
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


                </script>
              </div>
              <div class="box-tools pull-right">

              </div><!-- /.box-tools pull-right -->
              <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="box-content style2">
              <p>
                <a target="_blank" href="https://www.loremipsumgen.com/">Lorem ipsum generator</a> |
                <a href="">Useful strings</a>
              </p>
            </div><!-- /.box-content -->
          </div>
        </div>


			</section><!-- /#dashboard -->



		</main><!-- /main -->



<!--  -->
<!--  -->
<!--  -->
