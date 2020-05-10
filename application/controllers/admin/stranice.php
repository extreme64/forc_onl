<?php

        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class Stranice extends CI_Controller {

                private $s_model;

                function __construct() {
                        parent::__construct();
                        $this->load->helper('date');
                        $this->load->helper('url');
                        $this->load->library('virt_db.php');

                        $this->load->model('Stranice_cms_model');
                        $this->s_model = new Stranice_cms_model();

                        $this->load->library('Log_aktivnost_urednika.php');

                        $this->load->model('Meni_model', 'meni_model', TRUE);
                }

                public function index() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "Stranice/CMS";
                        $pars['base_url'] = base_url();
                        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);

                        /* ucitavamo model, da bi smo dobili sve stranice */
                        $this->load->model('Stranice_cms_model');
                        $pages = new Stranice_cms_model();
                        $pars['pages'] = $pages->sve(); // metod vraca stranice iz baze

                        $pars['top_pages'] = $pages->top_stranice();


                        $this->load->view('admin/header_be', $pars);

                        $this->load->view('admin/stranice_be', $pars);
                        $this->load->view('admin/footer_be', $pars);

                        $loga = new Log_aktivnost_urednika();
                        $loga->log('stranice pregled');
                }

                public function stranica_info($id_page) {
                        print json_encode($this->s_model->stranica($id_page));
                }

                public function dodaj_stranicu() {
                        $errs_status = array();
                        print json_encode(array("greska" => $this->s_model->sacuvaj($this->input->post())));
                }

        }

?>