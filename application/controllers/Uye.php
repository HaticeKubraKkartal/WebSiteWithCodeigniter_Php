<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uye extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            // Your own constructor code
			$this->load->helper('url');
			$this->load->model('Database_Model');
			//Giriş Yapmak için sağlanan kontrol
			if(!$this->session->userdata("uye_session"))
				redirect(base_url().'home/login_ol');
        }
	public function index()
	{
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM uyeler WHERE id=".$this->session->uye_session["id"]);
		$data["uye"]=$query->result();
		$data["sayfa"]="Uye Paneli ||";
		
		$this->load->view('hesabim',$data);		
	}	
	
	public function cikis()
	{
		$this->session->unset_userdata("uye_session");
		redirect(base_url());
	}
	
	public function hesabim()
	{
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Uye Paneli ||";
		
		$query=$this->db->query("SELECT * FROM uyeler WHERE id=".$this->session->uye_session["id"]);
		$data["uye"]=$query->result();
		
		$this->load->view('hesabim',$data);		
	}	
	
	public function uye_guncelle()
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
			'tel'=>$this->input->post('tel')
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			$id=$this->session->uye_session["id"];
			
			$this->Database_Model->update_data("uyeler", $data,$id);
			$this->session->set_flashdata("mesaj", "Üye Bilgileriniz Güncellendi");
			redirect(base_url().'uye/hesabim');	
	}
	public function yazilarim()
	{
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Yazılarım ||";
		
		$id=$this->session->uye_session["id"];
		$data["veriler"]=$this->Database_Model->blog_yazi($id);
		
		$this->load->view('blog_yazilarim',$data);		
	}
	public function makale_olustur()
	{
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Makale Yaz ||";
		
		$query=$this->db->query("SELECT * FROM kategori");
		$data["veriler"]=$query->result();
		$data["data"]=$this->Database_Model->get_makaleler();
		
		$id=$this->session->uye_session["id"];
		$query=$this->db->query("SELECT * FROM uyeler WHERE id=$id");
		$data["uye"]=$query->result();
		
		$this->load->view('makale_olustur', $data);		
	}	
	public function makale_tamamla()
	{
		$data=array(
			'baslik'=>$this->input->post('baslik'),
			'uyeId'=>$this->session->uye_session["id"],
			'kategori'=>$this->input->post('kategori'),
			'resim'=>$this->input->post('resim'),
			'tarih'=>$this->input->post('tarih'),
			'icerik'=>$this->input->post('icerik'),		
			'IP' => $_SERVER['REMOTE_ADDR']			
			);
			
			$this->db->insert("gelen_yazilar", $data);// verileri gelen_yazilar tablosuna eklemek için yazılan kod..
			/*$gonderilen=$this->db->insert_id();// insert komutu girilen kaydın id'sini alır..
			
			$id=$this->session->uye_session["id"]; // gonderilen makaleleri eklemek için..
			$veriler=$this->Database_Model->blog_yazi($id);// gonderilen makaleleri gelen_yazilar tablosuna aktarma..*/
			
			//$query=$this->db->query("SELECT * FROM gelen_makale WHERE id=$id");
			
			$this->session->set_flashdata("mesaj", "Makaleniz Gönderildi En Kısa Sürede Sitede Yayınlanacaktır.");
			redirect(base_url().'uye/yazilarim');
	}
	public function profil_resim()
	{
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Uye Profil Resmi ||";
		
		$query=$this->db->query("SELECT * FROM uyeler WHERE id=".$this->session->uye_session["id"]);
		$data["uye"]=$query->result();
	
		$this->load->view('profil_resmi',$data);		
	}
	public function yorumlar($id)
	{	
		$data=array(
			'yorum'=>$this->input->post('yorum'),
			'UyelerId'=>$this->session->uye_session["id"],
			'MakaleId'=>$id,
			'IP' => $_SERVER['REMOTE_ADDR']			
			);
			
		$this->db->insert("yorumlar", $data);
			
		redirect(base_url().'home/makaledetay/'.$id);
	}
}
