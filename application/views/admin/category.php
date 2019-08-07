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
				<form method="post" action="<?php echo base_url(); ?>admin/save_category">
					<div class="form-group">
						<label for="text-input">Judul</label>
						<input type="text" id="text-input" class="form-control" value="<?php echo $category_title; ?>" name="category_title">
					</div>
					<div class="form-group">
						<label for="text-input">Warna</label>
						<select name="category_color" class="form-control">
							<option>Pilih</option>
							<option value="bg-primary" <? if($category_color == 'bg-primary'){ echo 'selected';}?> >Biru</option>
							<option value="bg-success" <? if($category_color == 'bg-success'){ echo 'selected';}?> >Hijau</option>
							<option value="bg-warning" <? if($category_color == 'bg-warning'){ echo 'selected';}?> >Kuning</option>
							<option value="bg-danger" <? if($category_color == 'bg-danger'){ echo 'selected';}?> >Merah</option>
						</select>
					</div>
					
					<hr/>

					<input type="hidden" value="<?php echo $category_id; ?>" name="category_id" />
					<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
					<button type="submit" class="btn btn-warning">Simpan</button>

				</form>
			</div>
        </section>
    </div>
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading">
                kategori
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
								<th>Opsi</th>
							</tr>
							</thead>
						<tbody>
							<?php if (!isset($data_category)){  
								echo "ERROR!!! NOT FOUNT";  
							}else{
								foreach ($data_category as $row) { ?>                             
								<tr>
									<td><span class="label <?=$row['category_color']?>"><?=$row['category_title']?></span></td>
									<td><a href="<?=base_url()?>admin/edit_category/<?=$row['category_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT </a>  
									<a href="<?=base_url()?>admin/del_category/<?=$row['category_id']?>" title="Remove" class="btn btn-danger btn-xs">
									<i class="fa fa-trash-o"></i></a></td>
								</tr>
								<?php }  
							}?>
						</tbody>
					</table>
                </div> 
            </div>
        </section>
    </div>
</div>