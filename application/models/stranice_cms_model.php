<?php

        Class Stranice_cms_model extends CI_Model {

                function __construct() {
                        parent::__construct();
                }

                public function sacuvaj($stranica) {

                        $nov = $stranica["nov"];
                        $err = array();

                        if ($nov == "1") {
                                $data = array(
                                    'id_page' => '',
                                    'name' => $stranica["inp_naziv"],
                                    'status' => $stranica["ddl_status"],
                                    'desc' => $stranica["inp_opis"],
                                    'url' => $stranica["inp_url"],
                                    'index' => $stranica["inp_index"]
                                );

                                $this->db->insert('pages', $data);

                                if ($this->db->affected_rows() == 1) {
                                        $data2 = array(
                                            'id' => '',
                                            'id_page' => $this->db->insert_id(),
                                            'id_parent' => $stranica["ddl_parent"]
                                        );

                                        $this->db->insert('page_v_page', $data2);

                                        if ($this->db->affected_rows() == 1) {
                                                return true;
                                        } else {
                                                return false;
                                        }
                                } else {
                                        return false;
                                }
                        } else {
                                $pageid = $stranica["inp_sid"];
                                if ($pageid != "") {

                                        $this->db->select('index')->from('pages')->where('id_page', $pageid);
                                        $q = $this->db->get();
                                        $r = $q->result_array();
                                        $old_index = $r[0]['index'];
                                        $shift = 0;
                                        $new_index = $stranica["inp_index"];
                                        // u kom smeru da modifikujemo indekse stranica koji su izmedju novog i starog indeksa
                                        ($new_index > $old_index) ? $shift = -1 : $shift = +1;

                                        $this->db->select('id_page, index');
                                        $this->db->from('pages');
                                        if ($new_index > $old_index) {
                                                $this->db->where(" pages.index BETWEEN $old_index AND $new_index", NULL, false);
                                        } else {
                                                $this->db->where(" pages.index BETWEEN $new_index AND $old_index", NULL, false);
                                        }
                                        $query = $this->db->get();

                                        foreach ($query->result_array() as $row) {
                                                $dataUpdate = array('index' => $row['index'] + $shift);
                                                $this->db->where('id_page', $row['id_page']);
                                                $this->db->update('pages', $dataUpdate);
                                                $this->db->limit(1);
                                                $er_n = $this->db->_error_number();
                                        }
                                        if ($er_n != 0) {
                                                return $er_n;
                                        }

                                        $data = array(
                                            'name' => $stranica["inp_naziv"],
                                            'status' => $stranica["ddl_status"],
                                            'desc' => $stranica["inp_opis"],
                                            'url' => $stranica["inp_url"],
                                            'index' => $stranica["inp_index"]
                                        );
                                        $this->db->where('id_page', $pageid);
                                        $this->db->update('pages', $data);
                                        $this->db->limit(1);

                                        $data2 = array(
                                            'id_parent' => $stranica["ddl_parent"]
                                        );
                                        $this->db->where('id_page', $pageid);
                                        $this->db->update('page_v_page', $data2);

                                        return $this->db->_error_number();
                                } else {
                                        return false;
                                }
                                //} else
                                // return false;
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
                        }
                }

                public function sve() {
                        $this->db->select(' pages.id_page, name, pages.status');
                        $this->db->from('pages');
                        //$this->db->join('comment_v_post', 'comment_v_post.id_comment = comments.id_comment');
                        $this->db->limit(15);

                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

                public function top_stranice($exclude = array()) {
                        $this->db->select(' pages.id_page, name, pages.status');
                        $this->db->from('pages');
                        $this->db->join('page_v_page', 'page_v_page.id_page = pages.id_page');
                        $this->db->where('page_v_page.id_parent', 0);
                        foreach ($exclude as $e_id) {
                                $this->db->where('page_v_page.id_parent', 0);
                        }

                        //$this->db->join('comment_v_post', 'comment_v_post.id_comment = comments.id_comment');


                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

        }

?>