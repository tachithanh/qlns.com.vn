<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['edit_ship'])){
        $edit_ship_id = $_GET['edit_ship'];
        $edit_ship_query = "select * from bonus where id_bonus='$edit_ship_id'";
        $run_edit_ship = mysqli_query($con,$edit_ship_query);
        $row_edit_ship = mysqli_fetch_array($run_edit_ship);
        $id_ship = $row_edit_ship['id_bonus'];
        $name_ship = $row_edit_ship['bonus_name'];
        $price_ship = $row_edit_ship['bonus_method'];
       
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Chỉnh sửa danh mục khen thưởng
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa danh mục khen thưởng
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tên loại khen thưởng
                        </label>
                        <div class="col-md-6">
                            <input value="<?php echo $name_ship; ?>" name="name_ship" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Phương pháp khen thưởng
                        </label>
                        <div class="col-md-6">
                            <input value="<?php echo $price_ship; ?>" name="price_ship" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            
                        </label>
                        <div class="col-md-6">
                            <input value="Cập nhật" name="update_ship" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['update_ship'])){
        $name_ship = $_POST['name_ship'];
        $price_ship = $_POST['price_ship'];
       
        $update_ship = "update bonus set bonus_name='$name_ship',bonus_method='$price_ship' where id_bonus='$id_ship'";
        $run_ship = mysqli_query($con,$update_ship);
        if($run_ship){
            echo "<script>alert('Danh mục khen thưởng của bạn đã được cập nhật thành công')</script>";
            echo "<script>window.open('index.php?view_ships','_self')</script>";
        }
        
    }
?>

<?php } ?>