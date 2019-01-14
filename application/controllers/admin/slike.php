<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Slike extends CI_Controller {

    private $sl_m;

    function __construct() {
        parent::__construct();
        $this->load->model('Slike_cms_model');
        $this->sl_m = new Slike_cms_model();

        $this->load->model('Meni_model', 'meni_model', TRUE);
    }




    public function index()
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $pars['title'] = "Slike/CMS";
        $pars['base_url'] = base_url();

        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);
        $pars['slike'] = $this->sl_m->svi();

        $this->load->model('Galerije_cms_model');
        $galerije = new Galerije_cms_model();

        $galerije = $galerije->sve_galerije_lista();

        $form_sl_gal_opcije = array_merge(array(array("value" => "-1", "text" => "Odabrati galeriju..." )) , $galerije); $form_dropdown = array();
        foreach($form_sl_gal_opcije as $opcija){ $form_dropdown[$opcija['value']] = $opcija['text'];}
        $pars['form_sl_gal_opcije'] = $form_dropdown;

        // old
		    // $this->load->view('admin/header_be', $pars);
        // $this->load->view('admin/slike_main_be', $pars);
        // $this->load->view('admin/footer_be', $pars);

        // alpha
        $this->load->view('admin/alpha/header_oa_alpha_be', $pars);

        $this->load->view('admin/alpha/main_nav_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/main_topstuff_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/slike_main_content_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/main_activ_oa_alpha_be', $pars);

        $this->load->view('admin/alpha/footer_oa_alpha_be', $pars);

	}


    public function dodaj_sliku()
    {
        $errs_status = array();
        $files = $_FILES;

        // cuvanje podataka u bazu
        $novi_fajlovi = $this->sl_m->sacuvaj($this->input->post(), $files);


        $this->load->library('upload');
        $err="";
        //za nove slike, $nov==false, obaviti aktivnosti na severu
        if($this->input->post('nov')=="1")
        {

            $cpt = count($_FILES['userfile']['name']);
            for($i=0; $i<$cpt; $i++)
            {
                $_FILES['userfile']['name']= $novi_fajlovi[$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];

                $this->upload->initialize($this->set_upload_options());
                $err = $this->upload->do_upload();
            }

            if(count($errs_status)>0 )
             {}// $this->upload->display_errors() na serveru nije sve proslo kako treba [greske/false]

        }

        // poslati nazad feedback
        print json_encode(array("server" => $err, "baza" => $novi_fajlovi));
    }



    private function set_upload_options()
    {
      $config['upload_path'] = $this->sl_m->upload_dir_path;
  		$config['allowed_types'] = 'gif|jpg|png';
  		$config['max_size']	= '7000000';
  		$config['max_width']  = '2024';
  		$config['max_height']  = '1768';
      return $config;
    }



    public function obrisi_sliku($id)
	{
        if($id!="" && $id!=FALSE)
            print $this->sl_m->obrisi($id);

        redirect(base_url()."admin/slike", "refresh");
	}

    public function info_slika_xcall($id)
    {

        print json_encode($this->sl_m->slika_info($id));
    }



    public function sve($limit=10)
	{
        print json_encode(array("slike" => $pars['slike'] = $this->sl_m->svi($limit)));
    }

}

?>
