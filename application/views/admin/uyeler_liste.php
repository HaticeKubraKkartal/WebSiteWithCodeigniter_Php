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
                <h3>Üye Listesi  </h3>  <h4><?php if($this->session->flashdata("mesaj")){?>
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
                    <h2><a href="<?=base_url()?>admin/uyeler/ekle" class="btn btn-primary"><i class="fa fa-plus"></i> Üye Ekle</a>  </h2>
					
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Adı Soyadı</th>
                          <th>Kullanıcı Adı</th>
                          <th>Email</th>
						  <th>Telefon</th>
						  <th>Şehir</th>
						  <th>Yetki</th>
						  <th>Durum</th>
						  <th>Düzenle</th>
						  <th>Sil</th>
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
                          <td><?=$rs->adsoy?></td>
                          <td><?=$rs->username?></td>
                          <td><?=$rs->email?></td>
						  <td><?=$rs->tel?></td>
						  <td><?=$rs->sehir?></td>
						  <td><?=$rs->yetki?></td>
						  <td><?=$rs->durum?></td>
						  <td><a href="<?=base_url()?>admin/uyeler/duzenle/<?=$rs->id?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i>Düzenle</a></td>
						   <td><a href="<?=base_url()?>admin/uyeler/sil/<?=$rs->id?>" class="btn btn-danger btn-xs" onClick="return confirm('Silinmesini İstiyor Musun')"><i class="fa fa-close"></i>Sil</a></td>
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