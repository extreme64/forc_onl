<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Logovanje extends CI_Controller {

    public $vdb;


    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('virt_db.php');
        $this->vdb = new Virt_db();
        $this->load->model('Meni_model', 'meni_model', TRUE); 
    }


	public function index()
	{

        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $pars['base_url'] = base_url();
        $pars['title'] = "LOGOVANJE";
        
        if($this->input->get_post('submit_login')!="") {    $this->ulaz();   }
        else { }
        
        $pars['form_login'] = array('id' => "form_login", 'name' => "form_login", 'method' => "POST");
        $pars['input_nalog'] = array('id' => "input_nalog", 'name' => "input_nalog", 'type' => "text");
        $pars['input_sifra'] = array('id' => "input_sifra", 'name' => "input_sifra");
        $pars['submit_login'] = array('id' => "submit_login", 'name' => "submit_login", 'value' => "PRIJAVA", 'class' => "mainBtn");
        
		$this->load->view('header_fe', $pars);
        $this->load->view('log_main_fe',$pars);
        $this->load->view('footer_fe',$pars);
	}


    public function ulaz()
	{



        $this->load->model('Korisnik_model');
        $user = new Korisnik_model();
        $name = $this->input->get_post('input_nalog');
        $pass = $this->input->get_post('input_sifra'); 
        $user_res_a = $user->ulaz_user($name, $pass);
        if($user_res_a != false)
        {
            $uloga = $user->uloga($user_res_a[0]->id_user);
            $sess_data = array( 'id_user' => $user_res_a[0]->id_user, 'name' => $name, 'poslednja_aktivnost' => time() , 'uloga' => $uloga );
            $this->session->set_userdata($sess_data);
            // print "LOG IN ;)".$this->session->userdata('name')." / ".$this->session->userdata('poslednja_aktivnost');
            redirect(base_url(), 'refresh');
        }
        
    }
    
    public function izlaz()
	{
        $this->session->sess_destroy();
        redirect('logovanje', 'refresh');
    }




}


?>