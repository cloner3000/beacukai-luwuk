<div class="row">
	<div class="col-sm-4">
        <section class="panel">
			<header class="panel-heading">
				editor
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
            <div class="panel-body">

				<form method="post" action="<?php echo base_url(); ?>admin/save_kurs">
					<div class="form-group">
						<label for="text-input">Kurs Icon</label>
						<input type="text" class="form-control" name="kurs_icon" value="<?php echo $kurs_icon; ?>" id="input_icon" />
					</div>
					<div class="form-group">
						<label for="text-input">Kurs Code</label>
						<input type="text" class="form-control" name="kurs_code" value="<?php echo $kurs_code; ?>" />
					</div>
					<div class="form-group">
						<label for="text-input">Kurs</label>
						<input type="text" class="form-control" name="kurs_title" value="<?php echo $kurs_title; ?>" />
					</div>
					<div class="form-group">
						<label for="text-input">Kurs Currency</label>
						<input type="text" class="form-control" name="kurs_currency" value="<?php echo $kurs_currency; ?>" />
					</div>
					
					<hr/>

					<input type="hidden" value="<?php echo $kurs_id; ?>" name="kurs_id" />
					<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
					<button type="submit" class="btn btn-warning">Simpan</button>
					
				</form>

			</div>
		</section>
	</div>
	<div class="col-md-8">
		<section class="panel">
			<header class="panel-heading">
				kurs
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
								<th>Icon</th>
								<th>Code</th>
								<th>Kurs</th>
								<th>Currency Rp.</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_kurs)){  
								echo "Tidak ada";  
							}else{
								foreach ($data_kurs as $row) {
								?>                            
								<tr>
									<td><i class="fa <?=$row['kurs_icon']?>"></i></td>
									<td><?=$row['kurs_code']?></td>
									<td><?=$row['kurs_title']?></td>
									<td><?=$row['kurs_currency']?></td>
									<td>
<a href="<?=base_url()?>admin/edit_kurs/<?=$row['kurs_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT</a>
<a href="<?=base_url()?>admin/del_kurs/<?=$row['kurs_id']?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus kurs ?..')">
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