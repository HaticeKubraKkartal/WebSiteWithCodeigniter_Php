<?php
class Database_model extends CI_Model {
	
	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
		
	public function login($tablo,$email,$sifre){
		$this->db->select("*");
		$this->db->from($tablo);
		$this->db->where('email',$email);
		$this->db->where('sifre', $sifre);
		$this->db->where('durum', "aktif");
		$this->db->limit(1);
		
		$query=$this->db->get(); //verileri getir
		if($query->num_rows()==1){
			return $query->result();
		}
		else{
			return false;			
		}//Elde edilen veri return ediliyor.
	}
	public function update_data($tablo,$data,$id){
		
		$this->db->where('id', $id);
		$this->db->update($tablo,$data);
		return true;	
	}	
	
	function get_makaleler(){
		$query=$this->db->query('SELECT makaleler. *, kategori.KategoriAdi as katadi
		FROM makaleler
		INNER JOIN kategori ON makaleler.kategori=kategori.Id
		ORDER BY Id');
		
		return $query->result();
	}	
	
	function get_makale($id){
		$query=$this->db->query('SELECT makaleler. *, kategori.KategoriAdi as katadi
		FROM makaleler
		INNER JOIN kategori ON makaleler.kategori=kategori.Id
		WHERE makaleler.Id='.$id);
		
		return $query->result();
	}	
	function blog_yazi($id){
		
		$query=$this->db->query('SELECT makaleler. *, uyeler.adsoy as uyeAdi
		FROM makaleler
		INNER JOIN uyeler ON makaleler.uyeId=uyeler.id	
		WHERE makaleler.uyeId='.$id);
		
		return $query->result();
	}	

	function makale_gonder(){
		
		$query=$this->db->query('SELECT gelen_yazilar. *, uyeler.adsoy as uyeAdi
		FROM gelen_yazilar
		INNER JOIN uyeler ON gelen_yazilar.uyeId=uyeler.id	
		ORDER BY Id');
		
		return $query->result();
	}	
	function makale_getir($id){
		
		$query=$this->db->query('SELECT gelen_yazilar. *, uyeler.adsoy as uyeAdi
		FROM gelen_yazilar
		INNER JOIN uyeler ON gelen_yazilar.uyeId=uyeler.id	
		WHERE gelen_yazilar.Id='.$id);
		
		return $query->result();
	}
	function get_gelen_yazilar_kategori($id){
		$query=$this->db->query('SELECT gelen_yazilar. *, kategori.KategoriAdi as katadi
		FROM gelen_yazilar
		INNER JOIN kategori ON gelen_yazilar.kategori=kategori.Id
		WHERE gelen_yazilar.Id='.$id);
		
		return $query->result();
	}

	function yorum_cek($id){
		
		$query=$this->db->query('SELECT yorumlar. *, uyeler.adsoy as uyeAdi
		FROM yorumlar
		INNER JOIN uyeler ON yorumlar.UyelerId=uyeler.id	
		WHERE yorumlar.MakaleId='.$id);
		
		return $query->result();
	}	
}


?>