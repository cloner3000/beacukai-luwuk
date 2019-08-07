<?php
	$data_slide = $this->m_web->GetSlide("ORDER BY slide_id DESC LIMIT 5")->result_array();
	$menu = $this->db->get_where('tbl_menu', array('is_parent' => 0));
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?=$title?><?=$setting[0]['web_title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css">
		<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="header">
			<nav class="navbar navbar-expand-lg navbar-dark text-white">
				<div class="container">
					<a class="navbar-brand" href="#">
						<img src="<?=$setting[0]['web_logo']; ?>" width="65" height="55" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?=base_url();?>">beranda</a>
							</li>
						<?php foreach ($menu->result() as $m) {
							$submenu = $this->db->get_where('tbl_menu',array('is_parent'=>$m->menu_id));
							if($submenu->num_rows()>0){ ?>	
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?=strtoupper($m->menu_title)?>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<?php foreach ($submenu->result() as $s){ ?>
												<a class="dropdown-item" href="<?=$s->menu_link;?>"> <?=strtoupper($s->menu_title);?> </a>		
											<?php } ?>
									</div>
								</li>
								
							<?php }else{ ?>
							<li class="nav-item">
								<a class="nav-link" href="<?=$m->menu_link;?>"><?=strtoupper($m->menu_title);?></a>
							</li>
							<?php }
						} ?>	
						</ul>
					</div>
				</div>
			</nav>
			<div id="carousel_bcluwok" class="carousel slide" data-ride="carousel">
			    <div class="container">
    				<ol class="carousel-indicators">
    					<?php $i=1; foreach ($data_slide as $row) { if($i==1){ ?>
    					<li data-target="#carousel_bcluwok" data-slide-to="<?=$i - 1;?>" class="active"></li>
    					<?php }else{ ?>
    					<li data-target="#carousel_bcluwok" data-slide-to="<?=$i - 1;?>"></li>
    					<?php } $i++; } ?>
    				</ol>
			    </div>
				<div class="carousel-inner">
					<?php $i=1; foreach ($data_slide as $row) { if($i==1){ ?>
					<div class="carousel-item active" style="background-image: url('<?=$row['slide_image'];?>');">
					    <div class="container">
    						<div class="carousel-caption text-left">
    						    <h5 class="h4"><?=$row['slide_title'];?></h5>
    						</div>
					    </div>
					</div>
					<?php }else{ ?>
					<div class="carousel-item" style="background-image: url('<?=$row['slide_image'];?>');">
					    <div class="container">
    						<div class="carousel-caption text-left">
    						    <h5 class="h4"><?=$row['slide_title'];?></h5>
    						</div>
					    </div>
					</div>
					<?php } $i++; } ?>
				</div>
			</div>
		</div>