<?php

class FrontUI {
  
  public $type;
  
  public function __construct($ui_elem) {
    $this->type = $ui_elem;
    include_once dirname( __FILE__ ) . '/ui/ui-basic.php';
  }
  
  public function render() {

    switch ($this->type) {
       case 1: 
        return UIViews::CHECKBOX_ICO_CHECKED;
       break;
       case 2: 
        return UIViews::CHECKBOX_CHECK;
       break; 
    }
  }

}

?>