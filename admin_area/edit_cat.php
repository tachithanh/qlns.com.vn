<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['edit_cat'])){
        $edit_cat_id = $_GET['edit_cat'];
        $edit_cat_query = "select * from position where id_position='$edit_cat_id'";
        $run_edit = mysqli_query($con,$edit_cat_query);
        $row_edit = mysqli_fetch_array($run_edit);
        $cat_id = $row_edit['id_position'];
        $cat_title = $row_edit['position_name'];
        $cat_desc = $row_edit['coefficient'];
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Chỉnh sửa danh mục chức vụ
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa danh mục chức vụ
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tên chức vụ
                        </label>
                        <div class="col-md-6">
                            <input value="<?php echo $cat_title; ?>" name="cat_title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Hệ số lương
                        </label>
                        <div class="col-md-6">
                            <textarea  type="text" name="cat_desc" id="" cols="30" rows="10" class="form-control"><?php echo $cat_desc; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            
                        </label>
                        <div class="col-md-6">
                            <input value="Cập nhật" name="update" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['update'])){
        $cat_title = $_POST['cat_title'];
        $cat_desc = $_POST['cat_desc'];
        $update_cat = "update position set position_name='$cat_title',coefficient='$cat_desc' where id_position='$cat_id'";
        $run_cat = mysqli_query($con,$update_cat);
        if($run_cat){
            echo "<script>alert('Danh mục chức vụ của bạn đã được cập nhật thành công')</script>";
            echo "<script>window.open('index.php?view_cats','_self')</script>";
        }
        
    }
?>

<?php } ?>