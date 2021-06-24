
<center>

<h1> Đơn Hàng Của Tôi</h1>
<p class="lead"> Tất cả đơn hàng của bạn</p>
<p class="text-muted">
Nếu bạn có bất kỳ câu hỏi nào, vui lòng <a href="../contact.php">liên hệ với chúng tôi</a>. Dịch vụ khách hàng của chúng tôi làm việc <strong>24/7</strong>
</p>

</center>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
               
                <th> STT </th>
                
                <th> Số hoá đơn </th>
                
                <th> Trạng thái </th>
                <th>Xem đơn hàng</th>
                <th> Xác nhận </th>
                <th>Xem hoá đơn</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $customer_session = $_SESSION['customer_email'];
                $get_customer = "select * from customers where customer_email='$customer_session'";
                $run_customer = mysqli_query($con,$get_customer);
                $row_customer = mysqli_fetch_array($run_customer);
                $customer_id = $row_customer['customer_id'];
                $get_orders = "select * from orders where customer_id='$customer_id' order by 1 DESC";
                $run_orders = mysqli_query($con,$get_orders);
                $i = 0;
                
                while($row_orders = mysqli_fetch_array($run_orders)){
                    $order_id = $row_orders['order_id'];
                    
                    $invoice_no = $row_orders['invoice_no'];
                    
                    $get_c_order = "select * from customer_orders where order_id='$order_id'";
              
                    $run_c_order = mysqli_query($con,$get_c_order);
                    
                    $row_c_order = mysqli_fetch_array($run_c_order);
                    
                    $order_date = $row_c_order['order_date'];
                    $order_status = $row_c_order['order_status'];
                    $i++;
                   
                   
                   
                    if($order_status=='pending'){
                        $order_status='Đang xử lý';
                    }else if($order_status=='Complete'){
                        $order_status='Đã xác nhận';
                    }else if($order_status=='huy'){
                        $order_status='Shop đã huỷ đơn';
                    }else if($order_status=='danggiao'){
                        $order_status='Đang giao hàng';
                    }else if($order_status=='dagiao'){
                        $order_status='Đã giao hàng';
                    }else if($order_status=='khachhuy'){
                        $order_status='Bạn đã huỷ đơn';
                    }else{
                        $order_status='Thành công';
                    }
                            
                   
               
            ?>
            <tr>
                 
                <th> <?php echo $i; ?> </th>
               
                <td> <?php echo  $invoice_no; ?> </td>
                
                <td> <?php echo $order_status; ?> </td>

                <td>
                <a href="orders.php?order_id=<?php echo $order_id; ?>" class="btn btn-primary btn-sm">
                        Xem đơn hàng
                    </a>
                </td>
                <td>
                                
                <!-- Đơn hàng nào chưa thanh toán thì được phép phép Xóa, Sửa -->
                <?php 
                $ab= 'Thành công';
                $bc = 'Đang giao hàng';
                $ef= 'Đã giao hàng';
                $cd = 'Đang xử lý';
                $de = 'Đã huỷ';
                $fg = 'Bạn đã huỷ đơn';
                  
                if($order_status == $ef) : ?>
                    <!-- Đơn hàng nào đã thanh toán rồi thì không cho phép Xóa, Sửa (không hiển thị 2 nút này ra giao diện) 
                    - Cho phép IN ấn ra giấy
                    -->
                    <!-- Nút in, bấm vào sẽ hiển thị mẫu in thông tin dựa vào khóa chính `dh_ma` -->
                    <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Xác nhận thanh toán </a>
                    <?php elseif($order_status == $ab) : ?>
                        <a target="_blank" class="btn btn-primary btn-sm" id="daxn"> Bạn đã xác nhận </a>
                    <?php else: ?>
                        <a target="_blank" class="btn btn-primary btn-sm" id="xacnhan"> Xác nhận thanh toán </a>
                   
                    <?php endif; ?>
            </td>
                    <td>
                    <?php 
               
                if ($order_status == $ab) : ?>
                    <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `dh_ma` -->
                    <a href="print.php?order_id=<?php echo $order_id; ?>" class="btn btn-success" id ="xem" >
                        Xem hoá đơn
                    </a>
    
                    
                <?php else: ?>
                    <a class="btn btn-success" id='ino'>
                    Xem hoá đơn
                    </a>
                    <?php endif; ?>
                    </td>
                    
            </tr>
            <?php
                }
            ?>
           
        </tbody>
        
    </table>
    
</div>
