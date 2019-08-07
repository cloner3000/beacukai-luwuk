<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>admin/save_page">
					<div class="row">
						<div class="col-sm-9">					
							<label>Judul *</label>
							<div class="form-group">
								<input type="text" name="page_title" value="<?php echo $page_title;?>" class="form-control" required="required" />
							</div>
							<label>Isi *</label>
							<div class="form-group">
								<textarea name="page_isi" id="ckeditor" class="form-control" required="required"><?php echo $page_isi;?></textarea>
							</div>
						</div>

						<div class="col-sm-3">
							<section class="panel">
								<div class="panel-body">
									<div class="monthly-stats terques-bg sidebar-ed">
										<label>Gambar Sampul</label>
										<div class="form-group">
											<?php
												if($page_image != ""){
													echo "<img src='$page_image' class='img-responsive' style='border: solid 4px #eee;' />";
													echo "<input type='hidden' class='validate[required] form-control' name='page_image' id='posts_image' value='$page_image'/>";
												} else {
													echo '<input type="text" class="validate[required] form-control" name="page_image" id="posts_image"/>';
												}
											?>									
										</div>
										<div class="form-group">  
											<button class="btn btn-default btn-sm" id="btn_browse_image">Pilih Gambar</button>
										</div>
										
										<hr/>   		
																 
										<input type="hidden" value="<?php echo $page_id; ?>" name="page_id" />
										<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
										<button type="submit" class="btn btn-warning">Simpan</button>
									</div>
								</div>
							</section>
						</div> 
					</div>
				</form>
			</div>
        </section>
    </div>
</div>