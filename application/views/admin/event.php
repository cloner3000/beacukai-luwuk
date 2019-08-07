<div class="row">
	<div class="col-md-6">
		<section class="panel">
			<header class="panel-heading">
				editor
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">			
				<form method="post" action="<?php echo base_url(); ?>admin/save_event">      
					<label>Judul</label>
					<div class="form-group">
						<input type="text" name="event_title" value="<?php echo $event_title;?>" class="form-control" required="required" />
					</div>

					<label>Tangal</label>
					<div class="form-group">
                        <input name="event_date" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="<?php echo $event_date;?>" required="required"/>
                    </div>

					<label>Waktu</label>
					<div class="form-group input-group bootstrap-timepicker">
                        <input type="text" class="form-control timepicker-24" name="event_time" value="<?php echo $event_time;?>" required="required">
                        <span class="input-group-btn">
                        	<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                        </span>
                    </div>
					
					<label>Lokasi</label>
					<div class="form-group">
						<input type="text" name="event_location" value="<?php echo $event_location;?>" class="form-control" required="required" />
					</div>	

					<label>Deskribsi</label>
					<div class="form-group">
						<textarea name="event_isi" class="wysihtml5 form-control" required="required" rows="9"><?php echo $event_isi;?></textarea>
					</div>	

					<hr/>   

					<input type="hidden" value="<?php echo $event_id; ?>" name="event_id" />
					<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
					<button type="submit" class="btn btn-warning">Simpan</button>				
				</form>
			</div> 			
		</section>
	</div>
	<div class="col-md-6">
		<section class="panel">
			<header class="panel-heading">
				agenda
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
								<th>Agenda</th>
								<th>Tangal & Waktu</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_event)){  
								echo "Tidak ada event";  
							}else{
								foreach ($data_event as $row) {
								?>                            
								<tr>
									<td>
										<?=$row['event_title']?>
									</td>
									<td>
										<?=$row['event_date']?> / <?=$row['event_time']?>
									</td>
									<td>
									<a href="<?=base_url()?>admin/edit_event/<?=$row['event_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT</a>
									<a href="<?=base_url()?>admin/del_event/<?=$row['event_id']?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus event dengan judul : <?=$row[ 'event_title']?> ?..')">
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