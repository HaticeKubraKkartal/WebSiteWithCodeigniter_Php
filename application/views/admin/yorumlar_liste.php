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
                <h3>Yorum Listesi  </h3>  
				<h5 align="center"><?php if($this->session->flashdata("mesaj")){?>
					<div class="list-group-item list-group-item-danger"><strong><?=$this->session->flashdata("mesaj");?></strong>
					</div><?php } ?></h5>	
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
                          <th>Yorum</th>
						  <th>Uye</th>
						  <th>Makale </th>
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
						   <td><?=$rs->yorum?></td>	
							<td><?=$rs->UyelerId?></td>	
							<td><?=$rs->MakaleId?></td>	 
						  <td><a href="<?=base_url()?>admin/yorumlar/duzenle/<?=$rs->Id?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i>Düzenle</a></td>
						   <td><a href="<?=base_url()?>admin/yorumlar/sil/<?=$rs->Id?>" class="btn btn-danger btn-xs" onClick="return confirm('Silinmesini İstiyor Musun')"><i class="fa fa-close"></i>Sil</a></td>
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