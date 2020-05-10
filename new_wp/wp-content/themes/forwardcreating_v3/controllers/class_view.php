<?php
namespace v3 {
  abstract class View {

    // static public
    public const VIEW_TYPE_FULL = 1;
    public const VIEW_TYPE_ROW = 2;
    public const VIEW_TYPE_COL = 3;
    private $type;

    public function __construct($view_type) {
      switch ($view_type) {
        case VIEW_TYPE_FULL:
          $type = VIEW_TYPE_FULL;
          break;
        case VIEW_TYPE_ROW:
          $type = VIEW_TYPE_ROW;
          break;
          case VIEW_TYPE_COL:
            $type = VIEW_TYPE_COL;
            break;
        default:
          $type = VIEW_TYPE_FULL;
          break;
      }
    }

    public function get_type() { return $this->type; }
    public function set_type($type) { $this->type = $type; }

    abstract public function render();

  }
}
