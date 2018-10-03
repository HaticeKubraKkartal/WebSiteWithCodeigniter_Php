<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yorumlar extends CI_Controller {
	
	public function __construct()
        {
            parent::__construct();
            // Your own constructor code
			$this->load->model('Database_Model');
			$this->load->helper('url');
			$this->load->library('session');
			if(!$this->session->userdata("admin_session"))
				redirect(base_url().'admin/login');
		
        }
	public function index()
	{
		$query=$this->db->query("SELECT * FROM yorumlar ORDER BY Id");
		$data["veriler"]=$query->result();

		$this->load->view('admin/yorumlar_liste', $data);
		
	}
	public function duzenle($id)
	{
		$query=$this->db->query("SELECT * FROM yorumlar WHERE Id=$id");
		$data["veriler"]=$query->result();
		$this->load->view('admin/yorumlar_duzenle_form', $data);
	}
	public function guncelle($id)
	{
		//Form verilerini alıyoruz..
		$data=array(
			'yorum'=>$this->input->post('yorum'),
			'UyelerId'=>$this->input->post('uyeId'),
			'MakaleId'=>$this->input->post('makaleId'),
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->load->model('Database_Model');
			$this->Database_Model->update_data("yorumlar", $data,$id);
			$this->session->set_flashdata("mesaj", "Yorum Kaydı Güncellendi..");
			redirect(base_url().'admin/yorumlar');
	}	
	public function sil($id)
	{
		$this->db->query("DELETE FROM yorumlar WHERE Id=$id");
		$this->session->set_flashdata("mesaj", "Yorum Kaydı Silindi..");
		redirect(base_url().'admin/yorumlar');
	}
}
