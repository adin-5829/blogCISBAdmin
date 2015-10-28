<?php
Class Komentar extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model(array('m_komentar', 'm_kategori'));
	}
	
	function index(){
        
            $nama = $this->session->flashdata('nama');
            $id_barang =$this->session->flashdata('id');
        
        
        if($this->session->flashdata('jenis')== 'edit'){
            $data['alert'] = "Data Komentar Berhasil Ditampilkan";
        } elseif($this->session->flashdata('jenis')== 'hapus'){
            $data['alert'] = "Data Komentar Berhasil Dihapus";
        } else {
            $data['alert'] = null;
        }
        

		if ($this->session->userdata('user_level') == 'admin') {
			$this->load->library('pagination');

			$data['hasil'] = $this->m_komentar->daftar();

			$data['judul'] = "Manajemen Komentar";
			$data2['title'] = "Manajemen Komentar";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/komentar/manajemen_komentar', $data);
		} 
		else {
			redirect('home');
		}
	}	

	function komentar_tertampil(){              

		if ($this->session->userdata('user_level') == 'admin') {

			$total_tampil = $this->m_komentar->daftar(null, null, null, null, null, 'tampil');

			$this->load->library('pagination');
			
			$config['base_url'] = base_url().'komentar/komentar_tertampil';
			$config['total_rows'] = $total_tampil->num_rows();
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$config['num_links'] = 3;
			$config['full_tag_open'] = '<p>';
			$config['full_tag_close'] = '</p>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<div>';
			$config['first_tag_close'] = '</div>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<div>';
			$config['last_tag_close'] = '</div>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<div>';
			$config['next_tag_close'] = '</div>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<div>';
			$config['prev_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<b>';
			$config['cur_tag_close'] = '</b>';
			
			$this->pagination->initialize($config);			

			$data['hasil'] = $this->m_komentar->daftar($config['per_page'], $config['uri_segment'], null, null, null, 'tampil');

			$data['judul'] = "Komentar Tertampil";
			$data2['title'] = "Komentar Tertampil";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/komentar/manajemen_komentar', $data);
		} 
		else {
			redirect('home');
		}
	}	


/*	function lihat($id = null) {
        if($id==null){
                redirect('komentar');
            }
		if ($this->session->userdata('user_level') == 'user' ) {
			$data['hasil'] = $this->m_komentar->daftar(null,null,null,$id)->row();
			

			$data['title']= $data['hasil']->nama_barang ;
			$data['id']= $data['hasil']->id_barang ;
			$this->load->view('user/template',$data);
			$this->load->view('user/produk/profil_produk', $data);
		} else if ($this->session->userdata('user_level') == 'admin' ) {
			$data2['hasil'] = $this->m_komentar->daftar(null,null,null,$id)->row();

			$data['title']= $data2['hasil']->nama_barang ;
			$data['id']= $data2['hasil']->id_barang ;
			$this->load->view('admin/template',$data);
			$this->load->view('admin/produk/profil_produk', $data2);
		} else {
			redirect('home');
		}
	}*/

	
	function edit_manajemen_komentar() {
		$id = $this->uri->segment(3);
        if($id==null){
                redirect('komentar');
            }
		if ($this->session->userdata('user_level') == 'admin') {
			if ($this->m_komentar->edit($id) == 1){
                    $data = array(
                      'nama' => $this->input->post('nama_komentar'),
                      'jenis' => 'edit'
                    );
                    $this->session->set_flashdata($data);
                   redirect('komentar');
                } else {
                   exit("<script>window.alert('Data Gagal Dirubah, Coba Lagi')
						window.history.back()</script>");
                }
		}
		else {
			redirect('home');
		}
	}
	
		
	function tambah_komentar() {
		
			if($_POST != NULL) {	
				
				if ($this->m_komentar->input_produk()== 1){
                    $data = array(
                      'nama' => $this->input->post('nama_komentar'),
                      'jenis' => 'tambah'
                    );
                    $this->session->set_flashdata($data);
                   redirect('produk/lihat/'.$this->input->post('id_produk'));
                } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
                }
			} else {
				redirect('home','refresh');
			} 

		
	}
	
	function delete_manajemen_komentar() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			$id = $this->uri->segment(3);
            if($id==null){
                redirect('komentar');
            }
            $nama = str_replace('%20', ' ', $this->uri->segment(4));
            if ($this->m_komentar->delete($id)== 1){
                    $data = array(
                      'nama' => $nama,
                      'jenis' => 'hapus'
                    );
                    $this->session->set_flashdata($data);
                   redirect('komentar');
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