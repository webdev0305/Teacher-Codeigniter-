 
  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio" style="min-height: 550px;">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?= $category?></h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <div class="row">
        <div class="col-md-8"></div>
        <div class="form-group col-md-4" >
          <input class="form-control" id="search" type="text" placeholder="Search">
        </div>
      </div>
        
      
      <!-- Portfolio Grid Items -->
      <div class="row">
        
   <!-- Portfolio Item 1 -->
        <?php foreach($files as $key => $item){?>
        <div class="col-md-6 col-lg-3 file_sumbnail" data-index1="<?= $item['file_type']?>" data-index2="<?= $item['file_url']?>" data-index3="<?= $item['link_url']?>">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1" style="border-radius: 20px; background-color:#1abc9c;padding: 10px;">
            <?php if($item['file_type']=='mp4'){?>
              <video  style="width: 100%; height: 150px;" >
                <?php if($item['link_url'] == ''){?>
                  <source src="<?= base_url(); ?><?= $item['file_url']?>" id="file_previw" type="video/mp4" >
                <?php } else{?>
                  <source src="<?= $item['link_url']?>" id="file_previw" type="video/mp4" >
                <?php }?>
              </video >
            <?php } else {?>
            <img class="img-fluid" src="<?= base_url(); ?>assets/img/sample-audio-file.png" style="width:100%;height: 150px;" alt="">
            <?php }?>
            
          </div>
          <div  style="text-align: center;">
            <h3 id="title"><?= $item['title']?></h3>
          </div>
          
        </div>
        <?php }?>

    </div>
  </section>


<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" style="padding-bottom: 50px;">Media Play</h2>
                <div id="media_play">
                  
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
    })

    $('#search').change(function(){
      var value = $(this).val();
      $('.file_sumbnail').each(function(){
        var title = $(this).find('#title').html();
        if(title.search(value)==-1)
          $(this).attr('style','display:none;');
        else
          $(this).removeAttr('style');
        
      })
     })

    $('.file_sumbnail').on('click', function(){
      var file_type = $(this).data('index1');
      var file_url = $(this).data('index2');
      var link_url = $(this).data('index3');
        $('#media_play').empty();
      if(file_type == 'mp4'){
        if(link_url == '')
          $('#media_play').append('<video  style="width: 100%; height: auto;" controls><source src="<?= base_url(); ?>'+file_url+'" type="video/mp4" ></video >');
        else
          $('#media_play').append('<video  style="width: 100%; height: auto;" controls><source src="'+link_url+'" type="video/mp4" ></video >');
      }else if(file_type == 'mp3'){
        if(link_url == '')
        $('#media_play').append('<audio  style="width: 100%; " controls><source src="<?= base_url(); ?>'+file_url+'" id="file_previw" type="audio/mp3" ></audio >');
        else
        $('#media_play').append('<audio  style="width: 100%; " controls><source src="'+link_url+'" id="file_previw" type="audio/mp3" ></audio >');
      }

    })


  $('#portfolioModal1').on('hidden.bs.modal', function (e) {
    $('#media_play').empty();
  });



  </script>

