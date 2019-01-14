<?php

        Class Tekstovi_cms_model extends CI_Model {

                public $upload_dir_path;

                function __construct() {
                        parent::__construct();
                }

                public function sacuvaj($post) {

                        $nov = $post["nov"];
                        $err = array();


                        if ($nov == "1") {
                                $data = array(
                                    'post_id' => '',
                                    'title' => $post['inp_title2'],
                                    'text' => $post['inp_text2'],
                                    'status' => $post['ddl_status2'],
                                    'time' => time()
                                );
                                $this->db->insert('posts', $data);
                                $id_last_post = $this->db->insert_id();

                                if ($this->db->affected_rows() == 1) {
                                        $data2 = array(
                                            'id' => '',
                                            'id_post' => $id_last_post,
                                            'id_cat' => $post['ddl_kategorija2'],
                                        );

                                        $this->db->insert('post_v_cat', $data2);
                                        if ($this->db->affected_rows() == 1) {
                                                $data3 = array(
                                                    'id' => '',
                                                    'post_id' => $id_last_post,
                                                    'user_id' => $this->session->userdata('id_user')
                                                );

                                                $this->db->insert('post_v_user', $data3);
                                                if ($this->db->affected_rows() == 1)
                                                        return array("feedback" => true);
                                                else
                                                        return array("feedback" => false);
                                        } else
                                                return array("feedback" => false);
                                } else
                                        return array("feedback" => false);
                        }
                        else {

                                $tid = $post["inp_postid"];
                                if ($tid != "") {
                                        $data1 = array(
                                            'title' => $post['inp_title'],
                                            'text' => $post['inp_text'],
                                            'status' => $post['ddl_status']
                                        );
                                        $this->db->where('post_id', $tid);
                                        $this->db->update('posts', $data1);
                                        $this->db->limit(1);

                                        if ($this->db->affected_rows() == 1 || true) {
                                                $data2 = array('id_cat' => $post['ddl_kategorija']);
                                                $this->db->where('post_v_cat.id_post', $tid);
                                                $this->db->update('post_v_cat', $data2);
                                                $this->db->limit(1);
                                                if ($this->db->affected_rows() == 1)
                                                        return array("feedback" => true);
                                                else
                                                        return array("feedback" => "nepromenjeno");
                                        } else
                                                return array("feedback" => "nepromenjeno");
                                } else
                                        return array("feedback" => false);
                        }
                }

                public function obrisi($sid) {
                        $tabele = array('posts');
                        $this->db->where('post_id', $sid);
                        $this->db->delete($tabele);


                        if ($this->db->affected_rows() != 0)
                                return $this->db->affected_rows();
                        else
                                return false;
                }

                public function tekst_info($id) {
                        $this->db->select(' posts.post_id, posts.time, posts.title, text, posts.status, users.id_user, users.name AS autor, cats.id_cat AS id_kategorija, cats.title AS kategorija, cats.type AS ktip');
                        $this->db->from('posts');
                        $this->db->join('post_v_user', ' post_v_user.post_id = posts.post_id ');
                        $this->db->join('users', ' users.id_user = post_v_user.user_id');
                        $this->db->join('post_v_cat', ' post_v_cat.id_post = posts.post_id ');
                        $this->db->join('cats', ' cats.id_cat = post_v_cat.id_cat');
                        $this->db->where('posts.post_id', $id);
                        $this->db->limit(1);

                        $query = $this->db->get();

                        if ($query->num_rows() == 1) {
                                return $query->result_array();
                        } else {
                                return false;
                        }
                }

                public function svi() {
                        $this->db->select('post_id, title, time, text, status');
                        $this->db->from('posts');
                        $this->db->limit(50);

                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

                public function svi_iz_kategorije($cid = "") {

                        $this->db->select(' posts.post_id, posts.time, posts.title, text, posts.status, users.id_user, users.name AS autor, cats.id_cat AS id_kategorija, cats.title AS kategorija, cats.type AS ktip');
                        $this->db->from('posts');
                        $this->db->join('post_v_user', ' post_v_user.post_id = posts.post_id ', 'left');
                        $this->db->join('users', ' users.id_user = post_v_user.user_id', 'left');
                        $this->db->join('post_v_cat', ' post_v_cat.id_post = posts.post_id ', 'left');
                        $this->db->join('cats', ' cats.id_cat = post_v_cat.id_cat', 'left');
                        if ($cid != "")
                                $this->db->where('post_v_cat.id_cat', $cid);
                        $this->db->limit(50);

                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

                public function stranica_iz_kategorije($cid, $p = 1, $po_stranici = 1) {
                        /*

                          $start_from = ($page-1) * $num_rec_per_page;
                          $sql = "SELECT * FROM student LIMIT $start_from, $num_rec_per_page";

                         */
                        $this->db->select(' posts.post_id, posts.time, posts.title, text, posts.status, users.id_user, users.name AS autor, cats.id_cat, cats.title AS kategorija, cats.type AS ktip');
                        $this->db->from('posts');
                        $this->db->join('post_v_user', ' post_v_user.post_id = posts.post_id ', 'left');
                        $this->db->join('users', ' users.id_user = post_v_user.user_id', 'left');
                        $this->db->join('post_v_cat', ' post_v_cat.id_post = posts.post_id ', 'left');
                        $this->db->join('cats', ' cats.id_cat = post_v_cat.id_cat', 'left');
                        if ($cid != "")
                                $this->db->where('post_v_cat.id_cat', $cid);
                        $this->db->limit($po_stranici, ($p - 1) * $po_stranici);


                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

                public function broj_u_kategorije($cid) {
                        $this->db->select('posts.post_id');
                        $this->db->from('posts');
                        $this->db->join('post_v_cat', ' post_v_cat.id_post = posts.post_id ', 'left');
                        $this->db->where('post_v_cat.id_cat', $cid);
                        $query = $this->db->get();


                        return $query->num_rows();
                }

        }

?>