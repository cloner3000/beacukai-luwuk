<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url(); ?>admin/new_slide" class="btn btn-sm btn-primary">Add New Slide</a>
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-cog"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<?php echo $this->session->flashdata('message');?>
				<div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">					
						<thead>
							<tr>
								<th>Title</th>
								<th>Image</th>
								<th>Link</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_slide)){  
								echo "Tidak ada slide";  
							}else{
								foreach ($data_slide as $row) {
								?>                            
								<tr>
									<td><?=$row['slide_title']?></td>
									<td><img src="<?=$row['slide_image']?>" width="100xp" /></td>
									<td><?=$row['slide_link']?></code></td>
									<td>
									<a href="<?=base_url()?>admin/edit_slide/<?=$row['slide_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i></a>
<a href="<?=base_url()?>admin/del_slide/<?=$row['slide_id']?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus slide ?..')">
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