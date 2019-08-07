<section class="panel-layanan pt-5 pb-5">
	<div class="container">
		<div class="headline text-center mb-5">
			<p class="sub-headline">Direktorat Jendral BEA dan CUKAI</p>
			<h2>Apa saja layanan yang kami sediakan ?</h2>
		</div>
		<div class="text-center arrow-link mb-5">
			<a href="#" id="btnLayanan"><i class="rounded-x fa fa-chevron-down"></i></a>
		</div>
		<div class="row pt-3">
			<div id="myLayanan"></div>
			<?php foreach ($data_layanan as $row) { ?>
			<div class="col-md-4">
				<div class="card-layanan">
					<a href="<?=$row['layanan_link'];?>"><i class="fa <?=$row['layanan_icon'];?>"></i></a>
					<div class="overflow-h">
						<h3><?=$row['layanan_title'];?></h3>
						<p><?=$row['layanan_disc'];?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<section class="panel-kurs pt-5 pb-5">
	<div class="container">
		<div class="headline text-center mb-5">
			<h2 class="text-white">Nilai Kurs Pajak</h2>
		</div>

		<div class="text-center text-white">
			<p class="mb-5">Berdasarkan SKep Nomor 19/KM.10/2018 maka kurs pajak dari tanggal 02-May-2018 s.d 08-May-2018</p>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="slick-kurs row">
					<?php foreach ($data_kurs as $row) { ?>
					<div class="kurs col-md-3">
						<div class="item">
							<div class="curensi">
								<i class="fa <?=$row['kurs_icon'];?>"></i>
							</div>
							<p>1 <?=$row['kurs_code'];?></p>
							<h4><?=$row['kurs_title'];?></h4>
							<p class="rp"><?=rupiah($row['kurs_currency']);?></p>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>

		</div>
		<div class="text-center">
			<a href="#" class="btn btn-outline-light mt-5 mb-2 text-uppercase">load more</a>
		</div>
	</div>
</section>
<section class="panel-profile pt-5 pb-5">
	<div class="container">
		<div class="headline-2 mb-3">
			<p class="sub-headline">Direktorat Jendral BEA dan CUKAI</p>
			<h2>Tentang Kami</h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<p><?=$setting['0']['web_sambutan']?></p>
				<a href="<?=$setting['0']['web_sambutan_link']?>" class="btn btn-outline-warning text-dark px-5 my-3"><i>Read more ...</i></a>
			</div>
			<div class="col-md-6 mb-5">
				<div class="video-content" id="js-about-video" data-src="https://www.youtube.com/embed/<?=$setting['0']['web_video_sambutan']?>?autoplay=1&amp;showinfo=0">
					<iframe id="myiFrame" src="about:blank" frameborder="0" allowfullscreen=""></iframe>
					<div id="js-about-video-close" class="video-close"></div>
				</div>
				<div class="video-profile">
					<img src="<?=$setting['0']['web_image_sambutan']?>" class="imgpreload" />
				</div>
				<div class="play" id="js-play-video">
					<img src="https://bilba.go-jek.com/dist/img/about/triangle.png" alt="Play Video">
				</div>
			</div>
		</div>
	</div>
</section>
<section class="panel-news py-5">
	<div class="container">
	    
	   <div class="read-image-header fill"></div>

        <h3 class="h1 font-serif text-center text-md-left">Latest News</h3>
        
        <div class="row my-4">
            <div class="col-md-8 text-center text-md-left mb-4">
    			<?php foreach ($list_category as $row): ?>
    				<a href="<?=base_url()?>category/<?=$row['category_id']?>/<?=$row['category_slug']?>" class="btn btn-news px-3"><?=$row['category_title']?></a>&nbsp;
    			<?php endforeach; ?>
            </div>
            
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <div class="input-group-text bg-transparent text-muted"><i class="fa fa-search"></i></div>
                    </span>
                    
        			<form class="secondary-search" method="get" action="<?=base_url();?>web/search">
                        <input class="form-control py-2 border-left-0 border" type="search" name="key" placeholder="Cari...">
        			</form>                            
                </div>
            </div>
        </div>
	    
		<div class="row">
			<?php $i=1; foreach ($data_headline as $row) { if($i==1){?>
			<div class="col-md-8 col-sm-12">
				<div class="card-news-primary" style="background-image: url('<?php if($row['posts_image'] != ''){echo $row['posts_image'];}else{echo 'component/upload/images/demo.jpg';}?>');">
					<div class="label-category">
						<a class="<?=$row['category_color'];?> text-uppercase"><?=$row['category_title'];?></a>
					</div>
					<div class="box">
						<div class="card-news-title">
							<h3><a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><?=$row['posts_judul'];?></a></h3>
						</div>
						<div class="card-news-meta">
							By <a href="#"><?=$row['user_nama_depan'];?></a>
							<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?=tgl_indo($row['posts_date'])?></a>
						</div>
						<div class="card-news-description">
							<?=substr(strip_tags($row['posts_isi']),0,160);?>,  <a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>">Read more....</a>
						</div>
					</div>
				</div>
			</div>
			<?php }else{ ?>
			<div class="col-md-4 col-sm-12">
				<div class="card-news">
					<div class="card-news-image" style="background-image: url('<?php if($row['posts_image'] != ''){echo $row['posts_image'];}else{echo 'component/upload/images/demo.jpg';}?>');">
						<a class="label-category <?=$row['category_color'];?> text-uppercase"><?=$row['category_title'];?></a>
					</div>
					<div class="card-news-title">
						<h3><a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><?=substr(strip_tags($row['posts_judul']),0,50)?></a></h3>
					</div>
					<div class="card-news-meta">
						By <a href="#"><?=$row['user_nama_depan'];?></a>
						<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?=tgl_indo($row['posts_date'])?></a>
					</div>
					<div class="card-news-description">
						<?=substr(strip_tags($row['posts_isi']),0,80);?>,  <a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>">Read more....</a>
					</div>
				</div>
			</div>
			<?php } $i++; }?>
		</div>
		<div class="row">
			<?php foreach ($data_news as $row) {?>
			<div class="col-md-4 col-sm-12">
				<div class="card-news">
					<div class="card-news-image" style="background-image: url('<?php if($row['posts_image'] != ''){echo $row['posts_image'];}else{echo 'component/upload/images/demo.jpg';}?>');">
						<a class="label-category <?=$row['category_color'];?> text-uppercase"><?=$row['category_title'];?></a>
					</div>
					<div class="card-news-title">
						<h3><a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><?=substr(strip_tags($row['posts_judul']),0,50)?></a></h3>
					</div>
					<div class="card-news-meta">
						By <a href="#"><?=$row['user_nama_depan'];?></a>
						<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?=tgl_indo($row['posts_date'])?></a>
					</div>
					<div class="card-news-description">
						<?=substr(strip_tags($row['posts_isi']),0,80);?>,  <a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>">Read more....</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		
		<div class="text-center">
			<a href="<?=base_url()?>web/news" class="btn btn-primary mt-3 mb-3 text-uppercase">load more</a>
		</div>
	</div>
</section>
<section class="pusat-layanan pt-5 pb-5">
	<div class="container">
		<div class="headline-1 mb-5">
			<h2>Pusat Pelayanan</h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<p><?=$setting[0]['web_layanan'];?></p>
                
                <br>
				<a href="" class="btn btn-warning">
					<i class="fa fa-phone fa-fw" aria-hidden="true"></i>
					<?=$setting[0]['web_telfone'];?>
				</a>
				<a href="" class="btn btn-warning">
					<i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i>
					<?=$setting[0]['web_email'];?>
				</a>
			</div>
			<div class="col-md-6">
          		<div id="map"></div>
        		<script>
	        		function initMap() {
		        		var location = { lat: <?=$setting[0]['web_lat'];?>, lng: <?=$setting[0]['web_log'];?>};
		        
		        		var map = new google.maps.Map(document.getElementById('map'), {
			        		zoom: 16,
			        		center: location
		        		});
		        		var marker = new google.maps.Marker({
			        		position: location,
			        		map: map
		        		});
	        		}
        		</script>
			</div>
		</div>
	</div>
</section>