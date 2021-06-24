<div id="footer"><!--1-->
    <div class="container"><!--2-->
        <div class="row"><!--3-->
            <div class="col-sm-6 col-md-3"><!--4-->

                <h4>Trang</h4>

                <ul><!--5-->
                    <li><a href="../cart.php">Giỏ hàng</a></li>
                    <li><a href="../contact.php">Liên hệ</a></li>
                    <li><a href="../shop.php">Cửa hàng</a></li>
                    <li><a href="my_account.php">Tài khoản</a></li>
                </ul><!--5e-->

                <hr>

                <h4>Danh mục người dùng</h4>

                <ul><!--6-->
                    <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='../checkout.php'> Đăng nhập </a>";
                        }else{
                            echo "<a href='my_account.php?edit_account'> Chỉnh sửa tài khoản </a>";
                        }
                    ?>
                    <li>
                    <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='../checkout.php'> Đăng nhập </a>";
                        }else{
                            echo "<a href='my_account.php?my_orders'> Tài khoản </a>";
                        }
                    ?>
                    </li>
                </ul><!--6e-->

                <hr class="hidden-md hidden-lg hidden-sm">

            </div><!--4e-->

            <div class="com-sm-6 col-md-3"><!--7-->

                <h4>Danh mục sản phẩm hàng đầu</h4>
                <ul><!--8e-->
                    <?php
                        $get_p_cats = "select * from product_categories";
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            echo "
                                <li>
                                    <a href='../shop.php?p_cat_id'>
                                        $p_cat_title
                                    </a>
                                </li>
                            ";
                        }
                    ?>
                </ul><!--8e-->

                <hr class="hidden-md hidden-lg">
            
            </div><!--7e-->

            <div class="col-sm-6 col-md-3"><!--9-->
                <h4>Thông tin</h4>
                <p><!--10-->
                    <strong>Chí Thanh Media inc.</strong>
                    <br/>0942645121
                    <br/>chithanh151099@gmail.com
                    <br/><strong>Chí Thanh</strong>
                </p><!--10e-->

                <a href="../contact.php">Kiểm tra trang liên hệ của chúng tôi</a>

                <hr class="hidden-md hidden-lg">

            </div><!--9e-->
            <div class="col-sm-6 col-sm-3">
                <h4>Nhận tin tức</h4>
                <p class="text-muted">
                Đừng bỏ lỡ các sản phẩm cập nhật mới nhất của chúng tôi.
                </p>
                <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=M-devMedia', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" method="post"><!--12-->
                    <div class="input-group"><!--11-->
                        <input type="text" class="form-control" name="email">
                        <input type="hidden" value="M-devMedia" name="uri"/><input type="hidden" name="loc" value="en_US"/>

                        <span class="input-group-bin"><!--13-->
                            <input type="submit" value="Đăng ký" class="btn btn-default">
                        </span><!--13e-->
                    </div><!--11e-->
                </form><!--12e-->

                <hr>
                <h4>Giữ Liên Lạc</h4>

                <p class="social">
                    <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
                    <a href="https://twitter.com/" class="fa fa-twitter"></a>
                    <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
                    <a href="https://www.google.co.uk/?gws_rd=ssl" class="fa fa-google-plus"></a>
                    <a href="https://mail.google.com/" class="fa fa-envelope"></a>
                </p>

            </div>
        </div><!--3e-->
    </div><!--2e-->
</div><!--1e-->

<div id="copyright"><!--14-->
    <div class="container"><!--15-->
        <div class="col-md-6"><!--16-->

            <p class="pull-left">&copy; 2020 Chí Thanh Store All Rights Reserve</p>

        </div><!--16e-->
        <div class="col-md-6"><!--16-->

            <p class="pull-right">Theme by: <a href="#">Chí Thanh</a></p>

        </div><!--16e-->
    </div><!--15e-->
</div><!--14e-->