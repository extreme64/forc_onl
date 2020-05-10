<style>
        .korisnici-panel-info{float: left; width: 100%; text-align: right; font-size:0.8em; color: #aaa}
        .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}
        .display-none{display: none}
        label{float: left; width: 100px;}
        .slika_prev_lista{width: 35px; height: 25px; float: left; padding: 1px; background-color: orange}
        .left{float: left;}
        .edit-rm-off{position: relative;
                        left: 15px;
                        top: 2px;}
</style>

<!--  -->
<script type="module">
  import { ItemEdit }   from '../js/item.edit.class.js';
  import { SlikeItemEdit } from '../js/slike.item.edit.class.js'


  // ON READY
  $(document).ready(function () {

    let slike_item_edit = new SlikeItemEdit("[name='new']", "[name='edit']", "[btn-new]", "[btn-edit]", "[data-id='sub_nsl']" ,"forma_polja", "form_data");

    // btn event bind
    slike_item_edit.new_item_btn_click();
    slike_item_edit.edit_item_btn_click('', '../../admin/slike/info_slika_xcall/', {  inp_slid : 'id_image',
                                                                                      inp_title : 'title',
                                                                                      inp_alt : 'alt',
                                                                                      inp_autor : 'author',
                                                                                      ddl_gal : 'id_gal'
                                                                                    });

    // on btn clic submit
    slike_item_edit.ajax_submit("[data-id='sub_nsl']");

  });
</script>

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
                            <h3 class="archive-heading">SLIKE <a btn-new ><span data-ui-novausluga="" class="fa fa-plus"></span></a>
                            </h3>
                            <ul class="archive-list">

                              <?php if(true): ?>
                              <?php foreach($slike as $img): ?>
                              <li >
                                <h4>
                                  <span style="width: 100%; height: 30px; float: left">

                                    <a href="<?php print $base_url ?>admin/slike/obrisi_sliku/<?php print $img->id_image ?>"><i class="left fas fa-trash-alt"></i></a>
                                    <a btn-edit edit-item-id="<?php print $img->id_image ?>" ><i class="edit-rm-off left fas fa-cog"></i></a>

                                    <img class="slika_prev_lista" id="<?php print "slika".$img->id_image ?>"
                                         src="<?php print $base_url.'images/upload/'.$img->url ?>"
                                         title="<?php print $img->title ?>"
                                         alt="<?php  print $img->alt ?>" data-autor="<?php  print $img->author ?>" />

                                     <font size="0.3px">
                                      [ <?php  print round(filesize('images/upload/'.$img->url)/1024,1);  ?> KB
                                      <?php
                                      $str = $_SERVER['DOCUMENT_ROOT'].'/images/upload/'.$img->url;
                                      print ' | '.image_type_to_extension(exif_imagetype($str) ); //  .jpeg / image_type_to_mime_type() 'image/jpeg'
                                      ?>
                                      ]
                                    </font>
                                  </span>
                                </h4>
                              </li>
                              <?php endforeach ?>
                              <?php endif ?>

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



                        <div class="box-content " >

                          <div class="archive-box">
                            <h3 class="archive-heading"><i class="fa fa-cogs"></i> <a></a></h3>
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

                              <li name="edit" class="display-none">
                                <h3>Edit slika/e <span class="fa fa-plus"></span></h3>
                                <span>
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
                                </span>
                                <br>
                                <hr>
                                <span>
                                  <img id="prev_img_slot" src="" alt="preview selected image">
                                </span>

                              </li>

                              <li name="new" class="display-block">
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

                      </div><!-- /.box-content -->
        					</div><!-- /.box box-statistics -->
        		      <div class="clearfix"></div>
        				</div><!-- /.rows -->
        			</section><!-- /#dashboard -->
        		</main><!-- /main -->



        <!--  -->
        <!--  -->
        <!--  -->
