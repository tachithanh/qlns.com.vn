<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Xem danh mục phòng ban
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags fa-fw"></i> Xem danh mục phòng ban
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> STT </th>
                                <th> Tên danh mục phòng ban </th>
                                <th> Mô tả danh mục phòng ban </th>
                                <th> Chỉnh sửa </th>
                                <th> Xoá bỏ </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=0;
                                $get_p = "select * from department";
                                $run_p = mysqli_query($con,$get_p);
                                while($row_p=mysqli_fetch_array($run_p)){
                                    $p_id = $row_p['depart_id'];
                                    $p_title = $row_p['depart_name'];
                                    $p_desc = $row_p['depart_note'];
                                    $i++;
                                
                            ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $p_title; ?> </td>
                                <td width="300"> <?php echo $p_desc; ?> </td>
                                <td> 
                                    <a href="index.php?edit_p_cat=<?php echo $p_id; ?>">
                                        <i class="fa fa-pencil"></i> Chỉnh sửa
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?delete_p_cat=<?php echo $p_id; ?>">
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