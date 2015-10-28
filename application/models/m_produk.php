<?php
Class M_produk extends CI_Model {
    var $gallerypath;
	var $gallery_path_url;
       
    function __construct()
    {
        parent::__construct();  
        $this->gallerypath = realpath(APPPATH . '../foto/produk');
		$this->gallery_path_url = base_url().'foto/produk';
		 $this->gallerypath_file = realpath(APPPATH . '../pricelist');
		$this->gallery_path_file_url = base_url().'pricelist';
    }
    

	function daftar($limit=null, $offset=null, $param=null, $id=null, $sub_kategori = null){
		$this->db->select('produk.*, sub_kategori.nama_sub_kategori');
		$this->db->from('produk');
		$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = produk.id_sub_kategori', 'left');


		if (!is_null($param)) {
			$this->db->like('nama_produk', $param);
			// $this->db->or_like('id_produk', $param);
		}

		if (!is_null($id)) {
			$this->db->where('id_produk', $id);
		}

		if (!is_null($sub_kategori)) {
			$this->db->where('produk.id_sub_kategori', $sub_kategori);
		}

		if (!is_null($limit) && !is_null($offset) ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by("id_produk", "DESC"); 
		$query = $this->db->get();
		return $query;
	}
	
	
	function input_produk() {
		$userfile = $_FILES['userfile']['name'];

		$detail_produk = $this->input->post('detail_produk');
		$nama_produk = $this->input->post('nama_produk');
		$sub_kategori = $this->input->post('sub_kategori');

		$kemasan_produk = $this->input->post('kemasan_produk');
		$saran_produk = $this->input->post('saran_produk');

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
				'nama_produk' => $nama_produk,
				'id_sub_kategori' => $sub_kategori,
				'detail_produk' => $detail_produk,
				'foto_produk' => $foto,
				'kemasan_produk' => $kemasan_produk,
				'saran_produk' => $saran_produk,
				'tgl_post_produk' => date("Y-m-d H:i:s"),
				'id_admin' => $this->session->userdata('id_admin'),
				);
		if ($this->db->insert('produk', $data)){
            return 1;
        } else {
            return 0;
        }
	}

	function edit($id) {
		$userfile = $_FILES['userfile']['name'];

		$detail_produk = $this->input->post('detail_produk');
		$nama_produk = $this->input->post('nama_produk');
		$sub_kategori = $this->input->post('sub_kategori');

		$kemasan_produk = $this->input->post('kemasan_produk');
		$saran_produk = $this->input->post('saran_produk');


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
				'nama_produk' => $nama_produk,
				'id_sub_kategori' => $sub_kategori,
				'detail_produk' => $detail_produk,
				'foto_produk' => $foto,
				'kemasan_produk' => $kemasan_produk,
				'saran_produk' => $saran_produk,
				);
			$this->db->where('id_produk', $id);
			if ($this->db->update('produk', $data)) {
				return 1;
			} else {
				return 0;
			}
		} else {
			$data = array(
				'nama_produk' => $nama_produk,
				'id_sub_kategori' => $sub_kategori,
				'detail_produk' => $detail_produk,
				'kemasan_produk' => $kemasan_produk,
				'saran_produk' => $saran_produk,
				);

			$this->db->where('id_produk', $id);
			if ($this->db->update('produk', $data)) {
				return 1;
			} else {
				return 0;
			}
		}
	
	}

	
	function delete($id){
		$this->db->where('id_produk', $id);
		if($this->db->delete('produk')) {
            return 1;
        } else {
            return 0;
        }
	}	

	function upload_pricelist() {
		$userfile = $_FILES['userfile']['name'];


			$konfigurasi = array(
				'allowed_types' =>'pdf',
				'upload_path' => $this->gallerypath_file,
				'overwrite' => true,
				'file_name' => 'pricelist.pdf',
			);
			$this->load->library('upload', $konfigurasi);

			if ($this->upload->do_upload()) {
				$datafile = $this->upload->data();
		
				// $file_pricelist = $_FILES['userfile']['name'];
				$foto = str_replace(' ', '_', $file);
				
				$data = array(
					'file_pricelist' => 'pricelist.pdf',
					'tgl_post_pricelist' => date("Y-m-d H:i:s"),
					);

				$this->db->empty_table('pricelist'); 

				if ($this->db->insert('pricelist', $data)){
		            return 1;
		        } else {
		            return 0;
		        }
			} else {
				return 0;
			}
	}

}
?>