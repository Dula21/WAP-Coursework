<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <?php

        // 1. Get the ID of the selected Category
        $id = $_GET['id'];

        // 2. Create SQL query to get the details
        $sql = "SELECT * FROM category WHERE id=$id";

        // execute the query
        $res = mysqli_query($conn, $sql);

        // check whether the query is executed or not
        if ($res == true) {

            // check whether data is available or not
            $count = mysqli_num_rows($res);

            // check whether we have category data or not
            if ($count == 1) {
                // Get the Details
                // echo "Category Available";
                $rows = mysqli_fetch_assoc($res);

                $id = $rows['id'];
                $categoryName = $rows['categoryname'];
                $image_name = $rows['image_name'];
                $featured = $rows['featured'];
                $active = $rows['active'];
            } else {
                // Redirect to manage category Page
                header('location:' . SITEURL . 'Admin/manage-category.php');
            }
        }

        ?>

        <br />
        <form action="" method="POST" enctype="multipart/form-data">
            <br />
            <table class="tbl-30">
                <tr>
                    <td>Category Name</td>
                    <td>
                        <input type="text" name="categoryname" value="<?php echo $categoryName ?>">
                    </td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="text" name="featured" value="<?php echo $featured ?>">
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="text" name="active" value="<?php echo $active ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php
                        if ($image_name != "") {
                            // Display the image
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                            <br>
                            <?php
                        } else {
                            // Display a message if no image is available
                            echo "No image available";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="new_image">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

// check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // Get all the values from the form to update
    $id = $_POST['id'];
    $categoryName = $_POST['categoryname'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // Check if a new image is selected
    if (isset($_FILES['new_image']['name']) && $_FILES['new_image']['name'] != "") {
        // Upload and update the new image
        $new_image_name = $_FILES['new_image']['name'];
        $source_path = $_FILES['new_image']['tmp_name'];
        $destination_path = "../images/category/" . $new_image_name;

        // Upload the new image
        $upload = move_uploaded_file($source_path, $destination_path);

        if (!$upload) {
            // Failed to upload the new image
            $_SESSION['update'] = "<div class='error'>Failed to upload the new image.</div>";
            header('location:' . SITEURL . 'Admin/manage-category.php');
            exit();
        }

        // Remove the old image if it exists
        if ($image_name != "") {
            $old_image_path = "../images/category/" . $image_name;
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        // Update the category with the new image
        $sql = "UPDATE category SET
            categoryname='$categoryName',
            featured='$featured',
            active='$active',
            image_name='$new_image_name'
            WHERE id=$id";
    } else {
        // Update the category without changing the image
        $sql = "UPDATE category SET
            categoryname='$categoryName',
            featured='$featured',
            active='$active'
            WHERE id=$id";
    }

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if ($res == true) {
        // Query executed and category Updated
        $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
        // Redirect to manage category Page
        header('location:' . SITEURL . 'Admin/manage-category.php');
    } else {
        // Failed to update category
        $_SESSION['update'] = "<div class='error'>Failed to Update Category</div>";
        // Redirect to manage category Page
        header('location:' . SITEURL . 'Admin/manage-category.php');
    }
}

?>

<?php include("partials/footer.php"); ?>
