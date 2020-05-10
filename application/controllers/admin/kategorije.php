<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Kategorije extends CI_Controller {

    private $kat_m;

    function __construct() {
        parent::__construct();
        $this->load->model('Kategorije_cms_model');
        $this->kat_m = new Kategorije_cms_model();

        $this->load->model('Meni_model', 'meni_model', TRUE);
    }




    public function index()
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $this->load->library('Log_aktivnost_urednika.php');
        $loga = new Log_aktivnost_urednika();
        $loga->log('kategorije pregled');


        $pars['title'] = "Kategorije/CMS";
        $pars['base_url'] = base_url();

        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);
        $pars['kategorije'] = $this->kat_m->svi();


        // old
		    // $this->load->view('admin/header_be', $pars);
        // $this->load->view('admin/kategorije_main_be', $pars);
        // $this->load->view('admin/footer_be', $pars);

        // alpha
        $this->load->view('admin/alpha/header_oa_alpha_be', $pars);

        $this->load->view('admin/alpha/main_nav_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/main_topstuff_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/kategorije_main_content_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/main_activ_oa_alpha_be', $pars);

        $this->load->view('admin/alpha/footer_oa_alpha_be', $pars);

	}


  public function dodaj_kategoriju()
	{
    print json_encode($this->kat_m->sacuvaj($this->input->post()));
  }


  public function obrisi_kategoriju($kaid)
	{
    if($kaid!="" && $kaid!=FALSE)
      print $this->kat_m->obrisi($kaid);

    redirect(base_url()."admin/kategorije", "refresh");
	}

  public function info_kategorija_xcall($id)
  {
    print json_encode($this->kat_m->kategorija_info($id));
  }
}


?>
