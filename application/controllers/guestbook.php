<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guestbook extends CI_Controller { 
	function __construct(){  
        parent::__construct();
		$this->load->model('m_web');
		$this->load->library('recaptcha');
		$this->load->library('session');
	} 
	 
	public function index(){
		$data_guestbook = $this->m_web->GetGuestbook()->result_array();
		$data = array(
			'title'			=> 'Guestbook | ',
			'data_menu' 	=> $this->m_web->GetMenu()->result_array(),
			'data_posts' 	=> $this->m_web->GetPosts("WHERE posts_status='1' ORDER BY posts_date DESC LIMIT 5")->result_array(),
			'data_guestbook' 	=> $data_guestbook,
			'setting' => $this->m_web->GetSetting()->result_array()
		);
		render_frontend('web/guestbook',$data);
	}
	
	public function send(){
		$guestbook_name	= $this->db->escape_str($this->input->post('guestbook_name'));
		$guestbook_email = $this->db->escape_str($this->input->post('guestbook_email'));
		$guestbook_pesan = $this->db->escape_str($this->input->post('guestbook_pesan'));
		$recaptcha = $this->input->post('g-recaptcha-response');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		
		$data = array(
			'guestbook_name' => $guestbook_name,
			'guestbook_email' => $guestbook_email,
			'guestbook_pesan' => $guestbook_pesan,
			'guestbook_date' => date('Y-m-d h:i:s'),
		);

		if (isset($response['success']) and $response['success'] === true) {
			
			$result = $this->m_web->InsertData('tbl_guestbook',$data);
			if($result == 1){
				header('location:'.base_url().'guestbook');
				$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Success! data berhasil di simpan.</div>');
			}
		}else{
			header('location:'.base_url().'guestbook');
			$this->session->set_flashdata('success', '<div class="alert alert-danger" role="alert">Warning! recaptcha harus di isi.</div>');
		}
	}
}
