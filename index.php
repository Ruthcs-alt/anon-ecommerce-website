<?php
$con= mysqli connect('localhost','root','amruth ecom');
mysqli_select-db($con,'amruth ecommerce');
$sql="SELECT * FROM products WHERE featured=1";
 
?>
<!DOCTYPE html>
<html>
    <head>

        <title>AMRUTH  Ecomemrce Shop</title>
              <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>

 	<a href="home.html">Home</a>
  <a href="home.html">about us</a>
  <a href="home.html">services</a>
  <a href="home.html">contact us </a>

           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">

                       <h1> AMRUTH Ecommerce store</h1>
                       <p>Best choice for expats who live far away home</p>
                       <a href="products.php" class="btn btn-danger">order now</a>

                   </center>
                   <div class="column">

 			   	<ul id="nav" class="nav">

              <li><a href="#">would you like to get fast service wherever you are with  us? </a></li>


 			   	</ul> <!-- end #nav -->

 	   	</div>


           </div>
           <div class="container">

               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="products1.php">
                                <img src="img/eld care.jpg" alt="care">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize" font="bold">Home care </p>
                                        <p>Our parents need extra care everyday and we must do everything we can
                                          to make their life more convinenent. we offer services they neeed such as housekeeping,
                                          nursing and serveral services. place your order for your beloved parents they all
                                          deserve it! <br></p>
                                        <input type="button" value="view service" onclick="location='products1.php'" />

                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/bills.jpg" alt="Bills">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">Delviery services</p>
                                    <p> our store presents you fast and reliable service to your place. our fast couriers
                                      deliver products you need as soon as the order is sumbmitted. enjoy our Fast
                                      services. we offer delivery services for all kind of services feel free to
                                      order us any time.</p><br>
   <input type="button" value="view service" onclick="location='products2.php'" />
                                </div>
                           </center>
                       </div>
                   </div>

                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/medcine.jpg" alt="medcine">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">emergency services</p>
                                   <p> in a world full of unpredictable events happening to us everyday our Store
                                     with a collabration of red cross we offer our customers fast service during Emergencytimes
                                     order us now to benefit from this services!</p><br>
  <input type="button" value="view service" onclick="location='products3.php'" />

                               </div>
                           </center>
                       </div>
                   </div>

               </div>
           </div>
            <br><br> <br><br><br><br>
            <?php
             while($products = mysqli_fetch_assoc($featured)):
             ?>
           <div class="col-md-5">
             <h4> <?= $product['title'];?></h4>
             <img src="<?= $products['img'];?>" alt="<?$products1['title'];?>"/>
             <p class='price'>Rs <? $products['price'];?></p>
             <a href="products.php">
               <button type="button" class="btn btn-success" data-toggle="model" data- target="#products-1">More</button>
             </a>
           <?php endwhile;?>
           <footer class="footer">
               <div class="container">
               <center>
                   <p>Copyright &copy Lifestyle Store. All Rights Reserved. | Contact Us: +861 7641551738</p>
                   <p>This website is developed by Ruth seyeme</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
