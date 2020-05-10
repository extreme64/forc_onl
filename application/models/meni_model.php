<?php

        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class Meni_model extends CI_Model {

                public function index() {
                        redirect();
                }

                public function sve() {
                        //dohvati niz sa stranicama
                        $this->db->select('*')->from('pages')->join('page_v_page', 'pages.id_page = page_v_page.id_page');
                        $this->db->where(" status = 1 AND (id_parent = 0 OR `id_parent` IN (SELECT `id_page` FROM (`pages`) WHERE `pages`.`status`= 1  )) ", NULL, false); // samo deca ciji su roditelji sa statusom 1, u suprotnom nema poente ih uzmimati iz baze
                        $this->db->order_by('index', 'ASC');

                        $res = $this->db->get();

                        $broj_stranica_menija = $res->num_rows();
                        $array_stranice = array($broj_stranica_menija);

                        $tmp_childs = array();
                        if ($broj_stranica_menija > 0) {

                                foreach ($res->result_array() as $s) {
                                        // jeste top stranica nema decu
                                        if ($s['id_parent'] == 0) {
                                                $s['deca'] = array();
                                                $array_stranice[$s['id_page']] = $s;
                                        } else {
                                                $tmp_childs[] = $s; //deca idu ovde da bi ih kasnije rasporedili uz roditelje
                                        }
                                }


                                foreach ($tmp_childs as $child) {
                                        // svako dete dodati u niz rotitelja
                                        $array_stranice[$child['id_parent']]['deca'][] = $child;
                                }


                                return $array_stranice;
                        }
                }

        }
