<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
        {
            parent::__construct();
            // Your own constructor code
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('Database_Model');
			if(!$this->session->userdata("admin_session"))
				redirect(base_url().'admin/Login');	
        }

	public function index()
	{
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/_menufooter');
		$this->load->view('admin/_header');
		$this->load->view('admin/_content');
		$this->load->view('admin/_footer');
	}
	public function ayarlar()
	{
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		
		$this->load->view('admin/ayarlar' , $data);
	}
	public function ayarlar_guncelle($id)
	{
		//Form verilerini alıyoruz..
		$data=array(
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'keywords'=>$this->input->post('keywords'),
			'sehir'=>$this->input->post('sehir'),
			'tel'=>$this->input->post('tel'),
			'name'=>$this->input->post('name'),
			'smtpemail'=>$this->input->post('smtpemail'),
			'smtpserver'=>$this->input->post('smtpserver'),
			'smtpport'=>$this->input->post('smtpport'),
			'twitter'=>$this->input->post('twitter'),
			'linkedin'=>$this->input->post('linkedin'),
			'gmail'=>$this->input->post('gmail'),
			'hakkimizda'=>$this->input->post('editor1'),
			'iletisim'=>$this->input->post('editor2')			
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
						
			$this->Database_Model->update_data("ayarlar", $data,$id);
			$this->session->set_flashdata("mesaj", "Ayarlar Güncellendi..");
			redirect(base_url().'admin/home/ayarlar');
	}
	
}
