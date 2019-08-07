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
				<form method="post" action="<?php echo base_url(); ?>admin/save_video">
					<div class="form-group">
						<label for="text-input">Judul</label>
						<input type="text" id="text-input" class="form-control" name="gallery_title" required>
					</div>
					<div class="form-group">
						<label for="text-input">Code Embed</label>
						<input type="text" id="text-input" class="form-control" name="gallery_data" required>
					</div>

					<hr/>

					<button type="submit" class="btn btn-warning">Simpan</button>

				</form>
			</div>
		</section>
	</div>
	<div class="col-md-8">
		<section class="panel">
			<header class="panel-heading">
				vidio galeri
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
									<th>Judul</th>
									<th>Code</th>
									<th>Opsi</th>
								</tr>
								</thead>
							<tbody>
								<?php if (!isset($data_gallery_video)){  
									echo "ERROR!!! NOT FOUNT";  
								}else{
									foreach ($data_gallery_video as $row) {
									?>                             
									<tr>
										<td><?=$row['gallery_title']?></td>
										<td><strong><?=$row['gallery_data']?></strong></td>
										<td> 
										<a href="<?=base_url()?>admin/del_gallery_video/<?=$row['gallery_id']?>" title="Remove" class="btn btn-danger btn-xs">
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