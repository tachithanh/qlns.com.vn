<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Trang tổng quan / Xem sản phẩm
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> Xem sản phẩm
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thread>
                            <tr>
                                <th> Mã sản phẩm: </th>
                                <th> Tên sản phẩm: </th>
                                <th> Hình ảnh sản phẩm: </th>
                                <th> Giá sản phẩm: </th>
                                <th> Sản phẩm đã bán: </th>
                                <th> Từ khóa sản phẩm: </th>
                                <th> Số lượng sản phẩm: </th>
                                <th>  Ngày sản phẩm: </th>
                                <th> Xóa sản phẩm: </th>
                                <th> Chỉnh sửa sản phẩm: </th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                                $i=0;
                                $get_pro = "select * from products";
                                $run_pro = mysqli_query($con,$get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $pro_id = $row_pro['product_id'];
                                    $pro_title = $row_pro['product_title'];
                                    $pro_img1 = $row_pro['product_img1'];
                                    $pro_price = $row_pro['product_price'];
                                    $product_price_format = number_format($pro_price, 0, ',', '.');
                                    $pro_keywords = $row_pro['product_keywords'];
                                    $pro_date = $row_pro['date'];
                                    $soluong = $row_pro['amount'];
                                    $i++
                               
                            ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $pro_title; ?> </td>
                                <td> <img src="product_images/<?php echo $pro_img1; ?>" width="134" height="174"></td>
                                <td> <?php echo $product_price_format; ?> VNĐ</td>
                                <td> 
                                    <?php
                                        $get_sold = "select * from customer_orders where product_id='$pro_id'";
                                        $run_sold = mysqli_query($con,$get_sold);
                                        $count = mysqli_num_rows($run_sold);
                                        echo $count;
                                    ?> 
                                </td>
                                <td> <?php echo $pro_keywords; ?></td>
                                <td> <?php echo $soluong; ?></td>
                                <td> <?php echo $pro_date; ?></td>
                                <td> 
                                    <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-trash-o"></i> Xoá bỏ
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-pencil"></i> Chỉnh sửa
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