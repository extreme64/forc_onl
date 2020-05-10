<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Err404 extends CI_Controller {
    
  
    function __construct() {
        parent::__construct();
        $this->load->model('Meni_model', 'meni_model', TRUE);
    }

 
	public function index()
	{
	    $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $pars['title'] = "GREŠKA 404";
        $pars['base_url'] = base_url();
        

        $this->load->view('header_fe', $pars);
        $this->load->view('404_main_fe', $pars);
        $this->load->view('footer_fe', $pars);
         
	}
    
}