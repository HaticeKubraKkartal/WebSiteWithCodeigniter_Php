<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
        {
            parent::__construct();
            // Your own constructor code
			$this->load->helper('url');
			$this->load->model('Database_Model');
        }

	public function index()
	{
		$query=$this->db->query("SELECT * FROM kategori ORDER BY Id");
		$data["kategori"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM makaleler WHERE grup='populer'");
		$data["populer"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM makaleler");
		$data["makale"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM sozler ORDER BY RAND() LIMIT 1");
		$veri["soz"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM makaleler ORDER BY RAND() LIMIT 8");
		$data["random"]=$query->result();
		
		// Headerdaki meta tag bilgileri...
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="";
		
		$this->load->view('_header',$data);
		$this->load->view('_slider');
		$this->load->view('_content',$veri);
		$this->load->view('_footer',$data);
	}
	public function hakkimizda()
	{
		$query=$this->db->query("SELECT * FROM kategori ORDER BY Id");
		$data["kategori"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result(); // database'den ayarlar sorgusu yaparak meta taglarını oluşturuyoruz.
		$data["sayfa"]="Hakkımızda || ";

		$this->load->view('hakkimizda',$data);
	}
	public function iletisim()
	{
		$query=$this->db->query("SELECT * FROM kategori ORDER BY Id");
		$data["kategori"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="İletişim || ";	

		$this->load->view('iletisim',$data);

	}
	public function mesaj_kaydet()
	{
		//Form verilerini alıyoruz..
		$data=array(
			'Adsoy'=>$this->input->post('adsoy'),		
			'Email'=>$this->input->post('email'),
			'Mesaj'=>$this->input->post('mesaj'),
			'IP' => $_SERVER['REMOTE_ADDR']
			); 
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->db->insert("mesajlar", $data);
			
			
			$query=$this->db->get("ayarlar");
		$data["veri"]=$query->result();
			$adsoy=$this->input->post('adsoy');
		$email=$this->input->post('email');
				//email server ayarları
				//echo $data["veri"][0]->smtpemail;
				//echo $data["veri"][0]->sifre;
			$config=Array(
		'protocol'=>'smtp',
		'smtp_host'=>$data["veri"][0]->smtpserver,
		'smtp_port'=>$data["veri"][0]->smtpport,
		'smtp_user'=>$data["veri"][0]->smtpemail,
		'smtp_pass'=>$data["veri"][0]->password,
		'smtp_crypto'=>'tls',
		'mailtype'=>'html',
		'charset'=>'utf-8',
		'wordwrap'=>TRUE
		);
		//istediğiniz şekilde email içeriğini html olarak görüntüleyebilirsiniz
		$mesaj="Değerli:".$adsoy."<br>Göndermiş OLduğunuz Mesaj Alınmıştır.<br>En kısa sürede sizinle iletişime gecilecektir.Tesekkür ederiz<br>";
		$mesaj.="======================<br>";
		$mesaj.=$data["veri"][0]->name."<br>";
		$mesaj.=$data["veri"][0]->adres."<br>";
		$mesaj.=$data["veri"][0]->sehir."<br>";
		$mesaj.=$data["veri"][0]->tel."<br>";
		$mesaj.=$data["veri"][0]->email."<br>";
		$mesaj.="Gönderdiğiniz mesaj aşağıdaki gibidir<br>======================<br>";
		$mesaj.=$this->input->post('mesaj');
		//email gönderme
		
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from($data["veri"][0]->smtpemail);
		$this->email->to($email);
		$this->email->subject($data["veri"][0]->name."Form Alındı Mesajı");
		$this->email->message($mesaj);
		//send email
		if($this->email->send())
			$this->session->set_flashdata("email_send","Email Başları İle Gönderildi.");
		else
		{
			$this->session->set_flashdata("email_send","Email Göndermede Hata OLuştu.");
			show_error($this->email->print_debugger());		
		}		
			$this->session->set_flashdata("mesaj", "<p align='center'>Mesajınız Başarılı Bir Şekilde Gönderilmiştir <br> En Kısa Sürede Sizinle İletişime Geçilecektir.</p>");
			redirect(base_url().'home/iletisim');
	}
	
	public function login_ol()
	{	
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Uye Giriş || ";	

		$this->load->view('login_sayfasi',$data);
	}
	public function login()
	{	
		$email=$this->input->post("eposta");
		$sifre=$this->input->post("sifre");
		/*Zararlı kodlardan temizleme*/
		echo $email=$this->security->xss_clean($email);
		echo $sifre=$this->security->xss_clean($sifre);
		//exit(); -> ekranda gözükmesini sağladık email'in
		
		$this->load->model('Database_Model');
		$result=$this->Database_Model->login("uyeler", $email, $sifre);
		
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
			/*print_r($sess_array);
			echo "<br>Login Oldu";
			exit();*/ // Burası databaseden veriler geliyor mu kontrol edildi.
			
			$this->session->set_userdata("uye_session",$sess_array);
			redirect(base_url());
		}
		else{
			$this->session->set_flashdata("mesaj","Kullanıcı Adı veya Şifre Hatalı!!");
			//echo "Hata Var!";
			redirect(base_url().'home/login_ol');
		}
	}
	public function uye_kayit()
	{	
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Uye Kayit || ";	

		$this->load->view('kayit_sayfasi',$data);
	}
	public function kayit_ol()
	{	
		//Form verilerini alıyoruz..
		$data=array(
			'adsoy'=>$this->input->post('adsoy'),
			'username'=>$this->input->post('username'),
			'email'=>$this->input->post('email'),
			'sifre'=>$this->input->post('sifre'),
			);
			//sol taraftaki alanlar veritabanındaki isimler , sağ taraftaki alanlar ise formdan gelen verilerin isimleri
			
			$this->db->insert("uyeler", $data);
			$this->session->set_flashdata("mesaj", "Üye Kaydı Gerçekleştirildi Giriş Yapabilirsiniz");
			redirect(base_url().'home/login_ol');
	}
	public function makaledetay($id)
	{
		$query=$this->db->query("SELECT * FROM kategori ORDER BY Id");
		$data["kategori"]=$query->result();
		$data["sayfa"]="Makale Detay || ";	
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		
		$data["veriler"]=$this->Database_Model->get_makale($id);
		
		$query=$this->db->query("SELECT makaleler. *, uyeler.adsoy as uyeAdi
		FROM makaleler
		INNER JOIN uyeler ON makaleler.uyeId=uyeler.id	
		WHERE makaleler.Id=".$id);
		$data["uyeAd"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM makale_resim WHERE makaleId=$id");
		$data["resimler"]=$query->result();
		
		$this->session->set_flashdata("mesaj", "Üye Olmadan Yorum Yapamazsınız");
		$this->load->view('makale_detay',$data);
	}
	public function blog()
	{
		$query=$this->db->query("SELECT * FROM kategori ORDER BY Id");
		$data["kategori"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM makaleler WHERE grup='genel'");
		$data["veriler"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Blog || ";	
		
		$this->load->view('blog',$data);
	}	
	public function sifremi_unuttum()
	{
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Giris ||";
		
		$this->session->set_flashdata("mesaj", "Şifrenizi değiştirmek için bizimle iletişime geçiniz..");
		redirect(base_url().'home/login_ol');
	}
	public function kategori($id)
	{
		$query=$this->db->query("SELECT makaleler. *, kategori.KategoriAdi as katadi
		FROM makaleler INNER JOIN kategori ON makaleler.kategori=kategori.Id
		WHERE kategori=$id");
		$data["veriler"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM kategori ORDER BY Id");
		$data["kategori"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Blog || ";	
		
		$this->load->view('blog', $data);
	}
	public function yorumbak($id)
	{
		$query=$this->db->query("SELECT * FROM kategori ORDER BY Id");
		$data["kategori"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM ayarlar");
		$data["veri"]=$query->result();
		$data["sayfa"]="Yorum ||";	
		
		$data["veriler"]=$this->Database_Model->yorum_cek($id);
		
		$this->session->set_flashdata("mesaj", "Bu Makaleye Ait Yorum Bulunmamaktadır..");
		$this->load->view('yorum_detay', $data);
	}	
}
