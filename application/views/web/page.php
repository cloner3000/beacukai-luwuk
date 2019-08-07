<header class="header-news jumbotron my-0">
    <div class="container h-100 d-flex flex-column justify-content-center text-center">
    	<?php foreach ($data_page as $row) {?>
        <h1 class="text-light"><b><?=$row['page_title']?></b></h1>
    	<? } ?>
    </div>
</header>

<section class="pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">	
				<?php foreach ($data_page as $row) {?>
					
					<style>
						.fill {
							<?php if($row['page_image'] != ''){
								echo "background-image: url('".$row['page_image']."');";
							}else{
								echo'';
							} ?>
						}
					</style>

					<?=$row['page_isi']?>
				<?php } ?>
			</div>
		</div>
	</div>
</section>