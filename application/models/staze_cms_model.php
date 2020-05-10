
<?php

Class Staze_cms_model extends CI_Model
{
    
    
    function __construct()
    {
        parent::__construct();
        
    }
    
    
    public function sacuvaj($post)
    {
        $nov = $post["nov"];
        $err = array();
        
        if($nov=="1")
        {
            $data = array(
                'id_staza' => '',
                'title' => $post['inp_title_n'],
                'text' => $post['inp_text_n'],
                'type' => $post['ddl_tip_n'],
                'lenght' => $post['inp_lenght_n'],
                'id_image' => $post['inp_id_image_n'],
            );
            $this->db->insert('staze', $data); 
            if($this->db->affected_rows()==1)
                return true;
            else
                return false;
        }
        else
        {
            $stzid = $post["inp_szid"];
            
            if($stzid!="")
            {
                $data2 = array(
                    'title' => $post['inp_title'],
                    'text' => $post['inp_text'],
                    'type' => $post['ddl_tip'],
                    'lenght' => $post['inp_lenght'],
                    'id_image' => $post['inp_id_image']
                );
                $this->db->where('id_staza', $stzid);
                $this->db->update('staze', $data2);  
                $this -> db -> limit(1);
                
                if($this->db->affected_rows()==1)    
                    return true;
                else
                    return false;   
            }
            else
                return false;
            
        }
    }
    
    public function obrisi($sid)
    {
        $tabele = array('staze');
        $this->db->where('id_staza', $sid);
        $this->db->delete($tabele);
        
        if($this->db->affected_rows()!=0)
            return $this->db->affected_rows();
        else
            return false;
    }
    
    
    
    public function staza_info($id)
    {
       $this -> db -> select('id_staza, staze.title, type,
                                images.id_image, lenght, text, images.title AS image_title, url,
                                author, time AS image_time, alt'
        );
        $this -> db -> from('staze');
        $this -> db -> join('images', 'images.id_image = staze.id_image');
        $this -> db -> where('id_staza', $id);
        $this -> db -> limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
    
    public function svi()
    {
        $this -> db -> select('id_staza, staze.title, type,
                                images.id_image, lenght, text, images.title AS image_title, url,
                                author, time AS image_time, alt'
        );
        $this -> db -> from('staze');
        $this -> db -> join('images', 'images.id_image = staze.id_image');
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
    
    /**** #####
    public function sve_staze_lista()
    {
        $this -> db -> select('id_staza AS value, title AS title');
        $this -> db -> from('staze');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    } #### */
    
    
}


?>