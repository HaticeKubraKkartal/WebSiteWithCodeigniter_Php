<?php 
	$this->load->view('_header');
?>
<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-vert-30">
				<!-- Main Column -->
				
				<div class="col-md-9">
					<div class="blog-post">
						<div class="blog-item-header">		
							<h2>					
								<?=$veriler[0]->baslik?>
							</h2>
						</div>
						<div class="blog-post-details">
							<!-- Author Name -->
							<div class="blog-post-details-item blog-post-details-item-left user-icon">
								<i class="fa fa-user"></i>
								<a href="#"><?=$uyeAd[0]->uyeAdi?></a>
							</div>
							<!-- End Author Name -->							
							<!-- # of Comments -->
							<div
								class="blog-post-details-item blog-post-details-item-left blog-post-details-item-last comments-icon">
								<a href="<?=base_url()?>home/yorumbak/<?=$uyeAd[0]->Id?>">
									<i class="fa fa-comments"></i>
									yorumlar
								</a>
							</div>
							<div class="blog-post-details-item blog-post-details-item-left  calendar-icon">
								<a href="#"><i class="fa fa-calendar"></i> <?=$veriler[0]->tarih?>	</a>
							</div>
							<!-- End # of Comments -->
						</div>
						<div class="blog-item">
							<div class="clearfix"></div>
							<div class="blog-post-body row margin-top-15">
								<div id="carousel-example-1" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<!-- Wrapper for slides -->
									<div class="carousel-inner">
									<div class="item active"><img src="<?=base_url()?>uploads/<?=$veriler[0]->resim?>"></div>
									<?php foreach($resimler as $rs){ ?>
										
									<div class="item"><img src="<?=base_url()?>uploads/<?=$rs->resim?>"></div>
									<?php } ?>
									</div>
									<!-- Controls -->
									<a class="left carousel-control" href="#carousel-example-1" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel-example-1" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									</a>
								</div>
								
								<div class="col-md-12">
								<br>
									<p><?=$veriler[0]->icerik?></p>
									</div>
							</div>
							
							<?php
							if($this->session->userdata("uye_session")){}
							else { ?>
								<h5 align="center"><?php if($this->session->flashdata("mesaj")){?>
									<div class="list-group-item list-group-item-warning"><strong>				
									<?=$this->session->flashdata("mesaj");?></strong>
									</div><?php } ?></h5>
							<?php } ?> 
							<form  class="margin-bottom-10" method="post" action="<?=base_url()?>uye/yorumlar/<?=$veriler[0]->Id?>">
							<div class="form-group">
							<textarea  placeholder="Yorum Yazınız.." name="yorum"class="form-control" type="text"></textarea>
							</div>
							<div class=" text-left">
								<button class="btn btn-aqua" type="submit">Yorum Yap</button>
							</div>							
							</form>		
					  <br>
						</div>
					</div>
					<!-- End Blog Post -->		</div>
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
	</div>
					<!-- === END CONTENT === -->
<?php 
	$this->load->view('_footer');
?>