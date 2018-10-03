<?php 
	$this->load->view('_header');
?>
		<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-vert-30">
				<!-- Main Column -->
				<div class="col-md-9">
					<!-- Blog Post -->
					
					<?php 
					foreach($veriler as $rs){			
					?>
					<div class="blog-post padding-bottom-20">
						<!-- Blog Item Details -->
						<div class="blog-post-details-item blog-post-details-item-left calendar-icon">
								<i class="fa fa-calendar"></i>
								<a href="#"><?=$rs->tarih?></a>
							</div>
						<div class="blog-post-details">
							<!-- End # of Comments -->
						</div>
						<!-- End Blog Item Details -->
						<!-- Blog Item Body -->
						<div class="blog">
							<div class="clearfix"></div>
							<div class="blog-post-body row margin-top-15">
								<div class="col-md-5">
									<img class="pull-left" src="<?=base_url()?>uploads/<?=$rs->resim?>">
								</div>
								<div class="col-md-7">
									<h2><p><?=$rs->baslik?></p></h2>
									<a href="<?=base_url()?>home/makaledetay/<?=$rs->Id?>" class="btn btn-primary">
										Daha Fazla Oku <i class="icon-chevron-right readmore-icon"></i>
									</a>
									<!-- End Read More -->
								</div>
							</div>
						</div>
						<!-- End Blog Item Body -->
					</div>
					<?php } ?>
					<!-- End Blog Item -->
					
				
				</div>
				<!-- End Main Column -->
				<!-- Side Column -->
				<div class="col-md-3">
					<h3 class="margin-bottom-10"><strong>Kategoriler</strong></h3>
					<ul class="menu">
					<?php foreach($kategori as $rs){?>
						<li>
							<a class="fa-angle-right" href="<?=base_url()?>home/kategori/<?=$rs->Id?>"><?=$rs->KategoriAdi?></a>
						</li>
					<?php } ?>
					</ul>
				</div>
				<!-- End Side Column -->
		</div>
	</div>
				<!-- === END CONTENT === -->
<?php 
	$this->load->view('_footer');
?>	