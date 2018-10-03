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
                <h3>Kategori Ekleme</h3> 
              </div>

             </div>
            <div class="clearfix"></div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kategori Bİlgilerini Giriniz </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="post" action="<?=base_url()?>admin/kategoriler/ekle_kaydet" >
					
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ad_soyad">Kategori Adi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="adi" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
 
					<div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?=base_url()?>admin/kategoriler" class="btn btn-primary" >Vazgeç</a>
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