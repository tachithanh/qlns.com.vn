<?php

    session_start();
    if(!isset($_SESSION['customer_email'])){
        echo "<script>window.open('../checkout.php',_self')</script>";
    }else{
    include("includes/db.php");
    include("functions/functions.php");
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Paper CSS -->
    <link rel="stylesheet" href="styles/paper.css" type="text/css" />
   
    <!-- Block title - Đục lỗ trên giao diện bố cục chung, đặt tên là `title` -->
    <title>Hoá Đơn Của Bạn</title>
    <!-- End block title -->

    <!-- Định khổ giấy: A5, A4 or A3 -->
    <style>
        @page {
            size: A4
        }
        
    </style>
</head>

<body class="A4">


    <section class="sheet padding-10mm">
        <!-- Thông tin Cửa hàng -->
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center"><img src="../images/logo.svg" alt="M-dev-Store Logo" width="175px"  /></td>
                    
                </tr>
                <tr>
                <td align="center">
                     
                        <small><i>Cung cấp các mẫu quần áo thời trang, phong cách</i></small><br />
                        <small><i>Giúp các bạn có sự thoải mái, tự tin hơn khi diện những mẫu quần áo của chúng tôi</i></small>
                    </td>
                    </tr>
                    <tr>
                    <td align="center">
                    <p><b style="font-size: 2em;">Đơn Hàng Của Bạn</b><br>
                     Số hoá đơn:<i><b>
                    <?php
                   
                    $get_order = "select * from customer_orders where order_id = '$order_id'";
                    $run_order = mysqli_query($con,$get_order);
                
                    while($row_order=mysqli_fetch_array($run_order)){
                    $order = $row_order['customer_id'];
                    $date = $row_order['order_date'];
                    $invoice = $row_order['invoice_no'];
                    }
                    echo $invoice; ?> </b></i></p> 
                    </td>

               
                
            </tbody>
        </table>
   
        <!-- Thông tin đơn hàng -->
        <p><i><u><b>Thông tin khách hàng</b></u></i></p>
            <?php
                $or = $order_id;
                $get_order = "select * from customer_orders where order_id = '$order_id'";
                $run_order = mysqli_query($con,$get_order);
                
                while($row_order=mysqli_fetch_array($run_order)){
                    $order = $row_order['customer_id'];
                    $date = $row_order['order_date'];
                    $invoice = $row_order['invoice_no'];
                    
                    $get_orders = "select * from  customers where customer_id = '$order'";
                    $run_check = mysqli_query($con,$get_orders);
                    $row_check = mysqli_fetch_array($run_check);
                    $customer_id = $row_check['customer_id'];
                    $name = $row_check['customer_name'];
                    $sdt = $row_check['customer_contact'];
                    $dc1 = $row_check['customer_address'];
                    $dc2 = $row_check['customer_city'];
                    $dc3 = $row_check['customer_country'];
                    $mail = $row_check['customer_email'];
                    $image = $row_check['customer_image'];
                }
            ?>
            <div class="kh">
                <div class="kh2">
                    <td> <img src="../customer/customer_images/<?php echo $image; ?>" width="132" height="152" ></td>
                </div>
                <div class="kh1">
                    <p><b>Họ và tên:</b> <?php echo $name; ?></p>
                    <p><b>Số điện thoại:</b> <?php echo $sdt; ?></p>
                    <p><b>Địa chỉ:</b> <?php echo $dc1; ?>, <?php echo $dc2; ?>, <?php echo $dc3; ?></p>
                    <p><b>Email:</b> <?php echo $mail; ?></p>
                    <p><b>Ngày mua:</b> <?php echo $date; ?></p>
                </div>
            </div>
            
          
        <!-- Thông tin sản phẩm -->
        <p><i><u><b>Chi tiết đơn hàng</b></u></i></p>
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
                
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Kích thước</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $in =  $invoice;
                $idd = $customer_id;
                $tong_t = 0;
                $stt = 1;
                
                    $get_orders = "select * from customer_orders where customer_id = '$idd' AND invoice_no = '$in'";
                    $run_check = mysqli_query($con,$get_orders);
                    while($row_check = mysqli_fetch_array($run_check)){
                        $product = $row_check['product_id'];
                        $gia = $row_check['due_amount'];
                        $gia_format = number_format($gia, 0, ',', '.');
                        $id = $row_check['order_id'];
                        $qty = $row_check['qty'];
                        $size = $row_check['size'];
                        $amount = $row_check['due_amount'];
                        $order_status = $row_check['order_status'];
                       
                    $get_pro = "select * from products where product_id='$product'";
                    $run_pro = mysqli_query($con,$get_pro);
                    $row_pro = mysqli_fetch_array($run_pro);
                    $title = $row_pro['product_title'];
                   
                        
                        $total = $amount*$qty;
                        $total_format = number_format($total, 0, ',', '.');
                        $_SESSION['qty'] = $qty;
                        $tong_t += $total;
                        $tong_format = number_format($tong_t, 0, ',', '.');
                    ?>
                <tr>
                    <td align="center"><?= $stt; ?></td>
                    
                    <td> <?php echo $title; ?>  </td>
                    <td> <?php echo $qty; ?> </td>
                    <td> <?php echo $size; ?> </td>
                    <td> <?php echo $gia_format; ?> VNĐ</td>
                    <td>
                        <?php
                            
                            echo $total_format; 
                           
                        ?> VNĐ

                    </td> 
                   
                    
                </tr>
                <?php $stt++; ?>
              <?php } ?>
               
            </tbody>
            <tfoot>
                <td colspan="5" align="right"><b>Phí vận chuyển</b></td>
                    <td align="right"><b>
                    <?php
                    
                    $get_e_order = "select * from customer_orders where order_id='$order_id'";
              
                    $run_e_order = mysqli_query($con,$get_e_order);
                    
                    $row_e_order = mysqli_fetch_array($run_e_order);
                    $price_ship1 = $row_e_order['ship'];
                    $price_format1 = number_format($price_ship1, 0, ',', '.');
                    echo $price_format1;
                    ?> VNĐ
                    </b></td> 
                <tr>
                    <td colspan="5" align="right"><b>Tổng thành tiền</b></td>
                    <td align="right"><b>
                    <?php
                    $a1 = $tong_t;
                    $get_d_order = "select * from customer_orders where order_id='$order_id' AND invoice_no = '$in' ";
              
                    $run_d_order = mysqli_query($con,$get_d_order);
                    
                    $row_d_order = mysqli_fetch_array($run_d_order);
                    $price_ship = $row_d_order['ship'];
                    $tong_t1 = $a1+$price_ship;
                    $tong_format1 = number_format($tong_t1, 0, ',', '.');
                    echo $tong_format1;
                    ?> VNĐ
                    </b></td> 
                </tr>
            </tfoot>
           
        </table>
                        
        <!-- Thông tin Footer -->
        <br />
      <b>Trạng thái đơn hàng:</b> <i><td>
                 <?php 
                    $ab = 'Done';
                    $bc = 'Complete';
                    $cd = 'danggiao';
                    $de = 'pending';
                    $ef = 'dagiao';
                    $il = 'khachhuy';
                    $li = 'huy';
                  
                     if($order_status == $de or $order_status == $bc ) : ?>
                    <!-- Đơn hàng nào đã thanh toán rồi thì không cho phép Xóa, Sửa (không hiển thị 2 nút này ra giao diện) 
                    - Cho phép IN ấn ra giấy
                    -->
                    <!-- Nút in, bấm vào sẽ hiển thị mẫu in thông tin dựa vào khóa chính `dh_ma` -->
                    <a href="huydon.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Huỷ đơn hàng </a><br>
                    <p>(Bạn sẽ không thể huỷ đơn nếu đơn hàng đã trong trạng thái đang giao!) </p>
                    <?php elseif($order_status == $ab) : ?>
                        <a target="_blank" class="btn btn-primary btn-sm" > Đơn hàng thành công </a>
                    <?php elseif($order_status ==  $il) : ?>
                        <a target="_blank" class="btn btn-primary btn-sm" > Bạn đã huỷ đơn hàng </a>
                    <?php elseif($order_status == $ef) : ?>
                        <a target="_blank" class="btn btn-primary btn-sm" > Xin vui lòng xác nhận thanh toán </a>
                    <?php elseif($order_status ==  $li) : ?>
                        <a target="_blank" class="btn btn-primary btn-sm" > Cửa hàng đã huỷ đơn hàng </a>
                        <br> <p><i>(Xin cảm ơn và chân thành xin lỗi vì sự bất tiện này!)</i></p>
                    <?php elseif($order_status ==  $cd) : ?>
                        <a target="_blank" class="btn btn-primary btn-sm" > Đang giao hàng </a>
                       
                    <?php else: ?>
                        <a target="_blank" class="btn btn-primary btn-sm" > Vui lòng chờ xác nhận </a>
                   
                    <?php endif; ?>
       </td></i>
    </section>
    <!-- End block content -->
</body>

</html>
>
<?php } ?>