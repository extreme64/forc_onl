<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Registracija extends CI_Controller {

    public $vdb;

    function __construct() {

        parent::__construct();
        $this->load->model('Korisnik_model', 'korisnik_model', TRUE);
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->load->model('Meni_model', 'meni_model', TRUE);
        //$this->status = $this->config->item('status');
        //$this->roles = $this->config->item('roles');

        $this->load->helper('url');
        $this->load->library('virt_db.php');
        $this->vdb = new Virt_db();
    }

	public function index()
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $pars['base_url'] = base_url();
        $pars['title'] = "REGISTRACIJA";
        $pars['slajder'] = $this->vdb->virtTekstovi();

        $pars['mejlslanjestatus'] = '';
		$this->load->view('header_fe', $pars);
        $this->load->view('registracija_main_fe',$pars);
        $this->load->view('footer_fe');
	}

    public function registruj()
    {
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();


        $pars['base_url'] = base_url();
        $pars['title'] = "REGISTRACIJA";
        $pars['slajder'] = $this->vdb->virtTekstovi();

        $pars['mejlslanjestatus'] = '';

		$this->form_validation->set_rules('nalog', 'Nalog',  'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('lozinka', 'Lozinka',  'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('mejl', 'Mejl',  'trim|required|valid_email');


         $this->load->view('header_fe', $pars);

        if ($this->form_validation->run() == FALSE) {
            echo "asdasdsadsd";
            $this->load->view('registracija_main_fe',$pars);


        }else{

            if($this->korisnik_model->jeDuplikat($this->input->post('mejl'))){
                $this->session->set_flashdata('flash_message', 'Korisnik već napravljen u bazi !!!');
                redirect(base_url().'logovanje/');
            }else{

                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                $vc_enc = md5(rand(100000,500000));
                $id = $this->korisnik_model->dodaj($clean, $vc_enc);


                $message = ''.$id." ";
                $message .= '<strong>Otvorili ste nalog</strong><br>';
                $message .= '<strong>Poslata poruka na adresu:</strong> ' .$this->input->post('mejl');
                $pars['message'] =  $message;


                $poruka_mejla = 'Kliknite na link ispod kako bi ste aktivirali nalog.<br />'.base_url().'registracija/verifikacijaID/' . $vc_enc . '<br />Hvala';
                if(!$this->posaljiPotvrdu($this->input->post('mejl'), $poruka_mejla)){

                    // $this->email->print_debugger();
                    $pars['mejlslanjestatus'] = 'false';
                    $this->load->view('registracija_main_fe',$pars);
                }
                else
                {
                    $this->load->view('potvrda_registracija_main_fe', $pars);
                }

            };
        }
         $this->load->view('footer_fe');
    }



    //send verification email to user's email id
    function posaljiPotvrdu($mejl, $poruka_mejla)
    {


        $od =  'registracija_neodgovarati@forwardc.com';
        $naslov = 'Verifikujte vašu mejl adresu';


        //konfiguracija
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.mydomain.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $od;
        $config['smtp_pass'] = '********'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes

        $this->email->initialize($config);

        //slanje

        $this->email->from($od, 'forward c');
        $this->email->to($mejl);

        $this->email->subject($naslov);
        $this->email->message($poruka_mejla);


        //@$this->email->send();
        return $this->email->send();
        //return true;
    }

    //activate user account
    function verifikacijaID($kljuc)
    {
        $data = array('status' => 1);
        $this->db->where('vecod', $kljuc);

        return $this->db->update('user', $data);
    }




}


?>