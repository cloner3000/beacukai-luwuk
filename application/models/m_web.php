<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_web extends CI_Model {
	
	function CountVisitor(){
		return $this->db->query("SELECT * FROM tbl_visitor");
	}

	function CountVisitorToday(){
		$today = date("Y-m-d");
		return $this->db->query("SELECT * FROM tbl_visitor WHERE tgl LIKE '%$today%'");
	}

	function GetTestimoni($where = ''){
		return $this->db->query("SELECT * FROM  tbl_testimoni  $where;");
	}

	function GetTotalTestimoni($where = ''){
		return $this->db->query("SELECT COUNT(*) AS total_testimoni FROM tbl_testimoni $where;");
	}

	function GetPosts($where = ''){
		return $this->db->query("SELECT * FROM tbl_posts INNER JOIN tbl_user ON tbl_user.user_id=tbl_posts.user_id INNER JOIN tbl_category ON
			tbl_category.category_id=tbl_posts.category_id $where;");
	}
	
	function GetLayanan($where = ''){
		return $this->db->query("SELECT * FROM  tbl_layanan $where;");
	}
	
	function GetKurs($where = ''){
		return $this->db->query("SELECT * FROM  tbl_kurs $where;");
	}

	function GetSearchPosts($search_term){
		$this->db->select('*');
		$this->db->from('tbl_posts');
		$this->db->join('tbl_category', 'tbl_category.category_id=tbl_posts.category_id');
		$this->db->join('tbl_user', 'tbl_user.user_id=tbl_posts.user_id');
		$this->db->order_by('posts_date','DESC');
		$this->db->where('posts_status = 1');
		$this->db->like('posts_isi',$search_term);
		$this->db->or_like('posts_judul',$search_term);
        $query=$this->db->get();
        return $query->result_array();
    }

	function GetCategory($where = ''){
		return $this->db->query("SELECT * FROM  tbl_category  $where;");
	}

	function GetPage($where = ''){
		return $this->db->query("SELECT * FROM  tbl_page  $where;");
	}

	function GetGalleryAlbum($where = ''){
		return $this->db->query("SELECT * FROM  tbl_gallery_album  $where;");
	}

	function GetGallery($where = ''){
		return $this->db->query("SELECT * FROM  tbl_gallery  $where;");
	}

	function GetDownload($where = ''){
		return $this->db->query("SELECT * FROM  tbl_download  $where;");
	}

	function GetMenu($where = ''){
		return $this->db->query("SELECT * FROM  tbl_menu  $where;");
	}

	function GetEvent($where = ''){
		return $this->db->query("SELECT * FROM  tbl_event  $where;");
	}

	function GetTotalEvent($where = ''){
		return $this->db->query("SELECT COUNT(*) AS total_event FROM tbl_event WHERE event_date >= CURDATE() $where;");
	}

	function GetTotalPosts($where = ''){
		return $this->db->query("SELECT COUNT(*) AS total_posts FROM tbl_posts $where;");
	}

	function GetSlide($where = ''){
		return $this->db->query("SELECT * FROM  tbl_slide  $where;");
	}

	function GetSetting($where = ''){
		return $this->db->query("SELECT * FROM  tbl_setting  $where;");
	}

	function GetVisitor($where = ""){
		return $this->db->query("select * from tbl_visitor $where");
	}
	function GetTotalVisitor(){
		return $this->db->query("SELECT COUNT(DISTINCT ip) as totalview FROM tbl_visitor");
	}

	//-----------

	function InsertData($table,$data){
		return $this->db->insert($table,$data);
	}
	function UpdateData($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}
	function DeleteData($table,$where){
		return $this->db->delete($table,$where);
	}

}?>
