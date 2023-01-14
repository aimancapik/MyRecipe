<?php

session_start();

include("includes/db.php");
include("functions/functions.php");
include("includes/main.php");

?>


  <!-- Cover -->
  <main>
    <div class="bnner">
   <a href="shop.php" class="btn1">View all products
</a>
    </div>
    <!-- Main -->
    <div class="wrapper">
            <h1 style="color: black">Featured Collection<h1>
            
      </div>



    <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php

    getPro();

    ?>

    </div><!-- row Ends -->

    </div><!-- container Ends -->
   
    <?php

include("includes/footer.php");

?>
</body>

</html>
