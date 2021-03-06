<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        $admin_session = $_SESSION['admin_email'];
        $get_admin = "select * from admins where admin_email='$admin_session'";
        $run_admin = mysqli_query($con,$get_admin);
        $row_admin = mysqli_fetch_array($run_admin);
        $admin_id = $row_admin['admin_id'];
        $admin_email = $row_admin['admin_email'];
        $admin_image = $row_admin['admin_image'];
        $admin_country = $row_admin['admin_country'];
        $admin_contact = $row_admin['admin_contact'];
        $admin_about = $row_admin['admin_about'];
        $admin_job = $row_admin['admin_job'];
        $admin_name = $row_admin['admin_name'];
        $get_order = "select * from customer_orders";
        $run_order = mysqli_query($con,$get_order);
        $row_order = mysqli_fetch_array($run_order);
       
        $get_products = "select * from products";
        $run_products = mysqli_query($con,$get_products);
        $count_products = mysqli_num_rows($run_products);
        $get_customers = "select * from customers";
        $run_customers = mysqli_query($con,$get_customers);
        $count_customers = mysqli_num_rows($run_customers);
        $get_p_categories = "select * from product_categories";
        $run_p_categories = mysqli_query($con,$get_p_categories);
        $count_p_categories = mysqli_num_rows($run_p_categories);
        $get_pending_orders = "select * from pending_orders";
        $run_pending_orders = mysqli_query($con,$get_pending_orders);
        $count_pending_orders = mysqli_num_rows($run_pending_orders);
        $get_cus = "select * from customers";
        $run_cus = mysqli_query($con,$get_cus);
        $count_cus = mysqli_num_rows($run_cus);
        $get_pb = "select * from department";
        $run_pb = mysqli_query($con,$get_pb);
        $count_pb = mysqli_num_rows($run_pb);
        $get_cv = "select * from position";
        $run_cv = mysqli_query($con,$get_cv);
        $count_cv = mysqli_num_rows($run_cv);
        $get_cm = "select * from department";
        $run_cm = mysqli_query($con,$get_cm);
        $count_cm = mysqli_num_rows($run_cm);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> M-Dev Store Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

        <div id="wrapper">
            <?php
                include("includes/sidebar.php");
            ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                <?php
                    if(isset($_GET['dashboard'])){
                        include("dashboard.php");
                    }   if(isset($_GET['insert_product'])){
                            include("insert_product.php");
                    }if(isset($_GET['view_products'])){
                        include("view_products.php");
                    }if(isset($_GET['delete_product'])){
                        include("delete_product.php");
                    }if(isset($_GET['edit_product'])){
                        include("edit_product.php");
                    }if(isset($_GET['insert_p_cat'])){
                        include("insert_p_cat.php");
                    }if(isset($_GET['view_p_cats'])){
                        include("view_p_cats.php");
                    }if(isset($_GET['delete_p_cat'])){
                        include("delete_p_cat.php");
                    }if(isset($_GET['edit_p_cat'])){
                        include("edit_p_cat.php");
                    }if(isset($_GET['insert_cat'])){
                        include("insert_cat.php");
                    }if(isset($_GET['view_cats'])){
                        include("view_cats.php");
                    }if(isset($_GET['edit_cat'])){
                        include("edit_cat.php");
                    }if(isset($_GET['delete_cat'])){
                        include("delete_cat.php");
                    }if(isset($_GET['insert_slide'])){
                        include("insert_slide.php");
                    }if(isset($_GET['view_slides'])){
                        include("view_slides.php");
                    }if(isset($_GET['delete_slide'])){
                        include("delete_slide.php");
                    }if(isset($_GET['edit_slide'])){
                        include("edit_slide.php");
                    }if(isset($_GET['view_customers'])){
                        include("view_customers.php");
                    }if(isset($_GET['delete_customer'])){
                        include("delete_customer.php");
                    }if(isset($_GET['view_orders'])){
                        include("view_orders.php");
                    }
                    if(isset($_GET['delete_order'])){
                        include("delete_order.php");
                    }if(isset($_GET['view_payments'])){
                        include("view_payments.php");
                    }if(isset($_GET['delete_payment'])){
                        include("delete_payment.php");
                    }if(isset($_GET['view_users'])){
                        include("view_users.php");
                    }if(isset($_GET['delete_user'])){
                        include("delete_user.php");
                    }if(isset($_GET['insert_user'])){
                        include("insert_user.php");
                    }if(isset($_GET['user_profile'])){
                        include("user_profile.php");
                    }if(isset($_GET['insert_box'])){
                        include("insert_box.php");
                    }if(isset($_GET['view_boxes'])){
                        include("view_boxes.php");
                    }if(isset($_GET['delete_box'])){
                        include("delete_box.php");
                    }if(isset($_GET['edit_box'])){
                        include("edit_box.php");
                    }if(isset($_GET['confirm_yes'])){
                        include("confirm_yes.php");
                    }if(isset($_GET['confirm_no'])){
                        include("confirm_no.php");
                    }if(isset($_GET['insert_ship'])){
                        include("insert_ship.php");
                    }if(isset($_GET['view_ships'])){
                        include("view_ships.php");
                    }if(isset($_GET['edit_ship'])){
                        include("edit_ship.php");
                    }if(isset($_GET["delete_ship"])){
                        include("delete_ship.php");
                    }if(isset($_GET['view_email'])){
                        include("view_email.php");
                    }if(isset($_GET["delete_email"])){
                        include("delete_email.php");
                    }if(isset($_GET['insert_coupon'])){
                        include("insert_coupon.php");
                    }if(isset($_GET['view_coupons'])){
                        include("view_coupons.php");
                    }if(isset($_GET['edit_coupon'])){
                        include("edit_coupon.php");
                    }if(isset($_GET["delete_coupon"])){
                        include("delete_coupon.php");
                    }if(isset($_GET["print"])){
                        include("print.php");
                    }if(isset($_GET["view_ord"])){
                        include("view_ord.php");
                    }if(isset($_GET["giaohang"])){
                        include("giaohang.php");
                    }if(isset($_GET["dagiao"])){
                        include("dagiao.php");
                    }if(isset($_GET["insert_customers"])){
                        include("insert_customers.php");
                    }if(isset($_GET["edit_customer"])){
                        include("edit_customers.php");
                    }if(isset($_GET["edit_cm"])){
                        include("edit_cm.php");
                    }if(isset($_GET["delete_cm"])){
                        include("delete_cm.php");
                    }if(isset($_GET["insert_kl"])){
                        include("insert_kl.php");
                    }if(isset($_GET["view_kl"])){
                        include("view_kl.php");
                    }if(isset($_GET["delete_kl"])){
                        include("delete_kl.php");
                    }if(isset($_GET["edit_kl"])){
                        include("edit_kl.php");
                    }
                    

                ?>
                </div>
            </div>
        </div>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>   
</body>
</html>
<?php 
}
 ?>