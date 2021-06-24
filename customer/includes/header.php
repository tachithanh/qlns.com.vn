<?php

    session_start();
    include("includes/db.php");
    include("functions/functions.php");

?>

<?php
    if(isset($_GET['pro_id'])){
        $product_id = $_GET['pro_id'];
        $get_product = "select * from products where product_id='$product_id'";
        $run_product = mysqli_query($con,$get_product);
        $row_product = mysqli_fetch_array($run_product);
        $p_cat_id = $row_product['p_cat_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_desc = $row_product['product_desc'];
        $pro_img1 = $row_product['product_img1'];
        $pro_img2 = $row_product['product_img2'];
        $pro_img3 = $row_product['product_img3'];
        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($con,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = $row_p_cat['p_cat_title'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChiThanh Store</title>
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
                            echo "Welcom: Guest";
                        }else{
                            echo "Welcom: " . $_SESSION['customer_email'] . "";
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
                    <img src="images/logo.svg.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
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
                          <a href="../index.php">Trang chủ</a>  
                        </li>
                        <li>
                            <a href="../shop.php">Cửa hàng</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php">Tài khoản</a>
                        </li>
                        <li>
                            <a href="../cart.php">Giỏ hàng</a>
                        </li>
                        <li>
                            <a href="../contact.php">Liên hệ</a>
                        </li>
                    </ul><!--12-->
               </div><!--11--> 
               <a href="../cart.php" class="btn navbar-btn btn-primary right"><!--13-->
                    <i class="fa fa-shopping-cart"></i>
                    <span> <?php items(); ?> Sản phẩm trong giỏ hàng </span>
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