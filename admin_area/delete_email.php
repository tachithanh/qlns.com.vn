<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['delete_email'])){
        $delete_email_id = $_GET['delete_email'];
        $delete_email = "delete from email where mail_id='$delete_email_id'";
        $run_delete_email = mysqli_query($con,$delete_email);
        if($run_delete_email){
            echo "<script>alert('Một trong những lá thư của bạn đã bị xóa')</script>";
            echo "<script>window.open('index.php?view_email','_self')</script>";
        }
    }
?>

<?php } ?>