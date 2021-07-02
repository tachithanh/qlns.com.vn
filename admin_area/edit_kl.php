<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php
    if(isset($_GET['edit_kl'])){
        $edit_ship_id = $_GET['edit_kl'];
        $edit_ship_query = "select * from discipline where discipline_id='$edit_ship_id'";
        $run_edit_ship = mysqli_query($con,$edit_ship_query);
        $row_edit_ship = mysqli_fetch_array($run_edit_ship);
        $id_ship = $row_edit_ship['discipline_id'];
        $name_ship = $row_edit_ship['discipline_name'];
        $price_ship = $row_edit_ship['discipline_note'];
       
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Chỉnh sửa danh mục kỷ luật
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Chỉnh sửa danh mục kỷ luật
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                            Tên loại kỷ luật
                        </label>
                        <div class="col-md-6">
                            <input value="<?php echo $name_ship; ?>" name="name_ship" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                           Mô tả
                        </label>
                        <div class="col-md-6">
                        <textarea  type="text" name="price_ship" id="" cols="30" rows="10" class="form-control"><?php echo $price_ship; ?></textarea>
                           
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
       
        $update_ship = "update discipline set discipline_name='$name_ship',discipline_note='$price_ship' where discipline_id='$id_ship'";
        $run_ship = mysqli_query($con,$update_ship);
        if($run_ship){
            echo "<script>alert('Danh mục kỷ luật của bạn đã được cập nhật thành công')</script>";
            echo "<script>window.open('index.php?view_kl','_self')</script>";
        }
        
    }
?>

<?php } ?>