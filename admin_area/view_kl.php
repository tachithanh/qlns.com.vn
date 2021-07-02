<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Xem danh mục kỷ luật
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags fa-fw"></i> Xem danh mục kỷ luật
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> STT </th>
                                <th> Tên loại kỷ luật </th>
                                <th> Mô tả </th>
                                <th> Chỉnh sửa </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=0;
                                $get_cats = "select * from discipline";
                                $run_cats = mysqli_query($con,$get_cats);
                                while($row_cats=mysqli_fetch_array($run_cats)){
                                    $cat_id = $row_cats['discipline_id'];
                                    $cat_title = $row_cats['discipline_name'];
                                    $cat_bac = $row_cats['discipline_note'];
                                    $i++;
                                
                            ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $cat_title; ?> </td>
                                <td width="300"> <?php echo $cat_bac; ?> </td>
                                <td> 
                                    <a href="index.php?edit_kl=<?php echo $cat_id; ?>">
                                        <i class="fa fa-pencil"></i> Chỉnh sửa
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?delete_kl=<?php echo $cat_id; ?>">
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