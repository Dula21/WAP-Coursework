
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
            background-color: #f8f8f8;
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
        }

        .description {
            margin-bottom: 20px;
            text-align: center;
        }

        /* New Section for Reservations */
        .reservation-section {
            background-color: #dfe4ea; /* Light yellow background */
            padding: 30px 0;
            text-align: center;
          
            height: 1000px;
        }

        .reservation-section h2 {
            color: #2ed573; /* Red heading color */
        }

        .reservation-description {
            font-size: 1.2rem;
        }

        /* New Styles for Reservation Options */
        .reservation-options {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
            
        }

        .reservation-option {
            width: 50%;
            padding: 20px;
            margin: 10px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .reservation-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .reservation-description {
            font-size: 1rem;
            color: #747d8c;
            text-align: center;
        }
        .button {
            background-color: #57606f; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            
            display: block;
            margin: auto;
        }
        .button:hover{
            background-color:#a4b0be ;

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
    <!-- ... (previous sections) ... -->

     <!-- Header Section -->
  <header>
    <h1>The Outer Clove Restaurant</h1>
    <p>Welcome to Outer Clove heaven Reservation <Section></Section></p>
  </header>


    <section>
        <h2>Reservations</h2>
        <div class="description">
            <p class="description">
                Secure your spot at The Outer Clove Restaurant by making a reservation. Choose between table reservations
                for an intimate dining experience or event reservations for special occasions and gatherings.
            </p>
            <img src="images/reservation5.jpeg" alt="dine-in" class="image-gallery">
        </div>

        <!-- New Section for Reservations -->
        <div class="reservation-section">
            <h2>Make a Reservation</h2>
            <p class="reservation-description">
                Plan your visit by selecting the reservation option that suits your preferences. We look forward to
                providing you with an unforgettable dining experience.
            </p>

            <!-- New Reservation Options Section -->
            <div class="reservation-options">
                <!-- Table Reservation Option -->
                <div class="reservation-option">
                    <h3 class="reservation-title">Table Reservation</h3>
                    <p class="reservation-description">
                        Reserve a table for a personalized dining experience. Whether it's a romantic dinner or a casual
                        get-together, we ensure a memorable time.
                        <br><br>
                        <img src="images/tbl_reservation.jpeg" alt="dine-in" class="image-gallery">
                    </p>
                </div>

                <!-- Event Reservation Option -->
                <div class="reservation-option">
                    <h3 class="reservation-title">Event Reservation</h3>
                    <p class="reservation-description">
                        Host your special events with us. From birthdays to corporate gatherings, our dedicated event
                        spaces cater to your unique needs.
                        <br><br>
                        <img src="images/evt_reservation.jpeg" alt="dine-in" class="image-gallery">
                    </p>
                </div>
                

                <!-- Add more reservation options as needed -->
            </div>
            <br> <br>
            <a href="<?php echo SITEURL;?>reservation-form.php"> Make Your Reservation Toady</a>



<br><br>
   
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
