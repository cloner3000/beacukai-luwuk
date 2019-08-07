<header class="header-news jumbotron my-0">
    <div class="container h-100 d-flex flex-column justify-content-center">
        <h1 class="text-light">Lates News, Agenda dan Informasi</h1>
        <h2 class="text-light h4">Pusat Informasi Direktorat Jendral BEA dan CUKAI</h2>
    </div>
</header>

<!-- agenda and meetings -->
<section class="section-agenda my-0 py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3 class="h1 font-serif text-center text-md-left mb-4">Agenda</h3>
      </div>
      <div class="col-md-6 text-center text-md-right">
        
      </div>
    </div>

    <div class="row my-5">
 
        <?php foreach ($data_event as $row) {?>
          <div class="col-md-3">
              <div class="card-agenda">
                  <?php if($row['event_date'] == date('Y-m-d')){
                      echo '<div class="indicator-agenda bg-warning"></div>';
                  }else{
                      echo '<div class="indicator-agenda bg-success"></div>';
                  }?>
                  
                  <p class="h4"><?=$row['event_title'];?></p>
                  <div class="line-card-agenda my-3"></div>
                  <small class="text-light-grey d-flex">
                      <i class="fa fa-calendar-o fa-fw mr-2"></i>
                      <?=nama_hari($row['event_date'])?>, <?=tgl_indo($row['event_date']);?>
                  </small>
                  <small class="text-light-grey d-flex">
                      <i class="fa fa-clock-o fa-fw mr-2"></i>
                      <?=$row['event_time'];?> - Selesai
                  </small>
                  <small class="text-light-grey d-flex">
                      <i class="fa fa-map-marker fa-fw mr-2"></i>
                      <?=$row['event_location'];?>
                  </small>

                  <div class="text-center mt-3">
                      <a href="<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>" class="btn btn-primary btn-card-agenda mx-auto">Show More</a>
                  </div>
              </div>
          </div>
          <?php } ?>
      

    </div>
  </div>

</section>	