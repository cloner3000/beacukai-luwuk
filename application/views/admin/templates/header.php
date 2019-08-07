<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="CodeKece">
    <link rel="shortcut icon" href="<?=base_url();?>com/images/favicon.ico">
    <title><?=$title;?></title>

    <link href="<?=base_url()?>assets/admin/bs3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/admin/css/bootstrap-reset.css" rel="stylesheet" /> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />

    <link href="<?=base_url()?>assets/admin/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/admin/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/admin/js/data-tables/DT_bootstrap.css" rel="stylesheet" />

    <link href="<?=base_url()?>assets/admin/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" />

    <link href="<?=base_url()?>assets/admin/js/bootstrap-datepicker/datepicker.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/admin/js/bootstrap-datepicker/datepicker3.min.css" rel="stylesheet" /
    >
    <link href="<?=base_url()?>assets/admin/js/bootstrap-timepicker/css/timepicker.css" rel="stylesheet" type="text/css"  />

    <link href="<?=base_url()?>assets/admin/js/fileupload/bootstrap-fileupload.css" rel="stylesheet" />
   
    <link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/admin/css/style-responsive.css" rel="stylesheet" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link href="<?=base_url()?>assets/admin/js/simple-iconpicker/simple-iconpicker.min.css" rel="stylesheet" />
	<script src="<?=base_url()?>assets/admin/js/simple-iconpicker/simple-iconpicker.min.js"></script>

    <style type="text/css">
        .sidebar-ed{color: white;border-radius: 4px;}
		a.logo {
			margin: 25px 0 0 25px;
			color: #fff;
		}
    </style>
</head>

