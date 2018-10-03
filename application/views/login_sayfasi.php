<?php 
	$this->load->view('_header');
?>
		<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="container">
				<div class="row margin-vert-30">
					<!-- Login Box -->
					<div class="col-md-6 col-md-offset-3 col-sm-offset-3">
						<form class="login-page" action="<?=base_url()?>home/login" method="post">
							<div class="login-header margin-bottom-30">
								<h2 align="center">Oturum Aç</h2>
									<h5 align="center"><?php if($this->session->flashdata("mesaj")){?>
									<div class="list-group-item list-group-item-danger"><strong>				
									<?=$this->session->flashdata("mesaj");?></strong>
									</div><?php } ?></h5>
							</div>
							<div class="input-group margin-bottom-20">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input placeholder="Email"  name="eposta" class="form-control" type="text">
							</div>
							<div class="input-group margin-bottom-20">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input placeholder="Password" name="sifre" class="form-control" type="password">
							</div>
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-red pull-right" type="submit">Giriş Yap</button>
								</div>
							</div>
							<hr>
							
							<p><a class="btn btn-primary" href="<?=base_url()?>home/uye_kayit">Henüz Kayıt Olmadınız Mı?</a>
							<a class="btn btn-default pull-right" href="<?=base_url()?>home/sifremi_unuttum">Şifremi Unuttum</a></p>
							
						</form>
					</div>
					<!-- End Login Box -->
				</div>
			</div>
		</div>
		<!-- === END CONTENT === -->
<?php 
	$this->load->view('_footer');
?>