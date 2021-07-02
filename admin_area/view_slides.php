<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Trang tổng quan / Xem danh mục chuyên môn
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags fa-fw"></i> Xem danh mục chuyên môn
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> STT </th>
                                <th> Tên chuyên môn </th>
                                <th> Mô tả </th>
                                <th> Chỉnh sửa </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=0;
                                $get_cat = "select * from expert";
                                $run_cat = mysqli_query($con,$get_cat);
                                while($row_cat=mysqli_fetch_array($run_cat)){
                                    $cm_id = $row_cat['expert_id'];
                                    $cm_title = $row_cat['expert_name'];
                                    $cm_bac = $row_cat['expert_note'];
                                    $i++;
                                
                            ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $cm_title; ?> </td>
                                <td width="300"> <?php echo $cm_bac; ?> </td>
                                <td> 
                                    <a href="index.php?edit_cm=<?php echo $cm_id; ?>">
                                        <i class="fa fa-pencil"></i> Chỉnh sửa
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?delete_cm=<?php echo $cm_id; ?>">
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