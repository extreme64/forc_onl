<?php

        Class Slike_cms_model extends CI_Model {

                public $upload_dir_path;

                function __construct() {
                        parent::__construct();
                        $this->upload_dir_path = './images/upload/';
                }

                public function sacuvaj($post, $image_files) {
                        $nov = $post["nov"];
                        $err = array();
                        $novi_fajlovi = array();
                        if ($nov == "1") {

                                for ($im = 0; $im < count($image_files['userfile']['name']); $im++) {

                                        $exten = explode(".", $image_files['userfile']['name'][$im]);
                                        $novi_fajlovi[] = $new_server_image_name = $im . "_" . time() . "_" . substr(md5($image_files['userfile']['tmp_name'][$im]), 8) . "." . $exten[1];
                                        $data = array(
                                            'id_image' => '',
                                            'time' => time(),
                                            'title' => $post['inp_title_n'],
                                            'alt' => $post['inp_alt_n'],
                                            'author' => $post['inp_autor_n'],
                                            'url' => $new_server_image_name
                                        );

                                        $this->db->insert('images', $data);
                                        $f[] = $image_files['userfile']['name'][$im];
                                        if ($this->db->affected_rows() == 1) {
                                                $img_id = $this->db->insert_id();
                                                $data2 = array(
                                                    'id' => '',
                                                    'id_image' => $img_id,
                                                    'id_gal' => $post['ddl_gal_n']
                                                );
                                                $this->db->insert('image_v_gal', $data2); //upisati u default galeriju 'SVE SLIKE'
                                                if (!$this->db->affected_rows() == 1)
                                                        $err[] = json_encode(array("GREŠLA: Galerija povezivanje id_image:" . $img_id . ", neuspešno!"));
                                        }
                                        else {
                                                $err[] = json_encode(array("GREŠKA: Zapis id_image:" . $img_id . " slike u bazu, neuspešno!"));
                                        }
                                }
                                if (count($err) == 0)
                                        return $novi_fajlovi;
                                return $err;
                        }
                        else {
                                $slid = $post["inp_slid"];
                                if ($slid != "") {
                                        $data2 = array(
                                            'title' => $post["inp_title"],
                                            'alt' => $post["inp_alt"],
                                            'author' => $post["inp_autor"]
                                        );
                                        $this->db->where('id_image', $slid);
                                        $this->db->update('images', $data2);
                                        $this->db->limit(1);

                                        // link img. to gal.
                                        // id old id is diff. to new id
                                        if ($this->db->affected_rows() == 1 || $post['ddl_gal'] !== $post['uni_ent_gid']) {
                                                $data2 = array('id_gal' => $post['ddl_gal']);

                                                // update to what gal. ID is image assos. to
                                                $this->db->where('id_image', $slid);
                                                $this->db->update('image_v_gal', $data2);
                                                $this->db->limit(1);

                                                if ($this->db->affected_rows() == 1)
                                                        return array('feedback' => true);
                                                return array('feedback' => "nepromenjeno");
                                        } else
                                                return array('feedback' => "nepromenjeno");
                                } else
                                        return array('feedback' => false);
                        }
                }

                public function obrisi($sid) {
                        $this->db->select('url')->from('images')->where('id_image', $sid);
                        $res = $this->db->get();
                        $tabele = array('images', 'image_v_gal');
                        $this->db->where('id_image', $sid);
                        $this->db->delete($tabele);

                        if ($this->db->affected_rows() != 0 || true) {

                                $path = 'images/upload/';
                                foreach ($res->result_array() as $r) {
                                        $file = base_url() . $path . $r['url'];
                                        if (file_exists($path . $r['url']))
                                                return (!unlink($path . $r['url'])) ? false : true;
                                        else
                                                return false;
                                }
                        } else
                                return false;
                }

                /** */
                public function slika_info($id) {
                        $this->db->select('images.id_image, title, time, url, author, alt, id_gal, image_v_gal.id AS gid');
                        $this->db->from('images');
                        $this->db->join('image_v_gal', 'image_v_gal.id_image = images.id_image');
                        $this->db->where('images.id_image', $id);
                        $this->db->limit(50);

                        $query = $this->db->get();

                        if ($query->num_rows() == 1) {
                                return $query->result_array();
                        } else {
                                return false;
                        }
                }

                public function svi($limit = 40) {
                        $this->db->select('id_image, title, time, url, author , alt');
                        $this->db->from('images');
                        $this->db->limit($limit);

                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

                public function ddl() {
                        $this->db->select('id_image AS value, id_image AS text');
                        $this->db->from('images');


                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result_array();
                        } else {
                                return false;
                        }
                }

                /** public function grupa()
                 *
                 *  dohvata grupu slika
                 *
                 *  @param string - prosledjen parametar, koji filtrira slike koje treba vratiti u grupi  npr. galerija ID/IDs,  GID
                 *  @return bool
                 */
                public function grupa($filter) {

                        //da bi prosledili vise id-jeva, trebao nam je separator
                        $ids = explode('v', $filter);

                        $this->db->distinct();
                        $this->db->select('images.id_image, title, time, url, author, alt, id_gal, image_v_gal.id AS gid');
                        $this->db->from('images');
                        $this->db->join('image_v_gal', 'image_v_gal.id_image = images.id_image');

                        // jedna galerija ili vise
                        if (count($ids) == 1)
                                $this->db->where('id_gal', $filter);
                        else
                                $this->db->where_in('id_gal', $ids);

                        $this->db->group_by('images.id_image');

                        $query = $this->db->get();

                        if ($query->num_rows() != 0)
                                return $query->result();
                        else
                                return false;
                }

                public function random_odabir($array_ids) {
                        $this->db->select('*');
                        $this->db->from('images');
                        $this->db->where_in('id_image', $array_ids);
                        $query = $this->db->get();

                        return $query->result();
                }

        }

?>