<body>

	<section id="container" >

		<header class="header fixed-top clearfix">
			<div class="brand">
			    <a href="<?=base_url()?>admin" class="logo">
					<b>BCLUWOK</b>
			    </a>
			    <div class="sidebar-toggle-box">
			        <div class="fa fa-bars"></div>
			    </div>
			</div>

			<div class="top-nav clearfix">
			    <ul class="nav pull-right top-menu">
			        <li>
			            <input type="text" class="form-control search" placeholder=" Search">
			        </li>

			        <li class="dropdown">

			            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<img data-name="<?=$session['user_nama'];?>" class="profile"/>
							<span class="username"><?=$session['user_nama'];?></span>
							<b class="caret"></b>
			            </a>
			            <ul class="dropdown-menu extended logout">
			                <li><a href="<?=base_url();?>admin/setting"><i class="fa fa-cog"></i> Settings</a></li>
			                <li><a href="<?=base_url();?>admin/session_off"><i class="fa fa-key"></i> Log Out</a></li>
			            </ul>
			        </li>
			      
			    </ul>
			  
			</div>
		</header>

		<aside>
		    <div id="sidebar" class="nav-collapse">
		        \
		        <div class="leftside-navigation">
		            <ul class="sidebar-menu" id="nav-accordion">
						<li>
							<a href="<?=base_url()?>admin" <?php $id=$this->uri-> segment(2); if ($id=="") { ?> class="active" <?php } ?>>
								<i class="fa fa-dashboard"></i>
								DASHBOARD
							</a>
						</li>
						<li class="sub-menu dcjq-parent-li <?php $id=$this->uri-> segment(2); if ($id=="posts" || $id=="category" || $id=="new_posts"|| $id=="editposts") { echo 'active'; } ?>">
		                    <a href="javascript:;" class="<?php $id=$this->uri-> segment(2); if ($id=="posts" || $id=="category" || $id=="new_posts"|| $id=="editposts") { echo 'dcjq-parent active'; } ?>">
		                        <i class="fa fa-file"></i>
		                        <span>POST </span>
		                    </a>
		                    <ul class="sub">
		                        <li <?php $id=$this->uri-> segment(2); if ($id=="new_posts") { ?> class="active" <?php } ?>>
								<a href="<?=base_url()?>admin/new_posts"><i class="fa fa-plus"></i> BUAT BARU</a></li>
								<li <?php $id=$this->uri-> segment(2); if ($id=="posts") { ?> class="active" <?php } ?>>
								<a href="<?=base_url()?>admin/posts"><i class="fa fa-file-text"></i> SEMUA POSTINGAN</a></li>
								<li <?php $id=$this->uri-> segment(2); if ($id=="category") { ?> class="active" <?php } ?>>
								<a href="<?=base_url()?>admin/category"><i class="fa fa-folder-open"></i> KATOGORI</a></li>
		                    </ul>
		                </li>
						<li>
							<a href="<?=base_url()?>admin/layanan" <?php $id=$this->uri-> segment(2); if ($id=="layanan") { ?> class="active" <?php } ?>>
								<i class="fa fa-truck"></i>
								LAYANAN
							</a>
						</li>
						<li>
							<a href="<?=base_url()?>admin/kurs" <?php $id=$this->uri-> segment(2); if ($id=="kurs") { ?> class="active" <?php } ?>>
								<i class="fa fa-usd"></i>
								KURS
							</a>
						</li>
						<li>
							<a href="<?=base_url()?>admin/event" <?php $id=$this->uri-> segment(2); if ($id=="event") { ?> class="active" <?php } ?>>
								<i class="fa fa-calendar"></i>
								AGENDA
							</a>
						</li>
						<li>
							<a href="<?=base_url()?>admin/page" <?php $id=$this->uri-> segment(2); if ($id=="page") { ?> class="active" <?php } ?>>
								<i class="fa fa-copy"></i>
								HALAMAN
							</a>
		                </li>
		            	<li>
							<a href="<?=base_url()?>admin/download" <?php $id=$this->uri-> segment(2); if ($id=="download") { ?> class="active" <?php } ?>>
								<i class="fa fa-cloud-download"></i>
								BANK DATA
							</a>
						</li>

						<li class="sub-menu dcjq-parent-li <?php $id=$this->uri-> segment(2); if ($id=="photo" || $id=="video" || $id=="album"|| $id=="editalbum") { echo 'active'; } ?>">
							<a href="javascript:;" class="<?php $id=$this->uri-> segment(2); if ($id=="photo" || $id=="video" || $id=="album"|| $id=="editalbum") { echo 'dcjq-parent active'; } ?>">
								<i class="fa fa-camera-retro"></i>
								GALERI
							</a>
							<ul class="sub">
								<li <?php $id=$this->uri-> segment(2); if ($id=="photo") { ?> class="active" <?php } ?>><a href="<?=base_url()?>admin/photo"><i class="fa fa-picture-o"></i> FOTO</a></li>
								<li <?php $id=$this->uri-> segment(2); if ($id=="video") { ?> class="active" <?php } ?>><a href="<?=base_url()?>admin/video"><i class="fa fa-film"></i> VIDIO</a></li>
								<li <?php $id=$this->uri-> segment(2); if ($id=="album" || $id=="editalbum") { ?> class="active" <?php } ?>><a href="<?=base_url()?>admin/album"><i class="fa fa-folder-open"></i> ALBUM</a></li>
							</ul>
						</li>
						<li>
							<a href="<?=base_url()?>admin/slide" <?php $id=$this->uri-> segment(2); if ($id=="slide") { ?> class="active" <?php } ?>>
								<i class="fa fa-picture-o"></i>
								SLIDE
							</a>
						</li>
						<li>
							<a href="<?=base_url()?>admin/menu" <?php $id=$this->uri-> segment(2); if ($id=="menu") { ?> class="active" <?php } ?>>
								<i class="fa fa-bars"></i>
								MENU
							</a>
						</li>
						<li>
							<a href="<?=base_url()?>admin/user" <?php $id=$this->uri-> segment(2); if ($id=="user") { ?> class="active" <?php } ?>>
								<i class="fa fa-users"></i>
								USER
							</a>
						</li>
						<li>
							<a href="<?=base_url()?>admin/setting" <?php $id=$this->uri-> segment(2); if ($id=="setting") { ?> class="active" <?php } ?>>
								<i class="fa fa-gear"></i>
								SETTING
							</a>
						</li>
		            </ul>
		        </div>
			
		    </div>
		</aside>

	    <section id="main-content">
	        <section class="wrapper">

