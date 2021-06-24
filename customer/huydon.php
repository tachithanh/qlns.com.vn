<?php

    session_start();
    if(!isset($_SESSION['customer_email'])){
        echo "<script>window.open('../checkout.php',_self')</script>";
    }else{
    include("includes/db.php");
    include("functions/functions.php");
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $get_a = "select * from customer_orders where order_id = '$order_id'";
        $run_a = mysqli_query($con,$get_a);
        while($row_a=mysqli_fetch_array($run_a)){
        $invoice = $row_a['invoice_no'];
        $order_status = "khachhuy";
        $get_b = "select * from customer_orders where invoice_no='$invoice'";
        $run_b = mysqli_query($con,$get_b);
        while($row_b=mysqli_fetch_array($run_b)){
        $product_id = $row_b['product_id'];
        $qty = $row_b['qty'];
        $qti  = $qty- $qty;
        $get_c = "select * from products where product_id = '$product_id'";
        $run_c = mysqli_query($con,$get_c);
        $row_c=mysqli_fetch_array($run_c);
        $qtyi = $row_c['amount'];
        $soluong_update = $qtyi + $qty;
        $update_sanpham = "update products set amount='$soluong_update' where product_id='$product_id'";
        $run_update_sanpham= mysqli_query($db,$update_sanpham);
        }
        $update_customer_order = "update customer_orders set order_status='$order_status' where invoice_no='$invoice'";
        $row_update_customer_order = mysqli_query($con, $update_customer_order);
        
        $update_sanpham1 = "update pending_orders set qty='$qti' where invoice_no='$invoice'";
        $run_update_sanpham1= mysqli_query($db,$update_sanpham1);
        if ($row_update_customer_order) {
            echo "<script>alert('Bạn đã xác nhận huỷ đơn hàng này')</script>";
            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
        
        }
        
        }
    }
?>
<?php } ?>