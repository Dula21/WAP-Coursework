<?php include("partials/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Feedbacks</h1>

        <br/><br/>

        <!-- Button to add food -->
      

        <br/><br/>

        <?php
       
     
        if(isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

       
        ?>

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Date</th>
                <th>Text</th>
                <th>Actions</th>
            </tr>

            <?php
            // Query to get all food items with their respective category names
           $sql="SELECT * FROM tbl_feeback";
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

                        $id=$row['id'];
                        $customer_name = $row['customer_name'];
                     
                    
                        $date= date("Y-m-d h:i:s");
                        $text=$row['text'];
                        ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $customer_name;?></td>
                            <td><?php echo $email; ?></td>                              
                            <td><?php echo $date; ?></td>
                            <td><?php echo $text; ?></td>
                            <td> 
                               
                                <a href="<?php echo SITEURL; ?>staff/delete-reserv.php?menu_id=<?php echo $id; ?>" class="btn-danger"> Cancel </a>

                            </td>
                        </tr>
                        <?php
                        $id++;

                    }
                } else {
                    // We do not have data.
                    // We will display the message inside the table
                    ?>
                    <tr>
                        <td colspan="10"> <div class="error"> No Feedbacks added </div></td>
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
