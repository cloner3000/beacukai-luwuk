<header class="header-news jumbotron my-0">
    <div class="container h-100 d-flex flex-column justify-content-center">
        <h1 class="text-light">Lates News</h1>
        <h2 class="text-light h4">Pusat Informasi Direktorat Jendral BEA dan CUKAI</h2>
    </div>
</header>

<section class="panel-news pt-5 pb-5">
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    		    
    			<div class="read-image-header fill"></div>

                <h3 class="h1 font-serif text-center text-md-left">Search Result</h3>
                
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
                
                <!--list berita-->
        		<div class="row">
        			<?php foreach ($data_post_search as $row) {?>
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
    		
    	</div>
    </div>
</section>