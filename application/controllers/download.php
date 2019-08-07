<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller { 
	function __construct(){  
        parent::__construct();
		$this->load->model('m_web');
	} 
	 
	public function index(){

		$data_download = $this->m_web->GetDownload()->result_array();
		
		$data_download = array(
		    [
    		    'nama' => 'Peraturan Perizinan Import',
    		    'publish' => time(),
    		    'link' => '#',
    		    'icon' => 'fa-file-word-o'
	        ],
	        [
    		    'nama' => 'Peraturan Perizinan Import',
    		    'publish' => time(),
    		    'link' => '#',
    		    'icon' => 'fa-file-pdf-o'
	        ],
	        [
    		    'nama' => 'Peraturan Perizinan Import',
    		    'publish' => time(),
    		    'link' => '#',
    		    'icon' => 'fa-file-text-o'
	        ],
	        [
    		    'nama' => 'Peraturan Perizinan Import',
    		    'publish' => time(),
    		    'link' => '#',
    		    'icon' => 'fa-file-text-o'
	        ]
	    );
		
		$data = array(
			'title'			=> 'Download | ',
			'data_menu' 	=> $this->m_web->GetMenu()->result_array(),
			'data_posts' 	=> $this->m_web->GetPosts("WHERE posts_status='1' ORDER BY posts_date DESC LIMIT 6")->result_array(),
			'data_event' 			=> $this->m_web->GetEvent(" ORDER BY event_id DESC LIMIT 5")->result_array(),
			'data_download' 	=> $data_download,
			'setting' => $this->m_web->GetSetting()->result_array()
		);
        
		render_frontend('web/download',$data);
	}
}
