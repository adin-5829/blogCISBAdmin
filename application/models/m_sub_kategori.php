<?php
Class M_sub_kategori extends CI_Model {
    
    function __construct()
    {
        parent::__construct();  
    }
    

	function daftar($limit=null, $offset=null, $param=null, $id=null, $id_kategori = null){
		$this->db->select('sub_kategori.*, kategori.nama_kategori');
		$this->db->from('sub_kategori');
		$this->db->join('kategori', 'kategori.id_kategori = sub_kategori.id_kategori', 'left');

		if (!is_null($id)) {
			$this->db->where('id_sub_kategori', $id);
		}

		if (!is_null($id_kategori)) {
			$this->db->where('sub_kategori.id_kategori', $id_kategori);
		}


		if (!is_null($limit) && !is_null($offset) ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by("nama_sub_kategori", "ASC"); 
		$query = $this->db->get();
		return $query;
	}
	
	
	function input_produk() {
		// $userfile = $_FILES['userfile']['name'];

		$nama_sub_kategori = $this->input->post('nama_sub_kategori');
		$id_kategori = $this->input->post('id_kategori');
			
			$data = array(
				'nama_sub_kategori' => $nama_sub_kategori,
				'id_kategori' => $id_kategori,
				);
		if ($this->db->insert('sub_kategori', $data)){
            return 1;
        } else {
            return 0;
        }
	}

	function edit($id) {
		$nama_sub_kategori = $this->input->post('nama_sub_kategori');
		$id_kategori = $this->input->post('id_kategori');


		$data = array(
			'nama_sub_kategori' => $nama_sub_kategori,
			'id_kategori' => $id_kategori,
			);
		$this->db->where('id_sub_kategori', $id);
		if ($this->db->update('sub_kategori', $data)) {
			return 1;
		} else {
			return 0;
		}
	
	}

	
	function delete($id){
		$this->db->where('id_sub_kategori', $id);
		if($this->db->delete('sub_kategori')) {
            return 1;
        } else {
            return 0;
        }
	}
    	
}
?>