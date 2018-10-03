
		<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">			
			<div class="row margin-top-10">
				<!-- Carousel Slideshow -->
				<div id="carousel-example" class="carousel slide" data-ride="carousel">
					<!-- Carousel Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example" data-slide-to="1"></li>
						<li data-target="#carousel-example" data-slide-to="2"></li>
					</ol>
					<!-- End Carousel Indicators -->
					<!-- Carousel Images -->
					<div class="carousel-inner">
					<?php
						$sayi=0;
						$aktif=null;
						foreach($populer as $rs){
							$sayi++;
							if($sayi==1)
								$aktif="active";
							else
								$aktif=null;		
					?>
					
					<div class="item <?=$aktif?>">
						<a href="<?=base_url()?>home/makaledetay/<?=$rs->Id?>"><img src="<?=base_url()?>uploads/<?=$rs->resim?>"></a>
					</div>
						<?php } ?>
					</div>
					<!-- End Carousel Images -->
					<!-- Carousel Controls -->
					<a class="left carousel-control" href="#carousel-example" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
					<!-- End Carousel Controls -->
				</div>
				<!-- End Carousel Slideshow -->
			</div>