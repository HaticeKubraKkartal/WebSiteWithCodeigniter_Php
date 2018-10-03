<?php 
	$this->load->view('_header');
?>
				<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-vert-30">
				<div class="col-md-8">
					<h2><strong>Hesap Bilgilerim</strong></h2>
						<h5 align="center"><?php if($this->session->flashdata("mesaj")){?>
									<div class="list-group-item list-group-item-danger"><strong>				
									<?=$this->session->flashdata("mesaj");?></strong>
									</div><?php } ?></h5>
					<form class="signup-page" method="post" action="<?=base_url()?>uye/uye_guncelle">
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ad_soyad">Adı Soyadı <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" name="adsoy" required="required" value="<?=$uye[0]->adsoy?>" class="form-control col-md-7 col-xs-12 margin-bottom-10">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kullanici">Kullanıcı Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text"  name="username" required="required" value="<?=$uye[0]->username?>" class="form-control col-md-7 col-xs-12  margin-bottom-10">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="email" name="email" required="required" value="<?=$uye[0]->email?>" class="form-control col-md-7 col-xs-12  margin-bottom-10">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sifre">Şifre <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="password" name="password" required="required" value="<?=$uye[0]->sifre?>" class="form-control col-md-7 col-xs-12  margin-bottom-10">
                        </div>
                      </div>   					  					  
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Adres</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input id="middle-name" value="<?=$uye[0]->adres?>" class="form-control col-md-7 col-xs-12  margin-bottom-10" type="text" name="adres">
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefon</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input id="middle-name"  value="<?=$uye[0]->tel?>" class="form-control col-md-7 col-xs-12  margin-bottom-10" type="text" name="tel">
                        </div>
                      </div>
					  
					  
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Şehir</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input id="middle-name"  value="<?=$uye[0]->sehir?>" class="form-control col-md-7 col-xs-12  margin-bottom-10" type="text" name="sehir">
                        </div>
                      </div>
						
						
						<hr>
						<div class="row">
							
							<div class="col-lg-12 text-center">
								<button class="btn btn-red" type="submit">Bilgileri Güncelle</button>
							</div>
						</div>
					</form>
					

				</div>
				<!-- Side Column -->
				<div class="col-md-4">
				<div class="panel panel-red">
					<div class="panel-heading">
						<h3 align="center" class="panel-title">Uye Paneli</h3>
					</div>
					<div class="panel-body">
						<!--<strong><li><a href="<?=base_url()?>uye/profil_resim">Profil Resmi</a></li></strong>-->
						<strong><li><a href="<?=base_url()?>uye/hesabim">Hesap Bilgilerim</a></li></strong>
						<strong><li><a href="<?=base_url()?>uye/yazilarim">Blog Yazılarım</a></li></strong>
						
					</div>
				</div>			
			</div>
			<!-- End Side Column -->
			</div>
		</div>
		<!-- === END CONTENT === -->
<?php 
	$this->load->view('_footer');
?>	