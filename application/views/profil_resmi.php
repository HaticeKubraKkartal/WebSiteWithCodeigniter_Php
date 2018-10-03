<?php 
	$this->load->view('_header');
?>
		<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-vert-30">
				<div class="col-md-12">
					<h2>-Profil Resmi-</h2>
					<div class="row">
						<div class="col-md-6">
							<img src="<?=base_url()?>uploads/<?=$uye[0]->resim?>" height="100">				
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- === END CONTENT === -->
		
<?php 
	$this->load->view('_footer');
?>