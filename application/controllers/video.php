<?php
Class Video extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model(array('m_video'));
	}
	
	function index(){
        
       if ($this->session->userdata('user_level') == 'admin') {
            $nama = $this->session->flashdata('nama');
            $id_video =$this->session->flashdata('id');
            $banyak = $this->session->flashdata('stok');
        
        
        if($this->session->flashdata('jenis')== 'edit'){
            $data['alert'] = "Status Video <strong>$nama</strong> Berhasil Dirubah";
        } elseif($this->session->flashdata('jenis')== 'tambah'){
            $data['alert'] = "Data Video <strong>$nama</strong> Berhasil Ditambah";
        } elseif($this->session->flashdata('jenis')== 'hapus'){
            $data['alert'] = "Data Video <strong>$nama</strong> Berhasil Dihapus";
        } else {
            $data['alert'] = null;
        }
        

		
			$this->load->library('pagination');

			$config['base_url'] = base_url().'video/index';
			$config['total_rows'] = $this->db->count_all('video');
			$config['per_page'] = 20;
			$config['num_links'] = 20;
			$this->pagination->initialize($config);
			$data['hasil'] = $this->m_video->daftar($config['per_page'], $this->uri->segment(3));

			$data['judul'] = "Manajemen Video";
			$data2['title'] = "Manajemen Video";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/video/manajemen_video', $data);
		} 
		else {
			$this->load->library('pagination');

			$config['base_url'] = base_url().'video/index';
			$config['total_rows'] = $this->db->count_all('video');
			$config['per_page'] = 3;
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

			$data['hasil'] = $this->m_video->daftar($config['per_page'], $this->uri->segment(3));
			$data['judul']	= "Data Video";
			$data['title']	= "Data Video" ;
			
			$data['page_content'] = 'video';

			$this->load->view('web/template',$data);
		}
	}	

	function cari() {

			$tipe = $this->input->post('tipe');
			$keyword = $this->input->post('cari');
			$data['title']="cari";
         	$data['alert'] = null;


			$config['base_url'] = base_url().'video/cari/';

			if ($tipe=='nama') {
				$data['hasil'] = $this->m_video->daftar(null, null, $keyword);
			} elseif ($tipe=='stok'){
				$data['hasil'] = $this->m_video->daftar(null, null, null, null,$keyword);
			} else {
				redirect ('video');
			}
			
			

		if ($this->session->userdata('user_level') == 'admin') {
			if ($tipe =='nama') {
				$data['judul'] = "Manajemen Video <small>Pencarian: $tipe = '$keyword' </small>";
			} else {
				$data['judul'] = "Manajemen Video <small>Pencarian: $tipe <= '$keyword' </small>";
			}
			
			$data2['title'] = "Manajemen Video";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/video/manajemen_video', $data);
		} else {
			redirect('home');
		}		
	}


	function lihat($id = null) {
        if($id==null){
                redirect('video');
            }
		if ($this->session->userdata('user_level') == 'admin' ) {
			$data2['hasil'] = $this->m_video->daftar(null,null,null,$id)->row();

			$data['title']= $data2['hasil']->nama_video ;
			$data['id']= $data2['hasil']->id_video ;
			$this->load->view('admin/template',$data);
			$this->load->view('admin/video/profil_video', $data2);
		} else {
			$data['hasil'] = $this->m_video->daftar(null,null,null,$id)->row();
			

			$data['title']= $data['hasil']->nama_video ;
			$data['id']= $data['hasil']->id_video ;
			$this->load->view('user/template',$data);
			$this->load->view('user/video/profil_video', $data);
		}
	}

	
	function edit_manajemen_video() {
		$id = $this->uri->segment(3);
        if($id==null){
                redirect('video');
            }
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST == NULL) {
				
				$data['hasil'] = $this->m_video->daftar(null,null,null,$id)->row();
				
				$data2['title'] = "Edit Video";
				$this->load->view('admin/template', $data2);
				$this->load->view('admin/video/edit_manajemen_video', $data);
			}
			else {
				if ($this->m_video->edit($id) == 1){
                    $data = array(
                      'nama' => $this->input->post('nama_video'),
                      'jenis' => 'edit'
                    );
                    $this->session->set_flashdata($data);
                   redirect('video');
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
	
		
	function tambah_video() {
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST != NULL) {	
				
				if ($this->m_video->input_video()== 1){
                    $data = array(
                      'nama' => $this->input->post('nama_video'),
                      'jenis' => 'tambah'
                    );
                    $this->session->set_flashdata($data);
                   redirect('video');
                } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
                }
			}
	
			$data2['title'] = "Tambah Video";

			$this->load->view('admin/template', $data2);
			$this->load->view('admin/video/tambah_video');
		}
		else {
			redirect('home');
		}
	}
	
	function delete_manajemen_video() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			$id = $this->uri->segment(3);
            if($id==null){
                redirect('video');
            }
            $nama = str_replace('%20', ' ', $this->uri->segment(4));
            if ($this->m_video->delete($id)== 1){
                    $data = array(
                      'nama' => $nama,
                      'jenis' => 'hapus'
                    );
                    $this->session->set_flashdata($data);
                   redirect('video');
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