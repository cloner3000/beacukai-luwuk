<header class="header-news jumbotron my-0" style="background-image: url(<?=$data_posts_read['posts_image']?>);">
    <div class="container h-100 d-flex flex-column justify-content-center">
        <h1 class="text-light"><b><?=$data_posts_read['posts_judul']?></b></h1>
        <h2 class="text-light h4">
        	<i class="fa fa-user-circle"></i> <?=$data_posts_read['user_nama_depan']?>
        	<i class="fa fa-clock-o pl-2" aria-hidden="true"></i> <?=$data_posts_read['posts_time']?> <?=nama_hari($data_posts_read['posts_date'])?>, <?=tgl_indo($data_posts_read['posts_date'])?>
        </h2>
    </div>
</header>

<section class="pb-5 pt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="read">

					<style>
						.fill {
							<?php if($data_posts_read['posts_image'] != ''){
								echo "background-image: url('".$data_posts_read['posts_image']."');";
							}else{
								echo'';
							} ?>
						}
					</style>
					
					<div class="read-image-header fill"></div>
				

					<div><?=$data_posts_read['posts_isi']?></div>
					<!--
					<div class="share-blog">
						<h5>Share :</h5>
						<a href="whatsapp://send?text=<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
						<a href="http://www.twitter.com/home?status=<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><i class="fa fa-twitter"></i></a>
						<a href="http://www.facebook.com/sharer.php?u=<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><i class="fa fa-facebook"></i></a>
						<a href="https://plus.google.com/share?url=http:<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><i class="fa fa-google-plus"></i></a>
					</div>
					<div class="comments">
						<div class="fb-comments" width="100%"></div>
					</div>
					-->

				
				</div>
			</div>
			 <?php foreach ($data_event as $row) {?>
	        <div class="col-md-3">
	            <div class="card-agenda">
	                <?php if($row['event_date'] == date('Y-m-d')){
	                    echo '<div class="indicator-agenda bg-warning"></div>';
	                }else{
	                    echo '<div class="indicator-agenda bg-success"></div>';
	                }?>
	                
	                <p class="h4"><?=$row['event_title'];?></p>
	                <div class="line-card-agenda my-3"></div>
	                <small class="text-light-grey d-flex">
	                    <i class="fa fa-calendar-o fa-fw mr-2"></i>
	                    <?=nama_hari($row['event_date'])?>, <?=tgl_indo($row['event_date']);?>
	                </small>
	                <small class="text-light-grey d-flex">
	                    <i class="fa fa-clock-o fa-fw mr-2"></i>
	                    <?=$row['event_time'];?> - Selesai
	                </small>
	                <small class="text-light-grey d-flex">
	                    <i class="fa fa-map-marker fa-fw mr-2"></i>
	                    <?=$row['event_location'];?>
	                </small>

	                <div class="text-center mt-3">
	                    <a href="<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>" class="btn btn-primary btn-card-agenda mx-auto">Show More</a>
	                </div>
	            </div>
	        </div>
	        <?php } ?>
		</div>

	<hr/>
		<div class="row">



			<?php foreach ($data_posts as $row) {?>
			<div class="col-md-4 col-sm-12">
				<div class="card-news">
					<div class="card-news-image" style="background-image: url('<?php if($row['posts_image'] != ''){echo $row['posts_image'];}else{echo 'component/upload/images/demo.jpg';}?>');">
						<a class="label-category <?=$row['category_color'];?> text-uppercase"><?=$row['category_title'];?></a>
					</div>
					<div class="card-news-title">
						<h3><a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><?=substr(strip_tags($row['posts_judul']),0,50)?></a></h3>
					</div>
					<div class="card-news-meta">
						<i class="fa fa-user-circle"></i> <a href="#"><?=$row['user_nama_depan'];?></a>
						<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?=tgl_indo($row['posts_date'])?></a></span>
					</div>
					<div class="card-news-description">
						<?=substr(strip_tags($row['posts_isi']),0,80);?>,  <a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>">Read more....</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

