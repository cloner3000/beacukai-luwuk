<div class="row">
	<div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon orange"><i class="fa fa-file"></i></span>
            <div class="mini-stat-info">
                <span><?=number_format($total_post);?></span>
                Total Posts
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-bar-chart-o"></i></span>
            <div class="mini-stat-info">
                <span><?=number_format($total_visitor_today);?></span>
                Today Visitors
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon green"><i class="fa fa-bar-chart-o"></i></span>
            <div class="mini-stat-info">
               	<span><?=number_format($total_visitor);?></span>
                Lifetime Visitors
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<!--todolist start-->
		<section class="panel">
			<header class="panel-heading">
				POST 
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-cog"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<div class="adv-table">
                    <table  class="display table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Category</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_posts)){ echo "ERROR!!! NOT FOUNT"; }else{ $no=0 ; foreach ($data_posts as $row) { $no++; ?>
							<tr>
								<td style="width: 20px;"><?=$no?></td>
								<td><?=$row[ 'posts_judul']?> <em><small> <?=$row['posts_date']?> </small></em></td>
								<td><span class="label label-info"><?=$row['category_title']?></span></td>
							</tr>
							<?php } }?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<!--todolist end-->
	</div>
</div>
