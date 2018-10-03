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
			  <h2><?php if($this->session->flashdata("mesaj")){?>
				<div class="alert alert-info alert-dismissible fade in col-md-13 " role="alert"> 
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hIdden="true">×</span></button>
                  <p> <?=$this->session->flashdata("mesaj");?></p>
				</div><?php } ?></h2>
                <h3>MESAJLAR </h3>
              </div>
            </div>
			 <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				  
                    <h2>Mesaj Detay Bilgileri</h2>
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
                      <tr>			 
                          <th>Adı Soyadı</th>
						  <td><?=$veri[0]->Adsoy?></td>
						  </tr>
						    <tr>
                          <th>Email</th>
						   <td><?=$veri[0]->Email?></td>
						   </tr>
						   
						    <tr>
						    <th>Mesaj</th>
							<td><?=$veri[0]->Mesaj?></td>
							 </tr>
						  
						    <tr>
					      <th>IP</th>
						   <td><?=$veri[0]->IP?></td>
						   </tr>
						    <tr>
					      <th>Tarih</th>
						    <td><?=$veri[0]->Tarih?></td>
						   </tr>
						    <tr>
						  <th>Notunuz</th>
						  <td>
						  <form  data-parsley-valIdate=""  action="<?=base_url()?>admin/mesajlar/guncelle/<?=$veri[0]->Id?> " method="POST"  >
						  <textarea type="text"  name="adminnotu"  value=""cols="80" rows="5"><?=$veri[0]->adminnotu?></textarea>
						 
						   <button type="submit" class="btn btn-success">GÜNCELLE</button>
						  
						  </form>
						  
						  
						  
						  </td>
						   </tr>
						
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