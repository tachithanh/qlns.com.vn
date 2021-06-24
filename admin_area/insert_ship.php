<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Thêm tỉnh thành
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Thêm tỉnh thành
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tên tỉnh thành
                        </label>
                        <div class="col-md-6">
                            <input name="name_ship" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="" class="control-label col-md-3"> 
                            Phí vận chuyển
                        </label>
                        <div class="col-md-6">
                            <input name="price_ship" type="text" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            
                        </label>
                        <div class="col-md-6">
                        <input type="submit" name="submit"  value="Thêm tỉnh thành" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $name_ship = $_POST['name_ship'];
        
        $price_ship = preg_replace("/[^0-9]/", "", $_POST['price_ship']);

        $insert_ship = "insert into shipcod (name_ship,price_ship) values ('$name_ship','$price_ship')";
        $run_box = mysqli_query($con,$insert_ship);

        echo "<script>alert('Thêm tỉnh thành thành công')</script>";
        echo "<script>window.open('index.php?view_ships','_self')</script>";
        
    }
?>

<?php } ?>