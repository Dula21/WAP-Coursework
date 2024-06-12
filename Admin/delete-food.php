<?php
// Include constant.php file here
include('../config/constant.php');

// Check if ID is set and is a valid integer
if (isset($_GET['menu_id']) && is_numeric($_GET['menu_id'])) {
    // Get the ID of the category to be deleted
    $menu_id = $_GET['menu_id'];

    // Retrieve the image name from the database
    $sql = "SELECT image_name FROM menus WHERE menu_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $menu_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $image_name);

        // Fetch the result
        mysqli_stmt_fetch($stmt);

        // Close the result set before preparing the new statement
        mysqli_stmt_close($stmt);

        // Delete the category from the database
        $deleteSql = "DELETE FROM menus WHERE menu_id = ?";
        $deleteStmt = mysqli_prepare($conn, $deleteSql);

        if ($deleteStmt) {
            mysqli_stmt_bind_param($deleteStmt, "i", $menu_id);
            $result = mysqli_stmt_execute($deleteStmt);

            if ($result) {
                // Delete the image from the category folder
                $imagePath = "../images/food/" . $image_name;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully</div>";
                header('location:' . SITEURL . 'Admin/manage-food.php');
            } else {
                $_SESSION['delete'] = "<div class='error'>Failed to delete food Try Again.</div>";
                header('location:' . SITEURL . 'Admin/manage-food.php');
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
    $_SESSION['delete'] = "<div class='error'>Invalid food ID</div>";
    header('location:' . SITEURL . 'Admin/manage-food.php');
}
?>
<?php include("partials/footer.php"); ?>
