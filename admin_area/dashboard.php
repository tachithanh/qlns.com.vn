
<?php 

    
if(!isset($_SESSION['admin_email'])){
    
    echo "<script>window.open('login.php','_self')</script>";
    
}else{

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> BẢNG ĐIỀU KHIỂN </h1>
        <ol class="breadcrumb">
            <li class="active">
            
                <i class="fa fa-dashboard"></i> Bảng điều khiển
            
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_products; ?> </div>
                            <div> Nhân viên </div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_customers">
                <div class="panel-footer">
                    <span class="pull-left"> 
                         Xem chi tiết
                    </span>
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_p_categories; ?> </div>
                            <div> Phòng ban </div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_p_cats">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                    <i class="fa fa-pie-chart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_customers; ?> </div>
                            <div> Tỉ lệ đúng giờ </div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_attendance">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check-circle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_pending_orders; ?> </div>
                            <div> Điểm danh hôm nay</div>
                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_attendance">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>



<?php 
}
?>