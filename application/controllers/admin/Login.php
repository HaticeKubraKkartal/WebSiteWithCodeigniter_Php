<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
        {
            parent::__construct();
            // Your own constructor code
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('session');
        }

	public function index()
	{
		$this->load->view('admin/login_form');
	}
	public function login_ol(){
		
		$email=$this->input->post("eposta");
		$sifre=$this->input->post("sifre");
		/*Zararlı kodlardan temizleme*/
		echo $email=$this->security->xss_clean($email);
		echo $sifre=$this->security->xss_clean($sifre);
		
		$this->load->model('Database_Model');
		$result=$this->Database_Model->login("admin", $email, $sifre);
		
		if($result){
			
			//Kullanıcı var ise bilgilerini diziye aktarır.
			$sess_array = array(
			'id'=>$result[0]->id,
			'yetki'=>$result[0]->yetki,
			'email'=>$result[0]->email,
			'username'=>$result[0]->username,
			'adsoy'=>$result[0]->adsoy,
			'resim'=>$result[0]->resim
			);
			$this->session->set_userdata("admin_session",$sess_array);
			redirect(base_url().'admin');
		}
		else{
			$this->session->set_flashdata("mesaj","Kullanıcı Adı veya Şifre Hatalı!!");
			redirect(base_url().'admin/login');
		}
	}
	
	public function log_out(){
		$this->session->unset_userdata("admin_session");
		redirect(base_url().'admin/login');
	}	
	
}
