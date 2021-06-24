<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Trang tổng quan / Xem nhân viên
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> Xem nhân viên
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thread>
                            <tr>
                                <th> STT </th>
                                <th> Tên nhân viên </th>
                                <th> Hình ảnh </th>
                                <th> Email </th>
                                <th>Phòng ban</th>
                                <th> Chức vụ </th>
                                <th>Chuyên môn</th>
                                <th> Địa chỉ </th>
                                <th> Liên hệ </th>
                                <th>Chỉnh sửa</th>
                                <th> Xoá bỏ </th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                                $i=0;
                                $get_c = "select * from customers";
                                $run_c = mysqli_query($con,$get_c);
                                while($row_c=mysqli_fetch_array($run_c)){
                                    $c_id = $row_c['customer_id'];
                                    $c_name = $row_c['customer_name'];
                                    $c_image = $row_c['customer_image'];
                                    $c_email = $row_c['customer_email'];
                                    $c_country = $row_c['customer_phongban'];
                                    $c_city = $row_c['customer_chucvu'];
                                    $c_address = $row_c['customer_address'];
                                    $c_contact = $row_c['customer_contact'];
                                    $c_chuyenmon = $row_c['customer_chuyenmon'];
                                    $i++
                               
                            ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $c_name; ?> </td>
                                <td> <img src="../customer/customer_images/<?php echo $c_image; ?>" width="60" height="60" ></td>
                                <td> <?php echo $c_email; ?> </td>
                                <td> <?php echo $c_country; ?> </td>
                                <td> <?php echo $c_city; ?> </td>
                                <td> <?php echo $c_chuyenmon; ?> </td>
                                <td> <?php echo $c_address; ?> </td>
                
                                <td> <?php echo $c_contact; ?> </td>
                                <td> 
                                    <a href="index.php?user_profile=<?php echo $c_id; ?>">
                                        <i class="fa fa-pencil"></i> Chỉnh sửa
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?delete_customer=<?php echo $c_id; ?>">
                                        <i class="fa fa-trash-o"></i> Xoá bỏ
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