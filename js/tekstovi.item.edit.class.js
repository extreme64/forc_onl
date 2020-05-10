"use strict";

import { ItemEdit }   from '../js/item.edit.class.js';
class TekstoviItemEdit extends ItemEdit
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
          url: ajax_call + $(this).attr("edit-item-id"), //'<?php print $base_url ?>admin/tekstovi/info_tekst_xcall/'
          dataType: 'JSON',
          success: function (val)
          {
            //console.log(val);

            let ui_fields = { inp_postid : 'post_id',
                              inp_title : 'title',
                              inp_time : 'time',
                              ddl_status : 'status',
                              inp_author : 'autor',
                              inp_text : 'text',
                              editor1 : 'text',
                              ddl_kategorija : 'id_cat'
                            };
            for (let key of Object.keys(ui_list_assarray)) {
              $("[name='"+key+"']").val(val[0][ui_list_assarray[key]]);
            }

            $("[name='inp_author']").data("id_author", val[0]['id_user'])

            // selected option in dd lists
            ItemEdit.selector("[name='ddl_status']", val[0]['status']);
            ItemEdit.selector("[name='ddl_kategorija']", val[0]['id_kategorija']);

            CKEDITOR.instances.editor1.setData(val[0]['text'], function ()
            {
              this.checkDirty();  // true
            });

          }
        });

      }
    });
  }

  new_item_btn_click()
  {
    super.new_item_btn_click();
    // some init for CKEditor
    CKEDITOR.instances.editor1.setData('');
  }

  // submitin' item changes to server
  ajax_submit(selector)
  {
    // new/edit submit item contents changes
    $(selector).click(function () {
      var formData = new FormData($(this).parents('form')[0]);
      if ($(this).attr("name") == 'sub_nt')
      {
        formData.append("nov", "0");
        formData.append("inp_postid", $('[name="inp_postid"]').val());
        formData.append("inp_text", CKEDITOR.instances.editor1.getData());
      } else
      {
        formData.append("nov", "1");
        formData.append("id_author", "<?php print $this->session->userdata('id_user') ?>");
        formData.append("inp_text2", CKEDITOR.instances.editor1.getData());
      }

      // send xhr with values
      ItemEdit.ajax_send($, "../../admin/tekstovi/dodaj_tekst", formData);
    });
  }


}

export {TekstoviItemEdit}
