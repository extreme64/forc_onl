"use strict";

import {
  ItemEdit
} from '../js/item.edit.class.js';
class ReferenceItemEdit extends ItemEdit {

  constructor(new_panel_element, edit_panel_element, new_bt, edit_btn, sub_btn, forma_polja, form_data) {
    super(new_panel_element, edit_panel_element, new_bt, edit_btn, sub_btn, forma_polja, form_data);
  }


  // edit item box UI dynamic
  edit_item_btn_click(ddl_options_call, ajax_call, ui_list_assarray) {

  }

}


export {
  ReferenceItemEdit
}
