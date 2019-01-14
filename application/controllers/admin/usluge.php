<?php

        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class Usluge extends CI_Controller {

                private $stz_m;

                function __construct() {
                        parent::__construct();
                        $this->load->model('Usluge_cms_model');
                        $this->stz_m = new Usluge_cms_model();

                        $this->load->model('Meni_model', 'meni_model', TRUE);
                }

                public function index() {

                        $pars['title'] = "Usluge/CMS";
                        $pars['base_url'] = base_url();
                        $mm = new Meni_model();
                        $pars['stavke_menija_rasporedjene'] = $mm->sve();
                        $pars['sub_menu'] = $this->load->view('admin/sub_menu_be', $pars, TRUE);

                        $pars['usluge'] = $this->stz_m->sve();


                        // $this->load->view('admin/header_be', $pars);
                        // $this->load->view('admin/usluge_main_be', $pars);
                        // $this->load->view('admin/footer_be', $pars);

                        // alpha
                        $this->load->view('admin/alpha/header_oa_alpha_be', $pars);

                        $this->load->view('admin/alpha/main_nav_oa_alpha_be', $pars);
                        $this->load->view('admin/alpha/main_topstuff_oa_alpha_be', $pars);
                        $this->load->view('admin/alpha/usluge_main_content_oa_alpha_be', $pars);
                        $this->load->view('admin/alpha/main_activ_oa_alpha_be', $pars);

                        $this->load->view('admin/alpha/footer_oa_alpha_be', $pars);


                }

                public function dodaj_uslugu() {

                        print json_encode($this->stz_m->sacuvaj($this->input->post()));
                }

                public function obrisi_uslugu($id) {
                        if ($id != "" && $id != FALSE) {
                                print $this->stz_m->obrisi($id);
                        }
                        redirect(base_url() . "admin/usluge", "refresh");
                }

                public function info_usluga_xcall($id) {

                        print json_encode($this->stz_m->usluga_info($id));
                }

                public function service_parent_options_xcall($id = -1) {

                        print json_encode(array('id_parent' => $this->stz_m->usluga_info($id), 'ddl_options' => $this->stz_m->service_parent_options($id)));
                }

        }
