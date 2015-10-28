<?php
Class Admin extends Ci_Controller {
	
	function __construct()
	{
		parent::__construct();	
		session_start();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Auth_model');
		$this->load->model('m_admin');

	}

	function index(){
		redirect('home');
	}
/*
	function list_admin() {
		if ($this->session->userdata('user_level') == 'admin') {
			
			
			$this->load->library('pagination');

			$config['base_url'] = base_url().'admin/list_admin/';
			$config['total_rows'] = $this->db->count_all('admin');
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$this->pagination->initialize($config);
			$data['hasil'] = $this->m_admin->daftar_admin($config['per_page'], $this->uri->segment(3));

			$data2['title'] = "Daftar Admin";
			$this->load->view('admin/template', $data2);
			$this->load->view('admin/list_admin', $data);
		}
		else {
			redirect('home');
		}
	}*/
	
	function edit_profil_admin() {
		$id = $this->session->userdata('username');

		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST == NULL) {

				$data['hasil'] = $this->m_admin->daftar_admin(1,0,$id)->row();
				
				$data2['title'] = "Edit Admin";
				$this->load->view('admin/template', $data2);
				$this->load->view('admin/edit_profil_admin', $data);
			}
			else {

				
				if ($this->m_admin->updateAdmin($id) == 1) {
					redirect ('admin/profil_admin');
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
	
		
	/*function tambah_admin() {
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST != NULL) {	
				
				if ($this->m_admin->input_admin() == true) {
					redirect('admin/list_admin');
				} else {
					exit("<script>window.alert('Username Sudah Ada')
						window.history.back()</script>");
				}
				
				
			}
	
			$data2['title'] = "Tambah Admin";

			$this->load->view('admin/template', $data2);
			$this->load->view('admin/tambah_admin');
		}
		else {
			redirect('home');
		}
	}*/
	
	

	function profil_admin() {
		$id = $this->session->userdata('username');
        if($id==null){
                redirect('admin');
            }
		$data2['hasil'] = $this->m_admin->daftar_admin(1,0,$id)->row();

		$data['title']= "Profil" ;

		$this->load->view('admin/template', $data);
		$this->load->view('admin/profil_admin', $data2);
	}

	function ubah_password() {
		$id = $this->session->userdata('username');
		$data2['hasil'] = $this->m_admin->daftar_admin(1,0,$id)->row();
		if ($this->session->userdata('user_level') == 'admin') {
			if($_POST == NULL) {
				$data['error'] = "Silahkan isi dengan benar";
			}
			else {
				$password = $this->input->post('password_baru');
				$password_konf = $this->input->post('password_baru_konf');

				if ($password == $password_konf) {
					$update = $this->m_admin->edit_password($id);
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