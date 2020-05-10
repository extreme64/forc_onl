<?php

namespace v3 {
  include_once dirname( __FILE__ ) . '/View.class.php';

  class OssToolsView extends View {

    public function __construct($view_type) {
      parent::__construct($view_type);
      get_template_part( 'template-parts/universal/section', 'oss' );
    }

    public function render() {
      switch ($this->type) {
        case View::VIEW_TYPE_FULL:
         // full page width, stand-alone section
          ossTools_element(1);
        break;
        case View::VIEW_TYPE_FULL_SLIM:
          // in a col
          ossTools_element(2);
        break;
        case View::VIEW_TYPE_FULL_INFO:
          // in a col
          ossTools_element(3);
        break;

        default:
        // print "No view to display!";
        break;
      }
    }

  }
}
?>
