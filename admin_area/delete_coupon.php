<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['delete_coupon'])){
        $delete_coupon_id = $_GET['delete_coupon'];
        $delete_coupon = "delete from coupons where coupon_id='$delete_coupon_id'";
        $run_coupon = mysqli_query($con,$delete_coupon);
        if($run_coupon){
            echo "<script>alert('Một trong những mã giảm giá đã bị xóa')</script>";
            echo "<script>window.open('index.php?view_coupons','_self')</script>";
        }
    }
?>

<?php } ?>