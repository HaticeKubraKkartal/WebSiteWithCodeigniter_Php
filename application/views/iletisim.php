<?php 
	$this->load->view('_header');
?>
		<div id="content" class="container">
			<!-- === BEGIN CONTENT === -->	
			<div class="row margin-vert-30">
			<!-- Main Column -->
			<div class="col-md-8">
				<!-- Main Content -->
				<div class="headline"><h2>-Bize Yazın-</h2></div>
				<h6><?php if($this->session->flashdata("mesaj")){?>
				<div class="list-group-item list-group-item-info"> 
				
                  <p> <?=$this->session->flashdata("mesaj");?></p>
				</div><?php } ?></h6>
				<br>
				<script>
				function validateForm() {
    var x = document.forms["myForm"]["adsoy"].value;
    if (x == "") {
        alert("Adınızı ve Soyadınızı Yazmalısınız");
        return false;
    }
	  var x = document.forms["myForm"]["email"].value;
    if (x == "") {
        alert("Emailinizi Yazmalısınız");
        return false;
    }
	  var x = document.forms["myForm"]["mesaj"].value;
    if (x == "") {
        alert("Mesaj alanı boş olamaz");
        return false;
    }
}
				</script>
				<!-- Contact Form -->
				<form method="post" name="myForm"  onsubmit="return validateForm()" action="<?=base_url()?>home/mesaj_kaydet">
					<label>İsim Soyisim</label>
					<div class="row margin-bottom-20">
						<div class="col-md-6 col-md-offset-0">
							<input class="form-control" name="adsoy" type="text">
						</div>
					</div>
					
					<label>Email <span class="color-red">*</span></label>
					<div class="row margin-bottom-20">
						<div class="col-md-6 col-md-offset-0">
							<input class="form-control" type="email" name="email">
						</div>
					</div>
					
					<label>Mesaj</label>
					<div class="row margin-bottom-20">
						<div class="col-md-8 col-md-offset-0">
							<textarea rows="8" class="form-control" name="mesaj"></textarea>
						</div>
					</div>
					
				<button type="submit" class="btn btn-red">Mesaj Gönder</button>
				</form>
				<!-- End Contact Form -->
				<!-- End Main Content -->
			</div>
			<!-- End Main Column -->
			<!-- Side Column -->
			<div class="col-md-4">
				<div class="panel panel-red">
					<div class="panel-heading">
						<h3 class="panel-title">İletişim Bilgilerimiz</h3>
					</div>
					<div class="panel-body">
						<p><?=$veri[0]->iletisim?></p>
					</div>
				</div>			
			</div>
			<!-- End Side Column -->
		</div>
	</div>
	<!-- === END CONTENT === -->
<?php 
	$this->load->view('_footer');
?>	