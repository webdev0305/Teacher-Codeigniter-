 <style>
   #pagination a{
    padding: 5px;
   }
 </style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Messages</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">message</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


     <section class="content">
          <div class="row">
            
            <!-- /.col -->
            <div class="col-md-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Inbox</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <form id="search_form" action="<?=base_url()?>admin/message" method="post">
                      <input type="text" class="form-control" placeholder="Search Mail" id="search" name="search" value="<?= $search?>">
                      </form>
                      <div class="input-group-append">
                        <div class="btn btn-primary" onclick="search_message();">
                          <i class="fas fa-search"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                    </button>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-sm" onclick="message_delete();"><i class="far fa-trash-alt"></i></button>
                      
                    </div>
                   
                    
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                      <?php foreach($message as $key => $item){?>
                      <tr>
                        <td>
                          <div class="icheck-primary">
                            <input type="checkbox" value="<?= $item['id']?>" id="check<?= $item['id']?>">
                            <label for="check<?= $item['id']?>"></label>
                          </div>
                        </td>
                        <td id="message_content" style="display: none;"><?= $item['content']?></td>
                        <td id="email_address" style="display: none;"><?= $item['email']?></td>
                        <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                        <td class="mailbox-name" style="width: 30%;"><a href="#"><?= $item['name']?></a></td>
                        
                        <td class="mailbox-subject"><?= strlen($item['content'])>50? substr($item['content'],0,50):$item['content']?>
                        </td>
                        <td class="mailbox-attachment"></td>
                        <td class="mailbox-date" style="width: 20%;"><?= $item['created_at']?></td>
                      </tr>
                      <?php }?>
                      </tbody>
                    </table>
                    
                  </div>

                </div>
              <!-- /.card -->
                <div class="row">
                  <div class="col-sm-6">
                    
                  </div>
                  <div class="col-sm-6" id="pagination">
                     <?php echo $links; ?> 
                  </div>
                </div>                          
            </div>
           
            <!-- /.col -->
          </div>
          <!-- /.row -->
    </section>
 </div>

 <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="edit-modal-title">Read Mail</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
            <div class="card card-primary card-outline">
              <div class="card-body p-0">
                <div class="mailbox-read-info">
                  <h5 id="customer_name"></h5>
                  <h6 id="customer_email"></h6>
                </div>
                <!-- /.mailbox-read-info -->
                <div class="mailbox-controls with-border text-center">
                  
                </div>
                <!-- /.mailbox-controls -->
                <div class="mailbox-read-message">
                  
                </div>
                <!-- /.mailbox-read-message -->
              </div>
            </div>
        </div>
      <!-- /.modal-content -->
      </div>
    </div>
    <!-- /.modal-dialog -->
  </div>


  <div class="modal fade" id="modal-warning">
    <div class="modal-dialog">
      <div class="modal-content bg-warning">
        <div class="modal-header">
          <h4 class="modal-title">Warning</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" action="<?= base_url()?>admin/message/delete_message" method="POST" >
          <div class="modal-body">
            <h2>Are You Sure Delete?</h2>
            
            <input type="hidden" name="ids" id="message_id_del">
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-dark">Delete</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<script>
  $('.mailbox-name').click(function(){
    var text = $(this).closest('tr').find('#message_content').html();
    var name = $(this).children().html();
    var time = $(this).closest('tr').find('.mailbox-date').html();
    var email = $(this).closest('tr').find('#email_address').html();
    $('#customer_name').html(name);
    $('#customer_email').html('From:'+email+'<span class="mailbox-read-time float-right">'+time+'</span>');
    $('.mailbox-read-message').empty();
    $('.mailbox-read-message').html(text);
    $('#modal-lg').modal('show');
  })

  function message_delete()
  {
    var ids = '';
    $('input[type="checkbox"]').each(function(){
      
      if($(this).prop('checked')==true){
        if(ids == '')
          ids = $(this).val();
        else
          ids = ids+','+$(this).val();
      }
    })

    $('#message_id_del').val(ids);
    $('#modal-warning').modal('show');

  }
  $(document).ready(function(){
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })
  })


  function search_message(){
      $('#search_form').submit();
  }
</script>
