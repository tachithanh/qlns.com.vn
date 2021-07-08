
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Điểm danh
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Điểm danh</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Thêm mới</a>
            </div> -->
            <div class="box-header with-border"></div>
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Thêm mới</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead><br>
                  <th>STT</th>
                  <th>Ngày</th>
                  <th>Mã Nhân Viên</th>
                  <th>Họ Tên</th>
                  <th>Giờ vào ca</th>
                  <th>Giờ tan ca</th>
                  <th scope="col" colspan="2">Tùy chọn</th>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>Jun 30, 2021</td>
                  <td>ABC123456789</td>
                  <td>Bảo Minh</td>
                  <td>09:00 AM</td>
                  <td>05:00 PM</td>
                  <td>
                  <a href="#edit" data-toggle="modal" class='btn btn-success btn-sm btn-flat edit'><i class='fa fa-edit'></i> Edit</a>     
                  </td>
                  <td>
                    <button class='btn btn-danger btn-sm btn-flat delete'><i class='fa fa-trash'></i> Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Jun 30, 2021</td>
                  <td>ABC1234564545</td>
                  <td>Chí Thanh</td>
                  <td>09:00 AM</td>
                  <td>05:00 PM</td>
                  <td>
                  <a href="#edit" data-toggle="modal" class='btn btn-success btn-sm btn-flat edit'><i class='fa fa-edit'></i> Edit</a>     
                  </td>
                  <td>
                    <button class='btn btn-danger btn-sm btn-flat delete'><i class='fa fa-trash'></i> Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Jun 30, 2021</td>
                  <td>ABC12345777</td>
                  <td>Cẩm Tiên</td>
                  <td>09:00 AM</td>
                  <td>05:00 PM</td>
                  <td>
                  <a href="#edit" data-toggle="modal" class='btn btn-success btn-sm btn-flat edit'><i class='fa fa-edit'></i> Edit</a>     
                  </td>
                  <td>
                    <button class='btn btn-danger btn-sm btn-flat delete'><i class='fa fa-trash'></i> Delete</button>
                  </td>
                </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
</div>

<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Tạo điểm danh</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="attendance_add.php">
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Mã Nhân Viên</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="employee" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Ngày</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="date" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="time_in" class="col-sm-3 control-label">Giờ làm việc</label>

                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
                    		<input type="text" class="form-control timepicker" id="time_in" name="time_in">
                    	</div>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="time_out" class="col-sm-3 control-label">Làm Tan Ca</label>

                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
                    		<input type="text" class="form-control timepicker" id="time_out" name="time_out">
                    	</div>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Lưu</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Chỉnh sửa điểm danh</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="attendance_edit.php">
            		<input type="hidden" id="attid" name="id">
                <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">Ngày</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_edit" name="edit_date">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="edit_time_in" class="col-sm-3 control-label">Giờ làm việc</label>

                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
                    		<input type="text" class="form-control timepicker" id="edit_time_in" name="edit_time_in">
                    	</div>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="edit_time_out" class="col-sm-3 control-label">Giờ tan ca</label>

                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
                    		<input type="text" class="form-control timepicker" id="edit_time_out" name="edit_time_out">
                    	</div>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Cập nhật</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- <script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'attendance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#datepicker_edit').val(response.date);
      $('#attendance_date').html(response.date);
      $('#edit_time_in').val(response.time_in);
      $('#edit_time_out').val(response.time_out);
      $('#attid').val(response.attid);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#del_attid').val(response.attid);
      $('#del_employee_name').html(response.firstname+' '+response.lastname);
    }
  });
}
</script> -->
</body>
</html>
