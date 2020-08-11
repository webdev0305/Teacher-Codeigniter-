<style>
  .btn-primary
  {
    color:#fff;
    background-color:#99d9ea;
    border-color:#99d9aa
  }
  .btn-primary:hover
  {
    color:#fff;
    background-color:#1abc9c;
    border-color:#88d9aa
  }
</style>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center row" id="page-top" style="background-color: #99d9ea !important;">
    
    <div class="col-md-3">
      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="<?php echo base_url(); ?><?= $data['teacher_avatar']?>" alt=""  style="border-radius: 50%;width: 20rem;float: right;">
    </div>
    <div class="container d-flex align-items-center flex-column col-md-8" style="float: left;">
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0"><?= $data['title']?></h1>
      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Masthead Subheading -->
      <div class="masthead-subheading font-weight-light mb-0">Art - Math - Science - ELA - Religion - Social Studies</div>

    </div>
    <div class="col-md-1"></div>
  </header>
 
  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Shortcuts</h2>

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
        <?php foreach($shortcut as $key => $item){?>
        
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal<?= $item['id']?>">
            <?php if($item['popup'] == 1) {?>
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo base_url(); ?><?php echo $item['picture']?>" alt="">
            <?php } else{?>
            <a href="<?= $item['link_url']?>" target="_blank"><img class="img-fluid" src="<?php echo base_url(); ?><?php echo $item['picture']?>" alt=""></a>
            <?php }?>
          </div>
        </div>
        <?php }?>
        
        
    </div>
  </section>

 <div style="text-align: center;">
    <a href="<?php base_url()?>virtual_class">

      <button class="btn btn-primary" style="margin: 10px;">Go Virtual Classroom</button></a>
  </div>
  
  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about" style="background-color: #99d9ea !important;">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
          <div class="lead"><?= $data['about_content']?></div>
     
      </div>

      <!-- About Section Button -->
      

    </div>
  </section>

  <!-- Contact Section -->
  
<!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Name</label>
                <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Address</label>
                <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Message</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton" >Send</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>
  <!-- Footer -->




 

  <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
  <?php foreach($shortcut as $key => $item){ if($item['popup']==1){?>
  <div class="portfolio-modal modal fade" id="portfolioModal<?= $item['id']?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
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
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"><?= $item['title']?></h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="<?php echo base_url(); ?><?= $item['picture']?>" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5"><?= $item['description']?></p>
                <?php if($item['link_url']!=''){?>
                <a href="<?= $item['link_url']?>" target="_blank"><button class="btn btn-primary" >
                  Open Link
                </button></a>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }}?>


