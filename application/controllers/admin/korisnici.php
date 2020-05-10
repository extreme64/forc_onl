<?php

        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class Korisnici extends CI_Controller {

                private $k_model;

                function __construct() {
                        parent::__construct();
                        $this->load->helper('date');
                        $this->load->helper('url');
                        $this->load->model('Korisnik_cms_model');
                        $this->k_model = new Korisnik_cms_model();

                        $this->load->model('Meni_model', 'meni_model', TRUE);
                }

                public function index() {
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();

                        $pars['title'] = "Korisnici/CMS";
                        $pars['base_url'] = base_url();
                        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);

                        $this->load->model('Korisnik_cms_model');
                        $users = new Korisnik_cms_model();
                        $pars['korisnici'] = $users->svi();
                        $this->load->model('Uloge_cms_model');
                        $uloge = new Uloge_cms_model();

                        $form_nk_tip_opcije = array_merge(array(array("value" => "-1", "text" => "Odabrati tip...")), $uloge->sve());
                        $form_dropdown = array();
                        foreach ($form_nk_tip_opcije as $opcija) {
                                $form_dropdown[$opcija['value']] = $opcija['text'];
                        }
                        $pars['form_nk_tip_opcije'] = $form_dropdown;

                        $this->load->view('admin/header_be', $pars);
                        $this->load->view('admin/korisnici_main_be', $pars);
                        $this->load->view('admin/footer_be', $pars);
                }

                public function dodaj_korisnika() {
                        print json_encode($this->k_model->sacuvaj($this->input->post()));
                }

                public function obrisi_korisnika($koid) {
                        if ($koid != "" && $koid != FALSE) {
                                $pars['title'] = "Obrisi - Korisnici/CMS";
                                $pars['base_url'] = base_url();
                                $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);

                                $this->load->model('Korisnik_cms_model');
                                $users = new Korisnik_cms_model();

                                print $users->obrisi($koid);
                        }
                        redirect(base_url() . "admin/korisnici", "refresh");
                }

                public function info_korisnika_xcall($id) {
                        print json_encode($this->k_model->user_info($id));
                }

        }

?>