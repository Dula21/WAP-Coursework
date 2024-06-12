<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <?php
        ob_start();
        // Check if menu_id is set in the URL
        if (isset($_GET['menu_id'])) {
            $menu_id = $_GET['menu_id'];

            // Create SQL query to get the details
            $sql = "SELECT * FROM menus WHERE menu_id = $menu_id";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check whether the query is executed or not
            if ($result) {
                // Check whether data is available or not
                $count = mysqli_num_rows($result);

                // Check whether we have food item data or not
                if ($count == 1) {
                    // Get the details
                    $row = mysqli_fetch_assoc($result);
                    $menu_id = $row['menu_id'];
                    $item_name = $row['item_name'];
                    $cuisine_type = $row['cuisine_type'];
                    $description = $row['description'];
                    $featured = $row['featured'];
                    $current_image = $row['image_name'];
                    $price = $row['price'];
                    $active = $row['active'];
                    $current_category = $row['category_id'];

                    // Display the form for updating
            ?>
                    <br />
                    <form action="" method="POST" enctype="multipart/form-data">
                        <br />
                        <table class="tbl-30">
                            <tr>
                                <td>Category</td>
                                <td>
                                    <!-- Fetch and display categories as options -->
                                    <select name="category_id">
                                <?php
                                        // Query to get categories from the database
                                        $categorySql = "SELECT * FROM category ";

                                        $res = mysqli_query($conn, $categorySql);

                                        $count = mysqli_num_rows($res);

                                        if ($count > 0) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $category_id = $row['id'];
                                                $categoryname = $row['categoryname'];

                                ?>
                                                <option <?php if (isset($current_category) && $current_category == $category_id) {
                                                    echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $categoryname; ?></option>
                                            <?php
                                            }
                                        }
                                    ?>
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Current Image</td>
                                <td>
                                    <?php
                                    if (isset($current_image) && $current_image != "") {
                                        // Display the image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>'../images/food/'<?php echo $current_image; ?>" width="100px">
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
                                <td>Cuisine Type</td>
                                <td><input type="text" name="cuisine_type" value="<?php echo isset($cuisine_type) ? $cuisine_type : ''; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="item_name" value="<?php echo isset($item_name) ? $item_name : ''; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><input type="textarea" name="description" cols="30" rows="5" value="<?php echo isset($description) ? $description : ''; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="number" name="price" value="<?php echo isset($price) ? $price : ''; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Featured</td>
                                <td>
                                    <input <?php if (isset($featured) && $featured == "yes") {
                                        echo "checked";} ?> type="radio" name="featured" value="yes">Yes
                                    <input <?php if (isset($featured) && $featured == "No") {
                                        echo "checked";} ?> type="radio" name="featured" value="No">No
                                </td>
                            </tr>
                            <tr>
                                <td>Active</td>
                                <td>
                                    <input <?php if (isset($active) && $active == "yes") {
                                        echo "checked";
                                    } ?> type="radio" name="active" value="yes">Yes
                                    <input <?php if (isset($active) && $active == "No") {
                                        echo "checked";
                                    } ?> type="radio" name="active" value="No">No
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="current_image" value="<?php echo isset($current_image) ? $current_image : ''; ?>">
                                    <input type="hidden" name="menu_id" value="<?php echo isset($menu_id) ? $menu_id : ''; ?>">
                                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                                </td>
                            </tr>
                        </table>
                    </form>

         <?php

                    // Check whether the form is submitted
                    if (isset($_POST["submit"])) {
                        // Get values from the form
                        $menu_id = $_POST['menu_id'];
                        $category_id = $_POST['category_id'];
                        $cuisine_type = $_POST['cuisine_type'];
                        $item_name = $_POST['item_name'];
                        $description = $_POST['description'];
                        $featured = $_POST['featured'];
                        $price = $_POST['price'];
                        $active = $_POST['active'];
                        $current_image = $_POST['current_image'];

                        // Check if a new image is selected
                        if (isset($_FILES['new_image']['name'])) {
                            // Upload and update the new image
                            $image_name = $_FILES['new_image']['name'];
                            $source_path = $_FILES['new_image']['tmp_name'];
                            $destination_path = "../images/food/" . $image_name;

                            // Move the image to the destination path
                            $upload = move_uploaded_file($source_path, $destination_path);

                            if ($upload == false) {
                                $_SESSION['Failed'] = "<div class='error'>Failed to upload new image</div>";
                                header('location:' . SITEURL . 'Admin/update-food.php?menu_id=$menu_id');
                                exit();
                            }

                            // Remove the old image if a new one is uploaded
                            $remove_path = "../images/food/" . $current_image;
                            if (file_exists($remove_path)) {
                                $remove = unlink($remove_path);

                                // Check if the old image removal is successful
                                if ($remove == false) {
                                    $_SESSION['update'] = "<div class='error'>Failed to remove old image</div>";
                                    header("location:" . SITEURL . "Admin/update-food.php?menu_id=$menu_id");
                                    exit();
                               }
                            }
                        } else {
                            // If no new image is selected, keep the old image name
                            $image_name = $current_image;
                        }

                        // Update the data into the food table
                        $sql_update = "UPDATE menus SET  
                            category_id='$category_id',
                            cuisine_type='$cuisine_type',
                            item_name='$item_name',
                            image_name='$image_name',
                            description='$description',
                            featured='$featured',
                            price='$price',
                            active='$active'
                            WHERE menu_id = $menu_id";

                        $res_update = mysqli_query($conn, $sql_update);

                        if ($res_update) {
                            $_SESSION['update'] = "<div class='success'>Food Updated Successfully!</div>";
                            header('location:' . SITEURL . 'Admin/manage-food.php');
                            exit();
                        } else {
                            $_SESSION['update'] = "<div class='error'>Failed to Update Food</div>";
                            header("location:" . SITEURL . "Admin/update-food.php?menu_id=$menu_id");
                            exit();
                        }
                    }
                } else {
                    // Redirect to manage food page
                   //// header('location:' . SITEURL . 'Admin/manage-food.php');
                    //exit(); // Add exit() to stop script execution after header redirect
                }
            } else {
                // Handle the SQL error
                echo "SQL Error: " . mysqli_error($conn);
            }
        } else {
            // Handle case where menu_id is not set in the URL
            echo "Menu ID is not set in the URL.";
        }

        ob_end_flush();
        ?>

    </div>
</div>

<?php include("partials/footer.php"); ?>
