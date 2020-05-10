<?php

namespace v3 {
  include_once dirname( __FILE__ ) . '/View.class.php';

  class IntroView extends View {


    public function __construct($view_type) {
      parent::__construct($view_type);
      get_template_part( 'template-parts/universal/section', 'intro' );
    }

    public function render() {
      switch ($this->type) {
        case View::VIEW_TYPE_FULL:
         // full page width
          intro_element(1);
        break;
        case View::VIEW_TYPE_SLIM:
          //
          intro_element(2);
        break;
        case View::VIEW_TYPE_SLIM2:
          //
          intro_element(3);
        break;

        default:
        // print "No view to display!";
        break;
      }
    }

  }
}
?>
