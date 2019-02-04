"use strict";

import { ItemEdit }   from '../js/item.edit.class.js';
class GalerijeItemEdit extends ItemEdit
{

  constructor(new_panel_element, edit_panel_element, new_bt, edit_btn, sub_btn ,forma_polja, form_data)
  {
    super(new_panel_element, edit_panel_element, new_bt, edit_btn, sub_btn ,forma_polja, form_data);
  }


  // edit item box UI dynamic
  edit_item_btn_click(ddl_options_call, ajax_call, ui_list_assarray)
  {
    let ne = this.new_panel;
    let ee = this.edit_panel;
    let this_ref = this;
    $(this.edit_btn).click(function () {

      if($(ee).css("display") == "none")
      {
        // animate visib. of the box
        $(ne).toggle(300)
        $(ee).toggle(500);

        // get info on item, insert data in input fields
        let gid_edit = $(this).attr("edit-item-id");
        $.ajax({
          url: ajax_call + gid_edit,
          dataType: 'JSON',
          success: function (val)
          {
            // let ui_fields = { inp_galid : 'inp_galid',
            //                   inp_title : 'title'
            //                 };

            // $("[name='ddl_gal']").data("id_old_gal", val[0]['id_gal']);
            // $("#prev_img_slot").attr('src', '../../images/upload/'+ val[0]['url']);

            for (let key of Object.keys(ui_list_assarray)) {
              $("[name='"+key+"']").val(val[0][ui_list_assarray[key]]);
            }

            // show iamges from gallery
            this_ref.pictures_display(gid_edit);
          }
        });

      }
    });
  }

  // submitin' item changes to server
  ajax_submit(selector)
  {
    // new/edit submit item contents changes
    $(selector).click(function () {
      var formData = new FormData($(this).parents('form')[0]);
      if($(this).attr("name") == 'sub_nsl')
      {
        formData.append("nov", "0");
        formData.append("uni_ent_gid", $("[name='ddl_gal']").data("id_old_gal"));
        formData.append("inp_slid", $("[name='inp_slid']").val());
      }
      else
      {
        formData.append("nov", "1");
      }

      // send xhr with values
      ItemEdit.ajax_send($, "../../admin/slike/dodaj_sliku", formData);
    });
  }

  pictures_display(g_id)
  {
      let this_ref = this;
      var forma_polja;
      forma_polja = {
          gid: g_id //$(this).attr("data-gid")
      }
      $.ajax({
          url:'../../admin/galerije/slike_iz_galerije',
          data: forma_polja,
          type: 'POST',
          dataType: 'JSON',
          error:function(x,s,e){alert(x.responseText + " | Err :: "+e+ " | S: "+s); console.log(x);},
          success: function(val)
          {
              if(val["data"] != false)
              {
                  var html="";
                  for(var i in val["data"]) {
                    // FIXME: remove inline style from span
                     html += "<span class=\"left\" style=\"width: 100px\" >"
                                  + "<i data-sel-stat=\"0\" data-edit-unos=\""+val["data"][i].id_image+"\" class=\"edit-rm-off  fas fa-square\" ></i>"
                                  + " <img class=\"left\" width=\"100\" src=\"../../images/upload/" + val["data"][i].url+ "\"  alt=\""
                                  + val["data"][i].alt+ "\" title=\"" + val["data"][i].author+ "\"  /></span>";
                  }
                  if(html!="")
                  {
                      // resetuj icone
                      $("[data-gid] > i").removeClass('far fa-folder-open').addClass('far fa-folder');
                      // setuj selektovanu, da reflektuje otvorenu galeriju
                      $("[data-gid='"+forma_polja["gid"]+"'] > i").removeClass('far fa-folder').addClass('far fa-folder-open');
                      $("[data-slikegalerija-box-prikaz]").html(html);

                      // setovanje koja je galerija otvorena
                      this_ref.ostale_galerije(g_id);
                  }
              }
              else
                  alert("Došlo je do greške! " + val["data"]);
          }
      });
  }

  ostale_galerije(g_id)
  {
      let data_gid = { id1 : g_id }

      $.ajax({
          url:"../../admin/galerije/sve_galerije/exc",
          data: data_gid,
          type: "POST",
          dataType: 'JSON',
          error:function(x,s,e){alert(x.responseText + "Err: "+e+ " | Status: "+s);},
          success: function(val)
          {
              let html="", data = val["data"];
              for(var i in data)
                 html +=  "<option value=\"" + data[i].id_gal + "\">" + data[i].title + "</option>";
              $("[data-akcije-izbor-galerije]").html(html);
          }
      });
  }


  // FIXME:to clean, no use for this, value past directly
  /*selektovana_galerija()
  {
      let opened_gallery;
      $.each($("[data-gid] > i") , function( index, value )
      {
          if($(value).hasClass("fa fa-folder-open"))
              opened_gallery = $(value).parent(0).attr("data-gid");
      });
      return  opened_gallery;
  }*/


}

export {GalerijeItemEdit}
