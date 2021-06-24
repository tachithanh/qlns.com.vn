<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['edit_ship'])){
        $edit_ship_id = $_GET['edit_ship'];
        $edit_ship_query = "select * from shipcod where id_ship='$edit_ship_id'";
        $run_edit_ship = mysqli_query($con,$edit_ship_query);
        $row_edit_ship = mysqli_fetch_array($run_edit_ship);
        $id_ship = $row_edit_ship['id_ship'];
        $name_ship = $row_edit_ship['name_ship'];
        $price_ship = $row_edit_ship['price_ship'];
        $ship_format = number_format((float)$price_ship, 0, ',', '.');
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Chỉnh sửa tỉnh thành
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa tỉnh thành
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tên tỉnh thành
                        </label>
                        <div class="col-md-6">
                            <input value="<?php echo $name_ship; ?>" name="name_ship" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Phí vận chuyển
                        </label>
                        <div class="col-md-6">
                            <input value="<?php echo $ship_format; ?>" name="price_ship" type="text" class="form-control">
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
        $price_ship = preg_replace("/[^0-9]/", "", $_POST['price_ship']);
        $update_ship = "update shipcod set name_ship='$name_ship',price_ship='$price_ship' where id_ship='$id_ship'";
        $run_ship = mysqli_query($con,$update_ship);
        if($run_ship){
            echo "<script>alert('Tỉnh thành của bạn đã được cập nhật thành công')</script>";
            echo "<script>window.open('index.php?view_ships','_self')</script>";
        }
        
    }
?>

<?php } ?>