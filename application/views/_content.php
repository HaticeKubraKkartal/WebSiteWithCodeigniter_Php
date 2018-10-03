			<div class="row margin-vert-30">
				<!-- Main Text -->
				<div class="col-md-9">
				<br/>
				<br/>
					<blockquote class="primary">
						<p><em><?=$soz[0]->sozler?></p>	
						<small><?=$soz[0]->yazar?></small>
					</blockquote>
				</div>
				<!-- End Main Text -->
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
			<div class="row">
				<!-- Portfolio -->
				<!-- Portfolio Item -->
				<?php 
					foreach($random as $rs){
						
				?>
				<div class="portfolio-item col-sm-3 animate fadeIn" height="100">
					<div class="image-hover">
						<a href="<?=base_url()?>home/makaledetay/<?=$rs->Id?>">
							<figure>
								<img src="<?=base_url()?>uploads/<?=$rs->resim?>" alt="image1">
								<div class="overlay">
									<a class="expand" rel="lightbox-thumbs" href="<?=base_url()?>uploads/<?=$rs->resim?>">Image Link</a>
								</div>
							</figure>
							<h3 class="margin-top-20"><?=$rs->baslik?></h3>
							<p class="margin-top-10 margin-bottom-20"></p>
							<div class="btn btn-default">
								<a class="info" href="<?=base_url()?>home/makaledetay/<?=$rs->Id?>">Daha Fazla Oku</a>
							</div>
						</a>
					</div>
				</div>
					<?php } ?>
				<!-- //Portfolio Item// -->
				
				<!-- End Portfolio -->
			</div>
		</div>
	</div>
	<!-- === END CONTENT === -->