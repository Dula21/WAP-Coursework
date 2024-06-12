<?php include("partials/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Categories</h1>
        <br/><br/>

        <?php
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <br/><br/>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="categoryname" placeholder=" Enter Category Name" required></td>
                </tr>
                <tr>
                    <td>Select Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Featured :</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" >Yes
                        <input type="radio" name="featured" value="No" >No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="Yes" >Yes
                        <input type="radio" name="active" value="No" >No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST["submit"])) {
            $categoryname = $_POST['categoryname'];

            if (isset($_POST["featured"])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }

            if (isset($_POST["active"])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/" . $image_name;

                $upload = move_uploaded_file($source_path, $destination_path);

                if (!$upload) {
                    $_SESSION['upload'] = "<div class='error'>Failed to upload!</div>";
                    header("location:" . SITEURL . "Admin/add-category.php");
                    die();
                }
            } else {
                $image_name = "";
            }

            // Use prepared statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO category (categoryname, image_name, featured, active) VALUES (?, ?, ?, ?)");

            if (!$stmt) {
                // Handle the error if the prepare fails
                echo "Error: " . $conn->error;
            } else {
                $stmt->bind_param("ssss", $categoryname, $image_name, $featured, $active);

                if ($stmt->execute()) {
                    $_SESSION["add"] = "<div class='success'>Category Added Successfully!</div>";
                    header("location:" . SITEURL . "Admin/manage-category.php");
                } else {
                    $_SESSION["add"] = "<div class='error'>Failed to Add Category</div>";
                    header("location:" . SITEURL . "Admin/add-category.php");
                }

                $stmt->close();
            }
        }
        ?>
    </div>
</div>

<?php include("partials/footer.php"); ?>
