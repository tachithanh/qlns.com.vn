<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>



<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Trang Admin</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                    <i class="fa fa-fw fa-user"></i> Hồ sơ 
                </a>
                </li>
                <li>
                <a href="index.php?view_products">
                    <i class="fa fa-fw fa-envelope"></i> Danh sách nhân viên 
                    <span class="badge"> <?php echo $count_products; ?></span>
                </a>
                </li>
                <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> Chức vụ
                    <span class="badge"> <?php echo $count_customers; ?> </span>
                </a>
                </li>
                <li>
                <a href="index.php?view_cats">
                    <i class="fa fa-fw fa-gear"></i> Phòng ban
                    <span class="badge"> <?php echo $count_p_categories; ?></span> 
                </a>
                </li>
                <li class="divider"></li>
                <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Đăng xuất
                    
                </a>
                </li>

            </ul>
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Bảng điều khiển
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#user">
                    <i class="fa fa-fw fa-users"></i> Nhân viên
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="user" class="collapse">
                    <li>
                        <a href="index.php?insert_customers"> Thêm nhân viên </a>
                    </li>
                    <li>
                        <a href="index.php?view_customers"> Xem nhân viên </a>
                    </li>
                    <li>
                        <a href="index.php?customers_profile=<?php echo $admin_id; ?>"> Chỉnh sửa nhân viên </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_customers">
                     <i class="fa fa-fw fa-users"></i> Điểm danh
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                    <i class="fa fa-fw fa-edit"></i> Phòng ban
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_p_cat"> Thêm phòng ban </a>
                    </li>
                    <li>
                        <a href="index.php?view_p_cats"> Xem danh sách phòng ban </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                    <i class="fa fa-fw fa-book"></i> Chức vụ
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?insert_cat"> Thêm chức vụ </a>
                    </li>
                    <li>
                        <a href="index.php?view_cats"> Xem chức vụ </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                    <i class="fa fa-fw fa-gear"></i> Chuyên môn
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slide"> Thêm chuyên môn </a>
                    </li>
                    <li>
                        <a href="index.php?view_slides"> Xem chuyên môn </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#boxes">
                    <i class="fa fa-fw fa-dropbox"></i> Quản lý mức lương
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="boxes" class="collapse">
                    <li>
                        <a href="index.php?insert_box"> Thêm mức lương </a>
                    </li>
                    <li>
                        <a href="index.php?view_boxes"> Xem mức lương </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#coupon">
                    <i class="fa fa-fw fa-book"></i> Trình độ
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="coupon" class="collapse">
                    <li>
                        <a href="index.php?insert_coupon"> Thêm trình đô </a>
                    </li>
                    <li>
                        <a href="index.php?view_coupons"> Xem trình độ </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#ship">
                    <i class="fa fa-fw fa-dropbox"></i> Khen thưởng
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="ship" class="collapse">
                    <li>
                        <a href="index.php?insert_ship"> Thêm khen thưởng </a>
                    </li>
                    <li>
                        <a href="index.php?view_ships"> Xem khen thưởng </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#ships">
                    <i class="fa fa-fw fa-dropbox"></i> Kỷ luật
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="ships" class="collapse">
                    <li>
                        <a href="index.php?insert_ship"> Thêm kỷ luật </a>
                    </li>
                    <li>
                        <a href="index.php?view_ships"> Xem kỷ luật </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-fw fa-users"></i> Admin
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user"> Thêm admin </a>
                    </li>
                    <li>
                        <a href="index.php?view_users"> Xem admin </a>
                    </li>
                    <li>
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Chỉnh sửa admin </a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="logout.php">
                     <i class="fa fa-fw fa-power-off"></i> Đăng xuất
                </a>
            </li>
        </ul>
    </div>
</nav>

    <?php } ?>