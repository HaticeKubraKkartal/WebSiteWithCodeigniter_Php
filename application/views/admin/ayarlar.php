 <?php
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/_menufooter');
		$this->load->view('admin/_header');
?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Ayarlar</h3>
				<h4><?php if($this->session->flashdata("mesaj")){?>
				<div class="alert alert-warning alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                  <p> <?=$this->session->flashdata("mesaj");?></p>
				</div><?php } ?></h4>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab1" class="nav nav-tabs bar_tabs right" role="tablist">
                        <li role="presentation" class=""><a href="#iletisim_tab" id="iletisim" role="tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">İletişim</a>
                        </li>
                        <li role="presentation" class=""><a href="#hakkimizda_tab" role="tab" id="hakkimizda" data-toggle="tab" aria-controls="profile" aria-expanded="false">Hakkımızda</a>
                        </li>
                        <li role="presentation" class=""><a href="#sosyal_tab" role="tab" id="sosyal" data-toggle="tab" aria-controls="profile" aria-expanded="false">Sosyal</a>
                        </li>
						 <li role="presentation" class=""><a href="#email_tab" role="tab" id="email" data-toggle="tab" aria-controls="profile" aria-expanded="false">Email</a>
                        </li>
						 <li role="presentation" class="active"><a href="#genel_tab" role="tab" id="genel" data-toggle="tab" aria-controls="home" aria-expanded="true">Genel</a>
                        </li>
                      </ul>
					  <form class="form-horizontal form-label-left" method="post" action="<?=base_url()?>admin/home/ayarlar_guncelle/<?=$veri[0]->id?>" >
                      <div id="myTabContent2" class="tab-content">          
						<div role="tabpanel" class="tab-pane fade active in" id="genel_tab" aria-labelledby="home-tab">
                           <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Adı</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="title" value="<?=$veri[0]->title?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="description" value="<?=$veri[0]->description?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Keywords</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="keywords" value="<?=$veri[0]->keywords?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Name  </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" value="<?=$veri[0]->name?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefon </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tel" value="<?=$veri[0]->tel?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					 <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sehir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control"  name="sehir">
                            <option><?=$veri[0]->sehir?></option>
                          </select>
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Adres</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="adres" value="<?=$veri[0]->adres?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="email_tab" aria-labelledby="profile-tab">
						 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >SMTP Server </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="smtpserver" value="<?=$veri[0]->smtpserver?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >SMTP Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="smtpemail" value="<?=$veri[0]->smtpemail?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Port</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="smtpport" value="<?=$veri[0]->smtpport?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                           <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Şifre</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="password" value="<?=$veri[0]->password?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="sosyal_tab" aria-labelledby="profile-tab">
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Twitter </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="twitter" value="<?=$veri[0]->twitter?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Gmail</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="gmail" value="<?=$veri[0]->gmail?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >LinkedIn</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="linkedin" value="<?=$veri[0]->linkedin?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        </div>
						 <div role="tabpanel" class="tab-pane fade" id="hakkimizda_tab" aria-labelledby="profile-tab">
						  <script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
                         <textarea type="text" id="editor1" name="editor1" required="required" value="" class="form-control col-md-6 col-xs-10" rows=20><?=$veri[0]->hakkimizda?></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace( 'editor1' );
							</script>
						</div>
						 <div role="tabpanel" class="tab-pane fade" id="iletisim_tab" aria-labelledby="profile-tab">
						 <script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
                         <textarea type="text"  id="editor2" name="editor2" required="required" value="" class="form-control col-md-6 col-xs-10" rows=20><?=$veri[0]->iletisim?></textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace( 'editor2' );
							</script>
						</div>
                      </div>
					  
					  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
							<button type="submit" class="btn btn-warning">Güncelle</button>
                        </div>
                      </div>
					  </form>
                    </div>

                  </div>
                </div>
              </div>
			
          </div>
        </div>
        <!-- /page content -->
<?php
		$this->load->view('admin/_footer');
?>		