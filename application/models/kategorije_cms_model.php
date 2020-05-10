<?php

        Class Kategorije_cms_model extends CI_Model {

                function __construct() {
                        parent::__construct();
                }

                public function sve_kategorije_lista() {

                        $this->db->select('id_cat AS value, title AS text');
                        $this->db->from('cats');
                        $this->db->where('id_cat
                                        IN (
                                            SELECT id_cat FROM posts
                                            JOIN post_v_cat
                                            ON posts.post_id  = post_v_cat.id_post
                                                WHERE posts.status = 1
                                        )', NULL, false);
                        $query = $this->db->get();
                        if ($query->num_rows() > 0)
                                return $query->result_array();
                        else
                                return false;
                }

                public function sacuvaj($post) {

                  $nov = $post["nov"];
                  $data = array(
                    'title' => $post["inp_title"],
                    'type' =>  $post["ddl_tip"]
                  );

                  if ($nov == "1") {
                    $this->db->insert('cats', $data);

                    if ($this->db->affected_rows() == 1)
                            return json_encode(array("1"));
                    return false;
                  }
                  else {
                    $katid = $post["inp_catid"];
                    if ($katid != "") {
                      $data['id_cat'] = $katid;

                      $this->db->where('id_cat', $katid);
                      $this->db->update('cats', $data);
                      $this->db->limit(1);

                      if ($this->db->affected_rows() == 1)
                              return json_encode(array("1"));
                      return false;
                    } else
                      return false;
                  }
                }

                public function obrisi($catid) {
                        $tabele = array('cats');
                        $this->db->where('id_cat', $catid);
                        $this->db->delete($tabele);


                        if ($this->db->affected_rows() != 0)
                                return $this->db->affected_rows();
                        else
                                return false;
                }

                /** */
                public function kategorija_info($id) {
                        $this->db->select('*');
                        $this->db->from('cats');
                        $this->db->where('id_cat', $id);
                        $this->db->limit(1);

                        $query = $this->db->get();

                        if ($query->num_rows() == 1) {
                                return $query->result_array();
                        } else {
                                return false;
                        }
                }

                public function svi() {
                        $this->db->select('id_cat, title, type');
                        $this->db->from('cats');
                        $this->db->limit(50);

                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

        }

?>
