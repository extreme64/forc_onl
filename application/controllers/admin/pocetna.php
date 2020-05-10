<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pocetna extends CI_Controller {

    public $vdb;
    private $log_obj;

    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->library('virt_db.php');
        $this->vdb = new Virt_db();

        $this->load->library('Log_aktivnost_urednika.php');
        $this->log_obj = new Log_aktivnost_urednika();


        $this->load->model('Meni_model', 'meni_model', TRUE);
    }


	public function index()
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $pars['title'] = "CMS ";
        $pars['base_url'] = base_url();
        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);

		    $this->load->view('admin/header_be', $pars);
        $this->load->view('admin/main_be', $pars);
        $this->load->view('admin/footer_be', $pars);

        // log user activity
        $this->log_obj->log('pocetna pregled');

	}

  // test page with new css layout and style 'oneadmin' http://corpthemes.com/html/oneadmin/?storefront=envato-elements#
  public function alpha()
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $pars['title'] = "CMS New Alpha";
        $pars['base_url'] = base_url();
        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);

        // alpha
        $this->load->view('admin/alpha/header_oa_alpha_be', $pars);

        $this->load->view('admin/alpha/main_nav_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/main_topstuff_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/main_content_oa_alpha_be', $pars);
        $this->load->view('admin/alpha/main_activ_oa_alpha_be', $pars);

        $this->load->view('admin/alpha/footer_oa_alpha_be', $pars);


        // log user activity
        $this->log_obj->log('pocetna pregled');

	}

    /** function log()
     * pregled loga aktivnosti
     */
    public function log()
	{
        $mm =  new Meni_model();
        $pars['stavke_menija_rasporedjene'] = $mm->sve();

        $pars['title'] = "CMS ";
        $pars['base_url'] = base_url();
        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);

        $dump = explode(Log_aktivnost_urednika::$SEPARATOR , $this->log_obj->log_pregled());
        $logs = array();
        foreach($dump as $entry)
        {
            $ee = explode( "|", $entry);
            @$logs[] = array("user" => $ee[0], "uid" => $ee[1], "date" => $ee[2], "action" => $ee[3] );
        }


        $pars['arr_log'] = $logs;
		    $this->load->view('admin/header_be', $pars);
        $this->load->view('admin/main_log_be', $pars);
        $this->load->view('admin/footer_be', $pars);

        $this->log_obj->log('log pregled');
	}

}


?>
