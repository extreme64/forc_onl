<?php

        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

        /**
         *
         * @author Mastermind
         */
        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class Reference extends CI_Controller {

                private $r_model;
                private $s_model;
                private $g_model;
                private $u_model;

                function __construct() {
                        parent::__construct();
                        $this->load->helper('date');
                        $this->load->helper('url');

                        $this->load->model('Reference_cms_model');
                        $this->r_model = new Reference_cms_model();

                        $this->load->model('Slike_cms_model');
                        $this->load->model('Galerije_cms_model');
                        $this->load->model('Usluge_cms_model');
                        $this->s_model = new Slike_cms_model();
                        $this->g_model = new Galerije_cms_model();
                        $this->u_model = new Usluge_cms_model();


                        $this->load->library('Log_aktivnost_urednika.php');

                        $this->load->model('Meni_model', 'meni_model', TRUE);
                }

                public function index() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "Reference/CMS";
                        $pars['base_url'] = base_url();
                        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);

                        $pars['reference'] = $this->r_model->sve();


                        $slike_a = array_merge(array(array("value" => "0", "text" => "Odabrati sliku...")), $this->s_model->ddl());
                        $ddl_slike = array();
                        foreach ($slike_a as $opcija) {
                                $ddl_slike[$opcija['value']] = $opcija['text'];
                        }
                        $pars['slike_ddl'] = $ddl_slike;


                        $galerije_a = array_merge(array(array("value" => "0", "text" => "Odabrati galeriju...")), $this->g_model->ddl());
                        $ddl_galerije = array();
                        foreach ($galerije_a as $opcija) {
                                $ddl_galerije[$opcija['value']] = $opcija['text'];
                        }
                        $pars['galerije_ddl'] = $ddl_galerije;


                        $usluge_a = array_merge(array(array("value" => "0", "text" => "Kome pripada...")), $this->u_model->ddl());
                        $usluge_ddl = array();
                        foreach ($usluge_a as $opcija) {
                                $usluge_ddl[$opcija['value']] = $opcija['text'];
                        }
                        $pars['usluge_ddl'] = $usluge_ddl;


                        $this->load->view('admin/header_be', $pars);

                        $this->load->view('admin/reference_be', $pars);
                        $this->load->view('admin/footer_be', $pars);

                        $loga = new Log_aktivnost_urednika();
                        $loga->log('reference pregled');
                }

                public function stranica_info($id_page) {
                        //print json_encode($this->s_model->stranica($id_page));
                }

                public function dodaj() {
                        $errs_status = array();
                        print json_encode(array("greska" => $this->r_model->sacuvaj($this->input->post())));
                }

                public function info_referenca_xcall($id) {

                        print json_encode($this->r_model->info($id));
                }

        }
