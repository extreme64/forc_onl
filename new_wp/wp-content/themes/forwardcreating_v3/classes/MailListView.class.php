<?php

namespace v3 {
  include_once dirname( __FILE__ ) . '/View.class.php';

  class MailListView extends View {

    public function __construct($view_type) {
      parent::__construct($view_type);
      get_template_part( 'template-parts/universal/section', 'maillist' );
    }

    public function render() {
      switch ($this->type) {
        case View::VIEW_TYPE_FULL:
         // full page width, stand-alone section
          mailList_element(1);
        break;
        case 2:
        break;
        case View::VIEW_TYPE_COL:
          // in a col
          mailList_element(2);
        break;

        default:
        // print "No view to display!";
        break;
      }
    }

  }
}
?>
