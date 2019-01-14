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
<script type="module">
  import { ItemEdit }   from '../js/item.edit.class.js';
  import { KategorijeItemEdit } from '../js/kategorije.item.edit.class.js'



  // ON READY
  $(document).ready(function () {

    let kategorije_item_edit = new KategorijeItemEdit("[name='new']", "[name='edit']", "[btn-new]", "[btn-edit]", "[data-id='sub_nkat']" ,"forma_polja", "form_data");

    // btn event bind
    kategorije_item_edit.new_item_btn_click();
    kategorije_item_edit.edit_item_btn_click('', '../../admin/kategorije/info_kategorija_xcall/', { inp_katid : 'id_cat',
                                                                                                    inp_title : 'title',
                                                                                                    ddl_tip : 'type'
                                                                                                  });

    // on btn clic submit
    kategorije_item_edit.ajax_submit("[data-id='sub_nkat']")

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
                    <h3 class="archive-heading">KATEGORIJE <a btn-new ><span data-ui-novausluga="" class="fa fa-plus"></span></a>
                    </h3>
                    <ul class="archive-list">

                      <?php foreach ($kategorije as $iter): ?>
                        <li>
                          <h4>
                            <a class="display_inline" href="<?php print $base_url ?>admin/kategorije/obrisi_kategoriju/<?php print $iter->id_cat ?>"><i class="fas fa-trash-alt"></i></a>
                            <?php print $iter->title ?> / <?php print $iter->id_cat ?> /
                            <a btn-edit edit-item-id="<?php print $iter->id_cat ?>" class="display_inline">
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
                        $form_nkat = array('method' => "POST", 'name' => "form_nkat");
                        $form_nkat_id = array( 'name' => "inp_katid", 'type' => "text", 'disabled' => "true"   );
                        $form_nkat_title = array( 'name' => "inp_title", 'type' => "text", 'maxlength' => "30");
                        $form_nkat_tip =  array('-1'=> "Tip odabir...", '1' => "tip 1", '2' => "tip 2");

                        $form_nkat_title2 = array( 'name' => "inp_title2", 'type' => "text", 'maxlength' => "30");
                        $form_nkat_tip2 =  array('-1'=> "Tip odabir...", '1' => "tip 1", '2' => "tip 2");

                        $form_nkat_submit = array('data-id' => "sub_nkat",  'name' => 'sub_nkat', 'value' => "SAČUVAJ", 'type' => "button");
                        $form_nkat_submit2 = array('data-id' => "sub_nkat",  'name' => 'sub_nkat2', 'value' => "DODAJ", 'type' => "button");
                      ?>

                      <li name="edit" class="display-none">
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

                      <li name="new" class="display-block">
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

              </div><!-- /.box-content -->
					</div><!-- /.box box-statistics -->
		      <div class="clearfix"></div>
				</div><!-- /.rows -->
			</section><!-- /#dashboard -->
		</main><!-- /main -->



<!--  -->
<!--  -->
<!--  -->
