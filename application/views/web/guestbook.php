<div class="container">

	<div class="read-image-header fill"></div>
	<form class="secondary-search" method="get" action="<?=base_url();?>web/search">
		<input type="text" name="key" class="form-control" placeholder="" />
	</form>
	
	<div class="clear-line"></div>
	
	<div class="read-title">
		<h2>Kritik & Saran</h2>
	</div>
	
	<div class="row">
		<div class="col-md-12"> 
		
			<p><strong>Media Ini Dibuat Untuk Menampung Segala Saran Dan Kritik Anda, Manfaatkan Kesempatan Ini Untuk Kemajuan Dinas Kepemudaan Olahraga Dan Pariwisata.</strong></p>
			<hr/>
			
			<?php echo $this->session->flashdata('success');?>
			<form method="post" action="<?=base_url();?>guestbook/send">
			  <div class="form-group">
				<label class="control-label">Nama <span class="text-required">*</span></label>
				<input type="text" class="form-control" id="inputPassword" placeholder="" name="guestbook_name" required>
			  </div>
			  <div class="form-group">
				<label class="control-label">Email <span class="text-required">*</span></label>
				<input type="email" class="form-control" placeholder="" name="guestbook_email" required>
			  </div>
			  <div class="form-group">
				<label class="control-label">Pesan <span class="text-required">*</span></label>
				<textarea class="form-control" name="guestbook_pesan" rows="6" required></textarea>
			  </div>
			  <div class="form-group">
			  <?php 
				echo $this->recaptcha->getScriptTag(); 
				echo $this->recaptcha->getWidget(array('data-type' => 'audio')); 
			  ?>
			  </div>
			  <div class="form-group">
				<button type="submit"  class="btn btn-default">Kirim</button>
			  </div>
			</form>	
		
		</div>
		<div class="col-md-12">
			<div class="side-title">Berita Lainnya</div>
			<div class="releate-news">
			<?php foreach ($data_posts as $row) { ?>
				<div class="news col-lg-4 col-md-4 fadeInBlock">
					<div class="thumbnail">
					  <div class="list-group-image">
						<img src="<?php if($row['posts_image'] != ''){echo $row['posts_image'];}else{echo 'component/upload/images/demo.jpg';}?>" alt="">
						<div class="overlay">
						  <div class="content">
							<a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>">Read More</a>
						  </div>
						</div>
					  </div>
					  <div class="caption">
						<p class="list-group-item-heading-2"><a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>">
							<?=substr(strip_tags($row['posts_judul']),0,27)?>
						</a></p>
						<p class="list-group-item-meta">
						  <i class="fa fa-clock-o"></i> <?=tgl_indo($row['posts_date'])?>
						</p>
						<p class="list-group-item-description">
						  <?=substr(strip_tags($row['posts_isi']),0,100)."..."?>
						</p>
					  </div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>