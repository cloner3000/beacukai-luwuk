<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->library('user_agent');
		$this->load->model('m_web');
	}
	public function index(){
		$this->countervisitor();
		$data = array(
			'title'				=> '',
			'list_category' 	=> $this->m_web->GetCategory()->result_array(),
			'data_headline' 	=> $this->m_web->GetPosts("WHERE posts_status='1' ORDER BY posts_date DESC, posts_time DESC LIMIT 2")->result_array(),
			'data_news' 		=> $this->m_web->GetPosts("WHERE posts_status='1' ORDER BY posts_date DESC, posts_time DESC LIMIT 2,3")->result_array(),
			'data_layanan' 		=> $this->m_web->GetLayanan()->result_array(),
			'data_kurs' 		=> $this->m_web->GetKurs()->result_array(),
			'setting' 			=> $this->m_web->GetSetting()->result_array(),
		);
		render_home('web/home',$data);
	}

	function news($page=0){
		$data_posts = $this->m_web->GetTotalPosts()->result_array();
		$pagin_config = array(
			'uri_segment' 		=> '3',
			'per_page' 			=> '8',
			'total_rows' 		=> $data_posts[0]['total_posts'],
			'base_url' 			=> base_url().'web/news/',
			'first_link' 		=> false,
			'last_link' 		=> false,
			'full_tag_open' 	=> '<nav><ul class="pagination justify-content-center">',
			'full_tag_close' 	=> '</ul></nav>',
			'num_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'num_tag_close' 	=> '</span></li>',
			'cur_tag_open' 	=> '<li class="page-item active"><span class="page-link">',
			'cur_tag_close' 	=> '<span class="sr-only">(current)</span></span></li>',
			'next_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'next_tagl_close' 	=> '<span aria-hidden="true">&raquo;</span></span></li>',
			'prev_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'prev_tagl_close' 	=> '</span></li>',
			'first_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'first_tagl_close' => '</span></li>',
			'last_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'last_tagl_close' 	=> '</span></li>',
		);
		$this->pagination->initialize($pagin_config);

		if($data_posts == TRUE ){
			$data = array(
				'title'			=> '',
				'list_category' => $this->m_web->GetCategory()->result_array(),
				'pages' 		=> $this->pagination->create_links(),
				'data_posts' 	=> $this->m_web->GetPosts("ORDER BY posts_date DESC, posts_time DESC LIMIT $page, 8")->result_array(),
				'data_event' 	=> $this->m_web->GetEvent("ORDER BY event_date")->result_array(),
				'setting' 		=> $this->m_web->GetSetting()->result_array()
			);
			render_frontend('web/news',$data);
		}else{
			show_404();
		}
	}

	function agenda($page=0){
		$data_event = $this->m_web->GetTotalEvent()->result_array();
		$pagin_config = array(
			'uri_segment' 		=> '3',
			'per_page' 			=> '7',
			'total_rows' 		=> $data_event[0]['total_event'],
			'base_url' 			=> base_url().'web/agenda/',
			'first_link' 		=> false,
			'last_link' 		=> false,
			'full_tag_open' 	=> '<nav><ul class="pagination justify-content-center">',
			'full_tag_close' 	=> '</ul></nav>',
			'num_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'num_tag_close' 	=> '</span></li>',
			'cur_tag_open' 	=> '<li class="page-item active"><span class="page-link">',
			'cur_tag_close' 	=> '<span class="sr-only">(current)</span></span></li>',
			'next_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'next_tagl_close' 	=> '<span aria-hidden="true">&raquo;</span></span></li>',
			'prev_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'prev_tagl_close' 	=> '</span></li>',
			'first_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'first_tagl_close' => '</span></li>',
			'last_tag_open' 	=> '<li class="page-item"><span class="page-link">',
			'last_tagl_close' 	=> '</span></li>',

		);
		$this->pagination->initialize($pagin_config);

		if($data_event == TRUE ){
			$data = array(
				'title'			=> 'Agenda - ',
				'data_posts' 	=> $this->m_web->GetPosts("WHERE posts_status='1' ORDER BY posts_date DESC LIMIT 5")->result_array(),
				'pages' 		=> $this->pagination->create_links(),
				'data_event' 	=> $this->m_web->GetEvent("ORDER BY event_date DESC LIMIT $page, 12")->result_array(),
				'setting' 		=> $this->m_web->GetSetting()->result_array()
			);
			render_frontend('web/agenda_all',$data);
		}else{
			show_404();
		}
	}

	function search(){
		$search_term = addslashes(trim($_GET['key']));
		$data = array(
			'title'							=> 'Search - ',
			'list_category' 	=> $this->m_web->GetCategory()->result_array(),
			'data_post_search'	=> $this->m_web->GetSearchPosts($search_term),
			'setting' => $this->m_web->GetSetting()->result_array()
		);
		render_frontend('web/search',$data);
	}

	private function countervisitor(){
		if($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}elseif ($this->agent->is_robot()){
			$agent = $this->agent->robot();
		}elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'Unidentified User Agent';
		}

		$data_visitor = $this->m_web->GetVisitor("where ip = '".$_SERVER['REMOTE_ADDR']."'")->result_array();
		if($data_visitor == NULL){
			$data = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'os' => $this->agent->platform(),
				'browser' => $agent,
				'tgl' => date("Y-m-d H:i:s")
			);
			$this->m_web->InsertData('tbl_visitor',$data);
			$this->session->set_userdata('Sukodono_Web_Desa',"Shohibul Amin");
			setcookie("Sukodono_Web_Desa",'Shohibul Amin', time()+3600*24);
		}else{
			if(!isset($_COOKIE['Sukodono_Web_Desa'])){
				$data_visitor = $this->m_web->GetVisitor("where ip = '".$_SERVER['REMOTE_ADDR']."' and tgl = '".date("Y-m-d H:i:s")."'");
				if($data_visitor != NULL){
					if(!$this->session->userdata('smkn1lamongan.sch.id')){
						$data = array(
							'ip' => $_SERVER['REMOTE_ADDR'],
							'os' => $this->agent->platform(),
							'browser' => $agent,
							'tgl' => date("Y-m-d H:i:s")
						);
						$this->m_web->InsertData('tbl_visitor', $data);
						$this->session->set_userdata('Sukodono_Web_Desa',"Shohibul Amin");
						setcookie("Sukodono_Web_Desa",'Shohibul Amin', time()+3600*24);
					}else{
						setcookie("Sukodono_Web_Desa",'Shohibul Amin', time()+3600*24);
					}
				}else{
					$data = array(
							'ip' => $_SERVER['REMOTE_ADDR'],
							'os' => $this->agent->platform(),
							'browser' => $agent,
							'tgl' => date("Y-m-d H:i:s")
					);
					$this->m_web->InsertData('tbl_visitor', $data);
					$this->session->set_userdata('Sukodono_Web_Desa',"Shohibul Amin");
					setcookie("Sukodono_Web_Desa",'Shohibul Amin', time()+3600*24);
				}
			}
		}
	}
}

?>
