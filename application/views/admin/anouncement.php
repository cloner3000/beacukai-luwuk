<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				ANOUNCEMENT
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<?php echo $this->session->flashdata('message');?>
				<a href="<?php echo base_url(); ?>admin/new_anouncement" class="btn btn-sm btn-primary">Add New</a>
				<div class="adv-table">
					<table  class="display table table-bordered table-striped" id="dynamic-table">
						<thead>
							<tr>
								<th>Title</th>
								<th>Date</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_anouncement)){  
								echo "ERROR!!! NOT FOUNT";  
							}else{
								foreach ($data_anouncement as $row) {
								?>                            
								<tr>
									<td><?=$row['anouncement_title']?><small><em> <a href="<?=base_url()?>anouncement/<?=$row['anouncement_id']?>/<?=$row['anouncement_slug']?>" target="_admin">View</a></em></small></td>
									<td><?=$row['anouncement_date']?></td>
									<td>
									<a href="<?=base_url()?>admin/edit_anouncement/<?=$row['anouncement_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT EDIT</a>
									<a href="<?=base_url()?>admin/del_anouncement/<?=$row['anouncement_id']?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus anouncement dengan judul : <?=$row[ 'anouncement_title']?> ?..')">
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