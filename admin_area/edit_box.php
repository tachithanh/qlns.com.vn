<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['edit_box'])){
        $edit_cat = $_GET['edit_box'];
        $edit_cat_que = "select * from salary where id_salary='$edit_cat'";
        $run_edit = mysqli_query($con,$edit_cat_que);
        $row_edit = mysqli_fetch_array($run_edit);
        $cat_id = $row_edit['id_salary'];
        $cat_title = $row_edit['salary_describe'];
        $cat_desc = $row_edit['total_salary'];
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Chỉnh sửa danh mục mức lương
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa danh mục mức lương
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Mô tả mức lương
                        </label>
                        <div class="col-md-6">
                            <input value="<?php echo $cat_title; ?>" name="cat_title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tổng mức lương
                        </label>
                        <div class="col-md-6">
                        <input value="<?php echo $cat_desc; ?>" name="cat_desc" type="text" class="form-control">
                            
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
        
        $cat_desc = preg_replace("/[^0-9]/", "", $_POST['cat_desc']);
        $update_cat = "update salary set salary_describe='$cat_title',total_salary='$cat_desc' where id_salary='$cat_id'";
        $run_cat = mysqli_query($con,$update_cat);
        if($run_cat){
            echo "<script>alert('Danh mục mức lương của bạn đã được cập nhật thành công')</script>";
            echo "<script>window.open('index.php?view_boxes','_self')</script>";
        }
        
    }
?>

<?php } ?>