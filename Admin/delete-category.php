<?php
// Include constant.php file here
include('../config/constant.php');

// Check if ID is set and is a valid integer
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get the ID of the category to be deleted
    $id = $_GET['id'];

    // Retrieve the image name from the database
    $sql = "SELECT image_name FROM category WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $image_name);

        // Fetch the result
        mysqli_stmt_fetch($stmt);

        // Close the result set before preparing the new statement
        mysqli_stmt_close($stmt);

        // Delete the category from the database
        $deleteSql = "DELETE FROM category WHERE id = ?";
        $deleteStmt = mysqli_prepare($conn, $deleteSql);

        if ($deleteStmt) {
            mysqli_stmt_bind_param($deleteStmt, "i", $id);
            $result = mysqli_stmt_execute($deleteStmt);

            if ($result) {
                // Delete the image from the category folder
                $imagePath = "../images/category/" . $image_name;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully</div>";
                header('location:' . SITEURL . 'Admin/manage-category.php');
            } else {
                $_SESSION['delete'] = "<div class='error'>Failed to delete Category. Try Again.</div>";
                header('location:' . SITEURL . 'Admin/manage-category.php');
            }

            mysqli_stmt_close($deleteStmt);
        } else {
            echo "Failed to prepare the statement for deletion. Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to prepare the statement for fetching image name. Error: " . mysqli_error($conn);
    }
} else {
    // Handle the case where the ID is not set or not a valid integer
    $_SESSION['delete'] = "<div class='error'>Invalid Category ID</div>";
    header('location:' . SITEURL . 'Admin/manage-category.php');
}
?>
<?php include("partials/footer.php"); ?>
