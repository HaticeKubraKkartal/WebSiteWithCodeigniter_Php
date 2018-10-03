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
                <h3>Makale Ekleme</h3> 
              </div>

             </div>
            <div class="clearfix"></div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Makale Bİlgilerini Giriniz </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="post" action="<?=base_url()?>admin/makaleler/ekle_kaydet" >
					<div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="kategori">
						  <option value="<?=$veri[0]->kategori?>"><?=$veri[0]->katadi?></option>
                            <?php foreach($veriler as $rs){?>
							<option value="<?=$rs->Id?>"><?=$rs->KategoriAdi?></option>
							<?php }?>

                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ad_soyad">Makale Başlığı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="baslik" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kullanici">İçerik<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
                          <textarea type="text"  name="icerik" id="icerik" required="required" rows=25 class="form-control col-md-7 col-xs-12"></textarea>
						  <script>
								// Replace the <textarea id="icerik"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace( 'icerik' );
						  </script>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Tarih <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="tarih" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kullanici">Yorum</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="yorum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?=base_url()?>admin/makaleler" class="btn btn-primary" >Vazgeç</a>
						  <button class="btn btn-primary" type="reset">Temizle</button>
                          <button type="submit" class="btn btn-success">Kaydet</button>
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