<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo $setting[0]['web_description']; ?>">
		<meta name="keywords" content="<?php echo $setting[0]['web_keyword']; ?>">
		<meta name="author" content="Shohibul Amin">
		<link rel="shortcut icon" type="image/png" href="<?php echo $setting[0]['web_favicon']; ?>"/>
		<title><?=$title?><?php echo $setting[0]['web_title']; ?></title>
	    <link href="<?php echo base_url(); ?>com/web/css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>com/web/plugin/slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>com/web/plugin/slick/slick-theme.css"/>
	    <link href="<?php echo base_url(); ?>com/web/css/style.css" rel="stylesheet">
		<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', '<?php echo $setting[0]['google_seo']; ?>', 'auto');
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
			<?php echo $setting[0]['custom_css']; ?>
		</style>
	</head>

	<body>
		<div class="header-blue">
			<div class="container">
				<div class="pull-left">		
					<p> 
						<i class="fa fa-phone fa-fw"></i> <?=$setting[0]['web_sms'];?>	
					</p>
				</div>
				<div class="pull-right">
					<ul class="social-list">	
						<li>
							<a href="mailto:<?=$setting[0]['web_email'];?>?Subject=Hello%20PPPA"><i class="fa fa-envelope aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="<?=$setting[0]['web_facebook'];?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="https://twitter.com/<?=$setting[0]['web_twitter'];?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="<?=$setting[0]['web_youtube'];?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header hidden-xs hidden-sm">
	    	<div class="container">
		    	<div class="row">
		    		<div class="col-md-4">
		    			<div class="logo-area">
		    				<div class="logo">
		    					<img class="logo" src="<?php echo base_url(); ?>com/web/images/logo.png" width="80px" />
		    				</div>
		    				<div class="title">
		    					<p>DINAS PEMBERDAYAAN<br/>PEREMPUAN DAN PERLINDUNGAN ANAK <br/> <span>KABUPATEN MUARASAMU</span></p>
		    				</div>
		    			</div>
			    	</div>
			    	<div class="col-md-8">
	    				<div class="main-menu">
							<ul class="nav navbar-nav">
								<li><a href="<?=base_url()?>"><i class="fa fa-home fa-fw"></i><br/><span>HOME</span></a></li>
								<?php 	
								$menu = $this->db->get_where('tbl_menu', array('is_parent' => 0));
								foreach ($menu->result() as $m) {
									$submenu = $this->db->get_where('tbl_menu',array('is_parent'=>$m->menu_id));
									if($submenu->num_rows()>0){
										echo "<li class='dropdown'>
											".anchor('#',"<i class='$m->menu_icon fa-fw'></i><br/><span>".strtoupper($m->menu_title).'<span><span class="caret"></span>', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')). "
												<ul class='dropdown-menu'>";
										foreach ($submenu->result() as $s){
											$submenu_submenu = $this->db->get_where('tbl_menu',array('is_parent'=>$s->menu_id));
											if($submenu_submenu->num_rows()>0){
												echo "<li class='dropdown-submenu'>
													".anchor('#',"<span>".strtoupper($s->menu_title)). "
														<ul class='dropdown-menu'>";
												foreach ($submenu_submenu->result() as $ss){
													 echo "<li><a href='".$ss->menu_link."' class='dropdown-1'>" . strtoupper($ss->menu_title) . "</a></li>";
												}
												echo"</ul></li>";
											}else{
												echo "<li>" . anchor($s->menu_link, "<span>" . strtoupper($s->menu_title)) . "<span></li>";
											}
										}
										echo"</ul></li>";
									}else{
										echo "<li>". anchor($m->menu_link, "<i class='$m->menu_icon'></i><br/><span>" . strtoupper($m->menu_title)) . "</span></li>";
									}
								}
								?>
								<li><a href="<?=base_url()?>download"><i class="fa fa-cloud fa-fw"></i><br/><span>BANK DATA</span></a></li>
							</ul>
						</div>	
			    	</div>
			    </div>
			</div>
		</div>
		
		<nav class="navbar navbar-custom hidden-md hidden-lg">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar top-bar"></span>
						<span class="icon-bar middle-bar"></span>
						<span class="icon-bar bottom-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=base_url();?>">
						<b>PPPA MUARASAMU</B>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="<?=base_url()?>"><span>HOME</span></a></li>
						<?php
						$menu = $this->db->get_where('tbl_menu', array('is_parent' => 0));
						foreach ($menu->result() as $m) {
							$submenu = $this->db->get_where('tbl_menu',array('is_parent'=>$m->menu_id));
							if($submenu->num_rows()>0){
								echo "<li class='dropdown'>
									".anchor('#',"<span>".strtoupper($m->menu_title).'<span> <span class="caret"></span>', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')). "
										<ul class='dropdown-menu'>";
								foreach ($submenu->result() as $s){
									$submenu_submenu = $this->db->get_where('tbl_menu',array('is_parent'=>$s->menu_id));
									if($submenu_submenu->num_rows()>0){
										echo "<li class='dropdown-submenu'>
											".anchor('#',"<span>".strtoupper($s->menu_title)). "
												<ul class='dropdown-menu'>";
										foreach ($submenu_submenu->result() as $ss){
											 echo "<li><a href='".$ss->menu_link."' class='dropdown-1'>" . strtoupper($ss->menu_title) . "</a></li>";
										}
										echo"</ul></li>";
									}else{
										echo "<li>" . anchor($s->menu_link, "<span> - " . strtoupper($s->menu_title)) . "<span></li>";
									}
								}
								echo"</ul></li>";
							}else{
								echo "<li>" . anchor($m->menu_link, "<span>" . strtoupper($m->menu_title)) . "</span></li>";
							}
						}
						?>
						<li><a href="<?=base_url()?>download"><span>BANK DATA</span></a></li>
						<li><a href="<?=base_url()?>gallery"><span>GALLERY</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">



		
	
		
		
			