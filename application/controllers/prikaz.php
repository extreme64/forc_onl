<?php

        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class Prikaz extends CI_Controller {

                public $vdb;

                function __construct() {
                        parent::__construct();
                        $this->load->helper('url');
                        $this->load->library('virt_db.php');
                        $this->vdb = new Virt_db();

                        $this->load->model('Meni_model', 'meni_model', TRUE);
                        $this->load->model('Usluge_model', 'usluge_model', TRUE);
                }

                public function index() {

                        
                }
 
 
 
                   public function category($kid = "1", $page = "1") {

                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();


                        $pars['kaid'] = $kid;
                        $this->load->model('Tekstovi_cms_model');
                        $tm = new Tekstovi_cms_model();



                        $this->load->model('Kategorije_cms_model');
                        $km = new Kategorije_cms_model();
                        $pars['kategorije'] = $km->sve_kategorije_lista();

                        $title = $km->kategorija_info($kid);

                        $pars['title'] = "BLOG >> " . $title[0]['title'];
                        $pars['base_url'] = base_url();
                        //$ts = $this->vdb->virtTekstovi();

                        $po_stranici = 12;
                        $pars['broj_postova_kategorije'] = $tm->broj_u_kategorije($kid);
                        $pars['tekstovi'] = $tm->svi_iz_kategorije($kid, $page);
                        $pars['tekstovi_stranice'] = $tm->stranica_iz_kategorije($kid, $page, $po_stranici);

                        $ukupno = count($pars['tekstovi']);

                        $pars['broj_stranica'] = ceil($ukupno / $po_stranici);


                        $this->load->view('header_fe', $pars);
                        //print_r($pars['tekstovi_stranice']);
                        $this->load->view('kategorija_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }
                
      }
