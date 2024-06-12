<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<?php
// Include constant.php file here
include('../config/constant.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Get the ID of the user to be deleted
$id = $_GET['id'];

// Output the UserID for debugging
echo "id: $id";

// Create a prepared statement to delete the user
$sql = "DELETE FROM tbl_feeback WHERE id= ?";
$stmt = mysqli_prepare($conn, $sql);

// Bind the parameter
mysqli_stmt_bind_param($stmt, "i", $id);

// Execute the statement
$res = mysqli_stmt_execute($stmt);

// Check for errors
if ($res) {
    // Query executed successfully, and user deleted
    $_SESSION['delete'] = "<div class='success'>Feedback Deleted Successfully</div>";
    // Redirect to manage Admin Page
    header('location:' . SITEURL . 'staff/manage-feedback.php');
} else {
    // Failed to delete user
    $_SESSION['delete'] = "<div class='error'>Failed to delete Customer. Error: " . mysqli_error($conn) . "</div>";
    header('location:' . SITEURL . 'staff/manage-feedback.php');
}

// Close the statement
mysqli_stmt_close($stmt);
?>
<?php include("partials/footer.php"); ?>
