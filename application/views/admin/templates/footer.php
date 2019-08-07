		<!-- page end-->
		        </section>
		    </section>
		    <!--main content end-->
			<!--right sidebar start-->
			<div class="right-sidebar">
				<div class="search-row">
					<input type="text" placeholder="Search" class="form-control">
				</div>
				<div class="right-stat-bar">
					<ul class="right-side-accordion">
						<li class="widget-collapsible">
							<a href="#" class="head widget-head red-bg active clearfix">
								<span class="pull-left">work progress (5)</span>
								<span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
							</a>
							<ul class="widget-container">
								<li>
									<div class="prog-row side-mini-stat clearfix">
										<div class="side-graph-info">
											<h4>Target sell</h4>
											<p>
												25%, Deadline 12 june 13
											</p>
										</div>
										<div class="side-mini-graph">
											<div class="target-sell">
											</div>
										</div>
									</div>
									<div class="prog-row side-mini-stat">

									</div>
									<div class="prog-row side-mini-stat">
										
									</div>
									<div class="prog-row side-mini-stat">
										
									</div>
									<div class="prog-row side-mini-stat">

									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

		</section>

		<script src="<?=base_url()?>assets/admin/bs3/js/bootstrap.min.js"></script>
		<script class="include" type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery.dcjqaccordion.2.7.js"></script>

		<script src="<?=base_url()?>assets/admin/js/jquery.scrollTo.min.js"></script>
		<script src="<?=base_url()?>assets/admin/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
		<script src="<?=base_url()?>assets/admin/js/jquery.nicescroll.js"></script>

		<script type="text/javascript" src="<?=base_url()?>assets/admin/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/admin/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

		<script src="<?=base_url()?>assets/admin/js/easypiechart/jquery.easypiechart.js"></script>

		<script src="<?=base_url()?>assets/admin/js/sparkline/jquery.sparkline.js"></script>

		<script src="<?=base_url()?>assets/admin/js/flot-chart/jquery.flot.js"></script>
		<script src="<?=base_url()?>assets/admin/js/flot-chart/jquery.flot.tooltip.min.js"></script>
		<script src="<?=base_url()?>assets/admin/js/flot-chart/jquery.flot.resize.js"></script>
		<script src="<?=base_url()?>assets/admin/js/flot-chart/jquery.flot.pie.resize.js"></script>

		<script type="text/javascript" language="javascript" src="<?=base_url()?>assets/admin/js/advanced-datatable/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/admin/js/data-tables/DT_bootstrap.js"></script>

		<script src="<?=base_url()?>assets/admin/js/dynamic_table_init.js"></script>
		<script src="<?=base_url()?>assets/admin/js/fileupload/bootstrap-fileupload.js"></script>

		<script src="<?=base_url()?>assets/admin/js/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/admin/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="<?=base_url()?>assets/admin/js/initial.min.js"></script>

		<script src="<?=base_url()?>assets/admin/js/scripts.js"></script>

		<script type="text/javascript" src="<?=base_url()?>assets/admin/js/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/admin/js/main.js"></script>
		<script type="text/javascript">
				
			$(document).ready(function(){
			    $('#input_icon').iconpicker("#input_icon");
			});

			$(document).ready(function(){
			    $("#btn_browse_image").click(function(){
			        window.KCFinder = {
			            callBack: function(url) {
			                $('#posts_image').val(url);
			                window.KCFinder = null;                 
			            }
			        };
			        window.open('<?=base_url()?>assets/admin/js/ckeditor/ckfinder/browse.php?type=images', 'kcfinder_textbox',
			            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
			            'resizable=1, scrollbars=0, width=800, height=600'
			        );
			        return false;
			    });
			});

			$(document).ready(function(){
			    $("#btn_browse_image_logo").click(function(){
			        window.KCFinder = {
			            callBack: function(url) {
			                $('#posts_image_logo').val(url);
			                window.KCFinder = null;                 
			            }
			        };
			        window.open('<?=base_url()?>assets/admin/js/ckeditor/ckfinder/browse.php?type=images', 'kcfinder_textbox',
			            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
			            'resizable=1, scrollbars=0, width=800, height=600'
			        );
			        return false;
			    });
			});

			$(document).ready(function(){
			    $("#btn_browse_image_favicon").click(function(){
			        window.KCFinder = {
			            callBack: function(url) {
			                $('#posts_image_favicon').val(url);
			                window.KCFinder = null;                 
			            }
			        };
			        window.open('<?=base_url()?>assets/admin/js/ckeditor/ckfinder/browse.php?type=images', 'kcfinder_textbox',
			            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
			            'resizable=1, scrollbars=0, width=800, height=600'
			        );
			        return false;
			    });
			});

			$(document).ready(function(){
			    $("#btn_browse_image2").click(function(){
			        window.KCFinder = {
			            callBack: function(url) {
			                $('#posts_image2').val(url);
			                window.KCFinder = null;                 
			            }
			        };
			        window.open('<?=base_url()?>assets/admin/js/ckeditor/ckfinder/browse.php?type=images', 'kcfinder_textbox',
			            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
			            'resizable=1, scrollbars=0, width=800, height=600'
			        );
			        return false;
			    });
			});

			$(document).ready(function(){
			    $("#btn_browse_image3").click(function(){
			        window.KCFinder = {
			            callBack: function(url) {
			                $('#posts_image3').val(url);
			                window.KCFinder = null;                 
			            }
			        };
			        window.open('<?=base_url()?>assets/admin/js/ckeditor/ckfinder/browse.php?type=images', 'kcfinder_textbox',
			            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
			            'resizable=1, scrollbars=0, width=800, height=600'
			        );
			        return false;
			    });
			});
			
			var ckeditor = CKEDITOR.replace('ckeditor',{
			    height:'300px',
			    filebrowserBrowseUrl : '<?=base_url()?>assets/admin/js/ckeditor/ckfinder/browse.php?type=files',
			    filebrowserImageBrowseUrl : '<?=base_url()?>assets/admin/js/ckeditor/ckfinder/browse.php?type=images',
			    filebrowserFlashBrowseUrl : '<?=base_url()?>assets/admin/js/ckeditor/ckfinder/browse.php?type=flash',
			    filebrowserUploadUrl : '<?=base_url()?>assets/admin/panel/js/ckeditor/ckfinder/upload.php?type=files',
			    filebrowserImageUploadUrl : '<?=base_url()?>assets/admin/js/ckeditor/ckfinder/upload.php?type=images',
			    filebrowserFlashUploadUrl : '<?=base_url()?>assets/admin/js/mckeditor/ckfinderedia/upload.php?type=flash'     
			});
			CKEDITOR.disableAutoInline = true;
			CKEDITOR.inline('editable');       


		</script>
	</body>
</html>
