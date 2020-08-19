<?php

namespace v3 {
  include_once dirname( __FILE__ ) . '/View.class.php';

  class SocialIconsView extends View {

    protected $attrs;

    public function __construct($view_type, $attrs) {
      parent::__construct($view_type);
      // we prevent error if called many times
      //TODO: add everywhere: prevent error if called many times
      if(!function_exists('socialicons_element')){
        get_template_part( 'template-parts/universal/section', 'socialicons' );
      }
      $this->attrs = $attrs;
    }

    public function render() {
      switch ($this->type) {
        case View::VIEW_TYPE_FULL:
          socialicons_element(1);
        break;
        case 2:
        break;
        case View::VIEW_TYPE_COL:
          socialicons_element(3, $this->attrs);
        break;

        default:
        // print "No view to display!";
        break;
      }
    }

  }
}
?>
