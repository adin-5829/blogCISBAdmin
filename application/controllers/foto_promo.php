<?php
Class Foto_promo extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model(array('m_foto_promo'));
	}
	
	function index(){
        
            $nama = $this->session->flashdata('nama');
            $id_foto_promo =$this->session->flashdata('id');
            $banyak = $this->session->flashdata('stok');
        
        
        if($this->session->flashdata('jenis')== 'edit'){
            $data['alert'] = "Status Foto Promo <strong>$nama</strong> Berhasil Dirubah";
        } elseif($this->session->flashdata('jenis')== 'tambah'){
            $data['alert'] = "Data Foto Promo <strong>$nama</strong> Berhasil Ditambah";
        } elseif($this->session->flashdata('jenis')== 'hapus'){
            $data['alert'] = "Data Foto Promo <strong>$nama</strong> Berhasil Dihapus";
        } else {
            $data['alert'] = null;
        }
        

		if ($this->session->userdata('user_level') == 'admin') {
			$this->load->library('pagination');

			$config['base_url'] = base_url().'foto_promo/';
			$config['total_rows'] = $this->db->count_all('foto_promo');
			$config['per_page'] = 1000;
			$config['num_links'] = 20;
			$this->pagination->initialize($config);
			$data['hasil'] = $this->m_foto_promo->daftar($config['per_page'], $this->uri->segment(3));

			$data['judul'] = "Manajemen Foto Promo";
			$data2['title'] = "Manajemen Foto Promo";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/foto_promo/manajemen_foto_promo', $data);
		} 
		else {/*
			$data['hasil'] = $this->m_foto_promo->daftar();
			$data['judul']	= "Data Foto Promo";
			$data['title']	= "Data Foto Promo" ;
			
			$this->load->view('user/template',$data);
			$this->load->view('user/foto_promo/list_foto_promo', $data);*/
		}
	}	

	function cari() {

			$tipe = $this->input->post('tipe');
			$keyword = $this->input->post('cari');
			$data['title']="cari";
         	$data['alert'] = null;


			$config['base_url'] = base_url().'foto_promo/cari/';

			if ($tipe=='nama') {
				$data['hasil'] = $this->m_foto_promo->daftar(null, null, $keyword);
			} elseif ($tipe=='stok'){
				$data['hasil'] = $this->m_foto_promo->daftar(null, null, null, null,$keyword);
			} else {
				redirect ('foto_promo');
			}
			
			

		if ($this->session->userdata('user_level') == 'admin') {
			if ($tipe =='nama') {
				$data['judul'] = "Manajemen Foto Promo <small>Pencarian: $tipe = '$keyword' </small>";
			} else {
				$data['judul'] = "Manajemen Foto Promo <small>Pencarian: $tipe <= '$keyword' </small>";
			}
			
			$data2['title'] = "Manajemen Foto Promo";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/foto_promo/manajemen_foto_promo', $data);
		} else {
			redirect('home');
		}		
	}


	function lihat($id = null) {
        if($id==null){
                redirect('foto_promo');
            }
		if ($this->session->userdata('user_level') == 'admin' ) {
			$data2['hasil'] = $this->m_foto_promo->daftar(null,null,null,$id)->row();

			$data['title']= $data2['hasil']->nama_foto_promo ;
			$data['id']= $data2['hasil']->id_foto_promo ;
			$this->load->view('admin/template',$data);
			$this->load->view('admin/foto_promo/profil_foto_promo', $data2);
		} else {
			$data['hasil'] = $this->m_foto_promo->daftar(null,null,null,$id)->row();
			

			$data['title']= $data['hasil']->nama_foto_promo ;
			$data['id']= $data['hasil']->id_foto_promo ;
			$this->load->view('user/template',$data);
			$this->load->view('user/foto_promo/profil_foto_promo', $data);
		}
	}

	
	function edit_manajemen_foto_promo() {
		$id = $this->uri->segment(3);
		$status_foto_promo = $this->uri->segment(4);
        if($id==null){
                redirect('foto_promo');
            }
		if ($this->session->userdata('user_level') == 'admin') {
			if ($this->m_foto_promo->edit($id, $status_foto_promo) == 1){
                    $data = array(
                      'nama' => $this->input->post('nama_foto_promo'),
                      'jenis' => 'edit'
                    );
                    $this->session->set_flashdata($data);
                   redirect('foto_promo');
                } else {
                   exit("<script>window.alert('Data Gagal Dirubah, Coba Lagi')
						window.history.back()</script>");
                }
		}
		else {
			redirect('home');
		}
	}
	
		
	function tambah_foto_promo() {
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST != NULL) {	
				
				if ($this->m_foto_promo->input_foto_promo()== 1){
                    $data = array(
                      'nama' => $this->input->post('nama_foto_promo'),
                      'jenis' => 'tambah'
                    );
                    $this->session->set_flashdata($data);
                   redirect('foto_promo');
                } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
                }
			}
	
			$data2['title'] = "Tambah Foto Promo";

			$this->load->view('admin/template', $data2);
			$this->load->view('admin/foto_promo/tambah_foto_promo');
		}
		else {
			redirect('home');
		}
	}
	
	function delete_manajemen_foto_promo() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			$id = $this->uri->segment(3);
            if($id==null){
                redirect('foto_promo');
            }
            $nama = str_replace('%20', ' ', $this->uri->segment(4));
            if ($this->m_foto_promo->delete($id)== 1){
                    $data = array(
                      'nama' => $nama,
                      'jenis' => 'hapus'
                    );
                    $this->session->set_flashdata($data);
                   redirect('foto_promo');
             } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
            }
		}
		else {
			redirect('home');
		}
	}
    
}
?>