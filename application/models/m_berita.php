<?php
Class M_berita extends CI_Model {
    var $gallerypath;
	var $gallery_path_url;
       
    function __construct()
    {
        parent::__construct();  
        $this->gallerypath = realpath(APPPATH . '../foto/berita');
		$this->gallery_path_url = base_url().'foto/berita';
    }
    

	function daftar($limit=null, $offset=null, $param=null, $id=null){
		$this->db->select('berita.*');
		$this->db->from('berita');


		if (!is_null($param)) {
			$this->db->like('judul_berita', $param);
			$this->db->or_like('id_berita', $param);
		}

		if (!is_null($id)) {
			$this->db->where('id_berita', $id);
		}
		
		if (!is_null($limit) && !is_null($offset) ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by("id_berita", "DESC"); 
		$query = $this->db->get();
		return $query;
	}
	
	
	function input_berita() {
		$userfile = $_FILES['userfile']['name'];

		$isi_berita = $this->input->post('isi_berita');
		$judul_berita = $this->input->post('judul_berita');

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
				'judul_berita' => $judul_berita,
				'isi_berita' => $isi_berita,
				'foto_berita' => $foto,
				'tgl_post_berita' => date("Y-m-d H:i:s"),
				'id_admin' => $this->session->userdata('id_admin'),
				);
		if ($this->db->insert('berita', $data)){
            return 1;
        } else {
            return 0;
        }
	}

	function edit($id) {
		$userfile = $_FILES['userfile']['name'];

		$isi_berita = $this->input->post('isi_berita');
		$judul_berita = $this->input->post('judul_berita');


		if(!empty($userfile)){
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
				'judul_berita' => $judul_berita,
				'isi_berita' => $isi_berita,
				'foto_berita' => $foto,
				);
			$this->db->where('id_berita', $id);
			if ($this->db->update('berita', $data)) {
				return 1;
			} else {
				return 0;
			}
		} else {
			$data = array(
				'judul_berita' => $judul_berita,
				'isi_berita' => $isi_berita,
				);

			$this->db->where('id_berita', $id);
			if ($this->db->update('berita', $data)) {
				return 1;
			} else {
				return 0;
			}
		}
	
	}

	
	function delete($id){
		$this->db->where('id_berita', $id);
		if($this->db->delete('berita')) {
            return 1;
        } else {
            return 0;
        }
	}	
}
?>