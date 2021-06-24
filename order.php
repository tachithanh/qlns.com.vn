<?php

    session_start();
    include("includes/db.php");
    include("functions/functions.php")

?>

<?php

   if(isset($_GET['c_id'])){
       $customer_id = $_GET['c_id'];
   }

   $ip_add = getRealIpUser();
   $status = "pending";
   $invoice_no = mt_rand();
   
   $select_cart = "select * from cart where ip_add='$ip_add'";
   $run_cart = mysqli_query($con,$select_cart);
   while($row_cart = mysqli_fetch_array($run_cart)){
        $pro_id = $row_cart['p_id'];
        $pro_qty= $row_cart['qty'];
        $price_ship = $row_cart['price_ship'];
        $pro_size = $row_cart['size'];
        
        $sub_total = $row_cart['p_price'];

        
        $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,product_id,qty,size,order_date,ship,order_status) values ('$customer_id','$sub_total','$invoice_no','$pro_id','$pro_qty','$pro_size',NOW(),$price_ship,'$status')";
        $run_customer_order = mysqli_query($con,$insert_customer_order);
        $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";
        $run_pending_order = mysqli_query($con,$insert_pending_order);
        $delete_cart = "delete from cart where ip_add='$ip_add'";
        $run_delete = mysqli_query($con,$delete_cart);
        echo "<script>alert('Đơn đặt hàng của bạn đã được gửi, Cảm ơn.')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
   }
  
   $get_cu = "select * from customers where customer_id = '$customer_id'";
   $run_cu = mysqli_query($con,$get_cu);
   $row_cu = mysqli_fetch_array($run_cu);
   $id = $row_cu['customer_id'];
   $name = $row_cu['customer_name'];
   $email = $row_cu['customer_email'];
   $get_cus = "select * from customer_orders where invoice_no = '$invoice_no'";
   $run_cus = mysqli_query($con,$get_cus);
   $row_cus = mysqli_fetch_array($run_cus);
   $order_id = $row_cus['order_id'];
   $insert_customer = "insert into orders (customer_id, customer_name, customer_email, invoice_no,order_id) values ('$id','$name','$email','$invoice_no','$order_id')";
   $run_customer = mysqli_query($con,$insert_customer);

?>
