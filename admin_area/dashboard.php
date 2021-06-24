
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
                        <div class="huge"> <?php echo $count_products; ?> </div>
                            <div> Nhân viên </div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_products">
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
                        <div class="huge"> <?php echo $count_customers; ?> </div>
                            <div> Phòng ban </div>
                        
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
        <div class="panel panel-orange">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_p_categories; ?> </div>
                            <div> Chức vụ </div>
                        
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
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_pending_orders; ?> </div>
                            <div> Chuyên môn </div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_orders">
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
                    <table class="table table-hover table-striped table-bordered">
                    <thread>
                            <tr>
                                
                                <th> STT </th>
                                <th> Email khách hàng </th>
                                <th> Mã đơn hàng  </th>
                                <th> Trạng thái </th>
                                <th> Xem đơn hàng </td>
                                
                            </tr>
                        </thread>
                        <tbody>
                        <?php 
          
          $i=0;
          $ab = 'Thành công';
          $get_orders = "select * from orders";
          
          $run_orders = mysqli_query($con,$get_orders);

          while($row_order=mysqli_fetch_array($run_orders)){
              
            
              $email = $row_order['customer_email'];
              $madon = $row_order['invoice_no'];
              $order_id = $row_order['order_id'];
              $get_c_order = "select * from customer_orders where order_id='$order_id'";
              
              $run_c_order = mysqli_query($con,$get_c_order);
              
              $row_c_order = mysqli_fetch_array($run_c_order);
              
              $order_date = $row_c_order['order_date'];
              $order_status = $row_c_order['order_status'];
              
              $order_amount = $row_c_order['due_amount'];
              $product_price_format = number_format($order_amount, 0, ',', '.');
              
              
              
              $i++;
         
      
      ?>

                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $email; ?> </td>
                                <td> <?php echo $madon; ?></td>
                                
                                <td>  
                                
                                    <?php
                                        if($order_status=='pending'){
                                            echo $order_status='Đang xử lý';
                                        }else if($order_status=='Complete'){
                                            echo $order_status='Đang giao';
                                        }else if($order_status=='huy'){
                                            echo $order_status='Đã huỷ';
                                        }else{
                                            echo $order_status='Thành công';
                                        }
                                    ?>
                                
                                </td>
                                <td>
                                    <a href="index.php?view_ord=<?php echo $order_id; ?>" class="btn btn-success">
                                            Xem đơn hàng
                                        </a>
                                    </td>
                                
                                
                            </tr>
                            <?php 
                         }
                        
                        ?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?view_orders">
                    Xem tất cả các đơn hàng <i class="fa fa-arrow-circle-right"></i>
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