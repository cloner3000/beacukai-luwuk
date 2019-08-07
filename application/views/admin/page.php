<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url(); ?>admin/new_page" class="btn btn-sm btn-primary"><i class="fa fa-plus fa-fw"></i> buat baru</a>
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
								<th>Judul</th>
								<th>Url</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_page)){  
								echo "Tidak ada page";  
							}else{
								foreach ($data_page as $row) {
								?>                            
								<tr>
									<td><?=$row['page_title']?><small><em> <a href="<?=base_url()?>page/<?=$row['page_id']?>/<?=$row['page_slug']?>" target="_admin">View</a></em></small></td>
									<td><code><?=base_url()?>page/<?=$row['page_id']?>/<?=$row['page_slug']?></code></td>
									<td>
									<a href="<?=base_url()?>admin/edit_page/<?=$row['page_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT</a>
									<a href="<?=base_url()?>admin/del_page/<?=$row['page_id']?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus PAGE dengan judul : <?=$row[ 'page_title']?> ?..')">
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
       
                            