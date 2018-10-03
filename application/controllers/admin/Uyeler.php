<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uyeler extends CI_Controller {
	
	public function __construct()
        {
            parent::__construct();
            // Your own constructor code
			$this->load->helper('url');
			$this->load->library('session');
			if(!$this->session->userdata("admin_session"))
				redirect(base_url().'admin/login');
		
        }

	public function index()
	{
		$query=$this->db->query("SELECT * FROM uyeler ORDER BY adsoy");
		$data["veriler"]=$query->result();
		$this->load->view('admin/uyeler_liste', $data);
		
	}
	public function ekle()
	{
		$this->load->view('admin/uyeler_ekle');
	}
	public function ekle_kaydet()
	{
		//Form verilerini alıyoruz..
		$data=array(
			'adsoy'=>$this->input->post('adsoy'),
			'username'=>$this->input->post('username'),
			'email'=>$this->input->post('email'),
			'sifre'=>$this->input->post('password'),
			'sehir'=>$this->input->post('sehir'),
			'yetki'=>$this->input->post('yetki'),
			'durum'=>$this->input->post('durum'),
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->db->insert("uyeler", $data);
			$this->session->set_flashdata("mesaj", "Üye Kaydı Gerçekleştirildi");
			redirect(base_url().'admin/uyeler');
	}
	public function duzenle($id)
	{
		$query=$this->db->query("SELECT * FROM uyeler WHERE id=$id");
		$data["veri"]=$query->result();
		//databaseden verileri çektiğimiz veri'nin içine atayıp formdan da bu veri adındaki değişkeni çağıracağız..
		$this->load->view('admin/uyeler_duzenle_form', $data);
	}
	public function guncelle($id)
	{
		//Form verilerini alıyoruz..
		$data=array(
			'adsoy'=>$this->input->post('adsoy'),
			'username'=>$this->input->post('username'),
			'email'=>$this->input->post('email'),
			'sifre'=>$this->input->post('password'),
			'sehir'=>$this->input->post('sehir'),
			'adres'=>$this->input->post('adres'),
			'resim'=>$this->input->post('resim'),
			'yetki'=>$this->input->post('yetki'),
			'durum'=>$this->input->post('durum'),
			'tel'=>$this->input->post('tel'),
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->load->model('Database_Model');
			$this->Database_Model->update_data("uyeler", $data,$id);
			$this->session->set_flashdata("mesaj", "Üye Kaydı Güncellendi");
			redirect(base_url().'admin/uyeler');
	}
	
	public function sil($id)
	{
		$this->db->query("DELETE FROM uyeler WHERE id=$id");
		$this->session->set_flashdata("mesaj", "Üye Kaydı Silindi");
		redirect(base_url().'admin/uyeler');
	}
	
}
