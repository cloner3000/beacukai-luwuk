<div class="row">
	<div class="col-sm-6">
        <section class="panel">
        	<header class="panel-heading">
				editor
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
            <div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>admin/save_layanan">
					<div class="row">
						<div class="col-sm-12">					
							<label>Nama Layanan *</label>
							<div class="form-group">
								<input type="text" name="layanan_title" value="<?php echo $layanan_title;?>" class="form-control" required="required" />
							</div>

							<label>Icon Layanan *</label>
							<div class="form-group">
								<input type="text" name="layanan_icon" value="<?php echo $layanan_icon;?>" class="form-control" id="input_icon" required="required" />
							</div>

							<label>Link Layanan *</label>
							<div class="form-group">
								<input type="text" name="layanan_link" value="<?php echo $layanan_link;?>" class="form-control"/>
							</div>

							<label>Deskribsi Layanan *</label>
							<div class="form-group">
								<textarea name="layanan_disc" class="form-control" required="required"><?php echo $layanan_disc;?></textarea>
							</div>
															
							<hr/>   		
													 
							<input type="hidden" value="<?php echo $layanan_id; ?>" name="layanan_id" />
							<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
							<button type="submit" class="btn btn-warning">Simpan</button>
						</div> 
					</div>
				</form>
			</div>
        </section>
    </div>
	<div class="col-md-6">
		<section class="panel">
			<header class="panel-heading">
				layanan
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<?php echo $this->session->flashdata('message');?>
				<div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">					
						<thead>
							<tr>
								<th>Nama Layanan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_layanan)){  
								echo "Tidak ada slide";  
							}else{
								foreach ($data_layanan as $row) {
								?>                            
								<tr>

									<td><?=$row['layanan_title']?></code></td>
									<td>
									<a href="<?=base_url()?>admin/edit_layanan/<?=$row['layanan_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT</a>
<a href="<?=base_url()?>admin/del_layanan/<?=$row['layanan_id']?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus layanan ?..')">
									<i class="fa fa-trash-o"></i>
									</a>
									</td>
								</tr>
								<?php  
								}  
							}?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>