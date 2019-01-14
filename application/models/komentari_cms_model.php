<?php

Class Komentari_cms_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    
    public function sacuvaj($post)
    {
        $komid = $post["inp_komid"];
        $data = array( 
            'text' => $post["inp_tekst"],
            'status' => $post["inp_status"]
        );
        if($komid!="")
        {
            $this->db->where('id_comment', $komid);
            $this->db->update('comments', $data);  
            
            if($this->db->affected_rows()==1)
                return json_encode( array('feedback' => true ));
            else
                return false;
        }else
            return false;
            
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
    
    
    
    
    /** */
    
    
    public function komentar_info($id_comment)
    {
        $this -> db -> select(' comments.id_comment, time, text, comments.status, post_v_posttype.id_post, posttype.name as posttype, users.name as autor');
        $this -> db -> from('comments');
        $this->db->join('comment_v_post', 'comment_v_post.id_comment = comments.id_comment');
        $this->db->join('post_v_posttype', 'post_v_posttype.id_post = comment_v_post.id_post');
        $this->db->join('posttype', 'posttype.id_type = post_v_posttype.id_type');
        $this->db->join('comment_v_user', 'comment_v_user.id_comment = comments.id_comment');
        $this->db->join('users', 'users.id_user = comment_v_user.id_user');
        $this -> db -> where('comments.id_comment', $id_comment);
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

    public function svi($post=-1)
    {
        $this -> db -> select(' comments.id_comment, time, text, comments.status, users.name as autor, mail');   // posttype.name as posttype
        $this -> db -> from('comments');
        $this->db->join('comment_v_post', 'comment_v_post.id_comment = comments.id_comment');
        //$this->db->join('post_v_posttype', 'post_v_posttype.id_post = comment_v_post.id_post');
        //$this->db->join('posttype', 'posttype.id_type = post_v_posttype.id_type');
        $this->db->join('comment_v_user', 'comment_v_user.id_comment = comments.id_comment');
        $this->db->join('users', 'users.id_user = comment_v_user.id_user');
        if( $post!= -1)
             $this->db->where('comment_v_post.id_post', $post);
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


    public function dodaj($tekst,$post,$korisnik)
    {
        
        $data = array(
            'id_comment' => '' ,
            'posttype'=> '',
            'time' => time(),
            'text' => $tekst,
            'status' => 2
        );
        $this->db->insert('comments', $data);

        if($this->db->affected_rows()==1)
        {
            $id_comm = $this->db->insert_id();
            $data = array(
                'id' => '' ,
                'id_comment'=>  $id_comm ,
                'id_post' => $post
            );
            //povezi komentar sa postom
            $this->db->insert('comment_v_post', $data);

            if($this->db->affected_rows()==1)
            {
                $data = array(
                    'id' => '' ,
                    'id_comment'=> $id_comm  ,
                    'id_user' => $korisnik
                );
                //povezi komentar sa korisnikom
                $this->db->insert('comment_v_user', $data);

                 if($this->db->affected_rows()==1)
                    return true;
                 else
                    return false;
            }
            else
                return false;
        }
        else
            return false;


    }
    
}


?>