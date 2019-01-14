<?php

Class Uloge_cms_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    
     public function sve()
    {
        $this -> db -> select('userType_id AS value, name AS text');
        $query = $this->db->get('usertypes', 10);

        if($query->num_rows()!=0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
    
    
    /*public function ulaz_user($username, $password)
    {
        $this -> db -> select('id_user, name, pass');
        $this -> db -> from('users');
        $this -> db -> where('name', $username);
        $this -> db -> where('pass', MD5($password));
        $this -> db -> limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    public function user_info($id_user)
    {
        $this -> db -> select('name, mail, status, lastlog, regtime');
        $this -> db -> from('users');
        $this -> db -> where('id_user', $id_user);
        $this -> db -> limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }*/
    
   
    
    public function obrisi($koid)
    {
        $tabele = array('users');
        $this->db->where('id_user', $koid);
        $this->db->delete($tabele);
        

        if($this->db->affected_rows()!=0)
            return $this->db->affected_rows();
        else
            return false;
    }
    
    
}


?>
