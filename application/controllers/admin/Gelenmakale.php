<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gelenmakale extends CI_Controller {
	
	public function __construct()
        {
            parent::__construct();
            // Your own constructor code
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('Database_Model');
			if(!$this->session->userdata("admin_session"))
				redirect(base_url().'admin/login');	
        }

	public function index()
	{
		$query=$this->db->query("SELECT gelen_yazilar. *, uyeler.adsoy as uyeAdi
		FROM gelen_yazilar
		INNER JOIN uyeler ON gelen_yazilar.uyeId=uyeler.id WHERE gelen_yazilar.durum='yeni' ");
		$data["veriler"]=$query->result();	
		$this->load->view('admin/gelen_makale', $data);
	}
	public function duzenle($id)
	{
		$query=$this->db->query("SELECT * FROM kategori");
		$data["veriler"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM gelen_yazilar WHERE Id=$id");
		$data["durum"]=$query->result();

		
		$data["veri"]=$this->Database_Model->get_gelen_yazilar_kategori($id);
		$data["bilgi"]=$this->Database_Model->makale_getir($id);

		$this->load->view('admin/gelen_makale_duzenle', $data);
	}
	
	public function onay()
	{
		$query=$this->db->query("SELECT gelen_yazilar. *, uyeler.adsoy as uyeAdi
		FROM gelen_yazilar
		INNER JOIN uyeler ON gelen_yazilar.uyeId=uyeler.id WHERE gelen_yazilar.durum='onaylandı'");
		$data["veriler"]=$query->result();
		
		$this->load->view('admin/onaylananlar',$data);
	}
	public function guncelle($id)
	{
		//Form verilerini alıyoruz..
		$data=array(
			'baslik'=>$this->input->post('baslik'),		
			'tarih'=>$this->input->post('tarih'),
			'kategori'=>$this->input->post('kategori'),
			'durum'=>$this->input->post('durum'),
			); 
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->Database_Model->update_data("gelen_yazilar", $data,$id);
			$this->session->set_flashdata("mesaj", "<p align='center'>Makale Onaylananlar Listesine Eklenmiştir.</p>");
			redirect(base_url().'admin/gelenmakale');
		
	}
	public function iptal()
	{
		$query=$this->db->query("SELECT gelen_yazilar. *, uyeler.adsoy as uyeAdi
		FROM gelen_yazilar
		INNER JOIN uyeler ON gelen_yazilar.uyeId=uyeler.id WHERE gelen_yazilar.durum='iptal'");
		$data["veriler"]=$query->result();
		$this->load->view('admin/iptal',$data);
	}
	public function iptal_et($id)
	{
		$this->db->query("DELETE FROM gelen_yazilar WHERE Id=$id");
		$this->session->set_flashdata("mesaj", "Makale Kaydı Silindi..");
		redirect(base_url().'admin/gelenmakale/iptal');
	}
	/***********************************************/
	/*public function resim_yukle($id)
	{
		$query=$this->db->query("SELECT * FROM gelen_yazilar WHERE Id=$id");
		$data["veri"]=$query->result();
		
		$data["id"]=$id;
		$this->load->view('admin/makaleler_resim_yukle',$data);
	}
	public function resim_kaydet($id)
	{
		$data["id"]=$id;
		
		//upload edilecek dosyaya ait ayarlar ve limitler
		$config['upload_path']          = './uploads/';   //dosya hangi klasöre kaydedilecekse,
        $config['allowed_types']        = 'gif|jpg|png';  //desteklediği tür,
        $config['max_size']             = 1024;			  // boyutu,
        $config['max_width']            = 1200;			  // genişlik,
        $config['max_height']           = 1024;			  // yuksekliği ne kadar olacaksa..
		
		//Ayarlar ile kütüphane çağrılır.
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('resim')) //Eğer yuklemede hata varsa
        {
            $error =$this->upload->display_errors(); //Oluşan hata bir değişkene atandı.
			$this->session->set_flashdata("mesaj", "Yüklemede Hata Oluştu:".$error);
            $this->load->view('admin/makaleler_resim_yukle',$data);
        }
        else  //Hata yoksa
        {
            $upload_data = $this->upload->data();		
		
			$data=array(			
				'resim'=>$upload_data["file_name"]
			);
			
			$this->load->model('Database_Model');
			$this->Database_Model->update_data("gelen_yazilar", $data,$id);
			$this->session->set_flashdata("mesaj", " Resim Yuklendi..");
			redirect(base_url().'admin/gelen_makale');
        }
	}*/
	public function onayla($id)
	{
		$query=$this->db->query("SELECT * FROM kategori");
		$data["veriler"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM gelen_yazilar WHERE Id=$id");
		$data["durum"]=$query->result();

		
		$data["veri"]=$this->Database_Model->get_gelen_yazilar_kategori($id);
		$data["bilgi"]=$this->Database_Model->makale_getir($id);

		$this->load->view('admin/onaylananlar_duzenle', $data);
	}
	public function gonder()
	{
		//Form verilerini alıyoruz..
		$data=array(
			'uyeId'=>$this->input->post('uyeId'),
			'kategori'=>$this->input->post('kategori'),
			'baslik'=>$this->input->post('baslik'),
			'icerik'=>$this->input->post('icerik'),
			'tarih'=>$this->input->post('tarih'),
			'resim'=>$this->input->post('resim'),
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->db->insert("makaleler", $data);
			$this->session->set_flashdata("mesaj", "Makale Kaydı Gerçekleştirildi..");
			redirect(base_url().'admin/gelenmakale/onay');
	}
	
	
}
