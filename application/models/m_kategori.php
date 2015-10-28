<?php
Class M_kategori extends CI_Model {
    
    function __construct()
    {
        parent::__construct();  
    }
    

	function daftar($limit=null, $offset=null, $param=null, $id=null){
		$this->db->select('*');
		$this->db->from('kategori');

		if (!is_null($id)) {
			$this->db->where('id_kategori', $id);
		}


		if (!is_null($limit) && !is_null($offset) ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by("nama_kategori", "ASC"); 
		$query = $this->db->get();
		return $query;
	}
	
	
	function input_produk() {
		// $userfile = $_FILES['userfile']['name'];

		$nama_kategori = $this->input->post('nama_kategori');

			
			$data = array(
				'nama_kategori' => $nama_kategori,
				);
		if ($this->db->insert('kategori', $data)){
            return 1;
        } else {
            return 0;
        }
	}

	function edit($id) {
		$nama_kategori = $this->input->post('nama_kategori');


		$data = array(
			'nama_kategori' => $nama_kategori,
			);
		$this->db->where('id_kategori', $id);
		if ($this->db->update('kategori', $data)) {
			return 1;
		} else {
			return 0;
		}
	
	}

	
	function delete($id){
		$this->db->where('id_kategori', $id);
		if($this->db->delete('kategori')) {
            return 1;
        } else {
            return 0;
        }
	}
    	
}
?>