<?php

        Class Pretraga_model extends CI_Model {

                function __construct() {
                        parent::__construct();
                }

                public function stranice($q) {
                        $res = $this->db->select('id_page AS id, name, desc, url ')->from('pages')->like('name', $q)->or_like('desc', $q)->get();
                        return $res->result();
                }

                public function usluge($q) {
                        $res = $this->db->select('id_service AS id, name, desc')->from('services')->like('name', $q)->or_like('desc', $q)->get();
                        return $res->result();
                }

                public function reference($q) {
                        $res = $this->db->select('id_reference AS id, name, desc')->from('references')->like('name', $q)->or_like('desc', $q)->get();
                        return $res->result();
                }

                public function blog($q) {
                        $res = $this->db->select('post_id AS id, title AS name, text AS `desc`')->from('posts')->like('title', $q)->or_like('text', $q)->get();
                        return $res->result();
                }

                public function tagovi($q) {

                }

        }
