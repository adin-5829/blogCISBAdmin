<?php
Class Galeri_foto extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model(array('m_galeri_foto'));
	}
	
	function index(){
/*        
            $nama = $this->session->flashdata('nama');
            $id_galeri_foto =$this->session->flashdata('id');
            $banyak = $this->session->flashdata('stok');*/
            if ($this->session->userdata('user_level') == 'admin') {


            	if($this->session->flashdata('jenis')== 'edit'){
            		$data['alert'] = "Status Galeri Foto Berhasil Dirubah";
            	} elseif($this->session->flashdata('jenis')== 'tambah'){
            		$data['alert'] = "Data Galeri Foto Berhasil Ditambah";
            	} elseif($this->session->flashdata('jenis')== 'hapus'){
            		$data['alert'] = "Data Galeri Foto Berhasil Dihapus";
            	} else {
            		$data['alert'] = null;
            	}


            	$this->load->library('pagination');

            	$config['base_url'] = base_url().'galeri_foto/index';
            	$config['total_rows'] = $this->db->count_all('galeri_foto');
            	$config['per_page'] = 1000;
            	$config['num_links'] = 20;
            	$this->pagination->initialize($config);
            	$data['hasil'] = $this->m_galeri_foto->daftar($config['per_page'], $this->uri->segment(3));

            	$data['judul'] = "Manajemen Galeri Foto";
            	$data2['title'] = "Manajemen Galeri Foto";
            	$this->load->view('admin/template', $data2);
            	$this->load->view('admin/galeri_foto/manajemen_galeri_foto', $data);
            } 
            else {
            	$this->load->library('pagination');
            	
            	$config['base_url'] = base_url().'galeri_foto/index';
            	$config['total_rows'] = $this->db->count_all('galeri_foto');
            	$config['per_page'] = 16;
            	$config['uri_segment'] = 3;
            	$config['num_links'] = 3;
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
            	
            	$data['hasil'] = $this->m_galeri_foto->daftar($config['per_page'], $this->uri->segment(3));
            	$data['judul']	= "Data Galeri Foto";
            	$data['title']	= "Data Galeri Foto" ;

            	$data['total_rows'] = $data['hasil']->num_rows();

				$data['page_content'] = 'foto';
				
				$this->load->view('web/template',$data);
            }
        }	

/*	function cari() {

			$tipe = $this->input->post('tipe');
			$keyword = $this->input->post('cari');
			$data['title']="cari";
         	$data['alert'] = null;


			$config['base_url'] = base_url().'galeri_foto/cari/';

			if ($tipe=='nama') {
				$data['hasil'] = $this->m_galeri_foto->daftar(null, null, $keyword);
			} elseif ($tipe=='stok'){
				$data['hasil'] = $this->m_galeri_foto->daftar(null, null, null, null,$keyword);
			} else {
				redirect ('galeri_foto');
			}
			
			

		if ($this->session->userdata('user_level') == 'admin') {
			if ($tipe =='nama') {
				$data['judul'] = "Manajemen Galeri Foto <small>Pencarian: $tipe = '$keyword' </small>";
			} else {
				$data['judul'] = "Manajemen Galeri Foto <small>Pencarian: $tipe <= '$keyword' </small>";
			}
			
			$data2['title'] = "Manajemen Galeri Foto";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/galeri_foto/manajemen_galeri_foto', $data);
		} else {
			redirect('home');
		}		
	}


	function lihat($id = null) {
        if($id==null){
                redirect('galeri_foto');
            }
		if ($this->session->userdata('user_level') == 'admin' ) {
			$data2['hasil'] = $this->m_galeri_foto->daftar(null,null,null,$id)->row();

			$data['title']= $data2['hasil']->nama_galeri_foto ;
			$data['id']= $data2['hasil']->id_galeri_foto ;
			$this->load->view('admin/template',$data);
			$this->load->view('admin/galeri_foto/profil_galeri_foto', $data2);
		} else {
			$data['hasil'] = $this->m_galeri_foto->daftar(null,null,null,$id)->row();
			

			$data['title']= $data['hasil']->nama_galeri_foto ;
			$data['id']= $data['hasil']->id_galeri_foto ;
			$this->load->view('user/template',$data);
			$this->load->view('user/galeri_foto/profil_galeri_foto', $data);
		}
	}*/

	
/*	function edit_manajemen_galeri_foto() {
		$id = $this->uri->segment(3);
		$status_galeri_foto = $this->uri->segment(4);
        if($id==null){
                redirect('galeri_foto');
            }
		if ($this->session->userdata('user_level') == 'admin') {
			if ($this->m_galeri_foto->edit($id, $status_galeri_foto) == 1){
                    $data = array(
                      'nama' => $this->input->post('nama_galeri_foto'),
                      'jenis' => 'edit'
                    );
                    $this->session->set_flashdata($data);
                   redirect('galeri_foto');
                } else {
                   exit("<script>window.alert('Data Gagal Dirubah, Coba Lagi')
						window.history.back()</script>");
                }
		}
		else {
			redirect('home');
		}
	}
	*/
		
	function tambah_galeri_foto() {
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST != NULL) {	
				
				if ($this->m_galeri_foto->input_galeri_foto()== 1){
                    
                   redirect('galeri_foto');
                } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
                }
			}
	
			$data2['title'] = "Tambah Galeri Foto";

			$this->load->view('admin/template', $data2);
			$this->load->view('admin/galeri_foto/tambah_galeri_foto');
		}
		else {
			redirect('home');
		}
	}
	
	function delete_manajemen_galeri_foto() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			$id = $this->uri->segment(3);
            if($id==null){
                redirect('galeri_foto');
            }
            $nama = str_replace('%20', ' ', $this->uri->segment(4));
            if ($this->m_galeri_foto->delete($id)== 1){
                    $data = array(
                      'nama' => $nama,
                      'jenis' => 'hapus'
                    );
                    $this->session->set_flashdata($data);
                   redirect('galeri_foto');
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