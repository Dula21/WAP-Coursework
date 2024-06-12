
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
            font-family: 'Open Sans', sans-serif !important;
            margin: 0;
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
            font-family: 'Open Sans', sans-serif !important;
        }

        header h1 {
            margin: 0;
        }

        header p {
            margin: 10px 0;
            font-family: 'Open Sans', sans-serif !important;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
            text-align: center;
            font-family: 'Open Sans', sans-serif !important;

        }

        .description {
            margin-bottom: 20px;
            font-family: 'Open Sans', sans-serif !important;
            text-align: center;
        }
        .description-gallery{
            display: block;
            margin-left: auto;
            margin-right: auto;
             width:30%;
            border-radius: 5%;
        }
        .description-gallery:hover{
            transform: scale(1.05);
             opacity: 1.0;
        }

        /* New Section for Restaurant Details */
        .restaurant-details {
            background-color: #ced6e0; /* Light blue background */
            padding: 30px 0;
            text-align: center;
        }

        .restaurant-details h2 {
            color: #00b894; /* Green heading color */
        }

        .facilities-description {
            font-size: 1.2rem;
            font-family: 'Open Sans', sans-serif;
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

        /* New Styles for Facility Cards */
        .facility-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .facility-card {
            width: 30%;
            padding: 20px;
            margin: 10px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .facility-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .facility-description {
            font-size: 1rem;
            color: #747d8c;
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
    <!-- ... (previous sections) ... -->
    <header>
    <h1>The Outer Clove Restaurant</h1>
    <p>Welcome to Outer Clove heaven Facilities section <Section></Section></p>
  </header>

    <section>
        <h2>Outer Clove Reataurnat Facilities</h2>
        <div class="description">
            <p class="description">
                <br>
            <img src="images/seating1.png" alt="dine-in" class="description-gallery">
            <br>
                Explore the amenities and offerings at The Outer Clove Restaurant. We provide a comfortable and welcoming
                environment for you to enjoy memorable dining experiences.
            </p>
        </div>

        <!-- New Section for Restaurant Details -->
        <div class="restaurant-details">
            <h2>Facilities and Offerings</h2>
            <p class="facilities-description">
                Discover the exceptional facilities and services that make The Outer Clove a preferred choice for dining
                enthusiasts. From spacious seating to convenient parking, we ensure a delightful experience for every guest.
            </p>

            <!-- New Facility Cards Section -->
            <div class="facility-cards">
                <!-- Facility Card 1 -->
                <div class="facility-card">
                    <h3 class="facility-title">Spacious Seating</h3>
                    <p class="facility-description">
                        <br>
                    <img src="images/seating.jpg" alt="dine-in" class="image-gallery">
                    <br>
                        Our restaurant offers spacious and comfortable seating arrangements, perfect for intimate dinners
                        or large gatherings.
                    </p>
                </div>

                <!-- Facility Card 2 -->
                <div class="facility-card">
                    <h3 class="facility-title">Ample Parking</h3>
                    <p class="facility-description">
                        <br>
                        <img src="images/parking.jpg" alt="dine-in" class="image-gallery">
                        <br>
                        Enjoy the convenience of ample parking space, ensuring a hassle-free experience for our valued
                        customers.
                    </p>
                </div>

                <!-- Add more facility cards as needed -->
            </div>
        </div>
    </section>

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
