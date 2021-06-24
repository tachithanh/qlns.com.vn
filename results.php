<?php
    $active='Home';
    include("includes/header.php")

?>

    
<!----------------------x---------------------#content---------------------x--------------------------->

    <div id="content" class="container"> <!-- container Begin -->

        <div class="row"> <!--row Begin -->

          <?php
          
            getsearch();
          
          ?>          

        </div> <!--row Finish -->

    </div> <!-- container Finish -->

    <?php

        include("includes/footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

    
</body>
</html>