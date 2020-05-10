<?php
namespace v3 {
  abstract class View {

    const VIEW_TYPE_FULL = 1;
    const VIEW_TYPE_ROW = 2;
    const VIEW_TYPE_COL = 3;
    const VIEW_TYPE_FULL_SLIM = 4;
    const VIEW_TYPE_FULL_INFO = 5;
    const VIEW_TYPE_SLIM = 6;
    const VIEW_TYPE_SLIM2 = 7;
    const VIEW_TYPE_FULL2 = 8;

    protected $type;

    public function __construct($view_type) {
      switch ($view_type) {
        case View::VIEW_TYPE_FULL:
          $this->type = View::VIEW_TYPE_FULL;
          break;
        case View::VIEW_TYPE_ROW:
          $this->type = View::VIEW_TYPE_ROW;
          break;
        case View::VIEW_TYPE_COL:
          $this->type = View::VIEW_TYPE_COL;
          break;
        case View::VIEW_TYPE_FULL_SLIM:
          $this->type = View::VIEW_TYPE_FULL_SLIM;
          break;
        case View::VIEW_TYPE_FULL_INFO:
          $this->type = View::VIEW_TYPE_FULL_INFO;
          break;
        case View::VIEW_TYPE_SLIM:
          $this->type = View::VIEW_TYPE_SLIM;
          break;
        case View::VIEW_TYPE_SLIM2:
          $this->type = View::VIEW_TYPE_SLIM2;
          break;
        case View::VIEW_TYPE_FULL2:
          $this->type = View::VIEW_TYPE_FULL2;
          break;

        default:
          $this->type = View::VIEW_TYPE_FULL;
          break;
      }
    }

    public function get_type() { return $this->type; }
    public function set_type($type) { $this->type = $type; }

    abstract public function render();
  }
}
