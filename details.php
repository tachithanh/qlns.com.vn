<?php
    $active='Cart';
    include("includes/header.php");
?>
<?php error_reporting(0);?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    $pro_sale_price= $row_product['product_sale'];
    $product_price_format = number_format($pro_price, 0, ',', '.');
       
        
                
    $product_sale_format = number_format($pro_sale_price, 0, ',', '.');
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    $pro_label = $row_product['product_label'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
    if($pro_label ==""){

    }else{
        $product_label = "

            <a href='#' class='label $pro_label'>

                <div class='theLabel'> $pro_label </div>
                <div class='labelBackground'> </div>

            </a>

        ";
    }
    
    
}

?>


    <div id="content"><!--21-->
        <div class="container"><!--22-->
            <div class="col-md-12"><!--23-->
            
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Cửa hàng
                    </li>
                    <li>
                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                    </li>
                    <li> <?php echo $pro_title; ?></li>
                </ul>
            
            </div><!--23e-->
           
        <div class="col-md-12"><!--26-->
                <div id="productMain" class="row"><!--27-->
                    <div class="col-sm-6"><!--28-->
                        <div id="mainImage"><!--29-->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel"><!--30-->
                                <ol class="carousel-indicators"><!--31-->
                                    <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol><!--31e-->

                                <div class="carousel-inner" id="colmd">
                                    <div class="item active">
                                        <center><img  class="img-reponsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Yame 1"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-reponsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Yame 2"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-reponsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Yame 3"></center>
                                    </div>
                                </div>

                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div><!--30e-->
                        </div><!--29e-->

                        <?php echo $product_label; ?>

                    </div><!--28e-->

                    <div class="col-sm-6"><!--32-->
                        <div class="box"><!--33-->
                            <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                            <?php add_cart(); ?>
                            <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!--34-->
                                <div class="form-group"><!--35-->
                                    <label for="" class="col-md-5 control-label">Số lượng:</label>
                                    <div class="col-md-7">
                                        <input name="product_qty" type="number" class="form-control" value="1">
                                    </div>

                                </div><!--35e-->

                                <div class="form-group"><!--38-->
                                    <label class="col-md-5 control-label">Kích thước:</label>
                                    <div class="col-md-7"><!--39-->
                                        <select name="product_size" class="form-control"  required  oninput="setCustomValidity('')" oninvalid="setCustomValidity('Phải chọn 1 kích thước cho sản phẩm')"><!--40-->
                                            <option disabled>Chọn 1 Size</option>
                                            <option >Nhỏ</option>
                                            <option >Trung Bình</option>
                                            <option >Lớn</option>
                                         
                                        </select><!--40e-->
                                    </div><!--39e-->
                                </div><!--38e-->

                                <?php
                                        if($pro_label == "Giảm Giá"){
                                            echo"
                                            <p class='price'>
                                                <del>$product_price_format VNĐ</del> / 
                                                $product_sale_format VNĐ
                                            </p>
                                            ";
                                        }else{
                                            echo "
                                                <p class='price'>
                                                $product_price_format VNĐ 
                                               
                                                </p>
                                            ";
                                        }                                
                                ?>      
                                <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Thêm vào giỏ hàng</button></p>

                            </form><!--34e-->
                        </div><!--33e-->
                    <div class="row" id="thumbs"><!--41-->
                        <div class="col-xs-4"><!--42-->
                            <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"><!--43-->
                                <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Yame 1" class="img-responsive">
                            </a><!--43e-->
                        </div><!--42e-->
                        <div class="col-xs-4"><!--42-->
                            <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"><!--43-->
                                <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Yame 2" class="img-responsive">
                            </a><!--43e-->
                        </div><!--42e-->
                        <div class="col-xs-4"><!--42-->
                            <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"><!--43-->
                                <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Yame 3" class="img-responsive">
                            </a><!--43e-->
                        </div><!--42e-->

                    </div><!--41e-->    
                    </div><!--32e-->

                </div><!--27e-->
                <div class="box" id="details"><!--box begin-->
                        <h4>Chi Tiết Sản Phẩm</h4>
                    <p>
                        <?php echo $pro_desc; ?>
                    </p>

                    <h4>Size</h4>
                    <ul>
                        <li>Nhỏ</li>
                        <li>Trung Bình</li>
                        <li>Lớn</li>
                    </ul>
                    <h4>Đã bán:
                    <?php
                        $get_sold = "select * from pending_orders where product_id='$product_id'";

                        $run_sold = mysqli_query($con, $get_sold);

                        $count = mysqli_num_rows($run_sold);
                        
                        $total_quantity = 0;

                        while ($row_sold = mysqli_fetch_array($run_sold)) {

                            $product_quantity = $row_sold['qty'];

                            $total_quantity = $total_quantity + $product_quantity;

                        }
                        
                        echo $total_quantity;

                    ?></h4>
                    <h4>Kho: <?php
                       $t = 'Hết hàng';
                       if($amount != 0){
                            echo $amount;

                       }else{
                         echo $t;
                       } 
                        ?></h4>

                    <hr>
                </div><!--box end-->
                <div id="row same-heigh-row"><!--row same-heigh-row-->
                <div class="col-md-3 col-sm-6" id="cols"><!--col-md-3 col-sm-6-->
                    <div class="box same-height headline"><!--box same-height headline-->
                        <h3 class="text-center"> Có Thể Bạn Cũng Thích </h3>
                    </div><!--box same-height headline end-->
                </div><!--col-md-3 col-sm-6 end-->
                <?php
                    $get_products = "select * from products order by rand() LiMIT 0,3";
                    $run_products = mysqli_query($con,$get_products);
                    while($row_products=mysqli_fetch_array($run_products)){
                         
                        $pro_id = $row_products['product_id'];
                        
                        $pro_title = $row_products['product_title'];
                        
                        $pro_price = $row_products['product_price'];
                        $pro_sale_price= $row_products['product_sale'];
                        $product_price_format = number_format($pro_price, 0, ',', '.');
       
        
                
                         $product_sale_format = number_format($pro_sale_price, 0, ',', '.');
                        $pro_img1 = $row_products['product_img1'];
                        $pro_label = $row_products['product_label'];
                        if($pro_label == "Giảm Giá"){
                            $product_price = " <del> $product_price_format VND </del>";
                            $product_sale_price = "/ $product_sale_format VND";
                        }else{
                            $product_price = " $product_price_format VND ";
                            $product_sale_price = " ";
                        }

                        if($pro_label ==""){

                        }else{
                            $product_label = "

                                <a href='#' class='label $pro_label'>

                                    <div class='theLabel'> $pro_label </div>
                                    <div class='labelBackground'> </div>

                                </a>

                            ";
                        }
                        
                        echo "
                        
                        <div class='col-md-3 col-sm-6 center-responsive'>
                        
                            <div class='product'>
                            
                                <a href='details.php?pro_id=$pro_id'>
                                
                                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                
                                </a>
                                
                                <div class='text'>
                                
                                    <h3>
                            
                                        <a href='details.php?pro_id=$pro_id'>

                                            $pro_title

                                        </a>
                                    
                                    </h3>
                                    
                                    <p class='price'>
                                    
                                $product_price &nbsp;$product_sale_price
                                    
                                    </p>
                                    
                                    <p class='button'>
                                    
                                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                        Chi tiết

                                        </a>
                                    
                                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                            <i class='fa fa-shopping-cart'></i> Thêm vào giỏ

                                        </a>
                                    
                                    </p>
                                
                                </div>

                                $product_label
                            
                            </div>
                        
                        </div>
                        
                        ";
                    }
                ?>
        </div><!--row same-heigh-row end-->

        </div><!--26e-->

            
        </div><!--22e-->
    </div><!--21e-->


    <?php

         include("includes/footer.php");
    
    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
</body>
</html> 