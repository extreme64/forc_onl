<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Galerije extends CI_Controller {

    private $gal_m;

    function __construct() {
        parent::__construct();
        $this->load->model('Galerije_cms_model');
        $this->gal_m = new Galerije_cms_model();

        $this->load->model('Meni_model', 'meni_model', TRUE);
    }




    public function index()
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $this->load->library('Log_aktivnost_urednika.php');
        $loga = new Log_aktivnost_urednika();
        $loga->log('galerije pregled');


        $pars['title'] = "Galerije/CMS";
        $pars['base_url'] = base_url();

        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);
        $pars['galerije'] = $this->gal_m->svi();


        // old
	      // $this->load->view('admin/header_be', $pars);
        // $this->load->view('admin/galerije_main_be', $pars);
        // $this->load->view('admin/footer_be', $pars);

        // alpha
        $this->load->view('admin/alpha/header_oa_alpha_be', $pars);

        $this->load->view('admin/alpha/main_nav_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/main_topstuff_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/galerije_main_content_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/main_activ_oa_alpha_be', $pars);

        $this->load->view('admin/alpha/footer_oa_alpha_be', $pars);


	}


    public function dodaj_galeriju()
    {
        $errs_status = array();
        print json_encode($this->gal_m->sacuvaj($this->input->post()));

    }



    public function obrisi_galeriju($id)
	{
        if($id!="" && $id!=FALSE)
            print $this->gal_m->obrisi($id);

        redirect(base_url()."admin/galerije", "refresh");

	}

    public function info_galerija_xcall($id)
    {

        print json_encode($this->gal_m->galerija_info($id));
    }

    public function slike_iz_galerije($gid=-1)
    {
        // slučaj da li je pozvano putem slanja forme ili ajax poziv
        $post = $this->input->post();
        $filter = $post["gid"];

        if( ( $post["gid"]=="" || (!isset($post)) ) && $gid != -1)
            $filter = $gid;

        $this->load->model('Slike_cms_model');
        $slike_cms_model = new Slike_cms_model();
        print json_encode(array("data" => $slike_cms_model->grupa($filter)));
        //}


    }

    // vraca listu galerija
    public function lista_naziva()
    {
        print json_encode(array("data" => $this->gal_m->sve_galerije_lista() ));
    }

    public function sve_galerije($flag)
    {
        print json_encode(array("data" => $this->gal_m->svi($this->input->post(), $flag) ));
    }

    public function akcije_galerije()
    {
        print json_encode( array("data" => $this->gal_m->izmena_sadrzaja(   $this->input->post("selected"),
                                                                            $this->input->post("target"),
                                                                            $this->input->post("action")    )));
    }
}


?>
