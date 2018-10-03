<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<!-- Title -->
	<title><?=$sayfa?><?=$veri[0]->title?></title>
	<!-- Meta -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?=$veri[0]->description?>">
	<meta name="keywords" content="<?=$veri[0]->keywords?>">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<!-- Favicon -->
	<link href="favicon.html" rel="shortcut icon">
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/nexus.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
	<!-- Google Fonts-->
	<link href="http://fonts.googleapis.com/css?family=Lato:400,300" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="pre_header" class="visible-lg"></div>
	<div id="header" class="container">
		<div class="row">
			<!-- Logo -->
			<div class="logo">
				<a href="<?=base_url()?>" title="">
					<img src="<?=base_url()?>uploads/logom.jpg" alt="Logo" />
				</a>
			</div>
			<!-- End Logo -->
			<!-- Top Menu -->
			<div class="col-md-12 margin-top-30">
				<div id="hornav" class="pull-right visible-lg">
					<ul class="nav navbar-nav">
						<li><a href="<?=base_url()?>"><i class="fa fa-home fa-fw"></i>Anasayfa</a></li>
						<li><a href="<?=base_url()?>home/blog"><i class="fa fa-book fa-fw"></i>Blog</a></li>
						<li><a href="<?=base_url()?>home/hakkimizda"><i class="fa fa-file-text fa-fw"></i>Hakkımızda</a></li>
						<li><a href="<?=base_url()?>home/iletisim"><i class="fa fa-comment fa-fw"></i>İletişim</a></li>
						
						<?php
							if($this->session->userdata("uye_session")){?>
							<li><span><i class="fa fa-unlock fa-fw"></i><?=$this->session->uye_session["username"]?></span>
								
								<ul>
									<li><a href="<?=base_url()?>uye/hesabim">Hesap Bilgilerim</a></li>
									<li><a href="<?=base_url()?>uye/yazilarim">Blog Yazılarım</a></li>
									<li><a href="<?=base_url()?>uye/cikis">Çıkış</a></li>
								</ul>
							</li>
						<?php } 
						else{
							?>
						<li><span><i class="fa fa-lock fa-fw"></i>Giriş Yap</span>
							<ul>
								<li><a href="<?=base_url()?>home/login_ol">Giriş Yap</a></li>
								<li><a href="<?=base_url()?>home/uye_kayit">Kayıt Ol</a></li>
							</ul>
						</li>
						<?php } ?>
					</ul>
				</div>
				</div>
				<div class="clear"></div>
				<!-- End Top Menu -->
			</div>
		</div>
		<!-- === END HEADER === -->