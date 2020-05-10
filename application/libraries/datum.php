<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datum extends Date {
    private $unix_ts;
    
    function __construct() {
        parent::__construct();
        //$this->load->helper('date');
    }
    
    public function init($time) {
        $this->$unix_ts = $time;
    }
    
    
    
    
    public function formatDatum()
    {
        return date("d/m/Y", $this->unix_ts);
    }
    
    public function formatVreme()
    {
        return date("H:i", $this->unix_ts);
    }
    
    public function get_unix_ts()
    {
        return $this->unix_ts;
    }
    
    

}
