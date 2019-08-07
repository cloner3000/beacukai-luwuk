<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller { 
	function __construct(){  
        parent::__construct();
		$this->load->model('m_web');
	} 
	 
	public function index($id=0,$id2=0){

		if($this->uri->segment(3)==null){
			show_404();
		}
		
		$data_page = $this->m_web->GetPage("WHERE page_id='$id' AND  page_slug='$id2'")->result_array();
		if($data_page == TRUE ){	
			$data = array(
				'title'			=> $data_page[0]['page_title'].' | ',
				'data_menu' 	=> $this->m_web->GetMenu()->result_array(),
				'data_posts_news' 		=> $this->m_web->GetPosts("WHERE posts_status='1' AND category_slug='news' LIMIT 5")->result_array(),
				'data_event' 	=> $this->m_web->GetEvent(" ORDER BY event_id DESC LIMIT 5")->result_array(),
				'data_page' 	=> $data_page,
				'setting' => $this->m_web->GetSetting()->result_array()
			);		
			render_frontend('web/page',$data);	
		}else{
			shoW_404();
		}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

?>