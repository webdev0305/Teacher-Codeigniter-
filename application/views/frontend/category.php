 
  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">
        <?php if($main_cate=='1'){?>
          Videos
        <?php }?>
        <?php if($main_cate=='2'){?>
        Audios
        <?php }?>
        <?php if($main_cate=='3'){?>
        BookShelf
        <?php }?>
      </h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">

        <!-- Portfolio Item 1 -->
        <?php foreach($category as $key => $item){?>
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
            
            <a href="<?= base_url()?>files/<?= $main_cate?>/<?= $item['id']?>"><img class="img-fluid" src="<?= base_url().$item['image'];?>" alt="" style="width: 100%;height: 300px;"></a>
          </div>
        </div>
        <?php }?>
        
    </div>
  </section>


 

