<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('render_home')) {
    function render_home($view, $data){
           $ci = &get_instance();
           $ci->load->view('web/templates/header_home',$data);
           $ci->load->view($view, $data);
           $ci->load->view('web/templates/footer');
       }
}
if ( ! function_exists('render_frontend')) {
		function render_frontend($view, $data){
           $ci = &get_instance();
           $ci->load->view('web/templates/header',$data);
           $ci->load->view($view, $data);
           $ci->load->view('web/templates/footer');
       }
}
if ( ! function_exists('render_backend')) {
	function render_backend($view, $data){
           $ci = &get_instance();
           $ci->load->view('admin/templates/header',$data);
           $ci->load->view($view, $data);
           $ci->load->view('admin/templates/footer');
       }
}
if ( ! function_exists('render_author')) {
    function render_author($view, $data){
           $ci = &get_instance();
           $ci->load->view('author/templates/header',$data);
           $ci->load->view($view, $data);
           $ci->load->view('author/templates/footer');
       }
}