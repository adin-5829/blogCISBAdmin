<?php
Class M_galeri_foto extends CI_Model {
    var $gallerypath;
	var $gallery_path_url;
       
    function __construct()
    {
        parent::__construct();  
        $this->gallerypath = realpath(APPPATH . '../foto/galeri_foto');
		$this->gallery_path_url = base_url().'foto/galeri_foto';
    }
    

	function daftar($limit=null, $offset=null, $param=null, $id=null){
		$this->db->select('galeri_foto.*');
		$this->db->from('galeri_foto');


		if (!is_null($param)) {
			$this->db->like('judul_galeri_foto', $param);
			$this->db->or_like('id_galeri_foto', $param);
		}

		if (!is_null($id)) {
			$this->db->where('id_galeri_foto', $id);
		}


		if (!is_null($limit) && !is_null($offset) ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by("id_galeri_foto", "DESC"); 
		$query = $this->db->get();
		return $query;
	}
	
	
	function input_galeri_foto() {
		$userfile = $_FILES['userfile']['name'];

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
				'foto_galeri_foto' => $foto,
				'tgl_post_galeri_foto' => date("Y-m-d H:i:s"),
				);
		if ($this->db->insert('galeri_foto', $data)){
            return 1;
        } else {
            return 0;
        }
	}

/*	function edit($id, $status_galeri_foto) {
		$data = array(
				'status_galeri_foto' => $status_galeri_foto,
				);
			$this->db->where('id_galeri_foto', $id);
			if ($this->db->update('galeri_foto', $data)) {
				return 1;
			} else {
				return 0;
			}
	}*/

	
	function delete($id){
		$this->db->where('id_galeri_foto', $id);
		if($this->db->delete('galeri_foto')) {
            return 1;
        } else {
            return 0;
        }
	}	
}
?>