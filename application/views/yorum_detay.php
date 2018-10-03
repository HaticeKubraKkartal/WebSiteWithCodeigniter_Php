<?php 
	$this->load->view('_header');
?>
<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-vert-30">
				<!-- Main Column -->
				<div class="col-md-9">
				<?php if($veriler==null){ ?>
						<h5 align="center"><?php if($this->session->flashdata("mesaj")){?>
						<div class="list-group-item list-group-item-danger"><strong>				
						<?=$this->session->flashdata("mesaj");?></strong>
						</div><?php } ?></h5>
						
					
				<?php } else{ foreach($veriler as $rs){
					?>
				<blockquote class="primary">
						<p><em><?=$rs->yorum?></p>	
						<small><?=$rs->uyeAdi?></small>
					</blockquote>
				<?php }} ?>
					
					<!-- End Blog Post -->		
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
	</div>
					<!-- === END CONTENT === -->
<?php 
	$this->load->view('_footer');
?>