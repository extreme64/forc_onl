<?php

        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class Tekstovi extends CI_Controller {

                private $t_m;

                function __construct() {
                        parent::__construct();
                        $this->load->model('Tekstovi_cms_model');
                        $this->t_m = new Tekstovi_cms_model();
                        $this->load->model('Meni_model', 'meni_model', TRUE);
                }

                public function index() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $this->load->library('Log_aktivnost_urednika.php');
                        $loga = new Log_aktivnost_urednika();
                        $loga->log('tekstovi pregled');



                        $pars['title'] = "Tekstovi/CMS";
                        $pars['base_url'] = base_url();

                        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);
                        $pars['tekstovi'] = $this->t_m->svi();

                        $this->load->model('Kategorije_cms_model');
                        $kategorije = new Kategorije_cms_model();

                        $kategorije = $kategorije->sve_kategorije_lista();
                        $form_nt_kategorija_opcije = array_merge(array(array("value" => "-1", "text" => "Odabrati kategoriju...")), $kategorije);
                        
                        foreach ($form_nt_kategorija_opcije as $opcija) {
                                $form_dropdown[$opcija['value']] = $opcija['text'];
                        }
                        $pars['form_nt_kategorija_opcije'] = $form_dropdown;

                        //old
                        /*$this->load->view('admin/header_be', $pars);
                        $this->load->view('admin/tekstovi_main_be', $pars);
                        $this->load->view('admin/footer_be', $pars);*/

                        // alpha
                        $this->load->view('admin/alpha/header_oa_alpha_be', $pars);

                        $this->load->view('admin/alpha/main_nav_oa_alpha_be', $pars);
                        $this->load->view('admin/alpha/main_topstuff_oa_alpha_be', $pars);
                        $this->load->view('admin/alpha/tekstovi_main_content_oa_alpha_be', $pars);
                        $this->load->view('admin/alpha/main_activ_oa_alpha_be', $pars);

                        $this->load->view('admin/alpha/footer_oa_alpha_be', $pars);
                }

                public function dodaj_tekst() {
                        $this->load->library('Log_aktivnost_urednika.php');
                        $loga = new Log_aktivnost_urednika();
                        $loga->log('tekstovi dodaj novi');

                        $errs_status = array();
                        print json_encode($this->t_m->sacuvaj($this->input->post()));
                }

                public function obrisi_tekst($id) {
                        if ($id != "" && $id != FALSE)
                                print $this->t_m->obrisi($id);

                        redirect(base_url() . "admin/tekstovi", "refresh");
                }

                public function info_tekst_xcall($id) {
                        $data = array();
                        $data = $this->t_m->tekst_info($id);
                        $timeFormated = formatDatum($data[0]['time']);
                        $data[0]['time'] = $timeFormated;
                        print json_encode($data);
                }

        }

?>
