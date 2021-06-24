<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Xem tỉnh thành
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags fa-fw"></i> Xem tỉnh thành
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Tên tỉnh thành </th>
                                <th> Phí vận chuyển </th>
                                <th> Chỉnh sửa </th>
                                <th> Xoá bỏ </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=0;
                                $get_ships = "select * from shipcod";
                                $run_ships = mysqli_query($con,$get_ships);
                                while($row_ships=mysqli_fetch_array($run_ships)){
                                    $id_ship = $row_ships['id_ship'];
                                    $name_ship = $row_ships['name_ship'];
                                    $price_ship = $row_ships['price_ship'];
                                    $price_format = number_format($price_ship, 0, ',', '.');
                                    $i++;
                                
                            ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $name_ship; ?> </td>
                                <td width="300"> <?php echo $price_format; ?> VNĐ </td>
                                <td> 
                                    <a href="index.php?edit_ship=<?php echo $id_ship; ?>">
                                        <i class="fa fa-pencil"></i> Chỉnh sửa
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?delete_ship=<?php echo $id_ship; ?>">
                                        <i class="fa fa-trash"></i> Xoá bỏ
                                    </a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>