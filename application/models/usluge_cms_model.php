<?php

        Class Usluge_cms_model extends CI_Model {

                function __construct() {
                        parent::__construct();
                }

                public function sacuvaj($usluga) {

                        $nov = $usluga["nov"];

                        if ($nov == "1") {
                                $data = array('id_service' => '', 'name' => $usluga["inp_title_n"], 'desc' => $usluga["inp_text_n"]);
                                $this->db->insert('services', $data);
                                if ($this->db->affected_rows() == 1) {
                                        $data2 = array('id' => '', 'id_service' => $this->db->insert_id(), 'id_parent' => $usluga["ddl_parent_n"]);
                                        $this->db->insert('service_v_service', $data2);
                                        if ($this->db->affected_rows() == 1) {
                                                return true; // kojnektovati sa roditeljem ako nije -1
                                        } else {
                                                return false;
                                        }
                                } else {
                                        return false;
                                }
                        } else {
                                $uid = $usluga["inp_uid"];
                                if ($uid != "") {
                                        $data = array(
                                            'name' => $usluga["inp_title"], 'desc' => $usluga["inp_text"]
                                        );
                                        $this->db->where('id_service', $uid)->update('services', $data);
                                        $this->db->limit(1);
                                        if ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 0) {
                                                $data = array(
                                                    'id_parent' => $usluga["ddl_parent"]
                                                );
                                                $this->db->where('id_service', $uid)->update('service_v_service', $data);
                                                $this->db->limit(1);
                                                if ($this->db->affected_rows() == 1) {
                                                        return true;
                                                } else {
                                                  // if parent id not changed, do not return false just because 'service_v_service'
                                                  // affected_rows() == 0, it should be 0 ;)
                                                  if($usluga["inp_pid_same"] == "0"){
                                                    return false;
                                                  }else{
                                                    return true;
                                                  }
                                                }
                                        } else {
                                                return false;
                                        }
                                } else {
                                        return false;
                                }
                        }
                }

                public function obrisi($id) {
                        $tabs = array('services', 'services_v_service');
                        $this->db->where('id_service', $id);
                        $this->db->delete($tabs);


                        if ($this->db->affected_rows() != 0)
                                return $this->db->affected_rows();
                        else
                                return false;
                }

                /** */
                public function usluga_info($id, $just_parent = false) {

                        if ($just_parent) {
                                $this->db->select('service_v_service.id_parent');
                        } else {
                                $this->db->select('*');
                        }
                        $this->db->from('services');
                        $this->db->join('service_v_service', 'services.id_service = service_v_service.id_service');
                        $this->db->where('services.id_service', $id);
                        $this->db->limit(2);
                        $query = $this->db->get();

                        if ($query->num_rows() == 1) {
                                return $query->result_array();
                        } else {
                                return false;
                        }
                }

                public function sve() {

                        $this->db->select('*');
                        $this->db->from('services');
                        $this->db->join('service_v_service', 'services.id_service = service_v_service.id_service');

                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

                public function ddl() {

                        $this->db->select('id_service AS value,  name AS text');
                        $this->db->from('services');

                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result_array();
                        } else {
                                return false;
                        }
                }

                /* for a parent option for a service,  dd list population
                 *
                 */

                public function service_parent_options($id) {
                        $this->db->select('services.id_service, services.name');
                        $this->db->from('services');
                        if ($id != -1) {
                                $this->db->join('service_v_service', 'services.id_service = service_v_service.id_service');
                                $this->db->where_not_in('services.id_service', $id);
                        }
                        $query = $this->db->get();

                        if ($query->num_rows() != 0) {
                                return $query->result();
                        } else {
                                return false;
                        }
                }

        }
