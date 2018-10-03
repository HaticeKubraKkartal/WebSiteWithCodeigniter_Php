 <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
				
				
              </div>
			  
			  

              <ul class="nav navbar-nav navbar-right">
			 
			  
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url()?>uploads/<?=$this->session->admin_session["resim"]?>" alt=""><?=$this->session->admin_session["adsoy"]?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
				  
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li>
                      <a href="<?=base_url()?>admin/home/ayarlar">
                        
                        <span>Ayarlar</span>
                      </a>
                    </li>
                    <li><a href="<?=base_url()?>admin/login/log_out"><i class="fa fa-sign-out pull-right"></i> Oturum Kapat</a></li>
                  </ul>
                </li>

 
				
              </ul>
			 
            </nav>
          </div>
        </div>
        <!-- /top navigation -->