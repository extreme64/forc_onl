<?php

        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class Strana extends CI_Controller {

                public $vdb;

                function __construct() {
                        parent::__construct();
                        $this->load->helper('url');
                        $this->load->library('virt_db.php');
                        $this->vdb = new Virt_db();
                        $this->load->model('Meni_model', 'meni_model', TRUE);
                }

                public function index() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['base_url'] = base_url();
                        $pars['title'] = "POČETNA";
                        $pars['slajder'] = $this->vdb->virtTekstovi();


                        //dohvatiti tri random posta
                        $this->load->model('Tekstovi_cms_model');
                        $tm = new Tekstovi_cms_model();
                        $r_postovi = $tm->svi();
                        $t1 = rand(0, count($r_postovi) - 1);
                        $t2 = rand(0, count($r_postovi) - 1);
                        $t3 = rand(0, count($r_postovi) - 1);
                        $pars['arr_ids'] = array($r_postovi[$t1], $r_postovi[$t2], $r_postovi[$t3]);



                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();


                        $this->load->view('header_fe', $pars);
                        $this->load->view('generic_main_fe', $pars);
                        $this->load->view('footer_s_fe');
                }

                public function tim() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "TIM";
                        $pars['base_url'] = base_url();
                        $this->load->view('header_fe', $pars);
                        $this->load->view('tim_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }

                public function arhiva() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "ARHIVA";
                        $pars['base_url'] = base_url();
                        $this->load->view('header_fe', $pars);
                        $this->load->view('arhiva_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }

                public function qa() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "PITANJA & ODGOVORI";
                        $pars['base_url'] = base_url();
                        $this->load->view('header_fe', $pars);
                        $this->load->view('qa_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }

        }
