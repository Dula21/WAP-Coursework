<?php include("config/constant.php");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Reservation Form</title>
    <link rel="stylesheet" type="text/css" href="CSS/reserv.css"> <!-- Link to  CSS file -->
</head>
<body>

    <div class="container">
        <h2>Reservation Form</h2>
        <form action="#" method="post">

            <label for="customer_name">Full Name:</label>
            <input type="text" id="customer_name" name="customer_name" required>

            <label for="contact">Phone Number:</label>
            <input type="tel" id="contact" name="contact" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="no_guests">Number of Guests:</label>
            <input type="number" id="no_guests" name="no_guests" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="special_requests">Special Requests:</label>
            <textarea id="special_requests" name="special_requests" rows="4"></textarea>

            <input type="submit" value="Submit Reservation">
        </form>
    </div>

</body>
</html>

<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $customer_name = $_POST["customer_name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $noGuests = $_POST["no_guests"];
    $date = $_POST["date"];
    $specialRequests = $_POST["special_requests"];

    // Create SQL query to insert data into tbl_reserv
    $sql = "INSERT INTO tbl_reserv (customer_name, contact, email, no_guests, date, special_requests)
            VALUES ('$customer_name', '$contact', '$email', '$noGuests', '$date', '$specialRequests')";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Data inserted successfully
        $_SESSION["reserv"] = "<div class='success text-center'>Reservation Submitted Successfully!</div>";
        header("location:" . SITEURL );
    } else {
        $_SESSION["reserv"] = "<div class='error text-center'>Failed Reservation!: " . mysqli_error($conn) . "</div>";
        header("location:" . SITEURL );
    }

    // Close the database connection
    mysqli_close($conn);
}
else{
     // Error in the query
     echo "Error: " . mysqli_error($conn);
}
?>




