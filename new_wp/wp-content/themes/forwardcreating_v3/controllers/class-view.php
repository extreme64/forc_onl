<?php
// namespace v3 {
  abstract class View {

    // static public
    public const VIEW_TYPE_FULL = 1;
    public const VIEW_TYPE_ROW = 2;
    public const VIEW_TYPE_COL = 3;
    private $type;

    public function __construct($view_type) {}

    public function get_type() { return $this->type; }
    public function set_type($type) { $this->type = $type; }

    abstract public function render();

  }
// }
