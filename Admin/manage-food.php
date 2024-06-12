<?php include("partials/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br/><br/>

        <!-- Button to add food -->
        <a href="<?php echo SITEURL;?>Admin/add-food.php" class="btn-primary"> Add Food</a>

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

        if(isset($_SESSION['remove-failed'])) {
            echo $_SESSION['remove-failed'];
            unset($_SESSION['remove-failed']);
        }
        if(isset($_SESSION['Failed'])) {
            echo $_SESSION['Failed'];
            unset($_SESSION['Failed']);
        }
        ?>

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Category ID</th>
                <th>Name</th>
                <th>Image</th> 
                <th>Cuisine Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            // Query to get all food items with their respective category names
            $sql = "SELECT menus.*, category.categoryname
                    FROM menus
                    INNER JOIN category ON menus.category_id = category.id";

            // Execute query
            $res = mysqli_query($conn, $sql);

            // Check if the query executed successfully
            if($res) {
                // Count rows
                $count = mysqli_num_rows($res);

                // Check whether we have data in the database or not
                if($count > 0) {
                    // We have data in the database
                    // Get the data and display
                    while($row = mysqli_fetch_assoc($res)) {
                        $menu_id = $row['menu_id'];
                        $category_id = $row['category_id'];
                        $item_name = $row['item_name'];
                        $image_name = $row['image_name'];
                        $description = $row['description'];
                        $featured = $row['featured'];
                        $price = $row['price'];
                        $active = $row['active'];
                        $cuisine_type = $row['cuisine_type'];

                        ?>
                        <tr>
                            <td><?php echo $menu_id;?></td>
                            <td><?php echo $category_id;?></td>
                            <td><?php echo $item_name; ?></td>
                            <td>
                                <?php
                                // Check whether image name is available or not
                                if(!empty($image_name)) {
                                    // Display the image
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px">
                                    <?php
                                } else {
                                    // Display the error message
                                    echo "<div class='error'> No image added </div>";
                                }
                                ?>
                            </td>  
                            <td><?php echo $cuisine_type; ?></td>                              
                            <td><?php echo $description; ?></td>
                            <td>$<?php echo $price; ?></td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            
                            <td> 
                                <a href="<?php echo SITEURL; ?>Admin/update-food.php?menu_id=<?php echo $menu_id; ?>" class="btn-secondary"> Update Food</a> /

                                <a href="<?php echo SITEURL; ?>Admin/delete-food.php?menu_id=<?php echo $menu_id; ?>" class="btn-danger"> Remove Food</a>

                            </td>
                        </tr>
                        <?php
                        $menu_id++;

                    }
                } else {
                    // We do not have data.
                    // We will display the message inside the table
                    ?>
                    <tr>
                        <td colspan="10"> <div class="error"> No food items added </div></td>
                    </tr>
                    <?php
                }
            } else {
                // Handle the case where the query did not execute successfully
                echo "Error: " . mysqli_error($conn);
            }
            ?>
        </table>
    </div>
</div>

<?php include("partials/footer.php");?>
