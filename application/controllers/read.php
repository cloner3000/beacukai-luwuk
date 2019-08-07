<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Read extends CI_Controller { 
	function __construct(){  
        parent::__construct();
		$this->load->model('m_web');
	} 
	 
	public function index($id=0,$id2=0){

		if($this->uri->segment(3)==null){
			show_404();
		}
		
		$data_posts = $this->m_web->GetPosts("WHERE posts_status='1' AND posts_id='$id' AND  posts_slug='$id2'")->row_array();
		if($data_posts == TRUE ){	
			$data = array(
				'title'				=> $data_posts['posts_judul'].' | ',
				'data_menu' 		=> $this->m_web->GetMenu()->result_array(),
				'data_posts' 		=> $this->m_web->GetPosts("WHERE posts_status='1' ORDER BY posts_date DESC, posts_time DESC LIMIT 3")->result_array(),
				'data_posts_read' 	=> $data_posts,
				'data_event' 		=> $this->m_web->GetEvent("WHERE event_date >= CURDATE() ORDER BY event_date DESC LIMIT 1")->result_array(),
				'setting' 			=> $this->m_web->GetSetting()->result_array()
			);		;
			render_frontend('web/read',$data);
		}else{
			show_404();
		}

	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>