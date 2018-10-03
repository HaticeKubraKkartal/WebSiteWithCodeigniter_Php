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
                <h3>MESAJLAR</h3>
				<h2><?php if($this->session->flashdata("mesaj")){?>
				<div class="alert alert-warning alert-dismissible fade in col-md-13 " role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hIdden="true">×</span>
                    </button>
                  <p> <?=$this->session->flashdata("mesaj");?></p>
				</div><?php } ?></h2>
              </div>
            </div>
			 <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				  
                    <h2>Mesajlar Listesi</h2>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sıra No</th>
                          <th>Adı Soyadı</th>
                          <th>Email</th>
						
						  
						    <th>Mesaj</th>
						  <th>Durum</th>
					      <th>IP</th>
					      <th>Tarih</th>
						  <th>Detay</th>
						  <th>Sil</th>
						
						  
					
                        </tr>
                      </thead>
					  <tbody>
					  <?php
					   $sno=0;
					     foreach($veriler as $rs)
						 {  $sno++;
					 
					  ?>
					  <tr>
                          <td><?=$sno?></td>
						 
                          <td><?=$rs->Adsoy?></td>
                          <td><?=$rs->Email?></td>
						  <td><?=$rs->Mesaj?></td>
						  <td><?=$rs->Durum?></td>
						  <td><?=$rs->IP?></td>
						   <td><?=$rs->Tarih?></td>
						
						   <td><a href="<?=base_url()?>admin/mesajlar/detay/<?=$rs->Id?>"class="btn btn-success btn-xs"><strong><i class="fa fa-edit"></i>Detay</strong></a></td>
						  <td><a href="<?=base_url()?>admin/mesajlar/sil/<?=$rs->Id?>"onclick="return confirm('Silmek İstediğinize Eminmisiniz?')"  class="btn btn-danger"><strong><i class="fa fa-remove"></i> Sil</strong></a></td>
						 
						
						 
                        </tr>
						 <?php }?>
                          </tbody>
                    </table>

                  </div>
                </div>
              </div>

          </div>
        </div>
        <!-- /page content -->
		<?php
		$this->load->view('admin/_footer');
		?>