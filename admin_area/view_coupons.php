<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Trang tổng quan / Xem danh mục trình độ
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> Xem danh mục trình độ
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thread>
                            <tr>
                                <th> STT </th>
                                <th> Tên trình độ </th>
                                <th> Mô tả trình độ </th>
                                
                                <th> Chỉnh sửa: </th>
                                <th> Xóa: </th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                                $i=0;
                                $get_coupons = "select * from level";
                                $run_coupons = mysqli_query($con,$get_coupons);
                                while($row_coupons=mysqli_fetch_array($run_coupons)){
                                    $level_id = $row_coupons['id_level'];
                                   
                                    $level_name = $row_coupons['level_name'];
                                    $level_note = $row_coupons['level_note'];

                                    $i++;

                               
                            ?>
                            <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo  $level_name; ?></td>
                                    <td><?php echo $level_note; ?></td>
                                    
                                    <td>
                                        <a href="index.php?edit_coupon=<?php echo $level_id; ?>">
                                            <i class="fa fa-pencil"></i> Chỉnh sửa
                                        </a>
                                    </td>
                                    <td>
                                        <a href="index.php?delete_coupon=<?php echo $level_id; ?>">
                                            <i class="fa fa-trash"></i> Xoá bỏ
                                        </a>
                                    </td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
    }
?>