<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['edit_slide'])){
        $edit_slide_id = $_GET['edit_slide'];
        $edit_slide = "select * from slider where slide_id='$edit_slide_id'";
        $run_edit_slide = mysqli_query($con,$edit_slide);
        $row_edit_slide = mysqli_fetch_array($run_edit_slide);
        $slide_id = $row_edit_slide['slide_id'];
        $slide_name = $row_edit_slide['slide_name'];
        $slide_url = $row_edit_slide['slide_url'];
        $slide_image = $row_edit_slide['slide_image'];
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Chỉnh sửa ảnh trình bày
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa ảnh trình bày
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tên ảnh
                        </label>
                        <div class="col-md-6">
                            <input name="slide_name" type="text" class="form-control" value="<?php echo $slide_name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Url ảnh
                        </label>
                        <div class="col-md-6">
                            <input name="slide_url" type="text" class="form-control" value="<?php echo $slide_url; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                           Hình ảnh
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="slide_image" class="form-control">
                            <br/>
                            <img src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_name; ?>" class="responsive" width="595" height="300">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            
                        </label>
                        <div class="col-md-6">
                        <input type="submit" name="update"  value="Cập nhật" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['update'])){
        $slide_name = $_POST['slide_name'];
        $slide_url = $_POST['slide_url'];
        $slide_image = $_FILES['slide_image']['name'];
        $temp_name = $_FILES['slide_image']['tmp_name'];
        move_uploaded_file($temp_name,"slides_images/$slide_image");
        $update_slide = "update slider set slide_name='$slide_name',slide_url='$slide_url',slide_image='$slide_image' where slide_id='$slide_id'";
        $run_update_slide = mysqli_query($con,$update_slide);
        if($run_update_slide){
            echo "<script>alert('Hình ảnh trình bày của bạn đã được cập nhật thành công')</script>";
            echo "<script>window.open('index.php?view_slides','_self')</script>";
        }
       
    }
?>

<?php } ?>