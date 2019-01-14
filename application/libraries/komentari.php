<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentari extends CI_Controller {
    private $vdb_k;
    private $kacenje_id;
    private $tip;
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        if (!class_exists('Komentari'))
        {
           $this->load->library('virt_db.php');
        }
        $this->vdb_k = new Virt_db(); 
        
        $this->tip       = "s";
        $this->kacenje_id = 0;
    }
    
    public function init($tip="tekst", $id=1) {
        $this->tip       = $tip;
        $this->kacenje_id = $id;
    }
    
    
    
    
    public function sviKomentari()
    {
        return $this->vdb_k->virtKomentari();
    }
    
    
	public function test()
	{
        print "KOMENTARI OBJECT: ".$this->tip." | ".$this->kacenje_id;  
	}
}
