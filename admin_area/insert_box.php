<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Thêm giới thiệu
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Thêm giới thiệu
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tiêu đề
                        </label>
                        <div class="col-md-6">
                            <input name="box_title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                           Mô tả
                        </label>
                        <div class="col-md-6">
                            <textarea name="box_desc" type="text" class="form-control" rows="12" cols="18"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            
                        </label>
                        <div class="col-md-6">
                        <input type="submit" name="submit"  value="Thêm trình bày" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $box_title = $_POST['box_title'];
        $box_desc = $_POST['box_desc'];

        $insert_box = "insert into boxes_section (box_title,box_desc) values ('$box_title','$box_desc')";
        $run_box = mysqli_query($con,$insert_box);

        echo "<script>alert('Thêm giới thiệu thành công')</script>";
        echo "<script>window.open('index.php?view_boxes','_self')</script>";
        
    }
?>

<?php } ?>