<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Komentari extends CI_Controller {
    
    private $k_model;


    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('url'); 
        $this->load->helper('text');
        $this->load->model('Komentari_cms_model');
        $this->k_model = new Komentari_cms_model();

        $this->load->model('Meni_model', 'meni_model', TRUE);            
    }


	public function index()
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $pars['title'] = "Komentari/CMS";
        $pars['base_url'] = base_url(); 
        
        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE); 
        $pars['komentari'] = $this->k_model->svi();
        $this->load->model('Uloge_cms_model');
        $uloge = new Uloge_cms_model();
        
        $form_nk_tip_opcije = array_merge(array(array("value" => "-1", "text" => "Odabrati tip..." )) , $uloge->sve()); $form_dropdown = array();
        foreach($form_nk_tip_opcije as $opcija){ $form_dropdown[$opcija['value']] = $opcija['text'];}
        $pars['form_nk_tip_opcije'] = $form_dropdown;
            
		$this->load->view('admin/header_be', $pars);
        $this->load->view('admin/komentari_main_be', $pars);
        $this->load->view('admin/footer_be', $pars);
	}
    
    
    
    
    public function dodaj_komentar()
	{
        print $this->k_model->sacuvaj($this->input->post());
    }
    
    
    public function obrisi_komentar($comid)
	{
        if($comid!="" && $comid!=FALSE)
        {
            /*$pars['title'] = "Obrisi - Korisnici/CMS";
            $pars['base_url'] = base_url(); 
            $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);*/
            print $users->k_model->obrisi($comid);
        }
        redirect(base_url()."admin/komentari", "refresh");
	}
    
    public function info_komentar_xcall($id)
    {
        print json_encode($this->k_model->komentar_info($id));
    }
}
    
    
?>