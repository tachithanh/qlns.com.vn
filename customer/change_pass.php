<h1 align="center"> Chỉnh Sửa Mật Khẩu </h1>

<form action="" method="post">
    <div class="form-group">
        <label> Mật khẩu cũ của bạn: </label>
        <input type="text" name="old_pass" class="form-control" required>
    </div>
    <div class="form-group">
        <label> Mật khẩu mới của bạn: </label>
        <input type="text" name="new_pass" class="form-control" required>
    </div>
    <div class="form-group">
        <label> Xác nhận mật khẩu mới của bạn: </label>
        <input type="text" name="new_pass_again" class="form-control" required>
    </div>
   
    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Cập Nhật Bây Giờ
        </button>
    </div>
</form>
<?php
    if(isset($_POST['submit'])){
        $c_email=$_SESSION['customer_email'];
        $c_old_pass = $_POST['old_pass'];
        $c_new_pass = $_POST['new_pass'];
        $c_new_pass_again = $_POST['new_pass_again'];
        $sel_c_old_pass="select * from customers where customer_pass='$c_old_pass'";
        
        $run_c_old_pass= mysqli_query($con,$sel_c_old_pass);
        $check_c_old_pass= mysqli_num_rows($run_c_old_pass);

        if($check_c_old_pass == 0){
            echo "<script>alert('Xin lỗi, mật khẩu hiện tại của bạn không hợp lệ. Vui lòng thử lại!')</script>";
            exit();
        }

        if($c_new_pass != $c_new_pass_again){
            echo "<script>alert('Xin lỗi, mật khẩu mới của bạn không khớp')</script>";
            exit();
        }

        $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
        $run_c_pass= mysqli_query($con,$update_c_pass);
        
        if($run_c_pass){
            echo "<script>alert('Mật khẩu của bạn đã được cập nhật')</script>";
            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        }

    }
?>