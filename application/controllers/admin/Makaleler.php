<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makaleler extends CI_Controller {
	
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
		//$query=$this->db->query("SELECT * FROM makaleler ORDER BY Id");
		//$data["veriler"]=$query->result();
		$data["veriler"]=$this->Database_Model->get_makaleler();
		$this->load->view('admin/makaleler_liste', $data);
		
	}
	public function ekle()
	{
		//Kategorileri gösterebilmek için kullanılan 3 satırlık kod...
		$query=$this->db->query("SELECT * FROM kategori");
		$data["veriler"]=$query->result();
		$data["veri"]=$this->Database_Model->get_makaleler();
		$this->load->view('admin/makaleler_ekle',$data);
	}
	public function ekle_kaydet()
	{
		//Form verilerini alıyoruz..
		$data=array(
			'kategori'=>$this->input->post('kategori'),
			'baslik'=>$this->input->post('baslik'),
			'icerik'=>$this->input->post('icerik'),
			'tarih'=>$this->input->post('tarih'),
			'resim'=>$this->input->post('resim'),
			'yorum'=>$this->input->post('yorum'),
			'okunmasayisi'=>$this->input->post('okunmasayisi'),
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->db->insert("makaleler", $data);
			$this->session->set_flashdata("mesaj", "Makale Kaydı Gerçekleştirildi..");
			redirect(base_url().'admin/makaleler');
	}
	public function duzenle($id)
	{
		$query=$this->db->query("SELECT * FROM kategori");
		$data["veriler"]=$query->result();
		$data["veri"]=$this->Database_Model->get_makale($id);
		$this->load->view('admin/makaleler_duzenle_form', $data);
	}
	public function guncelle($id)
	{
		//Form verilerini alıyoruz..
		$data=array(
			'kategori'=>$this->input->post('kategori'),
			'baslik'=>$this->input->post('baslik'),
			'icerik'=>$this->input->post('icerik'),
			'tarih'=>$this->input->post('tarih'),
			//'resim'=>$this->input->post('resim'),
			'yorum'=>$this->input->post('yorum'),
			'okunmasayisi'=>$this->input->post('okunmasayisi')
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->load->model('Database_Model');
			$this->Database_Model->update_data("makaleler", $data,$id);
			$this->session->set_flashdata("mesaj", "Makale Kaydı Güncellendi..");
			redirect(base_url().'admin/makaleler');
	}
	
	public function sil($id)
	{
		$this->db->query("DELETE FROM makaleler WHERE Id=$id");
		$this->session->set_flashdata("mesaj", "Makale Kaydı Silindi..");
		redirect(base_url().'admin/makaleler');
	}
	
	public function resim_yukle($id)
	{
		$query=$this->db->query("SELECT * FROM makaleler WHERE Id=$id");
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
        $config['max_size']             = 1200;			  // boyutu,
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
			$this->Database_Model->update_data("makaleler", $data,$id);
			$this->session->set_flashdata("mesaj", " Resim Yuklendi..");
			redirect(base_url().'admin/makaleler');
        }
	}	
	public function galeri_yukle($id)
	{
		$query=$this->db->query("SELECT * FROM makale_resim WHERE makaleId=$id");
		$data["veriler"]=$query->result();
		
		$data["id"]=$id;
		$this->load->view('admin/makaleler_galeri_yukle',$data);
	}
	public function galeri_kaydet($id)
	{
		$data["id"]=$id;
		
		//upload edilecek dosyaya ait ayarlar ve limitler
		$config['upload_path']          = './uploads/';   //dosya hangi klasöre kaydedilecekse,
        $config['allowed_types']        = 'gif|jpg|png';  //desteklediği tür,
        $config['max_size']             = 1200;			  // boyutu,
        $config['max_width']            = 1200;			  // genişlik,
        $config['max_height']           = 1024;			  // yuksekliği ne kadar olacaksa..
		
		//Ayarlar ile kütüphane çağrılır.
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('resim')) //Eğer yuklemede hata varsa
        {
            $error =$this->upload->display_errors(); //Oluşan hata bir değişkene atandı.
			$this->session->set_flashdata("mesaj", "Yüklemede Hata Oluştu:".$error);
            redirect(base_url().'admin/makaleler/galeri_yukle/'.$id);
        }
        else  //Hata yoksa
        {
			//Veritabanındaki makale_resim tablosuna kayit yapar..
            $upload_data = $this->upload->data();				
			$data=array(		
				'makaleId'=>$id,
				'resim'=>$upload_data["file_name"]
			);			
			$this->db->insert("makale_resim" , $data);
			//Kayit işlemi biter..
			
			$this->session->set_flashdata("mesaj", "Yükleme Başarılı..");
			redirect(base_url().'admin/makaleler/galeri_yukle/'.$id);
        }
	}
	
	public function galeri_sil($makaleid, $resimid)
	{
		$this->db->query("DELETE FROM makale_resim WHERE Id=$resimid");
		$this->session->set_flashdata("mesaj", "Galeriden Resim Silindi..");
		redirect(base_url().'admin/makaleler/galeri_yukle/'.$makaleid);
	}
}
