<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Orders</h1>
        <?php
        ob_start();
        // Check if id is set in the URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Create SQL query to get the details
            $sql = "SELECT * FROM tbl_order WHERE id = $id";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check whether the query is executed or not
            if ($result) {
                // Check whether data is available or not
                $count = mysqli_num_rows($result);

                // Check whether we have order data or not
                if ($count == 1) {
                    // Get the details
                    $row = mysqli_fetch_assoc($result);
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $cutomer_contact = $row['cutomer_contact'];
                    $cutomer_email = $row['cutomer_email'];
                    $cutomer_address = $row['cutomer_address'];
                } else {
                    // Redirect to the manage order page, details not available
                    header('location:' . SITEURL . "Admin/manage-order.php");
                    exit();
                }
            } else {
                // Redirect to the manage order page
                header('location:' . SITEURL . "Admin/manage-order.php");
                exit();
            }
        ?>
            <br />
            <form action="" method="POST">
                <br />
                <table class="tbl-30">
                    <tr>
                        <td>Food Name</td>
                        <td><b><?php echo $food; ?></b></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><?php echo $price; ?></td>
                    </tr>
                    <tr>
                        <td>Qty</td>
                        <td><input type="number" name="qty" value="<?php echo $qty; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status">
                                <option <?php if ($status == "Ordered") {
                                            echo "selected";
                                        } ?> value="Ordered"> Ordered</option>
                                <option <?php if ($status == "On-delivery") {
                                            echo "selected";
                                        } ?> value="On-delivery"> On-Delivery</option>
                                <option <?php if ($status == "Delivered") {
                                            echo "selected";
                                        } ?> value="Delivered"> Delivered</option>
                                <option <?php if ($status == "Cancelled") {
                                            echo "selected";
                                        } ?> value="Cancelled"> Cancelled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Customer name</td>
                        <td><input type="text" name="full-name" value="<?php echo $customer_name; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Customer number</td>
                        <td><input type="number" name="contact" value="<?php echo $cutomer_contact; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Customer email</td>
                        <td><input type="text" name="email" value="<?php echo $cutomer_email; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Customer Address </td>
                        <td><textarea name="address" cols="30" rows=" 5" required><?php echo $cutomer_address; ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="food" value="<?php echo $food; ?>">
                            <input type="submit" name="submit" value="Update order" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

        <?php

            // Check whether the form is submitted
            if (isset($_POST["submit"])) {
                // Get values from the form
                $id = $_POST['id'];
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $order_date = date("Y-m-d h:i:sa");
                $status = $_POST['status'];
                $customer_name = $_POST['full-name'];
                $cutomer_contact = $_POST['contact'];
                $cutomer_email = $_POST['email'];
                $cutomer_address = $_POST['address'];

                // Update the data into the tbl_order table
                $sql2 = "UPDATE tbl_order SET  
                        food='$food',
                        price='$price',
                        qty='$qty',
                        total='$total',
                        order_date='$order_date',
                        status='$status', 
                        customer_name='$customer_name',
                        cutomer_contact='$cutomer_contact',
                        cutomer_email='$cutomer_email',
                        cutomer_address='$cutomer_address' 
                        WHERE id = $id";

                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully!</div>";
                    header('location:' . SITEURL . 'Admin/manage-order.php');
                    exit();
                } else {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order</div>";
                    header("location:" . SITEURL . "Admin/update-order.php?id=$id");
                    exit();
                }
            }
        } else {
            // Handle case where id is not set in the URL
            //echo "ID is not set in the URL.";
        }
        ob_end_flush();
        ?>
    </div>
</div>

<?php include("partials/footer.php"); ?>
