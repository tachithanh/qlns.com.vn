<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['delete_ship'])){
        $delete_ship_id = $_GET['delete_ship'];
        $delete_ship = "delete from shipcod where id_ship='$delete_ship_id'";
        $run_delete_ship = mysqli_query($con,$delete_ship);
        if($run_delete_ship){
            echo "<script>alert('Một trong những tỉnh thành của bạn đã bị xóa')</script>";
            echo "<script>window.open('index.php?view_ships','_self')</script>";
        }
    }
?>

<?php } ?>