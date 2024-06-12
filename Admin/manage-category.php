<?php include("partials/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Categories</h1>

        <br/><br/>

        <!--Button to add admin-->
        <a href="<?php echo SITEURL;?>Admin/add-category.php" class="btn-primary"> Add Category</a>

        <br/><br/><br/><br/>

        <?php
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

      

        ?>

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th> 
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            // query to get all categories from database
            $sql = "SELECT * FROM category";

            // execute query
            $res = mysqli_query($conn, $sql);

            // check if the query executed successfully
            if($res) {
                // count rows
                $count = mysqli_num_rows($res);

                // create serial number variable and assign value as 1
                $id = 1;

                // check whether we have data in the database or not
                if($count > 0) {
                    // we have data in the database
                    // get the data and display
                    while($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $categoryname = $row['categoryname'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                        ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php  echo $categoryname; ?></td>
                            <td>
                                <?php
                                // check whether image name is available or not
                                if(!empty($image_name)) {
                                    // display the image
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php  echo $image_name;?>" width="100px">
                                    <?php
                                } else {
                                    // display the error message
                                    echo "<div class='error'> No image added </div>";
                                }
                                ?>
                            </td>                                
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                
                                <a href="<?php echo SITEURL; ?>Admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                <a href="<?php echo SITEURL; ?>Admin/delete-category.php?id=<?php echo $id; ?>" class="btn-danger">Remove Category</a>
                            </td>
                        </tr>
                        <?php
                        $id++;
                    }
                } else {
                    // we do not have data.
                    // we will display the message inside the table
                    ?>
                    <tr>
                        <td colspan="6"> <div class="error"> No category added </div></td>
                    </tr>
                    <?php
                }
            } else {
                // handle the case where the query did not execute successfully
                echo "Error: " . mysqli_error($conn);
            }
            ?>
        </table>
    </div>
</div>

<?php include("partials/footer.php");?>
