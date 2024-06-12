<?php
    include("config/constant.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outer Clove Restaurant</title>

    <!-- External CSS link for Montserrat font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">

    <style>
        /* Your internal CSS styles go here */
        body {
            font-family: 'Open Sans', sans-serif;
            padding: 0;
            background-color: #dfe4ea;
            color: #333;
        }

        /* ... (rest of your styles) ... */

        section {
            margin: 20px;
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
        .image-gallery{
         border-radius: 5%;
         
         display: block;
         margin-left: auto;
          margin-right: auto;
         width: 40%;
  
        
        }
           .image-gallery:hover{
            transform: scale(1.05);
             opacity: 1.0;
}

        h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
            text-align: center;
            
            font-family: 'Open Sans', sans-serif;
        }

        .description {
            margin-bottom: 20px;
            text-align: center;
            
            font-family: 'Open Sans', sans-serif;
        }

        .offers {
            background-color: #ced6e0; /* Light yellow background */
            padding: 30px 0;
            text-align: center;
        }

        .offers h2 {
            color:#2ed573; /* Dark pink heading color */
            
            font-family: 'Open Sans', sans-serif;
        }

        .offers-description {
            
            font-family: 'Open Sans', sans-serif;
            font-size: 1.2rem;
            
        }

        .offer-highlight {
            font-weight: bold;
            color: #2ed573; /* Dark pink text color */
        }

        /* New Styles for Offer Details */
        .offer-details {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
            background-color: #ced6e0;
        }

        .offer-card {
            width: 30%;
            padding: 20px;
            margin: 10px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .offer-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
            
            font-family: 'Open Sans', sans-serif;
        }

        .offer-description {
            font-size: 1rem;
            color: #747d8c;
            margin-bottom: 15px;
           
            font-family: 'Open Sans', sans-serif;
        }

        .offer-validity {
            font-size: 0.9rem;
            color: #747d8c;
        }

       
        
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 1%;
            
            
        }
        .text-right {
            text-align: right;
        }
        fieldset{
    border: 1px solid white;
    margin: 5%;
    padding: 3%;
    border-radius: 5px;
}
.clearfix {
    clear: both;
    float: none;
}

.img-responsive {
    width: 100%;
   
}
.logo {
    width: 10%;
    float: left;
   }

   .container {
    width: 80%;
    margin: 0 auto;
    padding: 1%;
    
    
}

.img-responsive {
    width: 100%;
   
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
a {
            color: #2f3542;
            text-decoration: none;
        }

        a:hover {
            color: #747d8c;
        }
 /* CSS for Social */
 .social ul{
                   list-style-type: none;
                }
                  .social ul li{
                   display: inline;
                   padding: 1%;
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
    <header>
    <h1>The Outer Clove Restaurant</h1>
    <p>Welcome to Outer Clove heaven Reservation <Section></Section></p>
  </header>
     <!-- Header Section -->
     <section>
    <h2>Offers and Promotions</h2>
    <div class="description">
        <p class="description">
            Discover our latest offers and promotions that add a delightful touch to your dining experience at
            The Outer Clove Restaurant. From seasonal specials to exclusive discounts, there's always something
            to look forward to.
           
                        
        </p>
    </div>

    <!-- New Section for Offers and Promotions -->
    <div class="offers">
        <h2>Current Offers</h2>
        <p class="offers-description">
            Explore our <span class="offer-highlight">limited-time offers</span> designed to elevate your culinary journey.
            Don't miss out on the chance to indulge in extraordinary dishes at special prices.
            
        </p>

        <!-- New Offer Details Section -->
        <div class="offer-details">
            <!-- Offer Card 1 -->
            <div class="offer-card">
                <h3 class="offer-title">Weekend Feast</h3>
                <p class="offer-description">
                
                        <img src="images/weekend-feast.jpeg" alt="dine-in" class="image-gallery">
                        <br><br>
                    Enjoy a delectable weekend feast with a special 3-course menu. Perfect for family gatherings and celebrations.
                </p>
                <p class="offer-validity">Valid until: December 31, 2023</p>
            </div>

            <!-- Offer Card 2 -->
            <div class="offer-card">
                <h3 class="offer-title">Happy Hour Delights</h3>
                <p class="offer-description">
             
                        <img src="images/delight.jpeg" alt="dine-in" class="image-gallery">
                        <br><br>
                    Join us for Happy Hour and savor discounted prices on selected appetizers and beverages. Available every weekday from 4 PM to 6 PM.
                </p>
                <p class="offer-validity">Valid until: January 15, 2024</p>
            </div>

            <!-- Add more offer cards as needed -->
        </div>
        </div>
    </div>
</section>

                <!-- Add more reservation options as needed -->
      
            <br> <br>
            
   
    <!-- ... (remaining sections) ... -->

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
