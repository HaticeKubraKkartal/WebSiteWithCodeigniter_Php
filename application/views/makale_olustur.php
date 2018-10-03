<?php 
	$this->load->view('_header');
?>
<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-vert-30">
				<div class="col-md-12">
					<h2><strong>Makale Oluştur</strong></h2>
						
					<form class="signup-page" method="post" action="<?=base_url()?>uye/makale_tamamla">
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ad_soyad">Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" name="baslik" required="required" class="form-control col-md-8 col-xs-12 margin-bottom-10">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kullanici">İçerik<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea type="text"  name="icerik" required="required" rows=20 class="form-control col-md-8 col-xs-12  margin-bottom-10"></textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control col-md-8 col-xs-12 margin-bottom-10" required="required" name="kategori">
						  <option value="<?=$data[0]->kategori?>"><?=$data[0]->katadi?></option>
                            <?php foreach($veriler as $rs){?>
							<option value="<?=$rs->Id?>"><?=$rs->KategoriAdi?></option>
							<?php }?>
                          </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Tarih<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="date" name="tarih" required="required" class="form-control col-md-8 col-xs-12  margin-bottom-10">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sifre">Resim <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" name="resim" required="required" class="form-control col-md-8 col-xs-12  margin-bottom-10">
                        </div>
                      </div>   					  					  
											
						<hr>
						<div class="row">			
							<div class="col-lg-12 text-center">
							<a href="<?=base_url()?>uye/yazilarim" class="btn btn-red" >Vazgeç</a>
								<button class="btn btn-primary" type="reset">Temizle</button>
								<button class="btn btn-aqua" type="submit">Makaleyi Gönder</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- === END CONTENT === -->
<?php 
	$this->load->view('_footer');
?>