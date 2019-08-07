<div class="row">
	<div class="col-md-12">
		<!--todolist start-->
		<section class="panel">
			<header class="panel-heading">
				 <a href="<?php echo base_url(); ?>admin/new_posts" class="btn btn-sm btn-primary"><i class="fa fa-plus fa-fw"></i> buat baru</a>
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
								<th>Publikasi</th>
								<th>Kategori</th>
								<th>Penulis</th>
								<th>Status</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_posts)){ echo "Tidak ada Posts"; }else{ foreach ($data_posts as $row) { ?>
							<tr>
								<td><?=$row[ 'posts_judul']?> <small><em> <a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>" target="_admin">View</a></em></small></td>								
								<td><?=$row['posts_date']?> / <?=$row['posts_time']?></td>
								<td><span class="label <?=$row['category_color']?>"><?=$row['category_title']?></span></td>
								<td><?=$row['user_nama_depan']?></td>
								<td>	
								<?php if($row['posts_status'] == '1'){ echo '<span class="label label-success">Publish</span>';}
								else{ echo '<span class="label label-danger">Draff</span>'; }?>
								</td>
								<td>
									<a href="<?=base_url()?>admin/edit_posts/<?=$row['posts_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT</a>
									<a href="<?=base_url()?>admin/del_posts/<?=$row['posts_id']?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus Posts dengan judul : <?=$row[ 'posts_judul']?> ?..')"> <i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<?php } }?>
						</tbody>
					</table>
                </div>
			</div>
		</section>
		<!--todolist end-->
	</div>
</div>
       