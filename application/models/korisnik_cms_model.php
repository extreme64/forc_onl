<?php

Class Korisnik_cms_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    
    
    
    public function sacuvaj($post)
    {

        $nov = $post["nov"];
        $tip = $post["ddl_tip"];

        if($nov=="true")
        {
            $data = array(
                'id_user' => '',
                'regtime' => time(),
                'lastlog' => time(),
                'name' => $post["inp_nalog"],
                'pass' => md5($post["inp_sifra"]),
                'mail' => $post["inp_mejl"],
                'status' => $post["ddl_verifikovan"],
                'vercod' => md5($post["inp_sifra"].time().$post["inp_sifra"].time()."randstr")
            );
            // nov nalog otvaramo za korisnika
            $this->db->insert('users', $data); 

            if($this->db->affected_rows()==1)
            {
                $tip_siguran = ($tip == -1) ? 3 : $tip;
                $data2 = array(
                    'id' => '',
                    'user_id' => $this->db->insert_id(),
                    'userType_id' => $tip_siguran
                );

                $this->db->insert('user_v_usertype', $data2); 
                if($this->db->affected_rows()==1)
                    return array("feedback" => true);
                else
                    return array("feedback" => false);
            }
            else
                return array("feedback" => false);
        }
        else
        {
        $koid = $post["inp_koid"];

            // ako nije nov onda znaci da editujemo vec postojeci

            if($koid!="") // ako je koid ok, nastavljamo dalje
            {
                $data = array(
                    'name' => $post["inp_nalog"],
                    'pass' => md5($post["inp_sifra"]),
                    'mail' => $post["inp_mejl"],
                    'status' => $post["ddl_verifikovan"]
                );

                $this->db->where('id_user', $koid);
                $this->db->update('users', $data);

                if($this->db->affected_rows()==1)
                {
                    // ako uspesno upisan povezujemo ga sa tipom korisnika
                    $tip_siguran = ($tip == -1 || $tip == "") ? 0 : $tip; // u slucaju -1 ili bez navedenog, sigurna opcija, neka je obican clan
                    $data2 = array( 'userType_id' => $tip_siguran );

                    $this->db->where('user_id', $koid);
                    $this->db->update('user_v_usertype', $data2);

                    if($this->db->affected_rows()==1) {
                        return array("feedback" => true);
                    }else
                        return array("feedback" => "tip_nepromenjen");
                }
            }
            else
                return array("feedback" => false);


        }
    }
    
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
    
    

    
    /** Dohvata kompletan info o korisniku
     *
     *  @param int
     *  @return mix
     */
    public function user_info($id_user)
    {
        $this -> db -> select('id_user, name, pass, mail, status, lastlog, regtime, user_v_usertype.userType_id as tip');
        $this -> db -> from('users');
        $this->db->join('user_v_usertype', 'user_v_usertype.user_id = users.id_user');
        $this -> db -> where('users.id_user', $id_user);
        $this -> db -> limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
            return $query->result_array();
        else
            return false;
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
    
    
}


?>