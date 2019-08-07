<div class="row">
    <div class="col-sm-8">
        <section class="panel">
			<header class="panel-heading">
				editor slide
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
            <div class="panel-body">

				<form method="post" action="<?php echo base_url(); ?>admin/save_slide">
					<div class="form-group">
						<label for="text-input">Title</label>
						<input type="text" id="text-input" class="form-control" value="<?php echo $slide_title; ?>" name="slide_title">
					</div>

					<div class="form-group">
						<label>Slide Image</label>
						<div class="row">
							<Div class="col-md-9">
								<input type='text' class='validate[required] form-control' name='slide_image' id='posts_image' placeholder="untuk gambar yang maksimal gunakan ukuran gambar 1170x262px" value='<?php echo $slide_image; ?>'/>								
							</div>
							<div class="col-md-3">
								<button class="form-control btn btn-default btn-sm" id="btn_browse_image">Browse Image</button>
							</div>
						</Div>
					</div>
					<div class="form-group">
						<label for="text-input">Link</label>
						<textarea class="form-control" name="slide_link"><?php echo $slide_link; ?></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" value="<?php echo $slide_id; ?>" name="slide_id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<button type="submit" class="btn btn-primary">Save Slide</button>
					</div>
				</form>

			</div>
		</section>
	</div>
</div>
