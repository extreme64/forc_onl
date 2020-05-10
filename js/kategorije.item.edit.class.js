"use strict";

import { ItemEdit }   from '../js/item.edit.class.js';
class KategorijeItemEdit extends ItemEdit
{

  constructor(new_panel_element, edit_panel_element, new_bt, edit_btn, sub_btn ,forma_polja, form_data) {
    super(new_panel_element, edit_panel_element, new_bt, edit_btn, sub_btn ,forma_polja, form_data);
  }


  // edit item box UI dynamic
  edit_item_btn_click(ddl_options_call, ajax_call, ui_list_assarray){
    let ne = this.new_panel;
    let ee = this.edit_panel;
    $(this.edit_btn).click(function () {
      if($(ee).css("display") == "none")
      {
        // animate visib. of the box
        $(ne).toggle(300)
        $(ee).toggle(500);

        // get info on item, insert data in input fields
        $.ajax({
          url: ajax_call + $(this).attr("edit-item-id"), // admin/kategorije/info_kategorija_xcall/'+$(this).attr("data-edit-unos")
          dataType: 'JSON',
          success: function (val)
          {
            // let ui_fields = { inp_katid : 'id_cat',
            //                   inp_title : 'title',
            //                   ddl_tip : 'type'
            //                 };
            for (let key of Object.keys(ui_list_assarray)) {
              $("[name='"+key+"']").val(val[0][ui_list_assarray[key]]);
            }
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
      if($(this).attr("name") == 'sub_nkat')
      {
        formData.append("nov", "0");
        formData.append("inp_catid",  $("[name='inp_katid']").val());
      }
      else
      {
        formData.append("nov", "1");
      }

      // send xhr with values
      ItemEdit.ajax_send($, "../../admin/kategorije/dodaj_kategoriju", formData);
    });
  }


}

export {KategorijeItemEdit}
