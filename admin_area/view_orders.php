<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Trang tổng quan / Xem đơn đặt hàng
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> Xem đơn đặt hàng
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thread>
                            <tr>
                                
                                <th> STT </th>
                                <th> Email khách hàng </th>
                                <th> Mã đơn hàng  </th>
                                <th> Trạng thái </th>
                                <th> Xoá bỏ </th>
                                <th> Xem đơn hàng </td>
                                <th> Xem hoá đơn </th>
                                
                            </tr>
                        </thread>
                        <tbody>
                        <?php 
          
          $i=0;
          $ab = 'Thành công';
          $get_orders = "select * from orders order by 1 DESC";
          
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
                                            echo $order_status='Đã xác nhận';
                                        }else if($order_status=='huy'){
                                            echo $order_status='Shop đã huỷ đơn';
                                        }else if($order_status=='danggiao'){
                                            echo $order_status='Đang giao hàng';
                                        }else if($order_status=='dagiao'){
                                            echo $order_status='Đã giao hàng';
                                        }else if($order_status=='khachhuy'){
                                            echo $order_status='Khách hàng huỷ đơn';
                                        }else{
                                            echo $order_status='Thành công';
                                        }
                                    ?>
                                
                                </td>
                                <td> 
                                    <a href="index.php?delete_order=<?php echo $order_id; ?>">
                                        <i class="fa fa-trash-o"></i> Xoá bỏ
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?view_ord=<?php echo $order_id; ?>" class="btn btn-success">
                                            Xem đơn hàng
                                        </a>
                                    </td>
                                
                                <td>
                                
                                    <!-- Đơn hàng nào chưa thanh toán thì được phép phép Xóa, Sửa -->
                                    <?php 
                                    
                                    if ($order_status == $ab) : ?>
                                        <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `dh_ma` -->
                                        <a href="index.php?print=<?php echo $order_id; ?>" class="btn btn-success">
                                            Xem hoá đơn
                                        </a>
                                        
                                    <?php else : ?>
                                        <!-- Đơn hàng nào đã thanh toán rồi thì không cho phép Xóa, Sửa (không hiển thị 2 nút này ra giao diện) 
                                        - Cho phép IN ấn ra giấy
                                        -->
                                        <!-- Nút in, bấm vào sẽ hiển thị mẫu in thông tin dựa vào khóa chính `dh_ma` -->
                                        <p class="btn btn-success" id="in">
                                            Xem hoá đơn
                                        </p>
                                    <?php endif; ?>
                                </td>
                                    
                                
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
    }
?>