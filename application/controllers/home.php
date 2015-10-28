<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_produk', 'm_foto_promo', 'm_berita', 'm_kontak', 'm_sub_kategori', 'm_kategori'));
		//Do your magic here
	}

	public function index()
	{
		$data['page_content'] = 'home';

		$data['list_foto_promo'] = $this->m_foto_promo->daftar(null, null, null, null, 'tampil');
		$data['list_produk'] = $this->m_produk->daftar(8,0);
		$data['list_berita'] = $this->m_berita->daftar(6,1);
		$data['headline_baru'] = $this->m_berita->daftar(1,0)->row();
		$data['kontak'] = $this->m_kontak->daftar_kontak(1,0)->row();
		$data['list_kategori'] = $this->m_kategori->daftar();

		$no = 1;
		foreach ($data['list_kategori']->result() as $row) {
			$data["list_sub_kategori_$no"] = $this->m_sub_kategori->daftar(null, null, null, null, $row->id_kategori);
			$no++;
		}

		// echo json_encode($data["list_sub_kategori_1"]->result_array());

		$this->load->view('web/template', $data, FALSE);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

?>