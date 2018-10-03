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
                <h3>Gelen Makale Listesi </h3>  <h4><?php if($this->session->flashdata("mesaj")){?>
				<div class="alert alert-warning alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                  <p> <?=$this->session->flashdata("mesaj");?></p>
				</div><?php } ?></h4>			
              </div>			 
			</div>
        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
						  <th>Uye Id</th>
                          <th>Kategori</th>
                          <th>Başlık</th>
						  <th>İçerik</th>
						  <th>Resim</th>	
						  <th>Durum</th>
						  <th>Tarih</th>
						  <th>Düzenle</th>
						  <th>İptal</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
						$sno=0;
						foreach ($veriler as $rs){
							$sno++;
					  ?>
					  <tr>
                          <td><?=$sno?></td>
						  <td><?=$rs->uyeAdi?></td>
						  <td><?=$rs->kategori?></td>
                          <td><?=$rs->baslik?></td>
                          <td><?=$rs->icerik?></td>
						  <td>
						  <?php if($rs->resim){?>
						  <a href="<?=base_url()?>admin/gelenmakale/resim_yukle/<?=$rs->Id?>">
						  <img src="<?=base_url()?>uploads/<?=$rs->resim?>" height="35"></a>
						  <?php } else{?><a href="<?=base_url()?>admin/gelenmakale/resim_yukle/<?=$rs->Id?>" class="btn btn-warning btn-xs">Resim Yükle</a>
						  <?php }?></td>
						  
						  <td><?=$rs->durum?></td>					 
						  <td><?=$rs->tarih?></td>					 
						  <td><a href="<?=base_url()?>admin/gelenmakale/duzenle/<?=$rs->Id?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i>Düzenle</a></td>
						   <td><a href="<?=base_url()?>admin/gelenmakale/iptal/<?=$rs->Id?>" class="btn btn-danger btn-xs" ><i class="fa fa-close"></i>İptal Et</a></td>
                        </tr>
                      <?php
						}
					?> 
                      </tbody>	
                    </table>
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