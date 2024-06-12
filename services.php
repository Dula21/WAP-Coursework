
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

        .option,
        .description {
            margin-bottom: 20px;
            font-family: 'Open Sans', sans-serif;
        }

        .option h3,
        .description h3 {
            color: #333;
            font-family: 'Open Sans', sans-serif;
        }

        /*footer {
            background-color: #a4b0be;
            color: #747d8c;
            text-align: center;
          
            position: fixed;
            
            
        }*/

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 1%;
            
            
        }
        

        .img-responsive {
            width: 100%;
           
        }

        .img-curve {
            border-radius: 15px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-white {
            color: white;
        }

        .clearfix {
            clear: both;
            float: none;
        }

        a {
            color: #2f3542;
            text-decoration: none;
        }

        a:hover {
            color: #747d8c;
        }

        .btn {
            padding: 1%;
            border: none;
            font-size: 1rem;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #ff6b81;
            color: white;
            cursor: pointer;
        }

        .btn-primary:hover {
            color: white;
            background-color: #ff4757;
        }

        h3 {
            font-size: 1.5rem;
            font-family: 'Open Sans', sans-serif;
        }

        .float-container {
            position: relative;
        }

        .float-text {
            position: absolute;
            bottom: 50px;
            left: 40%;
        }

        fieldset {
            border: 1px solid white;
            margin: 5%;
            padding: 3%;
            border-radius: 5px;
        }
        .image-gallery{
         border-radius: 5%;
         
         display: block;
         margin-left: auto;
          margin-right: auto;
         width: 25%;
  
        
        }
.image-gallery:hover{
    transform: scale(1.05);
    opacity: 1.0;
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
        /* CSS for Social */
        .social ul{
          list-style-type: none;
                }
              .social ul li{
             display: inline;
             padding: 1%;
            }
            .dining-options{
                background-color: #ced6e0;
                font-family: 'Open Sans', sans-serif;
                
                float: center;
                width: 100%;
                margin: 1%;
                height: 1200px;
                border-radius: 10px;
              display: flex;
              flex-direction: column;
             align-items: center;
               justify-content: space-between
            }
            .detailed-descriptions{
                background-color: #ced6e0;
                font-family: 'Open Sans', sans-serif;
                
                float: center;
                width: 100%;
                margin: 1%;
                height: 1200px;
                border-radius: 10px;
              display: flex;
              flex-direction: column;
             align-items: center;
               justify-content: space-between;
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
                    
                    <li>
                        <a href="#">Contact</a>
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
    <p>Welcome to Outer Clove heaven Services</p>
  </header>

  

  <!-- Dining Options Section -->
  <section class="dining-options">
    <h2>Dining Options</h2>
    <div class="option">
    
      <h3>Dine-In</h3>
      <img src="images/dine-in.png.jpeg" alt="dine-in" class="image-gallery">
      <p>Experience the vibrant atmosphere of "The Outer Clove" restaurant by choosing the dine-in option. Our well-designed and cozy dining areas provide the perfect setting for a delightful culinary experience. Enjoy personalized service and savor your favorite dishes in a comfortable and inviting environment.</p>
    </div>
    </div>

    <div class="option">
      <h3>Takeout</h3>
      <img src="images/takeout2.png.jpeg" alt="take-out" class="image-gallery">
      <p>For those on the go or looking to enjoy our delicious meals at their own pace, we offer convenient takeout services. Simply place your order, and we'll prepare your food with the same care and attention to detail. Take the flavors of "The Outer Clove" with you wherever you are.</p>
    </div>

    <div class="option">
      <h3>Delivery</h3>
      <img src="images/delivery.png.jpeg" alt="dine-in" class="image-gallery">
      <p>Indulge in our mouthwatering cuisine without leaving the comfort of your home. Our delivery service brings the delectable tastes of "The Outer Clove" directly to your doorstep. Whether you're hosting an event or simply craving our specialties, our delivery option ensures a hassle-free and flavorful experience.</p>
    </div>
  </section>

  <!-- Detailed Descriptions Section -->
  <section class="detailed-descriptions">
    <h2>Detailed Descriptions</h2>

    <div class="description">
      <h3>Exquisite Menu Selection</h3>
      <img src="images/menu-selection.png.jpeg" alt="dine-in" class="image-gallery">
      <p>Explore a diverse and carefully crafted menu featuring a wide array of culinary delights. From appetizers that tantalize your taste buds to main courses showcasing culinary expertise, our menu is a celebration of flavors.</p>
    </div>

    <div class="description">
      <h3>Chef's Specials</h3>
      <img src="images/chef-special3.png.jpeg" alt="dine-in" class="image-gallery">
      <p>Immerse yourself in the Chef's Specials, where our culinary experts showcase their creativity and passion for gastronomy. These signature dishes highlight seasonal ingredients and innovative cooking techniques.</p>
    </div>

    <div class="description">
      <h3>Beverage Offerings</h3>
      <img src="images/beverage.png.jpeg" alt="dine-in" class="image-gallery">
      <p>Quench your thirst with our thoughtfully curated selection of beverages. From refreshing non-alcoholic options to carefully chosen wines and cocktails, our drink menu complements the culinary journey at "The Outer Clove."</p>
    </div>
  </section>

  

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
