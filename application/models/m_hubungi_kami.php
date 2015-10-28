<?php
Class M_hubungi_kami extends CI_Model {
    
    function __construct()
    {
        parent::__construct();  
    }
    

	function daftar($limit=null, $offset=null, $param=null, $id=null){
		$this->db->select('hubungi_kami.*');
		$this->db->from('hubungi_kami');

		if (!is_null($id)) {
			$this->db->where('id_hubungi_kami', $id);
		}


		if (!is_null($limit) && !is_null($offset) ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by("id_hubungi_kami", "DESC"); 
		$query = $this->db->get();
		return $query;
	}
	
	
	function input_produk() {
		// $userfile = $_FILES['userfile']['name'];

		$nama_hubungi_kami = $this->input->post('nama_hubungi_kami');
		$subjek_hubungi_kami = $this->input->post('subjek_hubungi_kami');
		$email_hubungi_kami = $this->input->post('email_hubungi_kami');
			
			$data = array(
				'nama_hubungi_kami' => $nama_hubungi_kami,
				'subjek_hubungi_kami' => $subjek_hubungi_kami,
				'email_hubungi_kami' => $email_hubungi_kami,
				'tgl_post_hubungi_kami' => date("Y-m-d H:i:s"),
				);
		if ($this->db->insert('hubungi_kami', $data)){
            return 1;
        } else {
            return 0;
        }
	}

	
	function delete($id){
		$this->db->where('id_hubungi_kami', $id);
		if($this->db->delete('hubungi_kami')) {
            return 1;
        } else {
            return 0;
        }
	}
    	
}
?>