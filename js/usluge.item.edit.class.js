"use strict";

import { ItemEdit }   from '../js/item.edit.class.js';
class UslugeItemEdit extends ItemEdit
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

        // populate drop down list
        $.ajax({
          url: ddl_options_call + $(this).attr("edit-item-id"), //<?php print $base_url ?>
          dataType: 'JSON',
          success: function (val)
          {
            $("[name='ddl_parent']").html(UslugeItemEdit.ddl_options_html_usluge('ddl_parent', val));

            // set values to compare to
            $("[name='ddl_parent']").attr("original-val", val['id_parent'][0]['id_parent']);
            $("[name='ddl_parent']").attr("new-val", val['id_parent'][0]['id_parent']);

            // select option
            $("[value='" + val['id_parent'][0]['id_parent'] + "']").attr('selected', 'true');
          }
        });

        // get info on item, insert data in input fields
        $.ajax({
          url: ajax_call + $(this).attr("edit-item-id"), //<?php print $base_url ?>
          dataType: 'JSON',
          success: function (val)
          {
            let ui_fields = {inp_uid : 'id_service', inp_title : 'name', inp_text : 'desc'};
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
    $("[data-id='sub_nu']").click(function () {
      var formData = new FormData($(this).parents('form')[0]);
      if ($(this).attr("name") == 'sub_nu'){
        formData.append("nov", "0");
        formData.append("inp_uid", $('[name="inp_uid"]').val());
        if($("[name='ddl_parent']").attr("original-val") == $("[name='ddl_parent']").attr("new-val")){
          formData.append("inp_pid_same", "1");
        }else{
          formData.append("inp_pid_same", "0");
        }
      }else{
        formData.append("nov", "1");
      }

      // send xhr with values
      ItemEdit.ajax_send($, "../../admin/usluge/dodaj_uslugu", formData);
    });
  }


  // insert HTML for dropdown list
  static set_options_dropdown(method_call)
  {
    $.ajax({
      url: '../../' + method_call, //<?php print $base_url ?>
      dataType: 'JSON',
      success: function (val)
      {
        $("[name='ddl_parent_n']").html(UslugeItemEdit.ddl_options_html_usluge('ddl_parent_n', val));
      }
    });
  }

  /** ddl_options_html_usluge - helper hethod to form up option elements
  * @param String
  * @param Array
  * @param String
  * @return String
  */
  static ddl_options_html_usluge(select, val , options_str='ddl_options')
  {
    var h = '<select name="'+select+'" original_val="" ><option value="-1">Odaberi</option>';
    for (var v = 0; v < val[options_str].length; v++)
    {
      h += "<option value='" + val[options_str][v]['id_service'] + "' >" + val[options_str][v]['name'] + "</option>"
    }
    h += '</select>';
    return h;
  }

}

export {UslugeItemEdit}
