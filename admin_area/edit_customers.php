<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['edit_customer'])){
        $edit_customer =$_GET['edit_customer'];
        $get_user = "select * from customers where customer_id='$edit_customer'";
        $run_user = mysqli_query($con,$get_user);
        $row_user = mysqli_fetch_array($run_user);
        $c_id = $row_user['customer_id'];
        $c_name = $row_user['customer_name'];
        $c_pass = $row_user['customer_pass'];
        $c_email = $row_user['customer_email'];
        $c_image = $row_user['customer_image'];
        $c_chuyenmon = $row_user['customer_chuyenmon'];
        $c_chucvu = $row_user['customer_chucvu'];
        $c_phongban = $row_user['customer_phongban'];
        $c_contact = $row_user['customer_contact'];
        $c_address = $row_user['customer_address'];

       
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chỉnh sửa nhân viên</title>
    
   
</head>
<body>
    
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Trang tổng quan / Chỉnh sửa nhân viên
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa nhân viên
                </h3>
            </div>
            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Tên nhân viên </label>
                        <div class="col-md-6">
                            <input value="<?php echo $c_name; ?>" name="c_name" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> E-mail </label>
                        <div class="col-md-6">
                        <input value="<?php echo $c_email; ?>" name="c_email" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Mật khẩu </label>
                        <div class="col-md-6">
                        <input value="<?php echo $c_pass; ?>" name="c_pass" type="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Phòng ban </label>
                        <div class="col-md-6">
                        <input  value="<?php echo $c_phongban; ?>" name="c_phongban" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Chức vụ </label>
                        <div class="col-md-6">
                        <input  value="<?php echo $c_chucvu; ?>" name="c_chucvu" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Chuyên môn </label>
                        <div class="col-md-6">
                        <input  value="<?php echo $c_chuyenmon; ?>" name="c_chuyenmon" type="text" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Liên lạc </label>
                        <div class="col-md-6">
                        <input value="<?php echo $c_contact; ?>" name="c_lienhe" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Địa chỉ </label>
                        <div class="col-md-6">
                        <input value="<?php echo $c_address; ?>" name="c_address" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Hình ảnh </label>
                        <div class="col-md-6">
                            <input  name="admin_image" type="file" class="form-control">
                            <img src="../customer/customer_images/<?php echo $c_image; ?>" alt="<?php echo $c_name; ?>" width="250" height="270">
                        </div>
                    </div>
                    
                    
                   
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input name="update" value="Chỉnh sửa nhân viên" type="submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>

<?php
    if(isset($_POST['update'])){
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_phongban = $_POST['c_phongban'];
        $c_lienhe = $_POST['c_lienhe'];
        $c_chucvu = $_POST['c_chucvu'];
        $c_chuyenmon = $_POST['c_chuyenmon'];
        $c_diachi = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
       

        $temp_c_image = $_FILES['admin_image']['tmp_name'];
        
       

        move_uploaded_file($temp_c_image,"customer_image/$user_image");

        $update_user = "update customers set
        customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_phongban='$c_phongban',customer_chucvu='$c_chucvu',customer_chuyenmon='$c_chuyenmon',customer_contact='$c_lienhe', customer_address = '$c_diachi',customer_image='$c_image' where customer_id='$c_id'";

        $run_user = mysqli_query($con,$update_user);

        if($run_user){
            echo "<script>alert('Nhân viên đã được chỉnh sửa thành công')</script>";
            echo "<script>window.open('index.php?view_customers','_self')</script>";
            
        }
    }

?>
<?php
    }
?>