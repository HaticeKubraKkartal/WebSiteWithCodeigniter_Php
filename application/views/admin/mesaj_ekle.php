 <?php
 $this->load->view('admin/_sidebar');
		$this->load->view('admin/_footerbutton');
		$this->load->view('admin/_header');
 ?>
 
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>MESAJ EKLEME <small>  <strong></strong></small></h3>

              </div>
			  
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Mesaj Bilgilerini Giriniz <small></small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form  data-parsley-validate="" class="form-horizontal form-label-left" method="POST" action="<?=base_url()?>admin/mesajlar/ekle_kaydet " novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adı Soyadı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="adsoy" required="required" placeholder="Adı Soyadı" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Konu 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="konu" required="required" placeholder="Konu" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tarih
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="tarih" required="required" placeholder="Tarih" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email"  name="email" required="required" placeholder="Email" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon <span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tel"  placeholder="Telefon" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum <span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="durum"  placeholder="Durum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesaj <span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea rows="8" class="form-control" name="mesaj"></textarea>
                        </div>
                      </div>
					  
					  
                 
               
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?=base_url()?>admin/mesajlar/" class="btn btn-primary" ">VAZGEÇ</a>
						  <button class="btn btn-primary" type="reset">TEMİZLE</button>
                          <button type="submit" class="btn btn-success">KAYDET</button>
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