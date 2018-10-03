<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AdminPanel | Giriş</title>

    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url()?>assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>assets/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">				  
        <div class="animate form login_form">
					
          <section class="login_content"> 
            <form action="<?=base_url()?>admin/login/login_ol" method="post">
              <h1>Oturum Aç</h1>
			  
				<h5 align="center"><?php if($this->session->flashdata("mesaj")){?>
				<div class="list-group-item list-group-item-danger"><strong>				
					<?=$this->session->flashdata("mesaj");?></strong>
				</div><?php } ?></h5>
				
              <div>
                <input type="text" class="form-control" placeholder="Eposta" name="eposta" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Parola" name="sifre" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-primary submit" >Giriş Yap</button>
                <a class="reset_pass" href="<?=base_url()?>/admin/#"><strong>Şifremi Unuttum!</strong></a>
              </div>

              <div class="clearfix"></div>

            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>


