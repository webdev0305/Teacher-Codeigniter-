
  <!-- Portfolio Section -->
  <section class="page-section" id="portfolio" style="height: auto;padding: 5rem 0rem 0rem 0rem;">
    
      <div class="show-image" style="position: relative;">
          <img src="<?php echo base_url(); ?>assets/img/Cindys_Virtual_Classroom_2.png" style="width: 100%; height: 100%;" />
          <a href="<?= isset($data['ipad_link'])?$data['ipad_link']:''?>"  target="_blank">
            <button style="position: absolute; width: 7%;height: 14%; top: 58%;left: 63%; opacity: 0;">iPad</button></a>
          <a href="<?= isset($data['calendar_link'])?$data['calendar_link']:''?>"  target="_blank"><button style="position: absolute; width: 11%;height: 12%; top: 19%;left: 16%; opacity: 0;">calendar</button></a>
          <a href="<?= isset($data['desktop_link'])?$data['desktop_link']:''?>"  target="_blank"><button style="position: absolute; width: 6.5%;height: 8%; top: 40%;left: 30%; opacity: 0;">deskTop</button></a>
          <a href="<?= base_url()?>category/1"  target=""><button style="position: absolute; width: 14%;height: 21%; top: 11%;left: 85%; opacity: 0;">TV</button></a>
          <a href="<?= base_url()?>category/2"  target=""><button style="position: absolute; width: 3%;height: 12%; top: 51%;left: 3%; opacity: 0;">MP3</button></a>
          <a href="<?= base_url()?>category/3 "  target=""><button style="position: absolute; width: 12%;height: 50%; top: 36%;left: 87%; opacity: 0;">Bookself</button></a>

          <div style="position: absolute; width: 20%;height: 17%; top: 21%;left: 40%; background-color: white;">
            <?php if($data['whiteboard_type']=='image'&& $data['whiteboard_image']!='') {?>
            <img src="<?php echo base_url(); ?><?= $data['whiteboard_image']?>" style="width: 100%;height: 100%;">
            <?php } else if($data['whiteboard_type']=='text'){?>
              <?= $data['whiteboard_text']?>
            <?php }?>
          </div>
      
    </div>
    
    
  </section>


