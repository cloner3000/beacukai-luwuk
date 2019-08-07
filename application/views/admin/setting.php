<div class="row">
    <div class="col-sm-12">
        <section class="panel">
			<header class="panel-heading">
				SETTING
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
            <div class="panel-body">
				<?php echo $this->session->flashdata('message');?>
				<form method="post" action="<?php echo base_url(); ?>admin/save_setting">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="text-input">Site Title</label>
								<input type="text" id="text-input" class="form-control" name="title" value="<?php echo $setting[0]['web_title']; ?>">
							</div>
							
							
							<div class="form-group">
								<label for="text-input">Site Descripton</label>
								<textarea class="form-control" name="description"><?php echo $setting[0]['web_description']; ?></textarea>
							</div>
							<div class="form-group">
								<label for="text-input">Site Keyword</label>
								<textarea class="form-control" name="keyword"><?php echo $setting[0]['web_keyword']; ?></textarea>
							</div>
							<div class="form-group">
								<label for="text-input">Google Seo</label>
								<input type="text" id="text-input" class="form-control" name="seo" value="<?php echo $setting[0]['web_google_seo']; ?>">
							</div>
							
							<div class="form-group">
								<label for="text-input">Logo</label>
								<div class="row">
									<div class="col-md-9">
										<input type="text" class="form-control" name="web_logo" id="posts_image_logo" value="<?php echo $setting[0]['web_logo']; ?>"/>
									</div>
									<div class="col-md-3">
										<button class="form-control btn btn-default btn-sm" id="btn_browse_image_logo">Browse</button>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="text-input">Icon / Favicon</label>
								<div class="row">
									<div class="col-md-9">
										<input type="text" class="form-control" name="web_favicon" id="posts_image_favicon" value="<?php echo $setting[0]['web_favicon']; ?>"/>
									</div>
									<div class="col-md-3">
										<button class="form-control btn btn-default btn-sm" id="btn_browse_image_favicon">Browse</button>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="text-input">Facebook Url </label>
								<input type="text" id="text-input" class="form-control" name="web_facebook" value="<?php echo $setting[0]['web_facebook']; ?>">
							</div>
							<div class="form-group">
								<label for="text-input">Twitter Username</label>
								<input type="text" id="text-input" class="form-control" name="web_twitter" value="<?php echo $setting[0]['web_twitter']; ?>">
							</div>
							<div class="form-group">
								<label for="text-input">Youtube Chanel</label>
								<input type="text" id="text-input" class="form-control" name="web_youtube" value="<?php echo $setting[0]['web_youtube']; ?>">
							</div>

		                
							
							<div class="form-group">
								<label for="text-input">Gambar Video Profil</label>
								<div class="row">
									<div class="col-md-9">
										<input type="text" class="form-control" name="web_image_sambutan" id="posts_image3" value="<?php echo $setting[0]['web_image_sambutan']; ?>"/>
									</div>
									<div class="col-md-3">
										<button class="form-control btn btn-default btn-sm" id="btn_browse_image3">Browse</button>
									</div>
								</div>
							</div>
							<div class="form-group">
		                        <label for="text-input">Url Video Profil</label>
		                        <textarea class="form-control" name="web_video_sambutan"><?php echo $setting[0]['web_video_sambutan']; ?></textarea>
		                    </div>
		                    <div class="form-group">
		                        <label for="text-input">Sambutan Profil</label>
		                        <textarea class="form-control" name="web_sambutan" rows="5"><?php echo $setting[0]['web_sambutan']; ?></textarea>
		                    </div>
		                    <div class="form-group">
		                        <label for="text-input">Link Profil </label>
		                        <input type="text" id="text-input" class="form-control" name="web_sambutan_link" value="<?php echo $setting[0]['web_sambutan_link']; ?>">
		                    </div>

		                    <hr/>

		                    <div class="form-group">
								<label for="text-input">Tlp. Pelayanan </label>
								<input type="text" id="text-input" class="form-control" name="telfone" value="<?php echo $setting[0]['web_telfone']; ?>">
							</div>
							<div class="form-group">
								<label for="text-input">Email Pelayanan</label>
								<input type="text" id="text-input" class="form-control" name="email" value="<?php echo $setting[0]['web_email']; ?>">
							</div>
							<div class="form-group">
								<label for="text-input">Deskribsi Pelayanan</label>
								<textarea class="form-control" name="web_layanan" rows="5"><?php echo $setting[0]['web_layanan']; ?></textarea>
							</div>

							<div class="form-group">
								<label for="text-input">Lokasi Kami</label>
								<div class="row">
									<div class="col-md-6">
										<input class="form-control" name="web_lat" value="<?php echo $setting[0]['web_lat']; ?>" placeholder="Latitude"/>
									</div>
									<div class="col-md-6">
										<input class="form-control" name="web_log" value="<?php echo $setting[0]['web_log']; ?>" placeholder="Longitude"/>
									</div>
								</div>
							</div>

		               
							
							<hr/>
							
							<div class="form-group">
								<label for="text-input">Footer</label>
								<textarea class="form-control" name="footer"><?php echo $setting[0]['footer']; ?></textarea>
							</div>
							<div class="form-group">
								<label for="text-input">Custom CSS</label>
								<textarea class="form-control" name="css" rows="5"><?php echo $setting[0]['custom_css']; ?></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">UPDATE</button>
							</div>

						</div>
		            </div>

				</form>
			</div>
		</section>
	</div>
</div>