<?php include("partials/menu.php"); ?>

<div class="main-content">

    <div class="wrapper">
        <h1>Update Admin</h1>

        <?php

        //1. Get the ID of the selected User
        $id= $_GET['id'];

        //2. Create SQL query to get the details
        $sql = "SELECT * FROM tbl_admin  WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);
        //check whether the query is executed or not
        if ($res == true) {

            //check whether data is available or not 
            $count = mysqli_num_rows($res);

            //check whether we have user data or not
            if ($count == 1) {
                // Get the Details
                //echo"User Available";
                $rows = mysqli_fetch_assoc($res);

                $username = $rows['username'];
                $email = $rows['email'];
                $password = $rows['password'];
             
            } else {
                //Redirect to manage User Page
                header('location:' . SITEURL . 'Admin/manage-admin.php');
            }
        }

        ?>

        <br />
        <form action="" method="POST">
            <br />
            <table class="tbl-30">
                <tr>
                    <td>Username </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username ?>">
                    </td>
                </tr>
                <tr>
                    <td> Passowrd </td>
                    <td>
                        <input type="password" name="password" value="<?php echo $password ?>">
                    </td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

//check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // Get all the values from the form to update
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
   

    // Create a SQL query to update User
    $sql = "UPDATE tbl_admin SET
        username='$username',
        email='$email',
        
        WHERE id=$id";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if ($res == true) {
        // Query executed and user Updated
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
        // Redirect to manage User Page
        header('location:' . SITEURL . 'Admin/manage-admin.php');
    } else {
        // Failed to update User
        $_SESSION['update'] = "<div class='error'>Failed to Update Admin</div>";
        // Redirect to manage User Page
        header('location:' . SITEURL . 'Admin/manage-admin.php');
    }
}

?>

<?php include("partials/footer.php"); ?>
