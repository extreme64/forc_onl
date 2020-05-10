"use strict";

import {
  ItemEdit
} from '../js/item.edit.class.js';
class GalerijeItemEdit extends ItemEdit {

  constructor(new_panel_element, edit_panel_element, new_bt, edit_btn, sub_btn, forma_polja, form_data) {
    super(new_panel_element, edit_panel_element, new_bt, edit_btn, sub_btn, forma_polja, form_data);
  }


  // edit item box UI dynamic
  edit_item_btn_click(ddl_options_call, ajax_call, ui_list_assarray) {
    let ne = this.new_panel;
    let ee = this.edit_panel;
    let this_ref = this;
    let edit_brn_selector = this.edit_btn
    let ids_not_same
    
    $(edit_brn_selector).click(function() {
      let active_id = $(ee).attr("active_id")
      let selected_id = $(this).attr("edit-item-id")
      ids_not_same = active_id.localeCompare(selected_id)

      $(edit_brn_selector).attr("active", "false")
      if ($(ee).css("display") == "none" || ids_not_same) {

        // animate visib. of the box
        if(ids_not_same) {
          $(ne).hide()
          $(ee).hide(200).show(400)
        } else {
          $(ne).toggle(400)
        }

        // set what item we are showing in edit box
        var new_activ_id = $(this).attr("edit-item-id")
        $(ee).attr("active_id", new_activ_id)


        // get info on item, insert data in input fields
        let gid_edit = $(this).attr("edit-item-id");
        $.ajax({
          url: ajax_call + gid_edit,
          dataType: 'JSON',
          success: function(val) {
            // let ui_fields = { inp_galid : 'inp_galid',
            //                   inp_title : 'title'
            //                 };

            // $("[name='ddl_gal']").data("id_old_gal", val[0]['id_gal']);
            // $("#prev_img_slot").attr('src', '../../images/upload/'+ val[0]['url']);

            for (let key of Object.keys(ui_list_assarray)) {
              $("[name='" + key + "']").val(val[0][ui_list_assarray[key]]);
            }

            // show iamges from gallery
            this_ref.pictures_display(gid_edit);
          }
        });

      }
    });
  }

  // dodavanje nove i cuvanje azurirane vec postojece galerije
  save_gallery(selector, ajax_call) {
    $(selector).click(function() {
      let this_ref = this;
      var forma_polja;
      if ($(this).attr("name") == 'sub_gal') {
        forma_polja = {
          nov: '0',
          inp_galid: $("[name='inp_galid']").val(),
          inp_title: $("[name='inp_title']").val()
        };
      } else {
        forma_polja = {
          nov: '1',
          inp_title_n: $("[name='inp_title_n']").val()
        };

      }

      $.ajax({
        url: ajax_call,
        data: forma_polja,
        type: "POST",
        dataType: 'json',
        success: function(val) {
          if (val[0] != "false") {
            // kada se edituje galerija, reflektovati promenu u ddl za desinaciju akcije
            $("[data-ui-title=" + forma_polja["inp_galid"] + "]").text(forma_polja["inp_title"]);
            this_ref.ostaleGalerije(selektovana_galerija());

            alert(val);
          } else
            alert("Došlo je do greške!");
        }
      });

    });
  }

  // actions for images in the gallery
  save_gallery_images(selector, ajax_call) {
    $(selector).click(function() {
      event.stopPropagation();
      event.preventDefault();

      var selected = {};
      var i = 0;
      $.each($("[data-edit-unos]"), function(index, value) {
        if ($(this).attr("data-sel-stat") == 1) {
          selected["ids" + i] = $(value).attr("data-edit-unos");
          i++;
        }
      });

      if (i == 0) {
        alert("Ništa selektovano !");
        return;
      } else {
        var action = $("[data-akcije-slike] :selected").val();
        if (action > -1) {
          var target;
          target = (action !== 3) ? $("[data-akcije-izbor-galerije] :selected").val() : selektovana_galerija(); /* 3 je opcija za brisanje (1/2 kopiranje/premestanje) */
          if (target > -1) {
            var data = {
              "selected": selected,
              "target": target,
              "action": action
            };
            $.ajax({
              url: ajax_call,
              data: data,
              type: "POST",
              dataType: 'JSON',
              error: function(x, s, e) {
                // debug only!!!!
                alert(x.responseText + "Err: " + e + " | Status: " + s);
              },
              success: function(val) {

                if (val.data == false) {
                  alert('Error on save');
                } else {
                  // aniamte UI as feedack to user

                  $.each($("[data-edit-unos]"), function(index, value) {
                    if ($(this).attr("data-sel-stat") == 1) {
                      if(action == 1)
                        $(this).parent().fadeOut(100).fadeIn(500);
                      if(action == 2)
                        $(this).parent().fadeOut(400);
                      if(action == 3)
                        $(this).parent().fadeOut(800);
                    }
                  });
                }
              }
            });
          } else {
            alert("Nije odabrana destinacija ili");
            return;
          }
        } else {
          alert("Nije odabrana akcija !");
          return;
        }
      }

    });
  }


