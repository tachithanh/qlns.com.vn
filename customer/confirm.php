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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Dev Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    
</head>

<body>
   
    <div id="top"><!--1-->

        <div class="container"><!--2-->

            <div class="col-md-6 offer"><!--3-->

                <a href="#" class="btn btn-success btn-sm">
                <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "Xin chào!";
                        }else{
                            echo "Xin chào: " . $_SESSION['customer_email'] . "";
                        }
                    ?>
                </a>
                <a href="../cart.php"><?php items(); ?> Sản phẩm trong giỏ hàng của bạn</a>

            </div><!--3-->

            <div class="col-md-6"><!--4-->

                <ul class="menu"><!--5-->

                    <li>
                        <a href="../customer_register.php">Đăng ký</a>
                    </li>
                    <li>
                        <a href="my_account.php">Tài khoản</a>
                    </li>
                    <li>
                        <a href="../cart.php">Giỏ hàng</a>
                    </li>
                    <li>
                        <a href="../checkout.php">
                        <?php
                                    
                             if(!isset($_SESSION['customer_email'])){
                                         echo "<a href='checkout.php'> Đăng nhập </a>";
                                     }else{
                                         echo "<a href='logout.php'> Đăng xuất </a>']";
                                }
                                    
                        ?>
                        </a>
                    </li>

                </ul><!--5-->

            </div><!--4-->

        </div><!--2-->

    </div><!--1-->
    
    <div id="navbar" class="navbar navbar-default"><!--6-->
        <div class="container"><!--7-->
            <div class="navbar-header"><!--8-->
                <a href="../index.php" class="navbar-brand home"><!--9-->
                    <img src="images/logo.svg" alt="M-dev-Store Logo" class="hidden-xs">
                    <img src="images/logo.svg" alt="M-dev-Store Logo Mobile" class="visible-xs">
                </a><!--9-->

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                    <span class="sr-only">Toggle Navigation</span>
                    
                    <i class="fa fa-align-justify"></i>
                    
                </button>
                
                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    
                    <span class="sr-only">Toggle Search</span>
                    
                    <i class="fa fa-search"></i>
                    
                </button>
 
            </div><!--8-->
            <div class="navbar-collapse collapse" id="navigation"><!--10-->
               <div class="padding-nav"><!--11-->
                    <ul class="nav navbar-nav left"><!--12-->
                        <li >
                          <a href="../index.php">Trang Chủ</a>  
                        </li>
                        <li>
                            <a href="../shop.php">Cửa Hàng</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php">Tài Khoản</a>
                        </li>
                        <li>
                            <a href="../cart.php">Giỏ Hàng</a>
                        </li>
                        <li>
                            <a href="../contact.php">Liên Hệ</a>
                        </li>
                    </ul><!--12-->
               </div><!--11--> 
               <a href="../cart.php" class="btn navbar-btn btn-primary right"><!--13-->
                    <i class="fa fa-shopping-cart"></i>
                    <span> <?php items(); ?> Sản Phẩm Trong Giỏ Hàng </span>
               </a><!--13-->
               <div class="navbar-collapse collapse right"><!--14-->
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!--15-->
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                   </button><!--15-->
               </div><!--14-->
               <div class="collapse clearfix" id="search"><!--16-->
                    <form method="get" action="results.php" class="navbar-form"><!--17-->
                        <div class="input-group"><!--18-->
                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                            <span class="input-group-btn"><!--20-->
                            <button type="submit" name="search" value="Search" class="btn btn-primary"><!--19-->
                                <i class="fa fa-search"></i>
                            </button><!--19-->
                            </span><!--20-->
                        </div><!--18-->
                    </form><!--17-->
               </div><!--16-->
            </div><!--10-->
        </div><!--7-->
    </div><!--6-->
    <div id="content"><!--21-->
        <div class="container"><!--22-->
            <div class="col-md-12"><!--23-->
            
                <ul class="breadcrumb">
                    <li>
                        <a href="../index.php">Trang chủ</a>
                    </li>
                    <li>
                        Xác nhận thanh toán
                    </li>
                </ul>
            
            </div><!--23e-->
            <div class="col-md-3"><!--24-->
            <?php

                include("includes/sidebar.php");

            ?>

            </div><!--24e--> 
            <div class="col-md-9">
                <div class="box">
                    <h1 align="center"> Vui lòng xác nhận thanh toán</h1>
                    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Invoice No: </label>
                            <input type="text" class="form-control" name="invoice_no" required>
                        </div>
                        <div class="form-group">
                            <label> Số tiền đã gửi: </label>
                            <input type="text" class="form-control" name="amount_sent" required>
                        </div>
                        <div class="form-group">
                            <label> Chọn phương thức thanh toán: </label>
                                <select name="payment_mode" class="form-control">
                                <option > Chọn phương thức thanh toán </option>
                                <option > Thanh toán khi nhận hàng </option>                         
                            </select>
                        </div>
                        
                       
                        <div class="form-group">
                            <label> Ngày thanh toán: </label>
                            <input type="text" class="form-control" name="date" required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-lg" name="confirm_payment">
                                <i class="fa fa-user-md"></i> Xác nhận thanh toán
                            </button>
                        </div>
                    </form>
                    <?php 
                   
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                       
                        $amount = preg_replace("/[^0-9]/", "", $_POST['amount_sent']);
                        
                       
                        $payment_mode = $_POST['payment_mode'];
                        $payment_date = $_POST['date'];
                        
                        $complete = "Done";
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,payment_date) values ('$invoice_no','$amount','$payment_mode','$payment_date')";
                        
                        $run_payment = mysqli_query($con,$insert_payment);
                    
                        $update_customer_order = "update customer_orders set order_status='$complete' where invoice_no='$invoice_no'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            

                                echo "<script>alert('Cảm ơn bạn đã thanh toán, rất mong bạn sẽ hài lòng về sản phẩm')</script>";
                                echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            }
                        }
                    ?>
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

                            }
?>