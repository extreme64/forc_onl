<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentari_old extends CI_Controller {

    private $kacenje_id;
    private $tip;

    function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->tip       = "s";
        $this->kacenje_id = 0;
    }
    
    public function init($tip="tekst", $id=1) {
        $this->tip       = $tip;
        $this->kacenje_id = $id;
    }
    
    
    
	public function test()
	{
        
        print "KOMENTARI OBJECT: ".$this->tip." | ".$this->kacenje_id;
        //$this->load->view('generic_main_fe');

        
	}
 

}
