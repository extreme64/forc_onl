class ItemEdit
{

  constructor(new_panel_element, edit_panel_element, new_bt, edit_btn, sub_btn ,forma_polja, form_data){
    // panel box for new/edit item
    this.new_panel = new_panel_element;
    this.edit_panel = edit_panel_element;
    // event spawn UI buttons, show new panel, show edit panel, submit changes
    this.new_bt = new_bt;
    this.edit_btn = edit_btn;
    this.sub_btn = sub_btn;
    // form data object
    this.forma_polja = forma_polja; // FIXME: delet this? no use
    this.form_data = form_data;
  }

  // new item box UI dynamic
  new_item_btn_click(){
    let ne = this.new_panel;
    let ee = this.edit_panel;
    $(this.new_bt).click(function () {
      if($(ne).css("display") == "none")
      {
        $(ee).toggle(300);
        $(ne).toggle(500);
      }
    })
  }



  // ***** static *****

  // send xhr with values
  static ajax_send(e, url, data, type='POST', dataType='JSON', err_msg='error!', cache=false, contentType=false, processData=false){

    e.ajax({
      url: url, //<?php print $base_url ?>
      data: data,
      type: type,
      dataType: dataType,
      success: function (val)
      {
        console.log('val is '+val);
        console.log(val);
        if (val !== false) {
          alert('Done');
        } else {
          alert('XHR feedback: '+val);
        }
      },
      error: function (jqXHR_obj)
      {
        alert('XHR error');
      },
      complete: function(jqXHR_obj, status_str)
      {
         console.log(jqXHR_obj);
         console.log('complete: '+status_str);
      },
      statusCode:
      {
        404: function(val)
        {
          alert("XHR feedback: Action not found " + val['statusText']);
        },
        301: function(val)
        {
          alert("XHR feedback: Redirect 301 " + val['statusText']);
        }
      },
      cache: cache,
      contentType: contentType,
      processData: processData
    });
  }

  // set attr on change to comp. to original
  static parent_changed()
  {
    $("[name='ddl_parent']").on('change', function (e) {
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;
      $("[name='ddl_parent']").attr("new-val", valueSelected);
    });
  }

  // preview FormData obj.
  static form_data_preview(formData)
  {
    for(var pair of formData.entries()) {
       console.log(pair[0]+ ', '+ pair[1]);
    }
  }

  // select option i drop down lists
  static selector(selector, index)
  {
    let selected_e = $(selector+" > [value='" + index + "'] ");
    selected_e.siblings().attr('selected', false); // or removeAttr('')
    selected_e.attr('selected', 'selected');
    selected_e.prop('selected', true);
  }

  // output some status stuff, or debug info, to box/element of your choice
  static status_box_msg(str, element, append=true)
  {
    if(append){
      let previus = $(element).html();
      $(element).html(previus + "OUTPUT: " + str + "<br/>");
    } else {
      $(element).html("OUTPUT: " + str + "<br/>");
    }
  }

  // toString
  toString() {
    return this;
  }
}

export{ ItemEdit }
