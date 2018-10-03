<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sozler extends CI_Controller {
	
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
		$query=$this->db->query("SELECT * FROM sozler ORDER BY Id");
		$data["veriler"]=$query->result();

		$this->load->view('admin/sozler_liste', $data);
		
	}
	public function ekle()
	{
		//sozleri gösterebilmek için kullanılan 3 satırlık kod...
		$query=$this->db->query("SELECT * FROM sozler");
		$data["veriler"]=$query->result();
		$this->load->view('admin/sozler_ekle',$data);
	}
	public function ekle_kaydet()
	{
		//Form verilerini alıyoruz..
		$data=array(
			'sozler'=>$this->input->post('icerik'),
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->db->insert("sozler", $data);
			$this->session->set_flashdata("mesaj", "Sözler Kaydı Gerçekleştirildi..");
			redirect(base_url().'admin/sozler');
	}
	public function duzenle($id)
	{
		$query=$this->db->query("SELECT * FROM sozler WHERE Id=$id");
		$data["veriler"]=$query->result();
		$this->load->view('admin/sozler_duzenle_form', $data);
	}
	public function guncelle($id)
	{
		//Form verilerini alıyoruz..
		$data=array(
			'sozler'=>$this->input->post('icerik'),
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->load->model('Database_Model');
			$this->Database_Model->update_data("sozler", $data,$id);
			$this->session->set_flashdata("mesaj", "sozler Kaydı Güncellendi..");
			redirect(base_url().'admin/sozler');
	}	
	public function sil($id)
	{
		$this->db->query("DELETE FROM sozler WHERE Id=$id");
		$this->session->set_flashdata("mesaj", "Sözler Kaydı Silindi..");
		redirect(base_url().'admin/sozler');
	}
}
