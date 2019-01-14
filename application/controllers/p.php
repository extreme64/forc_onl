<?php

        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class P extends CI_Controller {

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
                        $pars['title'] = "Home";
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

                        if (isset($_GET['s'])) {
                                $this->load->helper('text');
                                $this->load->model('Pretraga_model');
                                $pretr_mod = new Pretraga_model();
                                $pars['upit'] = $_GET['s'];
                                $pars['search_posts'] = $pretr_mod->blog($pars['upit']);
                                $pars['search_references'] = $pretr_mod->reference($pars['upit']);
                                $pars['search_services'] = $pretr_mod->usluge($pars['upit']);
                                $pars['search_pages'] = $pretr_mod->stranice($pars['upit']);
                                $pars['search_tags'] = $pretr_mod->tagovi($pars['upit']);



                                $this->load->view('search_main_fe', $pars);
                        } else {
                                $this->load->view('generic_main_fe', $pars);
                        }

                        $this->load->view('footer_s_fe');
                }

                public function idea() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "Idea";
                        $pars['base_url'] = base_url();
                        $this->load->view('header_fe', $pars);
                        $this->load->view('idea_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }


                public function about() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "About";
                        $pars['base_url'] = base_url();
                        $this->load->view('header_fe', $pars);
                        $this->load->view('about_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }

                public function qa() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "Q & A";
                        $pars['base_url'] = base_url();
                        $this->load->view('header_fe', $pars);
                        $this->load->view('qa_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }

                  public function team() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "Team";
                        $pars['base_url'] = base_url();
                        $this->load->view('header_fe', $pars);
                        $this->load->view('tim_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }

        }
