<?php
Class Hubungi_kami extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model(array('m_hubungi_kami', 'm_kategori'));
	}
	
	function index(){
        
            $nama = $this->session->flashdata('nama');
            $id_barang =$this->session->flashdata('id');
        
        
        if($this->session->flashdata('jenis')== 'edit'){
            $data['alert'] = "Data Pesan Berhasil Ditampilkan";
        } elseif($this->session->flashdata('jenis')== 'hapus'){
            $data['alert'] = "Data Pesan Berhasil Dihapus";
        } else {
            $data['alert'] = null;
        }
        

		if ($this->session->userdata('user_level') == 'admin') {
			$this->load->library('pagination');

			$data['hasil'] = $this->m_hubungi_kami->daftar();

			$data['judul'] = "Manajemen Pesan";
			$data2['title'] = "Manajemen Pesan";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/hubungi_kami/manajemen_hubungi_kami', $data);
		} 
		else {
			redirect('home');
		}
	}	
/*
	function hubungi_kami_tertampil(){              

		if ($this->session->userdata('user_level') == 'admin') {

			$total_tampil = $this->m_hubungi_kami->daftar(null, null, null, null, null, 'tampil');

			$this->load->library('pagination');
			
			$config['base_url'] = base_url().'hubungi_kami/hubungi_kami_tertampil';
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

			$data['hasil'] = $this->m_hubungi_kami->daftar($config['per_page'], $config['uri_segment'], null, null, null, 'tampil');

			$data['judul'] = "hubungi_kami Tertampil";
			$data2['title'] = "hubungi_kami Tertampil";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/hubungi_kami/manajemen_hubungi_kami', $data);
		} 
		else {
			redirect('home');
		}
	}	
*/

	function lihat($id = null) {
        if($id==null){
                redirect('hubungi_kami');
            }

            if ($this->session->userdata('user_level') == 'admin' ) {
			$data2['hasil'] = $this->m_hubungi_kami->daftar(null,null,null,$id)->row();

			$data['title']= $data2['hasil']->nama_hubungi_kami ;
			$data['id']= $data2['hasil']->id_hubungi_kami ;
			$this->load->view('admin/template',$data);
			$this->load->view('admin/hubungi_kami/detailHubungiKami', $data2);
		} else {
			redirect('home');
		}
	}

	/*
	function edit_manajemen_hubungi_kami() {
		$id = $this->uri->segment(3);
        if($id==null){
                redirect('hubungi_kami');
            }
		if ($this->session->userdata('user_level') == 'admin') {
			if ($this->m_hubungi_kami->edit($id) == 1){
                    $data = array(
                      'nama' => $this->input->post('nama_hubungi_kami'),
                      'jenis' => 'edit'
                    );
                    $this->session->set_flashdata($data);
                   redirect('hubungi_kami');
                } else {
                   exit("<script>window.alert('Data Gagal Dirubah, Coba Lagi')
						window.history.back()</script>");
                }
		}
		else {
			redirect('home');
		}
	}*/
	
		
	function tambah_hubungi_kami() {
		
			if($_POST != NULL) {	
				
				if ($this->m_hubungi_kami->input_produk()== 1){
                    $data = array(
                      'nama' => $this->input->post('nama_hubungi_kami'),
                      'jenis' => 'tambah'
                    );
                    $this->session->set_flashdata($data);
                   redirect('kontak');
                } else {
                   exit("<script>window.alert('Data Gagal Disimpan, Coba Lagi')
						window.history.back()</script>");
                }
			} else {
				redirect('home','refresh');
			} 

		
	}
	
	function delete_manajemen_hubungi_kami() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			$id = $this->uri->segment(3);
            if($id==null){
                redirect('hubungi_kami');
            }
            $nama = str_replace('%20', ' ', $this->uri->segment(4));
            if ($this->m_hubungi_kami->delete($id)== 1){
                    $data = array(
                      'nama' => $nama,
                      'jenis' => 'hapus'
                    );
                    $this->session->set_flashdata($data);
                   redirect('hubungi_kami');
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