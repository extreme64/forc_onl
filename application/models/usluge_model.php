<?php
        if (!defined('BASEPATH'))
                exit('No direct script access allowed');

        class Usluge_model extends CI_Model {

                public function index() {

                }

                public function sve() {
                        //dohvati niz sa stranicama
                        $this->db->select('*')->from('services');
                        $res = $this->db->get();


                        if ($res->num_rows() > 0) {
                                return $res->result();
                        }
                }

                public function top() {
                        //dohvati niz sa stranicama
                        //$this->db->select('*')->from('services');
                        // $this->db->join('service_v_service', ' service_v_service.id_service = services.id_service ')->where('service_v_service.id_parent', 0);

                        $res = $this->db->query("  SELECT `services`.`id_service`, `name`, `desc`,
                                        (
                                                SELECT IF(COUNT(`service_v_service`.`id_service`)>0, TRUE, FALSE)
                                                FROM `service_v_service`
                                                WHERE `service_v_service`.`id_parent` = `services`.`id_service`
                                        ) AS has_child
                                FROM `services`
                                JOIN `service_v_service`
                                ON `services`.`id_service` = `service_v_service`.`id_service`
                                WHERE `id_parent`= 0
                        ");


                        if ($res->num_rows() > 0) {
                                return $res->result();
                        }
                }

                public function deca($roditelj) {
                        //dohvati niz sa stranicama
                        //$this->db->select("*")->from('services');
                        // izaberi svu decu i dodatno rotitelja, kako bi imali platfrmu za prikaz kome segmenti pripoadaju
                        // i preko cega da se vrcamo anzad na visi nivo usluga
                        //$this->db->join('service_v_service', ' service_v_service.id_service = services.id_service ')->where('id_parent', $roditelj)->or_where('services.id_service', $roditelj);
                        $res = $this->db->query("SELECT `services`.`id_service`, `name`, `desc`, `id_parent`,
                                        (
                                                SELECT IF(COUNT(`service_v_service`.`id_service`) > 0, TRUE, FALSE)
                                                FROM `service_v_service`
                                                WHERE `service_v_service`.`id_parent` = `services`.`id_service`
                                        ) AS has_child
                                FROM `services`
                                JOIN `service_v_service`
                                ON `services`.`id_service` = `service_v_service`.`id_service`
                                WHERE `id_parent`= $roditelj OR `services`.`id_service` = $roditelj
                                ORDER BY `id_parent`ASC
                        ;");

                        if ($res->num_rows() > 0) {
                                return $res->result();
                        }
                }

                public function usluga($id) {

                        //dohvati niz sa stranicama
                        $this->db->select('*')->from('services')->join('service_v_service', 'services.id_service = service_v_service.id_service')->where('services.id_service', $id);
                        $res = $this->db->get();


                        if ($res->num_rows() != 1) {
                                return false;
                        }
                        return $res->result();
                }

        }
