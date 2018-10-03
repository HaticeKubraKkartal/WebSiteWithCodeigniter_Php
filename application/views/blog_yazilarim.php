<?php 
	$this->load->view('_header');
?>
		<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-vert-30">
				<div class="col-md-12">
					<h2><strong>Blog Yazılarım</strong></h2>
					<h5 align="center"><?php if($this->session->flashdata("mesaj")){?>
						<div class="list-group-item list-group-item-danger"><strong>				
						<?=$this->session->flashdata("mesaj");?></strong>
						</div><?php } ?></h5>
					<?php 
						if($veriler!=null){
						foreach($veriler as $rs){
					?>
					<div class="row">
						<div class="col-md-4 ">
							<img src="<?=base_url()?>uploads/<?=$rs->resim?>" height="150"class="margin-top-10">							
						</div>
						<div class="col-md-8 margin-bottom-10">
							<h3 class="padding-top-10 pull-left"><?=$rs->baslik?></h3>
							
							<div class="clearfix"></div>
							<p><?=$rs->icerik?></p>
						</div>
					</div>	
					<?php }
						}
						else{ ?>	
							<h5 align="center">
									<div class="list-group-item list-group-item-info"><strong>Henüz Yazınız Bulunmamaktadır!..</strong></div></h5>
					<?php }	 ?>
					<form method="post" action="<?=base_url()?>uye/makale_olustur">
					<div class="col-md-0">
						<button class="btn btn-aqua pull-right" type="submit">Makale Oluşturmak İster Misiniz <i class="fa fa-arrow-right"></i></button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- === END CONTENT === -->
<?php 
	$this->load->view('_footer');
?>