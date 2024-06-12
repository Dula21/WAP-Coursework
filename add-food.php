<?php include("partials/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br/><br/>

        <?php
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Category</td>
                    <td>
                        <!-- Fetch and display categories as options -->
                        <select name="category_id">
                            <?php
                            // Query to get categories from the database
                            $categorySql = "SELECT * FROM category WHERE active='Yes'";
                            $categoryRes = mysqli_query($conn, $categorySql);

                            if ($categoryRes) {
                                while ($categoryRow = mysqli_fetch_assoc($categoryRes)) {
                                    $categoryId = $categoryRow['id'];
                                    $categoryName = $categoryRow['categoryname'];
                                    ?>
                                    <option value="<?php echo $categoryId; ?>"><?php echo $categoryName; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Cuisine Type</td>
                    <td><input type="text" name="cuisine_type" placeholder="Enter Cuisine Type" required></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="item_name" placeholder="Enter Food Name" required></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image" required></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" cols="30" rows=" s" placeholder="Enter Food Description" required></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" placeholder="Enter Food Price" required></td>
                </tr>


                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" checked>Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="Yes" checked>Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        // Check if the form is submitted
        if (isset($_POST["submit"])) {
            // Get values from the form
            $category_id = $_POST['category_id'];
            $cuisine_type = $_POST['cuisine_type'];
            $item_name = $_POST['item_name'];
            $description = $_POST['description'];
            $featured = $_POST['featured'];
            $price = $_POST['price'];
            $active = $_POST['active'];

            // Upload the image
            $image_name = $_FILES['image']['name'];
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/food/" . $image_name;

            // Move the image to the destination path
            $upload = move_uploaded_file($source_path, $destination_path);

            if ($upload == false) {
                $_SESSION['add'] = "<div class='error'>Failed to upload image</div>";
                header("location:" . SITEURL . "Admin/add-food.php");
                die();
            }

            // Insert the data into the food table
            $sql = "INSERT INTO menus SET  
                    category_id='$category_id',
                    cuisine_type='$cuisine_type',
                    item_name='$item_name',
                    image_name='$image_name',
                    description='$description',
                    featured='$featured',
                    price='$price',
                    active='$active'";

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                $_SESSION['add'] = "<div class='success'>Food Added Successfully!</div>";
                header("location:" . SITEURL . "Admin/manage-food.php");
            } else {
                $_SESSION['add'] = "<div class='error'>Failed to Add Food</div>";
                header("location:" . SITEURL . "Admin/add-food.php");
            }
        }
        ?>

    </div>
</div>

<?php include("partials/footer.php");?>
