<?php
Class M_video extends CI_Model {
    var $gallerypath;
	var $gallery_path_url;
       
    function __construct()
    {
        parent::__construct();  
    }
    

	function daftar($limit=null, $offset=null, $param=null, $id=null){
		$this->db->select('video.*');
		$this->db->from('video');


		if (!is_null($param)) {
			$this->db->like('judul_video', $param);
			$this->db->or_like('id_video', $param);
		}

		if (!is_null($id)) {
			$this->db->where('id_video', $id);
		}


		if (!is_null($limit) && !is_null($offset) ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by("id_video", "DESC"); 
		$query = $this->db->get();
		return $query;
	}
	
	
	function input_video() {

		$detail_video = $this->input->post('detail_video');
		$nama_video = $this->input->post('nama_video');
		$link_youtube = $this->input->post('link_youtube');

			
			$data = array(
				'tgl_post_video' => date("Y-m-d H:i:s"),
				'detail_video' => $detail_video,
				'nama_video' => $nama_video,
				'link_youtube' => $link_youtube,
				);
		if ($this->db->insert('video', $data)){
            return 1;
        } else {
            return 0;
        }
	}

	function edit($id) {

		$detail_video = $this->input->post('detail_video');
		$nama_video = $this->input->post('nama_video');
		$link_youtube = $this->input->post('link_youtube');

			
			$data = array(
				'detail_video' => $detail_video,
				'nama_video' => $nama_video,
				'link_youtube' => $link_youtube,
				);
			$this->db->where('id_video', $id);
			if ($this->db->update('video', $data)) {
				return 1;
			} else {
				return 0;
			}
	}

	
	function delete($id){
		$this->db->where('id_video', $id);
		if($this->db->delete('video')) {
            return 1;
        } else {
            return 0;
        }
	}	
}
?>