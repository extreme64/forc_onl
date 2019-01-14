<?php

        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

            
        /** class D - display pages */
        class D extends CI_Controller {

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

                public function production($id = 0, $page = 1){
                        $pars['title'] = "PRODUCTION";
                        $pars['base_url'] = base_url();


                        $this->load->model('Usluge_cms_model');
                        $usluge = new Usluge_cms_model();
                        $pars['usluge'] = $usluge->sve();

                        $this->load->model('Reference_cms_model');
                        $reference = new Reference_cms_model();
                        if ($id == 0) {
                                $pars['reference'] = $reference->sve($id);
                                $po_stranici = 2;
                                $ukupno = $reference->po_usluzi_broj($id);
                                $pars['broj_stranica'] = ceil($ukupno / $po_stranici); // sada znamo za ispis UI
                                //dohvatamo ref. za trazenu stranicu
                                $pars['reference'] = $reference->po_usluzi($id, $page, $po_stranici, false);
                                $pars['sid'] = $id;
                        } else {
                                $po_stranici = 2;
                                $ukupno = $reference->po_usluzi_broj($id);
                                $pars['broj_stranica'] = ceil($ukupno / $po_stranici); // sada znamo za ispis UI
                                //dohvatamo ref. za trazenu stranicu

                                $pars['reference'] = $reference->po_usluzi($id, $page, $po_stranici, false);
                                $pars['sid'] = $id;
                        }



                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();


                        $this->load->view('header_fe', $pars);
                        $this->load->view('reference_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                } 






                /** stranice za prikaz referenci i  jedne samostalne reference */
                // public function concepts($id = 0, $page = 1) {
                public function concepts($id = -1) {
                
                        $pars['title'] = "CONCEPTS ";
                        $pars['base_url'] = base_url();

                        //$pars['usluge'] = $this->vdb->virtUsluge();

                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();


                        $this->load->view('header_fe', $pars);

                        $um = new Usluge_model();

                        if ($id == -1) {
                                $pars['usluge_top'] = $um->top();
                                $this->load->view('usluge_main_fe', $pars);
                        } else if ($id > 0) {

                                $pars['usluga_info'] = $um->usluga($id);
                                //$pars['parent_info'] = $um->usluga($pars['usluga_info']->id_parent);
                                $pars['usluge_sub'] = $um->deca($id);
                                $this->load->view('usluge_pod_main_fe', $pars);
                        }

                        $this->load->view('footer_fe', $pars);
                
                
                       /* $pars['title'] = "REFERENCE";
                        $pars['base_url'] = base_url();


                        $this->load->model('Usluge_cms_model');
                        $usluge = new Usluge_cms_model();
                        $pars['usluge'] = $usluge->sve();

                        $this->load->model('Reference_cms_model');
                        $reference = new Reference_cms_model();
                        if ($id == 0) {
                                $pars['reference'] = $reference->sve($id);
                                $po_stranici = 2;
                                $ukupno = $reference->po_usluzi_broj($id);
                                $pars['broj_stranica'] = ceil($ukupno / $po_stranici); // sada znamo za ispis UI
                                //dohvatamo ref. za trazenu stranicu
                                $pars['reference'] = $reference->po_usluzi($id, $page, $po_stranici, false);
                                $pars['sid'] = $id;
                        } else {
                                $po_stranici = 2;
                                $ukupno = $reference->po_usluzi_broj($id);
                                $pars['broj_stranica'] = ceil($ukupno / $po_stranici); // sada znamo za ispis UI
                                //dohvatamo ref. za trazenu stranicu

                                $pars['reference'] = $reference->po_usluzi($id, $page, $po_stranici, false);
                                $pars['sid'] = $id;
                        }



                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();


                        $this->load->view('header_fe', $pars);
                        $this->load->view('reference_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);*/
                }

                public function concept($id = "") {


                        $this->load->model('Reference_cms_model');
                        $referenca = new Reference_cms_model();
                        $pars['referenca'] = $referenca->info($id);

                        $pars['title'] = $pars['referenca'][0]['name'];

                        $this->load->model('Slike_cms_model');
                        $slika = new Slike_cms_model();
                        $pars['slika'] = $slika->slika_info($pars['referenca'][0]['id_image']);
                        $pars['slike_galerije'] = $slika->grupa($pars['referenca'][0]['id_gal']);

                        $this->load->model('Galerije_cms_model');
                        $galerija = new Galerije_cms_model();
                        $pars['galerija'] = $galerija->galerija_info($pars['referenca'][0]['id_gal']);

                        $pars['base_url'] = base_url();

                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $this->load->view('header_fe', $pars);
                        $this->load->view('referenca_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }

                /* # */

                public function tools($id = -1) {
                        $pars['title'] = "TOOLS ";
                        $pars['base_url'] = base_url();

                        //$pars['usluge'] = $this->vdb->virtUsluge();

                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();


                        $this->load->view('header_fe', $pars);

                        $um = new Usluge_model();

                        if ($id == -1) {
                                $pars['usluge_top'] = $um->top();
                                $this->load->view('usluge_main_fe', $pars);
                        } else if ($id > 0) {

                                $pars['usluga_info'] = $um->usluga($id);
                                //$pars['parent_info'] = $um->usluga($pars['usluga_info']->id_parent);
                                $pars['usluge_sub'] = $um->deca($id);
                                $this->load->view('usluge_pod_main_fe', $pars);
                        }

                        $this->load->view('footer_fe', $pars);
                }

                /** kategorija i jedan unos iz kategorije */
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

                public function article($tid) {

                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $this->load->library('komentari.php');
                        if (!class_exists('Komentari')) {
                                require_once('komentari_old.php');
                        }
                        $c = new Komentari();

                        $pars['tid'] = $tid;
                        $pars['title'] = "/: " . $tid;
                        $pars['base_url'] = base_url();
                        //$t = $this->vdb->virtTekstovi();
                        //$pars['tekst'] = $t['kat1'][$tid];

                        $this->load->model('Tekstovi_cms_model');
                        $tm = new Tekstovi_cms_model();
                        $pars['tekst'] = $tm->tekst_info($tid);

                        $this->load->model('Komentari_cms_model', 'komentari_cms_model', TRUE);
                        $km = new Komentari_cms_model();
                        $pars['komentari'] = $km->svi($tid);


                        $this->load->view('header_fe', $pars);
                        $this->load->view('tekst_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }

                /** # */

                /** pretraga */
                public function search($upit = "") {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $uStrSS = str_replace('%20', ' ', $upit);
                        $pars['title'] = "Search: " . $uStrSS;
                        $pars['base_url'] = base_url();
                        $this->load->view('header_fe', $pars);
                        $this->load->view('generic_main_fe', $pars);
                        $this->load->view('footer_fe', $pars);
                }

        }

        /* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */