 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shortcuts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">shortcuts</li>
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
                <h3 class="card-title">Shortcuts Edit</small></h3>
              </div>
              
              <div style="margin: 20px;">

                <button type="button" class="btn btn-success" style="margin-bottom: 20px;" onclick="new_shortcut();">
                  New Shortcut
                </button>

                <table id="shortcut_table" class="table table-bordered table-striped">
                  
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
          <h4 class="edit-modal-title">New Shortcut</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" id="quickForm" action="<?= base_url()?>admin/shortcut/edit_shortcut" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="id" id="shortcut_id">
              <div>
                <div class=" text-center">
                  <img src="" id="avatar_previw" alt="" class="img-fluid" style="width: 400px;height: auto;">
                  <br>
                  <button type="button" class="btn btn-sm btn-primary" id="upload" style="margin: 10px;">Image Upload</button>
                  <input type="file" name="picture" id="file_upload" style="opacity:0; position: absolute;" onchange="readURL(this)" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2" style="text-align: right;">Title</label>
                <div class="col-md-8">
                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter here" value="" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2" style="text-align: right;">Link URL</label>
                <div class="col-md-8">
                  <input type="text" name="link_url" class="form-control" id="link_url" placeholder="Enter here" value="" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2" style="text-align: right;">Description</label>
                <div class="col-md-8">
                  <textarea class="form-control " rows="3" name="description" id="description" placeholder="Enter ..."></textarea>
                </div>
                
              </div>
              <div class="row">
                <label class="col-md-2" style="text-align: right;">Popup</label>
                <div class="col-md-6">
                  <input type="checkbox" name="popup" checked data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Yes" data-off-text="No" id="popup">
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
        <form role="form" action="<?= base_url()?>admin/shortcut/delete_shortcut" method="POST" >
          <div class="modal-body">
            <h2>Are You Sure Delete?</h2>
            <input type="hidden" name="id" id="shortcut_id_del">
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

    var table = $('#shortcut_table');
$(document).ready(function(){
    table.dataTable({

        "ajax": { // define ajax settings
              "url": "<?= base_url()?>admin/shortcut/getData", // ajax URL
              "type": "POST", // request type
              "timeout": 20000,
              "data": function(data) { // add request parameters before submit
                  // $.each(ajaxParams, function(key, value) {
                  //     data[key] = value;
                  // });
              },
            },
        
        "columnDefs": [{  // set default column settings
            'orderable': false,
            'targets': [0]
          },{  // set default column settings
            'orderable': false,
            'targets': [4],
          },{  // set default column settings
            'orderable': false,
            'targets': [6],
          }
          ],
        "columns": [
            { title:'#', data: 'index', width:'5%'},
            { title:'title', data: 'title' },
            { title:'URl',data: 'link_url' },
            { title:'Description', data: 'description',
              render: function (data, type, row) {
                var des = data.substr(0,50);
                if(data.length > 50 )
                  return ''+des+'...';
                else 
                  return data;
                }
            },
            { title:'Image', data: 'picture',width:'5%',
              render: function (data, type, row) {
                  return '<img src="<?= base_url()?>'+data+'" style="width:50px;"> '
                }
            },
            { title:'Popup', data: 'popup',width:'5%',
              render: function (data, type, row) {
                  if(data == 1) 
                    return '<span class="btn btn-success btn-sm" style="">Yes</span>';
                  else 
                    return '<span class="btn btn-danger btn-sm" style="">No</span>';
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


  $('#shortcut_table tbody').on('click', 'button[id="edit"]', function () {
      var data = table.fnGetData($($(this).parent().parent()));
      $('.edit-modal-title').html('Edit Shortcut');
      $('#shortcut_id').val(data.id);
      $('#avatar_previw').attr('src', '<?= base_url()?>'+data.picture);
      $('#file_upload').removeAttr('required');
      $('#title').val(data.title);
      $('#description').val(data.description);
      $('#link_url').val(data.link_url);
      if(data.popup == 1)
        $('#popup').bootstrapSwitch('state',true);
      else 
        $('#popup').bootstrapSwitch('state',false);
      $('#modal-lg').modal('show');
  });

  $('#shortcut_table tbody').on('click', 'button[id="delete"]', function () {
    var data = table.fnGetData($($(this).parent().parent()));
    $('#shortcut_id_del').val(data.id);
    $('#modal-warning').modal('show');
  })


})


  $('#upload').click(function(){
     $('#file_upload').click();
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

  $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });

  function new_shortcut(){
    $('.edit-modal-title').html('New Shortcut');
    $('#shortcut_id').val('');
    $('#avatar_previw').attr('src', '');
    $('#file_upload').val('');
    $('#title').val('');
    $('#description').val('');
    $('#link_url').val('');
    $('#popup').bootstrapSwitch('state',true);
    $('#modal-lg').modal('show');
  }

 

    
  </script>

