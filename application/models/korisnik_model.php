<?php

Class Korisnik_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    
    public function ulaz_user($username, $password)
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
    }

     /** Dohvata ulogu korisnika
     *  - Upotreba prilikom logovanja, neophodni podaci o ulozi [ kontr. logovanje.php @ ln. 45. ]
     *
     *  @param int
     *  @return mix
     */
    public function uloga($id_user)
    {
        $this -> db -> select('user_v_usertype.userType_id as tip') -> from('users');
        $this -> db -> join('user_v_usertype', 'user_v_usertype.user_id = users.id_user');
        $this -> db -> where('users.id_user', $id_user) -> limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            $arr = $query->result_array();
            return $arr[0]['tip'];
        }
        else
            return -1;
    }


    public function svi()
    {
        $this -> db -> select('id_user, name, mail, status, lastlog, regtime');
        $this -> db -> from('users');
        $this -> db -> limit(50);

        $query = $this->db->get();

        if($query->num_rows()!=0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    public function dodaj($d, $vcode)
    {
        $string = array(
                'name'=>$d['nalog'],
                'pass'=>$d['lozinka'],
                'mail'=>$d['mejl'],
                'status'=>1,
                'regtime'=>time(),
                'lastlog'=>0,
                'vercod'=>$vcode
        );
        $q = $this->db->insert_string('users',$string);
        $this->db->query($q);
        return $this->db->insert_id();
    }
    
    public function jeDuplikat($mail)
    {
        $this->db->get_where('users', array('mail' => $mail), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }

    
}


?>