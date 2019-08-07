<div class="row">
    <div class="col-sm-12">
		<form method="post" action="<?php echo base_url(); ?>admin/save_posts"> 
			<div class="row">
				<div class="col-sm-9">				
					<section class="panel">
							<div class="panel-body">
							<label>Judul *</label>
							<div class="form-group">
								<input type="text" name="posts_judul" value="<?php echo $posts_judul;?>" class="form-control" required>
								
							</div>
							<div class="form-group">
								<label>Isi *</label>
								<textarea name="posts_isi" id="ckeditor" class="form-control"><?php echo $posts_isi;?></textarea>
							</div>
						</div>
					</section>
				</div>
				<div class="col-sm-3">
					<section class="panel panel-primary">
						<header class="panel-heading">
							publish
							<span class="tools pull-right">
							<a href="javascript:;" class="fa fa-chevron-down"></a>
							<a href="javascript:;" class="fa fa-times"></a>
							</span>
						</header>
						<div class="panel-body">				
							<div class="form-group">
								<label class="radio-inline">
								<input type="radio" name="posts_status" id="1" value="1"
								<?php if ($posts_status == "1"){ echo 'checked'; } ?> required /> Publish
								</label>
								<label class="radio-inline">
								<input type="radio" name="posts_status" id="1" value="0"
								<?php if ($posts_status == "0"){ echo 'checked'; } ?> /> No Publish
								</label>
							</div>
						</div>
						<div class="panel-footer">
							<input type="hidden" value="<?php echo $posts_id; ?>" name="posts_id" />
							<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
							<button type="submit" class="btn btn-warning btn-block">Publish</button>
						</div>
					</section>
					<section class="panel panel-default">
						<header class="panel-heading">
							Kategori
							<span class="tools pull-right">
							<a href="javascript:;" class="fa fa-chevron-down"></a>
							<a href="javascript:;" class="fa fa-times"></a>
							</span>
						</header>
						<div class="panel-body"> 
							<div class="form-group">
								<?php if (!isset($data_category)){  
									echo "error!!!";  
								}else{  
									foreach ($data_category as $row) {  
										?>
										<div class="radio">
											<label>
											<input type="radio" name="category_id" <?php if($row['category_id'] == $category_id){echo'checked';}?>  value="<?=$row['category_id']?>" required>
											<span class="label <?=$row['category_color']?>"><?=$row['category_title']?></span>
											</label>
										</div>
										<?php  
									}  
								}?>
							</div>
						</div>
					</section>	
					<section class="panel panel-default">
						<header class="panel-heading">
							Gambar Sampul
							<span class="tools pull-right">
							<a href="javascript:;" class="fa fa-chevron-down"></a>
							<a href="javascript:;" class="fa fa-times"></a>
							</span>
						</header>
						<div class="panel-body">
							<div class="form-group">
								<?php
									if($posts_image != ""){
										echo "<img src='$posts_image' class='img-responsive' style='border: solid 4px #eee;' />";
										echo "<input type='hidden' class='validate[required] form-control' name='posts_image' id='posts_image' value='$posts_image'/>";
									} else {
										echo '<input type="text" class="validate[required] form-control" name="posts_image" id="posts_image"/>';
									}
								?>									
							</div>
							<div class="form-group">  
								<button class="btn btn-default btn-sm" id="btn_browse_image">Pilih Gambar</button>
							</div>							
						</div>
					</section>
				</div>
			</div>
		</form>
    </div>
</div>
