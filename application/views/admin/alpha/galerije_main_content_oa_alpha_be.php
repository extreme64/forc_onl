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
    galerije_item_edit.edit_item_btn_click('', '../../admin/galerije/info_galerija_xcall/', {   inp_galid :   'id_gal',
                                                                                                inp_title : 'title'
                                                                                    });

      // otvaranje galerije i prikaz slika
      $("[data-ui-slikegalerija___]").click(function()
      {
          var forma_polja;
          forma_polja = {
              gid: $(this).attr("data-gid")
          }
          $.ajax({
              url:"<?php print $base_url ?>admin/galerije/slike_iz_galerije",
              data: forma_polja,
              type: "POST",
              dataType: 'JSON',
              error:function(x,s,e){alert(x.responseText + "Err: "+e+ " | S: "+s);},
              success: function(val)
              {

                  if(val["data"] != false)
                  {

                      var html="";
                      for(var i in val["data"]) {
                         html += "<i data-sel-stat=\"0\" data-edit-unos=\""+val["data"][i].id_image+"\" class=\"edit-rm-off left far fa-square\" >"
                                      + " <img width=\"100\" src=\"<?php print $base_url ?>images/upload/" + val["data"][i].url+ "\"  alt=\""
                                      + val["data"][i].alt+ "\" title=\"" + val["data"][i].author+ "\"  />  "
                                  + " </i> ";
                      }
                      if(html!="")
                      {
                          // resetuj icone
                          $("[data-gid] > i").removeClass('far fa-folder-open').addClass('far fa-folder');
                          // setuj selektovanu, da reflektuje otvorenu galeriju
                          $("[data-gid='"+forma_polja["gid"]+"'] > i").removeClass('far fa-folder').addClass('far fa-folder-open');
                          $("[data-slikegalerija-box-prikaz]").html(html);

                          // setovanje koja je galerija otvorena
                          ostaleGalerije( selektovana_galerija() );


                      }
                  }
                  else
                      alert("Došlo je do greške! " + val["data"]);
              }
          });

          /** prikaz/skrivanje boksa u kome se iscrtava html za prikaz slika
           * unutar galerije koja je selektovana
           */
          if($("[data-slikegalerija-box]").css("display")=="none") {
              $("[data-slikegalerija-box]").toggle(700);
          }
          else{
              $("[data-slikegalerija-box]").toggle(100).toggle(700);
          }

      })
    // on btn clic submit
  /*  galerije_item_edit.ajax_submit("[data-id='sub_nsl !!!!!!! ']");*/

  });
</script>

<script type="text/javascript">
    /*$( document ).ajaxError(function( event, request, settings ) {
        alert( "Error requesting page " + settings.url +" "+ settings + "" );
    });*/

    $('').ready(function()
    {

        $("[data-id='sub_nsl']").click(function(event){
            event.stopPropagation();
            event.preventDefault();
            //$("[name='fileupload']").submit();
            //alert("!"+event.isDefaultPrevented() );

            var forma_polja;

            var formData = new FormData($(this).parents('form')[0]);



            if($(this).attr("name") == 'sub_nsl')
            {
                formData.append("nov", "0");
                forma_polja = {
                    nov: '0',
                    inp_catid: $("[name='inp_katid']").val(),
                    inp_title: $("[name='inp_title']").val(),
                    inp_tip: $("[name='ddl_gal_n'] :selected").val()
                };
            }
            else
            {
                 formData.append("nov", "1");
                 forma_polja = {
                    nov: '1',
                    title: $("[name='inp_title_n']").val(),
                    galerija: $("[name='ddl_gal_n'] :selected").val(),
                    file: 'userfile'
                };
            }

            $.ajax({
                url: '<?php print $base_url ?>admin/slike/dodaj_sliku',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                success: function (data) {

                    if(data[0] == "OK")
                        alert('Slike sačuvane!');
                    else
                        alert(data)
                    alert("Data Uploaded: "+data);
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            });



        });


        // dodavanje nove i cuvanje azurirane vec postojece galerije
        $("[data-id='sub_gal']").click(function(){
             var forma_polja;
            if($(this).attr("name") == 'sub_gal')
            {
                forma_polja = {
                    nov: '0',
                    inp_galid: $("[name='inp_galid']").val(),
                    inp_title: $("[name='inp_title']").val()
                };
            }
            else
            {
                 forma_polja = {
                    nov: '1',
                    inp_title_n: $("[name='inp_title_n']").val()
                };

            }

            $.ajax({
                url:"<?php print $base_url ?>admin/galerije/dodaj_galeriju",
                data: forma_polja,
                type: "POST",
                dataType: 'json',
                success: function(val)
                {
                    if(val[0] != "false"){
                        // kada se edituje galerija, reflektovati promenu u ddl za desinaciju akcije
                        $("[data-ui-title="+forma_polja["inp_galid"]+"]").text(forma_polja["inp_title"]);
                        ostaleGalerije( selektovana_galerija() );

                        alert(val);
                    }
                    else
                        alert("Došlo je do greške!");
                }
            });

        });


        /** selektovanje slike. Selektovane slike se mogu dalje manipulisati */
        $(document).unbind().on( "click", "[data-sel-stat]", function() {      // .on jer je ovaj elemnt dodan kroz js nakon kreiranja dom-a  | .unbind() FIX for .on called 2x
            //reset grafike
            //var elem = $(this).get(0);
            //setovanje grafike da reflektuje status selektovanog checkbox-a
            if($(this).attr("data-sel-stat") == "1")
                $(this).attr("data-sel-stat", "0").attr('data-icon', 'square');
            else
                $(this).attr("data-sel-stat", "1").attr('data-icon', 'check-square');
        });

        $("[data-akcije-slike]").change(function(){
            // ucitaj galerije u selection, sve osim trenutno otvorene
            // >>>>>>>> ostaleGalerije( selektovana_galerija() );
        })



// *******************

        // actions for iamges in the gallery
        $("[data-ui-slike-ok]").click(function()
        {
            var selected = {};
            var i=0;
            $.each($("[data-edit-unos]") , function( index, value )
            {
                if($(this).attr("data-sel-stat") == 1) { selected["ids"+i] = $(value).attr("data-edit-unos");  i++; }
            });

            if(i==0){
                alert("Ništa selektovano !"); return;

            }else{

                var action = $("[data-akcije-slike] :selected").val();

                if(action > -1)
                {
                    var target;
                    target = (action != 3) ? $("[data-akcije-izbor-galerije] :selected").val() : selektovana_galerija();  /* 3 je opcija za brisanje (1/2 kopiranje/premestanje) */
                    if( target > -1 )
                    {
                        var data = { "selected" : selected, "target" : target, "action" : action};

                        $.ajax({
                            url:"<?php print $base_url ?>admin/galerije/akcije_galerije",
                            data: data,
                            type: "POST",
                            dataType: 'JSON',
                            error:function(x,s,e){alert(x.responseText + "Err: "+e+ " | Status: "+s);},
                            success: function(val)
                            {
                                alert(JSON.stringify(val));
                                //console.log(val["data"]);
                            }
                        });
                    }else{alert("Nije odabrana destinacija ili"); return;}
                }
                else
                {alert("Nije odabrana akcija !"); return; }
            }

        });

    }); // / $(document).ready(function()
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

                              <li name="edit" class="display-none">
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

                                            <button data-ui-slike-ok="">OK</button>
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
