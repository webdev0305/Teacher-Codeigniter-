 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Virtual classroom</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">virtual classroom</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Virtual Classroom page Edit</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" action="<?= base_url()?>admin/setting/edit_virtualpage" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div>
                    <div class=" text-center">
                      <img src="<?= base_url()?><?= isset($data['whiteboard_image'])?$data['whiteboard_image']:''?>" id="avatar_previw" alt="" class="img-fluid" style="width: 400px;height: 350px;">
                      <br>
                      <input type="file" name="whiteboard_image" id="file_upload" style="display: none;" onchange="readURL(this)" >
                      <button type="button" class="btn btn-sm btn-primary" id="upload" style="margin: 10px;">Image Upload</button>
                      <?php if(isset($data['whiteboard_image'])&&$data['whiteboard_image']!=''){?>
                      <button type="button" class="btn btn-sm btn-danger" onclick="delete_image();" style="margin: 10px;">Image Remove</button>
                    <?php }?>
                    </div>

                  </div>
                  <div class="form-group row">
                    <label class="col-md-2" style="text-align: right;">Whiteboard text</label>
                    
                    <div class="col-md-8">
                      <textarea class="form-control" rows="3" name="whiteboard_text" placeholder="Enter ..." required><?= isset($data['whiteboard_text'])?$data['whiteboard_text']:''?></textarea>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-md-2" style="text-align: right;">SELECT TYPE</label>
                    <div class="col-md-6">
                      <input type="checkbox" name="whiteboard_type"  data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="picture" data-off-text="Text" id="popup" <?=isset($data['whiteboard_type'])&&$data['whiteboard_type']=='image'?'checked':''?>>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2" style="text-align: right;">IPAD LINK ULR</label>
                    <div class="col-md-8">
                      <input type="text" name="ipad_link" class="form-control" placeholder="Enter here" value="<?= isset($data['ipad_link'])?$data['ipad_link']:''?>" required>
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2" style="text-align: right;">CALENDAR LINK ULR</label>
                    <div class="col-md-8">
                      <input type="text" name="calendar_link" class="form-control" placeholder="Enter here" value="<?= isset($data['calendar_link'])?$data['calendar_link']:''?>" required>
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2" style="text-align: right;">DESKTOP LINK ULR</label>
                    <div class="col-md-8">
                      <input type="text" name="desktop_link" class="form-control" placeholder="Enter here" value="<?= isset($data['desktop_link'])?$data['desktop_link']:''?>" required>
                    </div>
                    
                  </div>
                 
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<div class="modal fade" id="modal-warning">
    <div class="modal-dialog">
      <div class="modal-content bg-warning">
        <div class="modal-header">
          <h4 class="modal-title">Warning</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" action="<?= base_url()?>admin/setting/delete_image" method="POST" >
          <div class="modal-body">
            <h2>Are You Sure Delete?</h2>
            <input type="hidden" name="id" >
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
   $(document).ready(function () {
     $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
      $('#upload').click(function(){
         $('#file_upload').click();
      });
      $('.note-insert').prop('style','display:none;');
      $('.note-table').prop('style','display:none;');
      $('.note-view').prop('style','display:none;');
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#avatar_previw').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('textarea').summernote();

    function delete_image(){
      $('#modal-warning').modal('show');
    }
  </script>

