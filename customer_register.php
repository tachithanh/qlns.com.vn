<?php
     $active='Account';
    include("includes/header.php");

?>

    <div id="content"><!--21-->
        <div class="container"><!--22-->
            <div class="col-md-12"><!--23-->
            
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Đăng Kí
                    </li>
                </ul>
            
            </div><!--23e-->
           
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2> Đăng ký tài khoản mới </h2>
                            
                        </center>
                        <form action="customer_register.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Họ tên </label>
                                <input type="text" class="form-control" name="c_name" required>
                            </div>
                            <div class="form-group">
                                <label>Your Email</label>
                                <input type="text" class="form-control" name="c_email" required>
                            </div>
                            <div class="form-group">
                                <label> Mật khẩu </label>
                                <input type="password" class="form-control" name="c_pass" required>
                            </div>
                            <div class="form-group">
                                <label>Quốc gia</label>
                                <input type="text" class="form-control" name="c_country" required>
                            </div>
                            <div class="form-group">
                                <label>Thành phố</label>
                                <input type="text" class="form-control" name="c_city" required>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="c_contact" required>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="c_address" required>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh của bạn</label>
                                <input type="file" class="form-control form-height-custom" name="c_image" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Đăng Kí
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
         </div><!--22e-->
 </div><!--21e-->


    <?php

         include("includes/footer.php");
    
    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
</body>
</html> 

<?php
    if(isset($_POST['register'])){
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_ip = getRealIpUser();
        move_uploaded_file( $c_image_tmp,"customer/customer_images/$c_image");

        $get_soluong = "select * from customers";
        $run_soluong = mysqli_query($con, $get_soluong);
        while($row_soluong = mysqli_fetch_array($run_soluong)){
        $soluong = $row_soluong['customer_email'];

        
        if ($soluong ==  $c_email) {

            echo "<script>alert('Email đã có người dùng')</script>";

            exit();

        } }

        $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ( '$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
        $run_customer = mysqli_query($con,$insert_customer);
        $sel_cart = "select * from cart where ip_add='$c_ip'";
        $run_cart = mysqli_query($con,$sel_cart);
        $check_cart = mysqli_num_rows($run_cart);
        if($check_cart>0){
            /// If register have items in cart 
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('Bạn đã đăng ký thành công')</script>";
            echo "<script>window.open('checkout.php','_self)</script>";
        }else{
            /// If register without items in cart ///
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('Bạn đã đăng ký thành công')</script>";
            echo "<script>window.open('index.php','_self)</script>";
        }
    }
?>
