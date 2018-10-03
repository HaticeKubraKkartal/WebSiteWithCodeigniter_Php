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
                <h3>Makale Resim Ekleme Menüsü</h3> 
              </div>

             </div>
            <div class="clearfix"></div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Eklenecek Resimi Seçiniz.. </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   *Yüklenecek Resim Dosyası Türleri (gif|jpg|png), max boyutu:1024x1024, boyut:1000kb* 
				   <?php if($this->session->flashdata("mesaj")){ ?>
				   <div class="alert alert-warning alert-dismissible fade in" role="alert">
                       <h3>Hata!</h3> <p> <?=$this->session->flashdata("mesaj")?></p>
                  </div>
				  <?php } ?>
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?=base_url()?>admin/makaleler/resim_kaydet/<?=$id?>" >
                      <div class="form-group">                        
                        <div class="col-md-12 col-sm-6 col-xs-12">
                          <input type="file" name="resim" required="required" class="form-control col-md-10 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-10">
                            <button type="submit" class="btn btn-success">Resmi Yükle</button>
                        </div>
                      </div>

                    </form>
					 <img src="<?=base_url()?>uploads/<?=$veri[0]->resim?>" height="100">
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