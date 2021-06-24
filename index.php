<?php
    $active='Home';
    include("includes/header.php")
?>
    <div class="container" id="slider"><!--21-->
        <div class="col-md-12"><!--22-->
            <div class="carousel slide" id="myCarousel" data-ride="carousel"><!--23-->
                <ol class="carousel-indicators"><!--24-->
                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol><!--24-->
                <div class="carousel-inner"><!--25-->
                    <?php
                        $get_slides = "select * from slider LIMIT 0,1";
                        $run_slides = mysqli_query($con,$get_slides);
                        while($row_slides=mysqli_fetch_array($run_slides)){
                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];
                            $slide_url = $row_slides['slide_url'];
                            echo "
                            <div class='item active'>
                                <a href='$slide_url'>
                                    <img src='admin_area/slides_images/$slide_image'>
                                </a>
                            </div>
                            ";
                        }
                        $get_slides = "select * from slider LIMIT 1,3";
                        $run_slides = mysqli_query($con,$get_slides);
                        while($row_slides=mysqli_fetch_array($run_slides)){
                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];
                            $slide_url = $row_slides['slide_url'];

                            echo "
                            <div class='item'>
                                <a href='$slide_url'>
                                    <img src='admin_area/slides_images/$slide_image'>
                                </a>
                            </div>
                            ";
                        }
                    ?>
                </div><!--25-->
                <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!--26-->
                    <span class="glyphicon glyphicon-chevron-left">
                    <span class="sr-only">Previous</span>
                    </span>
                </a><!--26-->
                <a href="#myCarousel" class="right carousel-control" data-slide="next"><!--26-->
                    <span class="glyphicon glyphicon-chevron-right">
                    <span class="sr-only">Next</span>
                    </span>
                </a><!--26-->
            </div><!--23-->
        </div><!--22-->
    </div><!--21-->

    
    <div id="advantages"><!--26-->
        <div class="container"><!--27-->
            <div class="same-height-row"><!--28-->
            <?php
                $get_boxes = "select * from boxes_section";
                $run_boxes = mysqli_query($con,$get_boxes);
                while($run_boxes_section=mysqli_fetch_array($run_boxes)){
                    $box_id = $run_boxes_section['box_id'];
                    $box_title = $run_boxes_section['box_title'];
                    $box_desc = $run_boxes_section['box_desc'];
               

            ?>
                <div class="col-sm-4"><!--29-->
                    <div class="box same-height"><!--30-->
                        <div class="icon"><!--31-->
                            <i class="fa fa-heart">
                            </i>
                        </div><!--31e-->
                        <h3><a href="#"><?php echo $box_title; ?></a></h3>
                        
                        <p> <?php echo $box_desc; ?> </p>
                    </div><!--30e-->
                </div><!--29e-->
            
            <?php  } ?>
            </div><!--28e-->
        </div><!--27e-->
    </div><!--26e-->

    <div id="hot"><!--32-->
       <div class="box"><!--33-->
            <div class="container"><!--34-->
                <div class="col-md-12"><!--35-->
                    <h2>
                        Sản phẩm mới nhất của chúng tôi
                    </h2>
                </div><!--35e-->
            </div><!--34e-->
       </div> <!--33e-->
    </div><!--32e-->

    <div id="content" class="container"><!--36-->
        <div class="row"><!--37-->
            <?php
                getPro();
            ?>
        </div><!--37e-->
    </div><!--36e-->
    </div>
            <div class="ctaContainer anime" style="text-align: center; text-decoration: none !importain;" >
                <a href="shop.php" id="not" class="cta cta01" style ="background:rgb(79, 191, 168)">xem thêm</a>
            </div>
        </div>

    <div id="scrollme">
        <div class="backtop">
            <span class="arrow-top" id="now">
                <p>về đầu trang</p>
            </span>
        </div>
    </div>
    <?php

         include("includes/footer.php");
    
    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/swiper-bundle.js"></script>
    
    <!--General-->
    <script src="js/main.js"></script>
    <script src="js/backTop.js"></script>
    
</body>
</html>