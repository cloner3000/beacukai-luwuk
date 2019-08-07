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
				<form method="post" action="<?php echo base_url(); ?>admin/save_download" enctype="multipart/form-data">
					<div class="form-group">
						<label for="text-input">Judul</label>
						<input type="text" id="text-input" class="form-control" name="download_title">
					</div>
					<div class="form-group">
						<label for="text-input">Deskribsi</label>
						<textarea class="form-control" name="download_desc"></textarea>
					</div>
					<div class="form-group">
						<label for="text-input">File</label>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Pilih <input type="file" name="download_file" multiple required>
								</span>
							</span>
							<input type="text" class="form-control" readonly>
						</div>
						<span class="help-block">
							type file yang dapat di ungah .pdf .doc .docx .zip .rar
						</span>
					</div>
					
					<hr/>

					<button type="submit" class="btn btn-primary">Simpan</button>
					
				</form>
			</div>
		</section>
	</div>
	<div class="col-md-8">
		<section class="panel">
			<header class="panel-heading">
				DOWNLOAD
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
									<th>Opsi</th>
								</tr>
								</thead>
							<tbody>
								<?php if (!isset($data_download)){  
									echo "ERROR!!! NOT FOUNT";  
								}else{
									foreach ($data_download as $row) {
									?>                             
									<tr>
										<td>
											<?=$row['download_title']?>
											<hr/>
											<?=$row['download_desc']?>
											<hr/>
											<span class="label label-success"><?=$row['download_file']?></span>
										</td>
										<td> 
										<a href="<?=base_url()?>admin/del_download/<?=$row['download_id']?>" title="Remove" class="btn btn-danger btn-xs">
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