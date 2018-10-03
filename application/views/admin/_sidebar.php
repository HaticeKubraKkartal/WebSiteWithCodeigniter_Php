 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AdminPanel || Anasayfa</title>

    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>assets/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url()?>admin" class="site_title"><i class="fa fa-renren"></i> <span>Admin Panel</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url()?>uploads/<?=$this->session->admin_session["resim"]?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin,</span>
                <h2><?=$this->session->admin_session["adsoy"]?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->
<br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
		
                <h3>Genel</h3>
                <ul class="nav side-menu">
                  <li><a href="<?=base_url()?>admin"><i class="fa fa-home"></i> Anasayfa </a></li>
				  
				  <li><a href="<?=base_url()?>admin/uyeler" ><i class="fa fa-users"></i> Uyeler </a></li>
				  
				  <li><a href="<?=base_url()?>admin/makaleler" ><i class="fa fa-book"></i> Makaleler </a></li>
				  
				   <li><a href="<?=base_url()?>admin/kategoriler" ><i class="fa fa-th"></i> Kategoriler</a></li>
				   
				   <li><a href="<?=base_url()?>admin/sozler" ><i class="fa fa-paperclip"></i> Guzel Sozler </a></li>
				   
				   <li><a href="<?=base_url()?>admin/yorumlar" ><i class="fa fa-comments"></i> Yorumlar </a></li>
             
					<li><a><i class="fa fa-file-text"></i>Uyelerden Gelenler  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url()?>admin/gelenmakale">Yeni Gelenler</a></li>
                      <li><a href="<?=base_url()?>admin/gelenmakale/onay">Onaylananlar</a></li>
					   <li><a href="<?=base_url()?>admin/gelenmakale/iptal">İptal Edilenler</a></li>
                    </ul>
					</li>
					
                </ul>
              </div>
              <div class="menu_section">
                <h3>Diğer</h3>
                <ul class="nav side-menu">
				
				<li><a href="<?=base_url()?>admin/mesajlar" ><i class="fa fa-envelope"></i> Web Mesajları </a></li>
				
				<li><a href="<?=base_url()?>admin/home/ayarlar" ><i class="fa fa-cog"></i> Ayarlar </a></li> 
				
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->