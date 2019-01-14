<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontakt extends CI_Controller {


	 function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Meni_model', 'meni_model', TRUE); 
    }

 
	public function index()
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $pars['base_url'] = base_url();
        $pars['title'] = "CONTACT";
        $pars['gmaps_script'] = TRUE;
        $this->load->view('header_fe', $pars);
        $this->load->view('kontakt_main_fe',$pars);
        $this->load->view('footer_fe', $pars);
	}
    
    
    public function prosledi_kontakt()
    {
        
        $data = $this->input->post();
        
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Ime', 'trim|required|min_length[2]|max_length[40]|xss_clean');
        $this->form_validation->set_rules('comments', 'Poruka', 'trim|required|min_length[2]|max_length[300]|xss_clean');
        $this->form_validation->set_rules('email', 'Mejl', 'trim|required|valid_email');
        
        $this->form_validation->set_message('required', 'Morate uneti polje %s !');
        $this->form_validation->set_message('valid_email', 'Ovaj %s nije validan!');
        
        if($this->form_validation->run() == FALSE)
        {
        
            $this->load->library('email');

            $this->email->from($data['email'], $data['name']);
            $this->email->to('adam.gicevic@gmail.com'); 
            $this->email->cc( ''); 
            $this->email->bcc(' '); 

            $this->email->subject('Stigla vam je poruka FORC');
            $this->email->message($data['comments']." ".$data['phone']);	

            if($this->email->send())
                print "OK";
        }
        else
        {
            print form_error();
        }
        
        
    }
}
