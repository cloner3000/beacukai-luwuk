<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends CI_Controller { 
	function __construct(){  
        parent::__construct();
		$this->load->model('m_web');
	} 
	 
	public function index(){
		$data = array(
			'title'			=> 'Gallery | ',
			'data_menu' 	=> $this->m_web->GetMenu()->result_array(),
			'data_gallery' 	=> $this->m_web->GetGalleryAlbum()->result_array(),
			'data_gallery_photo' 	=> $this->m_web->GetGallery("INNER JOIN tbl_gallery_album ON tbl_gallery_album.gallery_album_id=tbl_gallery.gallery_album_id
				WHERE tbl_gallery.gallery_type='photo'")->result_array(),
			'data_gallery_video' 	=> $this->m_web->GetGallery("WHERE gallery_type='video' ORDER BY gallery_date DESC")->result_array(),
			'setting' => $this->m_web->GetSetting()->result_array()
		);
		render_frontend('web/gallery',$data);	
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>