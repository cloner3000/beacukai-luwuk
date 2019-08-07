<header class="header-news jumbotron my-0">
    <div class="container h-100 d-flex flex-column justify-content-center">
        <h1 class="text-light">Galeri Foto & Video</h1>
        <h2 class="text-light h4">Pusat Informasi Direktorat Jendral BEA dan CUKAI</h2>
    </div>
</header>

<section class="pt-5 pb-5">
	<div class="container">

		<h1 class="page-title mb-4">Galeri Foto</h1>

		<div class="toolbar mb-5 mt-2">
			<button class="btn btn-news px-3 fil-cat" href="" data-rel="all">All</button>
			<?php foreach ($data_gallery as $row) { ?>
			<button class="btn btn-news px-3 fil-cat" data-rel="<?=$row['gallery_album_slug']?>"><?=$row['gallery_album_title']?></button>
			<?php } ?>
		</div> 
 
		<div id="portfolio">
			<?php foreach ($data_gallery_photo as $row) {?>
			<div class="tile scale-anm <?=$row['gallery_album_slug']?> all">
				<a  href="<?=base_url()?>upload/gallery/<?=$row['gallery_data']?>">
					<img src="<?=base_url()?>upload/gallery/thumbs/<?=$row['gallery_data']?>" alt="" />
				</a>
			</div>
			<?php } ?>
		</div>
		<div style="clear:both;"></div>   
	</div>

</section>

<style type="text/css">
  .tile{
  	background: #fff;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
  }

  .video {
    background: #fff;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
    width: 23%; /* Thumbnails 4 across */
    margin: 1%;
    float: left;
  }

   /* 
   These keep the height of each video thumbnail consistent between YouTube and Vimeo.
   Each can have thumbnail sizes that vary by 1px and are likely break your layout. 
   */

  .video figure {
    height: 0;
    padding-bottom: 56.25%;
    overflow: hidden;
  }

  .video figure a {
    display: block;
    margin: 0;
    padding: 0;
    border: none;
    line-height: 0;
  }

  /* Media Queries - This is the responsive grid. */

  @media (max-width: 1024px) {
    .video {
      width: 31.333%; /* Thumbnails 3 across */
    }
  }

  @media (max-width: 600px) {
    .video {
      width: 48%; /* Thumbnails 2 across */
    }
  }

  @media (max-width: 360px) {
    .video {
      display: block;
      width: 96%; /* Single column view. */
      margin: 2%; /* The smaller the screen, the smaller the percentage actually is. */
      float: none;
    }
  }

  /* These are my preferred rollover styles. */

  .video img {
    width: 100%;
    opacity: 1;
  }

  .video img:hover, .video img:active, .video img:focus {
    opacity: 0.75;
  }

  .video .videoTitle {
  	font-size: 14px;
  	text-transform: uppercase;
  	text-align: center;
  	font-weight: 300;
  }

</style>


<section class="pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1 class="page-title mb-4">Galeri Video</h1>
				
			
				<div class="row gallery-video">
					
					<?php if (!isset($data_gallery_video)){  
						sho_404();   
					}else{  
						foreach ($data_gallery_video as $row) { ?>
						 <article class="video">
						 	<figure>
								<a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/<?=$row['gallery_data']?>?rel=0&amp;showinfo=0"><img class="videoThumb" src="http://i1.ytimg.com/vi/<?=$row['gallery_data']?>/mqdefault.jpg"></a>
							</figure>
							<h2 class="videoTitle"><?=$row['gallery_title']?></h2>
						</article>
					<?php }  
					}?>
				
				</div>
			</div>
		</div>
	</div>
</section>
		
		
		
