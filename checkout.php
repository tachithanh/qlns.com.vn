<?php
     $active='Account';
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
                        Hình thức thanh toán
                    </li>
                </ul>
            
            </div><!--23e-->
           
            <div class="col-md-12">
            <?php
               if(!isset($_SESSION['customer_email'])) {
                   include("customer/customer_login.php");
               }else{
                   include("payment_options.php");
               }
            ?>
            </div>
         </div><!--22e-->
 </div><!--21e-->


    <?php

         include("includes/footer.php");
    
    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
</body>
</html> 


