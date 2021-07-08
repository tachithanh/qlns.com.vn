<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Thêm danh mục chuyên môn
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Thêm danh mục chuyên môn
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tên chuyên môn
                        </label>
                        <div class="col-md-6">
                            <input name="p_name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Mô tả chuyên môn
                        </label>
                        <div class="col-md-6">
                            <textarea type="text" name="p_note" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            
                        </label>
                        <div class="col-md-6">
                            <input value="Thêm" name="submit" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $p_name = $_POST['p_name'];
        $p_note = $_POST['p_note'];
        $insert_p = "insert into expert (expert_name,expert_note) values ('$p_name','$p_note')";
        $run_p = mysqli_query($con,$insert_p);
        if($run_p){
            echo "<script>alert('Đã thêm vào một danh mục chuyên môn mới thành công')</script>";
            echo "<script>window.open('index.php?view_slides','_self')</script>";
        }
    }
?>

<?php } ?>