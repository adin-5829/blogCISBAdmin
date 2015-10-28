<?php
Class Kategori extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model(array('m_kategori'));
	}
	
	function index(){
        
            $nama = $this->session->flashdata('nama');
            $id_barang =$this->session->flashdata('id');
        
        
        if($this->session->flashdata('jenis')== 'edit'){
            $data['alert'] = "Data Kategori <strong>$nama</strong> Berhasil Dirubah";
        } elseif($this->session->flashdata('jenis')== 'tambah'){
            $data['alert'] = "Data Kategori <strong>$nama</strong> Berhasil Ditambah";
        }  elseif($this->session->flashdata('jenis')== 'hapus'){
            $data['alert'] = "Data Kategori <strong>$nama</strong> Berhasil Dihapus";
        } else {
            $data['alert'] = null;
        }
        

		if ($this->session->userdata('user_level') == 'admin') {
			$this->load->library('pagination');

			$data['hasil'] = $this->m_kategori->daftar();

			$data['judul'] = "Manajemen Kategori";
			$data2['title'] = "Manajemen Kategori";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/kategori/manajemen_kategori', $data);
		} 
		else {
			redirect('home');
		}
	}	


/*	function lihat($id = null) {
        if($id==null){
                redirect('kategori');
            }
		if ($this->session->userdata('user_level') == 'user' ) {
			$data['hasil'] = $this->m_kategori->daftar(null,null,null,$id)->row();
			

			$data['title']= $data['hasil']->nama_barang ;
			$data['id']= $data['hasil']->id_barang ;
			$this->load->view('user/template',$data);
			$this->load->view('user/produk/profil_produk', $data);
		} else if ($this->session->userdata('user_level') == 'admin' ) {
			$data2['hasil'] = $this->m_kategori->daftar(null,null,null,$id)->row();

			$data['title']= $data2['hasil']->nama_barang ;
			$data['id']= $data2['hasil']->id_barang ;
			$this->load->view('admin/template',$data);
			$this->load->view('admin/produk/profil_produk', $data2);
		} else {
			redirect('home');
		}
	}*/

	
	function edit_manajemen_kategori() {
		$id = $this->uri->segment(3);
        if($id==null){
                redirect('kategori');
            }
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST == NULL) {
				
				$data['hasil'] = $this->m_kategori->daftar(null,null,null,$id)->row();
				
				$data2['title'] = "Edit Kategori";
				$this->load->view('admin/template', $data2);
				$this->load->view('admin/kategori/edit_manajemen_kategori', $data);
			}
			else {
				if ($this->m_kategori->edit($id) == 1){
                    $data = array(
                      'nama' => $this->input->post('nama_kategori'),
                      'jenis' => 'edit'
                    );
                    $this->session->set_flashdata($data);
                   redirect('kategori');
                } else {
                   exit("<script>window.alert('Data Gagal Dirubah, Coba Lagi')
						window.history.back()</script>");
                }
                
				
			}
		}
		else {
			redirect('home');
		}
	}
	
		
	function tambah_kategori() {
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST != NULL) {	
				
				if ($this->m_kategori->input_produk()== 1){
                    $data = array(
                      'nama' => $this->input->post('nama_kategori'),
                      'jenis' => 'tambah'
                    );
                    $this->session->set_flashdata($data);
                   redirect('kategori');
                } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
                }
			}
	
			$data2['title'] = "Tambah Kategori";

			$this->load->view('admin/template', $data2);
			$this->load->view('admin/kategori/tambah_kategori');
		}
		else {
			redirect('home');
		}
	}
	
	function delete_manajemen_kategori() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			$id = $this->uri->segment(3);
            if($id==null){
                redirect('kategori');
            }
            $nama = str_replace('%20', ' ', $this->uri->segment(4));
            if ($this->m_kategori->delete($id)== 1){
                    $data = array(
                      'nama' => $nama,
                      'jenis' => 'hapus'
                    );
                    $this->session->set_flashdata($data);
                   redirect('kategori');
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