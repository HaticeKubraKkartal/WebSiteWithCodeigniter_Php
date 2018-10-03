<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoriler extends CI_Controller {
	
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
		$query=$this->db->query("SELECT * FROM kategori ORDER BY Id");
		$data["veriler"]=$query->result();

		$this->load->view('admin/kategoriler_liste', $data);
		
	}
	public function ekle()
	{
		//Kategorileri gösterebilmek için kullanılan 3 satırlık kod...
		$query=$this->db->query("SELECT * FROM kategori");
		$data["veriler"]=$query->result();
		$this->load->view('admin/kategoriler_ekle',$data);
	}
	public function ekle_kaydet()
	{
		//Form verilerini alıyoruz..
		$data=array(
			'KategoriAdi'=>$this->input->post('adi'),
			
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->db->insert("kategori", $data);
			$this->session->set_flashdata("mesaj", "Kategori Kaydı Gerçekleştirildi..");
			redirect(base_url().'admin/kategoriler');
	}
	public function duzenle($id)
	{
		$query=$this->db->query("SELECT * FROM kategori WHERE Id=$id");
		$data["veriler"]=$query->result();
		$this->load->view('admin/kategoriler_duzenle_form', $data);
	}
	public function guncelle($id)
	{
		//Form verilerini alıyoruz..
		$data=array(
			'KategoriAdi'=>$this->input->post('adi'),
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->load->model('Database_Model');
			$this->Database_Model->update_data("kategori", $data,$id);
			$this->session->set_flashdata("mesaj", "Kategori Kaydı Güncellendi..");
			redirect(base_url().'admin/kategoriler');
	}	
	public function sil($id)
	{
		$this->db->query("DELETE FROM kategori WHERE Id=$id");
		$this->session->set_flashdata("mesaj", "Makale Kaydı Silindi..");
		redirect(base_url().'admin/kategoriler');
	}
}
