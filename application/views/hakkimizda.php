<?php 
	$this->load->view('_header');
?>
		<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-vert-30">
				<div class="col-md-12">
					<h2>-Hakkımızda-</h2>
					<div class="row">
						<div class="col-md-3">
							<img src="<?=base_url()?>uploads/logom.jpg"  class="margin-top-10">
						</div>
						<div class="col-md-9 margin-bottom-10">
							<h3 class="padding-top-10 pull-left">Bilim Yuvası</h3>
							
							<div class="clearfix"></div>
							<p><?=$veri[0]->hakkimizda?></p>
			
						</div>
					</div>

					
				</div>
			</div>
		</div>
		<!-- === END CONTENT === -->
		
<?php 
	$this->load->view('_footer');
?>