<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mesajlar extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		/*if (!$this->session->userdata("admin_session"))
		{
			redirect(base_url().'admin/Login');
		}*/
		
	}
		

	public function index()
	{
	
		$query=$this->db->query("SELECT * FROM mesajlar ORDER BY adsoy");
		$data["veriler"]=$query->result();
		$this->load->view('admin/mesaj_listesi',$data);
		
	}
	public function ekle()
	{
	
		$this->load->view('admin/mesaj_ekle');
		
	}
	public function ekle_kaydet()
	{
	    //form verlerini alcaz
		$data=array(
		'adsoy'=>$this->input->post('adsoy'),
		'email'=>$this->input->post('email'),
		'tarih'=>$this->input->post('tarih'),
		'tel'=>$this->input->post('tel'),
		'konu'=>$this->input->post('konu'),
		'mesaj'=>$this->input->post('mesaj')
	);
	$this->db->insert("mesajlar",$data);
	$this->session->set_flashdata("mesaj","MESAJ KAYDI GERÇEKLEŞTİRİLDİ!!");
	redirect(base_url().'admin/mesajlar');

		
	}
	public function detay($Id)
	{
		 $query=$this->db->query("UPDATE   mesajlar SET durum='Okundu' WHERE Id=$Id");
	   $query=$this->db->query("SELECT * FROM mesajlar WHERE Id=$Id");
		$data["veri"]=$query->result();
		$this->load->view('admin/mesaj_detay',$data);
	
		
	}
	public function guncelle($Id)
	{
	    //form verlerini alcaz
		$data=array(
		'adminnotu'=>$this->input->post('adminnotu')
	
	);
	$this->load->model('Database_Model');
	$this->Database_Model->update_data("mesajlar",$data,$Id);
	$this->session->set_flashdata("mesaj","NOTUNUZ GÜNCELLEŞTİRİLDİ!!");
	redirect(base_url()."admin/mesajlar/detay/$Id");

		
	}
	public function sil($Id)
	{
	   $this->db->query("DELETE FROM mesajlar WHERE Id=$Id");
		$this->session->set_flashdata("mesaj","MESAJ KAYDI SİLİNDİ!!");
			redirect(base_url().'admin/mesajlar');
	
		
	}
	
	
}
