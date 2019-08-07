<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>admin/save_anouncement">
					<div class="row">
						<div class="col-sm-9">					
							<label>Title *</label>
							<div class="form-group">
								<input type="text" name="anouncement_title" value="<?php echo $anouncement_title;?>" class="form-control" required="required" />
								<small><em>Enter title hire.</em></small>
							</div>
							<label>Content *</label>
							<div class="form-group">
								<textarea name="anouncement_isi" id="ckeditor" class="form-control" required="required"><?php echo $anouncement_isi;?></textarea>
								<small><em>Enter Article hire.</em></small>
							</div>
						</div>

						<div class="col-sm-3">
							<section class="panel">
								<div class="panel-body">
									<div class="monthly-stats terques-bg sidebar-ed">
										<label>Featured Image</label>
										<div class="form-group">
											<?php
												if($anouncement_image != ""){
													echo "<img src='$anouncement_image' class='img-responsive' style='border: solid 4px #eee;' />";
													echo "<input type='hidden' class='validate[required] form-control' name='anouncement_image' id='posts_image' value='$anouncement_image'/>";
												} else {
													echo '<input type="text" class="validate[required] form-control" name="anouncement_image" id="posts_image"/>';
												}
											?>									
										</div>
										<div class="form-group">  
											<button class="btn btn-default btn-sm" id="btn_browse_image">Browse Image</button>
										</div>
										
										<hr/>   		
																 
										<input type="hidden" value="<?php echo $anouncement_id; ?>" name="anouncement_id" />
										<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
										<button type="submit" class="btn btn-warning">Publish anouncement</button>
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