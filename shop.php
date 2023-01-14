<?php
session_start();

include("includes/db.php");
include("functions/functions.php");
include("includes/main.php");
?>
<!-- MAIN -->
<main>
    <!-- HERO -->
    <div class="nero">
        <div class="nero__heading">
            <span class="nero__bold">Recipes</span>
        </div>
        <p class="nero__text">
        </p>
    </div>
</main>


<div id="content" ><!-- content Starts -->
    <div class="container" ><!-- container Starts -->

        <?php getProducts(); ?>

        <div class="col-md-9" ><!-- col-md-9 Starts --->


          


            <center><!-- center Starts -->

                <ul class="pagination" ><!-- pagination Starts -->

                  <?php getPaginator(); ?>

                </ul><!-- pagination Ends -->

            </center><!-- center Ends -->



        </div><!-- col-md-9 Ends --->

    </div><!-- container Ends -->
</div><!-- content Ends -->



<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script>

$(document).ready(function () {

/// Hide And Show Code Starts ///

    $('.nav-toggle').click(function () {

        $(".panel-collapse,.collapse-data").slideToggle(700, function () {

            if ($(this).css('display') == 'none') {

                $(".hide-show").html('Show');

            } else {

                $(".hide-show").html('Hide');

            }

        });

    });

/// Hide And Show Code Ends ///


});



</script>


<script>


    $(document).ready(function () {

        // getProducts Function Code Starts

        function getProducts() {


        }



    });

</script>

</body>

</html>
