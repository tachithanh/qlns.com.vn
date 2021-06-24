<?php
     $active='Contact';
    include("includes/header.php")
?>

    <div id="content"><!--21-->
        <div class="container"><!--22-->
            <div class="col-md-12"><!--23-->
            
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Liên hệ chúng tôi
                    </li>
                </ul>
            
            </div><!--23e-->
            
          
            <!-- Form search -->
            
            <!--end Form search-->
                
           

     
    <!--end Navigation-->

    <!--Content-->
    <div class="col-md-7">
        <div class="content">
            <div class="wrapper_title">
                <h3 class="section-title"><b>Liên Hệ</b> </h3>
            </div>
            <div class="info">
                <div class="info_map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d1005012.6027410079!2d105.48115119601464!3d10.27523916326085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x31a0f1d1e88956ef%3A0xef7a6de6658fee0c!2zxJDhuqFpIEjhu41jIEPhuqduIFRoxqEgS2h1IEjDsmEgQW4sIEjDsmEgQW4sIFBo4bulbmcgSGnhu4dwLCBI4bqtdSBHaWFuZywgVmnhu4d0IE5hbQ!3m2!1d9.7609935!2d105.60451599999999!4m5!1s0x31752f2ac7637765%3A0x309ec471b3da0614!2zMTAzIFRy4bqnbiBRdWFuZyBEaeG7h3UsIFBoxrDhu51uZyAxNCwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!3m2!1d10.790550099999999!2d106.6779395!5e0!3m2!1svi!2sus!4v1617162866791!5m2!1svi!2sus" width="1120" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="info_content">
                    <p><b>ĐỊA CHỈ:</b>138 Trần Quang Diệu st, Quận 3, HCM.</p>   
                    <p><b>MỞ HÀNG NGÀY:</b> 9:00 AM - 10:00 PM.</p>
                    <p><b>SỐ ĐIỆN THOẠI:</b> 0942.645.121</p>
                    <p><b>ĐỂ ĐẶT HÀNG</b> vui lòng inbox  <a href="https://www.facebook.com/"> Facebook</a> của chúng tôi hoặc truy cập trang <a href="http://localhost/chithanh-Store/">Web</a> của chúng tôi.</p>
                </div>
            </div>
        </div>
    </div>

    <!--script swiper-->
    <script src="js/swiper.min.js"></script>
    <!--script-->
    <script src="js/main.js"></script>
    <script  src="js/mobile_menu.js"></script>

    <script src="js/jquery-331.min.js"></script>

    <script>

    $(document).ready(function(data) {

        $(document).on('keyup','.quantity',function() {

                var id = $(this).data("product_id");
                var quantity = $(this).val();

                if(quantity !='') {

                    $.ajax({

                        url: "change.php",
                        method: "POST",
                        data:{id:id, quantity:quantity},

                        success:function() {
                            $("body").load("cart_body.php");
                        }

                    });

                }

        });

    });

    </script>
</body>
</html>
