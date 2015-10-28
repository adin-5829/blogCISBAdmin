<?php
Class M_komentar extends CI_Model {
    
    function __construct()
    {
        parent::__construct();  
    }
    

	function daftar($limit=null, $offset=null, $param=null, $id=null, $id_produk = null, $status_komentar = null){
		$this->db->select('komentar.*, produk.nama_produk');
		$this->db->from('komentar');
		$this->db->join('produk', 'produk.id_produk = komentar.id_produk', 'left');

		if (!is_null($id)) {
			$this->db->where('id_komentar', $id);
		}

		if (!is_null($id_produk)) {
			$this->db->where('komentar.id_produk', $id_produk);
		}

		if (!is_null($status_komentar)) {
			$this->db->where('komentar.status_komentar', $status_komentar);
		}


		if (!is_null($limit) && !is_null($offset) ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by("id_komentar", "DESC"); 
		$query = $this->db->get();
		return $query;
	}
	
	
	function input_produk() {
		// $userfile = $_FILES['userfile']['name'];

		$nama_komentar = $this->input->post('nama_komentar');
		$id_produk = $this->input->post('id_produk');
		$isi_komentar = $this->input->post('isi_komentar');
		$email_komentar = $this->input->post('email_komentar');
		$website_komentar	 = $this->input->post('website_komentar');
			
			$data = array(
				'nama_komentar' => $nama_komentar,
				'id_produk' => $id_produk,
				'isi_komentar' => $isi_komentar,
				'email_komentar' => $email_komentar,
				'website_komentar' => $website_komentar,
				'tgl_post_komentar' => date("Y-m-d H:i:s"),
				'status_komentar' => 'tidak',
				);
		if ($this->db->insert('komentar', $data)){
            return 1;
        } else {
            return 0;
        }
	}

	function edit($id) {
/*		$nama_komentar = $this->input->post('nama_komentar');
		$id_produk = $this->input->post('id_produk');*/


		$data = array(
			'status_komentar' => 'tampil',
			);
		$this->db->where('id_komentar', $id);
		if ($this->db->update('komentar', $data)) {
			return 1;
		} else {
			return 0;
		}
	
	}

	
	function delete($id){
		$this->db->where('id_komentar', $id);
		if($this->db->delete('komentar')) {
            return 1;
        } else {
            return 0;
        }
	}
    	
}
?>