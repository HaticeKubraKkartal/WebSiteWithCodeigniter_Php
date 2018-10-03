<?php 
	$this->load->view('_header');
?>
				<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-vert-30">
				<!-- Register Box -->
				<div class="col-md-6 col-md-offset-3 col-sm-offset-3">
					<form class="signup-page" method="post" action="<?=base_url()?>home/kayit_ol">
						<div class="signup-header">
							<h2 align="center">Yeni Hesap Oluştur</h2>
							<p><a href="<?=base_url()?>home/login_ol">Zaten Üye Misiniz?</a></p>
						</div>
						<label>Ad-Soyad</label>
						<input class="form-control margin-bottom-20" type="text" name="adsoy">
						
						<label>Kullanıcı Adı <span class="color-red">*</span></label>
						<input class="form-control margin-bottom-20" type="text" name="username">
						
						<label>Email  <span class="color-red">*</span></label>
						<input class="form-control margin-bottom-20" type="email" name="email">
						
						<label>Sifre  <span class="color-red">*</span></label>
						<input class="form-control margin-bottom-20" type="password" name="sifre">
						
						<hr>
						<div class="row">
							<div class="col-lg-7 text-right">
								<button class="btn btn-red" type="submit">Kayıt Ol</button>
							</div>
						</div>
					</form>
					
				</div>
				<!-- End Register Box -->
			</div>
		</div>
		<!-- === END CONTENT === -->
<?php 
	$this->load->view('_footer');
?>