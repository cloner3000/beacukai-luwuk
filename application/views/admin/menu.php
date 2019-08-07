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
				<form method="post" action="<?php echo base_url(); ?>admin/save_menu">
					<div class="form-group">
						<label for="text-input">Menu</label>
						<input type="text" id="text-input" class="form-control" value="<?php echo $menu_title; ?>" name="menu_title">
					</div>
					<div class="form-group">
						<label for="text-input">Url</label>
						<textarea class="form-control" name="menu_link"><?php echo $menu_link; ?></textarea>
					</div>
					<div class="form-group">
						<label for="text-input">Icon</label>
						<input type="text" class="form-control" value="<?php echo $menu_icon; ?>" name="menu_icon" id="input_icon" />
					</div>
					<div class="form-group">
						<label for="text-input">Induk Menu</label>
						<select name="is_parent" class="form-control">
							<option value="0">Yes</option>
							<?php
							$menu = $this->db->get('tbl_menu');
							foreach ($menu->result() as $m){
								echo "<option value='$m->menu_id' ";
								echo $m->menu_id==$is_parent?'selected':'';
								echo">".  strtoupper($m->menu_title)."</option>";
							}
							?>
						</select>
					</div>
					
					<hr/>

					<input type="hidden" value="<?php echo $menu_id; ?>" name="menu_id" />
					<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
					<button type="submit" class="btn btn-warning">Simpan</button>
					
				</form>
			</div>
		</section>
	</div>
	<div class="col-sm-8">
        <section class="panel">
			<header class="panel-heading">
				MENU
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
									<th>Menu</th>
									<th>Opsi</th>
								</tr>
								</thead>
							<tbody>
								<?php if (!isset($data_menu)){  
									echo "Tidak ada berita";  
								}else{
									foreach ($data_menu as $row) {
									?>                             
									<tr>
										<td><strong><?=$row['menu_title']?></strong><!--<br/><?=$row['menu_link']?>--></td>
										<td><a href="<?=base_url()?>admin/edit_menu/<?=$row['menu_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT </a>  
										<a href="<?=base_url()?>admin/del_menu/<?=$row['menu_id']?>" title="Remove" class="btn btn-danger btn-xs">
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
						