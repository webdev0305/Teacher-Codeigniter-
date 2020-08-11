 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bookshelfs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">bookshelfs</li>
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
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Bookshelfs</small></h3>
              </div>
              
              <div style="margin: 20px;">

                <button type="button" class="btn btn-success" style="margin-bottom: 20px;" onclick="new_video();">
                  New Video
                </button>
                <button type="button" class="btn btn-success" style="margin-bottom: 20px;" onclick="new_audio();">
                  New Audio
                </button>

                <table id="data_table" class="table table-bordered table-striped">
                  
                </table>
              </div>
            
            </div>
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- modal -->
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="edit-modal-title-v">New Video</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" id="quickForm" action="<?= base_url()?>admin/files/edit_file" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="id" id="file_id">
            <input type="hidden" name="main_cate" value="books">
              <div>

                <div class=" text-center">
                  
                  <div class="custom-file">
                    <!-- <audio  width="400" controls>
                      <source src="" id="file_previw" type="audio/mp3">
                    </audio > -->
                    
                       
                  </div>
                  <button type="button" class="btn btn-sm btn-primary" id="upload" style="margin: 20px;">File Upload</button>
                  <input type="file" name="file_url" id="file_upload" style="opacity:0; position: absolute;" onchange="readURL(this)" accept="Audio/*">
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2" style="text-align: right;">Link URL</label>
                <div class="col-md-8">
                  <input type="text" name="link_url" class="form-control" id="video_url" placeholder="Enter here" value="" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2" style="text-align: right;">Title</label>
                <div class="col-md-8">
                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter here" value="" >
                </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-2" style="text-align: right;">Category</label>
                  <div class="col-md-8">
                    <select class="form-control select2" style="width: 100%;" name="category_id" id="category_id" required>
                      <?php foreach($category as $key => $item){?>
                        <option value="<?= $item['id']?>" ><?= $item['title']?></option>
                      <?php }?>
                    </select>
                  </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
      </div>
      <!-- /.modal-content -->
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
        <form role="form" action="<?= base_url()?>admin/files/delete_file" method="POST" >
          <div class="modal-body">
            <h2>Are You Sure Delete?</h2>
            <input type="hidden" name="main_cate" value="books">
            <input type="hidden" name="id" id="file_id_del">
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

    var table = $('#data_table');
$(document).ready(function(){
    table.dataTable({

        "ajax": { // define ajax settings
              "url": "<?= base_url()?>admin/files/getData", // ajax URL
              "type": "POST", // request type
              "timeout": 20000,
              "data": function(data) { // add request parameters before submit
                 data.main_cate = 'books';
                 return data;
              },
            },
        
        "columnDefs": [{  // set default column settings
            'orderable': false,
            'targets': [0]
          },{  // set default column settings
            'orderable': false,
            'targets': [1],
          },{  // set default column settings
            'orderable': false,
            'targets': [4],
          }
          ],
        "columns": [
            { title:'#', data: 'index', width:'5%'},
            
            { title:'Media', data: 'file_url',width:'15%',
              render: function (data, type, row) {
                if(row.file_type=='mp3')
                  return '<img src="<?= base_url()?>assets/img/images.jpg" style="width:30px;">';
                else if(row.file_type=='mp4'){
                    if(row.link_url != ''){
                      return '<video width="70" ><source src="'+row.link_url+'" type="video/mp4"></video>';
                    }else {
                      return '<video width="70" ><source src="<?= base_url()?>'+data+'" type="video/mp4"></video>';
                    }
                  }
                }
            },
            { title:'Title', data: 'title', width:'40%'},
            { title:'Category', data: 'category_id',
                render: function (data, type, row) {
                  <?php foreach($category as $key => $item){?>
                    if (data == <?= $item['id']?>)
                      var category = '<?= $item['title']?>';
                  <?php }?>
                  
                  return category;
                  
                }

             },
            { title:'Action', data: 'id', width:'15%', 
              render: function (data, type, row) {
                  return '<button class="btn btn-success btn-sm" id="edit">Edit</button><button class="btn btn-warning btn-sm" style="margin-left:20px;" id="delete">Delete</button>';
                  
                }
            }
        ],
        "paging": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, "asc"]
        ], // set first column as a default sort by asc
       
        "lengthMenu": [
            [5, 10, 20, -1],
            [5, 10, 20, "All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 10,
    });


  $('#data_table tbody').on('click', 'button[id="edit"]', function () {
      var data = table.fnGetData($($(this).parent().parent()));
      if(data.file_type == 'mp4'){
        $('.edit-modal-title').html('Edit Video');
        $('.custom-file').empty();
        if(data.link_url != ''){
          $('.custom-file').append(' <video  width="400" controls><source src="'+data.link_url+'" id="file_previw" type="video/mp4"></video >');
        }else{
          $('.custom-file').append(' <video  width="400" controls><source src="<?= base_url()?>'+data.file_url+'" id="file_previw" type="video/mp4"></video >');
        }
                
      } else if(data.file_type == 'mp3'){
        $('.edit-modal-title').html('Edit Audio');
        $('.custom-file').empty();
        if(data.link_url != ''){
          $('.custom-file').append(' <audio  width="400" controls><source src="'+data.link_url+'" id="file_previw" type="audio/mp3"></audio >');
        }else{
          $('.custom-file').append(' <audio  width="400" controls><source src="<?= base_url()?>'+data.file_url+'" id="file_previw" type="audio/mp3"></audio >');
        }
        
      }
      $('#file_previw').parent()[0].load();
      $('#file_id').val(data.id);
      $('#video_url').val(data.link_url);
      $('#file_upload').removeAttr('required');
      $('#title').val(data.title);
      $('#category_id').val(data.category_id).trigger('change');
      $('#modal-lg').modal('show');
  });

  $('#data_table tbody').on('click', 'button[id="delete"]', function () {
    var data = table.fnGetData($($(this).parent().parent()));
    $('#file_id_del').val(data.id);
    $('#modal-warning').modal('show');
  })


})

  $('.select2').select2();

  $('#upload').click(function(){
     $('#file_upload').click();
  });

  $(document).on("change", "#file_upload", function(evt) {
    var $source = $('#file_previw');
    $source[0].src = URL.createObjectURL(this.files[0]);
    $source.parent()[0].load();
  });

  function new_video(){
    $('.edit-modal-title').html('New Video');
    $('#file_id').val('');
    $('.custom-file').empty();
    $('.custom-file').append(' <video  width="400" controls><source src="" id="file_previw" type="video/mp4"></video >');
    $('#file_upload').val('');
    $('#video_url').val('');
    $('#file_upload').attr('accept','video/*');
    $('#title').val('');
    $('#category_id').val('-1').trigger('change');
    $('#modal-lg').modal('show');
  }

  function new_audio(){
    $('.edit-modal-title').html('New Audio');
    $('#file_id').val('');
    $('.custom-file').empty();
    $('.custom-file').append(' <audio  width="400" controls><source src="" id="file_previw" type="audio/mp3"></audio >');
    $('#video_url').val('');
    $('#file_upload').attr('accept','audio/*');
    $('#file_upload').val('');
    $('#title').val('');
    $('#category_id').val('-1').trigger('change');
    $('#modal-lg').modal('show');
  }

 

    
  </script>

