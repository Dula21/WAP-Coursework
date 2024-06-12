
<?php
    include("config/constant.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- External CSS link for Montserrat font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">


    <style>
        body {
            font-family: 'Open Sans', sans-serif !important;
            margin: 20px;
            text-align: center;
            background-color: #dfe4ea;
        }

       
        iframe {
            margin-top: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
        }

        .contact {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        h2 {
            color: #555;
            font-family: 'Open Sans', sans-serif !important;

        }

        p {
            color: #777;
            line-height: 1.6;
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
        section {
            margin: 20px;
            text-align: right;
            font-family: 'Open Sans', sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 1%;
            
            
        }
        .clearfix {
            clear: both;
            float: none;
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
    <p style="color:white;"> If any Case ,Contact Us</p>

  </header>

<!-- Google Map Embed -->

   
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2591.652078754206!2d-117.29988615490585!3d49.491078793045574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x537cb6a67b4952a1%3A0xe9628c94e2a00cb3!2sOuter%20Clove%20Restaurant!5e0!3m2!1sen!2slk!4v1704175715698!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<!-- Contact Details -->
<div class="contact">
    <h2>Our Location</h2>
    <p>
        Address: Stanly street,Nelson, Sri Lanka<br>
        Phone: +94 456 789<br>
        Email: info@outerclove.com
    </p>
</div>

</body>
</html>
