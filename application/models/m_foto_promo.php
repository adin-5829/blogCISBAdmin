<?php
Class M_foto_promo extends CI_Model {
    var $gallerypath;
	var $gallery_path_url;
       
    function __construct()
    {
        parent::__construct();  
        $this->gallerypath = realpath(APPPATH . '../foto/foto_promo');
		$this->gallery_path_url = base_url().'foto/foto_promo';
    }
    

	function daftar($limit=null, $offset=null, $param=null, $id=null, $status_foto_promo = null){
		$this->db->select('foto_promo.*');
		$this->db->from('foto_promo');


		if (!is_null($param)) {
			$this->db->like('judul_foto_promo', $param);
			$this->db->or_like('id_foto_promo', $param);
		}

		if (!is_null($id)) {
			$this->db->where('id_foto_promo', $id);
		}

		if (!is_null($status_foto_promo)) {
			$this->db->where('status_foto_promo', $status_foto_promo);
		}


		if (!is_null($limit) && !is_null($offset) ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by("id_foto_promo", "DESC"); 
		$query = $this->db->get();
		return $query;
	}
	
	
	function input_foto_promo() {
		$userfile = $_FILES['userfile']['name'];

		$status_foto_promo = $this->input->post('status_foto_promo');
		$nama_foto_promo = $this->input->post('nama_foto_promo');

			$konfigurasi = array(
				'allowed_types' =>'jpg|png|jpeg',
				'upload_path' => $this->gallerypath,
				'overwrite' => true
			);
			$this->load->library('upload', $konfigurasi);
			$this->upload->do_upload();
			$datafile = $this->upload->data();
	
			$file = $_FILES['userfile']['name'];
			$foto = str_replace(' ', '_', $file);
			
			$data = array(
				'foto_foto_promo' => $foto,
				'tgl_post_foto_promo' => date("Y-m-d H:i:s"),
				'status_foto_promo' => $status_foto_promo,
				'nama_foto_promo' => $nama_foto_promo,
				);
		if ($this->db->insert('foto_promo', $data)){
            return 1;
        } else {
            return 0;
        }
	}

	function edit($id, $status_foto_promo) {
		$data = array(
				'status_foto_promo' => $status_foto_promo,
				);
			$this->db->where('id_foto_promo', $id);
			if ($this->db->update('foto_promo', $data)) {
				return 1;
			} else {
				return 0;
			}
	}

	
	function delete($id){
		$this->db->where('id_foto_promo', $id);
		if($this->db->delete('foto_promo')) {
            return 1;
        } else {
            return 0;
        }
	}	
}
?>