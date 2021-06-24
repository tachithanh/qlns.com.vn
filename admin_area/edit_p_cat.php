<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['edit_p_cat'])){
        $edit_p_cat_id = $_GET['edit_p_cat'];
        $edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";
        $run_edit = mysqli_query($con,$edit_p_cat_query);
        $row_edit = mysqli_fetch_array($run_edit);
        $p_cat_id = $row_edit['p_cat_id'];
        $p_cat_title = $row_edit['p_cat_title'];
        $p_cat_desc = $row_edit['p_cat_desc'];
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Chỉnh sửa danh mục sản phẩm
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa danh mục sản phẩm 
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tên danh mục sảm phẩm
                        </label>
                        <div class="col-md-6">
                            <input value="<?php echo $p_cat_title; ?>" name="p_cat_title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Mô tả danh mục sản phẩm
                        </label>
                        <div class="col-md-6">
                            <textarea  type="text" name="p_cat_desc" id="" cols="30" rows="10" class="form-control"><?php echo $p_cat_desc; ?></textarea>
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
        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];
        $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($con,$update_p_cat);
        if($run_p_cat){
            echo "<script>alert('Danh mục sản phẩm của bạn đã được cập nhật thành công')</script>";
            echo "<script>window.open('index.php?view_p_cats','_self')</script>";
        }
        
    }
?>

<?php } ?>