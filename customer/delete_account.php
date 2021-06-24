<center>

    <h1> Bạn có thực sự muốn xoá tài khoản này ? </h1>
    <form action="" method="post">
        <input type="submit" name="yes" value="Có, Tôi muốn xoá" class="btn btn-danger">
        <input type="submit" name="no" value="Không, Tôi không muốn xoá" class="btn btn-primary">
    </form>

</center>

<?php
    $c_email = $_SESSION['customer_email'];
    if(isset($_POST['yes'])){
        $delete_customer = "delete from customers where customer_email='$c_email'";
        $run_delete_customer = mysqli_query($con,$delete_customer);
        if($run_delete_customer){
            session_destroy();
            echo "<script>alert('Xóa thành công tài khoản của bạn, chúng tôi cảm thấy rất tiếc về điều này. Tạm biệt')</script>";
            echo "<script>window.open('../index.php','_self')</script>";

        }
    }
    if(isset($_POST['no'])){
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    }
?>