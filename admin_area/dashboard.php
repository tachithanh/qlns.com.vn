
<?php 

    
if(!isset($_SESSION['admin_email'])){
    
    echo "<script>window.open('login.php','_self')</script>";
    
}else{

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Bảng điều khiển </h1>
        <ol class="breadcrumb">
            <li class="active">
            
                <i class="fa fa-dashboard"></i> Bảng điều khiển
            
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_cus; ?> </div>
                            <div> Nhân viên </div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_customers">
                <div class="panel-footer">
                    <span class="pull-left"> 
                         Xem chi tiết
                    </span>
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_pb; ?> </div>
                            <div> Phòng ban </div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_p_cats">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_cv; ?> </div>
                            <div> Chức vụ </div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_cats">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_cm; ?> </div>
                            <div> Chuyên môn </div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_slides">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Đơn hàng mới
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                        <thread>
                            <tr>
                                <th> STT </th>
                                <th> Tên nhân viên </th>
                                <th> Hình ảnh </th>
                                <th> Email </th>
                                <th>Phòng ban</th>
                                <th> Chức vụ </th>
                                <th>Chuyên môn</th>
                                
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                                $i=0;
                                $get_c = "select * from customers";
                                $run_c = mysqli_query($con,$get_c);
                                while($row_c=mysqli_fetch_array($run_c)){
                                    $c_id = $row_c['customer_id'];
                                    $c_name = $row_c['customer_name'];
                                    $c_image = $row_c['customer_image'];
                                    $c_email = $row_c['customer_email'];
                                    $c_country = $row_c['customer_phongban'];
                                    $c_city = $row_c['customer_chucvu'];
                                    $c_address = $row_c['customer_address'];
                                    $c_contact = $row_c['customer_contact'];
                                    $c_chuyenmon = $row_c['customer_chuyenmon'];
                                    $i++
                               
                            ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $c_name; ?> </td>
                                <td> <img src="customer_image/<?php echo $c_image; ?>" width="60" height="60" ></td>
                                <td> <?php echo $c_email; ?> </td>
                                <td> <?php echo $c_country; ?> </td>
                                <td> <?php echo $c_city; ?> </td>
                                <td> <?php echo $c_chuyenmon; ?> </td>
                               
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?view_customers">
                    Xem tất cả các nhân viên <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="mb-md thumb-info">
                    <img src="admin_images/<?php echo $admin_image; ?>" alt="admin-thumb-info" class="rounded img-responsive">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>
                        <span class="thumb-info-type"> <?php echo $admin_job; ?> </span>
                    </div>
                </div>
                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i> <span> Email: </span> <?php echo $admin_email; ?> <br/>
                        <i class="fa fa-flag"></i> <span> Quốc gia: </span> <?php echo $admin_country; ?> <br/>
                        <i class="fa fa-envelope"></i> <span> Liên hệ: </span> <?php echo $admin_contact; ?> <br/>
                    </div>
                    <hr class="dotted short" style="margin:10px 0 10px 0;">
                    <h5 class="text-muted"> Mô tả </h5>
                    <p>
                         <?php echo $admin_about; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
}
?>