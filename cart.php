

<?php

    session_start();
    $active='Cart';
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
                            echo "Xin chào";
                        }else{
                            echo "Xin chào: " . $_SESSION['customer_email'] . "";
                        }
                    ?>
                </a>
                <a href="checkout.php"> <?php items(); ?> Sản phẩm trong giỏ hàng của bạn</a>

            </div><!--3-->

            <div class="col-md-6"><!--4-->

                <ul class="menu"><!--5-->

                    <li>
                        <a href="customer_register.php">Đăng kí</a>
                    </li>
                    <li>
                        <a href="checkout.php">Tài khoản</a>
                    </li>
                    <li>
                        <a href="cart.php">Giỏ hàng</a>
                    </li>
                    <li>
                        <a href="checkout.php">
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
                <a href="index.php" class="navbar-brand home"><!--9-->
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
                        <li class="<?php if($active=='Home') echo"active"; ?>">
                          <a href="index.php">Trang Chủ</a>  
                        </li>
                        <li class="<?php if($active=='Shop') echo"active"; ?>">
                            <a href="shop.php">Cửa Hàng</a>
                        </li>
                        <li class="<?php if($active=='Account') echo"active"; ?>">
                            
                                <?php
                                    if(!isset($_SESSION['customer_email'])){
                                        echo "<a href='checkout.php'> Tài khoản </a>";
                                    }else{
                                        echo "<a href=customer/my_account.php?my_orders'> Tài khoản </a>";
                                    }
                                ?>

                        </li>
                        <li class="<?php if($active=='Cart') echo"active"; ?>">
                            <a href="cart.php">Giỏ Hàng</a>
                        </li>
                        <li class="<?php if($active=='Contact') echo"active"; ?>">
                            <a href="contact.php">Liên Hệ</a>
                        </li>
                    </ul><!--12-->
               </div><!--11--> 
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!--13-->
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> Sản phẩm trong giỏ hàng</span>
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
                            <button type="submit" name="search" class="btn btn-primary"><!--19-->
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
                        <a href="index.php">Trang chủ</a>
                    </li>
                    <li>
                        Giỏ hàng
                    </li>
                </ul>
            
            </div><!--23e-->

            <div id="cart" class="col-md-9">

                <div class="box">
                    <form action="cart.php" method="post" enctype="multicart/form-data">
                        <h1>Giỏ Hàng</h1>
                        <?php
                            $ip_add = getRealIpUser();
                            $select_cart = "select * from cart where ip_add='$ip_add'";
                            $run_cart = mysqli_query($con,$select_cart);
                            $count = mysqli_num_rows($run_cart);
                        ?>
                        <p class="text-muted"> Hiện có <?php echo $count; ?> sản phẩm trong giỏ hàng của bạn </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Sản Phẩm</th>
                                        <th> Số Lượng </th>
                                        <th> Giá </th>
                                        <th> Kích Thước </th>
                                        <th colspan="1"> Xoá </th>
                                        <th colspan="2"> Thành Tiền </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $total = 0;
                                        $total_format = 0;
                                        while($row_cart = mysqli_fetch_array($run_cart)){
                                            $pro_id = $row_cart['p_id'];
                                            $pro_size = $row_cart['size'];
                                            $pro_qty = $row_cart['qty'];

                                            $pro_sale = $row_cart['p_price'];
                                            $product_price_format = number_format($pro_sale, 0, ',', '.');

                                                $get_products = "select * from products where product_id='$pro_id'";
                                                $run_products = mysqli_query($con,$get_products);
                                                while($row_products=mysqli_fetch_array($run_products)){
                                                        $product_title = $row_products['product_title'];
                                                        $product_img1 = $row_products['product_img1'];
                                                        $only_price = $row_products['product_price'];
                                                        $sub_total = $pro_sale*$pro_qty;
                                                        $sub_total_format = number_format($sub_total, 0, ',', '.');
                                                        $_SESSION['pro_qty'] = $pro_qty;
                                                        $total += $sub_total;
                                                        $total_format = number_format($total, 0, ',', '.');

                                                        
                                                       

                                    ?>
                                   
                                    <tr>
                                        <td>
                                            <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product Yame1">
                                        </td>
                                        <td>
                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                        </td>
                                        <td>
                                             <input type="text" name ="quantity" data-product_id="<?php echo $pro_id; ?>" value="<?php echo $_SESSION['pro_qty']; ?>" class="quantity form-control">
                                        </td>
                                        <td>
                                             <?php echo $product_price_format; ?> VNĐ 
                                        </td>
                                        <td>
                                             <?php echo $pro_size; ?>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">

                                        </td>
                                        <td>
                                            <?php echo $sub_total_format; ?> VNĐ
                                        </td>
                                    </tr>
                                        <?php
                                            }
                                         }
                                        ?>
                                </tbody>
                               
                                <tfoot>
                                    <tr>
                                        <th colspan="5"> Tổng </th>
                                        <th colspan="2"><?php echo $total_format; ?> VNĐ</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="form-inline pull-right">
                                <div class="form-group">
                                    <label> Tỉnh thành: </label>
                                    <input type="text" name="code" class="form-control">
                                    <input type="submit" class="btn btn-primary" value="Tính phí" name="apply_ship">
                                </div>
                            </div>
                            <div class="form-inline pull-left">
                                <div class="form-group">
                                    <label> Mã giảm giá: </label>
                                    <input type="text" name="codes" class="form-control">
                                    <input type="submit" class="btn btn-primary" value="Áp dụng" name="apply_coupon">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="index.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Tiếp tục mua sắm
                                </a>
                            </div>
                            <div class="pull-right">
                               
                                        
                                       
                                <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                    <i class="fa fa-refresh"></i> Cập nhật giỏ hàng
                                </button>
                                <a href="checkout.php" class="btn btn-primary">
                                    Tiến hành thanh toán <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                
                <?php 
               
               if(isset($_POST['apply_coupon'])){

                   $codes = $_POST['codes'];

                   if($codes == ""){

                   }else{

                       $get_coupons = "select * from coupons where coupon_code='$codes'";
                       $run_coupons = mysqli_query($con,$get_coupons);
                       $check_coupons = mysqli_num_rows($run_coupons);

                       if($check_coupons == "1"){

                           $row_coupons = mysqli_fetch_array($run_coupons);

                           $coupon_pro_id = $row_coupons['product_id'];
                           $coupon_price = $row_coupons['coupon_price'];
                           $coupon_limit = $row_coupons['coupon_limit'];
                           $coupon_used = $row_coupons['coupon_used'];

                           if($coupon_limit == $coupon_used){

                               echo "<script>alert('Phiếu giảm giá của bạn đã hết hạn')</script>";

                           }else{

                               $get_cart = "select * from cart where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
                               $run_cart = mysqli_query($con,$get_cart);
                               $check_cart = mysqli_num_rows($run_cart);

                               if($check_cart == "1"){

                                   $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$codes'";
                                   $run_used = mysqli_query($con,$add_used);
                                   $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
                                   $run_update_cart = mysqli_query($con,$update_cart);

                                   echo "<script>alert('Phiếu giảm giá của bạn đã được áp dụng')</script>";
                                   echo "<script>window.open('cart.php','_self')</script>";

                               }else{

                                   echo "<script>alert('Phiếu giảm giá của bạn không khớp với sản phẩm trên giỏ hàng của bạn')</script>";

                               }

                           }

                       }else{

                           echo "<script>alert('Phiếu giảm giá của bạn không hợp lệ')</script>";

                       }

                   }

               }
          
          ?>
          
       


                <?php

                    $tongship = 0;
                    if(isset($_POST['apply_ship'])) {
                        
                        $code = $_POST['code'];

                        if($code == '') {
                            echo "<script>alert('Moi ban nhap vao tinh thanh')</script>";

                        } else {
                            $ip_add = getRealIpUser();
                            $select_ship = "select * from shipcod where name_ship='$code'";

                            $run_ship = mysqli_query($con, $select_ship);

                            $record = mysqli_fetch_array($run_ship);
                            $ship_id = $record['id_ship'];
                            $ship_name = $record['name_ship'];
                            $ship_price = $record['price_ship'];
                            $ship_price_format = number_format($ship_price, 0, ',', '.');

                            if ($code == $ship_name) {
                                
                                $tongship = $ship_price + $tongship;
                               

                            } else {
                                echo "<script>alert('Chúng tôi không hỗ trợ ship đến khu vực này. Xin cảm ơn!')</script>";
                            }
                        }
                        
                        $update_cart = "update cart set price_ship='$tongship' where ip_add='$ip_add'";
                        $run_update_cart= mysqli_query($con,$update_cart);
                       

                    }
                            
                ?>

                <?php
                    function update_cart(){
                        global $con;
                        if(isset($_POST['update'])){
                            foreach($_POST['remove'] as $remove_id){
                                $delete_product = "delete from cart where p_id='$remove_id'";
                                $run_delete = mysqli_query($con,$delete_product);
                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }
                        }
                    }
                    echo @$up_cart = update_cart();
                ?>
                <div id="row same-heigh-row"><!--row same-heigh-row-->
                <div class="col-md-3 col-sm-6" id="col"><!--col-md-3 col-sm-6-->
                    <div class="box same-height headline"><!--box same-height headline-->
                        <h3 class="text-center"> Có Thể Bạn Cũng Thích </h3>
                    </div><!--box same-height headline end-->
                </div><!--col-md-3 col-sm-6 end-->
                <?php
                    $get_products = "select * from products order by rand() LIMIT 0,3";
                    $run_products = mysqli_query($con,$get_products);
                    while($row_products=mysqli_fetch_array($run_products)){
                        $pro_id = $row_products['product_id'];
        
                        $pro_title = $row_products['product_title'];
                        
                        $pro_price = $row_products['product_price'];
                        $pro_sale_price= $row_products['product_sale'];
                        $product_price_format = number_format($pro_price, 0, ',', '.');

                        $product_sale_format = number_format($pro_sale_price, 0, ',', '.');

                        $pro_img1 = $row_products['product_img1'];
                        $pro_label = $row_products['product_label'];
                        if($pro_label == "Giảm Giá"){
                            $product_price = " <del> $product_price_format VND </del>";
                            $product_sale_price = "/ $product_sale_format VND";
                        }else{
                            $product_price = " $product_price_format VND ";
                            $product_sale_price = " ";
                        }
                
                        if($pro_label ==""){
                
                        }else{
                            $product_label = "
                
                                <a href='#' class='label $pro_label'>
                
                                    <div class='theLabel'> $pro_label </div>
                                    <div class='labelBackground'> </div>
                
                                </a>
                
                            ";
                        }
                        
                        echo "
                        
                        <div class='col-md-3 col-sm-6 center-responsive'>
                        
                            <div class='product' id='pro'>
                            
                                <a href='details.php?pro_id=$pro_id'>
                                
                                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                
                                </a>
                                
                                <div class='text'>
                                
                                    <h3>
                            
                                        <a href='details.php?pro_id=$pro_id'>
                
                                            $pro_title
                
                                        </a>
                                    
                                    </h3>
                                    
                                    <p class='price'>
                                    
                                   $product_price &nbsp;$product_sale_price
                                    
                                    </p>
                                    
                                    
                                
                                </div>
                
                                $product_label
                            
                            </div>
                        
                        </div>
                        
                        ";
                    }
                ?>


        </div><!--row same-heigh-row end-->

            </div>
            <!-- Doc -->
            <div class="col-md-3">
                <div id="order-summary" class="box">
                    <div class="box-header">
                        <h3>Đơn Hàng Của Bạn</h3>
                    </div>
                    <p class="text-muted">
                    Chi phí vận chuyển và chi phí bổ sung được tính dựa trên giá trị bạn đã nhập
                    </p>
                    
                    <div class="table-reponsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td> Tổng sản phẩm </td>
                                    <th> <?php echo $total_format; ?> VNĐ </th>
                                </tr>
                                <tr>
                                    <td> Phí vận chuyển </td>
                                    <td> <?php
                                     $tongship_price_format = number_format($tongship, 0, ',', '.');
                                    echo $tongship_price_format; ?> VNĐ </td>
                                </tr>
                                    
                                        <tr class="total">
                                            <td> Tổng </td>
                                            <th> <?php 
                                            $tongtien = $total+$tongship;
                                            $tongtien_format = number_format($tongtien, 0, ',', '.');
                                            echo $tongtien_format; ?> VNĐ </th>
                                        </tr>
                                   
                            </tbody>
                        </table>
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
    <script>

        $(document).ready(function(data) {

            $(document).on('keyup','.quantity',function() {

                    var id = $(this).data("product_id");
                    var quantity = $(this).val();

                    if(quantity !='') {

                        $.ajax({

                            url: "change.php",
                            method: "POST",
                            data:{id:id, quantity:quantity},

                            success:function() {
                                $("body").load("cart_body.php");
                            }

                        });

                    }

            });

        });

    </script>

</body>
</html> 