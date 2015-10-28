<?php

Class M_kontak extends CI_Model {

     function __construct()
    {
        parent::__construct();  
    }
    
    function daftar_kontak($limit, $offset){
        $this->db->select('*');
        $this->db->from('kontak');
        
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }
    

    function updatekontak($id_kontak){
        $alamat_kontak = $this->input->post('alamat_kontak');
        $telpon1_kontak = $this->input->post('telpon1_kontak');
        $email_kontak = $this->input->post('email_kontak');
        $telpon2_kontak = $this->input->post('telpon2_kontak');
        $pin_bb_kontak = $this->input->post('pin_bb_kontak');
        $nama_fb_kontak = $this->input->post('nama_fb_kontak');
        $link_fb_kontak = $this->input->post('link_fb_kontak');
        $alamat_google_maps = $this->input->post('alamat_google_maps');


        $data = array(
            'alamat_kontak' => $alamat_kontak,
            'telpon1_kontak'  => $telpon1_kontak,
            'email_kontak    '  => $email_kontak,
            'telpon2_kontak' => $telpon2_kontak,
            'pin_bb_kontak'  => $pin_bb_kontak,
            'nama_fb_kontak    '  => $nama_fb_kontak,
            'link_fb_kontak    '  => $link_fb_kontak,
            'alamat_google_maps    '  => $alamat_google_maps,
        );

        $cek = $this->daftar_kontak(1,0);

        if ($cek->num_rows() > 0) {
             $this->db->where('id_kontak', $id_kontak);
                if ($this->db->update('kontak', $data)) {
                   
                    return 1;
                } else {
                    return 2;
                }
            } else {
                $this->db->insert('kontak', $data);
                return 1;
            }

       
    }

    function edit_password($id_kontak){
        $password = sha1($this->input->post('password_baru'));
        $password_lama = sha1($this->input->post('password_lama'));
        $this->db->select('username');
        $this->db->from('kontak');
        $this->db->where('id_kontak', $id_kontak);
        $this->db->where('password', $password_lama);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            {
               $data = array(
                'password' => $password
                );
                $this->db->where('id_kontak', $id_kontak);
                $this->db->update('kontak', $data);
                return TRUE;
            } else {
                return FALSE;
            }
    }
}
?>