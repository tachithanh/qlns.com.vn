<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php

        if(isset($_GET['delete_order'])){
            $delete_id = $_GET['delete_order'];
            $get_a = "select * from customer_orders where order_id = '$delete_id'";
            $run_a = mysqli_query($con,$get_a);
            while($row_a=mysqli_fetch_array($run_a)){
            $invoice = $row_a['invoice_no'];
            
            }
            $delete_order = "delete from orders where invoice_no='$invoice'";

            $run_delete = mysqli_query($con,$delete_order);
            if($run_delete){
                echo "<script>alert('Một trong những đơn hàng của khách hàng đã bị xóa bỏ')</script>";
                echo "<script>window.open('index.php?view_orders','_self')</script>";
            }

            $delete_orders = "delete from customer_orders where invoice_no='$invoice'";
          
            $run_deletes = mysqli_query($con,$delete_orders);
            $delete_pending = "delete from pending_orders where invoice_no='$invoice'";
            $run_delete = mysqli_query($con,$delete_pending);

        }

?>

<?php
    }
?>