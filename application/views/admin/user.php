<div class="row">
    <div class="col-sm-4">
        <section class="panel">
			<header class="panel-heading">
				FORM
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
            <div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>admin/save_user">
					<div class="form-group">
						<label for="text-input">Fullname</label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" id="text-input" class="form-control" value="<?php echo $user_nama_depan; ?>" name="user_nama_depan">
							</div>
							<div class="col-sm-6">
								<input type="text" id="text-input" class="form-control" value="<?php echo $user_nama_belakang; ?>" name="user_nama_belakang">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="text-input">Username</label>
						<input type="text" id="text-input" class="form-control" value="<?php echo $user_login; ?>" name="user_login">
					</div>
					<div class="form-group">
						<label for="text-input">Password</label>
						<input type="text" id="text-input" class="form-control" value="<?php echo $user_password; ?>" name="user_password">
						<?php if($editor_status == 'edit'){echo'</small>* kosongkan jika tidak ingin merubah password.</small>';}?>
					</div>
					<div class="form-group">
						<label for="text-input">Level</label>
						<?php echo form_dropdown('user_level',array('0'=>'Admin','1'=>'Editor'),$user_level,"class='form-control'");?>
					</div>
					
					<hr/>

					<input type="hidden" value="<?php echo $user_id; ?>" name="user_id" />
					<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
					<button type="submit" class="btn btn-warning">Simpan</button>
				
				</form>
			</div>
		</section>
	</div>
	<div class="col-sm-8">
        <section class="panel">
			<header class="panel-heading">
				USER
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
									<th>Full Name</th>
									<th>Username</th>
									<th>Level</th>
									<th>Opsi</th>
								</tr>
								</thead>
							<tbody>
								<?php if (!isset($data_user)){  
									echo "ERROR!!! NOT FOUNT";  
								}else{
									foreach ($data_user as $row) {
									?>                             
									<tr>
										<td><?=$row['user_nama_depan']?> <?=$row['user_nama_belakang']?></td>
										<td><?=$row['user_login']?></td>
										<td><?if($row['user_level'] == 0){echo 'Admin';}else{echo'Editor';}?></td>
										<td><a href="<?=base_url()?>admin/edit_user/<?=$row['user_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT </a>  
										<a href="<?=base_url()?>admin/del_user/<?=$row['user_id']?>" title="Remove" class="btn btn-danger btn-xs">
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
						