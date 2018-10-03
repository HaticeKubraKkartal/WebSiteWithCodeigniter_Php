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
                <h3>Onaylanan Makale Düzenleme Formu</h3> 
              </div>

             </div>
            <div class="clearfix"></div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Makale Bİlgileri</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="post" action="<?=base_url()?>admin/gelenmakale/gonder/<?=$durum[0]->Id?>" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Makale Başlığı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="baslik" required="required" value="<?=$durum[0]->baslik?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Uye Id/Adı</label>
                        <div class="col-md-1 col-sm-1 col-xs-2">
                          <input id="middle-name" value="<?=$durum[0]->uyeId?>" class="form-control col-md-7 col-xs-12" type="text" name="uyeId">
						  
                        </div>
						 <div class="col-md-5 col-sm-5 col-xs-10">
                         <input id="middle-name" value="<?=$bilgi[0]->uyeAdi?>" class="form-control col-md-7 col-xs-12" type="text" >		
						  
                        </div>
                      </div>
 			  
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >İçerik <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
                          <textarea type="text" name="icerik" required="required" value="" class="form-control col-md-7 col-xs-12" rows=20><?=$durum[0]->icerik?></textArea>
                        <script>
								// Replace the <textarea id="icerik"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace( 'icerik' );
						  </script>
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Tarih<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="tarih" required="required" value="<?=$bilgi[0]->tarih?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Resim<span class="required">*</span>
                        </label>
						
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<img src="<?=base_url()?>uploads/<?=$bilgi[0]->resim?>" height="100" name="resim">
                          <input type="file" name="resim" value="<?=$bilgi[0]->resim?>" class="form-control col-md-7 col-xs-12"> 
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sifre">Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                      
						   <select class="form-control" name="durum">
						  <option ><?=$durum[0]->durum?></option>
						   <option>Onaylandı</option>
						    <option>Iptal</option>							
                          </select>
                        </div>
                      </div>   					  
					   					  
					  		   
			  
			 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?=base_url()?>admin/gelenmakale" class="btn btn-primary" >Vazgeç</a>
						  
                          <button type="submit" class="btn btn-success">Onayla</button>
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