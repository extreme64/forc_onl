<style>
      .korisnici-panel-info{float: left; width: 100%; text-align: right; font-size:0.8em; color: #aaa}
      .box-zasebni-poc-admin{max-width: 33%; float:left; min-width:200px}
      .display-none{display: none}
      label{float: left; width: 100px;}
      .left{float: left;}
      .edit-rm-off{
        position: relative;
        font-size: 20px;
        left: 0px;
        top: 20px;
      }
      #pictures_prev_box img
      {
        width: 100px;
        height: 80px;
      }
</style>

<!--  -->
<script type="module">
  import { ItemEdit }   from '../js/item.edit.class.js';
  import { GalerijeItemEdit } from '../js/galerije.item.edit.class.js'


  // ON READY
  $(document).ready(function () {

    let galerije_item_edit = new GalerijeItemEdit("[name='new']", "[name='edit']", "[btn-new]", "[btn-edit]", "[data-id='sub_gal']" ,"forma_polja", "form_data");

    // btn event bind
    galerije_item_edit.new_item_btn_click();
    galerije_item_edit.edit_item_btn_click('', '../../admin/galerije/info_galerija_xcall/',
      {   inp_galid :   'id_gal',
          inp_title : 'title'
      });

    // bined action for event on select image
    galerije_item_edit.pictures_select_bind(document);

    // bined action for event on save gallery
    galerije_item_edit.save_gallery("[data-id='sub_gal']", '../../admin/galerije/dodaj_galeriju');

    // bined action for event gallery actions
    galerije_item_edit.save_gallery_images("[data-ui-slike-ok]", '../../admin/galerije/akcije_galerije');


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
                        <div class="box-content" >

                          <div class="archive-box">
                            <h3 class="archive-heading">GALERIJE <a btn-new ><span data-ui-novausluga="" class="fa fa-plus"></span></a>
                            </h3>
                            <ul class="archive-list">

                              <?php if($galerije!=false): ?>
                              <?php foreach($galerije as $g): ?>
                              <li>
                                  <h4>
                                    <a class="display_inline" href="<?php print $base_url ?>admin/galerije/obrisi_galeriju/<?php print $g->id_gal ?>">
                                      <i class="fas fa-trash-alt"></i>
                                    </a>

                                    <span class="display_inline" data-ui-title="<?php print $g->id_gal ?>">
                                      <?php print $g->title ?>
                                    </span>

                                    <a btn-edit edit-item-id=<?php print $g->id_gal ?> title="Izmena podataka" class="display_inline" >
                                      <i class="fas fa-cog"  style="float: right; margin-left: 45px" ></i>
                                    </a>
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
                            <h3 class="archive-heading"><i class="fas fa-cogs"></i> <a></a></h3>
                            <ul class="archive-list">

                              <?php
                              $form_gal = array( 'method' => "POST", 'name' => "form_gal");

                              $form_gal_id = array( 'name' => "inp_galid", 'type' => "text", 'disabled' => "true"   );

                              $form_gal_title =  array('name' => "inp_title", 'type' => "text", 'maxlength' => "30");
                              $form_gal_title_n =  array('name' => "inp_title_n", 'type' => "text", 'maxlength' => "30");


                              $form_nsl_submit = array('data-id' => "sub_gal",  'name' => 'sub_gal', 'value' => "SAČUVAJ", 'type' => "button");
                              $form_nsl_submit2 = array('data-id' => "sub_gal",  'name' => 'sub_gal2', 'value' => "DODAJ", 'type' => "button");

                              ?>

                              <li name="edit" class="display-none" active_id="-1">
                                <h3>Edit galeriju <span class="fa fa-cog"></span></h3>
                                <p>
                                    <?php print form_open("", $form_gal); ?>

                                    <label>ID: </label><?php print form_input($form_gal_id); ?><br />
                                    <label>Naziv: </label><?php print form_input($form_gal_title); ?><br />

                                    <!--  preview all images and actions -->
                                    <hr>
                                    <div data-slikegalerija-box="" class="display-none" style="display: block; width: 100%; float: left">
                                        <div>
                                            <select data-akcije-slike="">
                                                <option>Akcije...</option>
                                                <option title="Kopiraj u drugu galeriju" value="1">KOPIRAJ</option>
                                                <option title="Premesti iz ove u drugu galeriju" value="2">PREMESTI</option>
                                                <option title="Ukloni odabrano iz galerije" value="3">UKLONI</option>
                                            </select>

                                            <select data-akcije-izbor-galerije="" title="U koju galeriju premestiti/kopirati selektovane slike">
                                              <option value="2">PTNA 666</option>
                                              <option value="5">Radovi</option>
                                            </select>

                                            <span data-ui-slike-ok=""> OK </span>
                                        </div>

                                        <div id="pictures_prev_box" data-slikegalerija-box-prikaz="">
                                        <!-- images -->
                                        </div>
                                    </div>
                                    <hr>

                                    <i class="fa fa-caret-left" data-ui-editbox ></i>
                                    <?php print form_submit($form_nsl_submit); ?>
                                    <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>

                                    <?php print form_close(); ?>
                                </p>
                              </li>

                              <li name="new" class="display-block">
                                <h3>Nova galerija <span class="fa fa-plus"></span></h3>
                                <p>
                                    <?php print form_open('', $form_gal);   ?>

                                    <label>Naziv: </label><?php print form_input($form_gal_title_n); ?><br />

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
