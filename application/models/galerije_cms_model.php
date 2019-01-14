<?php

        Class Galerije_cms_model extends CI_Model {

                public $upload_dir_path;

                function __construct() {
                        parent::__construct();
                }

                public function sve_galerije_lista() {
                        $this->db->select('id_gal AS value, title AS text');
                        $this->db->from('gals');

                        $query = $this->db->get();

                        if ($query->num_rows() > 0) {
                                return $query->result_array();
                        } else {
                                return false;
                        }
                }

                public function sacuvaj($post) {
                        $nov = $post["nov"];
                        $err = array();

                        if ($nov == "1") {
                                $data = array(
                                    'id_gal' => '',
                                    'title' => $post['inp_title_n'],
                                    'id_user' => $this->session->userdata('id_user')
                                );
                                $this->db->insert('gals', $data);
                                if ($this->db->affected_rows() == 1)
                                        return true;
                                else
                                        return false;
                        }
                        else {
                                $galid = $post["inp_galid"];

                                if ($galid != "") {
                                        $data2 = array(
                                            'id_gal' => $galid,
                                            'title' => $post["inp_title"]
                                        );
                                        $this->db->where('id_gal', $galid);
                                        $this->db->update('gals', $data2);
                                        $this->db->limit(1);

                                        if ($this->db->affected_rows() == 1)
                                                return true;
                                        return false;
                                } else
                                        return false;
                        }
                }

                public function obrisi($sid) {
                        $tabele = array('gals');
                        $this->db->where('id_gal', $sid);
                        $this->db->delete($tabele);

                        if ($this->db->affected_rows() != 0)
                                return $this->db->affected_rows();
                        else
                                return false;
                }

                public function galerija_info($id) {
                        $this->db->select('*');
                        $this->db->from('gals');
                        $this->db->where('id_gal', $id);
                        $this->db->limit(1);

                        $query = $this->db->get();

                        if ($query->num_rows() == 1) {
                                return $query->result_array();
                        } else {
                                return false;
                        }
                }

                public function svi($array_gids = array(), $flag = "exc") {

                        if (count($array_gids) == 0) {
                                $this->db->select('id_gal, title, id_user');
                                $this->db->from('gals');
                                $this->db->limit(50);
                        } else {
                                // inc/exc include gid or do not include
                                $this->db->select('id_gal, title, id_user');
                                $this->db->from('gals');
                                ($flag == "inc") ? $this->db->where_in('id_gal', $array_gids) : $this->db->where_not_in('id_gal', $array_gids);
                        }

                        $query = $this->db->get();
                        if ($query->num_rows() != 0)
                                return $query->result();
                        else
                                return false;
                }

                public function ddl() {
                        $this->db->select('id_gal AS value, title AS text');
                        $this->db->from('gals');

                        $query = $this->db->get();
                        if ($query->num_rows() != 0)
                                return $query->result_array();
                        else
                                return false;
                }

                /** akcije na sadrzajem galerija */
                public function izmena_sadrzaja($selc, $targ, $acti) {
                        $data;

                        if (!(count($selc) > 0 && $targ != ""))
                                return false;

                        switch ($acti) {

                                case 1 :
                                        // koporaj >> ($selc) u drugu ($targ ) galeriju
                                        // podesi set vrednosti i kljuceva za upit
                                        for ($i = 0; $i < count($selc); $i++) {
                                                $data[] = array("id_image" => $selc["ids" . $i], "id_gal" => $targ);
                                        }

                                        $query = 0;
                                        // ispitati da li su neke od sliak vec povezane uz odabranu galeriju, one koje nisu insertovati
                                        foreach ($data as $s) {
                                                $found_how_much = $this->db->where('id_gal', $targ)->where('id_image', $s["id_image"])->count_all_results('image_v_gal');
                                                if ($found_how_much == 0)
                                                        $query += $this->db->where("id_gal", $targ)->where("id_image", $s["id_image"])
                                                                ->replace('image_v_gal', $s);
                                        }
                                        if ($query > 0)
                                                return true;
                                        else
                                                return false;

                                        break;

                                case 2 :
                                        //premesti > ($selc) u drugu ($targ ) galeriju
                                        // podesi set vrednosti i kljuceva za upit
                                        $q = 0;
                                        for ($i = 0; $i < count($selc); $i++) {
                                                $data = array('id_gal' => $targ);
                                                $q += $this->db->where('id_image', $selc["ids" . $i])->update('image_v_gal', $data);
                                        }

                                        if ($q != 0)
                                                return true;
                                        return false;

                                        break;

                                default:
                                        break;
                        }


                        // obrisi vvv ($selc) slike
                        if ($acti == 3) {
                                // >>> ukloni sa servere
                                $res = 0;
                                // >>> ako uklonjeno, izbrisai unos u bazi
                                for ($i = 0; $i < count($selc); $i++) {
                                        $data = array('id_image' => $selc["ids" . $i]);
                                        $res += $this->db->where('id_gal', $targ)->delete('image_v_gal', $data);
                                }
                                if ($res != 0)
                                        return true;
                                return false;
                        }
                }

        }

?>