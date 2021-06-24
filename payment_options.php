<div class="box">
<?php
    $session_email = $_SESSION['customer_email'];
    $select_customer = "select * from customers where customer_email='$session_email'";
    $run_customer = mysqli_query($con,$select_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];
?>
    <h1 class="text-center"> Tùy chọn thanh toán cho bạn </h1>
    <p class="lead text-center">
        <a href="order.php?c_id=<?php echo $customer_id ?>"> Thanh toán khi nhận hàng </a>
    </p>
    <p class="lead text-center">
   
    </center>
    
    <center>
        <p class="lead">
            <a href="#">
               
                <img class="img-responsive" src="images/dich-vu-xe-om-dua-ruoc-mua-hang-ho-giao-hang-tan-noi.jpg" alt="img-payall" width="600">
            </a>
        </p>
    </center>
</div>