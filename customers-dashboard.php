<?php include('config/constant.php');?>
<?php
// Retrieve the username from the URL
$Username = $_GET['username'];
?>
<?php
//session_start();
//if (!isset($_SESSION['customer'])) {
   // header('location: login/login.php');
   // exit();
//}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/customer.css">
    <title>Customer Dashboard</title>
</head>
<body>
    <header>
    <h1>Welcome <?php echo $Username; ?>!</h1>
        <nav>
            <ul>
                <li><a href="#profile">Profile</a></li>
                <li><a href="#order-history">Order History</a></li>
                <li><a href="#reservation-history">Reservation History</a></li>
                <li><a href="#feedback-history">Feedback History</a></li>
                <li><a href="#account-settings">Account Settings</a></li>
                <li><a href="#special-offers">Special Offers</a></li>
                <li><a href="#support">Support</a></li>
                <li><a href="<?php echo SITEURL;?>login/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Outer Clove User Dashboard</h2>
        <div class="description">
            <p class="description">
                <br>
            
            <br>
               welcome to Outer Clove restaurant user dashboard . Feel free to enjoy our latest serives through this user profile.
            </p>
        </div>

        <!-- New Section for Restaurant Details -->
        <div class="section-details">
            <h2>For the customers our Latest profile services availabe in here.</h2>
            <p class="facilities-description">
                Discover the exceptional facilities and services that make The Outer Clove a preferred choice for dining
                enthusiasts. 
            </p>

            <!-- New Facility Cards Section -->
            <div class="facility-cards">
                <!-- Facility Card 1 -->
                <div class="facility-card">
                    <h3 class="facility-title">Give a Feeback</h3>
                    <p class="facility-description">
                        <br>
                    
                    <br>
                        If you want apppericiate our work or want to enlight our contributions or want to give sugesstions then no worries
                        then here you go . <a href="<?php echo SITEURL;?>feedback-form.php"> Give Your Valueble feedback here</a>
                    </p>
                </div>

                <!-- Facility Card 2 -->
                <div class="facility-card">
                    <h3 class="facility-title">Do a Rservation</h3>
                    <p class="facility-description">
                        <br>
                       
                        <br>
                       Want to a reservation ? then No worries pay later. Do a reservation in our retaurant and make it memoriable <a href="<?php echo SITEURL;?>reservation-form.php"> Make your reservation today</a>
                    </p>
                </div>

                <!-- Add more facility cards as needed -->
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2023 Your Company Name</p>
    </footer>

</body>
</html>
