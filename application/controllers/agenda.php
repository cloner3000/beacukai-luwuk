<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agenda extends CI_Controller { 
	function __construct(){  
        parent::__construct();
		$this->load->model('m_web');
	} 
	public function index($id=0,$id2=0){
		if($this->uri->segment(3)==null){
			show_404();
		}
		$data_event = $this->m_web->GetEvent("WHERE event_id='$id' AND  event_slug='$id2'")->result_array();
		if($data_event == TRUE ){	
			$data = array(
				'title'				=> $data_event[0]['event_title'].' | ',
				'data_menu' 		=> $this->m_web->GetMenu()->result_array(),
				'data_event' 		=> $this->m_web->GetEvent(" WHERE event_date >= CURDATE() ORDER BY event_date DESC LIMIT 5")->result_array(),
				'data_event_read' 	=> $data_event,
				'setting' 			=> $this->m_web->GetSetting()->result_array()
			);		
			render_frontend('web/agenda',$data);
		}else{
			shoW_404();
		}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>