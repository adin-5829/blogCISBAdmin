<?php
Class Produk extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model(array('m_produk', 'm_kategori', 'm_sub_kategori', 'm_komentar'));
	}
	
	function index(){

		if ($this->session->userdata('user_level') == 'admin') {
        
            $nama = $this->session->flashdata('nama');
            $id_produk =$this->session->flashdata('id');
            $banyak = $this->session->flashdata('stok');
        
	        
	        if($this->session->flashdata('jenis')== 'edit'){
	            $data['alert'] = "Data Produk <strong>$nama</strong> Berhasil Dirubah";
	        } elseif($this->session->flashdata('jenis')== 'tambah'){
	            $data['alert'] = "Data Produk <strong>$nama</strong> Berhasil Ditambah";
	        } elseif($this->session->flashdata('jenis')== 'ubah_stok'){
	            $data['alert'] = "Stok Produk No.<strong>$id_produk</strong> Berhasil Ditambah Sebanyak <strong>$banyak</strong>";
	        } elseif($this->session->flashdata('jenis')== 'hapus'){
	            $data['alert'] = "Data Produk <strong>$nama</strong> Berhasil Dihapus";
	        } else {
	            $data['alert'] = null;
	        }
        
/*			$this->load->library('pagination');

			$config['base_url'] = base_url().'produk/index/';
			$config['total_rows'] = $this->db->count_all('produk');
			$config['per_page'] = 20;
			$config['num_links'] = 20;
			$this->pagination->initialize($config);
			$data['hasil'] = $this->m_produk->daftar($config['per_page'], $this->uri->segment(3));*/

			$data['hasil'] = $this->m_produk->daftar(null, null);

			$data['judul'] = "Manajemen Produk";
			$data2['title'] = "Manajemen Produk";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/produk/manajemen_produk', $data);
		} 
		else {
			$this->load->library('pagination');

			$config['base_url'] = base_url().'produk/index/';
			$config['total_rows'] = $this->db->count_all('produk');
			$config['per_page'] = 8;
			$config['num_links'] = 5;
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
			$data['hasil'] = $this->m_produk->daftar($config['per_page'], $this->uri->segment(3));

			$data['kategori'] = $this->m_sub_kategori->daftar();

			$data['judul']	= "Data Produk";
			$data['title']	= "Data Produk" ;

			$data['total_rows'] = $data['hasil']->num_rows();

			$data['page_content'] = 'products';
			
			$this->load->view('web/template',$data);
		}
	}	

	function kategori($id_kategori) {
		$this->load->library('pagination');

		$config['base_url'] = base_url().'produk/kategori/'.$id_kategori.'/';
		$config['total_rows'] = $this->m_produk->daftar(null, null, null, null, $id_kategori)->num_rows();
		$config['per_page'] = 8;
		$config['num_links'] = 5;
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
			$data['hasil'] = $this->m_produk->daftar($config['per_page'], $this->uri->segment(4), null, null, $id_kategori);

			$data['kategori'] = $this->m_sub_kategori->daftar();

			$data['judul']	= "Data Produk";
			$data['title']	= "Data Produk" ;

			$data['total_rows'] = $data['hasil']->num_rows();

			$hasil = $data['hasil']->row();

			$data['nama_sub_kategori']	= $hasil->nama_sub_kategori;

			$data['page_content'] = 'products';
			
			$this->load->view('web/template',$data);
		}

	function cari() {
			/*$this->load->library('pagination');

			$config['base_url'] = base_url().'produk/index/';
			$config['total_rows'] = $this->db->count_all('produk');
			$config['per_page'] = 8;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<p>';
			$config['full_tag_close'] = '</p>';
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
			$config['cur_tag_open'] = '<b>';
			$config['cur_tag_close'] = '</b>';

			$this->pagination->initialize($config);*/

			$data['keyword'] = $this->input->post('keyword');
			$data['hasil'] = $this->m_produk->daftar(null, null, $data['keyword']);

			$data['kategori'] = $this->m_sub_kategori->daftar();

			$data['judul']	= "Data Produk";
			$data['title']	= "Data Produk" ;

			$data['total_rows'] = $data['hasil']->num_rows();

			$data['page_content'] = 'products';
			
			$this->load->view('web/template',$data);
	}


	function lihat($id = null) {
        if($id==null){
                redirect('produk');
            }
		if ($this->session->userdata('user_level') == 'admin' ) {
			$data['hasil'] = $this->m_produk->daftar(null,null,null,$id)->row();
			$data['produk_terbaru'] = $this->m_produk->daftar(4, 0);

			$data['title']= $data['hasil']->nama_produk ;
			$data['id']= $data['hasil']->id_produk ;
			$data['kategori'] = $this->m_sub_kategori->daftar();

			$data['list_komentar'] = $this->m_komentar->daftar(null, null, null, null, $id, 'tampil');

			$data['page_content'] = 'detailproduk';
			
			$this->load->view('web/template',$data);
		} else {
			$data['hasil'] = $this->m_produk->daftar(null,null,null,$id)->row();
			$data['produk_terbaru'] = $this->m_produk->daftar(4, 0);

			$data['title']= $data['hasil']->nama_produk ;
			$data['id']= $data['hasil']->id_produk ;
			$data['kategori'] = $this->m_sub_kategori->daftar();

			$data['list_komentar'] = $this->m_komentar->daftar(null, null, null, null, $id, 'tampil');

			$data['page_content'] = 'detailproduk';
			
			$this->load->view('web/template',$data);
		}
	}

	
	function edit_manajemen_produk() {
		$id = $this->uri->segment(3);
        if($id==null){
                redirect('produk');
            }
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST == NULL) {
				
				$data['hasil'] = $this->m_produk->daftar(null,null,null,$id)->row();
				
				$data2['title'] = "Edit Produk";
				$this->load->view('admin/template', $data2);
				$this->load->view('admin/produk/edit_manajemen_produk', $data);
			}
			else {
				if ($this->m_produk->edit($id) == 1){
                    $data = array(
                      'nama' => $this->input->post('nama_produk'),
                      'jenis' => 'edit'
                    );
                    $this->session->set_flashdata($data);
                   redirect('produk');
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
	
		
	function tambah_produk() {
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST != NULL) {	
				
				if ($this->m_produk->input_produk()== 1){
                    $data = array(
                      'nama' => $this->input->post('nama_produk'),
                      'jenis' => 'tambah'
                    );
                    $this->session->set_flashdata($data);
                   redirect('produk');
                } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
                }
			}
	
			$data2['title'] = "Tambah Produk";

			$this->load->view('admin/template', $data2);
			$this->load->view('admin/produk/tambah_produk');
		}
		else {
			redirect('home');
		}
	}
	
	function delete_manajemen_produk() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			$id = $this->uri->segment(3);
            if($id==null){
                redirect('produk');
            }
            $nama = str_replace('%20', ' ', $this->uri->segment(4));
            if ($this->m_produk->delete($id)== 1){
                    $data = array(
                      'nama' => $nama,
                      'jenis' => 'hapus'
                    );
                    $this->session->set_flashdata($data);
                   redirect('produk');
             } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
            }
		}
		else {
			redirect('home');
		}
	}

	function upload_pricelist() {
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST != NULL) {	
				
				if ($this->m_produk->upload_pricelist()== 1){
                    $data = array(
                      'jenis' => 'upload'
                    );
                    $this->session->set_flashdata($data);
                   redirect('produk/upload_pricelist');
                } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
                }
			}

      
	        
	        if($this->session->flashdata('jenis')== 'upload'){
	            $data2['alert'] = "Data Berhasil Diupload";
	        } else {
	        	$data2['alert'] = null;
	        }
	
			$data2['title'] = "Upload Pricelist";

			$this->load->view('admin/template', $data2);
			$this->load->view('admin/produk/upload_pricelist');
		}
		else {
			redirect('home');
		}
	}

	function donwload_pricelist()
	{
		$this->load->helper('download');

		$path = base_url().'pricelist/pricelist.pdf';

		$data = file_get_contents($path); // Read the file's contents
		$name = 'Pricelist Ultra Chemical.pdf';

		force_download($name, $data); 

		// echo "$path";
	}
    
}
?>