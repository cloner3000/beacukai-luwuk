<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_permalink'))
{
	function set_permalink($id,$content)
	{
		$karakter = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
		$hapus_karakter_aneh = strtolower(str_replace($karakter,"",$content));
		$tambah_strip = strtolower(str_replace(' ', '-', $hapus_karakter_aneh));
		$link_akhir = $id.'-'.$tambah_strip;
		return $link_akhir;
	}
}