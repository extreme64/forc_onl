<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Nalog extends CI_Controller {


    private $odb;
    
    private $id_user;
    private $name;
    private $mail;
    private $reg_time;
    private $lastlog;
    private $status;
    private $type;
    
    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('array');
        $this->load->model('Korisnik_model');
        $this->odb = new Korisnik_model();
       $this->load->model('Meni_model', 'meni_model', TRUE); 
    }

    function init($id) 
    {   
        $user = $this->odb->user_info($id);
        if(!$user)
            redirect(base_url()."err404", "refresh");
        $this->id_user =    $id;
        $this->name =       $user[0]->name;
        $this->mail =       $user[0]->mail;
        $this->reg_time =   $user[0]->regtime;
        $this->lastlog =    $user[0]->lastlog;
        $this->status =     $user[0]->status;
    }



	public function index()
	{
        redirect(base_url()."err404", "refresh");
	}
    
    public function korisnik($id="", $name="")
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        if($id=="")
            redirect(base_url()."err404", "refresh");
        
        $this->init($id);
        
        $pars['title'] = $this->name;
        $pars['base_url'] = base_url();
        $pars['user_info']['name'] = $this->name;
        $pars['user_info']['mail'] = $this->mail;
        $pars['user_info']['regtime'] = $this->reg_time;
        $pars['user_info']['lastlog'] = $this->lastlog;
        $pars['user_info']['status'] = $this->status;
        $pars['user_info']['id'] = $this->id_user;

        $this->load->view('header_fe', $pars);
        $this->load->view('nalog_main_fe', $pars);
        $this->load->view('footer_fe', $pars);
	}
    
}

?>