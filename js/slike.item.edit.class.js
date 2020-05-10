"use strict";

import { ItemEdit }   from '../js/item.edit.class.js';
class SlikeItemEdit extends ItemEdit
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
          url: ajax_call + $(this).attr("edit-item-id"),
          dataType: 'JSON',
          success: function (val)
          {
            // let ui_fields = { inp_slid : 'id_image',
            //                   inp_title : 'title',
            //                   inp_alt : 'alt',
            //                   inp_autor : 'author',
            //                   ddl_gal : 'id_gal'
            //                 };

            $("[name='ddl_gal']").data("id_old_gal", val[0]['id_gal']);
            $("#prev_img_slot").attr('src', '../../images/upload/'+ val[0]['url']);

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
}

export {SlikeItemEdit}
