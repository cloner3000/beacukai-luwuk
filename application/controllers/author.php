<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_admin');
	}

	public function index(){
		$this->session_on();
		$author = $this->session->userdata('author');
		$user_id = $author['user_id'];
		
		$data = array(
			'title'					=> 'Welcome',
			'session'				=> $this->session->userdata('author'),
			'data_posts' 			=> $this->m_admin->GetPosts("WHERE tbl_posts.user_id='$user_id'  LIMIT 5")->result_array(),
			'total_post' 			=> $this->m_admin->CountPosts()->num_rows(),
			'total_visitor_today' 	=> $this->m_admin->CountVisitorToday()->num_rows(),
			'total_visitor' 		=> $this->m_admin->CountVisitor()->num_rows()
		);
		render_author('author/welcome',$data);
	}

	function login($mess = 1){
		$this->load->view('admin/login',array('title' => 'Login Panel Admin / Author'));
	}

	//POSTS
	function posts(){
		$this->session_on();
		$author = $this->session->userdata('author');
		$user_id = $author['user_id'];
		
		$data = array(
			'session' 				=> $this->session->userdata('author'),
			'title' 				=> 'Author Panel',
			'data_posts' 			=> $this->m_admin->GetPosts("WHERE tbl_posts.user_id='$user_id' ORDER BY posts_date DESC, posts_time DESC")->result_array()
		);
		render_author('author/posts',$data);
    }
	function new_posts(){
		$this->session_on();
		$author = $this->session->userdata('author');
		$user_id = $author['user_id'];
		
		$data = array(
			'session' 				=> $this->session->userdata('author'),
			'data_category'			=> $this->m_admin->GetCategory()->result_array(),

			'posts_id'	 			=> '',
			'category_id' 			=> '',
			'posts_image' 			=> '',
			'posts_judul' 			=> '',
			'posts_isi' 			=> '',

			'posts_status' 			=> '',
			'editor_status' 		=> 'new',

			'title' 				=> 'Author Panel'
		);
		render_author('author/posts_editor',$data);
	}

	function edit_posts($id = 0){
		$this->session_on();
		$author = $this->session->userdata('author');
		$user_id = $author['user_id'];
		
		$data_posts = $this->m_admin->GetPosts("WHERE posts_id = '$id'")->result_array();
		/*end label to array*/
		$data = array(
			'session' 		=> $this->session->userdata('author'),
			'data_category'	=> $this->m_admin->GetCategory()->result_array(),

			'posts_id' 		=> $data_posts[0]['posts_id'],
			'category_id' 	=> $data_posts[0]['category_id'],
			'posts_image' 	=> $data_posts[0]['posts_image'],
			'posts_judul' 	=> $data_posts[0]['posts_judul'],
			'posts_isi' 	=> $data_posts[0]['posts_isi'],

			'posts_status' 	=> $data_posts[0]['posts_status'],
			'editor_status' => 'edit',

			'title' 		=> 'Author Panel'
		);
		render_author('author/posts_editor',$data);
	}

	function save_posts(){
		$this->session_on();
		$author = $this->session->userdata('author');
		$user_id = $author['user_id'];
		
		if($_POST){
			$data_session 	= $this->session->userdata('author');
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
					header('location:'.base_url().'author/posts');
					$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di simpan.
														</div>');
					}
				}
				else{
					header('location:'.base_url().'author/posts');
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
						header('location:'.base_url().'author/posts');
						$this->session->set_flashdata('message', '	<div class="alert alert-success">
															  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
															  <strong>Success!</strong> data berhasil di ubah.
															</div>');
					}
				}
				else{
					header('location:'.base_url().'author/posts');
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
		$author = $this->session->userdata('author');
		$user_id = $author['user_id'];
		
		$result = $this->m_admin->DeleteData('tbl_posts', array('posts_id' => $id, 'user_id' => $user_id));
		if($result == 1){
			header('location:'.base_url().'author/posts');
			$this->session->set_flashdata('message', '	<div class="alert alert-success">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Success!</strong> data berhasil di hapus.
														</div>');
		}else{
			header('location:'.base_url().'author/posts');
			$this->session->set_flashdata('message', '	<div class="alert alert-danger">
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Error!</strong> data tidak berhasil di hapus.
														</div>');
		}
	}
	
	// ACCOUNT

    function account($mess = -1){
        $this->session_on();
        $author = $this->session->userdata('author');
        $user_id = $author['user_id'];

        $data = array(
            'session'       => $this->session->userdata('author'),
            'title'     => 'Author Panel',
            'message' => $mess,
            'user'   => $this->m_admin->GetUser("WHERE user_id = '$user_id'")->result_array()
        );
        render_author('author/account',$data);;
    }

    function save_account(){
        $this->session_on();
        $author = $this->session->userdata('author');
        $user_id = $author['user_id'];

        if($_POST){
            $user_nama_depan    = $this->input->post('user_nama_depan');
            $user_nama_belakang = $this->input->post('user_nama_belakang');
            $user_login         = $this->input->post('user_login');
            $user_password      = $this->input->post('user_password');
            if($user_password != null){
               $data = array(
                    'user_nama_depan' => $user_nama_depan,
                    'user_nama_belakang' => $user_nama_belakang,
                    'user_login' => $user_login,
                    'user_password' => md5($user_password),
                ); 
            }else{
                $data = array(
                    'user_nama_depan' => $user_nama_depan,
                    'user_nama_belakang' => $user_nama_belakang,
                    'user_login' => $user_login,
                );
            }
            $result = $this->m_admin->UpdateData('tbl_user',$data,array('user_id' => $user_id));
            if($result == 1){
                header('location:'.base_url().'author/account');
                $this->session->set_flashdata('message', '  <div class="alert alert-success">
                                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          <strong>Success!</strong> data berhasil di simpan.
                                                        </div>');
            }else{
                header('location:'.base_url().'author/account');
                $this->session->set_flashdata('message', '  <div class="alert alert-danger">
                                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          <strong>Success!</strong> data gagal di simpan.
                                                        </div>');
            }
        }
    }

	// SESSION
	function session_on(){
		if(!$this->session->userdata('author')){
			header('location:'.base_url().'author/login');
			exit(0);
		}
	}

	function session_off(){
		$this->session->sess_destroy();
		session_start();
		session_destroy();
		header('location:'.base_url().'author/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
