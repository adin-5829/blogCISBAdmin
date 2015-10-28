<?php

Class Auth_model extends CI_Model {

     function __construct()
    {
        parent::__construct();  
    }

    function process_login($user, $passwordword){
            
            $passwordwordx = sha1($passwordword);

            $query = $this->db->query("SELECT nama_admin FROM `admin` WHERE `username`= '$user' and `password` = '$passwordwordx' LIMIT 0,1");
            // $query2 = $this->db->query("SELECT nama FROM `user` WHERE `id_user`= '$user' and `password` = '$passwordwordx' LIMIT 0,1");
            if ($query->num_rows() > 0){
                return 1;
            } else {
                return false;
            }
            
    }
}
?>