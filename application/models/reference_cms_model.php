<?php

        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

        Class Reference_cms_model extends CI_Model {

                function __construct() {
                        parent::__construct();
                }

                public function sacuvaj($param) {
                        $nov = $param["nov"];
                        $err = array();

                        if ($nov == "1") {
                                $data = array(
                                    'id_reference' => '',
                                    'name' => $param["inp_naziv"],
                                    'desc' => $param["inp_opis"],
                                    'id_image' => $param["ddl_slika"],
                                    'id_gal' => $param["ddl_galerija"],
                                    'url' => $param["inp_url"],
                                    'video' => $param["inp_video"],
                                    'time' => now(),
                                    'status' => $param["ddl_status"]
                                );

                                $this->db->insert('references', $data);

                                if ($this->db->affected_rows() == 1) {
                                        $data2 = array(
                                            'id' => '',
                                            'id_reference' => $this->db->insert_id(),
                                            'id_service' => $param["ddl_usluga"]
                                        );

                                        $this->db->insert('reference_v_service', $data2);

                                        if ($this->db->affected_rows() == 1) {
                                                return true;
                                        } else {
                                                return false;
                                        }
                                }
                        } else {

                                $data = array(
                                    'name' => $param["inp_naziv"],
                                    'desc' => $param["inp_opis"],
                                    'id_image' => $param["ddl_slika"],
                                    'id_gal' => $param["ddl_galerija"],
                                    'url' => $param["inp_url"],
                                    'video' => $param["inp_video"],
                                    'time' => now(),
                                    'status' => $param["ddl_status"]
                                );
                                $this->db->where('id_reference', $param["inp_id"]);
                                $this->db->update('references', $data);
                                $this->db->limit(1);

                                $data2 = array(
                                    'id_service' => $param["ddl_usluga"]
                                );
                                $this->db->where('id_reference', $param["inp_id"]);
                                $this->db->update('reference_v_service', $data2);

                                return $this->db->last_query(); //$this->db->_error_number();
                        }
                }

                public function obrisi($koid) {
                        /* $tabele = array('users');
                          $this->db->where('id_user', $koid);
                          $this->db->delete($tabele);

                          if($this->db->affected_rows()!=0)
                          return $this->db->affected_rows();
                          else
                          return false; */
                }

                /** */
                public function stranica($id_page) {
                        /* $this -> db -> select(' comments.id_comment, time, text, comments.status, post_v_posttype.id_post, posttype.name as posttype, users.name as autor');
                          $this -> db -> from('comments');
                          $this->db->join('comment_v_post', 'comment_v_post.id_comment = comments.id_comment');
                          $this->db->join('post_v_posttype', 'post_v_posttype.id_post = comment_v_post.id_post');
                          $this->db->join('posttype', 'posttype.id_type = post_v_posttype.id_type');
                          $this->db->join('comment_v_user', 'comment_v_user.id_comment = comments.id_comment');
                          $this->db->join('users', 'users.id_user = comment_v_user.id_user');
                          $this -> db -> where('comments.id_comment', $id_comment);
                          $this -> db -> limit(1);
                         */
                        /*
                          $this->db->select('pages.id_page, name, desc, index, pages.status, url, page_v_page.id_parent');
                          $this->db->from('pages');
                          $this->db->join('page_v_page', 'page_v_page.id_page = pages.id_page');
                          $this->db->where('pages.id_page', $id_page);
                          $this->db->limit(1);
                          $query = $this->db->get();

                          if ($query->num_rows() == 1) {
                          return $query->result_array();
                          } else {
                          return false;
                          } */
                }

                public function sve($id = 0) {
                        $this->db->select(' * ');
                        $this->db->from('references');
                        $this->db->join('reference_v_service', 'references.id_reference = reference_v_service.id_reference');
                        if ($id > 0) {
                                $this->db->where('reference_v_service.id_service', $id);
                        }


                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

                /** */
                public function info($id) {

                        $this->db->select('*');
                        $this->db->from('references');
                        $this->db->join('reference_v_service', 'references.id_reference = reference_v_service.id_reference');
                        $this->db->where('references.id_reference', $id);
                        $this->db->limit(1);
                        $query = $this->db->get();

                        if ($query->num_rows() == 1) {
                                return $query->result_array();
                        } else {
                                return false;
                        }
                }

                public function po_usluzi_broj($id = 0) {

                        $this->db->select('references.id_reference');
                        $this->db->from('references');
                        $this->db->join('reference_v_service', 'references.id_reference = reference_v_service.id_reference');
                        if ($id > 0) {
                                $this->db->where('reference_v_service.id_service', $id);
                        }
                        $query = $this->db->get();

                        return $query->num_rows();
                }

                public function po_usluzi($id = 0, $strana = 1, $po_stranici = 1, $array = true) {


                        $this->db->select('*');
                        $this->db->from('references');
                        $this->db->join('reference_v_service', 'references.id_reference = reference_v_service.id_reference');
                        if ($id > 0) {
                                $this->db->where('reference_v_service.id_service', $id);
                        }
                        $this->db->order_by('references.id_reference', 'desc');
                        $this->db->limit($po_stranici, ($strana - 1) * $po_stranici); //ispravno

                        $query = $this->db->get();

                        if ($array) {
                                return $query->result_array();
                        }
                        return $query->result();
                }

        }