  // submitin' item changes to server
  // TODO: check usage of this???
  ajax_submit(selector) {
    // new/edit submit item contents changes
    $(selector).click(function() {
      var formData = new FormData($(this).parents('form')[0]);
      if ($(this).attr("name") == 'sub_nsl') {
        formData.append("nov", "0");
        formData.append("uni_ent_gid", $("[name='ddl_gal']").data("id_old_gal"));
        formData.append("inp_slid", $("[name='inp_slid']").val());
      } else {
        formData.append("nov", "1");
      }

      // send xhr with values
      ItemEdit.ajax_send($, "../../admin/slike/dodaj_sliku", formData);
    });
  }

  pictures_display(g_id) {
    let this_ref = this;
    var forma_polja;
    forma_polja = {
      gid: g_id //$(this).attr("data-gid")
    }
    $.ajax({
      url: '../../admin/galerije/slike_iz_galerije',
      data: forma_polja,
      type: 'POST',
      dataType: 'JSON',
      error: function(x, s, e) {
        alert(x.responseText + " | Err :: " + e + " | S: " + s);
        //console.log(x);
      },
      success: function(val) {
        if (val["data"] != false) {
          var html = "";
          for (var i in val["data"]) {
            // FIXME: remove inline style from span
            html += "<span class=\"left\" style=\"width: 100px\" >" +
              "<i data-sel-stat=\"0\" data-edit-unos=\"" + val["data"][i].id_image + "\" class=\"edit-rm-off  fas fa-square\" ></i>" +
              " <img class=\"left\" width=\"100\" src=\"../../images/upload/" + val["data"][i].url + "\"  alt=\"" +
              val["data"][i].alt + "\" title=\"" + val["data"][i].author + "\"  /></span>";
          }
          if (html != "") {
            // resetuj icone
            $("[data-gid] > i").removeClass('far fa-folder-open').addClass('far fa-folder');
            // setuj selektovanu, da reflektuje otvorenu galeriju
            $("[data-gid='" + forma_polja["gid"] + "'] > i").removeClass('far fa-folder').addClass('far fa-folder-open');
            $("[data-slikegalerija-box-prikaz]").html(html);

            // setovanje koja je galerija otvorena
            this_ref.ostaleGalerije(g_id);
          }
        } else
          alert("Došlo je do greške! " + val["data"]);
      }
    });
  }

  // UI change on image click, 'image selection'
  pictures_select_bind(selector) {
    $(selector).unbind().on("click", "[data-sel-stat]", function() {
      //setovanje grafike da reflektuje status selektovanog checkbox-a
      if ($(this).attr("data-sel-stat") == "1")
        $(this).attr("data-sel-stat", "0").attr('data-icon', 'square');
      else
        $(this).attr("data-sel-stat", "1").attr('data-icon', 'check-square');
    });
  }

  // get options for drop down list
  ostaleGalerije(g_id) {
    let data_gid = {
      id1: g_id
    }

    $.ajax({
      url: "../../admin/galerije/sve_galerije/exc",
      data: data_gid,
      type: "POST",
      dataType: 'JSON',
      error: function(x, s, e) {
        alert(x.responseText + "Err: " + e + " | Status: " + s);
      },
      success: function(val) {
        let html = "",
          data = val["data"];
        for (var i in data)
          html += "<option value=\"" + data[i].id_gal + "\">" + data[i].title + "</option>";
        $("[data-akcije-izbor-galerije]").html(html);
      }
    });
  }

}

export {
  GalerijeItemEdit
}
