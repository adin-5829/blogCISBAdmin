<?php
Class Kontak extends Ci_Controller {
	
	function __construct()
	{
		parent::__construct();	
		session_start();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->model('Auth_model');
		$this->load->model('m_kontak');

	}

	function index(){
        
        
        if($this->session->flashdata('jenis')== 'tambah'){
            $data['alert'] = "Pesan Berhasil Dikirm";
        } else {
            $data['alert'] = null;
        }

		$data['page_content'] = 'kontak';

		$data['hasil'] = $this->m_kontak->daftar_kontak(1,0)->row();
			
		$this->load->view('web/template',$data);
	}
/*
	function list_kontak() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			
			$this->load->library('pagination');

			$config['base_url'] = base_url().'kontak/list_kontak/';
			$config['total_rows'] = $this->db->count_all('kontak');
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$this->pagination->initialize($config);
			$data['hasil'] = $this->m_kontak->daftar_kontak($config['per_page'], $this->uri->segment(3));

			$data2['title'] = "Daftar kontak";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/list_kontak', $data);
		}
		else {
			redirect('home');
		}
	}*/
	
	function edit_profil_kontak() {
		$id = $this->session->userdata('username');

		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST == NULL) {

				$data['hasil'] = $this->m_kontak->daftar_kontak(1,0)->row();
				
				$data2['title'] = "Edit kontak";
				$this->load->view('admin/template', $data2);
				$this->load->view('admin/ubah_kontak', $data);
			}
			else {

				
				if ($this->m_kontak->updatekontak($id) == 1) {
					redirect ('kontak/profil_kontak');
				} else {
					exit("<script>window.alert('Data gagal diubah')
						window.history.back()</script>");
				}
				
			}
		}
		else {
			redirect('home');
		}
	}
	
		
	/*function tambah_kontak() {
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST != NULL) {	
				
				if ($this->m_kontak->input_kontak() == true) {
					redirect('kontak/list_kontak');
				} else {
					exit("<script>window.alert('Username Sudah Ada')
						window.history.back()</script>");
				}
				
				
			}
	
			$data2['title'] = "Tambah kontak";

			$this->load->view('admin/template', $data2);
			$this->load->view('admin/tambah_kontak');
		}
		else {
			redirect('home');
		}
	}*/
	
	

	function profil_kontak() {
		$id = $this->session->userdata('username');
        if($id==null){
                redirect('kontak');
            }
		$data2['hasil'] = $this->m_kontak->daftar_kontak(1,0)->row();

		$data['title']= "Profil" ;

		$this->load->view('admin/template', $data);
		$this->load->view('admin/profil_kontak', $data2);
	}

	function ubah_password() {
		$id = $this->session->userdata('username');
		$data2['hasil'] = $this->m_kontak->daftar_kontak(1,0,$id)->row();
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST == NULL) {
				$data['error'] = "Silahkan isi dengan benar";
			}
			else {
				$password = $this->input->post('password_baru');
				$password_konf = $this->input->post('password_baru_konf');

				if ($password == $password_konf) {
					$update = $this->m_kontak->edit_password($id);
					if ($update==TRUE) {
						$data['error'] = "Password Berhasil Diubah";
					} else {
						$data['error'] = "!! Password Lama Salah !!";
					}
				} else {
					$data['error'] = "!! Password Konfirmasi Tidak Cocok !!";
				}
			}

			$data['title']="Ubah Password";
			$this->load->view('admin/template', $data);
			$this->load->view('admin/ubah_pass', $data2);
		}
		else {
			redirect('home');
		}
	}
}