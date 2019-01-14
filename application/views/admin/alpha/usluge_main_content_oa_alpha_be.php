<script type="module">
  import { ItemEdit }   from '../js/item.edit.class.js';
  import { UslugeItemEdit } from '../js/usluge.item.edit.class.js'



  // ON READY
  $(document).ready(function () {

    let usluge_item_edit = new UslugeItemEdit("[name='new']", "[name='edit']", "[btn-new]", "[btn-edit]", "[data-id='sub_nu']" ,"forma_polja", "form_data");
    // insert options
    UslugeItemEdit.set_options_dropdown("admin/usluge/service_parent_options_xcall/");
    // event bind
    UslugeItemEdit.parent_changed();

    // btn event bind
    usluge_item_edit.new_item_btn_click();
    usluge_item_edit.edit_item_btn_click('../../admin/usluge/service_parent_options_xcall/', '../../admin/usluge/info_usluga_xcall/', {inp_uid : 'id_service', inp_title : 'name', inp_text : 'desc'});

    // on btn clic submit
    usluge_item_edit.ajax_submit("[data-id='sub_nu']")

    UslugeItemEdit.status_box_msg('Hello World!', "[status-notif-box]");
    UslugeItemEdit.status_box_msg('Hello there.', "[status-notif-box]", false);
    UslugeItemEdit.status_box_msg('usluge_item_edit.name', "[status-notif-box]");


  });


</script>
<script type="text/javascript">
        /*$( document ).ajaxError(function( event, request, settings ) {
         alert( "Error requesting page " + settings.url +" "+ settings + "" );
         });*/
</script>

<!--  -->

<style>
        .korisnici-panel-info{float: left;  text-align: right; font-size:0.8em; color: #aaa}
        .box-zasebni-poc-admin{float:left; min-width:200px; max-width: 70%; }
        .display-none{display: none}
        label{float: left; width: 60px;}
        textarea{
          background-color: #1a1c1f !important;
        }
</style>




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
                    <h3 class="archive-heading">USLUGE <a btn-new ><span data-ui-novausluga="" class="fa fa-plus"></span></a>
                    </h3>
                    <ul class="archive-list">

                      <?php foreach ($usluge as $iter): ?>
                        <script>
                        $(document).ready(function () {
                            // $("[status-notif-box]").append(" | <?php echo $iter->name; ?>  ");
                          });
                        </script>
                        <li>
                          <h4>
                            <a class="display_inline" href="<?php print $base_url ?>admin/usluge/obrisi_uslugu/<?php print $iter->id_service ?>"><i class="fas fa-trash-alt"></i></a>
                            <?php print $iter->name ?> / <?php print $iter->id_service ?> /
                            <a btn-edit edit-item-id="<?php print $iter->id_service ?>" class="display_inline">
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
                        <h3>Edit <span class=""></span></h3>
                        <p>
                          <?php print form_open($base_url . "", $form_nu); ?>

                          <label>ID: </label><?php print form_input($form_nu_id); ?><br />
                          <label>Naziv: </label><?php print form_input($form_nu_naziv); ?><br />

                          <label>Pripada: </label><?php print form_dropdown('ddl_parent'); ?><br />


                          <label>Opis: </label><?php print form_textarea($form_nu_opis); ?><br />


                          <i class="fas fa-caret-left" data-ui-editbox ></i>
                          <?php print form_submit($form_nu_submit); ?>
                          <?php print form_reset(array('name' => 'reset_nk', 'value' => "OBRIŠI")); ?>

                          <?php print form_close(); ?>
                        </p>
                      </li>

                      <li name="new" class="display-block">
                        <h3>New <span class=""></span></h3>
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


              </div><!-- /.box-content -->
					</div><!-- /.box box-statistics -->
		         	<div class="clearfix"></div>
				</div><!-- /.rows -->

			</section><!-- /#dashboard -->



		</main><!-- /main -->



<!--  -->
<!--  -->
<!--  -->
