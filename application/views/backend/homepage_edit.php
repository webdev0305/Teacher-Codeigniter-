 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Home Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
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
                <h3 class="card-title">Home page Edit</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" action="<?= base_url()?>admin/setting/edit_homepage" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div>
                    <div class=" text-center">
                      <img src="<?= base_url()?><?= isset($data['teacher_avatar'])?$data['teacher_avatar']:'assets/img/1596721662avatar3.png'?>" id="avatar_previw" alt="" class="img-circle img-fluid" style="width: 128px;height: 128px;">
                      <br>
                      <input type="file" name="teacher_avatar" id="file_upload" style="display: none;" onchange="readURL(this)" >
                      <button type="button" class="btn btn-sm btn-primary" id="upload" style="margin: 10px;">Image Upload</button>
                    </div>

                  </div>
                  <div class="form-group">
                    <label for="Title">Main Title</label>
                    <textarea class="form-control" rows="3" name="title" placeholder="Enter ..." required><?= isset($data['title'])?$data['title']:''?></textarea>
                  </div>
                  <div class="form-group">
                    <label>About text</label>
                    <textarea class="form-control" rows="3" name="about_content" placeholder="Enter ..." required><?= isset($data['about_content'])?$data['about_content']:''?></textarea>
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

  <script type="text/javascript">
$(document).ready(function () {

  $('#upload').click(function(){
     $('#file_upload').click();
  });
  $('.note-insert').prop('style','display:none;');
  $('.note-table').prop('style','display:none;');
  $('.note-fontname').prop('style','display:none;');
  $('.note-color').prop('style','display:none;');

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
    $('#Title').summernote();



</script>