<?php
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>

<?php
    if(isset($_GET['user_profile'])){
        $edit_user =$_GET['user_profile'];
        $get_user = "select * from admins where admin_id='$edit_user'";
        $run_user = mysqli_query($con,$get_user);
        $row_user = mysqli_fetch_array($run_user);
        $user_id = $row_user['admin_id'];
        $user_name = $row_user['admin_name'];
        $user_pass = $row_user['admin_pass'];
        $user_email = $row_user['admin_email'];
        $user_image = $row_user['admin_image'];
        $user_country = $row_user['admin_country'];
        $user_about = $row_user['admin_about'];
        $user_contact = $row_user['admin_contact'];
        $user_job = $row_user['admin_job'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chỉnh sửa thông tin người dùng</title>
    
   
</head>
<body>
    
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Trang tổng quan / Chỉnh sửa người dùng
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa người dùng
                </h3>
            </div>
            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Tên người dùng </label>
                        <div class="col-md-6">
                            <input value="<?php echo $user_name; ?>" name="admin_name" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> E-mail </label>
                        <div class="col-md-6">
                        <input value="<?php echo $user_email; ?>" name="admin_email" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Mật khẩu </label>
                        <div class="col-md-6">
                        <input value="<?php echo $user_pass; ?>" name="admin_pass" type="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Quốc gia </label>
                        <div class="col-md-6">
                        <input  value="<?php echo $user_country; ?>" name="admin_country" type="text" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Liên lạc </label>
                        <div class="col-md-6">
                        <input value="<?php echo $user_contact; ?>" name="admin_contact" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Công việc </label>
                        <div class="col-md-6">
                        <input value="<?php echo $user_job; ?>" name="admin_job" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Hình ảnh </label>
                        <div class="col-md-6">
                            <input  name="admin_image" type="file" class="form-control">
                            <img src="admin_images/<?php echo $user_image; ?>" alt="<?php echo $user_name; ?>" width="250" height="270">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Mô tả </label>
                        <div class="col-md-6">
                        <textarea name="admin_about" class="form-control" rows="3"> <?php echo $user_about; ?> </textarea>
                        </div>
                    </div>
                    
                   
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input name="update" value="Chỉnh sửa người dùng" type="submit" class="btn btn-primary form-control">
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
        $user_name = $_POST['admin_name'];
        $user_email = $_POST['admin_email'];
        $user_pass = $_POST['admin_pass'];
        $user_country = $_POST['admin_country'];
        $user_contact = $_POST['admin_contact'];
        $user_job = $_POST['admin_job'];
        $user_about = $_POST['admin_about'];
        $user_image = $_FILES['admin_image']['name'];
       

        $temp_admin_image = $_FILES['admin_image']['tmp_name'];
        
       

        move_uploaded_file($temp_admin_image,"admin_images/$user_image");

        $update_user = "update admins set
        admin_name='$user_name',admin_email='$user_email',admin_pass='$user_pass',admin_country='$user_country',admin_contact='$user_contact',admin_job='$user_job',admin_about='$user_about',admin_image='$user_image' where admin_id='$user_id'";

        $run_user = mysqli_query($con,$update_user);

        if($run_user){
            echo "<script>alert('Người dùng đã được chỉnh sửa thành công')</script>";
            echo "<script>window.open('login.php','_self')</script>";
            session_destroy();
        }
    }

?>
<?php
    }
?>