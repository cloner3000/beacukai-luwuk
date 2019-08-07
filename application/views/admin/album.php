<div class="row">
	<div class="col-md-4">
		<section class="panel">
			<header class="panel-heading">
				editor
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>admin/save_album">
					<div class="form-group">
						<label for="text-input">Album</label>
						<input type="text" id="text-input" class="form-control" value="<?php echo $gallery_album_title; ?>" name="gallery_album_title">
					</div>
					<div class="form-group">
						<label for="text-input">Deskribsi</label>
						<textarea class="form-control" name="gallery_album_desc"><?php echo $gallery_album_desc; ?></textarea>
						
					</div>
					
					<div class="form-group">
						<label>Album Cover</label>
						<?php
							if($gallery_album_image != ""){
								echo "<img src='$gallery_album_image' class='img-responsive' style='border: solid 4px #eee;' />";
								echo "<input type='hidden' class='validate[required] form-control' name='gallery_album_image' id='posts_image' value='$gallery_album_image'/>";
							} else {
								echo '<input type="text" class="validate[required] form-control" name="gallery_album_image" id="posts_image"/>';
							}
						?>									
					</div>
					<div class="form-group">  
						<button class="btn btn-default btn-sm btn-block" id="btn_browse_image">Pilih Gambar</button>
					</div>
					<hr/>

					<input type="hidden" value="<?php echo $gallery_album_id; ?>" name="gallery_album_id" />
					<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
					<button type="submit" class="btn btn-warning">Simpan</button>
				
				</form>
			</div>
		</section>
	</div>
	<div class="col-md-8">
		<section class="panel">
			<header class="panel-heading">
				ALBUM GALLERY
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<?php echo $this->session->flashdata('message');?>
				<div class="adv-table">
					<div class="table-responsive">
						<table  class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Opsi</th>
								</tr>
								</thead>
							<tbody>
								<?php if (!isset($data_gallery_album)){  
									echo "ERROR!!! NOT FOUNT";  
								}else{
									foreach ($data_gallery_album as $row) {
									?>                             
									<tr>
										<td><strong><?=$row['gallery_album_title']?></strong><br/><small><?=$row['gallery_album_desc']?></small></td>
										<td><a href="<?=base_url()?>admin/edit_album/<?=$row['gallery_album_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT </a>  
										<a href="<?=base_url()?>admin/del_album/<?=$row['gallery_album_id']?>" title="Remove" class="btn btn-danger btn-xs">
										<i class="fa fa-trash-o"></i></a></td>
									</tr>
									<?php
									}  
								}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>					