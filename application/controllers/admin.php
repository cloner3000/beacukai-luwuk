<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_admin');
	}

	public function index(){
		$this->session_on();
		$data = array(
			'title'					=> 'Welcome',
			'session'				=> $this->session->userdata('admin'),
			'data_posts' 			=> $this->m_admin->GetPosts("ORDER BY posts_date DESC LIMIT 5")->result_array(),
			'total_post' 			=> $this->m_admin->CountPosts()->num_rows(),
			'total_visitor_today' 	=> $this->m_admin->CountVisitorToday()->num_rows(),
			'total_visitor' 		=> $this->m_admin->CountVisitor()->num_rows(),
		);
		render_backend('admin/welcome',$data);
	}
	function login($mess = 1){
		$this->load->view('admin/login',array('title' => 'Login Panel Admin / Author'));
	}

	function p_login(){
		if($_POST){
			$username 				= addslashes($_POST['username']);
			$password 				= md5($_POST['password']);
			$temp = $this->m_admin->GetUser("WHERE user_login = '$username' AND user_password = '$password'")->result_array();
			if($temp != NULL && $temp[0]['user_level'] == '0'){
				$data = array(
					'user_id'		=> $temp[0]['user_id'],
					'user_nama' 	=> $temp[0]['user_nama_depan'],
				);
				$this->session->set_userdata('admin',$data);
				session_start();
				$_SESSION['kcfinder'] = false;
				header('location:'.base_url().'admin/');
			}elseif($temp != NULL && $temp[0]['user_level'] == '1'){
				$data = array(
					'user_id'		=> $temp[0]['user_id'],
					'user_nama' 	=> $temp[0]['user_nama_depan'],
				);
				$this->session->set_userdata('author', $data);
				session_start();
				$_SESSION['kcfinder'] = false;
				header('location:'.base_url().'author/');
			}else{
				$this->session->set_flashdata('message', 'Username atau password anda tidak cocok.');
				header('location:'.base_url().'admin/login');
			}
		}
	}

	//POSTS
	function posts(){
		$this->session_on();
		$data = array(
			'session' 				=> $this->session->userdata('admin'),
			'title' 				=> 'Admin Panel',
			'data_posts' 			=> $this->m_admin->GetPosts("ORDER BY posts_date DESC, posts_time DESC")->result_array()
		);
		render_backend('admin/posts',$data);
    }
	function new_posts(){
		$this->session_on();
		$data = array(
			'session' 				=> $this->session->userdata('admin'),
			'data_category'			=> $this->m_admin->GetCategory()->result_array(),

			'posts_id'	 			=> '',
			'category_id' 			=> '',
			'posts_image' 			=> '',
			'posts_judul' 			=> '',
			'posts_isi' 			=> '',

			'posts_status' 			=> '',
			'editor_status' 		=> 'new',

			'title' 				=> 'Admin Panel'
		);
		render_backend('admin/posts_editor',$data);
	}

	function edit_posts($id = 0){
		$this->session_on();
		$data_posts = $this->m_admin->GetPosts("WHERE posts_id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'data_category'	=> $this->m_admin->GetCategory()->result_array(),

			'posts_id' 		=> $data_posts[0]['posts_id'],
			'category_id' 	=> $data_posts[0]['category_id'],
			'posts_image' 	=> $data_posts[0]['posts_image'],
			'posts_judul' 	=> $data_posts[0]['posts_judul'],
			'posts_isi' 	=> $data_posts[0]['posts_isi'],

			'posts_status' 	=> $data_posts[0]['posts_status'],
			'editor_status' => 'edit',

			'title' 		=> 'Admin Panel'
		);
		render_backend('admin/posts_editor',$data);
	}

	function save_posts(){
		$this->session_on();
		if($_POST){
			$data_session 	= $this->session->userdata('admin');
			$posts_id 		= $this->input->post('posts_id');
			$category_id 	= $this->input->post('category_id');
			$posts_image	= $this->input->post('posts_image');
			$posts_judul 	= $this->input->post('posts_judul');
			$posts_isi 		= $this->input->post('posts_isi');

			$posts_status 	= $this->input->post('posts_status');
			$editor_status 	= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'user_id' 		=> $data_session['user_id'],
					'category_id' 	=> $category_id,
					'posts_judul' 	=> $posts_judul,
					'posts_image'	=> $posts_image,
					'posts_isi' 	=> $posts_isi,
					'posts_date' 	=> date("Y-m-d"),
					'posts_time'	=> date("H:i:s"),
					'posts_slug'	=> url_title($posts_judul, '-', TRUE),
					'posts_status' 	=> $posts_status
				);

				if($category_id != null){
					$result = $this->m_admin->InsertData('tbl_posts',$data);
					if($result == 1){
					header('location:'.base_url().'admin/posts');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
					}
				}
				else{
					header('location:'.base_url().'admin/posts');
					$this->session->set_flashdata('message', '	<div class="alert alert-warning">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Warning!</strong> data gagal di simpan, periksa kembali category.
														</div>');
				}
			}else{
				$data = array(
					'user_id' 		=> $data_session['user_id'],
					'category_id' 	=> $category_id,
					'posts_judul' 	=> $posts_judul,
					'posts_image'	=> $posts_image,
					'posts_isi' 	=> $posts_isi,
					'posts_date' 	=> date("Y-m-d"),
					'posts_time'	=> date("H:i:s"),
					'posts_slug'	=> url_title($posts_judul, '-', TRUE),
					'posts_status' 	=> $posts_status
				);
				if($category_id != null){
					$result = $this->m_admin->UpdateData('tbl_posts', $data, array('posts_id' => $posts_id));
					if($result == 1){
						header('location:'.base_url().'admin/posts');
						$this->session->set_flashdata('message', '	<div class="alert alert-success">
															  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
															  <strong>Success!</strong> data berhasil di ubah.
															</div>');
					}
				}
				else{
					header('location:'.base_url().'admin/posts');
					$this->session->set_flashdata('message', '	<div class="alert alert-warning">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Warning!</strong> data gagal di simpan, periksa kembali category.
														</div>');
				}
			}
		}
	}

	function del_posts($id = 0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_posts', array('posts_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/posts');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			echo "Gagal Delete";
		}
	}

	//KATEGORY
	function category(){
		$this->session_on();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),
			'category_id' 		=> '',
			'category_title' 	=> '',
			'category_color' 	=> '',

			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',

			'data_category' 	=> $this->m_admin->GetCategory()->result_array()
		);
		render_backend('admin/category',$data);
	}

	function edit_category($id = 0){
		$this->session_on();
		$data_category = $this->m_admin->GetCategory("WHERE category_id = '$id'")->result_array();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),

			'category_id'		=> $data_category[0]['category_id'],
			'category_title' 	=> $data_category[0]['category_title'],
			'category_color' 	=> $data_category[0]['category_color'],

			'editor_status'		=> 'edit',
			'title' 			=> 'Admin Panel',

			'data_category' 	=> $this->m_admin->GetCategory()->result_array()
		);
		render_backend('admin/category',$data);;
	}

	function save_category(){
		$this->session_on();
		if($_POST){

			$category_id		= $this->input->post('category_id');
			$category_title		= $this->input->post('category_title');
			$category_color		= $this->input->post('category_color');
			$editor_status		= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'category_title' 	=> $category_title,
					'category_color' 	=> $category_color,
					'category_slug'		=> url_title($category_title, '-', TRUE),
				);
				$result = $this->m_admin->InsertData('tbl_category',$data);
				if($result == 1){
					header('location:'.base_url().'admin/category');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				}else{
					show_404();
				}
			}else{
				$data = array(
					'category_id' 		=> $category_id,
					'category_title' 	=> $category_title,
					'category_color' 	=> $category_color,
					'category_slug'		=> url_title($category_title, '-', TRUE),
				);
				$result = $this->m_admin->UpdateData('tbl_category', $data, array('category_id' => $category_id));
				if($result == 1){
					header('location:'.base_url().'admin/category');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
				}else{
					show_404();
				}
			}
		}
	}

	function del_category($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_category',array('category_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/category');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}

	// tourism
	function layanan(){
		$this->session_on();
		$data = array (
		 	'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_layanan' => $this->m_admin->GetLayanan()->result_array(),
			'layanan_id'	 	=> '',
			'layanan_icon' 		=> '',
			'layanan_title' 	=> '',
			'layanan_disc' 		=> '',
			'layanan_link' 		=> '',
			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',
		);
		render_backend('admin/layanan',$data);;
	}
	
	function edit_layanan($id=0){
		$this->session_on();
		$data_tourism = $this->m_admin->GetLayanan("WHERE layanan_id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'data_layanan' => $this->m_admin->GetLayanan()->result_array(),
			'layanan_id'	=> $data_tourism[0]['layanan_id'],
			'layanan_title'	=> $data_tourism[0]['layanan_title'],
			'layanan_icon' => $data_tourism[0]['layanan_icon'],
			'layanan_disc' 	=> $data_tourism[0]['layanan_disc'],
			'layanan_link' 	=> $data_tourism[0]['layanan_link'],
			'editor_status' => 'edit',
			'title' 		=> 'Admin Panel'
		);
		render_backend('admin/layanan',$data);
	}
	
	function save_layanan(){
		$this->session_on();
		if($_POST){
			$layanan_id		= $this->input->post('layanan_id');
			$layanan_icon	= $this->input->post('layanan_icon');
			$layanan_title	= $this->input->post('layanan_title');
			$layanan_disc	= $this->input->post('layanan_disc');
			$layanan_link	= $this->input->post('layanan_link');
			$editor_status	= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'layanan_icon' 	=> $layanan_icon,
					'layanan_title' 	=> $layanan_title,
					'layanan_disc' 	=> $layanan_disc,
					'layanan_link' 	=> $layanan_link,
				);
				$result = $this->m_admin->InsertData('tbl_layanan', $data);
				if($result == 1){
					header('location:'.base_url().'admin/layanan');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				}else{
					show_404();
				}
			}else{
				$data = array(
					'layanan_title' => $layanan_title,
					'layanan_icon' => $layanan_icon,
					'layanan_disc' 	=> $layanan_disc,
					'layanan_link'	=> $layanan_link,
				);
				$result = $this->m_admin->UpdateData('tbl_layanan', $data, array('layanan_id' => $layanan_id));
				if($result == 1){
					header('location:'.base_url().'admin/layanan');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
				}else{
					show_404();
				}
			}
		}
	}
	
	function del_layanan($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_layanan',array('layanan_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/layanan');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}
	
	// PAGE
	function page(){
		$this->session_on();
		$data = array (
		 	'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_page' => $this->m_admin->GetPage()->result_array()
		);
		render_backend('admin/page',$data);
	}
	function new_page(){
		$this->session_on();
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'page_id' 		=> '',
			'page_isi' 		=> '',
			'page_title'	=> '',
			'page_image'	=> '',
			'editor_status' => 'new',
			'title'			=> 'Admin Panel'
		);
		render_backend('admin/page_editor',$data);
	}

	function edit_page($id=0){
		$this->session_on();
		$data_page = $this->m_admin->GetPage("WHERE page_id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'page_id'	 	=> $data_page[0]['page_id'],
			'page_title' 	=> $data_page[0]['page_title'],
			'page_isi' 		=> $data_page[0]['page_isi'],
			'page_image' 	=> $data_page[0]['page_image'],
			'editor_status' => 'edit',
			'title' 		=> 'Admin Panel'
		);
		render_backend('admin/page_editor',$data);
	}

	function save_page(){
		$this->session_on();
		if($_POST){
			$page_id		= $this->input->post('page_id');
			$page_title		= $this->input->post('page_title');
			$page_isi		= $this->input->post('page_isi');
			$page_image		= $this->input->post('page_image');
			$editor_status 	= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'page_title' 	=> $page_title,
					'page_isi' 		=> $page_isi,
					'page_image' 	=> $page_image,
					'page_slug'		=> url_title($page_title, '-', TRUE),
				);
				$result = $this->m_admin->InsertData('tbl_page',$data);
				if($result == 1){
					header('location:'.base_url().'admin/page');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				}else{
					show_404();
				}
			}else{
				$data = array(
					'page_title' 	=> $page_title,
					'page_isi' 		=> $page_isi,
					'page_image' 	=> $page_image,
					'page_slug'		=> url_title($page_title, '-', TRUE),
				);
				$result = $this->m_admin->UpdateData('tbl_page', $data, array('page_id' => $page_id));
				if($result == 1){
					header('location:'.base_url().'admin/page');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
				}else{
					show_404();
				}
			}
		}
	}

	function del_page($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_page',array('page_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/page');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}

	// EVENT
	function event(){
		$this->session_on();
		$data = array (
		 	'title' 		=> 'Admin Panel',
			'session' 		=> $this->session->userdata('admin'),
			'data_event' 	=> $this->m_admin->GetEvent()->result_array(),
			'event_id' 		=> '',
			'event_isi' 	=> '',
			'event_title'	=> '',
			'event_date'	=> '',
			'event_time'	=> '',
			'event_location'	=> '',
			'editor_status' => 'new',
			'title'			=> 'Admin Panel'
		);
		render_backend('admin/event',$data);
	}

	function edit_event($id=0){
		$this->session_on();
		$data_event = $this->m_admin->GetEvent("WHERE event_id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'title' 		=> 'Admin Panel',
			'session' 		=> $this->session->userdata('admin'),
			'data_event' 	=> $this->m_admin->GetEvent()->result_array(),
			'event_id'	 	=> $data_event[0]['event_id'],
			'event_title' 	=> $data_event[0]['event_title'],
			'event_isi' 	=> $data_event[0]['event_isi'],
			'event_date' 	=> $data_event[0]['event_date'],
			'event_time' 	=> $data_event[0]['event_time'],
			'event_location' 	=> $data_event[0]['event_location'],
			'editor_status' => 'edit',
			'title' 		=> 'Admin Panel'
		);
		render_backend('admin/event',$data);
	}

	function save_event(){
		$this->session_on();
		if($_POST){
			$event_id		= $this->input->post('event_id');
			$event_title	= $this->input->post('event_title');
			$event_isi		= $this->input->post('event_isi');
			$event_date		= $this->input->post('event_date');
			$event_time 	= $this->input->post('event_time');
			$event_location 	= $this->input->post('event_location');
			$editor_status 	= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'event_title' 	=> $event_title,
					'event_isi' 		=> $event_isi,
					'event_date' 	=> $event_date,
					'event_time' 	=> $event_time,
					'event_location' 	=> $event_location,
					'event_slug'		=> url_title($event_title, '-', TRUE),
				);
				$result = $this->m_admin->InsertData('tbl_event',$data);
				if($result == 1){
					header('location:'.base_url().'admin/event');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				}else{
					show_404();
				}
			}else{
				$data = array(
					'event_title' 	=> $event_title,
					'event_isi' 		=> $event_isi,
					'event_date' 	=> $event_date,
					'event_time' 	=> $event_time,
					'event_location' 	=> $event_location,
					'event_slug'		=> url_title($event_title, '-', TRUE),
				);
				$result = $this->m_admin->UpdateData('tbl_event', $data, array('event_id' => $event_id));
				if($result == 1){
					header('location:'.base_url().'admin/event');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
				}else{
					show_404();
				}
			}
		}
	}

	function del_event($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_event',array('event_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/event');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}

	//ALBUM
	function album(){
		$this->session_on();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),
			'gallery_album_id' 		=> '',
			'gallery_album_title' 	=> '',
			'gallery_album_image' 	=> '',
			'gallery_album_desc' 	=> '',

			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',

			'data_gallery_album' 	=> $this->m_admin->GetGalleryAlbum()->result_array()
		);
		render_backend('admin/album',$data);
	}

	function edit_album($id=0){
		$this->session_on();
		$data_gallery_album = $this->m_admin->GetGalleryAlbum("WHERE gallery_album_id = '$id'")->result_array();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),

			'gallery_album_id'		=> $data_gallery_album[0]['gallery_album_id'],
			'gallery_album_title' 	=> $data_gallery_album[0]['gallery_album_title'],
			'gallery_album_image' 	=> $data_gallery_album[0]['gallery_album_image'],
			'gallery_album_desc' 	=> $data_gallery_album[0]['gallery_album_desc'],

			'editor_status'		=> 'edit',
			'title' 			=> 'Admin Panel',

			'data_gallery_album' => $this->m_admin->GetGalleryAlbum()->result_array()
		);
		render_backend('admin/album',$data);
	}

	function save_album(){
		$this->session_on();
		if($_POST){

			$gallery_album_id		= $this->input->post('gallery_album_id');
			$gallery_album_title	= $this->input->post('gallery_album_title');
			$gallery_album_image	= $this->input->post('gallery_album_image');
			$gallery_album_desc		= $this->input->post('gallery_album_desc');
			$editor_status			= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'gallery_album_title' 	=> $gallery_album_title,
					'gallery_album_image'	=> $gallery_album_image,
					'gallery_album_desc'	=> $gallery_album_desc,
					'gallery_album_slug'	=> url_title($gallery_album_title, '-', TRUE),
				);
				$result = $this->m_admin->InsertData('tbl_gallery_album',$data);
				if($result == 1){
					header('location:'.base_url().'admin/album');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				}else{
					show_404();
				}
			}else{
				$data = array(
					'gallery_album_id' 		=> $gallery_album_id,
					'gallery_album_title' 	=> $gallery_album_title,
					'gallery_album_image'	=> $gallery_album_image,
					'gallery_album_desc'	=> $gallery_album_desc,
					'gallery_album_slug'	=> url_title($gallery_album_title, '-', TRUE),
				);
				$result = $this->m_admin->UpdateData('tbl_gallery_album', $data, array('gallery_album_id' => $gallery_album_id));
				if($result == 1){
					header('location:'.base_url().'admin/album');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
				}else{
					show_404();
				}
			}
		}
	}

	function del_album($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_gallery_album',array('gallery_album_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/album');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			echo "Gagal Delete";
		}
	}

	// GALLERY
	function photo(){
		$this->session_on();
		$data = array (
		 	'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_gallery_album' => $this->m_admin->GetGalleryAlbum()->result_array(),
			'data_gallery_photo' => $this->m_admin->GetGallery("INNER JOIN tbl_gallery_album ON tbl_gallery_album.gallery_album_id=
				tbl_gallery.gallery_album_id WHERE gallery_type='photo'")->result_array(),
		);
		render_backend('admin/gallery_photo',$data);
	}

	function video(){
		$this->session_on();
		$data = array (
		 	'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_gallery_video' => $this->m_admin->GetGallery("WHERE gallery_type='video'")->result_array()
		);
		render_backend('admin/gallery_video',$data);
	}

	function save_photo(){
		$this->session_on();

		$gallery_album_id			= $this->input->post('gallery_album_id');

		$config_fp['upload_path'] 	= './upload/gallery/';
	 	$config_fp['allowed_types'] = 'jpg|jpeg|jpe|png|JPG|PNG|JPEG|JPE';
	 	$config_fp['file_name']		= url_title($this->input->post('gallery_data'));
		$config_fp['max_size'] 		= '2048';
		$this->load->library('upload', $config_fp);
	 	if(!$this->upload->do_upload('gallery_data')){
			 echo $this->upload->display_errors();
	 	}else{
			$upload_data = $this->upload->data();   
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './upload/gallery/'.$upload_data['file_name'];
			$config['new_image']	 	= './upload/gallery/thumbs/';
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 300;
			$config['height']       	= 300;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

	 		$data = array(
				'gallery_data'  	=> $this->upload->file_name,
				'gallery_album_id' 	=> $gallery_album_id,
				'gallery_type'		=> 'photo',
				'gallery_date'		=> date("Y-m-d H:i:s"),
			);
	 		$result = $this->m_admin->InsertData('tbl_gallery',$data);
			if($result == 1){
				header('location:'.base_url().'admin/photo');
				$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
			}else{
				show_404();
			}
	 	}
	}

	function save_video(){
		$this->session_on();
		if($_POST){
			$gallery_data		= $this->input->post('gallery_data');
			$gallery_title		= $this->input->post('gallery_title');
			$data = array(
				'gallery_data' 	=> $gallery_data,
				'gallery_title' 	=> $gallery_title,
				'gallery_type' 	=> 'video',
				'gallery_date'		=> date("Y-m-d H:i:s"),
			);
			$result = $this->m_admin->InsertData('tbl_gallery',$data);
			if($result == 1){
				header('location:'.base_url().'admin/video');
				$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
			}else{
				show_404();
			}
		}
	}

	function del_gallery_video($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_gallery',array('gallery_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/video');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}

	function del_gallery_photo($id=0){
		$this->session_on();
		$data_gallery = $this->m_admin->GetGallery("WHERE gallery_id = '$id'")->result_array();
		$gallery_data = $data_gallery[0]['gallery_data'];		
		$image = 'upload/gallery/'.$gallery_data;
		$image_thumb = 'upload/gallery/thumbs/'.$gallery_data;
		if($this->m_admin->GetGalleryImageDellete($id)){
			unlink($image);
			unlink($image_thumb);
			header('location:'.base_url().'admin/photo');
		}
	}

	// DOWNLOAD
	function download(){
		$this->session_on();
		$data = array (
		 	'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_download' => $this->m_admin->GetDown()->result_array()
		);
		render_backend('admin/download',$data);;
	}

	function save_download(){
		$this->session_on();

		$download_title			= $this->input->post('download_title');
		$download_desc		= $this->input->post('download_desc');

		$config_fp['upload_path'] 	= './upload/files/';
	 	$config_fp['allowed_types'] = 'jpg|png|pdf|doc|docx|txt|rar|zip';
	 	$config_fp['file_name']		= url_title($this->input->post('download_file'));
		$config_fp['max_size'] 		= '100000KB';

		$this->load->library('upload', $config_fp);
	 	if(!$this->upload->do_upload('download_file')){
			 echo $this->upload->display_errors();
	 	}else{
	 		$data = array(
	 			'download_title'	=> $download_title,
				'download_desc'	=> $download_desc,
				'download_file'  	=> $this->upload->file_name,
				'download_date' 	=> date("Y-m-d H:i:s"),
			);
	 		$result = $this->m_admin->InsertData('tbl_download',$data);
			if($result == 1){
				header('location:'.base_url().'admin/download');
				$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
			}else{
				show_404();
			}
	 	}
	}

	function del_download($id=0){
		$this->session_on();
		$data_download = $this->m_admin->GetDown("WHERE download_id = '$id'")->result_array();
		$download_data = $data_download[0]['download_file'];
		$download = 'upload/files/'.$download_data;
		$result = $this->m_admin->DeleteData('tbl_download',array('download_id' => $id));
		if($result == 1){
			unlink($download);
			header('location:'.base_url().'admin/download');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}
	
	// kurs
	function kurs(){
		$this->session_on();
		$data = array (
			'session' 		=> $this->session->userdata('admin'),
			'data_kurs' 	=> $this->m_admin->GetKurs()->result_array(),
			'kurs_id'	 	=> '',
			'kurs_icon' 	=> '',
			'kurs_code' 	=> '',
			'kurs_title' 	=> '',
			'kurs_currency' 	=> '',
			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',
		);
		render_backend('admin/kurs',$data);;
	}

	// kurs
	function edit_kurs($id=0){
		$this->session_on();
		$data_kurs = $this->m_admin->GetKurs("WHERE kurs_id = '$id'")->result_array();

		$data = array (
			'session' 		=> $this->session->userdata('admin'),
			'data_kurs' 	=> $this->m_admin->GetKurs()->result_array(),
			'kurs_id'	 	=>  $data_kurs[0]['kurs_id'],
			'kurs_icon' 	=>  $data_kurs[0]['kurs_icon'],
			'kurs_code' 	=>  $data_kurs[0]['kurs_code'],
			'kurs_title' 	=>  $data_kurs[0]['kurs_title'],
			'kurs_currency' 	=>  $data_kurs[0]['kurs_currency'],
			'editor_status' 	=> 'edit',
			'title' 			=> 'Admin Panel',
		);
		render_backend('admin/kurs',$data);;
	}
	
	function save_kurs(){
		$this->session_on();
		if($_POST){
			$kurs_id = $this->input->post('kurs_id');
			$kurs_icon	= $this->input->post('kurs_icon');
			$kurs_code	= $this->input->post('kurs_code');
			$kurs_title	= $this->input->post('kurs_title');
			$kurs_currency	= $this->input->post('kurs_currency');
			$editor_status	= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'kurs_title' 	=> $kurs_title,
					'kurs_icon' 	=> $kurs_icon,
					'kurs_code' 	=> $kurs_code,
					'kurs_currency' 	=> $kurs_currency,
				);
				$result = $this->m_admin->InsertData('tbl_kurs', $data);
				if($result == 1){
					header('location:'.base_url().'admin/kurs');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				}else{
					show_404();
				}
			}else{
				$data = array(
					'kurs_title' 	=> $kurs_title,
					'kurs_icon' 	=> $kurs_icon,
					'kurs_code' 	=> $kurs_code,
					'kurs_currency' 	=> $kurs_currency,
				);
				$result = $this->m_admin->UpdateData('tbl_kurs', $data, array('kurs_id' => $kurs_id));
				if($result == 1){
					header('location:'.base_url().'admin/kurs');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
															  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
															  <strong>Success!</strong> data berhasil di ubah.
															</div>');
				}else{
					show_404();
				}
			}
		}
	}
	
	function del_kurs($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_kurs',array('kurs_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/kurs');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}

	// SLIDE
	function slide(){
		$this->session_on();
		$data = array (
		 	'title' 	=> 'Admin Panel',
			'session' 	=> $this->session->userdata('admin'),
			'data_slide' => $this->m_admin->GetSlide()->result_array()
		);
		render_backend('admin/slide',$data);;

	}

	function new_slide(){
		$this->session_on();

		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'slide_id'	 	=> '',
			'slide_title' 	=> '',
			'slide_link' 	=> '',
			'slide_image' 	=> '',
			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',
		);
		render_backend('admin/slide_editor',$data);;
	}

	function edit_slide($id=0){
		$this->session_on();
		$data_slide = $this->m_admin->Getslide("WHERE slide_id = '$id'")->result_array();

		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('admin'),
			'slide_id'	 	=> $data_slide[0]['slide_id'],
			'slide_title' 	=> $data_slide[0]['slide_title'],
			'slide_link' 	=> $data_slide[0]['slide_link'],
			'slide_image' 	=> $data_slide[0]['slide_image'],
			'editor_status' 	=> 'edit',
			'title' 		=> 'Admin Panel'
		);
		render_backend('admin/slide_editor',$data);;
	}

	function save_slide(){
		$this->session_on();
		if($_POST){
			$slide_id		= $this->input->post('slide_id');
			$slide_title		= $this->input->post('slide_title');
			$slide_link		= $this->input->post('slide_link');
			$slide_image		= $this->input->post('slide_image');
			$editor_status	= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'slide_title' 	=> $slide_title,
					'slide_image' 	=> $slide_image,
					'slide_link' 	=> $slide_link,
				);
				$result = $this->m_admin->InsertData('tbl_slide', $data);
				if($result == 1){
					header('location:'.base_url().'admin/slide');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				}else{
					show_404();
				}
			}else{
				$data = array(
					'slide_title' 	=> $slide_title,
					'slide_image' 	=> $slide_image,
					'slide_link' 	=> $slide_link,
				);
				$result = $this->m_admin->UpdateData('tbl_slide', $data, array('slide_id' => $slide_id));
				if($result == 1){
					header('location:'.base_url().'admin/slide');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
															  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
															  <strong>Success!</strong> data berhasil di ubah.
															</div>');
				}else{
					show_404();
				}
			}
		}
	}

	function del_slide($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_slide',array('slide_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/slide');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}

	//MENU
	function menu(){
		$this->session_on();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),
			'menu_id' 		=> '',
			'menu_title' 	=> '',
			'menu_link' 	=> '',
			'menu_icon' 	=> '',
			'is_parent' 	=> '',

			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',

			'data_menu' 	=> $this->m_admin->GetMenu()->result_array()
		);
		render_backend('admin/menu',$data);;
	}

	function edit_menu($id = 0){
		$this->session_on();
		$data_menu = $this->m_admin->GetMenu("WHERE menu_id = '$id'")->result_array();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),

			'menu_id'		=> $data_menu[0]['menu_id'],
			'menu_title' 	=> $data_menu[0]['menu_title'],
			'menu_link' 	=> $data_menu[0]['menu_link'],
			'menu_icon'		=> $data_menu[0]['menu_icon'],
			'is_parent' 	=> $data_menu[0]['is_parent'],

			'editor_status'		=> 'edit',
			'title' 			=> 'Admin Panel',

			'data_menu' 	=> $this->m_admin->GetMenu()->result_array()
		);
		render_backend('admin/menu',$data);;
	}

	function save_menu(){
		$this->session_on();
		if($_POST){

			$menu_id		= $this->input->post('menu_id');
			$menu_title		= $this->input->post('menu_title');
			$menu_link		= $this->input->post('menu_link');
			$menu_icon		= $this->input->post('menu_icon');
			$is_parent		= $this->input->post('is_parent');
			$editor_status	= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'menu_title' 	=> $menu_title,
					'menu_link'		=> $menu_link,
					'menu_icon' 	=> $menu_icon,
					'is_parent'		=> $is_parent,
				);
				$result = $this->m_admin->InsertData('tbl_menu', $data);
				if($result == 1){
					header('location:'.base_url().'admin/menu');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				}else{
					show_404();
				}
			}else{
				$data = array(
					'menu_id' 		=> $menu_id,
					'menu_title' 	=> $menu_title,
					'menu_link'		=> $menu_link,
					'menu_icon' 	=> $menu_icon,
					'is_parent'		=> $is_parent,
				);
				$result = $this->m_admin->UpdateData('tbl_menu', $data, array('menu_id' => $menu_id));
				if($result == 1){
					header('location:'.base_url().'admin/menu');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
				}else{
					show_404();
				}
			}
		}
	}

	function del_menu($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_menu',array('menu_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/menu');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}

	//USER
	function user(){
		$this->session_on();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),
			'user_id' 			=> '',
			'user_nama_depan' 	=> '',
			'user_nama_belakang' => '',
			'user_login' 		=> '',
			'user_password' 	=> '',
			'user_level' 		=> '',

			'editor_status' 	=> 'new',
			'title' 			=> 'Admin Panel',

			'data_user' 	=> $this->m_admin->GetUser()->result_array()
		);
		render_backend('admin/user',$data);;
	}

	function edit_user($id = 0){
		$this->session_on();
		$data_user = $this->m_admin->GetUser("WHERE user_id = '$id'")->result_array();
		$data = array(
			'session' 			=> $this->session->userdata('admin'),

			'user_id'			=> $data_user[0]['user_id'],
			'user_nama_depan' 	=> $data_user[0]['user_nama_depan'],
			'user_nama_belakang' => $data_user[0]['user_nama_belakang'],
			'user_login'		=> $data_user[0]['user_login'],
			'user_password' 	=> '',
			'user_level' 		=> $data_user[0]['user_level'],

			'editor_status'		=> 'edit',
			'title' 			=> 'Admin Panel',

			'data_user' 	=> $this->m_admin->GetUser()->result_array()
		);
		render_backend('admin/user',$data);;
	}

	function save_user(){
		$this->session_on();
		if($_POST){
			$user_id				= $this->input->post('user_id');
			$user_nama_depan		= $this->input->post('user_nama_depan');
			$user_nama_belakang		= $this->input->post('user_nama_belakang');
			$user_login				= $this->input->post('user_login');
			$user_password			= $this->input->post('user_password');
			$md5_password 			= md5($user_password);
			$user_level				= $this->input->post('user_level');
			$editor_status			= $this->input->post('editor_status');

			if($editor_status == "new"){
				$data = array(
					'user_nama_depan' 		=> $user_nama_depan,
					'user_nama_belakang'	=> $user_nama_belakang,
					'user_login' 			=> $user_login,
					'user_password' 		=> $md5_password,
					'user_level'			=> $user_level,
				);
				$result = $this->m_admin->InsertData('tbl_user', $data);
				if($result == 1){
					header('location:'.base_url().'admin/user');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
				}else{
					show_404();
				}
			}elseif($editor_status == "edit" && $user_password == ""){
				$data = array(
					'user_id' 				=> $user_id,
					'user_nama_depan' 		=> $user_nama_depan,
					'user_nama_belakang'	=> $user_nama_belakang,
					'user_login' 			=> $user_login,
					'user_level'			=> $user_level,
				);
				$result = $this->m_admin->UpdateData('tbl_user', $data, array('user_id' => $user_id));
				if($result == 1){
					header('location:'.base_url().'admin/user');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
				}else{
					show_404();
				}
			}else{
				$data = array(
					'user_id' 				=> $user_id,
					'user_nama_depan' 		=> $user_nama_depan,
					'user_nama_belakang'	=> $user_nama_belakang,
					'user_login' 			=> $user_login,
					'user_password'			=> $md5_password,
					'user_level'			=> $user_level,
				);
				$result = $this->m_admin->UpdateData('tbl_user', $data, array('user_id' => $user_id));
				if($result == 1){
					header('location:'.base_url().'admin/user');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di ubah.
														</div>');
				}else{
					show_404();
				}
			}
		}
	}

	function del_user($id=0){
		$this->session_on();
		$result = $this->m_admin->DeleteData('tbl_user',array('user_id' => $id));
		if($result == 1){
			header('location:'.base_url().'admin/user');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			show_404();
		}
	}

	// SETTING
	function setting($mess = -1){
		$this->session_on();
		$data = array(
			'session' 	=> $this->session->userdata('admin'),
			'title' 	=> 'Admin Panel',
			'message' => $mess,
			'setting' 	=> $this->m_admin->GetSetting()->result_array()
		);
		render_backend('admin/setting',$data);;
	}

	function save_setting(){
		$this->session_on();
		if($_POST){
			$title 			= $_POST['title'];
			$description 	= $_POST['description'];
			$keyword 		= $_POST['keyword'];
			$seo 			= $_POST['seo'];
			
			$web_logo = $_POST['web_logo'];
			$web_favicon = $_POST['web_favicon'];

			$web_image_sambutan = $_POST['web_image_sambutan'];
			$web_video_sambutan = $_POST['web_video_sambutan'];
            $web_sambutan = $_POST['web_sambutan'];
            $web_sambutan_link = $_POST['web_sambutan_link'];


			$telfone		= $_POST['telfone'];
			$email			= $_POST['email'];
			$web_layanan	= $_POST['web_layanan'];
			
			$web_facebook	= $_POST['web_facebook'];
			$web_twitter	= $_POST['web_twitter'];
			$web_youtube	= $_POST['web_youtube'];

			$web_log	= $_POST['web_log'];
			$web_lat	= $_POST['web_lat'];
			
			$footer = $_POST['footer'];
			$css = $_POST['css'];
		
			
			$data = array(
				'web_title' => $title,
				'web_description' => $description,
				'web_keyword' => $keyword,
				'web_google_seo' => $seo,
				
				
				'web_logo' => $web_logo,
				'web_favicon' => $web_favicon,

				'web_image_sambutan' => $web_image_sambutan,
				'web_video_sambutan' => $web_video_sambutan,
                'web_sambutan' => $web_sambutan,
                'web_sambutan_link' => $web_sambutan_link,


				'web_layanan' => $web_layanan,
				'web_telfone' => $telfone,
				'web_email' => $email,
				
				'web_facebook' => $web_facebook,
				'web_twitter' => $web_twitter,
				'web_youtube' => $web_youtube,
				'web_log' => $web_log,
				'web_lat' => $web_lat,
				
                'footer' => $footer,
				'custom_css' => $css,
			);
			$result = $this->m_admin->UpdateData('tbl_setting',$data,array('id' => '1'));
			if($result == 1){
				header('location:'.base_url().'admin/setting');
				$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
			}else{
				header('location:'.base_url().'admin/setting');
				$this->session->set_flashdata('message', '	<div class="alert alert-danger">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data gagal di simpan.
														</div>');
			}
		}
	}

	// SESSION
	function session_on(){
		if(!$this->session->userdata('admin')){
			header('location:'.base_url().'admin/login');
			exit(0);
		}
	}

	function session_off(){
		$this->session->sess_destroy();
		session_start();
		session_destroy();
		header('location:'.base_url().'admin/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
