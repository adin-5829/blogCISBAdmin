<?php
Class User extends Ci_Controller {
	
	function __construct()
	{
		parent::__construct();	
		session_start();
		
		$this->load->model('Auth_model');
		$this->load->model('m_kontak');
	}
	
	function index(){
		$button = $this->input->post('submit_login');
		$button2 = $this->input->post('login');

		if (($this->session->userdata('user_level')=='admin')) {
			$this->home();
		} else if ($_POST != NULL) {
			$this->form_validation->set_rules('id', 'Username', 'trim|required|min_length[1]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[1]|max_length[35]|xss_clean');
			
			if ($this->form_validation->run() == FALSE){
				exit("<script>window.alert('User ID atau Password Salah !!')
						window.history.back()</script>");
			}
			else{
				$username = mysql_real_escape_string($this->input->post('id'));
				$pass = mysql_real_escape_string($this->input->post('pass'));
				if($this->Auth_model->process_login($username, $pass)==1)
				{
					$this->session->set_userdata('user_level', 'admin');
					$this->session->set_userdata('username', $username);

					$this->load->model('m_admin');
					$hasil = $this->m_admin->daftar_admin(1,0,$username)->row();
					$this->session->set_userdata('nama', $hasil->nama_admin);
					$this->session->set_userdata('id_admin',  $hasil->id_admin);
					$this->home();
				} /*else if($this->Auth_model->process_login($username, $pass)==2){ 
					
					$this->session->set_userdata('user_level', 'user');
					$this->session->set_userdata('username', $username);
					$this->load->model('m_user');
					$hasil = $this->m_user->daftar(1,0,null, $username)->row();
					$this->session->set_userdata('nama', $hasil->nama);
					$this->home();
				} */else {
					exit("<script>window.alert('User ID atau Password Tidak Cocok !!')
						window.history.back()</script>");
				}
			}
		} else {
			$this->load->view('login');
		}
	}
	
	function home(){
		if ($this->session->userdata('user_level') == 'admin')
		{
			$data['nama'] = $this->session->userdata('username');
			$data['title'] = 'Dashboard Admin';
			//$data2['banyak_transaksi_baru'] = $this->m_transaksi->hitung_banyak();

			$data['banyak_berita'] = $this->db->count_all('berita');
			$data['banyak_komentar'] = $this->db->count_all('komentar');
			$data['banyak_produk'] = $this->db->count_all('produk');
			$data['banyak_pesan'] = $this->db->count_all('hubungi_kami');

			$data2['hasil'] = $this->m_kontak->daftar_kontak(1,0)->row();

			$this->load->view('admin/template', $data);
			$this->load->view('admin/home2', $data2);
		}
		else
		{
			redirect('./');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->home();
	}	

}
?>