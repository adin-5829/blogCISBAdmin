<?php
Class Berita extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model(array('m_berita', 'm_produk'));
	}
	
	function index(){

		if ($this->session->userdata('user_level') == 'admin') {

			$nama = $this->session->flashdata('nama');
			$id_berita =$this->session->flashdata('id');
			$banyak = $this->session->flashdata('stok');


			if($this->session->flashdata('jenis')== 'edit'){
				$data['alert'] = "Data Berita <strong>$nama</strong> Berhasil Dirubah";
			} elseif($this->session->flashdata('jenis')== 'tambah'){
				$data['alert'] = "Data Berita <strong>$nama</strong> Berhasil Ditambah";
			} elseif($this->session->flashdata('jenis')== 'hapus'){
				$data['alert'] = "Data Berita <strong>$nama</strong> Berhasil Dihapus";
			} else {
				$data['alert'] = null;
			}


			$this->load->library('pagination');

			$config['base_url'] = base_url().'berita/index/';
			$config['total_rows'] = $this->db->count_all('berita');
			$config['per_page'] = 1000;
			$config['num_links'] = 5;
			$this->pagination->initialize($config);
			$data['hasil'] = $this->m_berita->daftar($config['per_page'], $this->uri->segment(3));

			$data['judul'] = "Manajemen Berita";
			$data2['title'] = "Manajemen Berita";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/berita/manajemen_berita', $data);
		} 
		else {
			$this->load->library('pagination');

			$config['base_url'] = base_url().'berita/index/';
			$config['total_rows'] = $this->db->count_all('berita');
			$config['per_page'] = 5;
			$config['num_links'] = 20;
						$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$data['hasil'] = $this->m_berita->daftar($config['per_page'], $this->uri->segment(3));

			$data['judul']	= "Data Berita";
			$data['title']	= "Data Berita" ;

			$data['total_rows'] = $data['hasil']->num_rows();

			$data['page_content'] = 'news';
			
			$this->load->view('web/template',$data);
		}
	}	

	function cari() {
/*			$this->load->library('pagination');

			$config['base_url'] = base_url().'berita/index/';
			$config['total_rows'] = $this->db->count_all('berita');
			$config['per_page'] = 5;
			$config['num_links'] = 20;
			$this->pagination->initialize($config);*/
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil'] = $this->m_berita->daftar(null, null, $data['keyword']);

			$data['judul']	= "Data Berita";
			$data['title']	= "Data Berita" ;

			$data['total_rows'] = $data['hasil']->num_rows();

			$data['page_content'] = 'news';
			
			$this->load->view('web/template',$data);
		}


	function lihat($id = null) {
        if($id==null){
                redirect('berita');
            }
		if ($this->session->userdata('user_level') == 'admin' ) {
			$data2['hasil'] = $this->m_berita->daftar(null,null,null,$id)->row();

			$data['title']= $data2['hasil']->judul_berita ;
			$data['id']= $data2['hasil']->id_berita ;
			$this->load->view('admin/template',$data);
			$this->load->view('admin/berita/profil_berita', $data2);
		} else {
			$data['hasil'] = $this->m_berita->daftar(null,null,null,$id)->row();

			$data['list_arsip'] = $this->m_berita->daftar(6, 0);
			$data['list_produk'] = $this->m_produk->daftar(4, 0);


			$data['page_content'] = 'detailnews';

			$data['title']= $data['hasil']->judul_berita ;
			$data['id']= $data['hasil']->id_berita ;

			$this->load->view('web/template',$data);
		}
	}

	
	function edit_manajemen_berita() {
		$id = $this->uri->segment(3);
        if($id==null){
                redirect('berita');
            }
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST == NULL) {
				
				$data['hasil'] = $this->m_berita->daftar(null,null,null,$id)->row();
				
				$data2['title'] = "Edit Berita";
				$this->load->view('admin/template', $data2);
				$this->load->view('admin/berita/edit_manajemen_berita', $data);
			}
			else {
				if ($this->m_berita->edit($id) == 1){
                    $data = array(
                      'nama' => $this->input->post('nama_berita'),
                      'jenis' => 'edit'
                    );
                    $this->session->set_flashdata($data);
                   redirect('berita');
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
	
		
	function tambah_berita() {
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST != NULL) {	
				
				if ($this->m_berita->input_berita()== 1){
                    $data = array(
                      'nama' => $this->input->post('nama_berita'),
                      'jenis' => 'tambah'
                    );
                    $this->session->set_flashdata($data);
                   redirect('berita');
                } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
                }
			}
	
			$data2['title'] = "Tambah Berita";

			$this->load->view('admin/template', $data2);
			$this->load->view('admin/berita/tambah_berita');
		}
		else {
			redirect('home');
		}
	}
	
	function delete_manajemen_berita() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			$id = $this->uri->segment(3);
            if($id==null){
                redirect('berita');
            }
            $nama = str_replace('%20', ' ', $this->uri->segment(4));
            if ($this->m_berita->delete($id)== 1){
                    $data = array(
                      'nama' => $nama,
                      'jenis' => 'hapus'
                    );
                    $this->session->set_flashdata($data);
                   redirect('berita');
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