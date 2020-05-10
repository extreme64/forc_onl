<?php

namespace v3 {
  include_once dirname( __FILE__ ) . '/View.class.php';

  class ProductionView extends View {


    public function __construct($view_type) {
      parent::__construct($view_type);
      get_template_part( 'template-parts/universal/section', 'production' );
    }

    public function render() {
      switch ($this->type) {
        case View::VIEW_TYPE_FULL:
         // full page width
          production_element(1);
        break;
        case View::VIEW_TYPE_FULL2:
          //
          production_element(2);
        break;


        default:
        // print "No view to display!";
        break;
      }
    }

  }
}
?>
