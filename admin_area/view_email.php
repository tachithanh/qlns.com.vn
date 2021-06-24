<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Trang tổng quan / Xem thư của khách hàng
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> Xem thư của khách hàng
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thread>
                            <tr>
                                
                                <th> STT </th>
                                <th> Tên: </th>
                                <th> Email: </th>
                                <th> Tiêu đề: </th>
                                <th> Nội dung: </th>
                                <th> Xoá bỏ: </th>
                            </tr>
                        </thread>
                        <tbody>
                        <?php 
          
                                $i=0;
                            
                                $get_email = "select * from email";
                                
                                $run_email = mysqli_query($con,$get_email);

                                while($row_email=mysqli_fetch_array($run_email)){
                                    
                                    $mail_id = $row_email['mail_id'];
                                    
                                    $name = $row_email['name'];
                                    
                                    $email = $row_email['email'];
                                    
                                    $subject = $row_email['subject'];
                                    
                                    $message = $row_email['message'];
                 
                                    $i++;
                            
                            ?>

                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $name; ?> </td>
                                <td> <?php echo $email; ?> </td>
                                <td> <?php echo $subject; ?> </td>
                                <td> <?php echo $message; ?> </td>

                                <td> 
                                    <a href="index.php?delete_email=<?php echo $mail_id; ?>">
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