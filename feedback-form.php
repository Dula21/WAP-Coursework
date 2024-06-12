
<?php include("config/constant.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/feedback.css">
    <title>Feedback Form</title>
</head>
<body>
    <div class="feedback-container">
        <h1>Feedback Form</h1>
        <form action="" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="feedback">Your Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>

            <input type="submit" value="Submit Feedback">
        </form>
    </div>
</body>
</html>
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // SQL query to insert feedback into tbl_feedback
    $sql = "INSERT INTO tbl_feeback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION["feedback"]="<div class='success text-center'>Feedback submitted successfully! Thank You for Your Feedback! We appreciate your time and input.</div>";
        // Redirect to a thank you page or any other page
        header('Location:'.SITEURL);
        exit();
    } else {
        $_SESSION["feedback"] = "<div class='error text-center'>Failed To send!: " . mysqli_error($conn) . "</div>";
        header("location:" . SITEURL );
    }

    // Close the database connection
    mysqli_close($conn);
} else {
   // echo "Invalid request!";
}
?>
