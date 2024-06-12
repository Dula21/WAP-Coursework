<?php
    include("config/constant.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outer Clove Restaurant</title>
    <!-- Example for Google Fonts CDN -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:400,700|Dancing+Script:400,700|Open+Sans:400,700|Playfair+Display:400,700&display=swap">
<style>
body {
            
            margin: 0;
            padding: 0;
            background-color: #dfe4ea;
            
        }
           header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-family: 'Open Sans', sans-serif;
        }
        
        header h1 {
            margin: 0;
        }

        header p {
            margin: 10px 0;
            font-family: 'Open Sans', sans-serif;
        }

        section {
            margin: 20px;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
        }

           h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
        }
        .image-gallery{
         border-radius: 5%;
         
         display: block;
         margin-left: auto;
          margin-right: auto;
         width: 25%;
  
        
        }
        .clearfix {
            clear: both;
            float: none;
        }
        
        .img-responsive {
            width: 100%;
           
        }
        a {
            color: #2f3542;
            text-decoration: none;
        }

        a:hover {
            color: #747d8c;
        }
           .image-gallery:hover{
              transform: scale(1.05);
              opacity: 1.0;
         }
.text-right {
            text-align: right;
        }
  /* CSSS for navbar section */

           .logo {
            width: 10%;
            float: left;
           }

        .menu {
            line-height: 60px;
        }

        .menu ul {
            list-style-type: none;
        }

        .menu ul li {
            display: inline;
            padding: 1%;
            font-weight: bold;
        }
        
        .text-center {
            text-align: center;
        }

            /* CSS for Social */
                  .social ul{
                   list-style-type: none;
                }
                  .social ul li{
                   display: inline;
                   padding: 1%;
                }

            .About-description{
               
               background-color: #ced6e0;
               font-family: 'Open Sans', sans-serif;
               float: center;
               width: 100%;
               margin: 1%;
               height: 500px;
               border-radius: 10px;
             display: flex;
             flex-direction: column;
            align-items: center;
              justify-content: space-between;
           }
           .container {
            width: 80%;
            margin: 0 auto;
            padding: 1%;
            
            
        }
        
        div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
  font-size: large;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

</style>
</head>


<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo2.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL;?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>foods.php">Foods</a>
                    </li>
                  
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->


     <!-- Header Section -->
  <header>
    <h1>The Outer Clove Restaurant</h1>
    <p>Welcome to The Heaven's Restaurant</p>
  </header>
  
  <section class="About-description">
        <h2>About Us</h2>
        
        <p>
            The Outer Clove Restaurant is not just a place to dine; it's an exquisite culinary journey that combines
            flavors, aesthetics, and warmth. Nestled in the heart of many cities in Sri Lanka, our restaurant chain
            invites you to indulge in a world of delectable dishes and unparalleled hospitality.

            Our commitment to excellence is reflected in every aspect of your dining experience. From the carefully
            curated menu featuring a fusion of global cuisines to the cozy ambiance that sets the perfect mood for
            any occasion, we strive to make each visit memorable.

            At The Outer Clove, we believe in the power of good food to bring people together. Whether you're
            savoring our signature dishes, enjoying a casual get-together, or celebrating a special moment, we
            are dedicated to providing exceptional service and culinary delights that exceed your expectations.

            </p>
            <img src="images/images.jpeg" alt="about us" class="image-gallery">
            
        
    </section>

    



    <!--image gallery start here-->
    <h2>Our Capacities</h2>

<h4 style="text-align:center; font-family: 'Open Sans', sans-serif;">Drive into through our Capacittes.</h4>

<div class="responsive">
  <div class="gallery">
   
      <img src="images/delivery1.png.jpeg" alt="serivices" width="600" height="400">
   
    <div class="desc"><a target="_blank" href="<?php echo SITEURL;?>services.php"> Services</a></div>
  </div>
</div>


<div class="responsive">
  <div class="gallery">
    
      <img src="images/promotions3.jpeg" alt="Promotions" width="200%" height="100%">
   
    <div class="desc"><a target="_blank" href="<?php echo SITEURL;?>offers&promotions.php"> Offers And Promotions </a></div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    
      <img src="images/facilities.jpeg" alt="Facilities" width="600" height="400">
    
    <div class="desc"><a target="_blank " href="<?php echo SITEURL;?>Facilities.php"> Facilities </a></div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    
      <img src="images/reservations.jpeg" alt="reservations" width="600" height="400">
    
    <div class="desc"><a target="_blank " href="<?php echo SITEURL;?>Reservations.php"> Reservations</a></div>
  </div>
</div>

<div class="clearfix"></div>

<div style="padding:6px;">
  <p style="text-align:center;font-size:medium;font-family: 'Open Sans', sans-serif;">Drive through into outer clove restaurant serives and feel free to experince of heavenly level.</p>
</div>

</body>
</html>






  <!-- Footer Section -->
  <!-- social Section Starts Here -->
 <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Dulasi Nethma</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>