<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['delete_coupon'])){
        $delete_cat_id = $_GET['delete_coupon'];
        $delete_cat = "delete from level where id_level='$delete_cat_id'";
        $run_delete = mysqli_query($con,$delete_cat);
        if($run_delete){
            echo "<script>alert('Một trong những danh mục trình độ của bạn đã bị xóa')</script>";
            echo "<script>window.open('index.php?view_coupons','_self')</script>";
        }
    }
?>

<?php } ?>