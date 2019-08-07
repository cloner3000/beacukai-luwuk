<header class="header-download jumbotron my-0">
        <div class="container">
            <h1 class="text-light mt-5">Download Dokumen Terkait BEA dan CUKAI</h1>
            <h1 class="text-light">serta informasi penting lainnya</h1>
        </div>
        
        <div class="container">
            <a class="btn btn-success text-light mt-4">Download Sekarang</a>
        </div>
</header>

<div class="container p-5">
	<h1 class="page-title mb-4">Dokumen Terbaru</h1>
	
	<?php foreach($data_download as $row): ?>
        <div class="item-download">
			<a href="<?=$row['link'];?>" class="d-flex">
			    <div class="float-left item-download-icon">
			        <i class="fa <?=$row['icon'];?> fa-2x p-3"></i>
		        </div>
			    
    			<div class="ml-3 item-download-text">
    				<p class="mt-2 mb-0"><?=$row['nama'];?></p>
    				<small>Publish: <?=date('d M Y', strtotime($row['publish']));?> | <?=date('h:i:s A', strtotime($row['publish']));?></small>
    			</div>
		    </a>
		</div>
    <?php endforeach; ?>
</div>