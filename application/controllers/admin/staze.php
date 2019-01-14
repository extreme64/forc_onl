<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Staze extends CI_Controller {
    
    private $stz_m;
    
    function __construct() {
        parent::__construct();
        $this->load->model('Staze_cms_model');
        $this->stz_m = new Staze_cms_model();

        $this->load->model('Meni_model', 'meni_model', TRUE);            
        
       
    }
    
    public function index()
	{
        
        $pars['title'] = "Staze/CMS";
        $pars['base_url'] = base_url(); 
        
        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE); 
        $pars['staze'] = $this->stz_m->svi();

        
            
		$this->load->view('admin/header_be', $pars);
        $this->load->view('admin/staze_main_be', $pars);
        $this->load->view('admin/footer_be', $pars);
         
	}
    
    
    public function dodaj_stazu()
    {
        //$errs_status = array();
        //print json_encode($this->input->post());
            //return;
        print json_encode($this->stz_m->sacuvaj($this->input->post()));
    
    }
    
    
    
    public function obrisi_stazu($id)
	{
        if($id!="" && $id!=FALSE)
            print $this->stz_m->obrisi($id);
        
        redirect(base_url()."admin/staze", "refresh");
        
	}
    
    public function info_staza_xcall($id)
    {
        
        print json_encode($this->stz_m->staza_info($id));
    }
}
    
    
?>