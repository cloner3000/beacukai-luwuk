<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?=$title?><?=$setting[0]['web_title']; ?></title>
		<link rel="shortcut icon" type="image/png" href="<?=$setting[0]['web_favicon']; ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?=$setting[0]['web_description']; ?>">
		<meta name="keywords" content="<?=$setting[0]['web_keyword']; ?>">
		<meta name="author" content="Shohibul Amin">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>component/web/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>component/web/assets/plugins/slick/slick.css"/>
		<link rel="stylesheet" href="<?=base_url()?>component/web/assets/plugins/slick/slick-theme.css"/>
		<link rel="stylesheet" href="<?=base_url()?>component/web/assets/plugins/responsivevideogallery/css/videogallery.css"/>
		<link rel="stylesheet" href="<?=base_url()?>component/web/assets/css/menu.css">
		<link rel="stylesheet" href="<?=base_url()?>component/web/assets/css/style.css">
		<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', '<?=$setting[0]['google_seo']; ?>', 'auto');
		ga('send', 'pageview');
		</script>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5&appId=1528150877515317";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		<style type="text/css">
			<?=$setting[0]['custom_css']; ?>
		</style>
	</head>
	<body>
		<nav class="navbar sticky-top hidden-sm-up navbar-light" style="background-color: #e3f2fd;">
			<a class="navbar-brand" href="#">DISPORAPAR</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?=base_url()?>">BERANDA</a>
					</li>
					<?php $menu = $this->db->get_where('tbl_menu', array('is_parent' => 0));
					foreach ($menu->result() as $m) {
						$submenu = $this->db->get_where('tbl_menu',array('is_parent'=>$m->menu_id));
						if($submenu->num_rows()>0){ ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle"  href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?=strtoupper($m->menu_title)?>
								</a>
								<div class="dropdown-menu" aria-labelledby="">
										<?php foreach ($submenu->result() as $s){ ?>
											<a class="dropdown-item" href="<?=$s->menu_link;?>"> <?=strtoupper($s->menu_title);?> </a>		
										<?php } ?>
								</div>
							</li>
							
						<?php }else{ ?>
						<li class="nav-item">
							<a class="nav-link" href="<?=$m->menu_link;?>"> <?=strtoupper($m->menu_title);?></a>
						</li>
						<?php }
					} ?>						
				</ul>
			</div>
		</nav>
		<header>	
			<div class="logo hidden-sm-down">
				<img src="<?=$setting[0]['web_logo'];?>" class="img-fluid mx-auto d-block" />
			</div>
			
			<ul class="nav justify-content-center hidden-sm-down">
				<li class="nav-item active">
					<a class="nav-link" href="<?=base_url()?>">Beranda</a>
				</li>
				<?php $menu = $this->db->get_where('tbl_menu', array('is_parent' => 0));
				foreach ($menu->result() as $m) {
					$submenu = $this->db->get_where('tbl_menu',array('is_parent'=>$m->menu_id));
					if($submenu->num_rows()>0){ ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle"  href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?=strtoupper($m->menu_title)?>
							</a>
							<div class="dropdown-menu" aria-labelledby="">
									<?php foreach ($submenu->result() as $s){ ?>
										<a class="dropdown-item" href="<?=$s->menu_link;?>"> <?=strtoupper($s->menu_title);?> </a>		
									<?php } ?>
							</div>
						</li>
						
					<?php }else{ ?>
					<li class="nav-item">
						<a class="nav-link" href="<?=$m->menu_link;?>"> <?=strtoupper($m->menu_title);?></a>
					</li>
					<?php }
				} ?>
			</ul>
		</header>
