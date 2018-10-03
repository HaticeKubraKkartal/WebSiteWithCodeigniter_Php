<?php
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/_menufooter');
		$this->load->view('admin/_header');
?>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Üye Düzenle</h3> 
              </div>

             </div>
            <div class="clearfix"></div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Üye Bİlgilerini Giriniz </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="post" action="<?=base_url()?>admin/uyeler/guncelle/<?=$veri[0]->id?>" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ad_soyad">Adı Soyadı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="adsoy" required="required" value="<?=$veri[0]->adsoy?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kullanici">Kullanıcı Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="username" required="required" value="<?=$veri[0]->username?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" name="email" required="required" value="<?=$veri[0]->email?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sifre">Şifre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="password" required="required" value="<?=$veri[0]->sifre?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>   					  
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resim</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
						  <input type="file" name="resim" value="<?=$veri[0]->resim?>" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage">
                        </div>
                      </div>					  
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Adres</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" value="<?=$veri[0]->adres?>" class="form-control col-md-7 col-xs-12" type="text" name="adres">
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefon</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name"  value="<?=$veri[0]->tel?>" class="form-control col-md-7 col-xs-12" type="text" name="tel">
                        </div>
                      </div>
					  
					  
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sehir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control"  name="sehir">
                            <option><?=$veri[0]->sehir?></option>
							<option>Ankara</option>
                            <option>İstanbul</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Yetki</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="yetki">
							<option><?=$veri[0]->yetki?></option>
                            <option>Admin</option>
                            <option>Üye</option>
							<option>Misafir Kullanıcı</option> 
                          </select>
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Durum</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="durum">
							<option><?=$veri[0]->durum?></option>
                            <option>Aktif</option>
                            <option>Pasif</option>                           
                          </select>
                        </div>
                      </div>
					    
					 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?=base_url()?>admin/uyeler" class="btn btn-primary" >Vazgeç</a>
						  
                          <button type="submit" class="btn btn-success">Güncelle</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>	  
			 
			  <div class="clearfix"></div>
			
          </div>
        </div>
        <!-- /page content -->
<?php
		$this->load->view('admin/_footer');
?>