<?php

Class M_admin extends CI_Model {

     function __construct()
    {
        parent::__construct();  
    }
    
    function daftar_admin($limit, $offset, $username = null){
        $this->db->select('*');
        $this->db->from('admin');
        if (!is_null($username)) {
           $this->db->where('username', $username);
        }
        
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }
    

    function updateAdmin($id_admin){
        $nama_admin = $this->input->post('nama_admin');
        $username = $this->input->post('username');
        $email_admin = $this->input->post('email_admin');

        $data = array(
            'nama_admin' => $nama_admin,
            'username'  => $username,
            'email_admin'  => $email_admin
        );


        $this->db->where('id_admin', $this->session->userdata('id_admin'));
        if ($this->db->update('admin', $data)) {
            $this->session->set_userdata('nama',$nama_admin);
            $this->session->set_userdata('username',$username);
            return 1;
        } else {
            return 2;
        }
    }

    function edit_password($id_admin){
        $password = sha1($this->input->post('password_baru'));
        $password_lama = sha1($this->input->post('password_lama'));
        $this->db->select('username');
        $this->db->from('admin');
        $this->db->where('id_admin', $this->session->userdata('id_admin'));
        $this->db->where('password', $password_lama);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            {
               $data = array(
                'password' => $password
                );
                $this->db->where('id_admin', $this->session->userdata('id_admin'));
                $this->db->update('admin', $data);
                return TRUE;
            } else {
                return FALSE;
            }
    }
}
?>