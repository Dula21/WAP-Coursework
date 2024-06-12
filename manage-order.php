<?php include("partials/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Orders</h1>

        <br/><br/>

        <!-- Button to add food -->


        <?php
      
        if(isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
       
        if(isset($_SESSION['Failed'])) {
            echo $_SESSION['Failed'];
            unset($_SESSION['Failed']);
        }
        ?>

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                
                <th>Food</th>
                <th>Price</th>
                <th>Qty</th> 
                <th>Total</th>
                <th>Date</th>
                <th>Status</th>
                <th>Customer</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>

            <?php
            // Query to get all food items with their respective category names
            $sql = "SELECT * FROM tbl_order";
                    
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
                    while($row = mysqli_fetch_assoc($res)) 
                    {
                        $id = $row['id'];
                        $food=$row['food'];
                        $price=$row['price'];
                        $qty=$row['qty'];
                        $total=$row['total'];
                        $order_date=$row['order_date'];
                        $status=$row['status'];
                        $customer_name=$row['customer_name'];
                        $cutomer_contact=$row['cutomer_contact'];
                        $cutomer_email=$row['cutomer_email'];
                        $cutomer_address=$row['cutomer_address'];

                        ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $food;?></td>
                            <td>$<?php echo $price; ?></td>
                            <td><?php echo $qty; ?></td>                              
                            <td>$<?php echo $total; ?></td> 
                            <td><?php echo $order_date; ?></td>
                            <td>
                                <?php
                                
                               
                                if($status=="Ordered")
                                {
                                    echo "<label> $status </label>";
                                } 
                                elseif($status=="On-delivery")
                                {
                                    echo "<label style='color:orange;'>$status</label>";
                                }
                                elseif($status=="Delivered")
                                {
                                    echo "<label style='color:green;'>$status</label>";
                                }
                                elseif($status=="Cancelled")
                                {
                                    echo "<label style='color:red;'>$status</label>";
                                }
                                ?>
                            </td>
                            <td><?php echo $customer_name; ?></td>
                            <td><?php echo $cutomer_contact; ?></td>
                            <td><?php echo $cutomer_email; ?></td>
                            <td><?php echo $cutomer_address; ?></td>
                            <td> 
                                <a href="<?php echo SITEURL; ?>Admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Order</a> 
                                <a href="<?php echo SITEURL; ?>Admin/delete-orders.php?id=<?php echo $id; ?>" class="btn-danger"> Cancel Orders</a> 
                                
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
